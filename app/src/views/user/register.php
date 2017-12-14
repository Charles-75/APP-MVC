<div class="card unique-card" id="registerCard">
    <div id="logoRegister">
        <img src="/img/Domisep.png" height="50%" width="50%">
    </div>


    <h1>Create an account</h1>

    <form action="/registerpost" method="POST" style="margin-top: 5%">
        <input id="firstname" type="text" name="firstname" class="op" required placeholder="Firstname">
        <input id="surname" type="text" name="surname" class="op" required placeholder="Lastname">
        <input id="email" type="email" name="email" class="op" required placeholder="E-mail">
        <input id="password" type="password" name="password" class="op" required placeholder="Password">
        <input id="confirmation" type="password" name="confirmation" class="op" required placeholder="Confirm password">
        <input id="phone" type="tel" name="phone" class="op" required placeholder="Phone number">

        <input type="submit" value="Confirm" class="bouton" style="margin-bottom: 4%">
        <a href="/login">Log in</a>
    </form>

</div>
