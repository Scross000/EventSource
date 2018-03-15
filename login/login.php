<?php
	// include('connection.php');
	include('../conn.php');
	session_start();
	$_SESSION["error"]="10";
	$_SESSION["user"]="";
	$username=$_POST["username"];
	$password=$_POST["password"];
	echo $username." - ".$password;

	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);

	$error=10;
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	if($row["username"]==$username || $row["email"]==$username)
	    	{
	    		$error=2;
	    		if($row["password"]==$password)
	    		{
	    			if($row["status"]==1)
	    			{
		    			$_SESSION["user"]=$row;
		    			$error=0;
		    			// $_SESSION["id"]=$row["id"];
		    			// $_SESSION["username"]=$row["username"];
		    			// $_SESSION["email"]=$row["email"];
		    			// $_SESSION["password"]=$row["password"];
		    			// $_SESSION["name"]=$row["name"];
		    			// $_SESSION["tipe"]=$row["tipe"];
		    			// $_SESSION["description"]=$row["description"];
		    			// $_SESSION["img_url"]=$row["img_url"];
		    			// $_SESSION["status"]=$row["status"];
	    			}
	    			else
	    			{
	    				$error=3;
	    			}
	    		}
	    	}
	    }
	} else {
	    echo "0 results";
	}
	if($error==1)
	{
		echo "Username not found";
		$_SESSION["error"]="1";
		header('Location: index.php');
	}
	else if($error==2)
	{
		echo "Password is not correct";
		$_SESSION["error"]="2";
		header('Location: index.php');
	}
	else if($error==3)
	{
		echo "Account has been blocked!";
		$_SESSION["error"]="3";
		header('Location: index.php');
	}
	else if($error==10)
	{
		header('Location: index.php');
	}
	else if($error==0)
	{
		header('Location: ../index.php');
	}
	$conn->close();
?>