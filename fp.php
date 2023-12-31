<?php
    
	session_start();
?>
<html lang="en">
    <head>
        <title>Propex</title>
        <meta charset="utf-8">
        <link rel="icon" href="./img/icon.jpg">
        <link rel="stylesheet" href="./login-styles.css">
        <script src="./scripts.js"></script>
    </head>
    <body>
    <?php
        $error = "";
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $db_username = "imeyers";
            $db_password = "imeyers";
            $databaseName = "imeyers";
        
           
            
            $usr_name = $_POST["username"];
        
            // Connect to MYSQL Server
            $conn = new mysqli($servername, $db_username, $db_password, $databaseName);
        
            // Check the connection
            if ($conn->connect_error) {
                echo "Could not connect to server \n";
                die("Connection failed: " . $conn->connect_error);
            }
         
            $stmt = $conn->prepare("SELECT usr_name FROM users WHERE usr_name=?");
            $stmt->bind_param("s", $usr_name);
        
            $stmt->execute();
        
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
        
            if ($user) {
                // Check if the username is correct
                if ($user["usr_name"] === $usr_name ) {
                   
                  
                    header("Location: update-pass.php");
                    exit;
                } else {
                    $error = "Incorrect username or password";
                }
            } else {
                $error = "Incorrect username ";
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

    <a href= "sign.html">
        <div class="left-container"> 
            <img src="./img/register.png" alt="register-img" >  </img>
            <p> Register </p>
        </div>
    </a>

    
    </div> 
    <div class="login-container">
        
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <span class="error"><?php echo $error; ?></span><br>
            <p> Please Enter your username: </p>
            <label for="username">Username
            <input type="text" id="username" name="username" placeholder="Email" required>
            </label>
           
            <button type="submit">Submit</button>

            
        </form>
    </div>

</div>

    </body>
</html>