<?php

$servername = localhost;
$username = "root";
$password = "ch5t8k4u";
$dbname = "videos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

$key = $_POST['keyword'];

$sql = "SELECT * FROM homemade";
$result = $conn->query($sql);

$filename;
$title;
$filepath;
$paragraph;
$word;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id = $row["id"];
		$title = $row["title"];
		$category = $row["category"];
		$description = $row["description"];
		$location = $row["location"];
		$filename = $row["filename"];
		$filepath = $row["filepath"];
		echo "<br>";
                $url = $filepath . $filename;
                echo '<a href="'.$url.'">'.$id." ".$title." ".$category." ".$description." ".$location.'</a>';
 }
}

if ($result->num_rows == 0)
{
	echo "word does not exist";
}




$conn->close();

?>

