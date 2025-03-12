<?php

// Function to render messages based on session variables
function render_message(){

    // Check if there is a signup success message in the session
    if (isset($_SESSION["signup_success"])) {

        // Retrieve the message from the session
        $message = $_SESSION["signup_success"];

        // Display the message in a styled HTML element
        echo '<center><h4 style="color:dodgerblue">' . $message . '</h4></center>';

        // Remove the message from the session to prevent it from being displayed again
        unset($_SESSION["signup_success"]);

    }

    // Check if there are login errors in the session
    if (isset($_SESSION["login_errors"])) {

        // Retrieve the errors from the session
        $errors = $_SESSION["login_errors"];

        // Loop through each error and display it in a styled HTML element
        foreach($errors as $error) {

            echo '<center><h4 style="color:firebrick">' . $error . '</h4></center>';

        }

        // Remove the errors from the session to prevent them from being displayed again
        unset($_SESSION["login_errors"]);

    }

}