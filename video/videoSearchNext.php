<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}
.header {
    border: 1px solid red;
    padding: 15px;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
    border: 1px solid red;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
</style>
</head>
<body>

<div class="header">
  <h1>Saberon Videos</h1>
</div>

<div class="row">

<div class="col-3">
  <ul>
    <li>The Flight</li>
    <li>The City</li>
    <li>The Island</li>
    <li>The Food</li>
  </ul>

<h2>Update Video Info</h2>

<form action="/videoUpdate.php" method="post">
  Video ID:<br>
  <input type="text" name="videoID" placeholder = "word or phrase">
  <br>
  Title:<br>
  <input type="text" name="title" placeholder = "word or phrase">
  <br>
  Category:<br>
  <input type="text" name="category" placeholder = "word or phrase">
  <br>
  Description:<br>
  <input type="text" name="description" placeholder = "word or phrase">
  <br>
  Location:<br>
  <input type="text" name="location" placeholder = "word or phrase">
  <br>

  <br>
  <input type="submit" value="Submit">
</form> 

<?php

include 'videoFilesDisplayAll.php'; 

?>

</div>

<div class="col-9">
<form action="/videoSearch.php" method="post">
  keyword:<br>
  <input type="text" name="keyword" value = <?php echo $_POST['nextKey']; ?> >
  <input type="number" name="next" value = <?php echo $id; ?> placeholder = "word or phrase">
  <br>
  <br>
  <input type="submit" value="Submit">
  <button type="submit"  formaction="videoSearchNext.php">Next</button>

</form> 
<?php

$servername = localhost;
$username = "root";
$password = "ch5t8k4u";
$dbname = "videos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
} 
echo "Connected to mysql database successfully \r\n";
echo "<br>";

$nextKey = $_POST['next']+1;

$sql = "SELECT * FROM homemade WHERE id='$nextKey'";
$result = $conn->query($sql);

$filename;
$title;
$filepath;
$paragraph;
$word;
$id;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $title = $row["title"];
                $description = $row["description"];
                $filename = $row["filename"];
                $filepath = $row["filepath"];
                $heading = $id . " " . $title;
                echo "<br>";
                $url = $filepath . $filename;
                echo '<h1>'.$heading.'</a></h1>';
                echo '<video width=50% height=auto  id="myVideo" controls autoplay>
                                <source src="'.$url.'" id="mp4Source" type="video/mp4">
                                Your browser does not support the video tag.</video>';
                echo '<p>'.$description.'</p>';

 }
}

if ($result->num_rows == 0)
{
        echo "word does not exist";
}




$conn->close();

include 'videoSearchForm1.php';
?>

</div>

</div>

</body>
</html>
