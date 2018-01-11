<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div class="container-flex">
    <div class="card card-full" style="text-align: center">
        <h1>Mon compte</h1>
        <div style="margin-top: 4%;">
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 120px">Nom d'utilisateur : </div>
                <div style="display: inline-block; width: 120px;"><?php echo $data['userName'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 120px">Email : </div>
                <div style="display: inline-block; width: 120px;"><?php echo $data['email'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 120px">Numéro de téléphone : </div>
                <div style="display: inline-block; width: 120px;"><?php echo $data['phoneNumber'];?></div>
            </div>

            <div style="display: inline-block; margin-top: 3%"><button class="bouton"><a href="/updateadmin" style="color: white">Modifier</a></button></div>
        </div>
    </div>
</div>
