document.addEventListener('DOMContentLoaded', () => {
    const form = document.forms['reg'];

    form.addEventListener('submit', function (event) {
        let isValid = true;

        // Clear previous errors
        const errorElements = document.querySelectorAll('.error');
        errorElements.forEach(error => error.remove());

        // Validate Username
        const username = form['username'].value.trim();
        if (username === '') {
            displayError('username', 'Username is required.');
            isValid = false;
        }

        // Validate Email
        const email = form['email'].value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            displayError('email', 'Email is required.');
            isValid = false;
        } else if (!emailPattern.test(email)) {
            displayError('email', 'Enter a valid email address.');
            isValid = false;
        }

        // Validate First Name
        const firstname = form['firstname'].value.trim();
        if (firstname === '') {
            displayError('firstname', 'First name is required.');
            isValid = false;
        }

        // Validate Last Name
        const lastname = form['lastname'].value.trim();
        if (lastname === '') {
            displayError('lastname', 'Last name is required.');
            isValid = false;
        }

        // Validate Password
        const password = form['password'].value.trim();
        if (password === '') {
            displayError('password', 'Password is required.');
            isValid = false;
        } else if (password.length < 6) {
            displayError('password', 'Password must be at least 6 characters long.');
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    function displayError(fieldName, message) {
        const field = form[fieldName];
        const error = document.createElement('span');
        error.className = 'error';
        error.style.color = 'red';
        error.style.display = 'block'; // Ensures the error message is on a new line
        error.textContent = message;
        field.parentNode.insertBefore(error, field.nextSibling);
    }
});
