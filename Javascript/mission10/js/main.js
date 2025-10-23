//importer les classes
import { Lion } from './Lion.js';
import { Girafe } from './Girafe.js';
import { Koala } from './Koala.js';
import { Ours } from './Ours.js';
import { creerAnimal } from './creerAnimal.js';

//récupérer les boutons

const animalButtons = document.querySelectorAll('.animalButton');
const resetButton = document.getElementById('reset');

animalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const animalType = button.getAttribute('data-animal'); //récupérer le type d'animal à partir de l'attribut data-animal
        let animal; //déclaration de la variable animal
        const sons = document.querySelectorAll('audio'); //récupérer tous les éléments audio présents
        if (sons.length > 0) {//vérifier s'il y a des sons en cours de lecture
            sons.forEach(son => {
                son.pause(); //mettre en pause chaque son
            })
        }
        switch (animalType) {
            case 'Lion':
                animal = new Lion('habitation1', 'img/bebeLion.gif', 'img/parentLion.gif');
                creerAnimal(animal);
                break;
            case 'Girafe':
                animal = new Girafe('habitation2', 'img/bebeGirafe.gif', 'img/parentGirafe.gif');
                creerAnimal(animal);
                break;
            case 'Koala':
                animal = new Koala('habitation3', 'img/bebeKoala.gif', 'img/parentKoala.gif');
                creerAnimal(animal);
                break;
            case 'Ours':
                animal = new Ours('habitation4', 'img/bebeOurs.gif', 'img/parentOurs.gif');
                creerAnimal(animal);
                break;
        }
    });
});

resetButton.addEventListener('click', () => {
    //logique pour réinitialiser l'état du zoo
    const toRemoves = document.querySelectorAll('.toRemove');
    toRemoves.forEach(element => {
        element.remove();
    });
});