<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la langue (POST)</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <section>
        <h1>Choix de la langue</h1>
        <form id="language-form" action="post_script.php" method="post">
            <div>
                <label id="lbl_gender" for="gender">Veuillez choisir votre genre :</label>
                <select id="gender" name="gender">
                    <option value="Mme.">Femme</option>
                    <option value="M.">Homme</option>
                    <option value=" ">Non Binaire</option>
                </select>
            </div>
            <div>
                <label id="lbl_language" for="language">Veuillez choisir votre langue :</label>
                <select id="language" name="language">
                    <option value="fr">Français</option>
                    <option value="en">English</option>
                    <option value="es">Espanol</option>
                    <option value="jap">日本人</option>
                </select>
            </div>
            <div>
                <label id="lbl_firstname" for="firstname">Veuillez saisir votre prénom :</label>
                <input id="firstname" name="firstname" type="text">
            </div>
            <div>
                <label></label>
                <input id="validate" name="validate" type="submit" value="Valider">
            </div>
        </form>
    </section>
</body>

</html>