<?php 

session_start();

$host = 'localhost';
$dbname = 'internship';
$dbusername = 'root';
$dbpassword = '';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
    die("Connection failed with error: " . $e->getMessage());
}