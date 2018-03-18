<?php
	// include('connection.php');
	include('../conn.php');
	session_start();
	
	$name = $_POST["name"];
	$price = $_POST["price"];
	$qty = $_POST["qty"];
	$id = $_POST["id"];

	$sql = "INSERT INTO class (`event`, `price`, `total`, `detail`) VALUES ('$id', '$price', '$qty', '$name')";

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