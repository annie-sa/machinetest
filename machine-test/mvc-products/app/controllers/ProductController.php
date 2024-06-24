<?php

require_once __DIR__ . "/../models/Product.php";

class ProductController {
    private $model;

    public function __construct($db) {
        $this->model = new Product($db);
    }

    public function index() {
        $products = $this->model->getAllProducts();
        require_once __DIR__ . "/../views/product-list.php";
    }

    public function add() {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $price = $_POST['price'];

            // Validate inputs
            if (empty($name)) {
                $errors[] = "Name is required.";
            }

            if (empty($price) || !is_numeric($price)) {
                $errors[] = "Price is required and must be numeric.";
            }

            // If no errors, add product
            if (empty($errors)) {
                $this->model->addProduct($name, $price);
                header("Location: index.php?action=index");
                exit();
            }
        }

        require_once __DIR__ . "/../views/add-product.php";
    }

    public function edit() {
        $errors = [];
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Product ID not specified.";
            return;
        }

        // Fetch product data
        $product = $this->model->getProductById($id);

        if (!$product) {
            echo "Product not found.";
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $price = $_POST['price'];

            // Validate inputs
            if (empty($name)) {
                $errors[] = "Name is required.";
            }

            if (empty($price) || !is_numeric($price)) {
                $errors[] = "Price is required and must be numeric.";
            }

            // If no errors, update product
            if (empty($errors)) {
                $this->model->updateProduct($id, $name, $price);
                header("Location: index.php?action=index");
                exit();
            }
        }

        require_once __DIR__ . "/../views/edit-product.php";
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Product ID not specified.";
            return;
        }

        // Fetch product data
        $product = $this->model->getProductById($id);

        if (!$product) {
            echo "Product not found.";
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Confirm deletion
            $confirm = $_POST['confirm'] ?? 'no';

            if ($confirm === 'yes') {
                $this->model->deleteProduct($id);
                header("Location: index.php?action=index");
                exit();
            } else {
                header("Location: index.php?action=index");
                exit();
            }
        }

        require_once __DIR__ . "/../views/delete-product.php";
    }
}