<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <link rel="stylesheet" href="css/mynotes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop id="bg-video">
            <source src="videos/back.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Header with Navigation -->
    <div class="header">
        <nav class="navbar">
            <a href="#" class="logo">Smart Notes</a>
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="explorenotes.php">Notes</a>
                <a href="contact.php">Contact</a>
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

    <!-- Main Content -->
    <div class="mainbox content-container">
        <h1 class="maintitle1">My Notes</h1>
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
        $sql = "SELECT id, filename, date FROM files WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error executing the query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                echo "<div class='notes-grid'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='note-card'>";
                    echo "<h3 class='note-title'>" . htmlspecialchars($row["filename"]) . "</h3>";
                    echo "<p class='note-meta'>Uploaded on " . htmlspecialchars($row['date']) . "</p>";
                    echo "<a href='uploads/" . htmlspecialchars($row["filename"]) . "' target='_blank' class='note-link'>View Note</a>";
                    echo "<form action='delete.php' method='post' class='delete-form'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='submit' value='Delete' class='delete-button'>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No user information found.</p>";
            }
        }
        $conn->close();
        ?>
    </div>

    <!-- JavaScript for Menu Toggle -->
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>