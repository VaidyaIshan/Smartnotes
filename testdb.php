<?php
session_start();

$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "";
$database = "smartnotes";

$conn = new mysqli($dbserver, $dbuser, $dbpassword, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "CONNECTED";
}

if (isset($_POST['REGISTER'])) {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];
    $entered_email = $_POST['email'];
    $entered_fname = $_POST['firstname'];
    $entered_lname = $_POST['lastname'];

    $stmt = $conn->prepare("INSERT INTO users(username, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $entered_username, $entered_password, $entered_email, $entered_fname, $entered_lname);

    if ($stmt->execute()) {
        echo "<br>NEW USER ADDED";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $entered_username, $entered_password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            header('Location: home.php');
        } else {
            $message = "INVALID USERNAME OR PASSWORD";
            echo "<script>alert('$message');</script>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>