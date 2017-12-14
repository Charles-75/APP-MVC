<div class="container-flex">

    <div class="card unique-card">
        <h1>Add Home</h1>

        <form action="/addhomepost" method="POST">
            <input id="town" type="text" name="town" class="op" required class="input" placeholder="Town">
            <input id="street" type="text" name="street" class="op" required class="input" placeholder="Street">
            <input id="number" type="number" name="number" class="op" required class="input" placeholder="Number">
            <input id="zipCode" type="text" name="zipCode" class="op" required class="input" placeholder="Zip code">

            <input type="submit" value="Confirmer"class="bouton"> <a href="/myhomes">Back to my homes</a>
        </form>
    </div>

</div>