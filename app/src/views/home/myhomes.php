<?php include(__DIR__."/../templates/main/navbar.php") ?>


<div class="container home-container">


    <h1>Mes maisons</h1>

    <div class="card"><a href="/addhome" style="font-size: 150%"><img src="img/addHome.png" width="35px" height="35px" style="margin-top: 10px">  Ajouter une maison</a></div>


    <div class="homes-container">
        <?php foreach ($data['homes'] as $value): ?>
            <div class="card home">

                <iframe
                        frameborder="0" class="map"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyArELkdidNIXX2jnYgDvGSbqIgCQpdePMU&q=<?php echo urlencode($value['number'] . ' ' . $value['street'] . ' ' . $value['zipCode']) ?>" allowfullscreen>
                </iframe class="map">
                <div class="home-description">
                    Ville : <?php echo $value['town']; ?><br>
                    Rue : <?php echo $value['street']; ?><br>
                    Numero : <?php echo $value['number']; ?><br>
                    Code Postal : <?php echo $value['zipCode']; ?><br>
                    <div class="home-buttons">
                        <button onclick="HomeRedirection(<?php echo $value['id'];?>)" class="bouton">Choisir</button>
                        <button onclick="deleteHome(<?php echo $value['id']?>)" class="bouton bouton-delete">Supprimer</button>
                        <button onclick="guestRedirection(<?php echo $value['id'];?>)" class="bouton">Ajouter invité</button>
                        <button onclick="deleteGuest(<?php echo $value['id']?>)" class="bouton bouton-delete">Supprimer invité(s)</button>
                    </div>
                </div>
                <div>
                    <h3>Invité(s) :</h3>
                    <?php foreach ($value['guest'] as $key): ?>
                        <div style="margin-top: 20%"><?php echo $key['firstName'].' '. $key['surname']; ?></div>
                    <?php endforeach; ?>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

</div>




<script>
    function deleteHome(id)
    {
        if(confirm("Voulez-vous vraiment supprimer cette maison ?"))
        {
            document.location.href="deletehome/"+id+"/";
        }
        return false;
    }
    function deleteGuest(id) {
        document.location.href="deleteguest/"+id+"/";
    }


    function HomeRedirection(id){
        document.location.href="home/"+id+"/";
    }
    function guestRedirection(id) {
        document.location.href="addguest/"+id+"/";
    }
</script>
