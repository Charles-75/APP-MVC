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
            <ul>
            <?php foreach ($data['sensors'] as $sensor): ?>
                <li><?php echo $sensor['type'] . ' : ' . $sensor['value'] ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="all_actuators">
            <h1>Actionneurs</h1>
            <ul>
                <?php foreach ($data['actuators'] as $actuator): ?>
                    <li><?php echo $actuator['type'] . ' : ' . $actuator['state'] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</div>
