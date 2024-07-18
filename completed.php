<?php
// Start the session
session_start();

// Include the database connection file
include 'connect.php';

// Assuming the logged-in user's username is stored in a session variable
$username = $_SESSION['username'];

try {
    // Fetch the user's plant based on their username
    $stmt = $conn->prepare("SELECT Plant FROM User_Details WHERE Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $userPlant = $stmt->fetchColumn();

    if ($userPlant) {
        // Prepare the SQL statement to fetch the first 10 rows for a specific date and plant
        $stmt = $conn->prepare("
            SELECT TOP 10 
                Username, Style, Customer, Sales_Order, Line_Item, Work_Center, Sample_Quantity, Defect_Quantity, Audit_Status, Date 
            FROM Inline_Round_Details 
            WHERE Date = '18/07/2024' AND Plant = :Plant");
        
        // Bind the plant parameter
        $stmt->bindParam(':Plant', $userPlant);
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch all the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        die("<p style='color: red;'>No plant information found for the user</p>");
    }

} catch (PDOException $e) {
    // If there is an error, display the error message
    die("<p style='color: red;'>Query failed: " . $e->getMessage() . "</p>");
}

// Pass the data to the HTML page
include 'completed.html';
?>
