<?php
include "db.php";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Student Admin Panel</h2>

<a href="add.php">Add Student</a>

<br><br>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roll Number</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <tr>

        <td><?php echo $row["id"]; ?></td>

        <td><?php echo $row["name"]; ?></td>

        <td><?php echo $row["roll_no"]; ?></td>

        <td><?php echo $row["course"]; ?></td>

        <td>
            <a href="view.php?id=<?php echo $row["id"]; ?>">View</a>

            <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>

            <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
        </td>

    </tr>

    <?php } ?>

</table>

</body>
</html>