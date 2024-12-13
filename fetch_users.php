<?php
require_once('config.php');

try {
    $stmt = $db->query("SELECT id, firstname, lastname, email, phonenumber FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode([]);
}
?>
