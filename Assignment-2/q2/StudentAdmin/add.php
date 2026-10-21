<?php
include "db.php";

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $roll_no = $_POST["roll_no"];
    $course = $_POST["course"];

    $sql = "INSERT INTO students (name, roll_no, course)
            VALUES ('$name', '$roll_no', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Add Student</h2>

<form method="POST">

    <label>Student Name:</label>
    <input type="text" name="name" required>

    <label>Roll Number:</label>
    <input type="text" name="roll_no" required>

    <label>Course:</label>
    <input type="text" name="course" required>

    <button type="submit" name="submit">Add Student</button>

</form>

<br>

<a href="index.php">Back to Student List</a>

</body>
</html>