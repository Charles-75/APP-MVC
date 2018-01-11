
<div id="gestionAdmin">



    <div id="searchbyname">
        <h2> <u>Rechercher un utilisateur</u> </h2>

        <form>
            <label for="searchbyname">Rechercher par nom ou par prénom :</label>
            <input type="search" name="searchbyname" id="search">

            <table id="table"></table>


        </form>

    </div>


    <div id="notification">
        <h2> <u> Gerer les notifications </u> </h2>

        <form method="post" action="notification.php">
            <label for="contenu">Ajouter une notification : </label> </br>
            <textarea name="contenu" id="contenuNotif" placeholder="Tapez le contenue de la notification" rows="1" cols="1" required></textarea> </br>
            <input type="submit">
        </form>


    </div>
</div>


<style>
    #gestionAdmin{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin : 4%

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
    }

    #contenuNotif{
        overflow: auto;



    }

</style>

<script>
    var users = [];
    $('#search').keyup(function() {
        $('#table').html('');
        var term = $('#search').val();
        $.get('/searchuser/'+term, function(data) {
            users = JSON.parse(data);
            $('#users').empty();

            var trHTML = '<tr><td class="infoUser"> Prénom </td> <td class="infoUser"> Nom de famille </td> <td class="infoUser"> Adresse email </td> <td class="goToHomes"> Homes </td>';
            $.each(users, function (i, item) {
                trHTML += '<tr><td class="infoUser">' + item.firstName + '</td><td class="infoUser">' + item.surname + '</td><td class="infoUser">' + item.email + '</td><td class="goToHomes">' + '<formn><input type="button" value="click"></formn>' + '</td></tr>'  ;
            });
            $('#table').append(trHTML);
        });
    });



</script>




