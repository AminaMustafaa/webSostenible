<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/authentication.php';
$currentUser = validarToken(); 
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once '../partial/head.php'; ?>
<body>
    <?php require_once '../partial/header.php'; ?>

    <main class="main-center-content">
        <h1>Detalle Item</h1>
        <div id="item-detail"> </div>
    </main>

    <?php require_once '../partial/footer.php'; ?>
    
    <script>
        // Expose current user info to detalle.js
        window.currentUserEmail = "<?= addslashes($currentUser['email'] ?? '') ?>";
        window.currentUserRole  = "<?= addslashes($currentUser['role']  ?? '') ?>";
    </script>
    <script src="/static/js/detalle.js" ></script>
</body>
</html>
 