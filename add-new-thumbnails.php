 <?php
$servername = $_POST["database-location"];
$username = $_POST["username"];
$password = $_POST["password"];
$dbname = $_POST["database-name"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "success";
}
$dir = $_POST["directory"];
$files = glob("{$dir}*.{jpg,JPG,png,THM}", GLOB_BRACE);
$pattern_quotes = '/(\')/';
$replacement = "\\'";
foreach ($files as $path){
    $file = basename($path);
    $file = preg_replace($pattern_quotes, $replacement, $file); 
    $filename = explode('.', $file);
    $filename_image = $filename[0];
    $webpath = str_replace(".", "", $dir);
    $sql1 = "UPDATE homemade SET thumbnail='$file' WHERE filename LIKE '%$filename_image%'";
        if ($conn->query($sql1) === TRUE) {
            echo "New thumbnails added successfully";
        }
        else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
        }  
}

conn.close();
?> 
