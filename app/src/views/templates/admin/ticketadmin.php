<?php include(__DIR__."/../admin/navbarAdmin.php") ?>

<div class="container">
    <h1>Historique des tickets</h1>
    <div style="display: flex;">
        <div class="card center">
            <h2>Tickets en cours de traitement</h2>
            <?php foreach ($data['ticketsOpen'] as $ticket): ?>
                <ul style="margin-top: 5%">

                    <p><?php echo $ticket['firstName'] . ' ' . $ticket['surname']; ?></p>
                    <i style="font-size: 80%">Soumis le <?php echo $ticket['openDate']; ?></i><br>
                    <a href="/viewticketadmin/<?php echo $ticket['id']; ?>/" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>

        <div class="card center">
            <h2>Tickets clos</h2>
            <?php foreach ($data['ticketsClose'] as $ticket): ?>
                <ul style="margin-top: 5%">
                    <i style="font-size: 80%">Soumis le <?php echo $ticket['openDate']; ?> et clos le <?php echo $ticket['closeDate']; ?> :</i><br><a href="viewticketadmin/<?php echo $ticket['id']; ?>" ><?php echo $ticket['subject']; ?></a>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
