<?php
$page_title = "Services | Cybersecurity Solutions by Shamal Theekshana";
$current_page = "services.php";
include 'includes/header.php';
?>

<section class="services-hero">
    <div class="container">
        <h1 class="section-title">Professional Cybersecurity Services</h1>
        <p class="section-subtitle">Comprehensive security solutions tailored to protect your business from digital threats</p>
    </div>
</section>

<section class="services-list">
    <div class="container">
        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="service-content">
                <h2 class="service-title">Penetration Testing</h2>
                <p class="service-description">Simulate real-world attacks to identify vulnerabilities in your systems before malicious actors can exploit them. Includes web application, network, and wireless penetration testing.</p>
                <ul class="service-features">
                    <li>Comprehensive vulnerability identification</li>
                    <li>Detailed remediation recommendations</li>
                    <li>OWASP Top 10 coverage</li>
                    <li>Executive and technical reports</li>
                </ul>
                <a href="contact.php" class="btn btn-outline">Request Service</a>
            </div>
        </div>
        
        <div class="service-card">
            <div class="service-icon">
                <i class="fas fa-network-wired"></i>
            </div>
            <div class="service-content">
                <h2 class="service-title">Network Security Assessment</h2>
                <p class="service-description">Evaluate your network infrastructure for security weaknesses, misconfigurations, and potential entry points for attackers.</p>
                <ul class="service-features">
                    <li>Firewall and router configuration review</li>
                    <li>Intrusion detection/prevention system evaluation</li>
                    <li>Wireless security assessment</li>
                    <li>Network segmentation analysis</li>
                </ul>
                <a href="contact.php" class="btn btn-outline">Request Service</a>
            </div>
        </div>
        
        <!-- More service cards -->
    </div>
</section>

<section class="pricing">
    <div class="container">
        <h2 class="section-title">Flexible Pricing Options</h2>
        <p class="section-subtitle">Choose the engagement that fits your needs</p>
        
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3 class="pricing-title">Basic Assessment</h3>
                <div class="pricing-price">$500</div>
                <ul class="pricing-features">
                    <li>Single system penetration test</li>
                    <li>Basic vulnerability scan</li>
                    <li>Summary report</li>
                    <li>1 week turnaround</li>
                </ul>
                <a href="contact.php" class="btn btn-outline">Get Started</a>
            </div>
            
            <div class="pricing-card featured">
                <div class="pricing-badge">Most Popular</div>
                <h3 class="pricing-title">Standard Package</h3>
                <div class="pricing-price">$1,200</div>
                <ul class="pricing-features">
                    <li>Full web application test</li>
                    <li>Network vulnerability scan</li>
                    <li>Detailed technical report</li>
                    <li>Remediation consultation</li>
                    <li>2 weeks turnaround</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Get Started</a>
            </div>
            
            <div class="pricing-card">
                <h3 class="pricing-title">Enterprise Solution</h3>
                <div class="pricing-price">Custom</div>
                <ul class="pricing-features">
                    <li>Comprehensive security audit</li>
                    <li>Multiple systems testing</li>
                    <li>Executive and technical reports</li>
                    <li>Ongoing consultation</li>
                    <li>Priority support</li>
                </ul>
                <a href="contact.php" class="btn btn-outline">Contact for Quote</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>