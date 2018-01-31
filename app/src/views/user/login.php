<div class="container align-box narrow-container">

    <img src="/img/Domisep.png" class="img-responsive" id="login-logo">

    <div class="card">

        <?php
            if (isset($_SESSION['info'])){
                echo '<div style="margin-bottom: 2%; background-color: #43DC7E; padding: 1%; font-size: 80%">'.$_SESSION['info'].'</div>';
            }

            session_destroy();
            session_start();
        ?>

        <form action="/loginpost" method="POST">

        <input id="email" type="email" name="email" placeholder="Adresse e-mail" value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>">

        <input id="password" type="password" name="password" placeholder="Mot de passe" value="<?php if (isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">

        <div class="checkbox">
            <input type="checkbox" name="rememberMe" id="rememberMe" <?php if (isset($_COOKIE['checked'])){ echo 'checked';} ?>>
            <label for="rememberMe">Se souvenir de moi?</label>
        </div>
        <input type="submit" value="Connexion" id="submit" class="bouton">

            <div class="liens">
                <a href="/resetpassword">Mot de passe oublié?</a>
                <a href="/register" style="display: inline-block; margin-left: 10%">Inscription</a>
            </div>

        </form>



    </div>

</div>