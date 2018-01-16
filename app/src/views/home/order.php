<?php include(__DIR__."/../templates/main/navbar.php") ?>


<div class="container">
    <div class="card">


        <form method="POST" action="order.php">
            <label> Choix de la/les pièce(s)</label>
            <label> Date de début</label><input name="date_debut" type="date">
            <label> Heure de l'action </label><input type="time">
            <label>Repetition : </label>

            <label>Jour de fin </label><input type="date">
            <input type="submit">


        </form>


    </div>






</div>

