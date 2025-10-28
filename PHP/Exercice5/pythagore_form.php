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
        <h1>Calculer le théorème de Pythagore</h1>
        <form id="pythagore-form" action="pythagore.php" method="get">
            <div>
                <label id="lbl_CoteA" for="coteA">Côté A : </label>
                <input id="coteA" name="coteA" type="number">
            </div>
            <div>
                <label id="lbl_CoteB" for="coteB">Côté B : </label>
                <input id="coteB" name="coteB" type="number">
            </div>
            <div>
                <label></label>
                <input id="calcul" name="calcul" type="submit" value="Calculer">
            </div>
        </form>
    </section>
</body>