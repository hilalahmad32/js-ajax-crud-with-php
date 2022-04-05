<?php
include "./config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["id"])) {
    $id = $data["id"];
    $sql = "SELECT * FROM products WHERE id='{$id}'";
    $run_sql = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($run_sql) > 0) {
        while ($row = mysqli_fetch_assoc($run_sql)) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
}
