<?php

session_start();

if (!isset($_SESSION["user"])){
    header("Location: login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Design | By Code Info</title>
    <link rel="stylesheet" href="/asset/css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&family=Days+One&family=Keania+One&family=Black+Ops+One&family=Fredericka+the+Great&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="/asset/css/Admin.css">
</head>
<body>
    <div class="sidebar">
<br>
    <ul class="menu">
        <div class="my-logo"></div>
        <li id="dashboard">
            <a href="#">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
                <span>Dashboard </span>
            </a>
        </li>
        
        <li id="profile">
            <a href="#">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                <span>Profile</span>
            </a>
        </li>
        <li id="graduate">
            <a href="#">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <span>Graguate</span>
            </a>
        </li>
        <li id="undergraduate">
            <a href="#">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <span>Undergraduate</span>
            </a>
        </li>
        <li id="statistics">
            <a href="#">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <span>Statistics</span>
            </a>
        </li>
        <li id="settings">
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="logout">
            <a href="logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="search--box">
                <input type="text" id="searchbox" placeholder="Search for..."/>
                <button class="searchBtn">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div class="home-btn">
                <a href="#">Home</a>
            <div class="user--info">
             <div class="nitif-box">
                <i class="fa fa-bell-o" aria-hidden="true" style="cursor: pointer;">
                    <span class="spaner">99+</span>
                </i>
            </div>
                <img src="/asset/img/Frankilne.png" alt="profile" style="transform: scale(1.7);">
            </div>
    </div>
  
  <!-- **** tabular section 1 **** -->
<div class="tabular-wrapper1">
    <div class="main-title1">
        <h3>DASHBOARD</h3>
     </div>
</div>
   <!-- ***** End of tabular section 1 ***** -->
      

  <!-- **** tabular section 2 ****   -->
  <div class="tabular-wrapper2">
    <div class="main-title2">
        <div class="profile-div">
            <div class="profile-div-img">
                <!-- <img src="/asset/img/boo.jfif" alt="profile"> -->
                 <button class="fa fa-pencil-square-o" id="btn-profile"></button>
            </div>
            <div class="change-profile-div">
                <h6>My Profile</h6>
                <button class="btn-change">Change photo</button>
            </div>
        </div>
            <div class="profile-info">
                <ul>
                    <li>Name: <?php echo $_SESSION["user"]["username"]; ?></li>
                    <li>Email: <?php echo $_SESSION["user"]["email"]; ?></li>
                    <li>Gender: <?php echo $_SESSION["user"]["gender"]; ?></li>
                    <li>Address: <?php echo $_SESSION["user"]["address"]; ?></li>
                    <li>Phone: <?php echo $_SESSION["user"]["phone"]; ?></li>
                </ul>
                <button class="button">Edit info</button>
            </div>
        <!-- <?php echo "Hello world."; ?>
        <br><a href="logout.php">Logout</a>
        -->
    </div>
  </div>
  <!-- ***** End of tabular section 2 ***** -->




  <!-- ***** tabular section 3 ***** -->
    <div class="tabular-wrapper3">
        <!--<?php
        if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])){
           $msg = $_SESSION["msg"];
           echo "<div class='msgbox alert alert-success p-1 text-center m-0' style='background-color:#9bffbbfa; width: 300px; heigth: 30px;'>".$msg."</div>";
           unset($_SESSION['msg']);
        }
       ?> -->

       <div class="main-title3">
            <h3>GRADUATES</h3>
            <button type="button" class="fa fa-plus"></button>
       </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>field of study</th>
                        <th>Internship Type</th>
                        <th>Internship Name</th>
                        <th>Internship lacation</th>
                        <th>Start Date</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Aime</td>
                        <td>673182859</td>
                        <td>MysternoAime@gmail.com</td>
                        <td>Male</td>
                        <td>Damas</td>
                        <td>Software Engineering</td>
                        <td>professional</td>
                        <td>Nextbyte Tech</td>
                        <td>Yaounde</td>
                        <td>10th</td>
                        <td>Password</td>
                        <td>
                            <button class="fa fa-edit" style="background: #3ada3a;"></button>
                            <button class="fa fa-trash-o" style="background: red;"></button>
                        </td>
                    </tr> 
                </tbody>
                
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['field_of_study']; ?></td>
                            <td><?php echo $row['intern_location']; ?></td>
                            <td><?php echo $row['intern_name']; ?></td>
                            <td><?php echo $row['startdate']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>here</td>
                        </tr>
                    </tbody>
            <?php
                    }
                }
                else
                {
                    echo "No record found Available";
                }
            ?>
            </table>
        </div>
    </div>
  <!-- ***** End of tabular section 3 ***** -->





    <!-- ***** tabular section 4 ***** -->
    <div class="tabular-wrapper4">
        <!--<?php
        if(isset($_SESSION["msg"]) && !empty($_SESSION["msg"])){
           $msg = $_SESSION["msg"];
           echo "<div class='msgbox alert alert-success p-1 text-center m-0' style='background-color:#9bffbbfa; width: 300px; heigth: 30px;'>".$msg."</div>";
           unset($_SESSION['msg']);
        }
       ?> -->

       <div class="main-title4">
            <h3>UNDERGRADUATE</h3>
            <button type="button" class="fa fa-plus"></button>
       </div>
        <div class="table-container4">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>field of study</th>
                        <th>Internship Type</th>
                        <th>Internship Name</th>
                        <th>Internship lacation</th>
                        <th>Start Date</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Aime</td>
                        <td>673182859</td>
                        <td>MysternoAime@gmail.com</td>
                        <td>Male</td>
                        <td>Damas</td>
                        <td>Software Engineering</td>
                        <td>professional</td>
                        <td>Nextbyte Tech</td>
                        <td>Yaounde</td>
                        <td>10th</td>
                        <td>Password</td>
                        <td>
                            <button class="fa fa-edit" style="background: #3ada3a;"></button>
                            <button class="fa fa-trash-o" style="background: red;"></button>
                        </td>
                    </tr> 
                </tbody>
                
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['field_of_study']; ?></td>
                            <td><?php echo $row['intern_location']; ?></td>
                            <td><?php echo $row['intern_name']; ?></td>
                            <td><?php echo $row['startdate']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>here</td>
                        </tr>
                    </tbody>
            <?php
                    }
                }   
                else
            {
                echo "No record found Available";
            }
            ?>
            </table>
        </div>
    </div>
  <!-- ***** End of tabular section 4 ***** -->





<!-- **** tabular section 5 **** -->
<div class="tabular-wrapper5">
<div class="main-title5">
    <div class="graph-div">
        <h3>STATISTICS</h3>
        <div>
            <canvas id="myChart"></canvas>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            
            <script>
            new Chart(document.getElementById('myChart'), {
                type: 'bar',
                data: {
                labels: ['Very good', 'Disliked', 'Excellent', 'Fair', 'Average', 'Good'],
                datasets: [{
                    label: 'Service Ratings',
                    data: [15, 5, 19, 11, 10, 13],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
            </script>
    </div>
  </div>
 </div>
 <!-- ***** End of tabular section 5 ***** -->


<!-- **** tabular section 6 **** -->
<div class="tabular-wrapper6">
    <div class="main-title6">
        <div class="setting-div">
            <h3>SETTINGS</h3>
            <div class="setting-box">
                <div class="setting-box1">
                    <h5>Account</h5>
                    <button class="fa fa-pencil"></button>
                </div>
                <div class="setting-box2">
                    <h5>Security</h5>
                    <button class="fa fa-pencil"></button>
                </div>
                <div class="setting-box3">
                    <h5>Notification</h5>
                    <button class="fa fa-pencil"></button>
                </div>
                <div class="setting-box4">
                    <h5>Privacy</h5>
                    <button class="fa fa-pencil"></button>
                </div>
                <div class="setting-box5">
                    <h5>Help</h5>
                    <button class="fa fa-pencil"></button>
                </div>
        </div>
      </div>
     </div>
     <!-- ***** End of tabular section 6 ***** -->


  </div>
 </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>
<script src="/asset/js/Admin.js"></script>
</html>