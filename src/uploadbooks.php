<?php
$servername = "sql307.infinityfree.com";
$username = "if0_36316648";
$password = "bHR6W8waQb";
$dbname = "if0_36316648_smartnotes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
// Handle form submission
if (isset($_POST['submit'])) {
    $bookname = $_POST['bookname'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];
    $username= $_SESSION['username'];
    $sql = "INSERT INTO bookstore(username,bookname,price,contact,description) VALUES ('$username','$bookname','$price','$contact','$description')";
    if ($conn->query($sql) === TRUE) {
       
        header('Location: successupload.php');
         echo "PDF file uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error uploading the PDF file.";
}
    
$conn->close();
?>