<?php
include 'header.php';

$id = $_GET['id'];
?>
    <main>
        <h2>Suppression d'un livre</h2>
        <form id="book-delete-form" action="book_delete.php" method="post">
            <fieldset>
                <label for="delete">Etes vous sûr(e) de vouloir supprimer le livre ?</label>
                <input type="hidden" name="id" value="<?= htmlspecialchars((string) $id) ?>">
                <input id="delete" type="submit" value="Supprimer">
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php
include 'footer.php';
?>
