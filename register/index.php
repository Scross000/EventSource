<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Register</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<!-- <div class="col"></div> -->
		    <div class="col">
		    	<h1 class="text-center">Register</h1>
			    <form action="register.php" method="post">
			    	<div class="form-group">
			    		<label for="inName">Name</label>
			    		<input type="text" class="form-control" name="name" id="inName" placeholder="Enter Name" required>
			    	</div>
			    	<div class="form-group">
					    <label for="inEmail">Email address</label>
					    <input type="email" class="form-control" name="email" id="inEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
					    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				  	</div>
			    	<div class="form-group">
			    		<label for="inUsername">Username</label>
			    		<input type="text" class="form-control" name="username" id="inUsername" placeholder="Enter Username" required>
			    	</div>
				  	<div class="form-group">
				    	<label for="inPassword">Password</label>
				    	<input type="password" class="form-control" name="password" id="inPassword" placeholder="Password" required>
				  	</div>
				  	<div class="form-group">
				    	<label for="rePassword">Confirmation Password</label>
				    	<input type="password" class="form-control" name="repassword" id="rePassword" placeholder="Retype your Password" required>
				  	</div>
				  	<!-- <div class="form-check">
				    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
				    	<label class="form-check-label" for="exampleCheck1">Check me out</label>
				  	</div> -->
				  	<!-- <button href="../register" class="btn btn-primary">Register</button> -->
				  	<div class="text-center">
				  		<button type="submit" class="btn btn-primary">Submit</button>
					  	<br>
					  	<a href="javascript:history.go(-1)">Back</a>
				  	</div>
				  	<br><br>
				</form>
				<?php
			  		if(isset($_SESSION["error"]))
			  		{
				  		if($_SESSION['error']==1)
				  		{
				  			?>
				  			<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  	<strong>Whoops!</strong> Username is already taken!
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    	<span aria-hidden="true">&times;</span>
							  	</button>
							</div>
				  			<!-- <div class="alert alert-danger" role="alert">
							  	Username not found!
							</div> -->
				  			<?php
				  		}
				  		else if($_SESSION['error']==2)
				  		{
				  			?>
				  			<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  	<strong>Whoops!</strong> Email is already taken!
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    	<span aria-hidden="true">&times;</span>
							  	</button>
							</div>
				  			<!-- <div class="alert alert-danger" role="alert">
							  	Password is not correct!
							</div> -->
				  			<?php
				  		}
				  		else if($_SESSION['error']==3)
				  		{
				  			?>
				  			<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  	<strong>Whoops!</strong> Your password didn't match!
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    	<span aria-hidden="true">&times;</span>
							  	</button>
							</div>
				  			<!-- <div class="alert alert-danger" role="alert">
							  	Password is not correct!
							</div> -->
				  			<?php
				  		}
			  		}
			  	?>
		    </div>
		    <!-- <div class="col"></div> -->
		</div>
	</div>
</body>
</html>