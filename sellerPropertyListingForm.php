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
    $username = "root";
    $password = "";
    $dbname = "realestate";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $error = "";


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $usr_nme = $_POST['usr_nme'];
    $propertyID = $_POST['propertyID'];
    $location = $_POST['location'];
    $year = $_POST['year'];
    $square_footage = $_POST['square_footage'];
    $Bedrooms = $_POST['Bedrooms'];
    $Bathrooms = $_POST['Bathrooms'];
    $parking = $_POST['parking'];
    $price = $_POST['price'];
    $property_tax = $_POST['property_tax'];
    
    $sql = "INSERT INTO properties (usr_nme, propertyID, location, year, square_footage, Bedrooms, Bathrooms, parking, price, property_tax) 
    VALUES ('$usr_nme', '$propertyID', '$location', $year, $square_footage, $Bedrooms, $Bathrooms, '$parking', $price, $property_tax)";
    
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
    
    User Name: <input type="text" name="usr_nme" required><br>
    Property ID: <input type="text" name="propertyID" required><br>
    Location: <input type="text" name="location" required><br>
    Year: <input type="number" name="year" required><br>
    Square Footage: <input type="number" name="square_footage" required><br>
    Bedrooms: <input type="number" name="Bedrooms" required><br>
    Bathrooms: <input type="number" name="Bathrooms" required><br>
    Parking: <input type="text" name="parking" required><br>
    Price: <input type="number" name="price" required><br>
    Property Tax: <input type="number" name="property_tax" required><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>