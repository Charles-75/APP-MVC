<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">

    <h1>Ajouter un invité</h1>
    <form action="addguestpost/<?php echo $data['apartmentId']; ?>/" method="POST">
        <label for="email">Entrez l'adresse email de votre invité : </label><input type="email" name="email" id="email" required placeholder="Email" class="input">
        <input type="submit" class="bouton" value="Confirmer">
        <a href="/myhomes">Retour vers mes maisons</a>
    </form>

</div>
