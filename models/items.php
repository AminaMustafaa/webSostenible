<?php
require_once __DIR__ . '/../includes/dbOpenConn.php';


function getAllItems($db) {
    $result = $db->query("SELECT * FROM items");
    $items = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $items[] = $row;
    }
    return $items;
}

function getItemById($db, $id) {
    $stmt = $db->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->bindValue(":id", (int)$id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    return $result->fetchArray(SQLITE3_ASSOC);
}

function getItemsByEmail($db, $email) {
    $stmt = $db->prepare("SELECT * FROM items WHERE owner_email = :email");
    $stmt->bindValue(":email", $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $items = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $items[] = $row;
    }
    return $items;
}

function createItem($db, $data) {
    $stmt = $db->prepare("
        INSERT INTO items (title, description, category, condition, neighbourhood,
        owner_name, owner_email, available, image_url, times_lent, date_posted)
        VALUES (:title, :description, :category, :condition, :neighbourhood,
        :owner_name, :owner_email, :available, :image_url, :times_lent, :date_posted)
    ");
    $stmt->bindValue(":title", $data['title'], SQLITE3_TEXT);
    $stmt->bindValue(":description", $data['description'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":category", $data['category'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":condition", $data['condition'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":neighbourhood", $data['neighbourhood'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":owner_name", $data['owner_name'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":owner_email", $data['owner_email'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":available", isset($data['available']) ? (int)$data['available'] : 1, SQLITE3_INTEGER);
    $stmt->bindValue(":image_url", $data['image_url'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":times_lent", $data['times_lent'] ?? 0,SQLITE3_INTEGER);
    $stmt->bindValue(":date_posted", $data['date_posted'] ?? date('Y-m-d'), SQLITE3_TEXT);
    $stmt->execute();
    return $db->lastInsertRowID();
}

function updateItem($db, $id, $data) {
    $stmt = $db->prepare("
        UPDATE items SET
        title = :title,
        description = :description,
        category = :category,
        condition = :condition,
        neighbourhood = :neighbourhood,
        owner_name = :owner_name,
        owner_email = :owner_email,
        available = :available,
        image_url = :image_url
        WHERE id = :id
    ");
    $stmt->bindValue(":title", $data['title'], SQLITE3_TEXT);
    $stmt->bindValue(":description", $data['description'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":category", $data['category'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":condition", $data['condition'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":neighbourhood", $data['neighbourhood'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":owner_name", $data['owner_name'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":owner_email", $data['owner_email'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":available", (int)($data['available'] ?? 1), SQLITE3_INTEGER);
    $stmt->bindValue(":image_url", $data['image_url'] ?? '', SQLITE3_TEXT);
    $stmt->bindValue(":id", (int)$id, SQLITE3_INTEGER);
    $stmt->execute();
}

function deleteItem($db, $id) {
    $stmt = $db->prepare("DELETE FROM items WHERE id = :id");
    $stmt->bindValue(":id", (int)$id, SQLITE3_INTEGER);
    $stmt->execute();
}
?>
