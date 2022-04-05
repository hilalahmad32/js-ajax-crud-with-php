<?php
include "./config.php";

$sql = "SELECT * FROM products ORDER BY id DESC";
$run_sql = mysqli_query($conn, $sql);
$data = mysqli_num_rows($run_sql);
echo json_encode($data);
