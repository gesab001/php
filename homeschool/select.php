<?php
$servername = "localhost";
$username = "gesab001";
$password = "ch5t8k4u";
$dbname = "homeschool";
$tablename = "science_lessons";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, letter, number, topic, resource FROM $tablename";
$result = $conn->query($sql);
$rows = array();
$categories = new stdClass();
$activities = array();
$myObj = new stdClass();
$activitiesObj = new stdClass();
while($r = mysqli_fetch_assoc($result)) {
     $letter  = $r['letter'];
     $title = $r['title'];
     $number = $r['number'];
     $key = $letter;
     $myObj -> key  = $key;
     $myObj -> title = $title;
     $myObj -> letter = $letter;
     $myObj -> activities = array();
     if (in_array($myObj, $rows)==false){
        $rows[] = $myObj;
        $categories -> $key = $myObj;
        $myObj = new stdClass();
     }
     
     $topic = $r['topic'];
     $resource = $r['resource'];
     $activitiesObj -> key = $key;
     $activitiesObj -> number = $number;
     $activitiesObj -> topic = $topic;
     $activitiesObj -> resource = $resource;
     $activities[] = $activitiesObj;
     $activitiesObj = new stdClass();

}
$jsonActivities = json_encode($activities);
foreach ($activities as $value){
  $key = $value -> key;
  $categories ->$key -> activities [] = $value;
}
$result = array();
$jsonCategories = json_encode($categories);
foreach ($categories as $obj) {
   unset($obj->key); 
   $total = count($obj ->activities);  
   for ($x = 0; $x < $total; $x++) {
     unset($obj ->activities[$x] -> key);
   }
   $result[]  = $obj;
}
echo json_encode($result);
$conn->close();
?>
