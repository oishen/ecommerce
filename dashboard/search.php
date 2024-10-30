<?php
// Fetch filtered results based on the search query
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $select_delete = "SELECT * FROM `product` WHERE `name` LIKE '%$searchQuery%' OR `category` LIKE '%$searchQuery%'";
} else {
    $select_delete = "SELECT * FROM `product`";
}

// Execute the query to fetch results
$result_delete = mysqli_query($conn, $select_delete);

?>