<?php
include 'header.php';
?>
<main>
    <article>
        <h2>Liste des utilisateurs</h2>
        <?php

        $user = "root"; /* À compléter */
        $pass = "root";

        try {

            /* (4) DÉFINITION DE LA REQUÊTE MySQL : à vous de jouer */
            $sql = 'SELECT first_name , last_name , pseudo , email FROM user';

            /* (1) CONNEXION À LA BASE DE DONNÉES : à vous de jouer */
            $dbh = new PDO('mysql:host=localhost;dbname=egs', $user, $pass);

            $sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute();
            
            $result =$sth->fetchAll();


            /* (3) AFFICHAGE DU RÉSULTAT : à vous de jouer */

            echo "<table border=1>
                    <thead>
                        <tr>
                            <th> Prénom </th>
                            <th> Nom </th>
                            <th> Pseudo </th>
                            <th> Email </th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($result as $row) {  //parcours de la réponse de la query faite en BDD
                echo "<tr>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['pseudo'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>
                </table>";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
    </article>
</main>
<?php
include 'footer.php';
?>