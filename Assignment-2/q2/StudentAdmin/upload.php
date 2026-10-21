<?php
include "db.php";

$student_id = $_GET["id"];

if (isset($_POST["upload"])) {

    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tmp = $_FILES["file"]["tmp_name"];

    // Allowed file types
    $allowed_types = [
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];

    // Maximum file size: 2 MB
    $max_size = 2 * 1024 * 1024;

    if (!in_array($file_type, $allowed_types)) {

        echo "Only JPG, PNG and PDF files are allowed.";

    } elseif ($file_size > $max_size) {

        echo "File size must be less than 2 MB.";

    } else {

        // Create a unique file name
        $new_file_name = time() . "_" . $file_name;

        $file_path = "uploads/" . $new_file_name;

        // Move file to uploads folder
        if (move_uploaded_file($file_tmp, $file_path)) {

            $sql = "INSERT INTO files
                    (student_id, file_name, file_path, file_type)
                    VALUES
                    ('$student_id', '$file_name', '$file_path', '$file_type')";

            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully!";
            } else {
                echo "Database error: " . $conn->error;
            }

        } else {

            echo "File upload failed.";

        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Upload Student File</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Select File:</label>

    <input type="file" name="file" required>

    <button type="submit" name="upload">
        Upload File
    </button>

</form>

<br>

<a href="view.php?id=<?php echo $student_id; ?>">
    Back to Student Details
</a>

</body>

</html>