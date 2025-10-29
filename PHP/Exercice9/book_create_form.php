<?php
include 'header.php';

$user = 'root';
$pass = 'root';


$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

$sql = "SELECT nom, prenom, id FROM auteur";

$stmt = $dbh->prepare($sql);
$stmt->execute();
$auteurs = $stmt->fetchAll();
var_dump($auteurs);
?>
<main>
    <h2>Ajout d'un livre</h2>
    <form id="book-create-form" action="book_create.php" method="post">
        <fieldset>
            <legend>Formulaire d'ajout d'un livre</legend>
            <div>
                <label id="lbl_isbn" for="isbn" class="required">ISBN<sup></sup>
                </label>
                <input id="isbn" name="isbn" type="text" required="required">
            </div>
            <div>
                <label id="lbl_titre" for="titre" class="required">Titre<sup></sup>
                </label>
                <input id="titre" name="titre" type="text" required="required">
            </div>
            <div>
                <label id="lbl_resume" for="resume">Résumé<sup></sup>
                </label>
                <textarea id="resume" name="resume"></textarea>
            </div>
            <div>
                <label id="lbl_annee" for="annee">Année de publication<sup></sup>
                </label>
                <input id="annee" name="annee" type="number">
            </div>
            <div>
                <label id="lbl_auteur_id" for="auteur_id" class="required">Identifiant de l'auteur<sup></sup>
                </label>
                <!--<input id="auteur_id" name="auteur_id" type="number" required="required"> -->

                <!-- pro level -->
                <select name="auteur_id" id="auteur_id">
                    <?php foreach ($auteurs as $auteur) {
                        echo "<option value='" . $auteur['id'] . "'> " . $auteur['prenom'] . "&nbsp;" . $auteur['nom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label></label>
                <input id="create" name="create" type="submit" value="Créer le livre" class="info">
                <input id="reset" name="reset" type="reset" value="Annuler" class="error">
            </div>
        </fieldset>
    </form>
    <p>
        <a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a>
    </p>
</main>
<?php
include 'footer.php';
?>

