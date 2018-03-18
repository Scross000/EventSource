<?php
	session_start();
	// include('connection.php');
	include('../conn.php');
?>

<!DOCTYPE html>
<html>
<?php include('../head.php');?>
<body>
	<?php include('../header.php');
		if (isset($_SESSION["user"])) 
		{
			?>
				<div class="container">
					<div class="row">
					    <div class="col">
					    	<!-- <a class="btn btn-primary" href="javascript:history.go(-1)">Back</a> -->
			    			<a class="btn btn-warning" href="create-event.php">Create Event</a>
					    	
					    	<h1>Manage Your Event</h1>
							<table class="table text-center">
							  	<thead class="thead-dark">
								    <tr>
								      	<th scope="col">#</th>
								      	<th scope="col">Event Name</th>
								      	<th scope="col">Ticket</th>
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
									    	if($row["creator"]==$_SESSION["user"]["id"])
									    	{
										    	$i++;
										    	echo "
													<tr>
												      	<th scope='row'>".$i."</th>
												      	<td>".$row['name']."</td>
												      	<td>";
												      	$sqlticket = "SELECT * FROM class WHERE `event` = ".$row['id'];
														$resultticket = $conn->query($sqlticket);
														if ($resultticket->num_rows > 0)
														{
															while($rowticket = $resultticket->fetch_assoc()) 
									    					{
																echo "<a class='btn btn-primary' href='edit-ticket.php?id=".$rowticket["id"]."'>".$rowticket["detail"]."</a>";
															}
														}
												echo"	<a class='btn btn-success' href='add-ticket.php?id=".$row["id"]."'>+</a>
														<br>";
														if ($resultticket->num_rows > 0) 
														{
												echo"		
												      		<small id='urlHelp' class='form-text text-muted'>Click Tiket for Edit</small>";
														}
														else
														{
												echo"		
												      		<small id='urlHelp' class='form-text text-muted'>Do you sell ticket?<br>Click the button above to sell your ticket</small>";	
														}
												echo"   </td>
												      	<td>";
												      	if ($row["status"]==0)
												      	{
												      		echo "Active";
												      	}
												      	else
												      	{
												      		echo "Deactive";
												      	}
												echo "	</td>
														<td>";
														if ($row["promote"]==0)
												      	{
												      		echo "Active";
												      	}
												      	else
												      	{
												      		echo "Deactive";
												      	}
												echo "	</td>
												      	<td><a class='btn btn-warning'>Edit</a><a class='btn btn-danger'>Delete</a></td>
												    </tr>
										    	";
									    	}
									    }
									}
							  	?>
							  	</tbody>
							</table>
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