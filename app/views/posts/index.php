<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($data['posts'] as $post): ?>
        <div class="col">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title"><?= $post->title?></h5>
                <p class="card-text"><?= excerpt($post->body) ?></p>
                <a href="<?= URLROOT.'/posts/show/'.$post->id ?>" class="btn btn-outline-primary btn-sm">Read more <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <div class="card-footer">
                <small class="text-muted">Created at <?= $post->post_created_at ?> by <?= ucfirst($post->name) ?></small>
              </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>