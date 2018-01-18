<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">

    <h1>Supprimer un/des Cemac(s)</h1>
    <form action="deletecemacpost/<?php echo $data['apartmentId']; ?>/" method="POST" class="center">
        <?php foreach ($data['cemacs'] as $cemac):
            foreach ($data['rooms'] as $room):
            ?>

            <div class="espace1"><label for="checkbox<?php echo $cemac['id']; ?>"><?php echo $cemac['name']; ?> (<?php echo $room['name']; ?>) </label></div><input type="checkbox" id="checkbox<?php echo $cemac['id']; ?>" class="input" name="check<?php echo $cemac['id']; ?>"><br>
        <?php
            endforeach;
            endforeach;
            ?>
        <div style="margin-top: 5%">
            <input type="submit" class="bouton bouton-delete" value="Supprimer">
            <a href="/home/<?php echo $data['apartmentId']; ?>/">Retour vers la page d'accueil</a>
        </div>
    </form>

</div>