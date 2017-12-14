<div class="card unique-card">

    <form action="/loginpost" method="POST">

        <input id="email" type="email" name="email" placeholder="Adresse e-mail">

        <input id="password" type="password" name="password" placeholder="Mot de passe">

        <div class="checkbox">
            <input type="checkbox" name="rememberMe" id="rememberMe">
            <label for="rememberMe">Remember me ?</label>
        </div>
        <input type="submit" value="Connexion" id="submit" class="bouton">

        <div class="liens">
            <a href="/resetpassword">Forgotten password?</a>
            <a href="/register">Need an account?</a>
        </div>

    </form>

</div>