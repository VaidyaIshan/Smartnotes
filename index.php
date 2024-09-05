<?php 
include('new1.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Smart Notes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='js/formValidation.js'></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
</head>
<body>      
    <div class="Main-box">
        <div class="side-content">
            <h1 class="main-title1">Smart Notes</h1>
            <h1 class="main-title2">Learning is a Treasure No One Can Take Away.</h1>
            <p></p>
        </div>
        <div class="box">
            <h2 class="login-now">Login</h2><br>
            <form name="loginForm" method="POST" onsubmit="return validateForm()">
                <input class="form-inp" type="text" placeholder="Enter your username" name="username"><br><br>
                <input class="form-inp" type="password" placeholder="Enter your password" name="password"><br><br><br>
                <input type="submit" value="Login Now" id="Submit-btn" name="LOGIN2"><br><br>
                <p class="New-register">New Here? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
</body>
</html>
