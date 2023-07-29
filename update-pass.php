<?php
    
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Propex</title>
        <meta charset="utf-8">
        <link rel="icon" href="./img/icon.jpg">
        <link rel="stylesheet" href="./login-styles.css">
        <script src="./scripts.js"></script>
        <style>
            .form p{
                margin-top:0;
                padding: 5px;
            }

            .form button{
                margin-bottom: 10px;
            }

            </style>
    </head>
    <body>
    <?php
        
        $error = "";
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $databaseName = "realestate"; 
        
           
            $usr_password = $_POST["password"];
            $usr_name = $_POST["username"];
        
            // Connect to MYSQL Server
            $conn = new mysqli($servername, $db_username, $db_password, $databaseName);
        
            // Check the connection
            if ($conn->connect_error) {
                echo "Could not connect to server \n";
                die("Connection failed: " . $conn->connect_error);
            }
         
           $stmt = $conn->prepare("UPDATE users  SET usr_password = ? WHERE usr_name = ?;");
            $stmt->bind_param("ss", $usr_password, $usr_name);
        
            if ($stmt->execute()) {
                $correct ="Password sucessfully updated! Please click on the login tab to continue.";
            } else{
                echo "Error updating password: " . $stmt->error;
            }
           
           
        }
    ?>
        <div class="main"> 
    <div class="left-column"> 
        <a href= "login.php">
        <div class="left-container"> 
           <img src="./img/login.jpg" alt="login-img" >  </img>
           <p> Login </p>
        </div>
        </a>

        <a href= "sign.php">
        <div class="left-container"> 
            <img src="./img/register.png" alt="register-img" >  </img>
            <p> Register </p>
        </div>
       </a>
    </div> 
    <div class="login-container">
        
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <span class="error"><?php echo $error; ?></span><br>
        <span class="error"><?php echo $correct; ?></span><br>
        <p> Please Enter your new password: </p>
            <label for="password">New Password
            <input type="password" id="password" name="password" placeholder="Password" required>
            </label>
            
            <button style= "margin-left: 10px; align-self: flex-start; "type="submit">Submit</button>

           
        </form>
    </div>

</div>

    </body>
</html>