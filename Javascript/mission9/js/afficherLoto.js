//Fonction qui affiche le loto à l'utilisateur

export function afficherResultatLoto(loto, numeroChance) {
    const resultatContainer = document.createElement('ul');//Créer un conteneur pour afficher les résultats
    resultatContainer.classList.add('resultat-loto');
    document.body.appendChild(resultatContainer);
    resultatContainer.classList.add('toRemove');
    loto.forEach(num => { //Pour chaque numéro tiré
        const listItem = document.createElement('li'); //Créer un élément de liste
        listItem.textContent = num; //Ajouter le numéro tiré à l'élément de liste
        resultatContainer.appendChild(listItem);
        listItem.classList.add('numero-tire');
    });
    const listItemChance = document.createElement('li'); //Créer un élément de liste pour le numéro chance
    listItemChance.textContent = numeroChance; //Ajouter le numéro chance tiré à l'élément de liste
    resultatContainer.appendChild(listItemChance);
    listItemChance.classList.add('numero-chance-tire');
}