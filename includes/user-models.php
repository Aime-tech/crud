<?php

declare(strict_types=1);

function get_user_username(object $pdo, string $username) {

    $query = "SELECT * FROM graduate WHERE username = :username;";
    $statement = $pdo->prepare($query);

    $statement->bindparam(":username", $username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
    return $result;
}

function get_user_email(object $pdo, string $email) {

    $query = "SELECT * FROM graduate WHERE email = :email;";
    $statement = $pdo->prepare($query);

    $statement->bindparam(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    
    return $result;
}

function create_user(object $pdo, string $username, string $phone, string $email, string $gender, string $address, string $field_of_study, string $intern_type, string $intern_name, string $location, string $startdate, string $password) {

    $query = "INSERT INTO graduate (username, phone, email, gender, address, field_of_study, intern_type, intern_name, location, startdate, password) VALUES (:username, :phone, :email, :gender, :address, :field_of_study, :intern_type, :intern_name, :location, :startdate, :password);";

    $statement = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    $statement->bindparam(":username", $username);
    $statement->bindparam(":phone", $phone);
    $statement->bindparam(":email", $email);
    $statement->bindparam(":gender", $gender);
    $statement->bindparam(":address", $address);
    $statement->bindparam(":field_of_study", $field_of_study);
    $statement->bindparam(":intern_type", $intern_type);
    $statement->bindparam(":intern_name", $intern_name);
    $statement->bindparam(":location", $location);
    $statement->bindparam(":startdate", $startdate);
    $statement->bindparam(":password", $hashed_password);

    $statement->execute();


}
