<?php


/* Partie 1 */

$number1 = 10;
$number2 = 4;
$message = 'Le résultat de la division vaut : ';
$result = $number1 / $number2;

echo $message . $result . '<br>'; // Affiche "Le résultat de la division vaut : 2.5"

/* Partie 2 */

$isTrue = true;
$isFalse = !$isTrue;
$message = 'La variable booléenne "isFalse" vaut : ';

echo $message . ($isFalse ? 'true' : 'false') . '<br>'; // Affiche "La variable booléenne "isFalse" vaut : false"

/* Partie 3 */

$number3 = 4.56713;
$otherResult = $number3 * $number2;
$message = 'Le résultat de la multiplication vaut : ' . $otherResult; // Concaténation des chaînes et des nombres

echo $message; // Affiche "Le résultat de la multiplication vaut : 18.26852"
echo '<br>';

/* SUITE : à vous de jouer */
/* Question 3 */
$trueOrFalse = $isTrue && $isFalse;
$message = 'La variable booléenne "trueOrFalse" vaut : ' . $trueOrFalse;
echo $message . '<br>'; // Affiche "La variable booléenne "trueOrFalse"

$trueOrFalse = $isTrue || $isFalse;
$message = 'La variable booléenne "trueOrFalse" vaut : ' . $trueOrFalse;
echo $message . '<br>'; // Affiche "La variable booléenne "trueOrFalse"


$name = "Dupont";
$firstname = "Alice";
$message = "Bonjour " . $firstname . " " . $name . ", bienvenue sur notre site web!";
echo $message; // Affiche "Bonjour Alice Dupont, bienvenue sur notre site web!"
?>