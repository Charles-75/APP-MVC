<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
 .choice{
     margin-bottom: 6%;
 }
</style>
<div class="box container">
   <div class="card ">
       <h1>Simuler de nouvelles données pour des capteurs</h1>
    <form method="POST" action="/simulationcapteurspost">
        <div class="choice"><label>Choississer une pièce </label>
            <select id="selectStuff" name="room">
                <option disabled selected></option>
            <?php  foreach ($data['room'] as $room) {     ?>

                <option value="<?php  echo $room['id']; ?>"><?php echo $room['name'] ?></option>
        <?php } ?>
        </select>

        <label> Choississer le capteur à modifier</label>
            <select name="sensorId" id="typeSelector"  ></select>
        </div>
        <label>Entrer la nouvelle valeur du capteur</label><input name="number"  type="number">
        <input type="submit" class="bouton" value="simuler de nouvelles données">

    </form>



   </div>
</div>
<script>

    var sensors = JSON.parse("<?php echo addslashes(json_encode($data['sensors'])) ?>");

    var selector = document.getElementById('selectStuff');
    var typeSelector = document.getElementById('typeSelector');
    selector.addEventListener('change', openchoice);

    function openchoice() {
        typeSelector.innerHTML = "";
        var roomId = selector.value;
        sensors.filter(function(sensor) {
            return sensor.roomId == roomId;
        }).forEach(function(sensor) {
            typeSelector.appendChild(new Option(sensor.reference, sensor.id));
        });
    }
</script>
