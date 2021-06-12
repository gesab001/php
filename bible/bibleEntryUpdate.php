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
unset($a[0], $a[1], $a[2]);
$bookCount = count($a);
$bookNumber = $number;
$book = $a[$bookNumber];
$verses = file_get_contents("$dir/$book");
$verses = (explode("{", $verses));
$totalVerses = count($verses);
for($i=1; $i <= $totalVerses; $i++) {
  $chapterSplit = (explode("}", $verses[$i]));
  $chapterVerse = (explode(":", $chapterSplit[0]));
  $chapter = $chapterVerse[0];
  $chapter = str_replace("\r", " ", $chapter);
  $chapter = str_replace("\n", " ", $chapter);
  $verse = $chapterVerse[1];
  $verse = str_replace("\r", " ", $verse);
  $verse = str_replace("\n", " ", $verse);
  $word = $chapterSplit[1];
  $word = str_replace("\r", " ", $word);
  $word = str_replace("\n", " ", $word);
  $pattern_quotes = '/(\')/';
  $replacement = "\\'";
  $word = preg_replace($pattern_quotes, $replacement, $word); 
  $sql = "INSERT INTO kjv (book, chapter, verse, word)
        VALUES ('$book', '$chapter', '$verse', '$word')";
  if ($conn->query($sql) === TRUE) {
        echo "New verse added successfully";
  }
  else {
        echo "Error: " . $sql . "<br>" . $conn->error;
  }  
}
}

for ($x = 0; $x<=69; $x++){
addVerses($x);
}

$conn->close();

?>

