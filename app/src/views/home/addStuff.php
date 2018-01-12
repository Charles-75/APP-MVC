<?php include(__DIR__."/../templates/main/navbar.php") ?>

<style>
    .actuators{
        display : none;
    }
</style>
<div>
    <h1> Ajouter un  Cemac </h1>
    <form  action="/addcemacpost/<?php echo $data['apartmentId']; ?>" method="POST">
        <input type="text" name="reference_cemac" placeholder="référence du Cemac">
        <label>Choissisez la pièce associé au Cemac</label>
        <select name="piece">
            <?php foreach ($data['apartmentData'] as $value): ?>
                <option value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="confirmer">
    </form>


</div>
<div>
    <h1> Ajouter des capteurs et actionneurs </h1>
    <form action="/addsensororactuatorpost/<?php echo $data['apartmentId']; ?>" method="POST">

        <select id="selectStuff" name="stuff">
            <option selected disabled></option>
            <option value="sensors">capteurs</option>
            <option value="actuators"> actionneurs</option>
        </select>
        <select name="type" id="typeSelector"></select>
        <select name="cemac_id">
            <?php foreach ($data['cemacData'] as $value): ?>
                <option value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="reference">
        <input type="submit" value="confirmer">
    </form>

</div>
<script>

    var sensorTypes = [
        'temperature', 'humidite', 'pression', 'presence', 'luminosite', 'qualite_air', 'fumee'
    ];
    var actuatorTypes = [
        'lumieres', 'volets'
    ];

    var selector = document.getElementById('selectStuff');
    var typeSelector = document.getElementById('typeSelector');


    selector.addEventListener('change', openchoice);

    function openchoice(){

        while (typeSelector.firstChild) {
            typeSelector.removeChild(typeSelector.firstChild);
        }


        var choice = selector.value;

        if(choice == 'sensors') var choices = sensorTypes;
        else if(choice == 'actuators') var choices = actuatorTypes;

        choices.forEach(function(type) {
            typeSelector.appendChild(new Option(type, type));
        });

   }
</script>