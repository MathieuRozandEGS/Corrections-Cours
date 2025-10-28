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

            if (empty($_GET['subject']) && empty($_GET['mail']) && empty($_GET['message'])) {
                $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
            } elseif (empty($_GET['subject'])) {
                $message = 'Erreur : le champ "Sujet" du formulaire est vide.';
            } elseif (empty($_GET['mail'])) {
                $message = 'Erreur : le champ "Email" du formulaire est vide.';
            } elseif (empty($_GET['message'])) {
                $message = 'Erreur : le champ "Message" du formulaire est vide.';
            }  else {
                $identity = $_GET['identity'];
                $subject = $_GET['subject'];
                $mail = $_GET['mail'];
                $message = $_GET['message'];
            }

            echo '<ul>
                    <li>
                        <strong> Reçu le : </strong>' . date('d/m/Y H:i:s') . '
                    </li>
                    <li>
                        <strong> De : </strong>' . $mail . '
                    </li>
                    <li>
                        <strong> Sujet : </strong>' . $subject . '
                    </li>
                    <li>
                        <strong> Message : </strong>' . $message . '
                    </li>
                </ul>';

            ?>
            <p><a href="contact_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
        </article>
    </section>
</body>