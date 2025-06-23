<?php
$page_title = "Portfolio | Shamal Theekshana's Cybersecurity Projects";
$current_page = "portfolio.php";
include 'includes/header.php';

// Sample portfolio data - could be moved to a database later
$projects = [
    [
        'id' => 1,
        'title' => 'E-Commerce Security Audit',
        'category' => 'Penetration Testing',
        'image' => 'assets/img/project1.jpg',
        'description' => 'Conducted a comprehensive security assessment for a Sri Lankan e-commerce platform, identifying critical vulnerabilities including SQL injection and insecure direct object references.',
        'technologies' => ['Kali Linux', 'Burp Suite', 'OWASP ZAP'],
        'client' => 'LankaShop (Confidential)',
        'date' => 'March 2023',
        'outcome' => 'Identified and helped remediate 5 critical vulnerabilities, improving the platform\'s security posture significantly.'
    ],
    [
        'id' => 2,
        'title' => 'University Network Security',
        'category' => 'Network Security',
        'image' => 'assets/img/project2.jpeg',
        'description' => 'Performed a network security assessment for a local university, identifying vulnerable services and recommending firewall rule optimizations.',
        'technologies' => ['Nmap', 'Wireshark', 'Nessus'],
        'client' => 'Confidential University',
        'date' => 'January 2023',
        'outcome' => 'Reduced attack surface by 40% through service hardening and firewall rule optimization.'
    ],
    // More projects...
];
?>

<section class="portfolio">
    <div class="container">
        <h1 class="section-title">My Portfolio</h1>
        <p class="section-subtitle">Selected cybersecurity projects and assessments</p>
        
        <div class="portfolio-filter">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="penetration-testing">Penetration Testing</button>
            <button class="filter-btn" data-filter="network-security">Network Security</button>
            <button class="filter-btn" data-filter="secure-coding">Secure Coding</button>
        </div>
        
        <div class="portfolio-grid">
            <?php foreach ($projects as $project): ?>
            <div class="portfolio-item" data-category="<?php echo strtolower(str_replace(' ', '-', $project['category'])); ?>">
                <div class="portfolio-image">
                    <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
                    <div class="portfolio-overlay">
                        <h3><?php echo $project['title']; ?></h3>
                        <span><?php echo $project['category']; ?></span>
                        <button class="btn btn-view" data-project-id="<?php echo $project['id']; ?>">View Details</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Project Modal -->
<div class="modal" id="projectModal">
    <div class="modal-content">
        <button class="modal-close">&times;</button>
        <div class="modal-body">
            <!-- Project details will be loaded here via JavaScript -->
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>