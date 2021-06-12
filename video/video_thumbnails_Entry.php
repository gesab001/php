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

$dir = "./videos/seagate/alreadyInAWS/";
$files = glob("{$dir}*.{jpg,JPG,png,THM}", GLOB_BRACE);
$pattern_quotes = '/(\')/';
$replacement = "\\'";
foreach ($files as $path){
    $file = basename($path);
    $file = preg_replace($pattern_quotes, $replacement, $file); 
    $filename = explode('.', $file);
    $filename_image = $filename[0];
    $webpath = str_replace(".", "", $dir);
    $sql = "UPDATE homemade SET thumbnail='$file' WHERE filename LIKE '%$filename_image%'";
        if ($conn->query($sql) === TRUE) {
            echo "New thumbnails added successfully";
        }
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }  
}
$conn->close();

?>

