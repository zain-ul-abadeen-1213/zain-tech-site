<?php
http_response_code(404);
$page_title = 'Page Not Found';
require_once __DIR__ . '/includes/header.php';
?>
<section class="notfound">
  <div class="container">
    <h1>404</h1>
    <h2>Page not found</h2>
    <p>The page you're looking for doesn't exist — but don't worry, we'll make your difficulties easy anyway.</p>
    <p style="margin-top:20px;"><a class="btn" href="index.php">Back to Home</a></p>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
