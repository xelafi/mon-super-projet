let form = document.querySelector('#form-contact');
let btnContact = document.querySelector("#btn-contact");

form.addEventListener('submit', function( e ){
    e.preventDefault();
    btnContact.textContent = "Envoye du message...";

    let request = new XMLHttpRequest();
    // Récupération des info sur les champs
    let formData = new FormData(form);

    request.addEventListener("load", function() {
        btnContact.textContent = "Message envoyé !"
    }, false);
    request.addEventListener("error", function() {
        btnContact.textContent = "Erreur lors de l'envoye du message"
    }, false);

    request.open('POST', '/contact');
    request.send(formData);
    // Faire une requete sur le controller pour envoyer le mail

});