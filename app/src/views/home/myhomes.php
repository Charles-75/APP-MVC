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
            </ul>
            <a href="/rooms" class="bouton" style="margin-left: 2%">Select</a>
            <button onclick="delete_confirm(<?php echo $value['id']?>)" class="bouton" style="margin-left: 2%">Delete</button>
        </div>
    <?php endforeach; ?>

</div>

<script>
    function delete_confirm(id)
    {
        if(confirm("Do you really want to delete this home?"))
        {
            document.location.href="deletehome/"+id+"/";
        }
        return false;
    }
</script>