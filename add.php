<?php include 'config.php'; ?>
<h2>Patients</h2>

<?php
$data = mysqli_query($conn, "SELECT * FROM patients");
while ($row = mysqli_fetch_assoc($data)) {
    echo $row['name']." | 
    <a href='edit.php?id=".$row['id']."'>Edit</a> | 
    <a href='delete.php?id=".$row['id']."'>Delete</a><br>";
}
?>
