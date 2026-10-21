<?php
include "db.php";

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Student deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

echo "<br><br>";
echo "<a href='index.php'>Back to Student List</a>";

?>