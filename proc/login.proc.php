<?php


require_once __DIR__ . "/../includes/dbOpenConn.php";

header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$nom = $input["nom"] ?? "";
$contrasenya = $input["contrasenya"] ?? "";

if ($nom && $contrasenya) {

    $stmt = $db->prepare("SELECT * FROM users WHERE name = :nom OR email = :nom");
    $stmt->bindValue(":nom", $nom, SQLITE3_TEXT);
    $result = $stmt->execute();
    $usuari = $result->fetchArray(SQLITE3_ASSOC);

    // password_verify checks against password_hash used in dbInit.php
    if ($usuari && password_verify($contrasenya, $usuari['password'])) {

        $secret  = "pinkySecret";
        $header  = base64_encode(json_encode(["alg" => "HS256", "typ" => "JWT"]));
        $payload = base64_encode(json_encode([
            "id"    => $usuari['id'],
            "name"  => $usuari['name'],
            "email" => $usuari['email'] ?? '',
            "role"  => $usuari['role'],
            "exp"   => time() + 3600
        ]));
        $signature = base64_encode(hash_hmac("sha256", "$header.$payload", $secret, true));
        $token = "$header.$payload.$signature";

        setcookie("token", $token, time() + 3600, "/", "", false, true);
        echo json_encode(["token" => $token, "name" => $usuari['name'], "role" => $usuari['role']]);

    } else {
        http_response_code(401);
        echo json_encode(["error" => "Nombre/email o contraseña incorrectos"]);
    }


} else {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
}

require_once __DIR__ . "/../includes/dbCloseConn.php";
?>
