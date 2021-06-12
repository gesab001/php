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

$sql = "SELECT filename FROM homemade WHERE thumbnail IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["filename"];
	echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
