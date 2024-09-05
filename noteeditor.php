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
$username= $_SESSION['username'];
$sql = "SELECT id, filename, date FROM files WHERE username='$username'";
$result = $conn->query($sql);
if ($result === false) {
    echo "Error executing the query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<table class='box'>";
        echo "<tr>";
        echo "<th class='jj'>Title</th>";
        echo "<th class='jj'>Date</th>";
        echo "<th class='jj'>Action</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='uploads/" . $row["filename"] . "' target='_blank'>" . $row["filename"] . "</a></td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td><form action='delete.php' method='post' class='delete-form'><input type='hidden'  class='delete' name='id' value='" . $row['id'] . "'><input type='submit' value='Delete'></form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No user information found.";
    }
}
$conn->close();
?>