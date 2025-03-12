<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $field_of_study = $_POST["field_of_study"];
    $intern_type = $_POST["intern_type"];
    $intern_name = $_POST["intern_name"];
    $location = $_POST["location"];
    $startdate = $_POST["startdate"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once 'db.php';
        require_once 'user-models.php';
        require_once 'validator.php';

        $validate_user_data = new RegisterValidator($username, $phone, $email, $gender, $address, $field_of_study, $intern_type, $intern_name, $location, $startdate, $password, $confirm_password, $pdo);
        $validate_user_data->validate_data();

        create_user($pdo, $username, $phone, $email,$gender, $address, $field_of_study, $intern_type, $intern_name, $location, $startdate, $password);

        $_SESSION["signup_success"] = "Signup succfessful. Procced to login";

        header("Location: ../Sign-up.php");
        die();

    } catch (PDOException $e) {
        die("Sql query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../register.php");
    die();
}