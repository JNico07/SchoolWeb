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
	<title>Dashboard - STI College</title>

	<link rel="stylesheet" href="Style/General/sidebar_menu.css">
	<link rel="stylesheet" href="Style/General/dropdown_menu.css">

	<link rel="stylesheet" href="Style/Dashboard/grid_layout.css">
	<link rel="stylesheet" href="Style/Dashboard/user_dashboard.css">
	<link rel="stylesheet" href="Style/Dashboard/calendar.css">
	<link rel="stylesheet" href="Style/Dashboard/dycalendar.css">
	<link rel="stylesheet" href="Style/Dashboard/awards.css">

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>
	<!-- start content -->
	<div class="container">
        <div id="header">
			<a href="user_dashboard.php"><h2>Dashboard</h2></a>
			<hr>
		</div>
		
        <div id="courses">
			<h3 id="title">Courses</h5>
			<hr>
			<a href="#">
				<div>
					<h5>Software Engineering</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Articial Intelligence</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Application Development</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Theory of Computation of Automata</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Cybersecurity Fundamentals</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Game Development</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Computer Programming</h5>
				</div>
			</a>
			<a href="#">
				<div>
					<h5>Numerical methods in scientific computing</h5>
				</div>
			</a>
		</div>
		
		<!-- Start Calendar -->
        <div id="content-small1">
				<div id="dycalendar"></div>
		</div>
		<!-- End Calendar -->

		<!-- Start Awards -->
        <div id="content-small2">
			<h4>Awards</h4>
			<hr>
			<div class="content">
				<div>Programmer</div>
				<div>Slide Succesor</div>
				<div>Avid Reader</div>
				<div>Writing Wizard</div>
				<div>Creative Mind</div>
			</div>
		</div>
		<!-- Start Awards -->

        <div id="footer">
			@CS501P
		</div>
    </div>
	<!-- end content -->

	<div class="wrapper hover_collapse">
		
		<!-- Start Top Navbar -->
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
		<!-- End Top Navbar -->

		<!-- Start Sidebar menu -->
		<div class="sidebar">
			<ul>
				<li>
					<a href="user_dashboard.php">
						<span class="icon"><i class="fa fa-home"></i></span>
						<span class="text">Home</span>
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
						<span class="icon"><i class="fa fa-bullseye"></i></span>
						<span class="text">Goals</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-circle"></i></span>
						<span class="text">Groups</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"><i class="fa fa-qrcode"></i></span>
						<span class="text">Resources</span>
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
		<!-- End Sidebar menu -->
		
	</div>


	<script src="Script/sidebar.js"> </script>
	<script src="Script/dycalendar.js"> </script>
	<script src="Script/calendar.js"> </script>

</body>
</html>

