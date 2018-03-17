<?php
	// include('connection.php');
	include('../conn.php');
	session_start();
	$_SESSION["error"]="10";
	$_SESSION["user"]="";
	$error=10;
	if($password!=$repassword) $error=3;
	if(isset($_POST["username"]))
	{
		$error=0;
		$name=$_POST["name"];
		$email=$_POST["email"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$repassword=$_POST["repassword"];
	
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);

		$sqlInsert = "INSERT INTO users (`tipe`, `username`, `password`, `email`, `name`, `status`) VALUES (1, '$username', '$password', '$email', '$name', 1)";
		
		if ($result->num_rows > 0) 
		{
		    while($row = $result->fetch_assoc()) 
		    {
		    	if($row["username"]==$username)
		    	{
		    		$error=1;
		    	}
		    	if($row["email"]==$email)
	    		{
	    			$error=2;
	    		}
		    }
		} 
		else 
		{
		    echo "0 results";
		}
	}
	if($error==1)
	{
		echo "Username is already taken";
		$_SESSION["error"]="1";
		header('Location: index.php');
	}
	else if($error==2)
	{
		echo "Email is already correct";
		$_SESSION["error"]="2";
		header('Location: index.php');
	}
	else if($error==3)
	{
		echo "Your password didn't match!";
		$_SESSION["error"]="3";
		header('Location: index.php');
	}
	else if($error==10)
	{
		header('Location: index.php');
	}
	else if($error==0)
	{
		if (mysqli_query($conn, $sqlInsert))
		{
		    echo "New record created successfully";
		    $sql = "SELECT * FROM users";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
			    while($row = $result->fetch_assoc()) 
			    {
			    	if($row["username"]==$username)
			    	{
			    		$_SESSION["user"] = $row;
			    		break;
			    	}
			    }
			} 
			else 
			{
			    echo "0 results";
			}
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		header('Location: ../index.php');
	}
	$conn->close();
?>