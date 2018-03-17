<?php
	session_start();
	// include('connection.php');
	include('../conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User Panel</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
		    <div class="col">
		    	<?php
		    		if (isset($_SESSION["user"])) 
		    		{
		    			?>
		    			<!-- <a class="btn btn-primary" href="javascript:history.go(-1)">Back</a> -->
		    			<a class="btn btn-primary" href="..">Home</a>
		    			<a class="btn btn-warning" href="create-event.php">Create Event</a>
		    			<a class="btn btn-danger" href="../login/logout.php">Logout</a>
		    			<?php
		    		}
		    	?>
				<table class="table">
				  	<thead class="thead-dark">
					    <tr>
					      	<th scope="col">#</th>
					      	<th scope="col">Event Name</th>
					      	<th scope="col">Status</th>
					      	<th scope="col">Promote</th>
					      	<th scope="col">Action</th>
					    </tr>
				  	</thead>
				  	<tbody>
				  	<?php
				  		$i=0;
				  		$sql = "SELECT * FROM event";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) 
						{
						    while($row = $result->fetch_assoc()) 
						    {
						    	$i++;
						    	echo "
									<tr>
								      	<th scope='row'>".$i."</th>
								      	<td>".$row['name']."</td>
								      	<td>".$row['status']."</td>
								      	<td>".$row['promote']."</td>
								      	<td><a class='btn btn-warning'>Edit</a><a class='btn btn-danger'>Delete</a></td>
								    </tr>
						    	";
						    }
						}
				  	?>
				  	</tbody>
				</table>
		    </div>
		</div>
	</div>
</body>
</html>