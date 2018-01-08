<div class="container align-box" id="login-container">

    <img src="/img/Domisep.png" class="img-responsive" id="login-logo">

    <div class="card">

        <p> Admin page</p>

        <form action="/login_adminpost" method="POST">

        <input id="email" type="email" name="email" placeholder="Adresse e-mail" value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>">

        <input id="password" type="password" name="password" placeholder="Mot de passe" value="<?php if (isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">

        <div class="checkbox">
            <input type="checkbox" name="rememberMe" id="rememberMe" <?php if (isset($_COOKIE['checked'])){ echo 'checked';} ?>>
            <label for="rememberMe">Se souvenir de moi?</label>
        </div>
        <input type="submit" value="Connexion" id="submit" class="bouton">

            <div class="liens">
                <a href="/resetpassword">Mot de passe oublié?</a>
                <a href="/register">Inscription</a>
            </div>

        </form>

    </div>

</div>