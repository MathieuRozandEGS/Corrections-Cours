<?php
include 'header.php';

$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

$search = $_POST['search'];

$query = "SELECT titre, resume, annee, auteur.nom, auteur.prenom 
        FROM livre 
        INNER JOIN auteur ON livre.auteur_id=auteur.id
        WHERE livre.titre LIKE :search";

$sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->execute(['search'=>"%$search%"]);

$livres = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <article>
        <h2 class="txt-success">Résultat de la recherche</h2>
        <?php 
            foreach($livres as $livre){
                echo "<div>
                        <h3> Titre : " . $livre['titre'] . "</h3>
                        <p> Resume :  " . $livre['resume'] . "</p>
                        <p> Ecrit par : " . $livre['prenom'] . "&nbsp" . $livre['nom'] . "</p>
                        <p> Publié en : " . $livre['annee'] . "</p>"; 
            }
        ?>
        <p>
            <a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a>
        </p>
    </main>
    <?php
    include 'footer.php';
    ?>

