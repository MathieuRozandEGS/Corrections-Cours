<?php

$gameOver = false;
$score = 1789;
$highScore = 1492;
if (!$gameOver && ($score > $highScore)) { //Si on n'a pas perdu et que notre score dépasse le meilleur Score
    echo 'Vous êtes le meilleur !';
} else if (!$gameOver && ($score <= $highScore)) { //Si on n'a pas perdu et que notre score dépasse le meilleur Score
    echo 'Encore un effort !';
} else {
    echo 'Vous avez perdu !';
}

// Question 2
$gameOver = true;
// on a perdu


echo "<h2>Boucle </h2> ";
//Ecrire une boucle
for ($i = 10; $i >= 0; $i -= 2) {
    echo "i vaut : " . $i . "<br>";
}

// Créer et manipuler un tableau 

echo "<h2>Créer et manipuler un tableau </h2> ";
$prices = [12, 1, 3, 0, 451];
echo "la taille du tableau prices est : " . count($prices) . "<br>";

for ($i = 0; $i < count($prices); $i++) {
    if ($i < count($prices) - 1) {
        echo $prices[$i] . "&nbsp; <strong style='color:red'> | </strong> &nbsp;";
    } else {
        echo $prices[$i] . "<br>";
    }
}

$prices[2] = 45;

/* Pro */

echo "<h2>Niveau Pro </h2> ";

$amount = 0;

for ($i = 0; $i < count($prices); $i++) {
  $amount += $prices[$i];
  if($prices[$i] < 4){
    echo " <p> Oh ! une valeur plus petite que 4 : " . $prices[$i] . "</p>";
  }
}

echo "Somme : " .$amount;

?>