<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="bg-light p-3 text-center">
    <h1 class="display-3"><?= $data['title'] ?></h1>
    <p class="lead"><?= $data['description'] ?></p>
</div>

<ul>
    <?php foreach ($data['posts'] as $post): ?>
        <li><?= $post->title ?></li>
    <?php endforeach ?>
</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>