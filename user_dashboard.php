<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>

	<link rel="stylesheet" href="Style/Dashboard/sidebar_menu.css">
	<link rel="stylesheet" href="Style/Dashboard/dropdown_menu.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>

	<div class="wrapper hover_collapse">
		<div class="top_navbar">
			<div class="logo">STI College</div>
			<div class="menu">
				<div class="hamburger">
					<i class="fas fa-bars"></i>
				</div>
			</div>
			
					
			<!-- Start Profile dropdown menu -->
			<div class="dropdown" style="float:right;">
				<button class="dropbtn"><?php echo $_SESSION['full_name']?></button>
					<div class="dropdown-content">
						<a href="profile.php">View Profile</a>
						<a href="logout.php">Logout</a>
				</div>
			</div>

			<!-- End Profile dropdown menu -->

		</div>

		<div class="sidebar">
			<div class="sidebar_inner">
			<ul>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-qrcode"></i></span>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-link"></i></span>
						<span class="text">Courses</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-book"></i></span>
						<span class="text">Assignments</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-eye"></i></span>
						<span class="text">Overview</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-calendar"></i></span>
						<span class="text">Event</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-question-circle"></i></span>
						<span class="text">About</span>
					</a>
				</li>

			</ul>
			</div>
		</div>

	</div>

<script src="Script/sidebar.js"> </script>

</body>
</html>

