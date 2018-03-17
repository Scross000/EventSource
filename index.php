<?php
// include('connection.php');
	include('conn.php');
	// include('conn1.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<<<<<<< HEAD
<head>
	<title>Event Source</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include('head.php');?>
<body>
	<div>
		<?php
			if (isset($_SESSION["user"])) 
			{
				echo "<a class='btn btn-primary' href='users'>User Panel</a>";
			}
			else
			{
				echo "<a class='btn btn-primary' href='login'>Login</a>";
			}
		?>
	</div>
	<!-- header -->
		<?php include('header.php');?>
	<!-- Carousel -->
	<div id="eventCarousel" class="carousel slide" data-ride="Carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php
				$sql = "SELECT * FROM event WHERE promote = 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$i = 0;
					while ($row = $result->fetch_assoc()) {
						if ($i == 0) {
							echo "<li data-target='#eventCarousel' data-slide-to='$i' class='active'></li>";
						}else{
							echo "<li data-target='#eventCarousel' data-slide-to='$i'></li>";
						}
						$i+=1;
					}
				}
			?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php
				$sql = "SELECT * FROM event WHERE promote = 1 ORDER BY id DESC";
				$result = $conn->query($sql);
				if ($result->num_rows > 0 ) {
					$i = 1;
					while($row = $result->fetch_assoc()) {
						$eventId = $row["id"];
						$namaEvent = $row["name"];
						//$imgUrl = "images/".$row["img_url"];
						$imgUrl = "images/testing.jpg";
						if ($i == 1) {
							echo 
							"
							<div class='item active'>
								<form action='details/' method='POST'>
									<a href='javascript:;' onclick='parentNode.submit();'>
										<img src='$imgUrl' alt='$namaEvent'></a>
									<input type='hidden' name='id' value='$eventId'>
								</form>
							</div>
							"
							;
						}else{
							echo 
							"
							<div class='item'>
								<form action='details/' method='POST'>
									<a href='javascript:;' onclick='parentNode.submit();'>
										<img src='$imgUrl' alt='$namaEvent'></a>
									<input type='hidden' name='id' value='$eventId'>
								</form>
							</div>
							"
							;
						}
						$i += 1;
					}
				}
			?>
			
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#eventCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#eventCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
  		</a>
	</div>

	<!-- Event lists -->
	<div>
		<!-- event table -->
		<div style="margin-left: 220px;margin-top: 50px">
			<table id="eventLists" border="bold" width="80%">
				<thead>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
				</thead>

				<tbody>
					<?php
						$sql = "SELECT * FROM event WHERE promote = 1";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							$i = 0;
							while ($row = $result->fetch_assoc()) {
								if ($i == 0) {
									echo "<li data-target='#eventCarousel' data-slide-to='$i' class='active'></li>";
								}else{
									echo "<li data-target='#eventCarousel' data-slide-to='$i'></li>";
								}
								$i+=1;
							}
						}
					?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php
						$sql = "SELECT * FROM event WHERE promote = 1 ORDER BY id DESC";
						$result = $conn->query($sql);
						if ($result->num_rows > 0 ) {
							$i = 1;
							while($row = $result->fetch_assoc()) {
								$eventId = $row["id"];
								$namaEvent = $row["name"];
								//$imgUrl = "images/".$row["img_url"];
								$imgUrl = "images/testing.jpg";
								if ($i == 1) {
									echo
									"
									<div class='item active'>
																				<form action='details/' method='POST'>
																															<a href='javascript:;' onclick='parentNode.submit();'>
																																<img src='$imgUrl' alt='$namaEvent'></a>
																															<input type='hidden' name='id' value='$eventId'>
																				</form>
									</div>
									"
									;
								}else{
									echo
									"
									<div class='item'>
																				<form action='details/' method='POST'>
																															<a href='javascript:;' onclick='parentNode.submit();'>
																																<img src='$imgUrl' alt='$namaEvent'></a>
																															<input type='hidden' name='id' value='$eventId'>
																				</form>
									</div>
									"
									;
								}
								$i += 1;
							}
						}
					?>
					
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#eventCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#eventCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- Event lists -->
			<div>
				<!-- event table -->
				<div style="margin-left: 220px;margin-top: 50px">
					<table id="eventLists" class="eventLists" border="bold" width="80%">
						<thead>
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT creator, name, start_date, end_date, img_url FROM event WHERE status = 1 ORDER BY id DESC";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									$i = 0;
									while ($row = $result->fetch_assoc()) {
										if ($i < 5) {
											
										}
										$i+=1;
										if ($i == 5) {
											$i = 0;
										}
									}
								}
							?>
							<tr>
								<td>
									<div align="right">
										<p>judul</p>
										<p>no</p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>