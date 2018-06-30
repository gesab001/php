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

$title = $_POST['title'];
$image = $_POST['image'];
$sentence = $_POST['sentence'];
$sql = "INSERT IGNORE INTO story (title, image, sentence) 
VALUES ('$title', '$image', '$sentence')";
if ($conn->query($sql) === TRUE) {
    echo "New sentence added successfully";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn.close();
?>

