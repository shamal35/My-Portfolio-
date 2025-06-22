<?php
$page_title = isset($page_title) ? $page_title : "Shamal Theekshana | Information Systems Security Specialist";
$current_page = isset($current_page) ? $current_page : basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="Freelance Information Systems Security Specialist with a BIT Honours Degree from ESOFT Metro Campus. Offering penetration testing, network security, and cybersecurity solutions.">
    <meta name="keywords" content="cybersecurity, penetration testing, network security, Sri Lanka freelancer, ESOFT graduate, BIT degree, information security">
    <meta name="author" content="Shamal Theekshana">
    
    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="Information Systems Security Specialist with a BIT Honours Degree from ESOFT Metro Campus.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.yourportfolio.com">
    <meta property="og:image" content="https://www.yourportfolio.com/assets/img/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<!-- Page Loader -->
<div id="page-loader" class="fixed inset-0 flex items-center justify-center bg-white dark:bg-gray-900 z-[9999]">
  <div class="loader"></div>
</div>
<script>
window.addEventListener('load', function() {
  setTimeout(function() {
    document.getElementById('page-loader').style.display = 'none';
  }, 1000); // 1 second
});
</script>
    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">
                <span class="logo-text">Shamal Theekshana</span>
                <span class="logo-subtext">InfoSec Specialist</span>
            </a>
            
            <button class="menu-toggle" aria-label="Toggle navigation">
                <span class="hamburger"></span>
            </button>
            
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'about.php' ? 'active' : ''; ?>">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'services.php' ? 'active' : ''; ?>">
                        <a href="services.php" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'portfolio.php' ? 'active' : ''; ?>">
                        <a href="portfolio.php" class="nav-link">Portfolio</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'blog.php' ? 'active' : ''; ?>">
                        <a href="blog.php" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button id="theme-toggle" class="theme-toggle" aria-label="Toggle dark mode">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>