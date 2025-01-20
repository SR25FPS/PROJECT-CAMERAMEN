<?php
include 'connect.php'; // Include your database connection file

// Start output buffering to allow HTML output before any PHP code
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data - Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .navbar {
            background-color: #1e1e1f;
            padding: 10px 20px;
            color: white;
            position: fixed; /* Make the navbar fixed */
            top: 0; /* Stick to the top */
            left: 0; /* Align to the left */
            right: 0; /* Align to the right */
            z-index: 1; 
        }
        .navbar img {
            height: 40px; 
            margin-right: 10px; 
            vertical-align: middle; 
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
        }
        .navbar a:hover {
            background-color: #141414;
        }
        .content {
            margin-top: 80px; /* Add margin to prevent overlap with the fixed navbar */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="templogo.png" alt="Logo">
        <a href="testrun2.html">Home</a>
        <a href="about.html">About</a>
        <a href="http://localhost/localfacility/input.php">Booking</a>
        <a href="http://localhost/localfacility/calendar.php">Calendar</a>
    </div>

    <div class="content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $reservedby = $_POST['reservedby'];
            $facility_id = $_POST['facility_id'];
            $timeframe = $_POST['timeframe'];
            $event = $_POST['event'];

            // Fetch the current maximum priority_id
            $result = $conn->query("SELECT MAX(priority_id) AS max_priority FROM general_data");
            $row = $result->fetch_assoc();
            $next_priority_id = $row['max_priority'] + 1; // Increment the maximum priority_id

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO general_data (priority_id, reservedby, facility_id, timeframe, event) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $next_priority_id, $reservedby, $facility_id, $timeframe, $event);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<h2>Success!</h2>";
                echo "Request Sent. Your Priority is: " . $next_priority_id;
            } else {
                echo "<h2>Error!</h2>";
                echo "Error: " . $stmt->error;
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "<h2>Invalid request method.</h2>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Flush the output buffer
ob_end_flush();
?>