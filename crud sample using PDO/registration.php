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
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once './dashboards/';
        require_once './user-models.php';
        require_once './validation.php';

        $validate_user_data = new RegisterValidator($username, $phone, $email, $gender, $address, $field_of_study, $intern_type, $intern_name, $location, $password, $confirm_password, $pdo);
        $validate_user_data->validate_data();

        create_user($pdo, $username, $phone, $email, $gender, $address, $field_of_study, $intern_type, $intern_name, $location, $password);

        $_SESSION["signup_success"] = "Signup succfessful. Procced to login";

        header("Location: ./dashboards/login.php");
        die();
    } catch (PDOException $e) {
        die("Sql query failed: " . $e->getMessage());
    }


} else {
    header("Location: ../register.php");
    die();
}