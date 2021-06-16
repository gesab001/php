<?php


$filename = str_replace(" ","_",$_GET['filename']) . ".mp4";

$videoId =  $_GET['videoId'];

$filename = "../../downloads/" . $filename;
$command = "youtube-dl -f 18 " . $videoId . " --output " . $filename;

$output = shell_exec($command);

echo ("<a href=" . $filename . " download=" . $filename . ">Save downloaded file.</a>");

?>

