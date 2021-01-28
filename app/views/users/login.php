<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body bg-light">
                <h3 class="card-title">Login</h3>
                <h6 class="card-subtitle mb-2 text-muted">Please fill in your credentials to log in</h6>
                <form action="<?= URLROOT ?>/users/login" method="POST">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <sup>*</sup></label>
                        <input 
                            name="email" 
                            type="text" 
                            class="form-control<?= (!empty($data['email_err']) ? ' is-invalid' : '' ) ?>" 
                            id="email" 
                            value="<?= $data['email'] ?>"
                            aria-describedby="nameHelp"
                        >
                        <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password: <sup>*</sup></label>
                        <input 
                            name="password" 
                            type="password" 
                            class="form-control<?= (!empty($data['password_err']) ? ' is-invalid' : '' ) ?>" 
                            id="password" 
                            value="<?= $data['password'] ?>"
                            aria-describedby="nameHelp"
                        >
                        <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                    </div>

                    <div class="row">
                        <div class="col d-grid gap-2">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                        <div class="col d-grid gap-2">
                            <a href="<?= URLROOT ?>/users/register" class="btn btn-light">No account? Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>