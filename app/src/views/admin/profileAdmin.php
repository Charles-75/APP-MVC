<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div class="container-flex">
    <div class="card card-full center">
        <h1>Mon compte</h1>
        <div style="margin-top: 4%;">
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 130px">Nom d'utilisateur : </div>
                <div style="display: inline-block; width: 150px;"><?php echo $data['userName'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 120px">Email : </div>
                <div style="display: inline-block; width: 70px;"><?php echo $data['email'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 161px">Numéro de téléphone : </div>
                <div style="display: inline-block; width: 180px;"><?php echo $data['phoneNumber'];?></div>
            </div>

            <div style="display: inline-block; margin-top: 3%"><button class="bouton"><a href="/updateadmin" style="color: white">Modifier</a></button></div>
        </div>
    </div>
</div>
