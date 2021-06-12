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

$videoID = $_POST['videoID'];
$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$location = $_POST['location'];

$sql = "UPDATE homemade SET title = '$title', category = '$category', description = '$description', location = '$location' WHERE id='$videoID'";
$result = $conn->query($sql);

$filename;
$title;
$filepath;
$description;
$location;
$word;
$id;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id_db = $row["id"];
		$filename_db = $row["filename"];
		$filepath_db = $row["filepath"];
		$title_db = $row["title"];
		$category_db = $row["category"];
		$description_db = $row["description"];
		$location_db = $row["location"];
		echo "<br>";
                $url = $id_db . $title_db . $category_db . $description_db . $location_db . $filepath_db . $filename_db;
                echo ($id);
                echo '<a href="'.$url.'">'. $filename.'</a>';
 }
}

if ($result->num_rows == 0)
{
	echo "word does not exist";
}




$conn->close();

?>

