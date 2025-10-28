<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Formulaire</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <section>
        <h1>Formulaire de contact</h1>
        <form id="contact-form" action="contact.php" method="get">
            <div>
                <label id="lbl_identity" for="identity">Nom et Prénom : </label>
                <input id="identity" name="identity" type="text">
            </div>
            <div>
                <label id="lbl_mail" for="mail">Email : </label>
                <input id="mail" name="mail" type="email" required>
            </div>
            <div>
                <label id="lbl_subject" for="subject">Sujet : </label>
                <input id="subject" name="subject" type="text" required>
            </div>
            <div>
                <label id="lbl_message" for="message">Votre message : </label>
                <textarea id="message" name="message" rows="10" cols="15" required></textarea>
            </div>
            <div>
                <label></label>
                <input id="signup" name="signup" type="submit" value="Envoyer">
            </div>
        </form>
    </section>
</body>