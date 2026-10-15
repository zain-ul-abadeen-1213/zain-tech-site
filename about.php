<?php
$page_title = 'About Us';
require_once __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
  <div class="container">
    <h1>About Us</h1>
    <p><?php echo TAGLINE; ?> (<?php echo TAGLINE_EN; ?>)</p>
  </div>
</section>

<section class="section">
  <div class="container content">
    <h3>Who We Are</h3>
    <p><?php echo SITE_NAME; ?> is a technology company founded by Zain — a Hafiz, Alim, and passionate builder. We started with a simple belief: a good business doesn't sell things; it adds value to people's lives, and things sell themselves.</p>
    <h3>What We Believe</h3>
    <ul>
      <li><strong>Value before sales:</strong> we solve real problems first — for farmers, shopkeepers, clinics and exporters.</li>
      <li><strong>Honesty in work:</strong> what we promise, we deliver. What we don't know, we say clearly.</li>
      <li><strong>Technology for everyone:</strong> powerful tools shouldn't be only for big companies with big budgets.</li>
    </ul>
    <h3>Our Expertise</h3>
    <ul>
      <li>Business Intelligence dashboards and reporting</li>
      <li>Cloud infrastructure and DevOps (AWS, Docker, Kubernetes, CI/CD)</li>
      <li>AI and Machine Learning solutions</li>
      <li>Automation that saves hours every week</li>
    </ul>
    <p style="text-align:center; margin-top:26px;"><a class="btn" href="contact.php">Work With Us</a></p>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
