<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // Change to your database server hostname
    $username = "root"; // Change to your database username
    $password = "Coolforthesummer123!!"; // Change to your database password
    $dbname = "login"; // Change to your database name
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare a SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT username, pword FROM username WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the password
    if ($password === $db_password) {
        // Password is correct, so start a new session
        session_start();

        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $db_username;

        // Redirect user to a welcome page or dashboard
        header("location: welcome.php");
    } else {
        // Password is not valid, display an error message
        $_SESSION["login_err"] = "Invalid username or password.";
        header("location: login.php");
    }

    $conn->close();
}
?>
