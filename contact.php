<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Notes</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
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

        .contact-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .contact-button {
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .contact-button i {
            margin-right: 10px;
        }

        .contact-button.whatsapp {
            background-color: #25D366;
        }

        .contact-button.instagram {
            background-color: #E1306C;
        }

        .contact-button.messenger {
            background-color: #0084FF;
        }

        .contact-button:hover {
            opacity: 0.8;
        }

        .main-title {
            margin-top: 150px;
            font-size: 105px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            overflow: hidden;
            white-space: nowrap;
            border-right: .15em solid orange;
            animation: typing 2s steps(30,end), blink-caret .65s step-end infinite;
        }

        .grid-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
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

            .main-title {
                font-size: 40px;
                margin-top: 80px;
            }

            .contact-buttons {
                flex-direction: column;
                align-items: center;
            }

            .contact-button {
                margin-bottom: 10px;
            }
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
            <div class="side-content">
                <h1 class="main-title">Smart Notes</h1>
                <h1 class="main-title2">Contact Us For Inquiries at</h1>
                <div class="contact-buttons">
                    <a href="https://wa.me/9765306253" target="_blank" class="contact-button whatsapp">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="https://www.instagram.com/smart_notes_np" target="_blank" class="contact-button instagram">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="https://m.me/6856500261092117" target="_blank" class="contact-button messenger">
                        <i class="fab fa-facebook-messenger"></i> Messenger
                    </a>
                </div>
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
