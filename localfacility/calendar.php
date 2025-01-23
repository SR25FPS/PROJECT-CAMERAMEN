<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #fafafa;
            display: flex;
            color: rgb(8, 7, 7);
        }
        .sidebar {
            width: 200px;
            background-color: #1e1e1f;
            padding: 20px;
            color: white;
            position: fixed;
            height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            border-bottom: 1px solid #353535; 
        }
        .sidebar a:hover {
            background-color: #141414;
        }
        .content {
            margin-left: 210px; /* Space for the sidebar */
            padding: 20px;
            flex-grow: 1;
            height: 100vh; /* Full height of the viewport */
            overflow: auto; /* Allow scrolling if content exceeds the height */
        }
        .container {
            display: flex;
            height: 100%; /* Full height of the content area */
            justify-content: center; /* Center content horizontally */
            align-items: flex-start; /* Align content to the top */
        }
        .bottom-section {
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            text-align: center;
            background-color: #000; 
            color: white; 
            padding: 20px; 
            border-radius: 0px; 
            width: 60em; /* Full width of the container */
            height: 35em; /* Full height of the container */
        }
        table {
            width: 100%; /* Table width set to 100% of the bottom section */
            border-collapse: collapse;
            margin-top: 20px; 
            color: white; 
        }
        th, td {
            border: 1px solid white; 
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #444; 
        }
        .invisible {
            display: none; /* This class will hide the priority ID */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="templogo.png" alt="Logo" style="height: 40px; margin-bottom: 20px;">
        <a href="testrun2.html">Home</a>
        <a href="http://localhost/localfacility/input.php">Book</a>
        <a href="http://localhost/localfacility/calendar.php">Calendar</a>
        <span style="color: white; margin-top: 20px;">Version 1.0</span>
        <a href="update-log.html">Update Log</a>
    </div>
    
    <div class="content">
        <div class="container">
            <div class="bottom-section">
                <h1>Users Data</h1>
                <table>
                    <tr>
                        <th class="invisible">Priority ID</th> <!-- Invisible column for sorting -->
                        <th>Reserved By</th>
                        <th>Facility ID</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Event</th>
                    </tr>
                    <?php
                        include 'connect.php';
                        $sql = "SELECT priority_id, reservedby, facility_id, start_time, end_time, event FROM general_data ORDER BY priority_id";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>"; // Opening the table row
                                echo "<td class='invisible'>" . htmlspecialchars($row["priority_id"]) . "</td>"; // Output Priority ID (hidden)
                                echo "<td>" . htmlspecialchars($row["reservedby"]) . "</td>"; // Output Reserved By
                                echo "<td>" . htmlspecialchars($row["facility_id"]) . "</td>"; // Output Facility ID

                                // Format Start Time
                                $start_time = new DateTime($row["start_time"]);
                                $formatted_start = $start_time->format('Y, F j - g:i A');
                                echo "<td>" . htmlspecialchars($formatted_start) . "</td>"; // Output Start Time

                                // Format End Time
                                $end_time = new DateTime($row["end_time"]);
                                $formatted_end = $end_time->format('Y, F j - g:i A');
                                echo "<td>" . htmlspecialchars($formatted_end) . "</td>"; // Output End Time

                                echo "<td>" . htmlspecialchars($row["event"]) . "</td>"; // Output Event
                                echo "</tr>"; // Closing the table row
                            }
                        } else {
                            echo "<tr><td colspan='6'>0 results</td></tr>";
                        }

                        $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>