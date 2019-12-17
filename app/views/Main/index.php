<h2>Hello <?= $name ?>!</h2>
<?php foreach($posts as $post):?>
<h2><?= $post->title ?></h2>
<?php endforeach; ?>
