//Fonction de comparaison des numéros joués avec les numéros tirés
export function comparerNumeros(joues, tirees, numeroChanceJoue, numeroChanceTire) {

    const numerosGagnes = joues.filter(num => tirees.includes(num)); // Filtre les numéros joués qui sont présents dans les numéros tirés
    const numeroChanceGagne = (numeroChanceJoue === numeroChanceTire); // Vérifie si le numéro chance joué correspond au numéro chance tiré

    let resultat = numerosGagnes.length;
    let message = '';

    switch (resultat) { // Génère le message en fonction du nombre de numéros gagnants
        case 0: {
            message = 'Vous n\'avez aucun numéro gagnant.';
            break;
        }

        case 1: {
            message = 'Vous avez 1 numéro gagnant.';
            break;
        }

        default: {
            message = `Vous avez ${resultat} numéros gagnants.`;
        }
    }

    numeroChanceGagne ? message += ' Vous avez également gagné le numéro chance !' : message += ' Vous n\'avez pas trouvé le numéro chance.';

    return message;
}
