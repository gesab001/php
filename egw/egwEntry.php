 <?php

$servername = localhost;
$username = "root";
$password = "ch5t8k4u";
$dbname = "egw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

//$dir = "/var/www/html/egw/upload/";
$pathtofile = $_POST['path'];
$year = $_POST['year'];
$a = scandir($dir);
unset($a[0], $a[1]);
$book = $a[2];
//$rawText = file_get_contents("$dir/$book");
$rawText = file_get_contents("$pathtofile");
$bookCodeSplit = (explode("$year", $rawText));
$bookCodeSplit = (explode("-", $bookCodeSplit[0]));
$bookCode = $bookCodeSplit[0];
$bookTitle = $bookCodeSplit[1];
$chapters = (explode("Chap.", $rawText));
foreach ($chapters as $chapterContent){
$paragraphs = (explode("}", $chapterContent));
$chapterTitle = $paragraphs[0];

foreach ($paragraphs as $paragraph) {
$words = (explode("{", $paragraph));
$theWords = ($words[0]);
$pattern_page_numbers = '/\s(\d+)\s/';
$replacement = '';
$theWords = preg_replace($pattern_page_numbers, $replacement, $theWords);
$pattern_quotes = '/(\')/';
$replacement = "\\'";
$theWords = preg_replace($pattern_quotes, $replacement, $theWords); 

$pageNumber = (explode(".", $words[1]));
$pageNumberSplit = (explode(".", $words[1]));
$pageNumberSplit = (explode(" ", $words[1]));
$pageNumberSplit = (explode(".", $pageNumberSplit[1]));
$finalPageNumber = ($pageNumberSplit[0]);
$paragraphNumber = $pageNumber[1];
$sql = "INSERT INTO egw_writings (bookCode, title, page, paragraph, word)
        VALUES ('$bookCode', '$bookTitle', '$finalPageNumber', '$paragraphNumber', '$theWords')";
  if ($conn->query($sql) === TRUE) {
        echo "New paragraph added successfully";
  }
  else {
        echo "Error: " . $sql . "<br>" . $conn->error;
  }  

}
}
$conn->close();

?>

