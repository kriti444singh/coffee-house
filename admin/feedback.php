<?php

include "../db.php";

$result = mysqli_query(
    $conn,
    "SELECT * FROM feedback ORDER BY created_at DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedback</title>
</head>

<body>

    <h1>☕ Customer Feedback</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Date</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row["id"]; ?></td>

            <td>
                <?php echo htmlspecialchars($row["name"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row["email"]); ?>
            </td>

            <td>
                <?php echo $row["rating"]; ?> ⭐
            </td>

            <td>
                <?php echo htmlspecialchars($row["message"]); ?>
            </td>

            <td>
                <?php echo $row["created_at"]; ?>
            </td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>
