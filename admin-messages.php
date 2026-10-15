<?php
// Simple admin page to view contact messages from the database.
// Protected by a password (ADMIN_PASSWORD env var). Set it in .env!
session_start();
$page_title = 'Messages';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';

$authed = $_SESSION['admin_authed'] ?? false;
$login_error = '';
if (!$authed) {
    $expected = getenv('ADMIN_PASSWORD') ?: '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_pass'])) {
        if ($expected !== '' && hash_equals($expected, (string)$_POST['admin_pass'])) {
            $_SESSION['admin_authed'] = true;
            $authed = true;
        } else {
            $login_error = 'Wrong password.';
        }
    }
}
?>
<section class="page-hero">
  <div class="container">
    <h1>Received Messages</h1>
    <p>Admin area</p>
  </div>
</section>

<section class="section">
  <div class="container content">
    <?php if (!$authed): ?>
      <div class="form-wrap">
        <h3 style="color:#1b3a6b; margin-bottom:14px;">Admin login</h3>
        <?php if ($login_error): ?>
          <div class="alert error"><?php echo htmlspecialchars($login_error); ?></div>
        <?php endif; ?>
        <form method="post" action="admin-messages.php">
          <div class="form-group">
            <label for="admin_pass">Password</label>
            <input type="password" id="admin_pass" name="admin_pass" required>
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
      </div>
    <?php else: ?>
      <?php
      $rows = [];
      $db_error = '';
      try {
          $pdo = getDB();
          $rows = $pdo->query('SELECT name, email, message, created_at FROM messages ORDER BY id DESC')->fetchAll();
      } catch (Exception $e) {
          $db_error = 'Database not connected yet.';
      }
      ?>
      <p style="margin-bottom:18px;"><?php echo count($rows); ?> message(s) in the database</p>
      <?php if ($db_error): ?>
        <div class="alert error"><?php echo htmlspecialchars($db_error); ?></div>
      <?php elseif (empty($rows)): ?>
        <p>No messages yet. Send one from the <a href="contact.php">contact page</a>.</p>
      <?php else: ?>
        <?php foreach ($rows as $r): ?>
          <div class="card" style="margin-bottom:16px;">
            <h3><?php echo htmlspecialchars($r['name']); ?>
              <span style="font-weight:normal; font-size:14px; color:#555;">&lt;<?php echo htmlspecialchars($r['email']); ?>&gt;</span>
            </h3>
            <p><?php echo nl2br(htmlspecialchars($r['message'])); ?></p>
            <p style="font-size:13px; color:#888;"><?php echo htmlspecialchars($r['created_at']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
