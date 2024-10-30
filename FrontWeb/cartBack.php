<?php
    require_once 'productDetailBack.php';

    $query = "UPDATE product SET stock = stock - 1 WHERE id = ? AND stock > 0";
?>