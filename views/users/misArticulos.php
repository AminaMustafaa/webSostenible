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
        <h1>Mis Artículos</h1>
        <p>Artículos publicados por <strong><?= htmlspecialchars($user['name']) ?></strong></p>

        <a href="/views/users/subirItem.php" class="btn" style="display:inline-block;margin-bottom:1rem;">+ Subir nuevo artículo</a>

        <div id="mis-items-container">
            <p>Cargando...</p>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script>
        const currentUserEmail = "<?= addslashes($user['email'] ?? '') ?>";
        const currentUserRole  = "<?= addslashes($user['role']) ?>";

        async function getMisItems() {
            try {
                const res = await fetch("/controllers/itemController.php");
                if (!res.ok) throw new Error("Error " + res.status);
                const allItems = await res.json();

                // Filter by logged-in user's email (admin sees all)
                const items = currentUserRole === 'admin'
                    ? allItems
                    : allItems.filter(i => i.owner_email === currentUserEmail);

                const container = document.getElementById("mis-items-container");
                container.innerHTML = "";

                if (!items.length) {
                    container.innerHTML = "<p>No tienes artículos publicados.</p>";
                    return;
                }

                items.forEach(item => {
                    const div = document.createElement("div");
                    div.classList.add("item-div");
                    div.innerHTML = `
                        <img src="${item.image_url}" alt="${item.title}" style="max-width:200px;">
                        <h3>${item.title}</h3>
                        <p>
                            Categoría: ${item.category}<br>
                            Condición: ${item.condition}<br>
                            Disponibilidad: ${item.available ? "Disponible" : "No disponible"}<br>
                            Propietario: ${item.owner_name} (${item.owner_email})
                        </p>
                        <button onclick="window.location.href='/views/users/modificar.php?id=${item.id}'">✏️ Modificar</button>
                        <button class="btn-delete" data-id="${item.id}" style="background:#c0392b;color:white;">🗑️ Eliminar</button>
                    `;
                    container.appendChild(div);
                });

                // Attach delete listeners
                document.querySelectorAll(".btn-delete").forEach(btn => {
                    btn.addEventListener("click", async (e) => {
                        const id = e.target.dataset.id;
                        if (!confirm("¿Seguro que quieres eliminar este artículo?")) return;
                        try {
                            const r = await fetch(`/controllers/itemController.php/items/${id}`, { method: "DELETE" });
                            const data = await r.json();
                            if (r.ok) {
                                alert("Artículo eliminado.");
                                getMisItems();
                            } else {
                                alert(data.error || "Error al eliminar");
                            }
                        } catch (err) {
                            console.error(err);
                            alert("Error de conexión");
                        }
                    });
                });

            } catch (err) {
                document.getElementById("mis-items-container").innerHTML = "<p>Error al cargar artículos.</p>";
                console.error(err);
            }
        }

        getMisItems();
    </script>
</body>
</html>
