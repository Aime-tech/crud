<?php

declare(strict_types=1);

class RegisterValidator {

    private $username;
    private $phone;
    private $email;
    private $gender;
    private $address;
    private $field_of_study;
    private $intern_type;
    private $intern_name;
    private $location;
    private $startdate;
    private $password;
    private $confirm_password;
    private $pdo;

    function __construct(string $username, string $phone,  string $email, string $gender, string $address, string $field_of_study, string $intern_type, string $intern_name, string $location, string $startdate, string $password, string $confirm_password, object $pdo){
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
        $this->gender = $gender;
        $this->address = $address;
        $this->field_of_study = $field_of_study;
        $this->intern_type = $intern_type;
        $this->intern_name = $intern_name;
        $this->location = $location;
        $this->startdate = $startdate;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->pdo = $pdo;
    }

    function validate_data(){

        $errors = [];


        if (empty($this->username) || empty($this->phone) || empty($this->email) || empty($this->gender) || empty($this->address) || empty($this->field_of_study) || empty($this->intern_type) || empty($this->intern_name) || empty($this->location) || empty($this->startdate) || empty($this->password) || empty($this->confirm_password)) {
            $errors["Incomplete_form"] = "Please fill all the fields";
        }

        if ($this->password !== $this->confirm_password) {
            $errors["password_match_error"] = "Passwords do not match";
        }

        if (strlen($this->password) < 5) {
            $errors["password_too_short"] =  "Password must be greater than or equal to 5 characters";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors["invalid_email"] = "Please enter a valid email address";
        }

        if(!empty(get_user_username($this->pdo, $this->username))) {
            $errors["username_exists"] = "Username already exists";
        }

        if(!empty(get_user_email($this->pdo, $this->email))) {
            $errors["email_exists"] = "Email already exists";
        }

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

    function __construct(string $username, string $password,  object $pdo) {
        $this->username = $username;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    function get_user_data(){
        return get_user_username($this->pdo, $this->username);
    }

    function validate_data() {

        $errors = [];

        if (empty($this->username) || empty($this->password)) {
            $errors["incomplete_form"] = "Please fill all the fields";
        }

        $user = $this->get_user_data();

        if (!$user) {
            $errors["invalid_username"] = "Invalid username entered";
        }

        if ($user && !password_verify($this->password, $user["pwd"])) {
            $errors["invalid_password"] = "Invalid password entered";
        }

        if (!empty($errors)) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../login.php");
            die();
        }
        
    }

};