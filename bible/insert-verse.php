<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "bible";
$tablename = "MEMORYVERSE";
$book = $_GET['book'];
$chapter = $_GET['chapter'];
$verse = $_GET['verse'];
$word = $_GET['word'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO $tablename (book,chapter,verse, word) VALUES ('$book', $chapter, '$verse', '$word')";
if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

