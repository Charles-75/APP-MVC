<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
    h1{
        text-align: left;
    }
</style>

<div class="container">
    <div class="card">
        <div class="all_sensors">
            <h1> Capteurs</h1>
            <?php foreach ($data['sensor'] as $value): ?>
                <div class="sensor"><?php echo $value['reference']; ?>  <a href="sensor/<?php $value['id']; ?>">Détails</a></div>
            <?php endforeach; ?>

        </div>
        <div class="all_actuators">
            <h1>Actionneurs</h1>
            <div class="actuator">
                <?php foreach ($data['actuator'] as $value): ?>
                    <div class="actuator"><?php echo $value['reference']; ?></div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>






</div>
