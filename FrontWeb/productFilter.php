<?php


require_once 'config/config.php'; // Ensure this path is correct for your configuration file

// Fetch categories
$categoryFilter = $conn->query("SELECT DISTINCT category FROM product");

// Fetch products based on selected category
$category = isset($_GET['category']) ? $_GET['category'] : null;
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

if ($category && $searchQuery) {
    // Filter products based on both category and search query
    $stmt = $conn->prepare("SELECT * FROM product WHERE category = ? AND (name LIKE ? OR category LIKE ?)");
    $searchQueryLike = "%$searchQuery%";
    $stmt->bind_param("sss", $category, $searchQueryLike, $searchQueryLike);
} elseif ($category) {
    // Filter products based on category only
    $stmt = $conn->prepare("SELECT * FROM product WHERE category = ?");
    $stmt->bind_param("s", $category);
} elseif ($searchQuery) {
    // Filter products based on search query only
    $stmt = $conn->prepare("SELECT * FROM product WHERE name LIKE ? OR category LIKE ?");
    $searchQueryLike = "%$searchQuery%";
    $stmt->bind_param("ss", $searchQueryLike, $searchQueryLike);
} else {
    // Fetch all products if no filters are applied
    $stmt = $conn->prepare("SELECT * FROM product");
}

$stmt->execute();
$products = $stmt->get_result();
?>