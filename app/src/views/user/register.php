<div class="h1"><h1>Registration</h1></div>

<form action="/registerpost" method="POST">
	<div class="login">
        <fieldset>
            <legend>Register</legend>
            <div class="input"><label for="firstname" class="lab">First name : </label><input id="firstname" type="text" name="firstname" class="op" required></div>
            <div class="input"><label for="surname" class="lab">Surname : </label><input id="surname" type="text" name="surname" class="op" required></div>
            <div class="input"><label for="email" class="lab">Email : </label><input id="email" type="email" name="email" class="op" required></div>
            <div class="input"><label for="password" class="lab">Password : </label><input id="password" type="password" name="password" class="op" required></div>
            <div class="input"><label for="confirmation" class="lab">Confirmation : </label><input id="confirmation" type="password" name="confirmation" class="op" required></div>
            <div class="input"><label for="phone" class="lab">Phone : </label><input id="phone" type="tel" name="phone" class="op" required></div>
            <div class="input"><input type="submit" name="submit" value="Confirm" id="submit"></div>
        </fieldset>
	</div>
</form>