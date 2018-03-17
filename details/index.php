<?php
	// include('../conn1.php');
	include('../conn.php');
	session_start();
	$eventId = $_POST['id'];
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
			$periodeEvent = $start." Till ".$end;
			$jamEvent = $row["jam"];
			$details = $row["detail"];
			$lokasiEvent = $row["location"];
			$imgUrl = "images/".$row["img_url"];
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
		<!-- picture -->
		<div>
			<img src="lalala.jpg">
		</div>

		<!-- detail -->
		<br>
		<div>
			<h3><?php echo $namaEvent;?></h3>
			<br>
			<h3><?php echo $periodeEvent;?></h3>
			<br>
			<h3><?php echo $jamEvent;?></h3>
			<br>
			<h3><?php echo $lokasiEvent;?></h3>
			<br>
			<h3><?php echo $contactPerson;?></h3>
		</div>
		<!-- table harga -->
		<div>
			<table border="bold">
				<thead>
					<th>No.</th>
					<th>Jenis Tiket</th>
					<th>Jumlah Tiket</th>
					<th>Harga Tiket</th>
				</thead>
				<tbody>
					<?php
						// mengambil daftar harga tiket event
						$sqlClass = "SELECT * FROM class WHERE event = '$eventId'";
						$result2 = $conn->query($sqlClass);
						$i = 1;
						if ($result2->num_rows > 0) {
							while ($row = $result2->fetch_assoc()) {
								$jenis = $row["detail"];
								$jumlah = $row["total"];
								$harga = $row["price"];
								echo 
								"<tr>
									<th>$i</th>
									<th>$jenis</th>
									<th>$jumlah</th>
									<th>$harga</th>
								</tr>";
								$i +=1;
							}
						}
					?>
				</tbody>
			</table>
		</div>

		<!-- detail lainnya -->
		<div>
			<p><?php echo $details;?></p>
		</div>
	</div>
</body>
</html>