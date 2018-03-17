<?php
	// include('connection.php');
	include('../conn.php');
	session_start();

	$name = $_POST["name"];
	$detail = $_POST["description"];
	$location = $_POST["location"];
	$time = $_POST["time"];
	$start = $_POST["start"];
	$end = $_POST["end"];
	$url = $_POST["url"];
	$status = 0;
	$promote = 0;
	$creator = $_SESSION["user"]["id"];

	$sql = "INSERT INTO event (`creator`, `name`, `detail`, `location`, `jam`, `start_date`, `end_date`, `img_url`, `status`, `promote`) VALUES ('$creator', '$name', '$detail', '$location', '$time', '$start', '$end', '$url', '$status', '$promote')";

	if (mysqli_query($conn, $sql))
	{
	    echo "New record created successfully";
	}
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header("Location: index.php");
?>