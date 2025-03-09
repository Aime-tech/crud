<?php
     session_start();
     include "connection.php";

     $firstname = $_POST['fname'];
     $lastname = $_POST['lname'];
     $email = $_POST['email'];
     $gender = $_POST['gender'];
     $id = $_POST['id'];

     $sql = "UPDATE user SET
           firstname='$firstname',
           lastname='$lastname',
           email='$email',
           gender='$gender'
           
           WHERE id = $id";

    if($conn->query($sql)==TRUE){
        $_SESSION["msg"] = "Record Update Successfully";
        header("location:index.php");
    }
    else{
        echo "Error Updating the Record".$conn->error;
    }
    $conn ->close();
?>