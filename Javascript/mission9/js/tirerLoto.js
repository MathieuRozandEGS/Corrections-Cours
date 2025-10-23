//Fonction qui tire le loto

export function tirerLoto() {
    const tirage = new Set();
    while (tirage.size < 5) {
        const numero = Math.floor(Math.random() * 50); // Génère un nombre aléatoire entre 0 et 49
        tirage.add(numero); // Ajoute le numéro au Set (les doublons sont automatiquement gérés)
    }
    //tire le dernier numéro chance entre 0 et 9
    const numeroChance = Math.floor(Math.random() * 10);

    return [Array.from(tirage), numeroChance];
}