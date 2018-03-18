<div class="header">
	<div class="body">
		<a href="">About Eventsource</a>
		<div class="kanan">
		<?php
			if (isset($_SESSION["user"])) 
			{
				echo " | <a href='users'>Hello, ".$_SESSION["user"]["name"]."</a>";
				echo " | <a href='login/logout.php'>Logout</a> |";
			}
			else
			{
				echo "
					<a href='/eventsource/register/index.php'>Register</a>|
					<a href='/eventsource/login/index.php'>Login</a>
				";
			}
		?>
		</div>
	</div>
</div>

<div class="body">
	<div class="row">
		<div class="col-4">
			<a href="/eventsource/index.php"><img src="/eventsource/img/logo.png" class="headlogo" alt=""></a>
		</div>
		<div class="col-8">
			<form>
				<input class="form-control searchbox" type="text" placeholder="Search Event..." onkeyup="showResult(this.value)">
				<div id="searchEvent"></div>
				<!-- <button type="submit" class="btn btn-dark searchbtn btn-black" ><i class="fas fa-search"></i>
				</button> -->
			</form>
			<ul>
				<a href=""><li class="eventheader">Event 1</li></a>|
				<a href=""><li class="eventheader">Event 1</li></a>|
				<a href=""><li class="eventheader">Event 1</li></a>|
				<a href=""><li class="eventheader">Event 1</li></a>|
				<a href=""><li class="eventheader">Event 1</li></a>
			</ul>
		</div>
	</div>
	<hr>