<?php
$host = 'localhost'
$username = 'id5054791_admin'
$password = 'events18'
$dbname = 'id5054791_eventsource'

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	echo "gagal boi";
}else{
	echo "success";
}
?>