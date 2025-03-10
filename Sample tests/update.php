<?php
    include "connection.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);

    if($result-> num_rows > 0){
        $row = $result-> fetch_assoc();
    }
    else{
        echo "No result";
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width: 500px; height: 500px;">
            <div class="card-header">
                <h1>Update Your Information</h1>
            </div>
            <div class="card-body">
                <form action="update-crud.php" method="post">
                    <div class="my-3">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['fname']; ?>" required="">
                    </div>

                    <div class="my-3">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['lname']; ?>" required="">
                    </div>

                    <div class="my-3">
                        <label for="emai">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" required="">
                    </div>
                
                    <div class="my-3">
                        <label for="gender">Gender</label>
                        <input type="radio" name="G" value="male" <?php echo $row['gender'] == 'male'? "Checked": ""; ?>>Male
                        <input type="radio" name="G" value="female" <?php echo $row['gender'] == 'female'? "Checked": ""; ?>>Female
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="card-footer text-end">
                        <input type="submit" name="save" class="btn btn-primary">
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>