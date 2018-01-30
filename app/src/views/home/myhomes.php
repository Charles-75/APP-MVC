<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container home-container">


    <h1>Mes maisons</h1>

    <div class="card center"><a href="/addhome" style="font-size: 150%"><img src="img/addHome.png" width="35px" height="35px" style="margin-top: 10px">  Ajouter une maison</a></div>


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
                    </div>
                    <?php if(sizeof($value['guest']) > 0): ?>
                    <h3>Invité(s) :</h3>
                    <ul>
                    <?php foreach ($value['guest'] as $key): ?>
                        <li><?php echo $key['firstName'].' '. $key['surname']; ?></li>
                    <?php endforeach; ?>
                    </ul>
                    <button onclick="deleteGuest(<?php echo $value['id']?>)" class="bouton bouton-delete">Gérer les invités</button>
                    <?php endif; ?>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <?php if (!empty($data['homesGuests'])){ ?>
    <h1 style="display: block; width: 100%; padding: 20px;">Maisons invités</h1>

    <div class="homes-container">
    <?php foreach ($data['homesGuests'] as $value1): ?>
        <div class="card home">
           <?php foreach ($value1['guest'] as $key1): ?>
               <iframe
                       frameborder="0" class="map"
                       src="https://www.google.com/maps/embed/v1/place?key=AIzaSyArELkdidNIXX2jnYgDvGSbqIgCQpdePMU&q=<?php echo urlencode($key1['number'] . ' ' . $key1['street'] . ' ' . $key1['zipCode']) ?>" allowfullscreen>
               </iframe class="map">
               <div class="home-description">
                   Ville : <?php echo $key1['town']; ?><br>
                   Rue : <?php echo $key1['street']; ?><br>
                   Numero : <?php echo $key1['number']; ?><br>
                   Code Postal : <?php echo $key1['zipCode']; ?><br>
                   <div class="home-buttons">
                       <button onclick="HomeRedirection(<?php echo $value1['apartmentId'];?>)" class="bouton">Choisir</button>
                   </div>
               </div>
           <?php endforeach; ?>
        </div>
     <?php endforeach; ?>
    </div>
    <?php } ?>

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
