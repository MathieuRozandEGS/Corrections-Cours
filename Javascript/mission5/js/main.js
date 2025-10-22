
// La fonction calculer prend 3 paramaètres, et renvoie le résultat attendu dans la consigne
function calculer(a, b, c) {
    return (a + b) / c
}

const REPETITION = 5;

//Version optimisée visant à parcourir l'ensemble des erreurs possibles qui illustre aussi l'utilisation d'une boucle un peu particulière do...while qui nous permet d'effectuer au moins 1 fois la saisie de texte avant une quelconque vérification mais qui bloque l'utilisateur si il rentre des valuers ne correspondant pas aux attentes, ici des chiffres et un diviseur différent de 0

for (let i = 0; i < REPETITION; i++) {
  let chiffre1, chiffre2, diviseur;

  // On vérifie les entrées et bloque l'utilisateur si les attentes ne sont pas répondues...
  do {
    chiffre1 = Number(prompt("Entrez un premier nombre"));
    chiffre2 = Number(prompt("Entrez un second nombre"));
    diviseur = Number(prompt("Entrez un diviseur"));

    if (isNaN(chiffre1) || isNaN(chiffre2) || isNaN(diviseur)) {
      alert("Vous devez entrer des nombres valides !");
    } else if (diviseur === 0) {
      alert("Le diviseur ne peut pas être 0 !");
    }
  //... tant que les conditions sont fausses :)
  } while (isNaN(chiffre1) || isNaN(chiffre2) || isNaN(diviseur) || diviseur === 0);

  //Tout est bon, on peut appeler la fonction, stocker son retour dans la variable résultat et afficher ce dernier

  let resultat = calculer(chiffre1,chiffre2,diviseur)
  alert(`Le résultat de l'opération (${chiffre1} + ${chiffre2}) / ${diviseur} est : ${resultat}`)
}
