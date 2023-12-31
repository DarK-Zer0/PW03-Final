<?php
	session_start();
?>
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
                $db_username = "imeyers";
                $db_password = "imeyers";
                $databaseName = "imeyers";
            
                // Connect to MYSQL Server
                $conn = new mysqli($servername, $db_username, $db_password, $databaseName);

                // Check the connection
                if ($conn->connect_error) {
                    echo "Could not connect to server \n";
                    die("Connection failed: " . $conn->connect_error);
                } 
            
                $password = $_POST["password"];
                $username = $_POST["username"];
            
                $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=?");
                $stmt->bind_param("s", $username);
            
                $stmt->execute();
            
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
            
                if ($user) {
                    // Check if the username and password are correct
                    if ($user["username"] == $username && $user["password"] == $password) {
                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $password;
                        header("Location: seller_dashboard.php");
                        exit;
                    } else {
                        $error = "Incorrect username or password";
                    }
                } else {
                    $error = "Incorrect username or password";
                } 
            }
        ?>
        <!-- Return Home Button -->
        <div id="home">
            <a href="./index.html"><img src="./img/logo.png" alt="Propex"></a>
        </div>
        <div class="main"> 
            <div class="left-column">
                <!-- Login Link -->
                <a href= "login.php">
                    <div class="left-container"> 
                        <img src="./img/login.jpg" alt="login-img" >  </img>
                        <p> Login </p>
                    </div>
                </a>

                <!-- Sign Up Link -->
                <a href= "signup.html">
                    <div class="left-container"> 
                        <img src="./img/register.png" alt="register-img" >  </img>
                        <p> Register </p>
                    </div>
                </a>

                <!-- Forgot Password Link -->
                <a href= "fp.php">
                    <div class="left-container">
                        <img src="./img/forgotpass.png" alt="forgot_password-img" >  </img>
                        <p> Forgot Password? </p>
                    </div>
                </a>
            </div> 
            <!-- Login Input -->
            <div class="login-container">
                <h2>Insert Login</h2>
                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <span class="error"><?php echo $error; ?></span><br>
                    <label for="username">Username
                        <input type="text" id="username" name="username" placeholder="Username" required>
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