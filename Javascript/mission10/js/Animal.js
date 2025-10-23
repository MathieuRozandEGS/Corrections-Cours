//Création de la classe Animal
export class Animal {
    constructor(lieu, imgBaby, imgParent) {
        this.lieu = lieu; //habitation dans laquelle se trouve l'animal
        this.size = Math.floor(Math.random() * 200 - 40 + 1) + 40; //taille aléatoire entre 40 et 200
        this.imgBaby = imgBaby;//chemin de l'image du bébé
        this.imgParent = imgParent;// chemin de l'image du parent
    }

    makeSound() {
        
    }

    isBaby() {
        return this.size * 2.5 < 200; //un animal est considéré comme bébé si sa taille multipliée par 2.5 est inférieure à 200
    }
    
    prendrePhoto(){
        return this.isBaby() ? this.imgBaby : this.imgParent; //retourne l'image du bébé ou du parent en fonction de l'âge
    }
}