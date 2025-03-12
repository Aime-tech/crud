<?php
  session_start();
  
  if (isset($_SESSION["user"])){
    header("Location: Admin.php");
    die();
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Days+One&family=Black+Ops+One&family=Fredericka+the+Great&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="/asset/css/Sign_up.css">
    <title>Sign-in || Sign-UP Page</title>
</head>

<body>
  <div class="nav-bar">
    <div class="nav-logo">
      <img src="/asset/img/Zara&Kabir.png" alt="my logo">
    </div>
    <div class="nav-list">
      <div class="home-div">
        <a href="#">Home</a>
        <a href="#">About Us</a>
      </div>
      </div>
  </div>
     <div class="image-container">
        <img src="/asset/img/Zara&Kabir.png" alt="Sign Up Image">
        </div>
    <div class="container" id="container">
        <div class="form-container sign-up">

          <?php 

          require_once 'includes/register-views.php';
          
          render_errors();
    
          ?>

          <form action="" method="POST" id="signup-form">
            <h1>Create Account</h1>
            <div class="social-icons social-icons-sign-up">
                <a href="#" class="icon"><i class="fab fa-google"></i></a>
                <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fab fa-github"></i></a>
                <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span id="span">or use your email for registration</span>
            <input type="text" id="username" name="username" placeholder="Enter only first and last name" autocomplete="given-name" required>
            <input type="tel" id="phone" name="phone" placeholder="Phone number" autocomplete="of" required>
            <input type="email" id="email" name="email" placeholder="Email" autocomplete="off" required>
            <div class="gender-type">
              <label for="gender">Gender:</label>
                <input type="radio" id="gender" name="gender" value="M">Male
                <input type="radio" id="gender" name="gender" value="F">Female
            </div>
            <input type="text" id="address" name="address" placeholder="Address" autocomplete="off" required>
            <input type="text" id="field_of_study" name="field_of_study" placeholder="Domain or field of Study" autocomplete="off" required>
            <div class="select-container">
              <label for="intern_type">Internship type:</label>
              <select name="intern_type" id="intern_type">
                <option name="intern_type" value="graduate">Graduate</option>
                <option name="intern_type" value="undergraduate">Undergraduate</option>
              </select>
            </div>
            <input type="text" id="intern_name" name="intern_name" placeholder="Name of Internship or organization" required>
            <input type="text" id="location" name="location" placeholder="Intership location" required>
            <input type="date" id="startdate" name="startdate" placeholder="Start Date" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
          </form>
        </div>



      <!-- sign-in form section   -->

        <div class="form-container sign-in">

      <?php 

          require_once 'includes/login-views.php';

          render_success_message();

          ?>
            <form action="includes/register-user.php" method="POST" id="signin-form">
              <h1>Sign in</h1>
              <div class="social-icons">
                  <a href="#" class="icons"><i class="fab fa-google"></i></a>
                  <a href="#" class="icons"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="icons"><i class="fab fa-github"></i></a>
                  <a href="#" class="icons"><i class="fab fa-linkedin-in"></i></a>
              </div>
              <span>or use your email and password</span><br>
              <input type="text" id="username" name="username" placeholder="Username" autocomplete="of" required>
              <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required><br>
              <a href="#"><samp>Forgot your password?</samp></a><br>
              <button type="submit" class="in">Sign In</button>
            </form>
          </div>
          <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Friend!</h1>
                    <p>Enetr your personal details to start using all of the site's features.<br><br>OR</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Register with your personal details to use all of site's features.<br><br>OR</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div> 
          </div>
      </div>
    <script src="/asset/js/Sign_up.js"></script>
    <script>
        document.getElementById('signin-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            // Handle login logic here (e.g., send request to the backend)
            const formData = new FormData(this);
            // Example: fetch('/login', { method: 'POST', body: formData });
        });

        document.getElementById('signup-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            // Handle sign-up logic here (e.g., send request to the backend)
            const formData = new FormData(this);
            // Example: fetch('/signup', { method: 'POST', body: formData });
        });
    </script>
</body>
</html>