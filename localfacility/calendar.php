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
            background-color: #f4f4f4;
            overflow: hidden; 
        }
        .navbar {
            background-color: #1e1e1f;
            padding: 10px 20px;
            color: white;
            position: relative; 
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
        .container {
            display: flex;
            height: calc(100vh - 50px); /* Adjusting height to account for the navbar */
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
        }
        .bottom-section {
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            text-align: center;
            background-color: #000; 
            color: white; 
            padding: 20px; 
            border-radius: 5px; 
            width: 80%; /* Set width to 80% of the container */
            max-height: 80%; /* Set maximum height to 80% of the viewport */
            overflow: auto; /* Allow scrolling if the content exceeds the max height */
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
    <div class="navbar">
        <img src="templogo.png" alt="Logo">
        <a href="home-temp.html">Home</a>
        <a href="about.html">About</a>
        <a href="http://localhost/localfacility/input.php">Booking</a>
        <a href="http://localhost/localfacility/calendar.php">Calendar</a>
    </div>
    <div class="container">
        <div class="bottom-section">
            <h1>Users Data</h1>
            <table>
                <tr>
                    <th class="invisible">Priority ID</th> <!-- Invisible column for sorting -->
                    <th>Reserved By</th>
                    <th>Facility ID</th>
                    <th>Timeframe</th>
                    <th>Event</th>
                </tr>
                <?php
                    include 'connect.php';
                    $sql = "SELECT priority_id, reservedby, facility_id, timeframe, event FROM general_data ORDER BY priority_id";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>"; // Opening the table row
                            echo "<td class='invisible'>" . htmlspecialchars($row["priority_id"]) . "</td>"; // Output Priority ID (hidden)
                            echo "<td>" . htmlspecialchars($row["reservedby"]) . "</td>"; // Output Reserved By
                            echo "<td>" . htmlspecialchars($row["facility_id"]) . "</td>"; // Output Facility ID
                            echo "<td>" . htmlspecialchars($row["timeframe"]) . "</td>"; // Output Timeframe
                            echo "<td>" . htmlspecialchars($row["event"]) . "</td>"; // Output Event
                            echo "</tr>"; // Closing the table row
                        }
                    } else {
                        echo "<tr><td colspan='5'>0 results</td></tr>";
                    }

                    $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>