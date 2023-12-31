<?php
    session_start();

    include('db.php');

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form submission
        $full_name = $_POST['full_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $contact_information = $_POST['contact_information'];
        $parent_guardian = $_POST['parent_guardian'];
        $health_information = $_POST['health_information'];

        // Validate and sanitize input (you should perform more validation)
        $full_name = mysqli_real_escape_string($conn, $full_name);
        $date_of_birth = mysqli_real_escape_string($conn, $date_of_birth);
        $gender = mysqli_real_escape_string($conn, $gender);
        $contact_information = mysqli_real_escape_string($conn, $contact_information);
        $parent_guardian = mysqli_real_escape_string($conn, $parent_guardian);
        $health_information = mysqli_real_escape_string($conn, $health_information);

        // Insert the new student record into the database
        $sql = "INSERT INTO students (full_name, date_of_birth, gender, contact_information, parent_guardian, health_information) 
                VALUES ('$full_name', '$date_of_birth', '$gender', '$contact_information', '$parent_guardian', '$health_information')";

        if ($conn->query($sql) === TRUE) {
            $message = "New student added successfully!";
            $alertType = "success";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
            $alertType = "danger";
        }

        // Output the message and alert
        echo "<div id='alert-message' style='display: none;'>$message</div>";
        echo "<div id='alert-type' style='display: none;'>$alertType</div>";
    }
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
    <link rel="stylesheet" href="Style/ADMIN/Add_Student_Form/form.css">

    <link rel="stylesheet" href="Style/General/prev_btn.css">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>
<body>

    <div class="container">
        <div class="header">
            <h3>Add new Student</h3>
        </div>

        <div class="content-large">

            <div id="form-wrapper">
                <!-- Start Student Form -->
                <form method="post" action="add_student.php">
                    <div id="form-title">
                        <h2>New Student</h2>
                        <hr>
                    </div>

                    <div id="input-flex">
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="form-label"> Full Name </label>
                            <input type="text" id="full_name" name="full_name" required class="form-input"/>
                        </div>
                        <!-- Date of Birth -->
                        <div>
                            <label for="date_of_birth" class="form-label"> Date of Birth </label>
                            <input type="date" id="date_of_birth" name="date_of_birth" required class="form-input"/>
                        </div>
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="form-label"> Gender </label>
                            <select id="gender" name="gender" required class="form-input">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div id="input-flex">
                        <!-- Contact Information -->
                        <div>
                            <label for="contact_information" class="form-label"> Contact Information </label>
                            <input type="text" id="contact_information" name="contact_information" required class="form-input"/>
                        </div>
                        <!-- Parent/Guardian -->
                        <div>
                            <label for="parent_guardian" class="form-label"> Parent/Guardian </label>
                            <input type="text" id="parent_guardian" name="parent_guardian" required class="form-input"/>
                        </div>
                        <!-- Health Information -->
                        <div>
                            <label for="health_information" class="form-label"> Health/Information </label>
                            <textarea id="health_information" name="health_information" rows="1" required class="form-input"></textarea>
                        </div>
                    </div>

                    <div id="container-btn">

                        <button id="prev_btn">
                            <a href="manage_students.php" class="previous round">&#8249;</a>
                        </button>

                        <button type="submit" class="btn">Add Student</button>
                        
                    </div>
                </form>
                <!-- End Student Form -->
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
    <script src="Script/alert.js" defer></script>

</body>
</html>

<?php
$conn->close();
?>
