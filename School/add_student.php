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

    // Validate and sanitize input (you should perform more validation)
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $date_of_birth = mysqli_real_escape_string($conn, $date_of_birth);

    // Insert the new student record into the database
    $sql = "INSERT INTO students (full_name, date_of_birth) VALUES ('$full_name', '$date_of_birth')";
    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <div class="container">
        <h1>Add New Student</h1>
        <form method="post" action="add_student.php">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <button type="submit">Add Student</button>
        </form>
        <br>
        <a href="view_users.php">Back to Students List</a>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
