<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
    h1{
        text-align: left;
    }
   .all_sensors{

   }
    .sensor{
        border : solid black ;
    }

</style>
<div class="container">
    <div class="card">
        <div class="all_sensors">
            <h1> Capteurs</h1>
            <?php foreach ($data['sensor'] as $value): ?>
                <div class="sensor" ><a  href='#'><?php echo $value['reference']; ?></a></div>
            <?php endforeach; ?>
        </div>
        <div class="all_actuators">
            <h1>Actionneurs</h1>
            <div class="actuator">
                actionneur
            </div>

        </div>
    </div>






</div>
