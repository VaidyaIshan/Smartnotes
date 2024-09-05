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

  $conn = new mysqli($dbserver,$dbuser,$dbpassword,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  session_start();
  if(isset($_POST['submit'])){
    $str= $_POST['str'];
    $sql="select * from files where filename like '%$str%' or description like '%$str%' or username like '%$str%' or subject like '%$str%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<br><br><table class='table'><tr class='table'><th class='table'>USERNAME</th><th class='table'>Filename</th> <th class='table'>DESCRIPTION</th>
        <th class='table'>DATE</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"]. "</td><td><a href='uploads/" . $row["filename"] . "' target='_blank'>" . $row["filename"] . "</a></td><td>" . $row["description"]. "</td><td>" . $row["date"]. "</td></tr>";
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