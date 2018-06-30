 <?php

function addVerses($number){
$servername = "localhost";
$username = "root";
$password = "ch5t8k4u";
$dbname = "bible";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

$book;
$chapter;
$verse;
$word;

$dir = "/var/www/html/bible/";
$a = scandir($dir);
unset($a[0], $a[1], $a[2], $a[3]);
$bookCount = count($a);
$bookNumber = $number;
$book = $a[$bookNumber];
$bookID = (explode("_", $book));
$bookName = (explode(".", $bookID[1]));
$bookName = $bookName[0];
$bookID =$bookID[0];
  $sql = "UPDATE kjv SET book = '$bookName' WHERE book = '$book'";
  if ($conn->query($sql) === TRUE) {
        echo "updated successfully";
  }
  else {
        echo "Error: " . $sql . "<br>" . $conn->error;
  }  

}

for ($x = 0; $x<=69; $x++){
addVerses($x);
}

$conn->close();

?>

