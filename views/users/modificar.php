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
        <h1>Modificar Artículo</h1>
        <section>
            Título: <input type="text" id="title" required minlength="2" maxlength="50"><br>
            <span id="errorTitle" style="color:red"></span><br>
            Imagen (URL): <input type="text" id="image"><br>
            Categoría:
            <select id="category" required>
                <option value="">-- Elige categoría --</option>
                <option value="ropa">Ropa</option>
                <option value="libros">Libros</option>
                <option value="herramientas">Herramientas</option>
                <option value="hogar">Hogar</option>
            </select><br>
            Descripción: <textarea id="description" required minlength="20" maxlength="300"></textarea><br>
            Condición:
            <select id="condition" required>
                <option value="">-- Elige condición --</option>
                <option value="como nuevo">Como nuevo</option>
                <option value="bueno">Bueno</option>
                <option value="usado">Usado</option>
            </select><br>
            Disponibilidad:
            <select id="available">
                <option value="true">Disponible</option>
                <option value="false">No disponible</option>
            </select><br>
            Barrio: <input type="text" id="address" required><br>
            Nombre Propietario: <input type="text" id="name" required><br>
            Correo: <input type="email" id="email" required><br>

            <button id="modify-btn">Guardar cambios</button>  
        </section>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/modificarItem.js"></script>
</body>
</html>
