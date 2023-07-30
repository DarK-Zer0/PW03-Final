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
        price FLOAT NOT NULL,
        location VARCHAR(50) NOT NULL,
        year INT(4) NOT NULL,
        square_footage INT(5) NOT NULL,
        Bedrooms INT(2) NOT NULL,
        Bathrooms INT(2) NOT NULL
    )";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Insert testing values
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
    // Insert testing values (2)
    $sql = "INSERT INTO property (
        username, price, location, year, square_footage, Bedrooms, Bathrooms
    ) VALUES (
        'imeyers', '250000', '123 Main Street, Anytown, USA', '2000', '1500', '3', '2'
    );";
    // Error check
    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $conn->error;
    }    

    // Close statement and connection
    $conn->close();
?>
