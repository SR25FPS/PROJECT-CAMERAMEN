<?php
include 'connect.php'; // Include your database connection file

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
        echo "New record created successfully with priority_id: " . $next_priority_id;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>