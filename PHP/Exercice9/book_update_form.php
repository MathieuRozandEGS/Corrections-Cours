<?php
include 'header.php';

$id = $_GET['id'];
if ($id === null || $id === false) {
    header('Location: index.php');
    exit;
}

$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

$query = "SELECT * FROM livre WHERE id = :id";
$sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->execute([':id' => $id]);

$livre = $sth->fetch();

var_dump($livre)

?>
    <main>
        <h2>Modification d'un livre</h2>
        <form id="book-update-form" action="book_update.php" method="post">
            <fieldset>
                <legend>Formulaire de mise à d'un livre</legend>
                <div>
                    <label id="lbl_isbn" for="isbn" class="required">ISBN<sup></sup></label>
                    <input id="isbn" name="isbn" type="text" required="required" value="<?php echo $livre['isbn'] ?>">
                </div>
                <div>
                    <label id="lbl_titre" for="titre" class="required">Titre<sup></sup></label>
                    <input id="titre" name="titre" type="text" required="required" value="<?php echo $livre['titre'] ?>">
                </div>
                <div>
                    <label id="lbl_resume" for="resume">Résumé<sup></sup></label>
                    <textarea id="resume" name="resume"> <?php echo $livre['resume'] ?></textarea>
                </div>
                <div>
                    <label id="lbl_annee" for="annee">Année de publication<sup></sup></label>
                    <input id="annee" name="annee" type="number" value="<?php echo $livre['annee'] ?>">
                </div>
                <div>
                    <label id="lbl_auteur_id" for="auteur_id" class="required">Identifiant de l'auteur<sup></sup></label>
                    <input id="auteur_id" name="auteur_id" type="number" required="required" value="<?php echo $livre['auteur_id'] ?>" >
                </div>
                <div>
                    <label></label>
                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $id) ?>">
                    <input id="create" name="create" type="submit" value="Modifier le livre" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php
include 'footer.php';
?>