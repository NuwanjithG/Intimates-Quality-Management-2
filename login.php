<?php
session_start(); // Initialize the session

// Include the database connection file
include 'connect.php';

// Assuming $user_name and $password are set from user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM User_Details WHERE Username = :username AND Password = :password");
    $stmt->bindParam(':username', $user_name);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if user exists
    if (count($result) > 0) {
        // Store username in session variable
        $_SESSION['username'] = $user_name;

        // Redirect to main menu page upon successful login
        header("Location: Main_Menu.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "<p>Invalid username or password.</p>";
    }
} else {
    echo "<p>Please submit the form.</p>";
}
?>
