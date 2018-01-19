<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container">
    <?php foreach ($data['ticket'] as $ticket):
        list($date, $time) = explode(" ", $ticket['creationDate']);
        list($year, $month, $day) = explode("-", $date);
        list($hour, $min) = explode(":", $time);
        $months = ["janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre"];

        ?>
        <h1><?php echo $ticket['subject']; ?></h1>

        <i>Soumis le <?php echo "$day ".$months[$month - 1]." $year à ${hour}h${min} "; ?>
            <?php if ($ticket['closeDate'] != NULL){
                list($date1, $time1) = explode(" ", $ticket['closeDate']);
                list($year1, $month1, $day1) = explode("-", $date1);
                list($hour1, $min1) = explode(":", $time1);
                echo " et clos le ".$day1." ".$months[$month - 1]." ".$year1." à ".$hour1."h".$min1;
            };
            ?>
        </i>
        <div class="card">
            <p><?php echo $ticket['content'];?></p>
        </div>
    <?php endforeach; ?>

    <a href="tickethistoric/" class="bouton">Retour</a>

</div>
