<?php
	// include('connection.php');
	include('../conn.php');
	session_start();
	
	$name = $_POST["name"];
	$price = $_POST["price"];
	$qty = $_POST["qty"];
	$id = $_POST["id"];

	$sql = "UPDATE class SET `price` = '$price', `total` = '$qty', `detail` = '$name' WHERE `id` = '$id'";

	if (mysqli_query($conn, $sql))
	{
	    echo "New record updated successfully";
	}
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header("Location: index.php");
?>