let age = prompt('Quel âge as-tu?');
let prenom = prompt("Quel est ton prénom?");
//pour le bonus, on doit modifier la déclaration de prenom et age de const par let, puisque l'on va mettre à jour ces dernières



//Ecrire les conditions ici.
//Pour afficher un message à l'écran, vous pouvez utiliser la méthode alert().

//Bonus
while (isNaN(age)) { //isNan vérifie que la variable n'est pas un nombre
    alert("Tu n'as pas d'âge ?");
    age = prompt('Quel âge as-tu?');
}

while (prenom.trim().length == 0) { //trim supprime les espaces de la chaine de caractères, et legnth fait la somme des caractères restants
    alert("Tu n'as pas de prénom ?");
    prenom = prompt("Quel est ton prénom?");
}

if (age < 18) {
    alert(`Non non ${prenom}, tu n'as que ${age} ans! Tu es encore trop jeune pour ça!!`)
}
else if (age == 18) {
    alert(`Bonjour ${prenom}, je vois que tu as ${age} ans! Tu es juste majeur!!`)
}
else {
    alert(`C'est bon, c'est bon ${prenom}, tu as ${age} ans... Tu commences à te faire
vieux…`)
}
