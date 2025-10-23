//Vérifier que les inputs répondent aux critères de validation d'un loto
export function validateLotoInputs(inputs, joker) {

    let message = '';

    const valeurs = Array.from(inputs).map(i => i.value.trim());

    const tousValides =
        Array.from(inputs).every(input => input.value.trim() //Vérifier que chaque valeur n'est pas vide
            && !isNaN(input.value)  //Verifier que chaque valeur est un nombre
            && Number(input.value) >= 0 && Number(input.value) <= 49) //Vérifier que chaque valeur est un nombre entre 0 et 49
        && new Set(valeurs).size === valeurs.length //Verifier l'unicité des valeurs, Set créer une collection en supprimant les doublons, donc si la taille du Set est égale à la taille du tableau initial, cela signifie qu'il n'y a pas de doublons
        && !isNaN(joker.value) //Vérifier que le numéro chance est un nombre
        && Number(joker.value) >= 0 && Number(joker.value) <= 9; //Vérifier que le numéro chance est un nombre entre 0 et 9

    if (Array.from(inputs).every(input => !input.value.trim())) { //Vérifier que chaque valeur n'est pas vide, trim() supprime les espaces avant et après la chaîne donc le !input.value.trim() vérifie si la chaîne est vide ou contient uniquement des espaces
        message = 'vide';
    }
    else if (!Array.from(inputs).every(input => !isNaN(input.value))) { //Verifier que chaque valeur est un nombre
        message = 'nombre';
    }
    else if (!Array.from(inputs).every(input => Number(input.value) >= 0 && Number(input.value) < 49)) { //Vérifier que chaque valeur est un nombre entre 0 et 49
        message = 'intervalle';
    }
    else if (new Set(valeurs).size !== valeurs.length) { //Verifier l'unicité des valeurs
        message = 'doublon';
    }
    else if (isNaN(joker.value) || Number(joker.value) < 0 || Number(joker.value) > 9) { //Vérifier que le numéro chance est un nombre entre 0 et 9
        message = 'joker';
    }

    return [tousValides, message]; //Retourne un tableau avec un booléen indiquant si tous les inputs sont valides et le message d'erreur correspondant
}