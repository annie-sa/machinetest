<?php

session_start();

require_once "../config/database.php";
require_once "../app/controllers/ProductController.php";

$productController = new ProductController($db);

$action = $_GET["action"] ?? "index";

switch ($action) {
    case "index":
        $productController->index();
        break;
    case "add":
        $productController->add();
        break;
    case "edit":
        $productController->edit();
        break;
    case "delete":
        $productController->delete();
        break;
    default:
        echo "404 Not Found";
}
?>
