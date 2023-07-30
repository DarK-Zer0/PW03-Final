<?php
    $servername = "localhost";
    $db_username = "imeyers";
    $db_password = "imeyers";
    $databaseName = "imeyers";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $databaseName);
    // Check the connection
    if ($conn->connect_error) {
        echo "Could not connect to server \n";
        die("Connection failed: " . $conn->connect_error);
    }

    // ----------CLEARING----------
    // Clears any old 'user' tables
    $sql = "DROP TABLE IF EXISTS users;";
    if ($conn->query($sql) === TRUE) {
        echo "Table 'users' dropped successfully";
    } else {
        echo "Error dropping table: " . $conn->error;
    }
    // Clears any old 'property' tables
    $sql = "DROP TABLE IF EXISTS property;";
    if ($conn->query($sql) === TRUE) {
        echo "Table 'property' dropped successfully";
    } else {
        echo "Error dropping table: " . $conn->error;
    }
    
    // ----------INITIALIZATION----------
    // Initialize a new 'user' table
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        account_type VARCHAR(50) NOT NULL
    )";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Initialize a new 'property' table
    $sql = "CREATE TABLE property (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        price INT(7) NOT NULL,
        location VARCHAR(50) NOT NULL,
        year INT(4) NOT NULL,
        square_footage INT(6),
        Bedrooms INT(2),
        Bathrooms INT(2),
        garden BOOLEAN,
        parking_availability BOOLEAN,
        prox_facilities VARCHAR(100),
        prox_mainroads VARCHAR(100),
        property_tax FLOAT(7,2)
    )";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // ----------INSERTION----------
    // Insert testing user
    $sql = "INSERT INTO users (
        username, email, password, account_type
    ) VALUES (
        'imeyers', 'meyersaindra@gmail.com', '123', 'Seller'
    );";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
    // Insert testing property
    $price = 250000;
    $property_tax = $price * 0.07;
    $sql = "INSERT INTO property (
        username, price, property_tax, location, year, 
        square_footage, Bedrooms, Bathrooms, 
        garden, parking_availability, prox_facilities, prox_mainroads
    ) VALUES (
        'imeyers', $price, $property_tax, '123 Main Street, Anytown, USA', 2000, 
        1500, 3, 2, 
        'true', 'true', 'Main High School','1 mile away from Main Rd' 
    );";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "New property created successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement and connection
    $conn->close();
?>
