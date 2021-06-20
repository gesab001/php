<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "bible";
$tablename = "MEMORYVERSE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT book, chapter, verse, word FROM $tablename";
$result = $conn->query($sql);
$rows = array();
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
echo json_encode($rows);
$conn->close();
?>
