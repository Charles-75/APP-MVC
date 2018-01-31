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
        <ul>
            <?php foreach ($data['rooms'] as $room): ?>
                <li><a href="/room/<?php echo $room['id']; ?>"><?php echo $room['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>
    <div id="orderAndNotif">
        <div class="card" id="card-notif">

            <h1 class="titre">Mes Notifications</h1>
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
            <a href="#" class="bouton">  Aujouter un ordre </a>

            <div id="contenuOrdre">
                <?php  foreach ($data['order'] as $order){ ?>
                    <div> <?php  echo $order['title']; ?><button id="ouv_ordre" onclick="opencity('#ouv_<?php echo $order['id']?>','#<?php echo $order['id']?>')">Afficher plus</button></div>
                    <div id="<?php echo $order['id']; ?>" style="display:none">
                        <div class="petit">  heure de début :<?php  echo $order['hourStart'];?></div>
                        <div class="petit">  jour de fin  :<?php  echo $order['dateEnd'];?></div>

                        <button id="ferm_<?php echo $order['id']; ?>" onclick="closecity('#<?php echo $order['id']?>','#ouv_<?php echo $order['id']?>')">Afficher moins</button>
                    </div>
                <?php } ?>

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
