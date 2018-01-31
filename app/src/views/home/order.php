<?php include(__DIR__."/../templates/main/navbar.php") ?>
<style>


</style>

<div class="container">
    <div class="card ">


        <form  class="orderbox" method="POST" action="/orderpost/<?php echo $data['apartmentId']; ?>">
           <div class="basique">
                <label>Titre de l'ordre </label> <input name="title" type="name">
                <label> Choix de la pièce </label>
                <select name="roomActionId">
                    <?php foreach ($data['room'] as $room){ ?>
                        <option value="<?php  echo $room['id']; ?>"> <?php echo $room['name']; ?>
                    <?php
                    }
                    ?>
                </select>
                <label> Date de début</label><input name="dateStart" type="date">
                <label> Heure de l'action </label><input name="hourStart"type="time">
                <br>
                <label>Jour de fin </label><input name="dateEnd"type="date">
           </div>
           <div class="repetition">
                <label>Repetition : </label>
                <select name="day">
                    <option value="0" selected>Aucune</option>
                    <option value="1">Tous les jours </option>
                    <option value="2">Lundi</option>
                    <option value="3">Mardi</option>
                    <option value="4">Mercredi</option>
                    <option value="5">Jeudi</option>
                    <option value="6">Vendredi</option>
                    <option value="7">Samedi</option>
                    <option value="8">Dimanche</option>
                </select>
           </div>
            <input class="bouton " type="submit" value="Ajouter l'ordre">
        </form>


    </div>






</div>

