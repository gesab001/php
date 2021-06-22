<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "homeschool";
$subject = $_GET['subject'];
$year = $_GET['year'];
$title = $_GET['title'];
$letter = $_GET['letter'];
$number = $_GET['number'];
$question = $_GET['question'];
$answer = $_GET['answer'];
$choice1 = $_GET['choice1'];
$choice2 = $_GET['choice2'];
$choice3 = $_GET['choice3'];
$choice4 = $answer;
$topic = $_GET['topic'];
$lesson_table = $subject . "_lessons";
//$sql =  "insert into math (id) values('1')";
// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql =  "insert into $subject (year, title, letter, number, topic, question, answer, choice1, choice2, choice3, choice4) values($year, '$title', '$letter', $number, '$topic', '$question', '$answer', '$choice1', '$choice2', '$choice3', '$choice4');";
$sql .= "insert into $lesson_table(title, year, letter, number, topic, resource) values('$title', '$year', '$letter', $number, '$topic', 'url');";

if ($conn->multi_query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
