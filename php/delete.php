<?php

include './config.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!empty($data['id'])) {
    $id = $data['id'];
    $sql = "DELETE FROM products WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo 'Delete successfully';
    } else {
        echo 'Not Delete successfully';
    }
}
