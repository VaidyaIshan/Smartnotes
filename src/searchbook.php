<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/searchdb.css">
</head>
<body>
  <?php
  $servername = "sql307.infinityfree.com";
$username = "if0_36316648";
$password = "bHR6W8waQb";
$dbname = "if0_36316648_smartnotes";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }
  session_start();
  if(isset($_POST['submit'])){
    $str= $_POST['str'];
    $sql="select * from bookstore where bookname like '%$str%' or username like '%$str%' or price like '%$str%' or Contact like '%$str%' or Description like '%$str%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<br><br><table class='table'><tr class='table'><th class='table'>USERNAME</th><th class='table'>BOOKNAME</th> <th class='table'>PRICE</th>
      <th class='table'>CONTACT</th><th class='table'>DESCRIPTION</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["username"]. "</td><td>". $row["bookname"]. "</td><td>". $row["price"]. "</td><td>". $row["Contact"]. "</td><td>". $row["Description"]. "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  }
  $conn->close();
 ?>
</body>
</html>