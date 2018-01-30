<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="card unique-card" id="registerCard">
    <h2 style="margin-left: 5%"><a href="tickethistoric/">Historique des tickets</a></h2>
    <h1>Ajouter un ticket</h1>
    <form action="addticketpost.php" method="POST">
        <input type="text" class="input" name="subject" placeholder="Sujet" required style="display: block; width: 40%; margin: auto; margin-bottom: 2%">
        <textarea class="input" name="content" required style="display: block; width: 60%; height: 150px; margin: auto; margin-bottom: 4%" placeholder="Entrez votre message ici"></textarea>
        <div style="text-align: center"><input type="submit" value="Envoyer" class="bouton"></div>
    </form>
</div>