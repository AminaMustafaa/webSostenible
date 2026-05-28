<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/authentication.php';
$user = requireLogin(); 
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">

        <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px; margin-bottom:8px;">
            <div>
                <h1>Mis Artículos</h1>
                <p class="intro-text" style="margin-bottom:0;">
                    <?php if ($user['role'] === 'admin'): ?>
                        Panel de administración — todos los artículos publicados.
                    <?php else: ?>
                        Artículos publicados por <strong><?= htmlspecialchars($user['name']) ?></strong>.
                    <?php endif; ?>
                </p>
            </div>
            <a href="/views/users/subirItem.php" class="btn">+ Subir artículo</a>
        </div>

        <p id="empty-msg" style="display:none; margin-top:24px;">No tienes artículos publicados todavía.</p>
        <p id="loading-msg" style="margin-top:24px;">Cargando...</p>

        <div id="mis-items-container"></div>

    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script>
        const currentUserEmail = "<?= addslashes($user['email'] ?? '') ?>";
        const currentUserRole  = "<?= addslashes($user['role']) ?>";

        async function getMisItems() {
            const loading   = document.getElementById("loading-msg");
            const emptyMsg  = document.getElementById("empty-msg");
            const container = document.getElementById("mis-items-container");

            try {
                const res = await fetch("/controllers/itemController.php");
                if (!res.ok) throw new Error("Error " + res.status);
                const allItems = await res.json();

                loading.style.display = "none";

                // Filter by logged-in user's email (admin sees all)
                const items = currentUserRole === "admin"
                    ? allItems
                    : allItems.filter(i => i.owner_email === currentUserEmail);

                if (!items.length) {
                    emptyMsg.style.display = "block";
                    return;
                }

                container.innerHTML = "";

                items.forEach(item => {
                    const available = parseInt(item.available) === 1;
                    const card = document.createElement("div");
                    card.className = "my-item-card";
                    card.innerHTML = `
                        <img src="${item.image_url || 'https://placehold.co/400x200?text=Sin+imagen'}"
                             alt="${item.title}"
                             onerror="this.src='https://placehold.co/400x200?text=Sin+imagen'">
                        <div class="my-item-card-body">
                            <h3>${item.title}</h3>
                            <span class="badge ${available ? 'badge-available' : 'badge-unavailable'}">
                                ${available ? "Disponible" : "No disponible"}
                            </span>
                            <p>
                                <strong>Categoría:</strong> ${item.category}<br>
                                <strong>Condición:</strong> ${item.condition}<br>
                                <strong>Barrio:</strong> ${item.neighbourhood}<br>
                                ${currentUserRole === 'admin'
                                    ? `<strong>Propietario:</strong> ${item.owner_name} &lt;${item.owner_email}&gt;`
                                    : ''}
                            </p>
                        </div>
                        <div class="my-item-card-actions">
                            <a href="/views/users/modificar.php?id=${item.id}" class="btn-edit">✏️ Modificar</a>
                            <button class="btn-delete" data-id="${item.id}">🗑️ Eliminar</button>
                        </div>
                    `;
                    container.appendChild(card);
                });

                // Delete handlers
                container.querySelectorAll(".btn-delete").forEach(btn => {
                    btn.addEventListener("click", async (e) => {
                        const id = e.currentTarget.dataset.id;
                        if (!confirm("¿Seguro que quieres eliminar este artículo?")) return;
                        try {
                            const r = await fetch(`/controllers/itemController.php/items/${id}`, { method: "DELETE" });
                            const data = await r.json();
                            if (r.ok) {
                                e.currentTarget.closest(".my-item-card").remove();
                                if (!container.querySelector(".my-item-card")) {
                                    emptyMsg.style.display = "block";
                                }
                            } else {
                                alert(data.error || "Error al eliminar");
                            }
                        } catch (err) {
                            alert("Error de conexión");
                            console.error(err);
                        }
                    });
                });

            } catch (err) {
                loading.style.display = "none";
                container.innerHTML   = "<p>Error al cargar los artículos.</p>";
                console.error(err);
            }
        }

        getMisItems();
    </script>
</body>
</html>
