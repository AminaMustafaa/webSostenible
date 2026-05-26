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
        <h1>Subir Artículo</h1>
        <p>Publicando como: <strong><?= htmlspecialchars($user['name']) ?></strong> (<?= htmlspecialchars($user['email'] ?? '') ?>)</p>
        <section>

            Título: <input type="text" name="title" id="title" required minlength="2" maxlength="50"> <br>
            <span id="errorTitle" style="color:red"></span><br>

            Imagen (URL): <input type="text" name="image" id="image" placeholder="https://..."> <br>
            <span id="errorImage" style="color:red"></span><br>

            Categoría: 
            <select id="category" required>
                <option value="">-- Elige categoría --</option>
                <option value="ropa">Ropa</option>
                <option value="libros">Libros</option>
                <option value="herramientas">Herramientas</option>
                <option value="hogar">Hogar</option>
            </select><br>
            <span id="errorCategory" style="color:red"></span><br>

            Descripción: <textarea name="description" id="description" required minlength="20" maxlength="300"></textarea><br>
            <span id="errorDescription" style="color:red"></span><br>

            Condición: 
            <select id="condition" required>
                <option value="">-- Elige condición --</option>
                <option value="como nuevo">Como nuevo</option>
                <option value="bueno">Bueno</option>
                <option value="usado">Usado</option>
            </select><br>
            <span id="errorCondition" style="color:red"></span><br>

            Disponibilidad: 
            <select id="available">
                <option value="true">Disponible</option>
                <option value="false">No disponible</option>
            </select><br>

            Barrio: <input type="text" name="address" id="address" required><br>
            <span id="errorAddress" style="color:red"></span><br>

            <button id="post-item">Subir</button>

        </section>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/subirItem.js"></script>
</body>
</html>
