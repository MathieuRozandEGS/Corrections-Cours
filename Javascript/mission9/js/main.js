//import en js

import { afficherResultatLoto } from './afficherLoto.js';
import { validateLotoInputs } from './validerLoto.js';
import { afficherMessageErreur } from './messageErreur.js';
import { comparerNumeros } from './comparerNumeros.js';
import { tirerLoto } from './tirerLoto.js';
import { resetLoto } from './resetLoto.js';

const inputs = document.querySelectorAll('[id^="chiffre"]');
const jokerInput = document.getElementById('joker');
//Récupérer le bouton de soumission

const submitButton = document.getElementById('joue');

//Récupérer le bouton de réinitialisation

const resetButton = document.getElementById('rejouer');

//Ajouter un écouteur d'événement au bouton de soumission

submitButton.addEventListener('click', function (event) {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton
    document.querySelectorAll('.toRemove').forEach(element => element.remove());//Supprimer les anciens messages d'erreur et résultats

    if (validateLotoInputs(inputs, jokerInput)[0]) { //Si les inputs sont valides
        //Récupérer les numéros joués
        const numerosJoues = Array.from(inputs).map(input => Number(input.value.trim())); //Récupérer les valeurs des inputs et les convertir en nombres
        const numeroChanceJoue = Number(jokerInput.value);//Récupérer le numéro chance joué (le dernier numéro)

        //tirer le loto
        const [numerosTires, numeroChanceTire] = tirerLoto();

        //afficher les numéros tirés
        afficherResultatLoto(numerosTires, numeroChanceTire);

        //comparer les numéros joués avec les numéros tirés
        const messageResultat = comparerNumeros(numerosJoues, numerosTires, numeroChanceJoue, numeroChanceTire);

        //afficher le message de résultat
        const messageContainer = document.createElement('div');
        messageContainer.classList.add('message-resultat');
        document.body.appendChild(messageContainer);
        messageContainer.classList.add('toRemove');
        messageContainer.textContent = messageResultat;

        submitButton.disabled = true; //Désactiver le bouton de soumission après un tirage
        resetButton.disabled = false; //Activer le bouton de réinitialisation
    }
    else {
        afficherMessageErreur(validateLotoInputs(inputs, jokerInput)[1]);
    }
});

resetButton.addEventListener('click', function (event) {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton
    resetLoto(inputs, jokerInput);
    submitButton.disabled = false; //Réactiver le bouton de soumission
    resetButton.disabled = true; //Désactiver le bouton de réinitialisation jusqu'au prochain tirage
});