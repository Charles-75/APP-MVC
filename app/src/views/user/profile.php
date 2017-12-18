<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container-flex">
    <div class="card card-full" style="text-align: center">
        <h1>Mon compte</h1>
        <div style="margin-top: 4%;">
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 90px">Prénom : </div>
                <div style="display: inline-block; width: 40px;"><?php echo $data['firstName'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 90px">Nom : </div>
                <div style="display: inline-block; width: 40px;"><?php echo $data['surname'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 90px">Email : </div>
                <div style="display: inline-block; width: 40px;"><?php echo $data['email'];?></div>
            </div>
            <div style="margin-bottom: 1%">
                <div style="display: inline-block; width: 90px">Numéro de téléphone : </div>
                <div style="display: inline-block; width: 40px;"><?php echo $data['phoneNumber'];?></div>
            </div>

            <div style="display: inline-block; margin-top: 3%"><button class="bouton"><a href="/updateprofile" style="color: white">Modifier</a></button></div>
        </div>
    </div>
</div>
