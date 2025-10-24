const urlToFetch = "https://geo.api.gouv.fr/";// L'URL de l'API

const templateLi = document.querySelector('template');// On récupère le template

//Actions sur l'input du code postal
const codePostal = document.querySelector('#search'); 
const listeVilles = document.querySelector('#citiesArea');

codePostal.addEventListener('keyup', (e) => {
    const code = e.target.value;// On récupère la valeur tapée dans le champ input

    if (code.length === 5) {
        listeVilles.innerHTML = '';
        fetch(`${urlToFetch}communes?codePostal=${code}`)// On fait la requête à l'API
            .then(response => response.json())// On transforme la réponse en JSON
            .then(
                villes => {// On récupère les villes
                    if (villes.length > 0) {
                        villes.forEach(ville => {
                            let cloneTemplate = document.importNode(templateLi.content, true);
                            let li = cloneTemplate.querySelector('li');
                            let spanCP = li.querySelector('.CP');
                            let spanNom = li.querySelector('.cityName');
                            let spanPop = li.querySelector('.cityLiving');
                            spanCP.textContent = code;// On remplit les spans avec les données de l'API
                            spanNom.textContent = ville.nom;// On remplit les spans avec les données de l'API
                            spanPop.textContent = ville.population;// On remplit les spans avec les données de l'API
                            listeVilles.appendChild(cloneTemplate);
                        })
                    } else {
                        let cloneTemplate = document.importNode(templateLi.content, true);
                        let li = cloneTemplate.querySelector('li');
                        li.textContent = "Aucune ville trouvée pour ce code postal.";
                        listeVilles.appendChild(cloneTemplate);
                    }
                }
            )
    }
})

//Remplir sur le select des départements
const selectDepartements = document.querySelector('#departementArea');

fetch(`${urlToFetch}departements`).then(response => response.json()).then(
    departements => {
        departements.forEach(departement => {
            let option = document.createElement('option');
            option.value = departement.code;
            option.textContent = `${departement.code} - ${departement.nom}`;
            selectDepartements.appendChild(option);
        })
    }
)

//Actions au select d'un département

const listeVillesDep = document.querySelector('#citiesAreaByDepartement');

listeVillesDep.style.maxHeight = '200px';
listeVillesDep.style.overflowY = 'auto';

selectDepartements.addEventListener('change', (e) => {
    const codeDep = e.target.value;
    listeVillesDep.innerHTML = '';
    let totalVille = 0;
    let totalHab = 0;

    fetch(`${urlToFetch}departements/${codeDep}/communes`)
    .then(response => response.json())
    .then(
        villes => {
            if (villes.length > 0) {
                villes.forEach(ville => {
                    let cloneTemplate = document.importNode(templateLi.content, true);
                    let li = cloneTemplate.querySelector('li');
                    let spanCP = li.querySelector('.CP');
                    let spanNom = li.querySelector('.cityName');
                    let spanPop = li.querySelector('.cityLiving');
                    spanCP.textContent = ville.codePostal;// On remplit les spans avec les données de l'API
                    spanNom.textContent = ville.nom;// On remplit les spans avec les données de l'API
                    spanPop.textContent = ville.population;// On remplit les spans avec les données de l'API
                    listeVillesDep.appendChild(cloneTemplate);
                    totalHab += ville.population; // On ajoute la population de la ville au total des habitants
                    totalVille++; // On incrémente le nombre de villes
                    document.querySelector('#nombre').textContent = totalVille;// On affiche le total des villes
                    document.querySelector('#habitants').textContent = totalHab;// On affiche le total des habitants
                })
            } else {
                let cloneTemplate = document.importNode(templateLi.content, true);
                let li = cloneTemplate.querySelector('li');
                li.textContent = "Aucune ville trouvée pour ce département.";
                listeVillesDep.appendChild(cloneTemplate);
            }
        }
    )
})