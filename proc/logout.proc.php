<?php
setcookie("token", "", time() - 3600, "/");

header("Location: /views/users/login.php");
exit;
?>