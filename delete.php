<?php
session_start();
$servername = "sql307.infinityfree.com";
$username = "if0_36316648";
$password = "bHR6W8waQb";
$dbname = "if0_36316648_smartnotes";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['id'];
$sql = "DELETE FROM files WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "File deleted successfully.";
} else {
    echo "Error deleting the file: " . $conn->error;
}
// Close the database connection
$conn->close();
// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>