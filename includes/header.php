<?php
require_once __DIR__ . '/config.php';
$current = basename($_SERVER['PHP_SELF']);
if (!isset($page_title)) { $page_title = 'Welcome'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($page_title); ?> | <?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_NAME; ?> - <?php echo TAGLINE_EN; ?>. Business Intelligence, AI solutions and automation.">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="logo" href="index.php"><?php echo SITE_NAME; ?></a>
    <nav class="main-nav">
      <a href="index.php" class="<?php echo $current === 'index.php' ? 'active' : ''; ?>">Home</a>
      <a href="about.php" class="<?php echo $current === 'about.php' ? 'active' : ''; ?>">About</a>
      <a href="services.php" class="<?php echo $current === 'services.php' ? 'active' : ''; ?>">Services</a>
      <a href="contact.php" class="<?php echo $current === 'contact.php' ? 'active' : ''; ?>">Contact</a>
    </nav>
  </div>
</header>
<main>
