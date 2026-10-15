<?php
// Zain Tech Automation Solutions - site configuration
// Production-ready: secrets come from environment variables (.env), never hardcoded.
define('SITE_NAME', 'Zain Tech Automation Solutions');
define('TAGLINE', 'Mushkil Ko Asaan Banayein');
define('TAGLINE_EN', 'Making the difficult easy');
define('CONTACT_EMAIL', 'info@zaintech.example.com');
define('CONTACT_HOURS', '9 AM - 9 PM');

// Database settings — override via environment (Docker: .env file)
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'zaindb');
define('DB_USER', getenv('DB_USER') ?: 'zainuser');
define('DB_PASS', getenv('DB_PASS') ?: 'CHANGE_ME_STRONG_PASSWORD');
