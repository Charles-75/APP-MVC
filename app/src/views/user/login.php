<div class="container">

    <form action="/loginpost" method="POST">

        <div class="input">
            <label for="userEmail"> Username : </label>
            <input id="userEmail" type="email" placeholder="sophie@example.com" name="userEmail" class="op">
        </div>

        <div class="input">
            <label for="userPassword"> Password : </label>
            <input id="userPassword" type="password" autocomplete="current-password" name="userPassword" class="op">
        </div>

        <div class="checkbox">
            <input type="checkbox" name="rememberMe" id="rememberMe" class="remember">
            <label for="rememberMe">Remember me ?</label>
        </div>
        <input type="submit" value="Connection" id="submit" class="bouton">

        <div class="liens">
            <a href="/resetpassword">Forgotten password?</a>
            <a href="/register">Need an account?</a>
        </div>

    </form>

</div>


<style>
    form {
        width: 400px;
        margin-left: auto;
        margin-right: auto;
        background-color: white;
    }
</style>