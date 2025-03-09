
//Code for the Sign-up and Sign-in form toggling effect
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () =>{
    container.classList.add("active");
});

loginBtn.addEventListener('click', () =>{
    container.classList.remove("active");
});

//Code for the password validation
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
    return true;
}


/*
// Get elements by their IDs
const signup = document.getElementById('signup'); // Sign-up form
const signin = document.getElementById('signin'); // Sign-in form
const toggleLeft = document.getElementById('toggleLeft'); // Left toggle panel
const toggleRight = document.getElementById('toggleRight'); // Right toggle panel
const toggleLogin = document.getElementById('toggleLogin'); // Sign in button on left panel
const toggleSignup = document.getElementById('toggleSignup'); // Sign up button on right panel

// Add event listener for the "Sign In" button
toggleLogin.addEventListener('click', () => {
    // Switch to the sign-in form
    signup.classList.add("active"); // Add active class to the sign-up form
    signin.classList.remove("active"); // Remove active class from the sign-in form
    toggleRight.classList.add("active"); // Show the right toggle panel
    toggleLeft.classList.remove("active"); // Hide the left toggle panel
});

// Add event listener for the "Sign Up" button
toggleSignup.addEventListener('click', () => {
    // Switch to the sign-up form
    signup.classList.remove("active"); // Remove active class from the sign-up form
    signin.classList.add("active"); // Add active class to the sign-in form
    toggleRight.classList.remove("active"); // Hide the right toggle panel
    toggleLeft.classList.add("active"); // Show the left toggle panel
});
*/

