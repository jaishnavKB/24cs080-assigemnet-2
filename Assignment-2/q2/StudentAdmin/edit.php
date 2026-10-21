<?php
include "db.php";

$id = $_GET["id"];

// Get student details
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

// Update student details
if (isset($_POST["update"])) {

    $name = $_POST["name"];
    $roll_no = $_POST["roll_no"];
    $course = $_POST["course"];

    $sql = "UPDATE students 
            SET name='$name', roll_no='$roll_no', course='$course'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Edit Student</h2>

<form method="POST">

    <label>Student Name:</label>
    <input type="text" name="name"
           value="<?php echo $student['name']; ?>" required>

    <label>Roll Number:</label>
    <input type="text" name="roll_no"
           value="<?php echo $student['roll_no']; ?>" required>

    <label>Course:</label>
    <input type="text" name="course"
           value="<?php echo $student['course']; ?>" required>

    <button type="submit" name="update">
        Update Student
    </button>

</form>

<br>

<a href="index.php">Back to Student List</a>

</body>
</html>