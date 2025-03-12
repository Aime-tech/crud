<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the username and password from the POST request
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        // Include necessary files for database connection, user models, and validation
        require_once './db.php';
        require_once './user-models.php';
        require_once './validation.php';

        // Create a new instance of LoginValidator with the provided username, password, and PDO object
        $validate_user = new LoginValidator($username, $password, $pdo);

        // Validate the user data
        $validate_user->validate_data();

        // Store the validated user data in the session
        $_SESSION["user"] = $validate_user->get_user_data();

        // Redirect to the index page after successful login
        header("Location: ../");
        die();
        
    } catch (PDOException $e) {
        // Handle any PDO exceptions that occur during the process
        die("Sql query failed: " . $e->getMessage());
    }

} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../login.php");
    die();
}