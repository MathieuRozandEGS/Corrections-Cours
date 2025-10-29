<?php
include 'header.php';

$id = $_POST['id'];
if ($id === null || $id === false) {
    header('Location: index.php');
    exit;
}

$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);

$query = "DELETE FROM livre WHERE id = :id";
$sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->execute([':id' => $id]);
$deletedRows = $sth->rowCount();
?>
    <main>
        <article>
            <?php if ($deletedRows > 0): ?>
                <p>Le livre a été supprimé.</p>
            <?php else: ?>
                <p>Aucun livre trouvé pour cet identifiant.</p>
            <?php endif; ?>
            <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
        </article>
    </main>
<?php
include 'footer.php';
?>
