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

// Handle registration
if (isset($_POST['REGISTER'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO users (username, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $email, $firstname, $lastname);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Handle login
if (isset($_POST['LOGIN2'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) { // Verify the hashed password
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            $message = "INVALID USERNAME OR PASSWORD";
            echo "<script>alert('$message');</script>";
        }
    } else {
        $message = "INVALID USERNAME OR PASSWORD";
        echo "<script>alert('$message');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
