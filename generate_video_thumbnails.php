<?php
$videos_dir = '/videos';
$videos_dir = opendir($videos_dir);
$output_dir = '/videos';
while (false !== ($file = readdir($videos_dir))) {
    if ($file != '.' && $file != '..'){
        $in = $videos_dir.'/'.$file;
        $out = $output_dir.$file.'.jpg';
        exec("/usr/local/bin/ffmpeg -itsoffset -105 -i ".$in." -vcodec mjpeg -vframes 1 -an -f rawvideo -s 100x100 ".$out);
    }
}
?>
