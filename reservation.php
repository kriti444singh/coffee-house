<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["reservation_date"];
    $time = $_POST["reservation_time"];
    $guests = $_POST["guests"];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO reservations
        (name, email, phone, reservation_date, reservation_time, guests)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $name,
        $email,
        $phone,
        $date,
        $time,
        $guests
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Table reservation submitted successfully! ☕</h2>";
        echo "<a href='reservation.html'>Make another reservation</a>";
    } else {
        echo "Error submitting reservation.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>