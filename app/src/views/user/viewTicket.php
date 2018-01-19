<?php include(__DIR__."/../templates/main/navbar.php") ?>
<div class="container">
    <?php
    foreach ($data['ticket'] as $ticket):

        /*
        list($date, $time) = explode(" ", $ticket['creationDate']);
        list($year, $month, $day) = explode("-", $date);
        list($hour, $min) = explode(":", $time);
        $months = ["janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
*/
        ?>
        <h1><?php echo $ticket['subject']; ?></h1>

        <i>Soumis le <?php echo $data['date']; ?>
            <?php if ($ticket['closeDate'] != NULL){
                echo " et clos le ".$data['closeDate'];
            };
            ?>
        </i>
        <div class="card">
            <p><?php echo $ticket['content'];?></p>
        </div>

    <?php endforeach; ?>

    <a href="tickethistoric/" class="bouton">Retour</a>

</div>
