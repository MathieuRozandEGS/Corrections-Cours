//Vérifier que les inputs répondent aux critères de validation d'un loto

const inputs = document.querySelectorAll('[id^="chiffre"]');

function validateLotoInputs(inputs) {

    let message = '';

    const valeurs = Array.from(inputs).map(i => i.value.trim());

    const tousValides = 
        Array.from(inputs).every(input => input.value.trim() //Vérifier que chaque valeur n'est pas vide
        && !isNaN(input.value)  //Verifier que chaque valeur est un nombre
        && Number(input.value) >= 0 && Number(input.value) <= 49) //Vérifier que chaque valeur est un nombre entre 0 et 49
        && new Set(valeurs).size === valeurs.length; //Verifier l'unicité des valeurs, Set créer une collection en supprimanbt les doublons, donc si la taille du Set est égale à la taille du tableau initial, cela signifie qu'il n'y a pas de doublons

    if(Array.from(inputs).every(input => !input.value.trim())){
        message = 'vide';
    }
    else if(!Array.from(inputs).every(input => !isNaN(input.value))){
        message = 'nombre';
    }
    else if(!Array.from(inputs).every(input => Number(input.value) >= 0 && Number(input.value) > 49)){
        message = 'intervalle';
    }
    else if(new Set(valeurs).size !== valeurs.length){
        message = 'doublon';
    }

    return [tousValides, message];
}

//Générer les messages d'erreurs

function afficherMessageErreur(message) {
    const messageContainer = document.createElement('message-erreur');
    document.body.appendChild(messageContainer);
    messageContainer.classList.add('toRemove');
    switch(message){
        case 'vide': {
            messageContainer.textContent = 'Tous les champs doivent être remplis.';
            break;
        }   
        case 'nombre': {
            messageContainer.textContent = 'Tous les champs doivent être des nombres.';
            break;
        }   
        case 'intervalle': {
            messageContainer.textContent = 'Les nombres doivent être compris entre 0 et 49.';
            break;
        }   
        case 'doublon': {
            messageContainer.textContent = 'Les nombres doivent être uniques.';
            break;
        }   
        default: {
            messageContainer.textContent = '';
        }
    }
}

//Récupérer le bouton de soumission

const submitButton = document.getElementById('joue');

//Ajouter un écouteur d'événement au bouton de soumission

submitButton.addEventListener('click', function (event) {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton
    validateLotoInputs(inputs); // Appeler la fonction de validation
    afficherMessageErreur(validateLotoInputs(inputs)[1]); // Afficher le message d'erreur si nécessaire
});