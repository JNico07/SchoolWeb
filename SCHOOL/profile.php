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
    <!-- Head content -->
</head>
<body>
    <div class="container">
        <h1>Student Profile</h1>
        <p><strong>Student ID:</strong> <?php echo $row['student_id']; ?></p>
        <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></p>
        <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
        <p><strong>Contact Information:</strong> <?php echo $row['contact_information']; ?></p>
        <p><strong>Parent/Guardian:</strong> <?php echo $row['parent_guardian']; ?></p>
        <p><strong>Health Information:</strong> <?php echo $row['health_information']; ?></p>
        <!-- Add more information as needed -->
        <a href="user_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
<?php
} else {
    echo "Error retrieving student information.";
}

$conn->close();
?>
