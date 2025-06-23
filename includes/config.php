<?php
// Database configuration (for future expansion)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shamal_portfolio');

// Contact form recipient
define('RECIPIENT_EMAIL', 'yourname@example.com');

// SMTP Configuration (for more reliable email delivery)
define('SMTP_HOST', 'smtp.example.com');
define('SMTP_USER', 'smtp_username');
define('SMTP_PASS', 'smtp_password');
define('SMTP_PORT', 587);

// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>