let cochon1 = {
    prenom: "toto",
    caractere: "brave",
    maison: {
        matiere: "en paille",
        superficie: "43 m2",
        maisonAvecFenetre: "non",
    },
};

let cochon2 = {
    prenom: "titi",
    caractere: "courageux",
    maison: {
        matiere: "en bois",
        superficie: "53 m2",
        maisonAvecFenetre: "oui",
    },
};

let cochon3 = {
    prenom: "tutu",
    caractere: "peureux",
    maison: {
        matiere: "en brique",
        superficie: "66 m2",
        maisonAvecFenetre: "oui",
    },
};

//Version sans la boucle

// cochon 1
console.log("/**** Cochon 1 ****/")
console.log("Prenom : " + cochon1.prenom
    + "\nCaractère : " + cochon1.caractere
    + "\nMaison en : " + cochon1.maison.matiere
    + "\nSuperficie de la maison : " + cochon1.maison.superficie + "m2"
    + "\nMaison avec fenêtre : " + cochon1.maison.maisonAvecFenetre
);

// cochon 2
console.log("/**** Cochon 2 ****/")
console.log("Prenom : " + cochon2.prenom
    + "\nCaractère : " + cochon2.caractere
    + "\nMaison en : " + cochon2.maison.matiere
    + "\nSuperficie de la maison : " + cochon2.maison.superficie + "m2"
    + "\nMaison avec fenêtre : " + cochon2.maison.maisonAvecFenetre
);

// cochon 3
console.log("/**** Cochon 3 ****/")
console.log("Prenom : " + cochon3.prenom
    + "\nCaractère : " + cochon3.caractere
    + "\nMaison en : " + cochon3.maison.matiere
    + "\nSuperficie de la maison : " + cochon3.maison.superficie + "m2"
    + "\nMaison avec fenêtre : " + cochon3.maison.maisonAvecFenetre
);


const cochons = [cochon1, cochon2, cochon3];

//Version avec une boucle

for (let i = 0; i < cochons.length; i++) {
    console.log("/**** Cochon " + (i+1) + " ****/")
    console.log("Prenom : " + cochons[i].prenom
        + "\nCaractère : " + cochons[i].caractere
        + "\nMaison en : " + cochons[i].maison.matiere
        + "\nSuperficie de la maison : " + cochons[i].maison.superficie + "m2"
        + "\nMaison avec fenêtre : " + cochons[i].maison.maisonAvecFenetre
    );
}