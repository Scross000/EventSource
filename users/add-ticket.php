<?php
	// include('connection.php');
	include('../conn.php');
	session_start();
	$id = $_GET["id"];
	$canAdd = 0;
?>

<!DOCTYPE html>
<html>
<head>
<?php include('../head.php');?>
</head>
<body>
<?php 
	include('../header.php');
	if (isset($_SESSION["user"])) 
	{
		$sql = "SELECT * FROM event WHERE `creator` = ".$_SESSION["user"]["id"]." AND `id` = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			$canAdd = 1;
		}
	}
	if($canAdd == 1)
	{
?>
		<div class="container">
			<div class="row">
			    <div class="col">
			    	<h1 class="text-center">Add Ticket</h1>
			    	<form action="add-ticket-process.php" method="post">
						<div class="form-group">
							<label for="inName">Ticket Name</label>
							<input type="text" class="form-control" name="name" id="inName" placeholder="Enter Ticket Name (e.g. VIP)" autofocus required>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="inPrice">Price</label>
									<div class="input-group">
										<div class="input-group-prepend">
								          	<div class="input-group-text">IDR</div>
								        </div>
										<input type="number" class="form-control" name="price" id="inPrice" placeholder="(e.g. IDR10000)" autofocus required>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="inPrice">Quantity</label>
									<div class="input-group">
										<input type="number" class="form-control" name="qty" id="inPrice" placeholder="(e.g. 100pcs)" autofocus required>
										<div class="input-group-prepend">
								          	<div class="input-group-text">Pcs</div>
								        </div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="text-center">
							<br>
							<br>
							<button type="submit" class="btn btn-primary btn-black">Submit</button>
							<br>
							<a href="javascript:history.go(-1)">Back</a>
						</div>
					</form>
			    </div>
			</div>
		</div>
	<?php
	}
	else
	{
		header("Location: ../index.php");
	}
?>
</body>
</html>