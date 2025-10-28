<?php

echo '<h1>PHP et HTML</h1>';

/******************************
 *     Partie 1
 ******************************/

$message = '... à partir d\'ici';

/******************************
 *     Partie 2
 ******************************/

$firstname = 'John';
$lastname = 'Doe';
$age = 38;

$string1 = 'My name is ' . $firstname . ' ' . $lastname . '!';
$string2 = "My name is $firstname $lastname!";
$string3 = "My name is <em>$firstname $lastname</em>!";

echo $string1 . '<br>';
print $string1 . '<br>';
echo $string2 . '<br>';
echo '<strong>', $string3, '</strong>', '<br>';

/******************************
 *     Partie 3
 ******************************/

$customerData = [
    'firstname' => 'John',
    'lastname' => 'Doe',
    'age' => 38,
];

$string4 = "Name : %s %s / Age : %d<br>";
printf($string4, $firstname, $lastname, $age);
vprintf($string4, $customerData);

/******************************
 *     Partie 4
 ******************************/

echo '<ul>';
for ($i = 0; $i < 10; $i++) {
    echo '<li>Item numéro ' . ($i + 1) . '</li>';
}
echo '</ul>';

?>

<!--
******************************
*     Partie 5
******************************
-->

<h2><?php echo "À vous de jouer..."; ?></h2>
<h3><?= $message ?></h3>

<?php

echo "<h1>Texte dans une balise heading de niveau 1 (h1)</h1>";
echo "<b>Texte affiché en gras</b>";

/* SUITE : à vous de jouer */

echo "<h3> Mon super titre de niveau 3 </h3>";
echo "<p><strong><em> Une phrase en gras et en italique </em></strong></p>";
echo "<p style='color:red'> Une phrase en rouge</p>";
echo "<p> Un bloc de texte quelconque </p>";
echo "<ul>";
for ($i = 0; $i < 4; $i++) {
    echo "<li> Entrée de liste n°" . ($i + 1) . "</li>";
}
echo "</ul>";

echo "<h2>Boucles et Tableaux</h2>";

echo "<table border=1 cellspacing=10 cellpadding=10>
        <tbody>";

for ($i = 0; $i < 10; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        echo "<td> ligne " . $i . ", cellule " . $j . "</td>";
    }
    echo "</tr>";
}

echo "</tbody>
        </table>";

echo "<h2> Tableau associatif (à mettre dans le fichier array.php) </h2>";

$products = array(
    [
        'id' => 27,
        'name' => 'Bonnet',
        'title' => 'Bonnet en laine d \' agneau.',
        'price' => 9.9,
    ],
    [
        'id' => 34,
        'name' => 'Écharpe',
        'title' => 'Écharpe en laine de mouton.',
        'price' => 19.5,
    ],
    [
        'id' => 122,
        'name' => 'Blouson',
        'title' => 'Blouson 50% polyester / 50% laine d \' alpaga.',
        'price' => 19.5,
    ],
);

foreach ($products as $product) {
    echo "<table border=1>";
    foreach ($product as $cle => $valeur) {
        echo "<tr> 
                <td>" . $cle . "</td>
                <td>" . $valeur . "</td>
              </tr>";
    }
    echo "</table> <br>";
}

echo "<h2> ProLevel 1 </h2>";

echo "<table cellspacing=0>
        <tbody>";

for ($i = 0; $i < 256; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 256; $j++) {
        echo "<td style='padding:1px;background-color:rgb(" . $i . "," . $j . ", $j " . ")'> </td>";
    }
    echo "</tr>";
}

echo "</tbody>
        </table>";

echo "<h2> ProLevel 2 </h2>";

echo "<pre>";
 var_dump($products);
echo "</pre>";
?>