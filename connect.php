<?php
// Database connection details
$servername = "intseaissqltappprd.database.windows.net";
$username = "INTSEAISSQLTAPPPRDAdmin";
$password = "@welcome123";
$dbname = "intseaissqltappprd01";

try {
    // Create a new PDO instance
    $conn = new PDO("sqlsrv:server=$servername;Database=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If connected successfully, display a message
    echo "<p style='color: green;'>Connected successfully</p>";

} catch (PDOException $e) {
    // If there is an error, display the error message
    echo "<p style='color: red;'>Connection failed: " . $e->getMessage() . "</p>";
}
?>
