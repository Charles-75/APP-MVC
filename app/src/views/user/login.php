<div class="alignBox">
<div id="logo">
    <img src="/img/Domisep.png" height="50%" width="50%">
    <div style="margin-right: 50%"><h1>Home'Isep</h1></div>
    <div style ="margin-right: 30%"><h2 class="titleLogin">par Domisep</h2></div>
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

        <div class="liens" style="margin-top: 3%">
            <a href="/resetpassword" style="margin-right: 6%">Mot de passe oublié?</a>
            <a href="/register">Inscription</a>
        </div>

    </form>

</div>
</div>