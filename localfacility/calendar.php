<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data from MySQL</title>
</head>
<body>
    <h1>Users Data</h1>
    <div>
        <h2>
        <?php
            // Includes the code in the connect.php file
            include 'connect.php';
            
            // SQL query to fetch data
            // query() is a PHP method (aka function) in the $conn object used to execute the SQL query provided as the parameter
            // The results of the query are then stored in a variable called $result
            $sql = "SELECT priority_id, reservedby, facility_id, timeframe, event FROM general_data";
            $result = $conn->query($sql);

            // num_rows is a PHP attribute (aka variable) in the $result object, which returns the number of rows in the result
            // if the result is empty, it returns 0
            if ($result->num_rows > 0) {

                // This while loop executes as long as there are rows in the result
                // fetch_assoc() is a PHP method (aka function) in the $result object used to fetch a result row as an associative array (aka dictionary in Python)
                // It then temporarily stores that result row in the $row variable
                while($row = $result->fetch_assoc()) {
                    //echo is a PHP function used to display output; HTML code works as well
                    echo "Priority: " . $row["priority_id"]. " - Reserved By: " . $row["reservedby"]. " - Facility: " . $row["facility_id"]. " - Timeframe: " . $row["timeframe"]. "<br>";
                }

            } else {
                echo "0 results";
            }

            //close() is a PHP method (aka function) in the $conn object used to close the database connection
            $conn->close();
        ?>

        </h2>
    </div>
</body>
</html>