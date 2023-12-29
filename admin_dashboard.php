<?php
session_start();

include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


// Fetch all users from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin - STI College</title>

    <link rel="stylesheet" href="ADMIN/Style/dropdown_menu.css">
    <link rel="stylesheet" href="ADMIN/Style/sidebar_menu.css">
    <link rel="stylesheet" href="ADMIN/Style/grid_layout.css">
    <link rel="stylesheet" href="ADMIN/Style/admin_dashboard.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>

    <div class="container">
        <div class="header">
            <h3>Welcome to the Admin Dashboard</h3>
        </div>

        <div class="content-large">
            <!-- Start Student List Table -->
			<table>
				<tr>
					<th>Student Full name</th>
					<th>Contact</th>
					<th>Parent/Guardian</th>
				</tr>
				<?php
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
							echo "<td>".$row['full_name']."</td>";
							echo "<td>".$row['contact_information']."</td>";  // Corrected column name
							echo "<td>".$row['parent_guardian']."</td>";
						echo "</tr>";
					}
				?>
			</table>
            <!-- End Student List Table -->
            
            
			<a href="view_users.php">
				<button class="manage-student-button">
					Manage Students
				</button>
			</a> 
            

        </div>

        <div class="footer">
            @CS501P
        </div>
    </div>

    <!-- Start Navigation Bar -->
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
				<button class="dropbtn"><h3>ADMIN</h3></button>
					<div class="dropdown-content">
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
					<a href="admin_dashboard.php">
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
    <!-- End Navigation Bar -->


	<script src="Script/sidebar.js"> </script>

</body>
</html>



<?php
} else {
    echo "No users found.";
}

$conn->close();
?>
