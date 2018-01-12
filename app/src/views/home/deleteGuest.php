<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">

    <h1>Supprimer un/des invité(s)</h1>
    <form action="deleteguestpost/<?php echo $data['apartmentId']; ?>/" method="POST">
        <?php foreach ($data['guests'] as $value): ?>
            <label for="checkbox<?php echo $value['id']; ?>"><?php echo $value['firstName'].' '.$value['surname']; ?></label><input type="checkbox" id="checkbox<?php echo $value['id']; ?>" class="input" name="check<?php echo $value['id']; ?>"><br>
        <?php endforeach; ?>
        <input type="submit" class="bouton bouton-delete" value="Supprimer">
        <a href="/myhomes">Retour vers mes maisons</a>
    </form>

</div>