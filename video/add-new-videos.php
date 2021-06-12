<?php


$DB_SERVER = $_POST['database-location']; 
echo $DB_SERVER;
$DB_USERNAME = $_POST['username'];
echo $DB_USERNAME;
$DB_PASSWORD = $_POST['password'];
echo $DB_PASSWORD;
$DB_DATABASE = $_POST['database-name'];
echo $DB_DATABASE;

  /* Connect to MySQL and select the database. */
  $conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
                // Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
} 
else {
echo "Connected to " . $DB_SERVER . "database successfully \r\n";
echo "<br>";
}

date_default_timezone_set("Pacific/Auckland");
$date = new DateTime();
$date->setTimestamp(U);
$current_date = $date->format('U');
$dir = $_POST['directory'];
$files = glob("{$dir}*.{MP4,mp4,MOV}", GLOB_BRACE);

$current_date = date("Y-m-d");
$dir = $_POST['directory'];
$files = glob("{$dir}*.{MP4,mp4}", GLOB_BRACE);
$pattern_quotes = '/(\')/';
$replacement = "\\'";
$word = preg_replace($pattern_quotes, $replacement, $word); 
foreach ($files as $path){
    $file = basename($path);
    $file = preg_replace($pattern_quotes, $replacement, $file); 
    $sql = "INSERT IGNORE INTO homemade (filename, date_added) 
    VALUES ('$file', '$current_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New video added successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$dir = "." . $_POST['directory'];
$files = glob("{$dir}*.{jpg,JPG,png,THM}", GLOB_BRACE);
$pattern_quotes = '/(\')/';
$replacement = "\\'";
foreach ($files as $path){
    $file = basename($path);
    $file = preg_replace($pattern_quotes, $replacement, $file); 
    $filename = explode('.', $file);
    $filename_image = $filename[0];
    $webpath = str_replace(".", "", $dir);
    $sql1 = "UPDATE homemade SET thumbnail='$file' WHERE filename LIKE '%$filename_image%' AND thumbnail IS NULL";
        if ($conn->query($sql1) === TRUE) {
            echo "New thumbnails added successfully";
        }
        else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
        }  
}

$result = mysqli_query($conn, "SELECT * FROM homemade"); 

while($query_data = mysqli_fetch_row($result)) {
                $filename = $row["filename"];
                $filepath = $row["filepath"];
                $thumbnail = $row["thumbnail"];
                $url = $filepath . $filename;
                $url_thumbnail = $filepath . $thumbnail;
                echo "<a href='" . $url . "'><img class='zoom' src='" . $url_thumbnail . "'></img></a>";
}
 

?>

