<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <div class="container">
            <h2>Crear cuenta</h2>
            <p id="error-msg" style="color:red; display:none;"></p>
            <p id="success-msg" style="color:green; display:none;"></p>

            <form id="form-registrar">
                <label for="reg-name">Nombre</label>
                <input type="text" id="reg-name" required minlength="2">

                <label for="reg-email">Correo electrónico</label>
                <input type="email" id="reg-email" required>

                <label for="reg-pass">Contraseña (mínimo 6 caracteres)</label>
                <input type="password" id="reg-pass" required minlength="6">

                <label for="reg-pass2">Repite la contraseña</label>
                <input type="password" id="reg-pass2" required minlength="6">

                <input class="btn" type="submit" value="Registrarse"><br><br>

                <p>¿Ya tienes cuenta? <a href="/views/users/login.php">Inicia sesión</a></p>
            </form>
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

            errMsg.style.display = "none";
            okMsg.style.display  = "none";

            if (pass !== pass2) {
                errMsg.textContent = "Las contraseñas no coinciden.";
                errMsg.style.display = "block";
                return;
            }

            try {
                const res = await fetch("/proc/registrar.proc.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ name, email, password: pass })
                });
                const data = await res.json();

                if (data.success) {
                    okMsg.textContent = "¡Cuenta creada! Redirigiendo al login...";
                    okMsg.style.display = "block";
                    setTimeout(() => window.location.href = "/views/users/login.php", 1500);
                } else {
                    errMsg.textContent = data.error || "Error al registrar";
                    errMsg.style.display = "block";
                }
            } catch (err) {
                errMsg.textContent = "Error de conexión";
                errMsg.style.display = "block";
                console.error(err);
            }
        });
    </script>
</body>
</html>
