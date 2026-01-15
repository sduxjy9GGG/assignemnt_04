<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stored Users</title>
</head>
<body>

<h2>Registered Users</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
