<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div class="container align-box narrow-container">
    <div class="card card-full center">
        <h1>Changer de mot de passe</h1>
        <?php
        if (isset($_SESSION['warning'])){
            echo '<div style="margin-top: 1%; background-color: #D60D0D; padding: 1%;">'.$_SESSION['warning'].'</div>';
        }
        ?>
        <form action="/changepasswordadminpost" method="POST">
            <div style="margin-top: 2%">
                <label for="password" style="display: inline-block; width: 180px">Mot de passe actuel : </label>
                <input id="password" type="password" name="password" style="display: inline-block; width: 250px;" required>
            </div>
            <div style="margin-top: 1%">
                <label for="password1" style="display: inline-block; width: 180px">Nouveau mot de passe : </label>
                <input id="password1" type="password" name="password1" style="display: inline-block; width: 250px;" required>
            </div>
            <div style="margin-top: 1%">
                <label for="password2" style="display: inline-block; width: 180px">Confirmation : </label>
                <input id="password2" type="password" name="password2" style="display: inline-block; width: 250px;" required>
            </div>
            <input type="submit" class="bouton"><a href="/updateadmin" style="margin-left: 1%">Retour</a>
        </form>
    </div>
</div>