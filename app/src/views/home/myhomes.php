<h1>My homes</h1>
<pre><?php var_dump($data); ?></pre>

<?php foreach ($data['homes'] as $home): ?>

<div class="appartement">
    <?php echo $home[''] ?>
</div>

<?php endforeach; ?>