<div class="card unique-card" id="registerCard">
    <h1>Ajouter une Maison</h1>

    <form action="/addhomepost" method="POST" style="margin-top: 5%">
        <input id="town" type="text" name="town" class="op" required class="input" placeholder="Ville">
        <input id="street" type="text" name="street" class="op" required class="input" placeholder="Rue">
        <input id="number" type="number" name="number" class="op" required class="input" placeholder="Numero">
        <input id="zipCode" type="text" name="zipCode" class="op" required class="input" placeholder="Code Postal">

        <input type="submit" value="Confirmer"class="bouton" style="margin-bottom: 4%">
        <a href="/myhomes">Retour vers mes maisons</a>
    </form>
</div>
