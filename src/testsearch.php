<!DOCTYPE html>
<html>
</head>
<link rel="stylesheet" href="css/testsearch.css">
</head>
<body>
     <input type="button" id="class11" class='userinfo' value="HOME" onclick="document.location='home.php'""> 
         <div class="mainbox">
            <h1 class="maintitle1">EXPLORE NOTES</h1>
<form method="post">
    <input type="textbox" name="str"  placeholder='Enter Keywords' class='searchbar'required/>
    <br><br>
    <input type="submit" name="submit" class='SUBMIT' value="Search">
</form>

<?php
include('searchdb.php');
?>

</div>
</body>
</html>