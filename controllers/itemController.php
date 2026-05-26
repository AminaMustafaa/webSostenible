<?php
require_once __DIR__ . '/../includes/dbOpenConn.php';
require_once __DIR__ . '/../includes/authentication.php';
require_once __DIR__ . '/../models/items.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// to extract id from path 
$parts = explode('/', trim($path, '/'));
$id    = isset($parts[2]) && is_numeric($parts[2]) ? (int)$parts[2] : null;

switch ($method) {

    case 'GET':
        if ($id) {
            $item = getItemById($db, $id);
            if ($item) {
                echo json_encode($item);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Item not found"]);
            }
        } else {
            $items = getAllItems($db);
            echo json_encode($items);
        }
    break;

    case 'POST':
        $user = validarToken();
        if (!$user) {
            http_response_code(401);
            echo json_encode(["error" => "No existe usuario+"]);
            break;
        }
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data || empty($data['title'])) {
            http_response_code(400);
            echo json_encode(["error" => "Titlo es necessario"]);
            break;
        }
        // Force owner info from the logged-in user
        $data['owner_name']  = $user['name'];
        $data['owner_email'] = $user['email'];
        $newId = createItem($db, $data);
        http_response_code(201);
        echo json_encode(["id" => $newId, "message" => "Item creado"]);
    break;

    case 'PUT':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "ID es necessario"]);
            break;
        }
        $user = validarToken();
        if (!$user) {
            http_response_code(401);
            echo json_encode(["error" => "El usuario no existe"]);
            break;
        }
        $item = getItemById($db, $id);
        if (!$item) {
            http_response_code(404);
            echo json_encode(["error" => "no existe el articulo"]);
            break;
        }
        // Admin can edit any item; client can only edit their own
        if ($user['role'] !== 'admin' && $item['owner_email'] !== $user['email']) {
            http_response_code(403);
            echo json_encode(["error" => "No tienes permiso para modificar este articulo"]);
            break;
        }
        $data = json_decode(file_get_contents("php://input"), true);
        updateItem($db, $id, $data);
        echo json_encode(["message" => "Item modiifcado"]);
    break;

    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "ID es necessario"]);
            break;
        }
        $user = validarToken();
        if (!$user) {
            http_response_code(401);
            echo json_encode(["error" => "El usuario no existe"]);
            break;
        }
        $item = getItemById($db, $id);
        if (!$item) {
            http_response_code(404);
            echo json_encode(["error" => "No existe el articulo"]);
            break;
        }
        // Admin can delete any item; client can only delete their own
        if ($user['role'] !== 'admin' && $item['owner_email'] !== $user['email']) {
            http_response_code(403);
            echo json_encode(["error" => "No tienes permiso para eliminar este artículo"]);
            break;
        }
        deleteItem($db, $id);
        echo json_encode(["message" => "Item eliminado"]);
    break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
    break;
}

require_once __DIR__ . '/../includes/dbCloseConn.php';
?>
