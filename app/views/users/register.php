<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body bg-light">
                <h3 class="card-title">Create An Account</h3>
                <h6 class="card-subtitle mb-2 text-muted">Please fill out this form to register with us</h6>
                <form name="register" action="<?= URLROOT ?>/users/register" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: <sup>*</sup></label>
                        <input 
                            name="register[name]" 
                            type="text" 
                            class="form-control<?= (!empty($data['name_err']) ? ' is-invalid' : '' ) ?>" 
                            id="name" 
                            value="<?= $data['name'] ?>"
                            aria-describedby="nameHelp"
                        >
                        <span class="invalid-feedback"><?= $data['name_err'] ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <sup>*</sup></label>
                        <input 
                            name="register[email]" 
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
                            name="register[password]" 
                            type="password" 
                            class="form-control<?= (!empty($data['password_err']) ? ' is-invalid' : '' ) ?>" 
                            id="password" 
                            value="<?= $data['password'] ?>"
                            aria-describedby="nameHelp"
                        >
                        <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm password: <sup>*</sup></label>
                        <input 
                            name="register[confirm_password]" 
                            type="password" 
                            class="form-control<?= (!empty($data['confirm_password_err']) ? ' is-invalid' : '' ) ?>" 
                            id="confirm_password" 
                            value="<?= $data['confirm_password'] ?>"
                            aria-describedby="nameHelp"
                        >
                        <span class="invalid-feedback"><?= $data['confirm_password_err'] ?></span>
                    </div>

                    <div class="row">
                        <div class="col d-grid gap-2">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                        <div class="col d-grid gap-2">
                            <a href="<?= URLROOT ?>/users/login" class="btn btn-light">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>