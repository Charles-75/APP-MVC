<?php include(__DIR__."/../templates/main/navbar.php") ?>


<div class="container">


    <h1>Mes maisons</h1>

    <div class="hover"><a href="/addhome" style="font-size: 150%"><img src="img/addHome.png" width="35px" height="35px" style="margin-top: 10px">  Ajouter une maison</a></div>

    <?php foreach ($data as $value): ?>
        <div class="card card-half">
            <ul>
                <div style="margin-top: 2%">
                    <li>Ville : <?php echo $value['town']; ?></li>
                    <li>Rue : <?php echo $value['street']; ?></li>
                    <li>Numero : <?php echo $value['number']; ?></li>
                    <li>Code Postal : <?php echo $value['zipCode']; ?></li>
                </div>
            </ul>
            <div style="display: flex; margin-top: 2%">
                <div style="margin-left: 2%"><button onclick="roomsRedirection(<?php echo $value['id'];?>)" class="bouton">Choisir</button></div>
                <div style="margin-left: 2%"><button onclick="delete_confirm(<?php echo $value['id']?>)" class="boutonDelete">Supprimer</button></div>
                <div style="margin-left: 2%"><?php
                if ($value['id'] == $_SESSION['apartmentId']){
                    ?>
                    <img src="/img/checked.png" width="40px" height="40px">
                    <?php
                }
                    ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

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
        document.location.href="rooms/"+id+"/";
    }
</script>
