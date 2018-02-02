<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div id="gestionAdmin" class="container">

    <div id="searchbyname" class="card">
        <h1 class"titre"> Rechercher un utilisateur</h1>

        <form>
            <label for="searchbyname">Rechercher par nom ou par prénom :</label>
            <input type="search" name="searchbyname" id="search">

            <div id="listUsers">
                <table id="users"></table>
            </div>


        </form>

    </div>


    <div id="notification" class="card">
        <h1>  Gérer les notifications </h1>

        <form method="post" action="/notification_maintenance_post">
            <label for="sujet"><strong>Ajouter une notification : </strong></label> </br>
            <input type="text" name="sujet" placeholder="Sujet de la notification" required style="margin-top: 3%">
            <textarea name="contenu" id="contenuNotif" placeholder="Tapez le contenue de la notification" rows="1" cols="1" required></textarea>
            <input type="submit" class="bouton">
        </form>

        <br/>


        <div>
            <strong> Mes notifications : </strong>

             <div id="listNotif">
                <?php

                $tr = "<table>";
                foreach ($data['dataNotif'] as $notif){
                    $tr .= "<tr> <td onclick='openNotif(". $notif['id'] .")' class='linkSubject'>".$notif['subject']."</><td><button class='bouton-delete' onclick='deleteNotif(".$notif['id'].")'>Delete</button></td></tr>";
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
        height: 650px;
    }

    #listUsers{
        overflow: auto;
        height: 400px;
    }

    #notification{
        margin-left: 5%;
    }

    #contenuNotif{
        overflow: auto;
        height: 100px;
    }


    #adminTicket{
        margin-left: 650px;
        width : 300px;
        height: 150px;

    }

    .bouton-delete{
        width : 50px;
        height : 20px;
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
    var users = [];
    $('#search').keyup(function() {
        $('#users').html('');
        var term = $('#search').val();
        $.get('/searchuser/'+term, function(data) {
            users = JSON.parse(data);
            $('#users').empty();

            var trHTML = '<tr><td class="infoUser"> Prénom </td> <td class="infoUser"> Nom de famille </td> <td class="infoUser"> Adresse email </td> <td class="goToHomes"> Homes </td>';
            $.each(users, function (i, item) {
                trHTML += '<tr><td class="infoUser">' + item.firstName + '</td><td class="infoUser">' + item.surname + '</td><td class="infoUser">' + item.email + '</td><td class="goToHomes">' + '<a href="#" class="bouton">Gérer</a>' + '</td></tr>'  ;
            });
            $('#users').append(trHTML);
        });
    });



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

    function deleteNotif(id) {
        document.location.href="delete_notification/"+id+"/";
    }


    // Tickets

    var tickets = JSON.parse("<?php echo addslashes(json_encode($data['dataTicket'])); ?>");

    function openTicket(ticketId) {
        tickets.forEach(function(ticket) {
            if(ticket.id == ticketId) {
                // TODO : afficher une fenêtre modale
                alert(ticket.subject + "   :   " + ticket.content);
            }
        })
    }




</script>




