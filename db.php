<?php

$conn = mysqli_connect("localhost", "coffee_user", "coffee123", "coffee_shop");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
