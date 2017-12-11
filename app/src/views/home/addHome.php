<div class="h1"><h1>Add Home</h1></div>

<form action="/addhomepost" method="POST">
    <div class="login">
        <fieldset>
            <legend>Add Home</legend>
            <div class="input"><label for="town" class="lab">Town : </label><input id="town" type="text" name="town" class="op" required></div>
            <div class="input"><label for="street" class="lab">Street : </label><input id="street" type="text" name="street" class="op" required></div>
            <div class="input"><label for="number" class="lab">Number : </label><input id="number" type="number" name="number" class="op" required></div>
            <div class="input"><label for="zipCode" class="lab">Code postal: </label><input id="zipCode" type="text" name="zipCode" class="op" required></div>
            <div class="input"><input type="submit" name="submit" value="Confirm" id="submit"></div>
        </fieldset>
    </div>
</form>