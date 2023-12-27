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
        <h1>Edit Student Information</h1>
        <?php
        // Check if the form was submitted
        if (isset($_POST['save'])) {
            // Validate and sanitize the input
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $full_name = filter_var($_POST['full_name'], FILTER_SANITIZE_STRING);
            $date_of_birth = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_STRING);
            $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
            $contact_information = filter_var($_POST['contact_information'], FILTER_SANITIZE_STRING);
            $parent_guardian = filter_var($_POST['parent_guardian'], FILTER_SANITIZE_STRING);
            $health_information = filter_var($_POST['health_information'], FILTER_SANITIZE_STRING);

            // Use a parameterized query to update the database
            $sql = "UPDATE students SET full_name = ?, date_of_birth = ?, gender = ?, contact_information = ?, parent_guardian = ?, health_information = ? WHERE id = ?";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind the parameters
            $stmt->bind_param("ssssssi", $full_name, $date_of_birth, $gender, $contact_information, $parent_guardian, $health_information, $id);

            // Execute the query
            $stmt->execute();

            // Display a success or error message
            if (mysqli_affected_rows($conn) > 0) {
                echo "<div class='alert alert-success'>Record updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
        <form method="post" action="edit_user.php?id=<?php echo $student_id; ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <!-- Add a hidden input field for the student's ID -->

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" required>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php if ($row['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['gender'] === 'Female') echo 'selected'; ?>>Female</option>
            </select>

            <label for="contact_information">Contact Information:</label>
            <input type="text" id="contact_information" name="contact_information" value="<?php echo $row['contact_information']; ?>" required>

            <label for="parent_guardian">Parent/Guardian:</label>
            <input type="text" id="parent_guardian" name="parent_guardian" value="<?php echo $row['parent_guardian']; ?>" required>

            <label for="health_information">Health Information:</label>
            <textarea id="health_information" name="health_information" rows="4" required><?php echo $row['health_information']; ?></textarea>

            <!-- Add more fields for editing -->

            <button type="submit" name="save">Save Changes</button>
        </form>
        <br>
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

// Close the connection
$conn->close();
?>
