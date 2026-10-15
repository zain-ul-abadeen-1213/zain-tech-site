<?php
$page_title = 'Home';
require_once __DIR__ . '/includes/header.php';
?>
<section class="hero">
  <div class="container">
    <h1><?php echo SITE_NAME; ?></h1>
    <p class="tagline"><?php echo TAGLINE; ?></p>
    <p class="lead">We help businesses make smarter decisions with Business Intelligence, automation and AI — practical technology that solves real problems.</p>
    <a class="btn" href="services.php">Our Services</a>
    <a class="btn btn-outline" href="contact.php">Contact Us</a>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2>What We Do</h2>
    <p class="sub">Technology that adds value to your business — not complexity.</p>
    <div class="cards">
      <div class="card">
        <div class="icon">📊</div>
        <h3>Business Intelligence &amp; Analytics</h3>
        <p>Turn your scattered data into clear dashboards and reports — see profit, pending payments and trends on one screen.</p>
      </div>
      <div class="card">
        <div class="icon">🔔</div>
        <h3>Website Monitoring</h3>
        <p>Your website watched around the clock. Instant alerts the moment something goes down — before your customers notice.</p>
      </div>
      <div class="card">
        <div class="icon">💬</div>
        <h3>WhatsApp Automation</h3>
        <p>Professional WhatsApp Business setup — greeting messages, quick replies and catalogs that answer customers for you.</p>
      </div>
      <div class="card">
        <div class="icon">🤖</div>
        <h3>AI/ML Solutions</h3>
        <p>Practical machine learning — from image recognition to smart assistants — built for real business problems.</p>
      </div>
    </div>
  </div>
</section>

<section class="section alt">
  <div class="container content">
    <h2>Why Work With Us?</h2>
    <p class="sub">A good business doesn't sell things — it adds value to people's lives.</p>
    <ul>
      <li><strong>Honesty first:</strong> clear pricing, realistic timelines, no false promises.</li>
      <li><strong>Practical solutions:</strong> technology your team can actually use, not demos that gather dust.</li>
      <li><strong>Support that stays:</strong> we don't disappear after delivery.</li>
    </ul>
    <p style="text-align:center; margin-top:26px;"><a class="btn" href="contact.php">Start a Conversation</a></p>
  </div>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
