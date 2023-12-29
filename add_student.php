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
        <h1>Create New Student</h1>
        <form method="post" action="add_student.php">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="contact_information">Contact Information:</label>
            <input type="text" id="contact_information" name="contact_information" required>

            <label for="parent_guardian">Parent/Guardian:</label>
            <input type="text" id="parent_guardian" name="parent_guardian" required>

            <label for="health_information">Health Information:</label>
            <textarea id="health_information" name="health_information" rows="4" required></textarea>

            <button type="submit">Add Student</button>
        </form>
        <br>
        <a href="manage_students.php">Back to Student Management</a>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
