<?php
session_start();  // Start the session at the beginning of the page

// Check if the user is logged in by checking a session variable
if (!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect to signin.php
    header("Location: signin.php");
    exit();  // Ensure that the script stops executing after redirection
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Smart Notes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='js/uploadformvalidation.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .header {
            width: 100%;
            background-color: #333;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background-color: #2B2D42;
        }

        .navbar .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .social-icon, .nav-icon {
            color: white;
            margin-left: 10px;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-icon:hover, .nav-icon:hover {
            color: #555;
        }

        .hamburger {
            display: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2B2D42;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
            }

            .nav-links.active {
                display: flex;
            }

            .navbar a {
                padding: 10px 0;
                width: 100%;
                text-align: left;
            }

            .hamburger {
                display: block;
            }

            .grid-container {
                grid-template-columns: 1fr; /* Stack columns on small screens */
            }

            .main-title1 {
                font-size: 40px;
                margin-top: 80px;
            }

            .main-title2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar">
           
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
    <div class="Main-box">
        <div class="side-content">
            <h1 class="main-title1">Smart Notes</h1>
            <h1 class="main-title2">Learning is a Treasure No One Can Take Away.</h1>
        </div>
        <div class="box">
            <h2 class="login-now">UPLOAD PDF FILES</h2><br>
            <form action="upload.php" name='uploadForm' method='post' enctype='multipart/form-data' onsubmit="return validateForm()">
                <input class="form-inp" type="text" placeholder="Enter Filename" name="filename" pattern="[a-zA-Z0-9_-]+\.pdf" required><br><br>
                <input class="form-inp" type="text" placeholder="Enter Subject" name="subject"><br><br>
                <input class="form-inp" type="text" placeholder="Enter Grade" name="grade"><br><br>
                <textarea class="form-inp" placeholder="Enter Description" name="description"></textarea><br><br>
                <input class="form-inp" type="file" name="pdf-file" accept=".pdf"><br><br>
                <input type="submit" value="Upload PDF" id="Submit-btn" name="submit"><br><br>
            </form>
        </div>
    </div>
    <script>
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('active');
        }

        function validateForm() {
            let filename = document.forms["uploadForm"]["filename"].value;
            let description = document.forms["uploadForm"]["description"].value;
            let file = document.forms["uploadForm"]["pdf-file"].value;

            if (filename == "") {
                alert("Filename must be filled out");
                return false;
            }
            if (description == "") {
                alert("Description must be filled out");
                return false;
            }
            if (file == "") {
                alert("Please select a PDF file to upload");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
