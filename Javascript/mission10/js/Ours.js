import { Animal } from './Animal.js';

export class Ours extends Animal {
    constructor(lieu, imgBaby, imgParent) {
        super(lieu, imgBaby, imgParent);// appel du constructeur de la classe parente
    }

    makeSound() {
       return "audio/ours.mp3"; //retourne le chemin de l'audio de l'ours   
    }
}