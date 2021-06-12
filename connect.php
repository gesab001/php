<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>