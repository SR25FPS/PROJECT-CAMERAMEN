<?php
    // Database connection settings
    // Variable names in PHP begin with the dollar symbol ($)
    $servername = "localhost";
    $username = "root";  // Default username in XAMPP
    $password = "";      // Default password for XAMPP MySQL (usually empty)
    $dbname = "localfacility";  //Replace with your own database name

    // Creates the connection
    // $conn is a PHP variable that contains an object (OOP) representing the connection to the MySQL database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // This if statement checks the connection to the MySQL database
    // The symbol -> means to call a method (aka function) or attribute (aka variable) in the object. Its equivalent in Python or Java is the period (.)
    // connect_error is a PHP attribute (aka variable) in the $conn object, which returns a Boolean value (true or false), whether there is an error in the connection or not 
    if ($conn->connect_error) {
        // die() is a PHP function that stops the execution of the current script
        die("Connection failed: " . $conn->connect_error);
    }