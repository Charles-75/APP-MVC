<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
    h1{
        text-align: left;
    }
   .all_sensors {

   }
    .sensor{
        border : solid black 0.5px ;
    }
    .all_actuators{

    }
    .actuator{
        border : solid black 0.5px;
    }

</style>
<div class="container">
    <div class="card">
        <div class="all_sensors">
            <h1> Capteurs</h1>
            <?php foreach ($data['sensor'] as $value): ?>
                <div class="sensor"><?php echo $value['reference']; ?>  <a href="/home/<?php echo $data['apartmentId']; ?>/<?php echo $data['roomName']; ?>/<?php echo $value['reference']; ?>"> détails </a></div>
            <?php endforeach; ?>

        </div>
        <div class="all_actuators">
            <h1>Actionneurs</h1>
            <div class="actuator">
                <?php foreach ($data['actuator'] as $value): ?>
                    <div class="actuator"><?php echo $value['reference']; ?> </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>






</div>
