<?php include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM patients WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>

<form method="POST">
<input name="name" value="<?php echo $row['name']; ?>">
<button name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn,
        "UPDATE patients SET name='$_POST[name]' WHERE id=$id"
    );
    header("Location: view.php");
}
?>
