<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">

    <h1>Supprimer une/des pièce(s)</h1>
    <form action="deleteroompost/<?php echo $data['apartmentId']; ?>/" method="POST" class="center">
        <?php foreach ($data['rooms'] as $value): ?>
            <div class="espace"><label for="checkbox<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div><input type="checkbox" id="checkbox<?php echo $value['id']; ?>" class="input" name="check<?php echo $value['id']; ?>"><br>
        <?php endforeach; ?>
        <div style="margin-top: 5%">
            <input type="submit" class="bouton bouton-delete" value="Supprimer">
            <a href="/home/<?php echo $data['apartmentId']; ?>/">Retour vers la page d'accueil</a>
        </div>
    </form>

</div>