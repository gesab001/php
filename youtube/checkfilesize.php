<?php

// get the q parameter from URL
$q = $_REQUEST["filename"];
$filename = str_replace(" ","_",$_GET['filename']) . ".mp4.part";
// Output "no suggestion" if no hint was found or output correct values
echo filesize($filename);
?>
