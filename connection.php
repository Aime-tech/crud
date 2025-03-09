<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

//Create connection
$connecting = new PDO("mysql: host=localhost; dbname=internship", "root", "");

 //Prepare
 $connected = $connecting -> prepare("INSERT INTO Students(snames, semail, stel, sgender, speciality) VALUES (:snames, :semail, :stel, :sgender, :speciality)");
 $connected -> execute(
    [
        "username" => $_POST["username"],
        "phone" => $_POST["phone"],
        "email" => $_POST["email"],
        "gender" => $_POST["gender"],
        "address" => $_POST["address"],
        "field_of_study" => $_POST["field_of_study"],
        "intern_type" => $_POST["intern_type"],
        "intern_name" => $_POST["intern_name"],
        "intern_location" => $_POST["intern_location"],
        "intern_duration" => $_POST["intern_duration"],
        "password" => $_POST["password"]
    
    ]);
    echo "Successfuly Submitted";

if(!$conn) {
    die("Connection Failed:" .mysqli_connect_error());
}
else{
    echo "Connection Successful ";
}
?>