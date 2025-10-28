<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Formulaire</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <section>
        <h1>Formulaire d'inscription</h1>
        <form id="signup-form" action="signup.php" method="get">
            <div>
                <label id="lbl_lastname" for="lastname">Nom</label>
                <input id="lastname" name="lastname" type="text">
            </div>
            <div>
                <label id="lbl_firstname" for="firstname">Prénom</label>
                <input id="firstname" name="firstname" type="text">
            </div>
            <!--Ajout du mail-->
            <div>
                <label id="lbl_mail" for="mail">Email</label>
                <input id="mail" name="mail" type="email" required>
            </div>
            <div>
                <label></label>
                <input id="signup" name="signup" type="submit" value="S'inscrire">
            </div>
        </form>
    </section>
</body>