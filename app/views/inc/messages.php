<?php //dd($_SESSION); ?>
<?php if (!empty($_SESSION['flash'])): ?>
    <?php foreach ($_SESSION['flash'] as $status => $msg): ?>
        <div class="alert alert-<?= $status?> alert-dismissible fade show mb-3" role="alert">
            <?= $msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['flash'][$status]) ?>
    <?php endforeach ?>
<?php endif ?>
