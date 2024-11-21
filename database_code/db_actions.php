<?php
    $pdo = require("db_info.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST["productId"];
        $action = $_POST["action"];
        
        if ($action == "hide") {
            $sql = "UPDATE `products` SET `products`.`HIDDEN` = '1' WHERE ID = {$product_id}";
            $pdo->exec($sql);
        }
        elseif ($action == "change_quantity") {
            $product_quantity = $_POST["productQuantity"];
            $sql = "UPDATE `products` SET `products`.`PRODUCT_QUANTITY` = {$product_quantity} WHERE ID = {$product_id}";
            $pdo->exec($sql);
        }
    }
?>