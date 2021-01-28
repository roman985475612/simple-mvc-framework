<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT ?>"><?= SITENAME ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto">
        <?php if (empty($_SESSION['user_id'])): ?>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/login" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/register" class="nav-link">Register</a></li>
        <?php else: ?>
            <span class="navbar-text"><?= $_SESSION['user_name'] ?></span>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/logout" class="nav-link">Logout</a></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>