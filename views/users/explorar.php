<!DOCTYPE html>
<html lang="en">
<?php require_once '../partial/head.php'; ?>

<body>

    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <h1>Explorar Items</h1>
        <a href="/index.php">Pagina principal</a>
        <br><br>
        <section>
        
                <label for="">Buscar items:</label>
                <input type="search" id="site-search" placeholder="Ropa,libros..">
                

                <label for="">Filtrar por categoria</label>
                <select name="category" id="category">
                    <option value="">--Elije una categoria--</option>
                    <option value="ropa">ropa</option>
                    <option value="libros">libro</option>
                    <option value="herramientas">herramientas</option>
                    <option value="hogar">hogar</option>
                </select>

                <label for="">Filtrar por condicion</label>
                <select name="condition" id="condition">
                    <option value="">--Elije items por condicion--</option>
                    <option value="como nuevo">como nuevo</option>
                    <option value="bueno">bueno</option>
                    <option value="usado">usado</option>
                </select>
                <br><br>

                <button onclick="window.location.href='/views/users/subirItem.php'"> Añadir Item </button>
                <br><br><br>

        <div id="items-container"></div>
            
        </section>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/explorar.js" defer ></script>
</body>
</html>

