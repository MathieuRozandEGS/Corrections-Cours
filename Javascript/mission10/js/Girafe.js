import { Animal } from './Animal.js';

export class Girafe extends Animal {
    constructor(lieu, imgBaby, imgParent) {
        super(lieu, imgBaby, imgParent); //appel du constructeur de la classe parente
    }

    makeSound() {
       return "audio/girafe.mp3"; //retourne le chemin de l'audio de la girafe
    }
}