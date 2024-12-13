<?php
require_once('config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    try {
        $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        echo 'User deleted successfully.';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
