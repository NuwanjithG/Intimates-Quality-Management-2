<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Connection Test</h1>
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
            echo "<p class='success'>Connected successfully</p>";

        } catch (PDOException $e) {
            // If there is an error, display the error message
            echo "<p class='error'>Connection failed: " . $e->getMessage() . "</p>";
        } finally {
            // Check if the connection was established before attempting to close it
            if (isset($conn)) {
                // Close the connection
                $conn = null;
            }
        }
        ?>
    </div>
</body>
</html>
