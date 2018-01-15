<?php include(__DIR__."/../templates/main/navbar.php") ?>
<div class="container home-container">

    <div class="card" id="card-capteurs">
        <h1 class="titre" style="color:rgb(255, 95, 95)">Mes Capteurs</h1>
                <?php
                foreach($data['sensor_type']as $allTypes ) { ?>
                     <div class="capteur_<?php echo $allTypes['type'] ?> ecriture">
                     <div> <?php echo $allTypes['type'] ?> est de ?? en moyenne <button id="ouv_<?php echo $allTypes['type'] ?>" onclick="opencity('#ouv_<?php echo $allTypes['type'] ?>','#<?php echo $allTypes['type'] ?>')"   >afficher plus </button></div>
                     <div id="<?php  echo $allTypes['type'] ?>" class="<?php  echo $allTypes['type'] ?>s" style="display:none" >
                    <?php
                    foreach ($data['bigdata'] as $value) {
                        if ($value['type'] == $allTypes['type']) { ?>
                            <div class="petit">La <?php echo $value['type']; ?> de la pièce
                                "<?php echo $value['name'] ?>" est à <?php echo $value['value']; ?>
                                <button><a href="#">détails</a></button>
                            </div>
                            <?php
                        }
                    } ?>
                    <button id="ferm_<?php echo $allTypes['type'] ?>" onclick="closecity('#<?php echo $allTypes['type'] ?>','#ouv_<?php echo $allTypes['type'] ?>')"> afficher moins</button>
                    </div> <br>
                    </div>
                <?php  }
                ?>
        <span id="ajoutCapteur" >Ajouter un capteur </h3><a href="/addstuff/<?php echo $data['apartmentId']; ?>">  <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a></span>

    </div>

    <div class="card" id="card-rooms">
        <h1 class="titre" style="color:rgb(46, 182, 46)"> Mes pièces </h1>
        Ajouter une pièce <a href="/addroom/<?php echo $data['apartmentId']; ?>" > <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a>


        <div class="pieces" >
            <?php foreach ($data['apartmentData'] as $value): ?>
            <div class="petit" ><a  href='/home/<?php echo $data['apartmentId']; ?>/<?php echo $value['name']; ?>'><?php echo $value['name']; ?></a></div>
            <?php endforeach; ?>

        </div>
    </div>
    <div id="orderAndNotif">
        <div class="card" id="card-notif">

            <h1 class="titre" style="color:rgb(78, 196, 196)"> Mes Notifications</h1>
                <div id="listNotif">
                    <?php

                    $tr = "<table>";
                    foreach ($data['dataNotif'] as $notif){
                        $tr .= "<tr onclick='openNotif(". $notif['id'] .")'><td class='linkSubject'>".$notif['subject']."</td></tr>";
                    }
                    $tr.="</table>";
                    echo $tr;

                    ?>

                </div>
        </div>
        <div class="card" id="card-ordre">
            <h1 class="titre "  style="color:rgb(78, 196, 196)" >Mes Ordres </h1>
            <div class="ecriture">
                <div> je t'ordronne d'allumer une lampe<button id="ouv_ordre" onclick="opencity('#ouv_ordre','#ordre')">Afficher plus</button></div>
                <div id="ordre" style="display:none">
                    <div class="petit"> info sur le temps</div>
                    <div class="petit"> info sur les capteurs</div>
                    <div class="petit">info sur les pièces</div>
                    <button id="ferm_ordre" onclick="closecity('#ordre','#ouv_ordre')">Afficher moins</button>
                </div>
                <span id="ajoutOrdre" >Ajouter un ordre </h3><a href="#">  <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a></span>

            </div>

        </div>
    </div>


</div>


<style>

    .card {
        box-sizing: border-box;
        width: 100%;
    }

    @media(min-width: 1440px) {
        .card {
            width: 30%;
        }
    }

</style>

<script>

    function opencity(a,b){


        $(a).hide(1);
        $(b).show(1);
    }
    function closecity(a,b){
        $(a).hide(1);
        $(b).show(1);
    }


    // Notifications

    var notifications = JSON.parse("<?php echo addslashes(json_encode($data['dataNotif'])); ?>");

    function openNotif(notifId) {
        notifications.forEach(function(notif) {
            if(notif.id == notifId) {
                // TODO : afficher une fenêtre modale
                alert(notif.subject + "   :   " + notif.content);
            }
        })
    }




</script>