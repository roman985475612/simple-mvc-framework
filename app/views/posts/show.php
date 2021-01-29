<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $post = $data['post'] ?>

<div class="d-flex justify-content-between mb-3">
    <a href="<?= URLROOT.'/posts/index/' ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Go back</a>

    <?php if ($post->user_id === $_SESSION['user_id']): ?>
        <div class="btn-group">
            <a href="<?= URLROOT.'/posts/edit/' . $post->id ?>" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Edit</a>
            <a onclick="submitForm()" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</a>
        </div>
    <?php endif ?>
</div>

<div class="row row-cols-1 row-cols-md-12 g-4">
    <div class="col">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?= $post->title?></h5>
            <p class="card-text"><?= $post->body ?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Created at <?= $post->post_created_at ?> by <?= ucfirst($post->name) ?></small>
          </div>
        </div>
    </div>
</div>

<form action="<?= URLROOT.'/posts/delete/' . $post->id ?>" method="POST">
</form>

<script>
function submitForm() {
    
    let isDeleted = confirm('Are you sure?');
    
    if (!isDeleted) {
        return false
    }
    
    let form = document.createElement('form');
    form.action = '<?= URLROOT.'/posts/delete/' . $post->id ?>';
    form.method = 'POST';

    // перед отправкой формы, её нужно вставить в документ
    document.body.append(form);

    form.submit();
}    
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>