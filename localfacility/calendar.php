<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
            flex-direction: column; /* Allow vertical stacking */
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #f4f4f4;
        }
        .bottom-section {
            flex: 1; 
            display: flex;
            flex-direction: column; /* Allow vertical stacking */
            justify-content: flex-start; /* Align items to the top */
            text-align: center;
            background-color: #000; /* Black background */
            color: white; /* White text color */
            padding: 20px; /* Add padding */
            border-radius: 5px; /* Rounded corners */
            margin: 20px; /* Margin around the box */
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
            margin-top: 10px; /* Reduced margin-top */
        }
        .button:hover {
            background-color: #494b49;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
            color: white; /* White text for table */
        }
        th, td {
            border: 1px solid white; /* White borders */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #444; /* Darker background for header */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img src="logo.png" alt="Logo">
        <a href="home-temp.html">Home</a>
        <a href="about.html">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
        <a href="http://localhost/localfacility/calendar.php">Calendar</a>
    </div>
    <div class="container">
        <div class="text-section">
            <div class="top-section">
                <h1>BTTHS Facility Booking System</h1>
                <p>"Optimizing Your Spaces, Simplifying Your Schedule."</p>
            </div>
            <div class="bottom-section">
    <h1>Users Data</h1>
    <table>
        <tr>
            <th>Priority ID</th>
            <th>Reserved By</th>
            <th>Facility ID</th>
            <th>Timeframe</th>
            <th>Event</th>
        </tr>
        <?php
            include 'connect.php';
            $sql = "SELECT priority_id, reservedby, facility_id, timeframe, event FROM general_data";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["priority_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["reservedby"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["facility_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["timeframe"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["event"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }

            $conn->close();
        ?>
    </table>
</div>