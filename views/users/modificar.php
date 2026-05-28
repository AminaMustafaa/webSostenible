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
        <div class="form-page-container">
            <h1>Modificar Artículo</h1>
            <p class="form-subtitle">Edita los datos del artículo y guarda los cambios</p>

            <div class="form-group">
                <label for="title">Título <span style="color:#c0392b">*</span></label>
                <input type="text" id="title" required minlength="2" maxlength="50">
                <span id="errorTitle" class="form-error"></span>
            </div>

            <div class="form-group">
                <label for="image">URL de imagen</label>
                <input type="text" id="image" placeholder="https://...">
            </div>

            <div class="form-group">
                <label for="category">Categoría <span style="color:#c0392b">*</span></label>
                <select id="category" required>
                    <option value="">-- Elige categoría --</option>
                    <option value="ropa">Ropa</option>
                    <option value="libros">Libros</option>
                    <option value="herramientas">Herramientas</option>
                    <option value="hogar">Hogar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descripción <span style="color:#c0392b">*</span></label>
                <textarea id="description" required minlength="20" maxlength="300"></textarea>
                <span id="errorDescription" class="form-error"></span>
            </div>

            <div class="form-group">
                <label for="condition">Condición <span style="color:#c0392b">*</span></label>
                <select id="condition" required>
                    <option value="">-- Elige condición --</option>
                    <option value="como nuevo">Como nuevo</option>
                    <option value="bueno">Bueno</option>
                    <option value="usado">Usado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="available">Disponibilidad</label>
                <select id="available">
                    <option value="true">Disponible</option>
                    <option value="false">No disponible</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Barrio <span style="color:#c0392b">*</span></label>
                <input type="text" id="address" required>
            </div>

            <div class="form-group">
                <label for="name">Nombre del propietario</label>
                <input type="text" id="name">
            </div>

            <div class="form-group">
                <label for="email">Correo del propietario</label>
                <input type="email" id="email">
            </div>

            <div class="form-actions">
                <button id="modify-btn" class="btn">Guardar cambios</button>
                <a href="javascript:history.back()" class="btn" style="background:var(--border-light);color:var(--text-dark);text-align:center;">Cancelar</a>
            </div>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/modificarItem.js"></script>
</body>
</html>
