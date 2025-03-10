<?php
    $fnameErr = $lnameErr = $genderErr = $emailErr = "";
    $fname = $lname = $gender = $email ="";

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if (empty($_POST['fname'])) {
            $fnameErr = "First Name is Required";
        }
        if (empty($_POST['lname'])) {
            $lnameErr = "Last Name is Required";
        }
        if (empty($_POST['email'])) {
            $emailErr = "Email Address is Required";
        }
        if (empty($_POST['gender'])) {
            $genderErr = "Gender is Required";
        }
        if (empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($genderErr) ) {
            session_start();
            include "connection.php";

            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO user(fname,lname,email,gender)
            VALUES ('$firstname','$lastname','$email','$gender')";

            if($conn->query($sql)==TRUE) {
                $_SESSION['msg'] = 'Data Inserted Successfully';
                header('location:index.php');
            }
            else {
                echo "Error" .$sql. "<br>" .mysqli_error($conn);
            }
            $conn->close();

        }
    }
?>