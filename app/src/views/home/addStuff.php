<?php include(__DIR__."/../templates/main/navbar.php") ?>


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

        <select name="stuff">
            <option value="sensors"> capteurs</option>
            <option value="actuators"> actionneurs</option>
        </select>
        <select name="type" >
            <option value="temperature">température </option>
            <option value="humidite">humidité </option>
            <option value="pression">pression </option>
            <option value="presence">présence </option>
            <option value="luminosite">luminosité </option>
            <option value="qualite_air">qualité de l'air</option>
            <option value="fumee">fumée </option>
        </select>
        <select name="cemac_id">
            <?php foreach ($data['cemacData'] as $value): ?>
                <option value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <select name="type_actuator">
            <option value="lumières">lumières</option>
            <option value="volets">volets</option>
        </select>
        <input type="text" name="reference">
        <input type="submit" value="confirmer">
    </form>

</div>