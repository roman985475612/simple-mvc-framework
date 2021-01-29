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
        <?php if (isAuthenticated()): ?>
            <li class="nav-item"><a href="<?= URLROOT ?>/posts/add" class="nav-link"><i class="fas fa-plus-circle"></i> Add post</a></li>
            <li class="nav-item"><a href="<?= URLROOT ?>/posts/index" class="nav-link"><i class="fas fa-list-alt"></i> Posts</a></li>
        <?php endif ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (isAuthenticated()): ?>
            <span class="navbar-text"><?= $_SESSION['user_name'] ?></span>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/logout" class="nav-link">Logout</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/login" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="<?= URLROOT ?>/users/register" class="nav-link">Register</a></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>