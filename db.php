<?php 

// Start a new session or resume the existing session
session_start();

// Database connection details
$host = 'localhost';        // The hostname of the database server
$dbname = 'auth';           // The name of the database
$dbusername = 'root';       // The username to connect to the database
$dbpassword = '';           // The password to connect to the database

try {
    // Create a new PDO instance and establish a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    
    // Set the PDO error mode to exception to throw exceptions on database errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // If a PDO exception occurs, terminate the script and display the error message
    die("Connection failed with error: " . $e->getMessage());
}