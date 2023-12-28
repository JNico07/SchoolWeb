<?php
session_start();

include('db.php'); // Include your database connection file

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve student information from the database based on user_id
$sql = "SELECT * FROM students WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile - STI College</title>

    <link rel="stylesheet" href="Style/Dashboard/sidebar_menu.css">
	<link rel="stylesheet" href="Style/Dashboard/dropdown_menu.css">
	<link rel="stylesheet" href="Style/Dashboard/user_dashboard.css">

    <link rel="stylesheet" href="Style/Profile/grid_layout.css">
    <link rel="stylesheet" href="Style/Profile/profile.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>

    <div class="container">
        <div class="header">
            <div>
                <img id="user-img" src="https://baycityfireworksfestival.com/wp-content/uploads/2019/03/avatar-1577909_960_720.png" alt="Avatar">
                <h5><?php echo $row['full_name']; ?></h5>
            </div>
        </div>

        <div class="content-large">
            <h4>Information</h4>
            <hr>
            <div>
                <ul>
                    <li><p><strong>Student ID:</strong> <?php echo $row['student_id']; ?></p></li>
                    <li><p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p></li>
                    <li><p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></p></li>
                    <li><p><strong>Gender:</strong> <?php echo $row['gender']; ?></p></li>
                    <br>
                    <li><p><strong>Contact Information:</strong> <?php echo $row['contact_information']; ?></p></li>
                    <li><p><strong>Health Information:</strong> <?php echo $row['health_information']; ?></p></li>
                </ul>
            </div>
            
        </div>

        <div class="content-small">
            <h5>Parent/Guardian</h5>
            <hr>
            <a href="#"><p><?php echo $row['parent_guardian']; ?></p></a>
        </div>
        <div class="footer">@CS501P</div>
    </div>


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



</body>
</html>

<?php
} else {
    echo "Error retrieving student information.";
}

$conn->close();
?>
