<?php
include 'header.php';

$id = $_POST['id'];

if ( // ---------- PARTIE 1
    empty($_POST['isbn']) &&
    empty($_POST['titre']) &&
    empty($_POST['auteur_id'])
) {
    $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
} elseif (empty($_POST['isbn'])) {
    $message = 'Erreur : le champ "ISBN" du formulaire est vide.';
} elseif (empty($_POST['titre'])) {
    $message = 'Erreur : le champ "Titre" du formulaire est vide.';
} elseif (empty($_POST['auteur_id'])) {
    $message = 'Erreur : le champ "Identifiant de l\'auteur" du formulaire est vide.';
} else { // ---------- PARTIE 2
    $isbn = $_POST['isbn'];
    $titre = $_POST['titre'];
    $resume = $_POST['resume'];
    $annee = $_POST['annee'];
    $auteurId = $_POST['auteur_id'];
    $message = '';

    // ---------- PARTIE 3
    $user = "root";
    $pass = "root";
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

    // ---------- PARTIE 4
    $sql = "UPDATE livre
        SET isbn = :isbn,
            titre = :titre,
            `resume` = :resume,
            auteur_id = :auteurId,
            annee = :annee
        WHERE id = :id";


    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':isbn' => $isbn,
        ':titre' =>  $titre,
        ':resume' =>  $resume,
        ':annee' => $annee,
        ':auteurId' => $auteurId,
        ':id' => $id  
    ]);

}
?>
<main>
    <article>
        <p>Le livre a été mise à jour.</p>
        <p>
            <a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a>
        </p>
    </main>
    <?php
    include 'footer.php';
    ?>

