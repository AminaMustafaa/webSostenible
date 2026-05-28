<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <div class="form-page-container">
            <h1>Crear cuenta</h1>
            <p class="form-subtitle">Únete a GreenLoop y empieza a compartir</p>

            <div id="alert-msg" class="form-alert"></div>

            <form id="form-registrar">
                <div class="form-group">
                    <label for="reg-name">Nombre de usuario</label>
                    <input type="text" id="reg-name" placeholder="Tu nombre" required minlength="2">
                </div>

                <div class="form-group">
                    <label for="reg-email">Correo electrónico</label>
                    <input type="email" id="reg-email" placeholder="tu@email.com" required>
                </div>

                <div class="form-group">
                    <label for="reg-pass">Contraseña</label>
                    <input type="password" id="reg-pass" placeholder="Mínimo 6 caracteres" required minlength="6">
                </div>

                <div class="form-group">
                    <label for="reg-pass2">Repite la contraseña</label>
                    <input type="password" id="reg-pass2" placeholder="Repite la contraseña" required minlength="6">
                    <span id="error-pass" class="form-error"></span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Crear cuenta</button>
                </div>
            </form>

            <p class="form-link">Ya tienes cuenta? <a href="/views/users/login.php">Inicia sesion</a></p>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script>
        document.getElementById("form-registrar").addEventListener("submit", async function(e) {
            e.preventDefault();

            const name   = document.getElementById("reg-name").value.trim();
            const email  = document.getElementById("reg-email").value.trim();
            const pass   = document.getElementById("reg-pass").value;
            const pass2  = document.getElementById("reg-pass2").value;
            const errMsg = document.getElementById("error-msg");
            const okMsg  = document.getElementById("success-msg");

            alertBox.style.display = "none";
            alertBox.className     = "form-alert";
            errPass.textContent    = "";

            if (pass !== pass2) {
                errPass.textContent = "Las contraseñas no coinciden.";
                return;
            }

            try {
                const res  = await fetch("/proc/registrar.proc.php", {
                    method:  "POST",
                    headers: { "Content-Type": "application/json" },
                    body:    JSON.stringify({ name, email, password: pass })
                });
                const data = await res.json();

                if (data.success) {
                    alertBox.textContent   = "¡Cuenta creada! Redirigiendo al login...";
                    alertBox.className     = "form-alert success";
                    alertBox.style.display = "block";
                    setTimeout(() => window.location.href = "/views/users/login.php", 1500);
                } else {
                    alertBox.textContent   = data.error || "Error al registrar";
                    alertBox.className     = "form-alert error";
                    alertBox.style.display = "block";
                }
            } catch (err) {
                alertBox.textContent   = "Error de conexión";
                alertBox.className     = "form-alert error";
                alertBox.style.display = "block";
                console.error(err);
            }
        });
    </script>
</body>
</html>
