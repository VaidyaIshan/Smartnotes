<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Smart Notes - Sign In</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Bahnschrift', Arial, sans-serif;
            overflow: hidden;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        #bg-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

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

        /* Centered content styling */
        .main-box {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .main-content h1 {
            font-size: 32px;
            color: #fff;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 30px;
        }

        .main-content a {
            background-color: #2B2D42;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .main-content a:hover {
            background-color: #555;
        }
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
    <div class="main-box">
        <div class="main-content">
            <h1>Sign In or Register</h1>
            <p>If you want to upload notes, please sign in or register.</p>
            <a href="index.php">Go to Sign In</a>
        </div>
    </div>
    <script>
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('active');
        }
    </script>
</body>
</html>