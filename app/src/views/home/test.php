
<?php include(__DIR__."/../templates/main/navbar.php") ?><div>
    <form method="POST" action="/">
        <select id="selectStuff" name="stuff">
            <?php  foreach ($data['room'] as $room) {     ?>

                <option <?php  echo $room['id']; ?>><?php echo $room['name'] ?></option>
        <?php } ?>
        </select>
        <select name="type" id="typeSelector"  ></select>


        <input type="submit" value="simuler de nouvelles données">

    </form>




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
