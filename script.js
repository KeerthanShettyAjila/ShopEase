// Check if the URL contains the 'register' query parameter
const urlParams = new URLSearchParams(window.location.search);
const isRegister = urlParams.has('register');

// Get the container element
const container = document.getElementById('container');

// If 'register' is in the URL, add the 'right-panel-active' class
if (isRegister) {
    container.classList.add('right-panel-active');
}

// Existing event listeners for buttons (if any)
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});
