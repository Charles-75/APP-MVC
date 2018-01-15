<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">
    <h1>Ajouter une pièce</h1>

    <form action="/addroompost/<?php echo $data['apartmentId']; ?>" method="POST" style="margin-top: 5%">
        <input id="name" type="text" name="name" required class="input" placeholder="Nom">
        <input type="submit" value="Confirmer"class="bouton" style="margin-bottom: 4%">
        <a href="/home/<?php echo $data['apartmentId']; ?>/">Revenir vers la page d'accueil</a>
    </form>
</div>
