<?php


$filename = str_replace(" ","_",$_GET['filename']) . ".mp4";
$filename = str_replace("|", "_", $filename);
$videoId =  $_GET['videoId'];

$command = "youtube-dl -f 18 " . $videoId . " --output " . $filename;
$output=null;
$resultcode = null;
#exec($command, $output, $resultcode);
while (@ ob_end_flush()); // end all output buffers if any

$proc = popen($command, 'r');




$liveoutput = "";
echo '<pre>';
while (!feof($proc))
{
    $liveoutput = fread($proc, 4096);
    echo $liveoutput;
    @ flush();
}
echo '</pre>';

if ($resultcode==0){
 echo ("<a href=$filename download=$filename><h2>$filename</h2></a><br>");

 $files = glob('*.mp4');
 $sorted_array = $files;
 echo ("<h3>Other downloaded videos</h2>");
 for ($x = 1; $x <= count($sorted_array); $x++) {
  $value = $sorted_array[$x];
  echo ("$x. <a href=$value download=$value>$value</a><br>");
 }
}

?>

