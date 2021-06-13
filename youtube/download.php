<?php
$filename = str_replace(" ","_",$_GET['filename']) . ".mp4";
$videoId =  $_GET['videoId'];

echo "videoId: " . $videoId;
echo "\n";
echo "filename: " . $filename;
echo "\n";
echo "downloading...please wait";
echo "\n";
$command = "youtube-dl -f 18 https://www.youtube.com/watch?v=" . $videoId. " --output " . $filename;
$output = shell_exec($command);
echo "<pre>$output</pre>";
?>

<html>
<a href="<?php echo $filename;?>" download="<?php echo $filename;?>">Download</a>
</html>

