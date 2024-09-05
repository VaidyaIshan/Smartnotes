<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Notes</title>
    <link rel="stylesheet" href="css/explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <style>
        /* Add your CSS styles here */
    </style>
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
    <div class="content-container">
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="str" placeholder="Search for notes..." id="search-input">
                <button type="submit" name="submit" id="search-button"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="notes-grid">
            <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = "mysql:host=sql307.infinityfree.com;dbname=if0_36316648_smartnotes";
$username = "if0_36316648";
$password = "bHR6W8waQb";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialize the query to fetch the latest 10 notes
    $sql = "SELECT * FROM files ORDER BY date DESC LIMIT 20";
    $params = [];

    // If the search form is submitted, change the query to filter based on the search term
    if (isset($_POST['submit'])) {
        $str = $_POST['str'];
        $sql = "SELECT * FROM files WHERE filename LIKE :search OR description LIKE :search OR username LIKE :search OR subject LIKE :search ORDER BY date DESC";
        $params = ['search' => "%$str%"];
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        foreach ($result as $row) {
            echo "<div class='note-card'>";
            echo "<h3 class='note-title'>" . htmlspecialchars($row["filename"]) . "</h3>";
            echo "<p class='note-description'>" . htmlspecialchars($row["description"]) . "</p>";
            echo "<p class='note-meta'>Uploaded by " . htmlspecialchars($row["username"]) . " on " . htmlspecialchars($row["date"]) . "</p>";
            echo "<a href='uploads/" . htmlspecialchars($row["filename"]) . "' target='_blank' class='note-link'>View</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
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