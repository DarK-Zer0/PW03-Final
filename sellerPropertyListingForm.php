<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Property Information Form</title>
    <style>
        .error{
        color: red;
        }
    </style>

</head>
<body>
    <?php
        $servername = "localhost";
        $db_username = "imeyers";
        $db_password = "imeyers";
        $databaseName = "imeyers";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $error = "";


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $id = $_POST['id'];
    $location = $_POST['location'];
    $year = $_POST['year'];
    $square_footage = $_POST['square_footage'];
    $Bedrooms = $_POST['Bedrooms'];
    $Bathrooms = $_POST['Bathrooms'];
    $parking_availability = $_POST['parking_availability'];
    $price = $_POST['price'];
    $property_tax = $_POST['property_tax'];
    
    $sql = "INSERT INTO properties (username, id, location, year, square_footage, Bedrooms, Bathrooms, parking_availability, price, property_tax) 
    VALUES ('$username', '$id', '$location', $year, $square_footage, $Bedrooms, $Bathrooms, '$parking_availability', $price, $property_tax)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: seller_dashboard.php");
                    exit;
    } else {
       $error = "Property not listed due to input error!";
    }
}
    $conn->close();
    ?>

  <span class="error"><?php echo $error; ?></span><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
    User Name: <input type="text" name="username" required><br>
    Property ID: <input type="text" name="id" required><br>
    Location: <input type="text" name="location" required><br>
    Year: <input type="number" name="year" required><br>
    Square Footage: <input type="number" name="square_footage" required><br>
    Bedrooms: <input type="number" name="Bedrooms" required><br>
    Bathrooms: <input type="number" name="Bathrooms" required><br>
    parking_availability: <input type="text" name="parking_availability" required><br>
    Price: <input type="number" name="price" required><br>
    Property Tax: <input type="number" name="property_tax" required><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>