<?php include(__DIR__."/../templates/main/navbar.php") ?>
<div class="container home-container">

    <div class="card" id="card-capteurs">
        <h1>Ma maison</h1>
        <a href="/addgear/<?php echo $data['apartmentId']; ?>" class="bouton">Ajouter un capteur</a>

        <?php foreach ($data['sensorsData'] as $sensor): ?>

        <p><?= $sensor['typeName'] . ' : ' . $sensor['averageValue'] ?></p>

        <?php endforeach; ?>

    </div>

    <div class="card" id="card-rooms">
        <h1>Mes pièces</h1>
        <a href="/addroom/<?php echo $data['apartmentId']; ?>" class="bouton">Ajouter une pièce</a>
        <a href="/deleteroom/<?php echo $data['apartmentId']; ?>" class="a-delete" style="color: white">Supprimer pièce(s)</a>

        <div style="margin-top: 8%">
            <?php foreach ($data['apartmentData'] as $value): ?>
            <div><a  href='  /home/<?php echo $data['apartmentId']; ?>/<?php echo $value['name']; ?>'><?php echo $value['name']; ?></a></div>
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
            Ajouter un ordre </h3><a href="#">  <img class="ajout" src="/img/ajout.png" width="16" height="16"> </a>

            <div id="contenuOrdre">
                <div> je t'ordronne d'allumer une lampe<button id="ouv_ordre" onclick="opencity('#ouv_ordre','#ordre')">Afficher plus</button></div>
                <div id="ordre" style="display:none">
                    <div class="petit"> info sur le temps</div>
                    <div class="petit"> info sur les capteurs</div>
                    <div class="petit">info sur les pièces</div>
                    <button id="ferm_ordre" onclick="closecity('#ordre','#ouv_ordre')">Afficher moins</button>
                </div>

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
    .a-delete{
        padding: 10px;
        background-color: #DC1114;
        border: 1px solid #C81113;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        font: 400 11px Roboto;
        display: inline-block;
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
