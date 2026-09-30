<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $message = $_POST["message"];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO feedback (name, email, rating, message)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssis",
        $name,
        $email,
        $rating,
        $message
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Thank you for your feedback! ⭐</h2>";
        echo "<a href='feedback.html'>Give another feedback</a>";
    } else {
        echo "Error submitting feedback.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
