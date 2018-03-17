<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Create Event</title>

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
		    	<h1 class="text-center">Create Event</h1>
				<form action="create-event-process.php" method="post">
					<div class="form-group">
						<label for="inName">Event Name</label>
						<input type="text" class="form-control" name="name" id="inName" placeholder="Enter Event Name" autofocus required>
					</div>
					<div class="form-group">
					    <label for="inDescription">Event Description</label>
					    <textarea class="form-control" name="description" id="inDescription" rows="3"></textarea>
				  	</div>
					<div class="form-group">
						<label for="inLocation">Location</label>
						<input type="text" class="form-control" name="location" id="inLocation" placeholder="Enter Location" required>
					</div>
					<label for="inStartDate">Event Start</label>
					<input type="date" name="start" id="inStartDate">
					<label for="inEndDate">Event End</label>
					<input type="date" name="start" id="inEndDate">
					<div class="form-group">
						<label for="inTime">Event Time</label>
						<input type="text" class="form-control" name="time" id="inTime" placeholder="Enter Event Time (00:00-24:00)" required>
						<!-- <input type="time" name="time" /> -->
					</div>
					<div class="form-group">
						<label for="inUrl">Image URL</label>
						<input type="text" class="form-control" name="url" id="inUrl" placeholder="Enter Image URL" aria-describedby="urlHelp" required>
						<small id="urlHelp" class="form-text text-muted">Use one of free services to upload picture on the internet, for example, <a href="https://www.tinypic.com/" target="_blank">tinypic.com</a> and add the link to your image.</small>
					</div>
					<!-- <div class="form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div> -->
					<!-- <button href="../register" class="btn btn-primary">Register</button> -->
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-black">Submit</button>
						<br>
						<a href="javascript:history.go(-1)">Back</a>
					</div>
					<br><br>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>