<?php
include "./config.php";

$data = json_decode(file_get_contents("php://input"), true);
if (!empty($data["id"]) || !empty($data["product_title"]) || !empty($data["price"]) || !empty($data["seller"])) {
    $id = $data["id"];
    $product_title = $data["product_title"];
    $price = $data["price"];
    $seller = $data["seller"];

    $sql = "UPDATE products SET product_title='{$product_title}', price='{$price}',seller='{$seller}' WHERE id='{$id}'";
    if (mysqli_query($conn, $sql)) {
        echo "update successfully";
    } else {
        echo "not update successfully";
    }
}
