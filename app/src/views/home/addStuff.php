<?php include(__DIR__."/../templates/main/navbar.php") ?>
<style>
   .box{
       display: flex;
       justify-content: space-between;

          }
    .cemac{
        margin-left:0% ;

    }
    .capteurs{
        margin-left:10%;
    }
</style>
<div class="box container">
 <div class="cemac minibox card">
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
 <div class="capteurs minibox card">
    <h1> Ajouter des capteurs et actionneurs </h1>
    <form action="/addsensororactuatorpost/<?php echo $data['apartmentId']; ?>" method="POST">

        <select id="selectStuff" name="stuff">
            <option selected disabled></option>
            <option value="sensors">capteurs</option>
            <option value="actuators"> actionneurs</option>
        </select>
        <select name="type" id="typeSelector" class="reference_cemac" style="display: none;"></select>
        <select name="cemac_id" class="reference_cemac" style="display: none;">
            <?php foreach ($data['cemacData'] as $value): ?>
                <option value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="reference" class ="reference_cemac" style="display: none;" >
        <input type="submit"  class="reference_cemac" value="confirmer" style="display: none;">

    </form>

 </div>
</div>
<script>

    var sensorTypes = JSON.parse("<?php echo addslashes(json_encode($data['sensorTypes'])); ?>");
    var actuatorTypes = [
        'lumieres', 'volets'
    ];

    var selector = document.getElementById('selectStuff');
    var typeSelector = document.getElementById('typeSelector');


    selector.addEventListener('change', openchoice);

    function openchoice(){
        var cemac = document.getElementsByClassName('reference_cemac');
        var i;

        if (typeSelector.style.display === 'none')
        {
            for (i=0; i<cemac.length;i++) {
               cemac[i].style.display = "inline";
            }
        }

        while (typeSelector.firstChild) {
            typeSelector.removeChild(typeSelector.firstChild);
        }


        var choice = selector.value;

        if(choice == 'sensors') var choices = sensorTypes;
        else if(choice == 'actuators') var choices = actuatorTypes;

        choices.forEach(function(type) {
            typeSelector.appendChild(new Option(type['name'], type['id']));
        });

   }
</script>