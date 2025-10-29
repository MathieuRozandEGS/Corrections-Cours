<?php
include 'header.php';
?>

<?php

$id = $_GET['id'];
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

$query = "SELECT titre, resume, annee, auteur.nom, auteur.prenom 
        FROM livre 
        INNER JOIN auteur ON livre.auteur_id=auteur.id 
        WHERE livre.id LIKE " . $id;

$sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->execute();

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <article>
        <h2 class="txt-success">Information du livre</h2>

        <?php
        foreach ($result as $livre) {
            echo "<h2> Titre : " . $livre['titre'] . "</h2>";
            echo "<p> Année de publication : " . $livre['annee'] . "</p>";
            echo "<p> Résumé : " . $livre['resume'] . "</p>";
            echo "<p> Auteur : " . $livre['prenom'] . "&nbsp;" . $livre['nom'] . "</p>";
        }

        ?>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
</main>
<?php
include 'footer.php';
?>