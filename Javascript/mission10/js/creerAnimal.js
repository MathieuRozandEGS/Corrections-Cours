export function creerAnimal(animal) {
    const lieu = document.getElementById(animal.lieu);
    const nombreEnfants = lieu.querySelectorAll('img').length; //compter le nombre d'images (enfants) déjà présentes dans le lieu
    if (nombreEnfants >= 3) { //vérifier si la capacité maximale est atteinte
        alert("Capacité maximale atteinte pour le lieu d'habitation !");
    }
    else {
        const imgAnimal = document.createElement('img');//création de l'élément image
        imgAnimal.src = animal.prendrePhoto();//définir la source de l'image en fonction de l'âge de l'animal
        imgAnimal.setAttribute("width", animal.size + "px"); //définir la taille de l'image
        imgAnimal.classList.add("toRemove");

        if (!lieu.querySelector('audio')) {
            const crieAnimal = document.createElement('audio'); //créer un objet audio pour le son de l'animal (sans faire la balise audio, c'est comme vous voulez)
            crieAnimal.src = animal.makeSound(); //définir la source du son
            crieAnimal.autoplay = true; //lire automatiquement le son
            crieAnimal.controls = true;
            crieAnimal.classList.add("toRemove");
            crieAnimal.play();
            lieu.appendChild(crieAnimal); //ajouter l'élément audio au lieu
        }
        else {
            lieu.querySelector('audio').play();
        }
        lieu.appendChild(imgAnimal);
    }
}