<h1><?php echo $data['title'] ?></h1>

<?php

foreach ($data['users'] as $user) {
    echo $user['email'];
}

echo "<pre>";
var_dump($data['params']);
echo "</pre>";

?>

<p>Ceci est la page index.</p>