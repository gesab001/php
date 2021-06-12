<?php

$servername = localhost;
$username = "root";
$password = "ch5t8k4u";
$dbname = "bible";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

$key = $_POST['keyword'];

$sql = "SELECT book, chapter, verse, word FROM kjv WHERE word LIKE '%$key%'";
$result = $conn->query($sql);

$book;
$chapter;
$verse;
$word;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$book = $row["book"];
		$chapter = $row["chapter"];
		$verse = $row["verse"];
		$word = $row["word"];
		echo "<br>";
		echo $word;
		echo "<br>";
		echo ("(" . $book . " " . ($chapter) . ":" . $verse . ")");
		echo "<br>";
 }
}

if ($result->num_rows == 0)
{
	echo "word does not exist";
}




$conn->close();

?>

