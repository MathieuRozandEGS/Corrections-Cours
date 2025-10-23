//Générer les messages d'erreurs

export function afficherMessageErreur(message) {
    const messageContainer = document.createElement('span'); //Créer un conteneur pour afficher le message d'erreur
    messageContainer.classList.add('message-erreur');
    document.body.appendChild(messageContainer);
    messageContainer.classList.add('toRemove');
    switch (message) { //Afficher le message d'erreur correspondant
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
        case 'joker': {
            messageContainer.textContent = 'Attention à votre numéro chance ;)  .';
            break;
        }
        default: {
            messageContainer.textContent = '';
        }
    }
}