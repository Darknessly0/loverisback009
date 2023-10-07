<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<body>
    <h2>Login</h2> 
    <form action="process_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html> -->


<?php
session_start();

// Define a variable to track authentication success
$authentication_successful = false;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission and authentication logic
    // (Same code as your process_login.php)

    if ($authentication_successful) {
        // Redirect to the welcome page or dashboard
        header("location: welcome.php");
        exit;
    } else {
        $_SESSION["login_err"] = "Invalid username or password.";
    }
}

// Display the login form
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="logincss.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            
            <input type="submit" value="Login">
        </form>
        <?php
        if(isset($_SESSION["login_err"])) {
            echo '<p class="error-message">' . $_SESSION["login_err"] . '</p>';
            unset($_SESSION["login_err"]);
        }
        ?>
    </div>
</body>
</html>
