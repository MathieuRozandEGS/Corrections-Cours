<?php
include 'header.php';
?>
<main>
    <h2>Recherche de livres</h2>
    <form id="book-search-form" action="book_search.php" method="post">
        <fieldset>
            <legend>Rechercher un livre (par son titre)</legend>
            <div>
                <label for="search_id">Rechercher le livre</label>
                <input type="text" placeholder="Titre du livre..." id="search_id" name="search">
            </div>

            <input type="submit" value="Rechercher">
        </fieldset>
    </form>
    <p>
        <a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a>
    </p>
</main>
<?php
include 'footer.php';
?>
