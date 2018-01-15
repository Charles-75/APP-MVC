<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">

    <h1>Supprimer un/des invité(s)</h1>
    <form action="deleteguestpost/<?php echo $data['apartmentId']; ?>/" method="POST" style="text-align: center">
        <?php foreach ($data['guests'] as $value): ?>
            <div style="display: inline-block; width: 200px; margin-bottom: 0.5%"><label for="checkbox<?php echo $value['id']; ?>"><?php echo $value['firstName'].' '.$value['surname']; ?></label></div><input type="checkbox" id="checkbox<?php echo $value['id']; ?>" class="input" name="check<?php echo $value['id']; ?>"><br>
        <?php endforeach; ?>
        <div style="margin-top: 5%">
            <input type="submit" class="bouton bouton-delete" value="Supprimer">
            <a href="/myhomes">Retour vers mes maisons</a>
        </div>
    </form>

</div>