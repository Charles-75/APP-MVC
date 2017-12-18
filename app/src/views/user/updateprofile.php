<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container-flex">
    <div class="card card-full" style="text-align: center">
        <h1>Mon compte</h1>
        <div style="margin-top: 4%;">
            <form action="/updateprofilepost" method="POST">
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 90px" for="firstName">Prénom : </label>
                    <input type="text" style="display: inline-block; width: 250px;" value="<?php echo $data['firstName'];?>" id="firstName" name="firstname" required>
                </div>
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 90px" for="surname">Nom : </label>
                    <input type="text" style="display: inline-block; width: 250px;" value="<?php echo $data['surname'];?>" id="surname" name="surname" required>
                </div>
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 90px" for="email">Email : </label>
                    <input type="email" style="display: inline-block; width: 250px;" value="<?php echo $data['email'];?>" id="email" name="email" required>
                </div>
                <div style="margin-bottom: 1%">
                    <label style="display: inline-block; width: 90px" for="phoneNumber">Numéro de téléphone : </label>
                    <input type="text" style="display: inline-block; width: 250px;" value="<?php echo $data['phoneNumber'];?>" id="phoneNumber" name="phone" required>
                </div>

                <div style="display: inline-block; margin-top: 3%"><input type="submit" value="Enregistrer" class="bouton" id="submit"></div>
            </form>
        </div>
    </div>
</div>
