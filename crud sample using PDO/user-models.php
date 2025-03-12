<?php

declare(strict_types=1);

// Function to get user data by username
function get_user_username(object $pdo, string $username) {

    // SQL query to select user data where username matches
    $query = "SELECT * FROM graduates WHERE username = :username;";
    // Prepare the SQL statement
    $statement = $pdo->prepare($query);

    // Bind the username parameter to the query
    $statement->bindparam(":username", $username);
    // Execute the query
    $statement->execute();

    // Fetch the result as an associative array
    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
    // Return the result
    return $result;
}

// Function to get user data by email
function get_user_email(object $pdo, string $email) {

    // SQL query to select user data where email matches
    $query = "SELECT * FROM users WHERE email = :email;";
    // Prepare the SQL statement
    $statement = $pdo->prepare($query);

    // Bind the email parameter to the query
    $statement->bindparam(":email", $email);
    // Execute the query
    $statement->execute();

    // Fetch the result as an associative array
    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
    // Return the result
    return $result;
}



// Function to create a new user
function create_user(object $pdo, string $username, string $email, string $password) {

    // SQL query to insert a new user into the users table
    $query = "INSERT INTO graduates (username, email, pwd) VALUES (:username, :email, :pwd);";

    // Prepare the SQL statement
    $statement = $pdo->prepare($query);

    // Options for password hashing
    $options = [
        'cost' => 12
    ];

    // Hash the password using BCRYPT algorithm
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    // Bind the username parameter to the query
    $statement->bindparam(":username", $username);
    // Bind the email parameter to the query
    $statement->bindparam(":email", $email);
    // Bind the hashed password parameter to the query
    $statement->bindparam(":pwd", $hashed_password);

    // Execute the query to insert the new user
    $statement->execute();
}
