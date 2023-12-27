<?php
session_start();

include('db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Use a parameterized query to prevent SQL injection
    $sql = "SELECT * FROM students WHERE student_id = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameter
    $stmt->bind_param("s", $student_id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

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
        <h1>Student Information</h1>
        <p><strong>Student ID:</strong> <?php echo $row['student_id']; ?></p>
        <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo $row['date_of_birth']; ?></p>
		<p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
        <p><strong>Contact Information:</strong> <?php echo $row['contact_information']; ?></p>
        <p><strong>Parent/Guardian:</strong> <?php echo $row['parent_guardian']; ?></p>
        <p><strong>Health Information:</strong> <?php echo $row['health_information']; ?></p>
        <!-- Add more information as needed -->
        <a href="view_users.php">Back to Students List</a>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
        } else {
            echo "Student not found.";
        }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
