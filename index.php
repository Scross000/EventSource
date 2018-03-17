<?php 
// include('connection.php');
//	include('conn.php');
	include('conn1.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Source</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- header -->
	<div>
		
	</div>

	<!-- Carousel -->
	<div id="eventCarousel" class="carousel slide" data-ride="Carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#eventCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#eventCarousel" data-slide-to="1"></li>
		    <li data-target="#eventCarousel" data-slide-to="2"></li>
		    <li data-target="#eventCarousel" data-slide-to="3"></li>
		    <li data-target="#eventCarousel" data-slide-to="4"></li>
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
</body>
</html>