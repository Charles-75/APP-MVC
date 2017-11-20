<h1><?php echo $data['title'] ?></h1>

<?php

foreach ($data['users'] as $user) {
    echo $user['email'];
}

?>

<p>Ceci est la page index.</p>