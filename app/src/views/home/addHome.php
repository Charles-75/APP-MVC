<div class="container-flex">

    <div class="card unique-card">
        <h1>Add Home</h1>

        <form action="/addhomepost" method="POST">
            <input id="town" type="text" name="town" class="op" required class="input" placeholder="Ville">
            <input id="street" type="text" name="street" class="op" required class="input" placeholder="Nom de rue">
            <input id="number" type="number" name="number" class="op" required class="input" placeholder="Numéro de rue">
            <input id="zipCode" type="text" name="zipCode" class="op" required class="input" placeholder="Code postal">

            <input type="submit" value="Confirmer"class="bouton"> <a href="/myhomes">Retour à mes maisons</a>
        </form>
    </div>

</div>