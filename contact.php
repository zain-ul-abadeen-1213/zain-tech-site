<?php
$page_title = 'Contact';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Try database first, fall back to file if DB is not set up
        $saved = false;
        try {
            $pdo = getDB();
            $stmt = $pdo->prepare('INSERT INTO messages (name, email, message) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $message]);
            $saved = true;
        } catch (Exception $e) {
            $line = date('Y-m-d H:i:s') . ' | ' . $name . ' | ' . $email . ' | ' . $message . PHP_EOL;
            $dir = __DIR__ . '/messages';
            if (!is_dir($dir)) { mkdir($dir, 0755, true); }
            file_put_contents($dir . '/messages.txt', $line, FILE_APPEND | LOCK_EX);
            $saved = true;
        }
        if ($saved) {
            $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $success = 'Thank you, ' . $safe_name . '! Your message has been received — Insha\'Allah we will respond shortly.';
        }
    }
}
?>
<section class="page-hero">
  <div class="container">
    <h1>Contact Us</h1>
    <p>Questions? Projects? Just say Assalam-o-Alaikum.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="form-wrap">
      <?php if ($success): ?>
        <div class="alert success"><?php echo $success; ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert error"><?php echo $error; ?></div>
      <?php endif; ?>
      <form method="post" action="contact.php">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" required><?php echo htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>
    <p style="text-align:center; margin-top:24px; color:#555;">Contact hours: <?php echo CONTACT_HOURS; ?> (short delays possible during prayer breaks)</p>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
