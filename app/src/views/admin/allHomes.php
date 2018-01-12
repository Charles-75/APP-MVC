<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div id="gestionAdmin" class="container">



    <div id="searchbyname" class="card">
        <h2> <u>Rechercher un utilisateur</u> </h2>

        <form>
            <label for="searchbyname">Rechercher par nom ou par prénom :</label>
            <input type="search" name="searchbyname" id="search">

            <div id="listUsers">
                <table id="users"></table>
            </div>


        </form>

    </div>


    <div id="notification" class="card">
        <h2> <u> Gerer les notifications </u> </h2>

        <form method="post" action="/notification_maintenance_post">
            <label for="sujet"><strong>Ajouter une notification : </strong></label> </br>
            <input type="text" name="sujet" placeholder="Sujet de la notification" required>
            <textarea name="contenu" id="contenuNotif" placeholder="Tapez le contenue de la notification" rows="1" cols="1" required></textarea>
            <input type="submit">
        </form>

        <br/>


        <div>
            <strong> Mes notifications : </strong>

             <div id="listNotif">
                <?php

                $tr = "<table>";
                foreach ($data as $notif){
                    $tr .= "<tr onclick='openNotif(". $notif['id'] .")'><td class='linkSubject'>".$notif['subject']."</td></tr>";
                }
                $tr.="</table>";
                echo $tr;

                ?>

            </div>
        </div>


    </div>


</div>


<style>
    #gestionAdmin{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin : 40px auto 0;

    }



    .infoUser{
        border: 1px solid #000;
        width: 200px;
        text-align: center;
    }

    .goToHomes{
        border: 1px solid #000;
        width: 50px;
        text-align: center;
    }

    #searchbyname{
        margin-right : 10%;
    }

    #listUsers{
        overflow: auto;
        height: 200px;
    }

    #notification{
        margin-left: 5%;
    }

    #contenuNotif{
        overflow: auto;
        height: 100px;
    }




    }



</style>

<script>
    var users = [];
    $('#search').keyup(function() {
        $('#users').html('');
        var term = $('#search').val();
        $.get('/searchuser/'+term, function(data) {
            users = JSON.parse(data);
            $('#users').empty();

            var trHTML = '<tr><td class="infoUser"> Prénom </td> <td class="infoUser"> Nom de famille </td> <td class="infoUser"> Adresse email </td> <td class="goToHomes"> Homes </td>';
            $.each(users, function (i, item) {
                trHTML += '<tr><td class="infoUser">' + item.firstName + '</td><td class="infoUser">' + item.surname + '</td><td class="infoUser">' + item.email + '</td><td class="goToHomes">' + '<formn><input type="button" value="click"></formn>' + '</td></tr>'  ;
            });
            $('#users').append(trHTML);
        });
    });



    // Notifications

    var notifications = JSON.parse("<?php echo addslashes(json_encode($data)); ?>");

    function openNotif(notifId) {
        notifications.forEach(function(notif) {
            if(notif.id == notifId) {
                // TODO : afficher une fenêtre modale
                alert(notif.subject + "   :   " + notif.content);
            }
        })
    }


</script>




