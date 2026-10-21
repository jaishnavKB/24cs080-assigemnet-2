<?php
include "db.php";

$id = $_GET["id"];

// Get student details
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

// Get uploaded files
$file_sql = "SELECT * FROM files WHERE student_id = $id";
$file_result = $conn->query($file_sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Student Details</h2>

<p>
    <b>Name:</b>
    <?php echo $student["name"]; ?>
</p>

<p>
    <b>Roll Number:</b>
    <?php echo $student["roll_no"]; ?>
</p>

<p>
    <b>Course:</b>
    <?php echo $student["course"]; ?>
</p>

<hr>

<h3>Uploaded Files</h3>

<a href="upload.php?id=<?php echo $id; ?>">
    Upload New File
</a>

<br><br>

<?php

if ($file_result->num_rows > 0) {

    while ($file = $file_result->fetch_assoc()) {
?>

    <div>

        <p>
            <b>File Name:</b>
            <?php echo $file["file_name"]; ?>
        </p>

        <p>
            <b>File Type:</b>
            <?php echo $file["file_type"]; ?>
        </p>

        <p>
            <b>Upload Date:</b>
            <?php echo $file["upload_date"]; ?>
        </p>

        <?php if (strpos($file["file_type"], "image") !== false) { ?>

            <img src="<?php echo $file["file_path"]; ?>"
                 width="200">

        <?php } else { ?>

            <a href="<?php echo $file["file_path"]; ?>"
               target="_blank">
                View / Download File
            </a>

        <?php } ?>

        <hr>

    </div>

<?php
    }

} else {

    echo "No files uploaded yet.";

}
?>

<br>

<a href="index.php">Back to Student List</a>

</body>

</html>