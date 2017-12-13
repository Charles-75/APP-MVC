<div class="container-flex">

    <div class="card card-full">
        <h1>Mes maisons</h1>
        <a href="/logout">Déconnexion</a> | <a href="/addhome">Ajouter une maison</a>
    </div>

    <?php foreach ($data as $value): ?>
     <div class="card card-half">
         <ul>
            <li>Appartment n°<?php echo $value['id']; ?></li>
            <li>Town : <?php echo $value['town']; ?></li>
            <li>Street : <?php echo $value['street']; ?></li>
            <li>Number : <?php echo $value['number']; ?></li>
            <li>Zip code : <?php echo $value['zipCode']; ?></li>
        </ul>
     </div>
    <?php endforeach; ?>


</div>
