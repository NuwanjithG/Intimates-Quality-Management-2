<?php
session_start(); // Initialize the session

// Include the database connection file
require_once 'connect.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM User_Details WHERE Username = :username AND Password = :password");
    $stmt->bindParam(':username', $user_name);
    $stmt->bindParam(':password', $password);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($result) {
        // Store username and name in session variables
        $_SESSION['username'] = $user_name;
        $_SESSION['name'] = $result['Name'];

        // Convert binary data to Base64
        $profilePicture = base64_encode($result['ProfilePicture']);
        $_SESSION['profile_picture'] = $profilePicture;

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
