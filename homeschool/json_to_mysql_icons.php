<?php

$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "homeschool";

$url = "https://raw.githubusercontent.com/gesab001/assets/master/homeschool/science/science_questions.json";
$json = file_get_contents($url);
$obj = json_decode($json);
$icons = $obj -> icons;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql;
foreach($icons as $value){
  $title = json_encode($value -> title);
  $name = json_encode($value -> name);
  $sql .= "insert into icons (title, name) values ($title, $name);";
}


if ($conn->multi_query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
