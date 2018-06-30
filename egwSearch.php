<?php

$servername = localhost;
$username = "root";
$password = "ch5t8k4u";
$dbname = "egw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

$key = $_POST['keyword'];

$sql = "SELECT bookCode, title, page, paragraph, word FROM egw_writings WHERE word LIKE '%$key%'";
$result = $conn->query($sql);

$bookCode;
$title;
$page;
$paragraph;
$word;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$title = $row["title"];
		$page = $row["page"];
		$paragraph = $row["paragraph"];
		$word = $row["word"];
		echo "<br>";
		echo $word;
		echo "<br>";
		echo ("(" . $title . " " . ($page) . ":" . $paragraph . ")");
		echo "<br>";
 }
}

if ($result->num_rows == 0)
{
	echo "word does not exist";
}




$conn->close();

?>

