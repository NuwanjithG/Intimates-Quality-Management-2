<?php
// Include the database connection file
include 'connect.php';

try {
    // Prepare the SQL statement to fetch the first 10 rows for a specific date and plant
    $stmt = $conn->prepare("
        SELECT TOP 10 
            Username, Style, Customer, Sales_Order, Line_Item, Work_Center, Sample_Quantity, Defect_Quantity, Audit_Status, Date 
        FROM Inline_Round_Details 
        WHERE Date = '18/07/2024' AND Plant = 'A051'");
    
    // Execute the statement
    $stmt->execute();
    
    // Fetch all the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If there is an error, display the error message
    die("<p style='color: red;'>Query failed: " . $e->getMessage() . "</p>");
}

// Pass the data to the HTML page
include 'completed.html';
?>
