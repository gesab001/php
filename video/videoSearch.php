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

$sql = "SELECT id, filename, filepath FROM homemade WHERE id='$key'";
$result = $conn->query($sql);

$filename;
$title;
$filepath;
$paragraph;
$word;
$id;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id = $row["id"];
		$filename = $row["filename"];
		$filepath = $row["filepath"];
		$word = $row["word"];
		echo "<br>";
                $url = $filepath . $filename;
                echo ($id);
                echo '<a href="'.$url.'">'. $filename.'</a>';
                echo '<video width="256" height="192"  id="myVideo" controls autoplay>
    <source src="'.$url.'" id="mp4Source" type="video/mp4">
    Your browser does not support the video tag.
</video>';

 }
}

if ($result->num_rows == 0)
{
	echo "word does not exist";
}




$conn->close();

include 'videoSearchForm1.php';
?>

