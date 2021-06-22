<?php

$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "homeschool";

$url = "https://raw.githubusercontent.com/gesab001/assets/master/homeschool/science/science_questions.json";
$json = file_get_contents($url);
$obj = json_decode($json);
$lesson = $obj -> s1a1;
$type = $lesson -> type;
$questions = $lesson -> questions;
//echo json_encode($questions);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$subject = "science";
$year = 1;
$letter = "a";
$number = 1;
$title = "big book of the body";
$topic = "what are you made of?";

$sql = "";
 
foreach($questions as $value){
  $question = mysqli_real_escape_string($conn, $value -> question);
  $answer = mysqli_real_escape_string($conn, $value -> answer);
  $choices = $value -> choices;
  $choice1  = mysqli_real_escape_string($conn, $choices[0]);
  $choice2  = mysqli_real_escape_string($conn, $choices[1]);
  $choice3  = mysqli_real_escape_string($conn, $choices[2]);
  $choice4  = mysqli_real_escape_string($conn, $choices[3]);

  $sql  .=  "insert into science (year, title, letter, number, topic, question, answer, choice1, choice2, choice3, choice4, type) values($year, '$title', '$letter', $number, '$topic', '$question', '$answer', '$choice1', '$choice2', '$choice3', '$choice4', '$type'); ";
}
/*$sql  .=  "insert into $subject (year, title, letter, number, topic, question, answer, choice1, choice2, choice3, type)" .
 "values($year, '$title', '$letter', $number, '$topic', '$question', '$answer', '$choice1', '$choice2', '$choice3', '$type');";
*/

echo $sql;

if ($conn->multi_query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

