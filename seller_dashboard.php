<?php
    session_start();

    // Database connection
    $servername = "localhost";
    $db_username = "imeyers";
    $db_password = "imeyers";
    $databaseName = "imeyers";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $databaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT price, location, year, square_footage, Bedrooms, Bathrooms FROM property WHERE username = ?");

    // Bind the username parameter
    $stmt->bind_param("s", $_SESSION["username"]);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
?>
<html>
<head>
    <title>Housing Properties</title>
    <meta charset="utf-8">
    <link rel="icon" href="./img/icon.jpg">
    <link rel="stylesheet" href="./styles.css">
    <script src="./scripts.js"></script>
</head>
<body>
    <div id="propertyContainer"></div>

    <script>
        // Get the property container element.
        let propertyContainer = document.getElementById("propertyContainer");

        // Fetch the data from PHP
        let properties = <?php
            $properties = array();
            while($row = $result->fetch_assoc()) {
                $properties[] = $row;
            }
            echo json_encode($properties);
        ?>;
        
        let imageLink = document.createElement("a");
        imageLink.href = "sellerPropertyListingForm.php"; // Replace with the URL you want to redirect to
        let image = document.createElement("img");
        image.src = "./img/plus.jpg"; // Replace with the path to your image
        image.alt = "Click to add a property.";
        // Append the image to the link
        imageLink.appendChild(image);
        // Append the link to the property container
        propertyContainer.appendChild(imageLink);
        if (properties.length === 0) {
            // If no properties listed, display a message
            let message = document.createElement("p");
            message.textContent = "Please click on the plus sign to add properties";
            propertyContainer.appendChild(message);
        } else {
            // Loop through the array of property objects.
            for (let property of properties) {
                // Create a property box div.
                let propertyBox = document.createElement("div");
                propertyBox.classList.add("property-box");

                // Create the property price paragraph.
                let price = document.createElement("p");
                price.classList.add("property-price");
                price.innerText = property.price;
                propertyBox.appendChild(price);

                // Create the property info container div.
                let infoContainer = document.createElement("div");
                infoContainer.classList.add("property-info-container");

                // Create the property info div.
                let info = document.createElement("div");
                info.classList.add("property-info");

                // Create and append the property information paragraphs.
                let location = document.createElement("p");
                location.innerHTML = "<strong>Location:</strong> " + property.location;
                info.appendChild(location);

                let yearBuilt = document.createElement("p");
                yearBuilt.innerHTML = "<strong>Year Built:</strong> " + property.year;
                info.appendChild(yearBuilt);

                let squareFootage = document.createElement("p");
                squareFootage.innerHTML = "<strong>Square Footage:</strong> " + property.square_footage;
                info.appendChild(squareFootage);

                let bedrooms = document.createElement("p");
                bedrooms.innerHTML = "<strong>Bedrooms:</strong> " + property.Bedrooms;
                info.appendChild(bedrooms);

                let bathrooms = document.createElement("p");
                bathrooms.innerHTML = "<strong>Bathrooms:</strong> " + property.Bathrooms;
                info.appendChild(bathrooms);

                // Append the property info to the property info container.
                infoContainer.appendChild(info);

                // Append the property info container to the property box.
                propertyBox.appendChild(infoContainer);

                // Append the property box to the property container.
                propertyContainer.appendChild(propertyBox);
            }
        }
    </script>
</body>
</html>