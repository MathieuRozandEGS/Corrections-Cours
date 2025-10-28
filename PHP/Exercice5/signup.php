<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Confirmation</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <section>
        <h1>Confirmation de l'inscription</h1>
        <article>
            <?php

            if (empty($_GET['lastname']) && empty($_GET['firstname']) && empty($_GET['mail'])) {
                $message = 'Erreur : les champs du formulaire sont vides.';
            } elseif (empty($_GET['lastname'])) {
                $message = 'Erreur : le champ "Nom" du formulaire est vide.';
            } elseif (empty($_GET['firstname'])) {
                $message = 'Erreur : le champ "Prénom" du formulaire est vide.';
            } elseif (empty($_GET['mail'])) {
                $message = 'Erreur : le champ "Email" du formulaire est vide.';
            }  else {
                $nom = $_GET['lastname'];
                $prenom = $_GET['firstname'];
                $mail = $_GET['mail'];
                $message = 'Bonjour ' . $prenom . ' ' . $nom .'<br> Votre adresse mail est : ' . $mail;
            }

            echo '<p>' . $message . '</p>';

            ?>
            <p><a href="signup_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
        </article>
    </section>
</body>