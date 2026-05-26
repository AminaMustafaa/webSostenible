<?php
//to clear the JWT cookie
setcookie("token", "", time() - 3600, "/", "", false, true);

header("Location: /index.php");
exit;
?>
