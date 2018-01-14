<?php include(__DIR__."/../templates/main/navbar.php") ?>
<div class="container home-container">

    <div class="card" id="card-capteurs">
        <h1 class="titre" style="color:rgb(255, 95, 95)">Mes Capteurs</h1>
        <div class="capteur_temperature ecriture">

            <div class="repere1">La température est de 56 °C<button id="ouv_temperature" onclick="opencity('#ouv_temperature','#temperature')"   >afficher plus </button></div>
            <div id="temperature" class="temperatures" style="display:none" >
                <?php  foreach ($data['bigdata'] as $value):


                    if ($value['type'] == 'temperature'){ ?>
                        <div class="petit">La <?php echo $value['type']; ?> de la pièce "<?php echo $value['name'] ?>" est à <?php echo $value['value'];?> °C<button><a href="#">détails</a></button> </div>
                    <?php }

                endforeach;

                ?>
                <div class="petit"> La température de la pièce 1 est 55°C <button ><a href='#'>détails</a></button></div>
                <div class="petit"> La température de la pièce 2 est 50°C <button  ><a href='#'>détails</a></button></div>
                <div class="petit"> La température de la pièce 3 est 60°C <button  ><a href='#'>détails</a></button></div>
                <button id="ferm_temperature" onclick="closecity('#temperature','#ouv_temperature')"> afficher moins</button>
            </div>
        </div>
        <div class="capteur_pression ecriture">
            <div>La pression est de 1 Pa <button id="ouv_pression" onclick="opencity('#ouv_pression','#pression')">afficher plus</button></div>
            <div id='pression' style="display:none">
                <div class="petit"> La pression de la pièce 1 est 2 Pa<button ><a href='#'>détails</a></button></div>
                <div class="petit"> La pression de la pièce 2 est 0 Pa<button  ><a href='#'>détails</a></button></div>
                <button id="ferm_pression" onclick="closecity('#pression','#ouv_pression')">afficher moins</button>
            </div>
        </div>
        <span id="ajoutCapteur" >Ajouter un capteur </h3><a href="/addstuff/<?php echo $data['apartmentId']; ?>">  <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a></span>

    </div>

    <div class="card" id="card-rooms">
        <h1 class="titre" style="color:rgb(46, 182, 46)"> Mon appartement</h1>
        Ajouter une pièce <a href="/addroom/<?php echo $data['apartmentId']; ?>" > <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a>

        <h3>Mes pièces</h3>
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