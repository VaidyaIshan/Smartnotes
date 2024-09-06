<?php 
include('new.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Smart Notes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='js/registerformvalidation.js'></script>
</head>
<body>
    <div class="Main-box">
        <div class="side-content">
            <h1 class="main-title1">Smart Notes</h1>
            <h1 class="main-title2">Learning is a Treasure No One Can Take Away.</h1>
        </div>
        <div class="box">
            <h2 class="login-now">Register </h2><br>
            <form name='reg' method='post'>
                <input class= "form-inp" type="text" placeholder="Enter your Username" name="username"><br><br>
                <input class= "form-inp" type="email" placeholder="Enter your email" name="email"><br><br>
                <input class= "form-inp" type="text" name="firstname"placeholder="Enter your firstname"> <br><br>
                 <input class= "form-inp" type="text" name="lastname" placeholder="Enter your lastname"><br><br>
                <input class="form-inp" type="text" placeholder="Enter your password" name="password"><br><br>
                <input type="submit" value="Register account" id="Submit-btn" name="REGISTER"><br><br>
                <p class="New-register">Already have an account?<a href="index.php">Login Now</a></p>
                
            </form>
        </div>
    </div>
</body>
</html>