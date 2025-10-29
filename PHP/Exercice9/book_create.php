<?php
include 'header.php';
?>
    <main>
        <article>
            <h2>Confirmation de l'ajout du livre</h2>
            <?php

            if ( // ---------- PARTIE 1
                empty($_POST['isbn']) &&
                empty($_POST['titre']) &&
                empty($_POST['auteur_id']) &&
                 empty($_POST['annee']) &&
                  empty($_POST['resume']) 
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
                $query = "INSERT INTO livre ";
                $query .= "VALUES(NULL, '$isbn', '$titre', '$resume', '$annee', NULL, '$auteurId', NULL, NULL, NULL)";
                $result = $dbh->exec($query);

                // ---------- PARTIE 5
                $message = ($result === 1) ? "Ajout du livre réussi avec succès." : "L'ajout du livre n'a pas pu aboutir.";
            }
            ?>
            <p><?= $message ?></p>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
<?php
include 'footer.php';
?>