<?php
include "./config.php";

$sql = "SELECT * FROM products ORDER BY id DESC";
$run_sql = mysqli_query($conn, $sql);
$data = [];
if (mysqli_num_rows($run_sql) > 0) {
    while ($row = mysqli_fetch_assoc($run_sql)) {
        $data[] =  $row;
    }
} else {
    $data['empty'] = "empty";
}
echo json_encode($data);
