<h1>My Homes</h1>
<a href="/logout">Logout</a>
<?php foreach ($data as $value): ?>
    <ul>
        <p>Appartment n°<?php echo $value['id']; ?></p>
        <li>Town : <?php echo $value['town']; ?></li>
        <li>Street : <?php echo $value['street']; ?></li>
        <li>Number : <?php echo $value['number']; ?></li>
        <li>Zip code : <?php echo $value['zipCode']; ?></li>
    </ul>
<?php endforeach; ?>




