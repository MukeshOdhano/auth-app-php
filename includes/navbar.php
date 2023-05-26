<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/auth" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"><?php $username = $_SESSION['name'] ?? "User"; echo $username ?></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/auth" class="nav-link active" aria-current="page">Home</a></li>
        <?php if(!isset($_SESSION['name'])) : ?>
        <li class="nav-item"><a href="/auth/login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="/auth/signup.php" class="nav-link">Sign up</a></li>
        <?php else : ?>
        <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
        <?php endif; ?>
      </ul>
   </header>
</div>