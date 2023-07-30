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
        echo "Table users dropped successfully";
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

    // Insert testing values
    $sql = "INSERT INTO users (
        username, email, password, account_type
    ) VALUES (
        'imeyers', 'meyersaindra@gmail.com', 'project123', 'Seller'
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
