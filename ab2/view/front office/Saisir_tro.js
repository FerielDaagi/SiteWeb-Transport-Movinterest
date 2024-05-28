function validateForm(){
    var marque = document.getElementById('marque').value;
    var modele = document.getElementById('modele').value;
    var num_serie = document.getElementById('num_serie').value;
    var duree = document.getElementById('duree').value;
    var date = document.getElementById('date').value;
    var heure = document.getElementById('heure').value;

    // Vérification pour chaque champ
    if (marque.trim() === '') {
        alert('Veuillez saisir une marque');
        return false;
    }
    if (!/^[A-Z][a-zA-Z]*$/.test(marque)) {
        alert('La marque doit commencer par une majuscule et ne peut contenir que des lettres.');
        return false;
    }
    if (modele.trim() === '') {
        alert('Veuillez saisir un modèle');
        return false;
    }
    if (!/^[A-Z][a-zA-Z]*$/.test(modele)) {
        alert('La modele doit commencer par une majuscule et ne peut contenir que des lettres.');
        return false;
    }
    if (num_serie === '') {
        alert('Veuillez saisir un numéro de série');
        return false;
    }

    if (num_serie.length !== 12) {
        alert('Le numéro de série doit avoir une longueur de 12 caractères');
        return false;
    }

    if (duree === '') {
        alert('Veuillez saisir une durée');
        return false;
    }
    if (duree.length >5) {
        alert('Le duree doit avoir une longueur < a 5 caractères');
        return false;
    }

    if (date === '') {
        alert('Veuillez saisir une date');
        return false;
    }

    if (heure === '') {
        alert('Veuillez saisir une heure');
        return false;
    }

    // Si toutes les vérifications passent, le formulaire est valide
    return true;
}
