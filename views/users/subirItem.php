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
            <h1>Subir Artículo</h1>
            <p class="form-subtitle">Publicando como <strong><?= htmlspecialchars($user['name']) ?></strong></p>

            <div class="form-group">
                <label for="title">Título <span style="color:#c0392b">*</span></label>
                <input type="text" id="title" placeholder="Ej: Taladro percutor Bosch" required minlength="2" maxlength="50">
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
                <span id="errorCategory" class="form-error"></span>
            </div>

            <div class="form-group">
                <label for="description">Descripción <span style="color:#c0392b">*</span></label>
                <textarea id="description" placeholder="Describe el artículo (mínimo 20 caracteres)" required minlength="20" maxlength="300"></textarea>
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
                <span id="errorCondition" class="form-error"></span>
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
                <input type="text" id="address" placeholder="Ej: Gràcia, Barcelona" required>
                <span id="errorAddress" class="form-error"></span>
            </div>

            <div class="form-actions">
                <button id="post-item" class="btn">Publicar artículo</button>
            </div>
        </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>

    <script src="/static/js/subirItem.js"></script>
</body>
</html>
