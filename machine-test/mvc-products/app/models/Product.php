<?php

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        $stmt->execute([$name, $price]);
    }

    public function updateProduct($id, $name, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
        $stmt->execute([$name, $price, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}