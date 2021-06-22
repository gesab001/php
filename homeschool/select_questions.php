<?php

$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "homeschool";
$tablename = $_GET['subject'];
$title = $_GET['title'];
$topic = $_GET['topic'];
$year = $_GET['year'];
$letter = $_GET['letter'];
$number = $_GET['number'];
//echo $tablename . $year . $letter . $number;
//echo $title;
//echo $topic;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  //echo ("success");
}


$sql = "select * from $tablename where title='$title' and topic='$topic'";
$result = $conn->query($sql);

$questions = array();
$choices = array();
$questionitem = new stdClass();

while($r = mysqli_fetch_assoc($result)) {
     $question  = $r['question'];
     $answer  = $r['answer'];
     $choice1  = $r['choice1'];
     $choice2  = $r['choice2'];
     $choice3  = $r['choice3'];
     $choice4  = $r['choice4'];
     $choices[] = $choice1;
     $choices[] = $choice2;
     $choices[] = $choice3;
     $choices[] = $choice4;
     $questionitem -> question = $question;
     $questionitem -> answer = $answer;
     $questionitem -> choices = $choices;
     $questions[] = $questionitem;
     $questionitem = new stdClass();
     $choices = array();
}
$response = new stdClass();
$icons = array();
$iconObj = new stdClass();
$iconObj -> title = "ambulance";
$iconObj -> name = "fa fa-ambulance";
$icons[] = $iconObj;
$response -> icons = $icons;

$code = $tablename[0] . $year . $letter . $number;
$questions_obj  = new stdClass();
$questions_obj -> type = "fill_in_the_blank";
$questions_obj -> questions = $questions;
$response -> $code = $questions_obj;

echo json_encode($response);

$conn->close();
?>
