function checkCredentials() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var xhr = new XMLHttpRequest();
    var url = 'check.php';

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                alert('Connexion réussie ');
            } else {
                alert('Identifiants incorrects. Veuillez réessayer ');
            }
        }
    };

    var data = 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password);

    xhr.send(data);
}
