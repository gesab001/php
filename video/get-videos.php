
<?php


$DB_SERVER = $_POST['database-location']; 
echo $DB_SERVER;
$DB_USERNAME = $_POST['username'];
echo $DB_USERNAME;
$DB_PASSWORD = $_POST['password'];
echo $DB_PASSWORD;
$DB_DATABASE = $_POST['database-name'];
echo $DB_DATABASE;
$DB_PORT = 3306;
echo $DB_PORT;

  /* Connect to MySQL and select the database. */
  $conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);
                // Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
} 
else {
echo "Connected to " . $DB_SERVER . "database successfully \r\n";
echo "<br>";
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
 
$conn.close();

?>

