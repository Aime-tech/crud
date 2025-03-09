<?php
  session_start();
  include "validate.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width: 500px; height: 500px;">
            <div class="card-header">
                <h1>Enter your information</h1>
                <div class="card-body">
                    <form action="validate.php" method="post">
                        <div class="my-3">
                            <label for="fname">Fisrt name</label>
                            <span class="error" <?php echo $fnameErr?>></span>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Your Fisrt Name">
                        </div>
                        <div class="my-3">
                            <label for="lname">Last name</label>
                            <span class="error" <?php echo $lnameErr?>></span>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Your Last Name">
                        </div>
                        <div class="my-3">
                            <label for="email">Email</label>
                            <span class="error" <?php echo $emailErr?>></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Name">
                        </div>
                        <div class="my-3">
                            <label for="gender">Gender</label><br>
                            <span class="error" <?php echo $genderErr?>></span>
                            <input type="radio" name="gender" id="gender" value="male">Male
                            <input type="radio" name="gender" id="gender" value="female">Female
                        </div>
                        <div class="card-footer text-end">
                    <input type="submit" name="Save" class="btn btn-primary">
                    <a href="index.php" class="btn btn-danger" >Cancel</a>
                    </form>
                </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>