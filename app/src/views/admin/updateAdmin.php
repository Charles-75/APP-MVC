
<?php include(__DIR__."/../templates/admin/navbarAdmin.php") ?>

<div class="container-flex">
    <div class="card card-full center">
        <h1>Mon compte</h1>
        <button class="bouton" style="padding: 7px; font-size: 65%; margin-right: 13%;"><a style="color: white" href="/changepasswordadmin">Modifier mot de passe</a></button>
        <div class="center" style="margin-top: 2%;">
            <form action="/updateadminpost" method="post">
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 120px" for="firstName">Nom d'utilisateur : </label>
                    <input type="text" style="display: inline-block; width: 250px;" value="<?php echo $data['userName'];?>" id="username" name="username" required>
                </div>
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 120px" for="email">Email : </label>
                    <input type="email" style="display: inline-block; width: 250px;" value="<?php echo $data['email'];?>" id="email" name="email" required>
                </div>
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 120px" for="phoneNumber">Numéro de téléphone : </label>
                    <input type="text" style="display: inline-block; width: 250px;" value="<?php echo $data['phoneNumber'];?>" id="phoneNumber" name="phone" required>
                </div>

                <div style="display: inline-block; margin-top: 3%"><input type="submit" value="Enregistrer" class="bouton" id="submit"></div>
            </form>
        </div>
    </div>
</div>