<?php

//Receive data in  JSON: name, email, password — creates a new user

require_once __DIR__ . "/../includes/dbOpenConn.php";

header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$name = trim($input["name"] ?? "");
$email = trim($input["email"] ?? "");
$password = $input["password"] ?? "";

if (!$name || !$email || !$password) {
    http_response_code(400);
    echo json_encode(["error" => "Todos los campos son necessarios"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["error" => "Email no valido"]);
    exit;
}

if (strlen($password) < 6) {
    http_response_code(400);
    echo json_encode(["error" => "La contraseña debe tener al menos 6 caracters"]);
    exit;
}

// to check if email or name already exists
$stmt = $db->prepare("SELECT id FROM users WHERE email = :email OR name = :name");
$stmt->bindValue(":email", $email, SQLITE3_TEXT);
$stmt->bindValue(":name", $name, SQLITE3_TEXT);
$result = $stmt->execute();
if ($result->fetchArray(SQLITE3_ASSOC)) {
    http_response_code(409);
    echo json_encode(["error" => "Ese nombre o email ya está registrado"]);
    require_once __DIR__ . "/../includes/dbCloseConn.php";
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'client')");
$stmt->bindValue(":name", $name, SQLITE3_TEXT);
$stmt->bindValue(":email", $email, SQLITE3_TEXT);
$stmt->bindValue(":password", $hashed, SQLITE3_TEXT);
$stmt->execute();

echo json_encode(["success" => true, "message" => "Usuario registrado correctamente"]);

require_once __DIR__ . "/../includes/dbCloseConn.php";
?>
