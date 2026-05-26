<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/authentication.php';
$currentUser = validarToken();
?>
<!DOCTYPE html>
<html lang="es">
<?php require_once '../partial/head.php'; ?>

<body>

    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <h1>Explorar Artículos</h1>
        <section>
        
                <label for="site-search">Buscar artículos:</label>
                <input type="search" id="site-search" placeholder="Ropa, libros...">

                <label for="category">Filtrar por categoría</label>
                <select name="category" id="category">
                    <option value="">--Elige una categoría--</option>
                    <option value="ropa">Ropa</option>
                    <option value="libros">Libros</option>
                    <option value="herramientas">Herramientas</option>
                    <option value="hogar">Hogar</option>
                </select>

                <label for="condition">Filtrar por condición</label>
                <select name="condition" id="condition">
                    <option value="">--Elige condición--</option>
                    <option value="como nuevo">Como nuevo</option>
                    <option value="bueno">Bueno</option>
                    <option value="usado">Usado</option>
                </select>
                <br><br>

                <?php if ($currentUser): ?>
                    <button onclick="window.location.href='/views/users/subirItem.php'">+ Añadir Artículo</button>
                <?php else: ?>
                    <button onclick="window.location.href='/views/users/login.php'">Login para añadir artículos</button>
                <?php endif; ?>
                <br><br><br>

        <div id="items-container"></div>
            
        </section>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/explorar.js"></script>
</body>
</html>
