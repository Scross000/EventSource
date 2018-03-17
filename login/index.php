<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php include('../head.php');?>
	<body>
		<!-- header -->
		<?php include('../header.php');?>
			<div class="row">
				<div class="col">
					<h1 class="text-center">Login</h1>
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="inUsername">Username</label>
							<input type="text" class="form-control" name="username" id="inUsername" placeholder="Enter Username/Email" autofocus required>
						</div>
						<!-- <div class="form-group">
							<label for="inEmail">Email address</label>
							<input type="email" class="form-control" name="email" id="inEmail" aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div> -->
						<div class="form-group">
							<label for="inPassword">Password</label>
							<input type="password" class="form-control" name="password" id="inPassword" placeholder="Password" required>
						</div>
						<!-- <div class="form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div> -->
						<!-- <button href="../register" class="btn btn-primary">Register</button> -->
						<button type="submit" class="btn btn-primary  btn-black">Submit</button>
						<br>
						<a href="../register">Not have an account yet? Register here!
							<br><br>
						</a>
					</form>
					<?php
						if(isset($_SESSION["error"]))
						{
							if($_SESSION['error']==1)
							{
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Whoops!</strong> Username not found!
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
						<strong>Whoops!</strong> Password is not correct!
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
						<strong>Warning!</strong> Account has been blocked!
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
				<div class="col vll"></div>
			</div>
		</div>
	</body>
</html>