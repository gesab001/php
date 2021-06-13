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
$title = $_POST["database-name"];
$sentence = $_POST["database-name"];
$image = $_POST["image"];
$sql = "SELECT * FROM story ORDER BY id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<h1>" . $row["sentence"] . "</h1>";
       echo "<img src='" . $row["image"] ."'>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 

