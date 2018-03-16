<?php
	include('../conn1.php');
	session_start();
	$eventId = $_POST['id'];
	$sqlCommand = "SELECT * FROM event WHERE id = '$eventId'";
	$result = $conn->query($sqlCommand);
	$namaEvent;$periodeEvent;$jamEvent;$lokasiEvent;$contactPerson;
	$details;$imgUrl;

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$namaEvent = $row["name"];
			$periodeEvent = $row["start_date"]." Till ".$row["end_date"];
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
<head>
	<title>Event Source</title>
</head>
<body>
	<!-- header -->
	<div>
		<nav>
			
		</nav>
	</div>
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
			<table>
				<thead>
					<th>Jenis Tiket</th>
					<th>Jumlah Tiket</th>
					<th>Harga Tiket</th>
				</thead>
				<tbody>
					
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