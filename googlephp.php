<?php
$link = mysql_connect('35.193.243.191', 'root', 'ch5t8k4u');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

mysql_select_db('sandsbtob',$link) or die ("could not open db".mysql_error());
?>
