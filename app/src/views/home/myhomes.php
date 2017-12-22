<?php include(__DIR__."/../templates/main/navbar.php") ?>


<div class="container">


    <h1>Mes maisons</h1>

    <div class="hover"><a href="/addhome" style="font-size: 150%"><img src="img/addHome.png" width="35px" height="35px" style="margin-top: 10px">  Ajouter une maison</a></div>


    <div class="homes-container">
        <?php foreach ($data as $value): ?>
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
                        <a href="/home/<?= $value['id'];?>" class="bouton">Choisir</a>
                        <button onclick="delete_confirm(<?php echo $value['id']?>)" class="bouton bouton-delete">Supprimer</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>




<script>
    function delete_confirm(id)
    {
        if(confirm("Voulez-vous vraiment supprimer cette maison ?"))
        {
            document.location.href="deletehome/"+id+"/";
        }
        return false;
    }
    function roomsRedirection(id){
        document.location.href="home/"+id+"/";
    }
</script>
