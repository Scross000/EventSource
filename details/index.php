<?php
	// include('../connection.php');
	include('../conn.php');
	session_start();
	if (isset($_GET["q"])) {
		$eventId = $_GET['q'];
	}else{
		$eventId = $_POST['id'];
	}
	$sqlCommand = "SELECT * FROM event WHERE id = '$eventId'";
	$result = $conn->query($sqlCommand);
	$namaEvent;$periodeEvent;$jamEvent;$lokasiEvent;$contactPerson;
	$details;$imgUrl;
	// mengambil detail event berdasarkan id
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$namaEvent = $row["name"];
			$start = new DateTime($row["start_date"]);
			$start = $start->format('d-m-Y');
			$end = new DateTime($row["end_date"]);
			$end = $end->format('d-m-Y');
			$periodeStart = $start;
			$periodeEnd = $end;
			$jamEvent = $row["jam"];
			$details = $row["detail"];
			$lokasiEvent = $row["location"];
			$imgUrl = "../".$row["img_url"];
			$creatorId = $row["creator"];
			$sql = "SELECT email FROM users WHERE id = '$creatorId'";
			$result1 = $conn->query($sql);
			if ($result1->num_rows > 0) {
				while($user = $result1->fetch_assoc()){
					$contactPerson = $user["email"];
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<?php include('../head.php');?>
	<body>
		<!-- header -->
		<?php include('../header.php');?>
		<div>
			<div class="row">
				<!-- picture -->
				<img class="col-3 detailpict" src=<?php echo "$imgUrl";?>>
				<!-- detail -->
				<div class="col details">
					<h2 class="detailname"><?php echo $namaEvent;?></h2>
					<table class="table detaillain">
						<tr>
							<th><i class="fas fa-calendar-alt"></i></th>
							<th>Tanggal Mulai</th>
							<th>:</th>
							<th><?php echo $periodeStart;?></th>
						</tr>
						<tr>
							<th><i class="fas fa-calendar-alt"></i></th>
							<th>Tanggal Selesai</th>
							<th>:</th>
							<th><?php echo $periodeEnd;?></th>
						</tr>
						<tr>
							<th><i class="fas fa-clock"></i></th>
							<th>Waktu</th>
							<th>:</th>
							<th><?php echo $jamEvent;?></th>
						</tr>
						<tr>
							<th><i class="fas fa-map-marker"></i></th>
							<th>Lokasi</th>
							<th>:</th>
							<th><?php echo $lokasiEvent;?></th>
						</tr>
						<tr>
							<th><i class="fas fa-envelope"></i></th>
							<th>Kontak</th>
							<th>:</th>
							<th><?php echo $contactPerson;?></th>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<!-- detail lainnya -->
			<div>
				<h3>Deskripsi Event</h3>
				<p><?php echo $details;?></p>
			</div>
			<!-- table harga -->
			<div>
				<h3>Tiket</h3>
				<table class="table table-hover">
					<thead class="thead-dark" style="text-align: center;">
						<th>Jenis Tiket</th>
						<th>Jumlah Tiket</th>
						<th>Harga Tiket</th>
					</thead>
					<tbody style="text-align: center;">
						<?php
							// mengambil daftar harga tiket event
							$sqlClass = "SELECT * FROM class WHERE event = '$eventId'";
							$result2 = $conn->query($sqlClass);
							if ($result2->num_rows > 0) {
								while ($row = $result2->fetch_assoc()) {
									$jenis = $row["detail"];
									$jumlah = $row["total"];
									$harga = $row["price"];
									echo
									"<tr>
														<th>$jenis</th>
														<th>$jumlah kursi</th>
														<th>Rp. $harga</th>
									</tr>";
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include('../footer.php');?>
</body>
</html>