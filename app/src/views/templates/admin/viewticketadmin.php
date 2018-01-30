<?php include(__DIR__."/../admin/navbarAdmin.php") ?>
<div class="container">
    <?php
    foreach ($data['ticket'] as $ticket):
        ?>
        <h1 style="margin-bottom: 5%"><?php echo $ticket['subject']; ?></h1>

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

    <a href="/ticketadmin" class="bouton">Retour</a>

</div>
