<div class="container align-box narrow-container">

    <div class="card">
        <h1>Ajouter une Maison</h1>

        <input type="text" id="search" class="input">

        <form action="/addhomepost" method="POST" style="margin-top: 5%">
            <input id="town" type="hidden" name="town" class="op" required class="input" placeholder="Ville">
            <input id="street" type="hidden" name="street" class="op" required class="input" placeholder="Rue">
            <input id="number" type="hidden" name="number" class="op" required class="input" placeholder="Numero">
            <input id="zipCode" type="hidden" name="zipCode" class="op" required class="input" placeholder="Code Postal">

            <input type="submit" value="Confirmer"class="bouton" style="margin-bottom: 4%">
            <a href="/myhomes">Retour vers mes maisons</a>
        </form>
    </div>

</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArELkdidNIXX2jnYgDvGSbqIgCQpdePMU&libraries=places"></script>
<script>

    var input_town = document.getElementById('town');
    var input_street = document.getElementById('street');
    var input_number = document.getElementById('number');
    var input_zipCode = document.getElementById('zipCode');

    var input = document.getElementById('search');


    autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.place_changed = function() {
        var place = autocomplete.getPlace()
        console.log(place);
        for(var i = 0 ; i < place.address_components.length ; i++) {
            var addressComponent = place.address_components[i];
            if(addressComponent.types.indexOf("street_number") >= 0) {
                var street_number = addressComponent.long_name;
            }
            if(addressComponent.types.indexOf("route") >= 0) {
                var route = addressComponent.long_name;
            }
            if(addressComponent.types.indexOf("locality") >= 0) {
                var town = addressComponent.long_name;
            }
            if(addressComponent.types.indexOf("postal_code") >= 0) {
                var postal_code = addressComponent.long_name;
            }
        }
        input_town.value = town;
        input_street.value = route;
        input_number.value = street_number;
        input_zipCode.value = postal_code;
    }
</script>