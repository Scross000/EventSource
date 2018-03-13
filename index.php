<?php 
// include('connection.php');
	include('conn.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Source</title>
</head>
<body>
	<?php
		if(isset($_SESSION["user"]))
		{
			?>
				<p><a href="login/logout.php">Logout</a></p>
			<?php
		}
		else
		{
			?>
				<p><a href="login">Login</a></p>
			<?php
		}
	?>
</body>
</html>