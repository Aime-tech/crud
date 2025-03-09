<?php
   session_start();
   include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        table{
            width: 100%;
            text-align: center;
        }
        tr td{
            border: 1px solid black;
            height: 50px;

        }
    </style>
</head>
<body>
    <?php
     if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])){
        $msg = $_SESSION["msg"];
        echo "<div class='msgbox alert alert-success p-1 text-center m-0' style='background-color:#9bffbbfa; width: 300px; heigth: 30px;'>".$msg."</div>";
        unset($_SESSION['msg']);
     }
    ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-11">
                            <h1>Crud Operations</h1>
                        </div>
                        <div class="col-md-1 text-end">
                            <a href="update.php" type="button" class="btn btn-success">
                                <i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php
                       $sql  = "SELECT * FROM user";
                       $result = $conn->query($sql);

                       if($result->num_rows > 0){
                           while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" .$row['id']. "<td>";
                            echo "<td>" .$row['fname']. "<td>";
                            echo "<td>" .$row['lname']. "<td>";
                            echo "<td>" .$row['email']. "<td>";
                            echo "<td>" .$row['gender']. "<td>";
                            echo "<td class = 'icon-td'>";
                               echo'<a href=update.php?id= '.$row['id'].' "title="Update Record" class="btn btn-success"><span class="fa fa-pencil"></span></a>';
                               echo'<a href=delete.php?id= '.$row['id'].' "title="Delete Record" class="btn btn-danger mx-1"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                           }
                       }
                       else{
                        echo "<tr>
                          <td colspan='6'>NO Data Available in Table!</td>
                              </tr>";
                       }
                       mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>