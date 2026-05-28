<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <div class="form-page-container">
            <h1>Iniciar sesión</h1>
            <p class="form-subtitle">Accede con tu nombre de usuario o correo electronico</p>

            <div id="alert-msg" class="form-alert error"></div>

            <form id="form-login">
                <div class="form-group">
                    <label for="name">Nombre o correo</label>
                    <input type="text" id="name" placeholder="Tu nombre o email" required>
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" id="pass" placeholder="Tu contraseña" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Entrar</button>
                </div>
            </form>

            <p class="form-link">No tienes cuenta? <a href="/views/users/registrar.php">Regístrate ya</a></p>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script>
        document.getElementById("form-login").addEventListener("submit", function(e) {
            e.preventDefault();

            const nom = document.getElementById("name").value.trim();
            const contrasenya = document.getElementById("pass").value;
            const alert = document.getElementById("alert-msg");

            alert.style.display = "none";

            fetch("/proc/login.proc.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ nom, contrasenya })
            })
            .then(r => r.json())
            .then(data => {
                if (data.token) {
                    //window.location.href = "/views/users/gestionarItems.php";
                    window.location.href = "/views/users/misArticulos.php";
                } else {
                    alert.textContent =data.error || "Error al iniciar sesión";
                    alert.style.display = "block";
                }
            })
            .catch(err => {
                alert.textContent = "Error de conexión";
                alert.style.display= "block";
                console.error(err);
            });
        });
    </script>
</body>
</html>
