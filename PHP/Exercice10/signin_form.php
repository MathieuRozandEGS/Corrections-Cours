<?php
include 'header.php';
?>

<main>
    <article>
        <form id="signin-form" action="signin.php" method="post">
            <h2>Connexion à l'espace bibliothèque</h2>
            <div>
                <label for="email" class="required">E-mail <sup></sup></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password" class="required">Mot de passe <sup></sup></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="buttons-only">
                <input type="submit" value="Se connecter" style="background-color: #9eeaf9; color: #087990; border: 1px solid #087990;">
                <input type="reset" value="Annuler" style="background-color: #f1aeb5; color: #b02a37; border: 1px solid #b02a37;">
            </div>
        </form>
    </article>
</main>



<?php
include 'footer.php';
?>