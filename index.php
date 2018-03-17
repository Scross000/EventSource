<?php
// include('connection.php');
	include('conn.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<?php include('head.php');?>
<body>
	<!-- header -->
		<?php include('header.php');?>
	<!-- Carousel -->
	<div id="eventCarousel" class="carousel slide" data-ride="carousel">
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
						$details = $row["detail"];	
						$imgUrl = $row["img_url"];
						if ($i == 1) {
							echo 
							"
							<div class='carousel-item active'>
								<form action='details/' method='POST'>
									<a href='javascript:;' onclick='parentNode.submit();'>
										<img class='carouselimg' src='$imgUrl' alt='$namaEvent'>
										<div class='carousel-caption d-none d-md-block'>
										    <h5>$namaEvent</h5>
										    <p>$details</p>
										</div>
									</a>
									
									<input type='hidden' name='id' value='$eventId'>
								</form>
							</div>
							"
							;
						}else{
							echo 
							"
							<div class='carousel-item'>
								<form action='details/' method='POST'>
									<a href='javascript:;' onclick='parentNode.submit();'>
										<img class='carouselimg' src='$imgUrl' alt='$namaEvent'>
										<div class='carousel-caption d-none d-md-block'>
										    <h5>$namaEvent</h5>
										    <p>$details</p>
										</div>
									</a>
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
		<a class="carousel-control-prev" href="#eventCarousel" data-slide="prev" role="button">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#eventCarousel" data-slide="next" role="button">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
	</div>
	<!-- Event lists -->
	<div>
		<!-- event table -->
		<div style="margin-left: 220px;margin-top: 50px">
			<table id="eventLists" class="eventLists" border="bold" width="80%">
				<thead >
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT creator, name, start_date, end_date, img_url FROM event WHERE status = 1 ORDER BY id DESC";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$i = 0;$j = 0;
						while ($j < 5 ) {
							echo "<tr>";
								while ($row = $result->fetch_assoc()) {
									if ($i < 5) {
										$creatorId = $row["creator"];
										$name = $row["name"];
										$start = new DateTime($row["start_date"]);
										$start = $start->format('d-m-Y');
										$end = new DateTime($row["end_date"]);
										$end = $end->format('d-m-Y');
										$periode = $start." Till ".$end;
										$imgUrl = $row["img_url"];
										echo "
											<td>
												<div style='position: relative;text-align: center;'>
													<form action='details/' method='POST'>
														<a href='javascript:;' onclick='parentNode.submit();'>
															<img class='homeimg' src=$imgUrl alt=$name>
															<div class='homeimgcapt'>
																$name
																<br>
																$periode
															</div>
														</a>
														<input type='hidden' name='id' value='$creatorId'>
													</form>
												</div>
											</td>
										";
									}
									$i+=1;
									if ($i == 5) {
										$i = 0;
										break;
									}
								}
							echo "</tr>";
							$j+=1;
						}
					}
				?>
				</tbody>
			</table>
		</div>
	</div>	
</div>
	<?php include('footer.php');?>			
	</body>
</html>