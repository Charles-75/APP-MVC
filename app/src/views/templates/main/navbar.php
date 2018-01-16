<div class="navbar">

    <img src="/img/Domisep.png" id="navbar-logo" alt="DomISEP">


    <div id="navbar-links">
        <a href='/myhomes' >Mes maisons</a>
        <?php  if (isset($data['homes']) OR isset($date['guests'])) {


        }
        else{
            $id=$data['apartmentId'];
            echo "<a href='/home/$id'> Ma Page d'accueil </a> ";
        }
        ?>

    </div>

    <div id="navbar-icons">
        <div class="navbar-lien">
            <a href='/addticket'>
                <img class='image' src="/img/ticket.png">
            </a>
        </div>

        <div class="navbar-lien">
            <a href='/profile'>
                <img class='image' src="/img/profil.png">
            </a>
        </div>

        <div class="navbar-lien">
            <a href="/login">
                <img class="image" src="/img/logout.png">
            </a>
        </div>
    </div>
</div>
