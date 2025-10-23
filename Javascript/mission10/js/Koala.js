import { Animal } from './Animal.js';

export class Koala extends Animal {
    constructor(lieu, imgBaby, imgParent) {
        super(lieu, imgBaby, imgParent); //appel du constructeur de la classe parente
    }

    makeSound() {
       return "audio/koala.mp3";//retourne le chemin de l'audio du koala
    }
}