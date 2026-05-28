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
            <div class="explorar-toolbar">
                <div class="explorar-filters">
                    <div class="filter-group">
                        <label for="site-search">Buscar</label>
                        <input type="search" id="site-search" placeholder="Ropa, libros, taladro...">
                    </div>
                    <div class="filter-group">
                        <label for="category">Categoría</label>
                        <select id="category">
                            <option value="">Todas las categorías</option>
                            <option value="ropa">Ropa</option>
                            <option value="libros">Libros</option>
                            <option value="herramientas">Herramientas</option>
                            <option value="hogar">Hogar</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="condition">Condición</label>
                        <select id="condition">
                            <option value="">Cualquier condición</option>
                            <option value="como nuevo">Como nuevo</option>
                            <option value="bueno">Bueno</option>
                            <option value="usado">Usado</option>
                        </select>
                    </div>
                </div>
                <?php if ($currentUser): ?>
                    <a href="/views/users/subirItem.php" class="btn">+ Publicar artículo</a>
                <?php else: ?>
                    <a href="/views/users/login.php" class="btn btn-outline">Login para publicar</a>
                <?php endif; ?>
            </div>

            <div id="items-container"></div>
        </section>
    </main>


    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/explorar.js"></script>
</body>
</html>
