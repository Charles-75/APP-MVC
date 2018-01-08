<div class="container align-box narrow-container">

    <div class="card">
        <div id="logoRegister">
            <img src="/img/Domisep.png" height="50%" width="50%" id="register-logo">
        </div>


    <h1>Créer un compte</h1>

        <?php
        if (isset($_SESSION['warning'])){
            echo '<div style="margin-top: 2%; background-color: #D60D0D; padding: 1%;">'.$_SESSION['warning'].'</div>';
        }
        ?>

        <form action="/registerpost" method="POST" style="margin-top: 5%">
            <input id="firstname" type="text" name="firstname" class="op" required placeholder="Prénom">
            <input id="surname" type="text" name="surname" class="op" required placeholder="Nom">
            <input id="email" type="email" name="email" class="op" required placeholder="E-mail">
            <input id="password" type="password" name="password" class="op" required placeholder="Mot de passe">
            <input id="confirmation" type="password" name="confirmation" class="op" required placeholder="Confirmation">
            <input id="phone" type="tel" name="phone" class="op" required placeholder="Numéro de téléphone">
            <input id="cgu" type="checkbox" name="cgu" class="op" required><label for="cgu"> <span class="op" style = "color: rgb(34, 117, 194)">J'accepte les CGU</span></label>
            <br/>
            <br/>
            <input type="submit" value="Confirmer" class="bouton" style="margin-bottom: 4%">
            <a href="/login">Se connecter</a>
        </form>

    </div>

</div>