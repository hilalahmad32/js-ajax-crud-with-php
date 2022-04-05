<?php

include './config.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["product_title"]) || !empty($data["price"]) || !empty($data["seller"])) {
    $product_title = htmlentities(htmlspecialchars($data["product_title"]));
    $price = htmlentities(htmlspecialchars($data["price"]));
    $seller = htmlentities(htmlspecialchars($data["seller"]));

    $sql = "INSERT INTO products (product_title,Seller,price) VALUES ('{$product_title}', '{$seller}', '{$price}')";
    if (mysqli_query($conn, $sql)) {
        echo "Successfully Add";
    } else {
        echo "Some problems occured";
    }
} else {
    echo "Please fill the field";
}
