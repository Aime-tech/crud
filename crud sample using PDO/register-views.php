<?php

// Function to render signup errors or 
//check if there are signup errors in the session
//and remove them from the session

function render_errors(){

    // Check if there are signup errors in the session
    if (isset($_SESSION["signup_errors"])) {

        // Retrieve the errors from the session
        $errors = $_SESSION["signup_errors"];

        // Loop through each error and display it in a styled HTML element
        foreach($errors as $error) {

            // Display the error message in a centered <h4> element with red color
            echo '<center><h4 style="color:firebrick">' . $error . '</h4></center>';

        }

        // Remove the errors from the session to prevent them from being displayed again
        unset($_SESSION["signup_errors"]);

    }

}