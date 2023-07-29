<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Propex</title>
        <meta charset="utf-8">
        <link rel="icon" href="./img/icon.jpg">
        <link rel="stylesheet" href="./styles.css">
        <script src="./scripts.js"></script>
    </head>
    <body id="login">
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
         
            $stmt = $conn->prepare("SELECT usr_name, usr_password FROM users WHERE usr_name=?");
            $stmt->bind_param("s", $usr_name);
        
            $stmt->execute();
        
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
        
            if ($user) {
                // Check if the username and password are correct
                if ($user["usr_name"] === $usr_name && $user["usr_password"] === $usr_password) {
                    $_SESSION["username"] = $usr_name;
                    $_SESSION["password"] = $usr_password;
                    header("Location: buyer_dashboard.php");
                    exit;
                } else {
                    $error = "Incorrect username or password";
                }
            } else {
                $error = "Incorrect username or password";
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

    <a href= "fp.php">
        <div class="left-container">
            <img src="./img/forgotpass.png" alt="forgot_password-img" >  </img>
            <p> Forgot Password? </p>
        </div>
    </a>
    </div> 
    <div class="login-container">
        <h2>Login Here</h2>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <span class="error"><?php echo $error; ?></span><br>
            <label for="username">Username
            <input type="text" id="username" name="username" placeholder="Email" required>
            </label>
            
            <label for="password">Password
            <input type="password" id="password" name="password" placeholder="Password" required>
            </label>
            
            <button type="submit">Login</button>

           
        </form>
    </div>

</div>

    </body>
</html>