<div class="container-flex">

    <div class="card card-full">
        <h1>My Homes</h1>
        <a href="/logout">Log out</a> | <a href="/addhome">Add home</a>
    </div>

    <?php foreach ($data as $value): ?>
        <?php $position = array_search($value, $data) + 1 ?>
        <div class="card card-half">
            <ul>
                <li>Appartment n°<?php echo $position; ?></li>
                <li>Town : <?php echo $value['town']; ?></li>
                <li>Street : <?php echo $value['street']; ?></li>
                <li>Number : <?php echo $value['number']; ?></li>
                <li>Zip code : <?php echo $value['zipCode']; ?></li>
                <a href="/deletehome/<?php echo $value['id']?>/">Delete</a>
            </ul>
        </div>
    <?php endforeach; ?>

</div>
