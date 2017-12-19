<div class="alignBox container">

    <div id="logo">
        <img src="/img/Domisep.png" height="50%" width="50%">
    </div>

    <div class="card unique-card">

        <form action="/loginpost" method="POST">

            <input id="email" type="email" name="email" placeholder="Adresse e-mail">

            <input id="password" type="password" name="password" placeholder="Mot de passe">

            <div class="checkbox">
                <input type="checkbox" name="rememberMe" id="rememberMe">
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