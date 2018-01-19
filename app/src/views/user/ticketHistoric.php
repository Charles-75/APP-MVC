<?php include(__DIR__."/../templates/main/navbar.php") ?>

<div class="container">
    <h1>Historique des tickets</h1>
    <div style="display: flex;">
        <div class="card center">
            <h2>Tickets en cours de traitement</h2>
            <?php foreach ($data['ticketsOpen'] as $ticket): ?>
                <ul style="margin-top: 5%">

                    <i style="font-size: 80%">Soumis le <?php echo $ticket['day']." ".$ticket['month']." ".$ticket['year']." à ".$ticket['hour']."h".$ticket['min']; ?></i><br><a href="viewticket/<?php echo $ticket['id']; ?>" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>
    
        <div class="card center">
            <h2>Tickets clos</h2>
            <?php foreach ($data['ticketsClose'] as $ticket): ?>
                <ul style="margin-top: 5%">
                    <i style="font-size: 80%">Soumis le <?php echo $ticket['day']." ".$ticket['month']." ".$ticket['year']." à ".$ticket['hour']."h".$ticket['min']; ?> et clos le <?php echo $ticket['day1']." ".$ticket['month1']." ".$ticket['year1']." à ".$ticket['hour1']."h".$ticket['min1']; ?> :</i><br><a href="viewticket/<?php echo $ticket['id']; ?>" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
