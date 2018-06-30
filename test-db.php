<?php

// On WEB_SERVER    
$host="13.236.140.12";              // Host name
$username="gesab001";    // Mysql usernam
$password="ch5t8k4u";           // Mysql password
$db_name="videos";             // Database name
$db_port="3306";   

// Create connection
$conn = new mysqli($host, $username, $password, $db_name,$db_port);
 Check connection
if ($conn->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}else
{
    echo "connected";
}    
?>
