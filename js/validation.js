(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // validation function
    const validateLength = (input, minLength) => {
        if (input.value.length < minLength) {
            input.setCustomValidity(`Ce champ doit comporter au moins ${minLength} caractères.`);
        } else {
            input.setCustomValidity('');
        }
    };

    // Loop over forms and add event listeners
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            // Get the first name and last name inputs
            const userFirstName = form.querySelector('#userFirstName');
            const userLastName = form.querySelector('#userLastName');
            const userPassword = form.querySelector('#userPassword');

            // Apply custom validation
            validateLength(userFirstName, 2);
            validateLength(userLastName, 2);

            // Check password pattern
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
            if (!passwordPattern.test(userPassword.value)) {
                userPassword.setCustomValidity('Le mot de passe doit comporter au moins 8 caractères, une majuscule, une minuscule et un caractère spécial.');
            } else {
                userPassword.setCustomValidity('');
            }

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
})();
