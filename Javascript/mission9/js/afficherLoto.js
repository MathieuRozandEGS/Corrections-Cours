//Fonction qui affiche le loto à l'utilisateur

export function afficherResultatLoto(loto, numeroChance) {
    const resultatContainer = document.createElement('ul');
    resultatContainer.classList.add('resultat-loto');
    document.body.appendChild(resultatContainer);
    resultatContainer.classList.add('toRemove');
    loto.forEach(num => {
        const listItem = document.createElement('li');
        listItem.textContent = num;
        resultatContainer.appendChild(listItem);
        listItem.classList.add('numero-tire');
    });
    const listItemChance = document.createElement('li');
    listItemChance.textContent = numeroChance;
    resultatContainer.appendChild(listItemChance);
    listItemChance.classList.add('numero-chance-tire');
}