<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body bg-light">
                <h3 class="card-title"><?= $data['page']['title'] ?></h3>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['page']['description'] ?></h6>
                <form action="<?= $data['page']['action'] ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name: <sup>*</sup></label>
                        <input 
                            name="title" 
                            type="text" 
                            class="form-control<?= (!empty($data['title_err']) ? ' is-invalid' : '' ) ?>" 
                            id="title"
                            value="<?= $data['title'] ?>"
                        >
                        <span class="invalid-feedback"><?= $data['title_err'] ?></span>
                    </div>
                    
                    <div class="mb-3">
                        <label for="body" class="form-label">Body: </label>
                        <textarea name="body" class="form-control" id="body" rows="10"><?= $data['body'] ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col d-grid gap-2">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                        <div class="col d-grid gap-2">
                            <a href="<?= $data['page']['back_link'] ?>" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>