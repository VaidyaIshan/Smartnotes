<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="css/userinfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop id="bg-video">
            <source src="videos/back.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="header">
        <nav class="navbar">
            <a href="#" class="logo">Smart Notes</a>
            <div class="nav-links">
                <a href="home.php">Home</a>
                <div class="dropdown">
                    <a href="#" class="notes-button">Notes</a>
                    <div class="dropdown-content">
                        <a href="explorenotes.php">Explore Notes</a>
                        <a href="uploadnotes.php">Upload Notes</a>
                    </div>
                </div>
                <a href="contact.php">Contact</a>
               s
                <a href="userinfo.php" class="nav-icon"><i class="fas fa-user-circle"></i></a>
                <a href="https://www.instagram.com/smart_notes_np" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/9765306253" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="https://m.me/6856500261092117" target="_blank" class="social-icon"><i class="fab fa-facebook-messenger"></i></a>
            </div>
            <div class="hamburger" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </div>
    <div class="grid-container">
        <div class="main-grid">
            <div class="user-info-content">
                <h1 class="maintitle1">USER INFORMATION</h1>
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

$username = $_SESSION['username'];
$sql = "SELECT username, password, email, firstname, lastname FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error executing the query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<div class='info-box'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='info-row'>";
            echo "<div class='info-column'>";
            echo "<p><strong>First Name:</strong> " . $row['firstname'] . "</p>";
            echo "</div>";
            echo "<div class='info-column'>";
            echo "<p><strong>Last Name:</strong> " . $row['lastname'] . "</p>";
            echo "</div>";
            echo "</div>";

            echo "<div class='info-row'>";
            echo "<div class='info-column'>";
            echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
            echo "</div>";
            echo "<div class='info-column'>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<div class='no-info'>";
        echo "<p>No user information found. If you want to upload notes, please <a href='index.php' class='sign-in-button'>Sign In</a> or <a href='register.php' class='sign-in-button'>Register</a>.</p>";
        echo "</div>";
    }
}

$conn->close();
?>
                <br>
                <input type="button" id="class11" class='class12' value="VIEW MY NOTES" onclick="document.location='mynotes.php'">
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>
