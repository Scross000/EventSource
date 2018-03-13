<?php
$dbhost = 'localhost';
$dbusername = 'id5054791_admin';
$dbpassword = 'events18';
$dbname = 'id5054791_eventsource';

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (!$conn) {
	echo "gagal boi";
}else{
	echo "success";
}
?>