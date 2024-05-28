document.addEventListener('DOMContentLoaded', function () {
    var form = document.forms['form'];
  


    // Email
    var emailInput = form.elements['email'];
    var emailError = document.getElementById('email-error');
        var isEmailUnique = false;

    emailInput.addEventListener('blur', function () {
        if (!isValidEmail(emailInput.value)) {
            emailError.textContent = 'Veuillez entrer une adresse e-mail valide.';
            emailError.style.color='red';
        } else {
            emailError.textContent = ''; // Clear error message when valid
        }
    });

    // Name  
    var nameInput = form.elements['name'];
    var nameError = document.getElementById('name-error');
    nameInput.addEventListener('blur', function () {
        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Veuillez entrer votre nom.';
            nameError.style.color='red';
        } else {
            nameError.textContent = ''; // Clear error message when valid
        }
    });

    // Password  
    var passwordInput = form.elements['text-af00'];
    var passwordError = document.getElementById('password-error');
    passwordInput.addEventListener('blur', function () {
        if (passwordInput.value.trim() === '') {
            passwordError.textContent = 'Veuillez entrer votre mot de passe.';
            passwordError.style.color='red';
        } else {
            passwordError.textContent = ''; // Clear error message when valid
        }
    });

    // CIN  
    var cinInput = form.elements['text-7bd6'];
    var cinError = document.getElementById('number-error');
    cinInput.addEventListener('blur', function () {
        if (!isValidCIN(cinInput.value)) {
            cinError.textContent = 'Le CIN doit contenir 8 chiffres.';
            cinError.style.color='red';
        } else {
            cinError.textContent = ''; // Clear error message when valid
        }
    });

    // Phone  
    var phoneInput = form.elements['phone'];
    var phoneError = document.getElementById('phone-error');
    phoneInput.addEventListener('blur', function () {
        if (!isValidPhoneNumber(phoneInput.value)) {
            phoneError.textContent = 'Veuillez entrer un numéro de téléphone valide.';
            phoneError.style.color='red'
        } else {
            phoneError.textContent = ''; // Clear error message when valid
        }
    });

    form.addEventListener('submit', function (event) {
        if (
            !isValidEmail(emailInput.value) ||
            nameInput.value.trim() === '' ||
            passwordInput.value.trim() === '' ||
            !isValidCIN(cinInput.value) ||
            !isValidPhoneNumber(phoneInput.value)
        ) {
            alert('Veuillez remplir tous les champs correctement.');
            event.preventDefault(); // Prevent form submission if there are errors
         }
    });

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidCIN(cin) {
        var cinRegex = /^\d{8}$/;
        return cinRegex.test(cin);
    }

    function isValidPhoneNumber(phone) {
        var phoneRegex = /^\+?\d{0,3}[\s\(\-]?([0-9]{2,3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})$/;
        return phoneRegex.test(phone);
    }
});
