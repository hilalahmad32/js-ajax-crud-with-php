<?php
include "./config.php";
$data = json_encode(file_get_contents("php://input"), true);
// if (!empty($data["search"])) {
$search = $data["search"];
$sql = "SELECT * FROM products ORDER BY id DESC WHERE product_title LIKE '%$search%'";
$run_sql = mysqli_query($conn, $sql);
$output = [];
if (mysqli_num_rows($run_sql) > 0) {
    while ($row = mysqli_fetch_assoc($run_sql)) {
        $output[] =  $row;
    }
} else {
    $output['empty'] = "empty";
}
echo json_encode($output);
// }
