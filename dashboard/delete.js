
function confirmDelete(productId) {
    var confirmDelete = confirm("Are you sure you want to delete this item?");
    if (confirmDelete) {
        // Redirect to delete.php with the product ID
        window.location.href = "delete.php?id=" + productId;
    }
}
