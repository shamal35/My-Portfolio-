<?php
$page_title = "About Shamal Theekshana | Cybersecurity Specialist";
$current_page = "about.php";
include 'includes/header.php';
?>

<section class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h1 class="section-title">About Me</h1>
                <p class="about-description">
                    I'm Shamal Theekshana, an Information Systems Security Specialist with a Bachelor of Information Technology (Honours) degree from ESOFT Metro Campus. My passion for cybersecurity drives me to help businesses protect their digital assets from evolving threats.
                </p>
                
                <div class="about-details">
                    <div class="details-item">
                        <span class="details-label">Name:</span>
                        <span class="details-value">Shamal Theekshana</span>
                    </div>
                    <div class="details-item">
                        <span class="details-label">Degree:</span>
                        <span class="details-value">BIT (Hons) Information Systems Security</span>
                    </div>
                    <div class="details-item">
                        <span class="details-label">Institution:</span>
                        <span class="details-value">ESOFT Metro Campus</span>
                    </div>
                    <div class="details-item">
                        <span class="details-label">Location:</span>
                        <span class="details-value">Colombo, Sri Lanka</span>
                    </div>
                    <div class="details-item">
                        <span class="details-label">Email:</span>
                        <span class="details-value">shamal@example.com</span>
                    </div>
                </div>
                
                <a href="contact.php" class="btn btn-primary">Contact Me</a>
            </div>
            
            <div class="about-image">
                <img src="assets/img/shamal-about.png" alt="Shamal Theekshana">
            </div>
        </div>
    </div>
</section>

<section class="education">
    <div class="container">
        <h2 class="section-title">Education & Certifications</h2>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">2020 - 2023</div>
                <div class="timeline-content">
                    <h3>Bachelor of Information Technology (Honours)</h3>
                    <p class="timeline-institution">ESOFT Metro Campus</p>
                    <p class="timeline-description">Specialized in Information Systems Security with coursework in penetration testing, network security, cryptography, and secure software development.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">2023</div>
                <div class="timeline-content">
                    <h3>Certified Ethical Hacker (CEH)</h3>
                    <p class="timeline-institution">EC-Council</p>
                    <p class="timeline-description">Certification covering ethical hacking methodologies, tools, and techniques.</p>
                </div>
            </div>
            
            <!-- More education/certification items -->
        </div>
    </div>
</section>

<section class="skills">
    <div class="container">
        <h2 class="section-title">Technical Skills</h2>
        
        <div class="skills-grid">
            <div class="skill-category">
                <h3 class="category-title">Security</h3>
                <ul class="skill-list">
                    <li class="skill-item">Penetration Testing</li>
                    <li class="skill-item">Vulnerability Assessment</li>
                    <li class="skill-item">Network Security</li>
                    <li class="skill-item">OWASP Top 10</li>
                    <li class="skill-item">SIEM Solutions</li>
                    <li class="skill-item">Firewall Configuration</li>
                </ul>
            </div>
            
            <div class="skill-category">
                <h3 class="category-title">Technologies</h3>
                <ul class="skill-list">
                    <li class="skill-item">Kali Linux</li>
                    <li class="skill-item">Metasploit</li>
                    <li class="skill-item">Burp Suite</li>
                    <li class="skill-item">Wireshark</li>
                    <li class="skill-item">Nmap</li>
                    <li class="skill-item">Snort</li>
                </ul>
            </div>
            
            <div class="skill-category">
                <h3 class="category-title">Programming</h3>
                <ul class="skill-list">
                    <li class="skill-item">Python</li>
                    <li class="skill-item">Java</li>
                    <li class="skill-item">Bash Scripting</li>
                    <li class="skill-item">SQL</li>
                    <li class="skill-item">PHP</li>
                    <li class="skill-item">JavaScript</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>