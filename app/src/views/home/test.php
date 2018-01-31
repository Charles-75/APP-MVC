
<style>
 .choice{
     margin-bottom: 10%;
 }
</style>
<div class="box container">
   <div class="card ">
       <h1>Simuler de nouvelles données pour des capteurs</h1>
    <form method="POST" action="/simulationcapteurspost">
        <div class="choice"><label>Choississer une pièce </label><select id="selectStuff" name="room">
            <?php  foreach ($data['room'] as $room) {     ?>

                <option <?php  echo $room['id']; ?>><?php echo $room['name'] ?></option>
        <?php } ?>
        </select>

        <label> Choississer le capteur à modifier</label><select name="sensorId" id="typeSelector"  ></select>
        </div>
        <label>Entrer la nouvelle valeur du capteur</label><input name="number"  type="number" >
        <input type="submit" class="bouton" value="simuler de nouvelles données">

    </form>



   </div>
</div>
<script>

    var selector = document.getElementById('selectStuff');
    var typeSelector = document.getElementById('typeSelector');
    selector.addEventListener('change', openchoice);

    function openchoice() {
        var i;
        var sensor=[];
        while (typeSelector.firstChild) {
            typeSelector.removeChild(typeSelector.firstChild);
        }

        var sensorTypes = JSON.parse("<?php foreach ($data['sensor'] as $sensor) {
            echo addslashes(json_encode($sensor));
        } ?>");
        var choice = selector.value;

        for (i = 0; i < sensorTypes.length; i++) {
                if (sensorTypes['id']==choice){
                    sensor.append(sensorTypes['id'],[sensorTypes['sensorId'],sensorTypes['reference']]);

                }
        }
        var sensors =sensor[choice];
        sensors.forEach(function(type){
            typeSelector.appendChild(new Option(type['reference'], type['sensorId']));
    });
    }
</script>
