<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container">
    <h1>Historique des tickets</h1>
    <div style="display: flex;">
        <div class="card center">
            <h2>Tickets en cours de traitement</h2>
            <?php
            $months = ["janvier", "février", "mars", "avril", "mai", "juin",
                "juillet", "août", "septembre", "octobre", "novembre", "décembre"];

            foreach ($data['ticketsOpen'] as $ticket):
                list($date, $time) = explode(" ", $ticket['creationDate']);
                list($year, $month, $day) = explode("-", $date);
                list($hour, $min) = explode(":", $time);
                ?>
                <ul style="margin-top: 5%">

                    <i style="font-size: 80%">Soumis le <?php echo "$day ".$months[$month - 1]." $year à ${hour}h${min} :"; ?></i><br><a href="viewticket/<?php echo $ticket['id']; ?>" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>
    
        <div class="card center">
            <h2>Tickets clos</h2>
            <?php foreach ($data['ticketsClose'] as $ticket):
                list($date, $time) = explode(" ", $ticket['creationDate']);
                list($year, $month, $day) = explode("-", $date);
                list($hour, $min) = explode(":", $time);
                list($date1, $time1) = explode(" ", $ticket['closeDate']);
                list($year1, $month1, $day1) = explode("-", $date1);
                list($hour1, $min1) = explode(":", $time1);
                ?>
                <ul style="margin-top: 5%">
                    <i style="font-size: 80%">Soumis le <?php echo "$day ".$months[$month - 1]." $year à ${hour}h${min}"; ?> et clos le <?php echo "$day1 ".$months[$month1 - 1]." $year1 à ${hour1}h${min1}"; ?> :</i><br><a href="viewticket/<?php echo $ticket['id']; ?>" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
