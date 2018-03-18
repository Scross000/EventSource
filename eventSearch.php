<?php
	//include('connection.php');
	include('conn.php');

	$searchedName = $_GET["q"];

	if (strlen($searchedName)>0) {
		$sql = "SELECT * FROM event WHERE status = 1";
		$result = $conn->query($sql);
		$hint = "";

		if ($result->num_rows > 0 ) {
			while ($row = $result->fetch_assoc()) {
				$eventId = $row["id"];
				$eventName = $row["name"];
				if (strpos($eventName, $searchedName) !== false) {
					if ($hint == "") {
						$hint="<a href='details/?q=".$eventId."'>".$eventName."</a>";
					}else{
						$hint=$hint."<br> <a href='details/?q=".$eventId."'>".$eventName."</a>";
					}
				}
			}
		}
	}

	if ($hint == "") {
		$response = "no event";
	}else{
		$response = $hint;
	}

	echo $response;
	
?>