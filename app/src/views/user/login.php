<div class="container">

    <form action="/loginpost" method="POST">

        <div class="input">
            <label for="email"> Username : </label>
            <input id="email" type="email" name="email">
        </div>

        <div class="input">
            <label for="password"> Password : </label>
            <input id="password" type="password" name="password">
        </div>

        <div class="checkbox">
            <input type="checkbox" name="rememberMe" id="rememberMe">
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