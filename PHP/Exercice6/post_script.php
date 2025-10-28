<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css" />
    <?php

    $tablang = array();

    $tablang['title']['fr'] = 'Page d\'accueil';
    $tablang['title']['en'] = 'Homepage';
    $tablang['title']['es'] = 'Página principal';
    $tablang['title']['jap'] = 'ホームページ';

    $tablang['msg']['fr'] = 'Bienvenue sur notre site, ';
    $tablang['msg']['en'] = 'Welcome on our website, ';
    $tablang['msg']['es'] = 'Bienvenido a la página principal de nuestro sitio web, ';
    $tablang['msg']['jap'] = '私たちのサイトへようこそ, ';

    if (!empty($_POST['language']) && !empty($_POST['firstname']) && !empty($_POST['gender'])) {
        $language = $_POST['language'];
        $firstname = $_POST['firstname'];
        $gender = $_POST['gender'];
        $titre = $tablang['title'][$language];
        $msg = $tablang['msg'][$language] . $gender . "&nbsp;" . $firstname;
    } else {
        $titre = 'Erreur';
        $msg = '<span class="error">Erreur : vous n\'avez pas rempli le formulaire correctement</span>';
    }
    ?>
    <title><?php echo $titre; ?></title>
</head>

<body>
    <section>
        <h1><?php echo $titre; ?></h1>
        <article>
            <?php

            echo '<p>' . $msg . '</p>';

            ?>
            <p><a href="POST_form.php" title="Retour au formulaire">Retour au formulaire</a></p>
        </article>
    </section>
</body>

</html>