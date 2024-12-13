<?php
require_once('config.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $additionalinfo = $_POST['additionalinfo'];
    $zipcode = $_POST['zipcode'];
    $place = $_POST['place'];
    $country = $_POST['country'];
    $code = $_POST['code'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];

    try {
        $sql = "INSERT INTO users (title, firstname, lastname, birthday, gender, description, address, additionalinfo, zipcode, place, country, code, phonenumber, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$title, $firstname, $lastname, $birthday, $gender, $description, $address, $additionalinfo, $zipcode, $place, $country, $code, $phonenumber, $email]);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Successfully registered.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to save the data.'
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>
