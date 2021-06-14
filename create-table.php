<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = $_GET['dbname'];
$tablename = $_GET['tablename'];
$sqlcommand = $_GET['command'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$sql = $sqlcommand;
if ($conn->query($sql) === TRUE) {
  echo "Table " . $tablename ." created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
