<?php
    // userData[x]: [0] = username, [1] = email, [2] = password, [3] = account type
    $userData = json_decode($_POST['userData'], true);


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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, account_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $account_type);

    // Set parameters and execute
    $username = $userData[0];
    $email = $userData[1];
    $password = $userData[2];
    $account_type = $userData[3];
    if ($stmt->execute()) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
?>