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

<<<<<<< HEAD
$sql = "SELECT filepath, filename, thumbnail FROM homemade ORDER by date_added DESC";
=======
$sql = "SELECT filepath, filename, thumbnail FROM homemade ORDER BY date_added DESC";
>>>>>>> bb8f0eabe51b3f5dca83014d280c9110b82d8c35
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='" . $row["filepath"]. $row["filename"]. "'><img src='" . $row["filepath"]. $row["thumbnail"] ."'></a>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
<<<<<<< HEAD
=======

>>>>>>> bb8f0eabe51b3f5dca83014d280c9110b82d8c35
