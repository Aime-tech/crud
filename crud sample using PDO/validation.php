<?php

declare(strict_types=1);

class RegisterValidator {

    private $username;
    private $email;
    private $password;
    private $confirm_password;
    private $pdo;

    // Constructor to initialize the properties
    function __construct(string $username, string $email, string $password, string $confirm_password, object $pdo){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->pdo = $pdo;
    }

    // Method to validate the user data
    function validate_data(){

        $errors = [];

        // Check if any of the required fields are empty
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password)) {
            $errors["incomplete_form"] = "Please fill all the fields";
        }

        // Check if the password and confirm password fields match
        if ($this->password !== $this->confirm_password) {
            $errors["password_match_error"] = "Passwords do not match";
        }

        // Check if the password length is at least 5 characters
        if (strlen($this->password) < 5) {
            $errors["password_too_short"] =  "Password must be greater than or equal to 5 characters";
        }

        // Check if the email is valid
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors["invalid_email"] = "Please enter a valid email address";
        }

        // Check if the username already exists in the database
        if(!empty(get_user_username($this->pdo, $this->username))) {
            $errors["username_exists"] = "Username already exists";
        }

        // Check if the email already exists in the database
        if(!empty(get_user_email($this->pdo, $this->email))) {
            $errors["email_exists"] = "Email already exists";
        }

        // If there are any errors, store them in the session and redirect to the registration page
        if (!empty($errors)) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../register.php");
            die();
        }

    }

};


class LoginValidator {

    private $username;
    private $password;
    private $pdo;

    // Constructor to initialize the properties
    function __construct(string $username, string $password,  object $pdo) {
        $this->username = $username;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    // Method to get user data from the database
    function get_user_data(){
        return get_user_username($this->pdo, $this->username);
    }

    // Method to validate the user data
    function validate_data() {

        $errors = [];

        // Check if any of the required fields are empty
        if (empty($this->username) || empty($this->password)) {
            $errors["incomplete_form"] = "Please fill all the fields";
        }

        // Get user data from the database
        $user = $this->get_user_data();

        // Check if the username is valid
        if (!$user) {
            $errors["invalid_username"] = "Invalid username entered";
        }

        // Check if the password is valid
        if ($user && !password_verify($this->password, $user["pwd"])) {
            $errors["invalid_password"] = "Invalid password entered";
        }

        // If there are any errors, store them in the session and redirect to the login page
        if (!empty($errors)) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../login.php");
            die();
        }
        
    }

};