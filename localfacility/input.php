<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 80px; /* Add margin to prevent overlap with the fixed navbar */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #353535;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #494b49;
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
    
    <div class="form-container">
        <h2>Input User Data</h2>
        <form action="process_input.php" method="POST">
            <div class="form-group">
                <label for="reservedby">Reserved By:</label>
                <input type="text" id="reservedby" name="reservedby" required>
            </div>
            <div class="form-group">
                <label for="facility_id">Facility ID:</label>
                <select id="facility_id" name="facility_id" required>
                    <option value="" disabled selected>Choose a facility</option>
                    <option value="Highschool Auditorium">Highschool Auditorium</option>
                    <option value="Po Hang Gymnasium">Po Hang Gymnasium</option>
                    <option value="Computer Lab 1">Computer Lab 1</option>
                    <option value="Computer Lab 2">Computer Lab 2</option>
                    <option value="Computer Lab 3">Computer Lab 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="timeframe">Timeframe:</label>
                <input type="datetime-local" id="timeframe" name="timeframe" required>
            </div>
            <div class="form-group">
                <label for="event">Event:</label>
                <input type="text" id="event" name="event" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>