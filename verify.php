<?php
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if (isset($_POST['VERIFY_OTP'])) {
    $username = $_SESSION['username'];
    $otp = $_POST['otp'];

    // Validate input
    if (empty($username) || empty($otp)) {
        echo "<script>alert('Username or OTP cannot be empty.');</script>";
        exit();
    }

    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username=? AND otp=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Debugging output
        echo "<p>OTP is valid. Proceeding with account activation...</p>";

        $updateSql = "UPDATE users SET status='active', otp=NULL WHERE username=?";
        $updateStmt = $conn->prepare($updateSql);
        if (!$updateStmt) {
            die("Prepare failed: " . $conn->error);
        }

        $updateStmt->bind_param("s", $username);
        $updateStmt->execute();

        if ($updateStmt->affected_rows == 1) {
            echo "<script>alert('Account activated successfully. You can now log in.');</script>";
            header('Location: index.php');
        } else {
            echo "<script>alert('Error updating account status.');</script>";
        }

        $updateStmt->close();
    } else {
        echo "<script>alert('Invalid OTP.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="Main-box">
        <div class="side-content">
            <h1 class="main-title1">Smart Notes</h1>
            <h1 class="main-title2">Learning is a Treasure No One Can Take Away.</h1>
        </div>
        <div class="box">
            <h2 class="login-now">Verify Email Address</h2><br>
            <form name="verify" method="POST">
                <input class="form-inp" type="text" placeholder="Enter the one-time password" name="otp"><br><br>
                <input type="submit" value="Verify OTP" id="Submit-btn" name="VERIFY_OTP"><br><br>
            </form>
        </div>
    </div>
</body>
</html>
