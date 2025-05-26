const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signup');

signUpButton.addEventListener('click', function () {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
});

signInButton.addEventListener('click', function () {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
});

// Toggle functionality for Sign In Password
document.addEventListener('DOMContentLoaded', function () {
    const toggleSignInPassword = document.querySelector('#toggleSignInPassword');
    const signInPassword = document.querySelector('#signInPassword');

    if (toggleSignInPassword && signInPassword) {
        toggleSignInPassword.addEventListener('click', function () {
            const type = signInPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            signInPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    }

    // Toggle functionality for Sign Up Password
    const togglePassword = document.querySelector('#togglePassword');
    const signUpPassword = document.querySelector('#password');

    if (togglePassword && signUpPassword) {
        togglePassword.addEventListener('click', function () {
            const type = signUpPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            signUpPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    }
});


