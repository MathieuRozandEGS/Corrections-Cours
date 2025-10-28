<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Confirmation</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <section>
        <h1>Confirmation de l'envoi de votre message</h1>
        <article>
            <?php

            if (empty($_GET['coteA']) && empty($_GET['coteB'])) {
                $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
            } elseif (empty($_GET['coteA'])) {
                $message = 'Erreur : le champ "Côté A" du formulaire est vide.';
            } elseif (empty($_GET['coteB'])) {
                $message = 'Erreur : le champ "Côté B" du formulaire est vide.';
            }  else {
                $coteA = $_GET['coteA'];
                $coteB = $_GET['coteB'];
                $hypothenuse = sqrt(($coteA * $coteA) + ($coteB * $coteB));
                $message = "L'hypothneuse vaut : " . $hypothenuse;
            }

            echo "<p>" . $message . "</p>";

            ?>
            <p><a href="pythagore_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
        </article>
    </section>
</body>