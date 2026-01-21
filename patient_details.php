<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

/* Check if ID exists */
if (!isset($_GET['id'])) {
    die("Patient ID not provided.");
}

$id = intval($_GET['id']);

/* Fetch patient data */
$result = mysqli_query($conn, "SELECT * FROM patients WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("Patient not found.");
}

$patient = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 70px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            color: #0f766e;
            margin-bottom: 25px;
        }
        .detail {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #444;
        }
        .value {
            color: #111;
        }
        .actions {
            text-align: center;
            margin-top: 25px;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin: 5px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            color: white;
        }
        .btn-back {
            background: #6c757d;
        }
        .btn-edit {
            background: #2563eb;
        }
        .btn-delete {
            background: #dc2626;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Patient Details</h2>

    <div class="detail">
        <span class="label">Patient ID:</span>
        <span class="value"><?php echo $patient['id']; ?></span>
    </div>

    <div class="detail">
        <span class="label">Name:</span>
        <span class="value"><?php echo $patient['name']; ?></span>
    </div>

    <div class="detail">
        <span class="label">Age:</span>
        <span class="value"><?php echo $patient['age']; ?></span>
    </div>

    <div class="detail">
        <span class="label">Gender:</span>
        <span class="value"><?php echo $patient['gender']; ?></span>
    </div>

    <div class="detail">
        <span class="label">Phone:</span>
        <span class="value"><?php echo $patient['phone']; ?></span>
    </div>

    <div class="detail">
        <span class="label">Disease:</span>
        <span class="value"><?php echo $patient['disease']; ?></span>
    </div>

    <?php if (isset($patient['visit_date'])) { ?>
    <div class="detail">
        <span class="label">Visit Date:</span>
        <span class="value"><?php echo $patient['visit_date']; ?></span>
    </div>
    <?php } ?>

    <div class="actions">
        <a class="btn btn-back" href="view.php">Back to List</a>
        <a class="btn btn-edit" href="edit.php?id=<?php echo $patient['id']; ?>">Edit</a>
        <a class="btn btn-delete" href="delete.php?id=<?php echo $patient['id']; ?>">Delete</a>
    </div>
</div>

</body>
</html>
