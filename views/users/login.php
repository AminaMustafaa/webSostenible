<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <div class="container">
            <h2>Iniciar sesión</h2>
            <p id="error-msg" style="color:red; display:none;"></p>

            <form id="form-login">
                <label for="name">Nombre</label>
                <input type="text" id="name" required>

                <label for="pass">Contraseña</label>
                <input type="password" id="pass" required>

                <input class="btn" type="submit" value="Entrar">
            </form>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script>
        document.getElementById("form-login").addEventListener("submit", function(e) {
            e.preventDefault();

            const nom         = document.getElementById("name").value;
            const contrasenya = document.getElementById("pass").value;

            fetch("/proc/login.proc.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ nom, contrasenya })
            })
            .then(r => r.json())
            .then(data => {
                if (data.token) {
                    window.location.href = "/views/users/gestionarItems.php";
                } else {
                    const err = document.getElementById("error-msg");
                    err.style.display = "block";
                    err.textContent = data.error || "Error al iniciar sesión";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
