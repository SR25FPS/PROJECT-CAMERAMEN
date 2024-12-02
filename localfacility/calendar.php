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
            height: 100vh; 
        }
        .text-section {
            flex: 1; 
            display: flex;
            flex-direction: column;
        }
        .top-section {
            flex: 1; 
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #f4f4f4;
        }
        .bottom-section {
            flex: 1; 
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            text-align: center;
            background-color: #000; 
            color: white; 
            padding: 20px; 
            border-radius: 5px; 
            margin: 20px; 
            padding-bottom: 40px; /* Added extra bottom padding */
        }
        .button {
            padding: 15px 30px;
            font-size: 16px;
            color: white;
            background-color: #353535;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px; 
        }
        .button:hover {
            background-color: #494b49;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
            margin-bottom: 20px; /* Added bottom margin */
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
    <div class="top-section">
                <h1>BTTHS Facility Booking System</h1>
                <p>"Optimizing Your Spaces, Simplifying Your Schedule."</p>
            </div>
            <div class="bottom-section">
                <h1>Users Data</h1>
                <table>
                    <tr>
                        <th class="invisible">Priority ID</th> <!-- Invisible column for sorting -->
                        <th>Reserved By</th>
                        <th>Facility ID</th>
                        <th>Timeframe</th> <!-- Moved Timeframe to be before Event -->
                        <th>Event</th> <!-- Moved Event to be after Timeframe -->
                    </tr>
                    <?php
                        include 'connect.php';
                        $sql = "SELECT priority_id, reservedby, facility_id, timeframe, event FROM general_data ORDER BY priority_id";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>"; // Added opening <tr> tag here
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
    </div>
</body>
</html>