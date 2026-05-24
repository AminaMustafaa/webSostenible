<!DOCTYPE html>
<html lang="en">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <h1>Subir Items</h1>
        <section>

            Titulo: <input type="text" name="title" id="title" required minlength="2" maxlength="50"required> <br>
            <span id="errorTitle" style="color:red"></span><br>

            Imatge: <input type="text" name="image" id="image" placeholder="" required> <br>
            <span id="errorImage" style="color:red"></span><br>

            Categoria: 
            <select id="category" required>
                <option value="">-- Elige categoria --</option>
                <option value="ropa">Ropa</option>
                <option value="libros">Libros</option>
                <option value="herramientas">Herramientas</option>
                <option value="hogar">Hogar</option>
            </select > <br>
            <span id="errorCategory" style="color:red"></span><br>

            Descripcion: <textarea name="description" id="description" required minlength="20" maxlength="300"></textarea> <br>
            <span id="errorDescription" style="color:red"></span><br>

            Condicion: 
            <select id="condition" required>
                <option value="">-- Elige condicion --</option>
                <option value="como nuevo">Como nuevo</option>
                <option value="bueno">Bueno</option>
                <option value="usado">Usado</option>
            </select > <br>
            <span id="errorCondition" style="color:red"></span><br>

            Dispnibilibad: 
            <select id="available" required>
                <option value="true">Disponible</option>
                <option value="false">No disponible</option>
            </select > <br>
            <span id="errorAvailabe" style="color:red"></span><br>

            Barrio: <input type="text" name="address" id="address" required> <br>
            <span id="errorAddress" style="color:red"></span><br>

            Nombre Propietario: <input type="text" name="name" id="name" required> <br>
            <span id="errorName" style="color:red"></span><br>

            Correo: <input type="email" name="email" id="email" required> <br>
            <span id="errorEmail" style="color:red"></span><br>

            <button id="post-item">Subir</button>

        </section>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/subirItem.js"></script>
</body>
</html>

