<?php
session_start();

include('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
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

    <link rel="stylesheet" href="Style/General/sidebar_menu.css">
	<link rel="stylesheet" href="Style/General/dropdown_menu.css">

    <link rel="stylesheet" href="Style/ADMIN/Admin_Dashboard/admin_dashboard.css">

	<link rel="stylesheet" href="Style/ADMIN/Add_Student_Form/grid_layout.css">

	<link rel="stylesheet" href="Style/General/prev_btn.css">

	<link rel="stylesheet" href="Style/ADMIN/Manage_Students/manage_students.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>

    <div class="container">
        <div class="header">
            <h3>Student Management</h3>
        </div>

        <div class="content-large">

			<div id="table-wrapper">
				<!-- Start Student List Table -->
				<table>
					<tr>
						<th>Student Full name</th>
						<th>Actions</th>
					</tr>
					<?php
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>".$row['full_name']."</td>";
							echo "<td><a href='view_profile_admin.php?id=".$row['student_id']."'>View</a> | <a href='edit_user.php?id=".$row['student_id']."'>Edit</a> | <a href='delete_user.php?id=".$row['student_id']."'>Delete</a></td>";
							echo "</tr>";
						}
					?>
				</table>
				<!-- End Student List Table -->
			</div>
            
			<div id="container-btn">
                        
				<button id="prev_btn">
					<a href="admin_dashboard.php" class="previous round">&#8249;</a>
				</button>

				<a href="add_student.php">
					<button class="manage-student-button">
						Add New Student
					</button>
				</a> 
                        
            </div>

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
					<a href="manage_students.php">
						<span class="icon"><i class="fa fa-link"></i></span>
						<span class="text">Management</span>
					</a>
				</li>
				<li>
					<a href="add_student.php">
						<span class="icon"><i class="fa fa-bullseye"></i></span>
						<span class="text">Add</span>
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

