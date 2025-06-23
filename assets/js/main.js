document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle with null check
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav');
    
    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
        });
        
        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                nav.classList.remove('active');
            });
        });
    }

    // Dark mode toggle with null check
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        
        // Check for saved user preference or use system preference
        if (localStorage.getItem('darkMode') === 'enabled' || 
            (localStorage.getItem('darkMode') !== 'disabled' && darkModeMediaQuery.matches)) {
            enableDarkMode();
        }
        
        themeToggle.addEventListener('click', () => {
            if (document.body.classList.contains('dark-mode')) {
                disableDarkMode();
            } else {
                enableDarkMode();
            }
        });
        
        // Listen for system preference changes
        darkModeMediaQuery.addListener(e => {
            if (e.matches && localStorage.getItem('darkMode') !== 'disabled') {
                enableDarkMode();
            } else if (!e.matches && localStorage.getItem('darkMode') !== 'enabled') {
                disableDarkMode();
            }
        });
        
        function enableDarkMode() {
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        function disableDarkMode() {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'disabled');
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
    }

    // Smooth scrolling for anchor links with null check
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Header scroll effect with null check
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Back to top button with null check
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Portfolio filtering with null check
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    if (filterButtons.length > 0 && portfolioItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                
                // Filter items
                portfolioItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }
    
    // Portfolio modal with null check
    const viewButtons = document.querySelectorAll('.btn-view');
    const modal = document.querySelector('#projectModal');
    const modalClose = document.querySelector('.modal-close');
    
    if (viewButtons.length > 0 && modal && modalClose) {
        // Sample project data - in a real app, this would come from PHP/DB
        const projects = [
            {
                id: 1,
                title: 'E-Commerce Security Audit',
                category: 'Penetration Testing',
                description: 'Conducted a comprehensive security assessment for a Sri Lankan e-commerce platform, identifying critical vulnerabilities including SQL injection and insecure direct object references.',
                technologies: ['Kali Linux', 'Burp Suite', 'OWASP ZAP'],
                client: 'LankaShop (Confidential)',
                date: 'March 2023',
                outcome: 'Identified and helped remediate 5 critical vulnerabilities, improving the platform\'s security posture significantly.'
            },
            // More projects...
        ];
        
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const projectId = parseInt(this.getAttribute('data-project-id'));
                const project = projects.find(p => p.id === projectId);
                
                if (project) {
                    const modalBody = document.querySelector('.modal-body');
                    modalBody.innerHTML = `
                        <h2>${project.title}</h2>
                        <p class="project-category">${project.category}</p>
                        
                        <div class="project-meta">
                            <div class="meta-item">
                                <span class="meta-label">Client:</span>
                                <span class="meta-value">${project.client}</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Date:</span>
                                <span class="meta-value">${project.date}</span>
                            </div>
                        </div>
                        
                        <h3>Project Description</h3>
                        <p>${project.description}</p>
                        
                        <h3>Technologies Used</h3>
                        <ul class="tech-list">
                            ${project.technologies.map(tech => `<li>${tech}</li>`).join('')}
                        </ul>
                        
                        <h3>Outcome</h3>
                        <p>${project.outcome}</p>
                        
                        <div class="project-actions">
                            <a href="contact.php" class="btn btn-primary">Request Similar Service</a>
                        </div>
                    `;
                    
                    modal.classList.add('active');
                }
            });
        });
        
        modalClose.addEventListener('click', function() {
            modal.classList.remove('active');
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    }
    
    // Testimonial slider with null check
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    if (testimonialSlides.length > 0) {
        let currentSlide = 0;
        
        function showSlide(index) {
            testimonialSlides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % testimonialSlides.length;
            showSlide(currentSlide);
        }
        
        // Initialize slider
        showSlide(currentSlide);
        setInterval(nextSlide, 5000); // Auto-rotate every 5 seconds
    }
    
    // Animation on scroll with null check
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.feature-card, .service-card, .portfolio-item, .post-card');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;
            
            if (elementPosition < screenPosition) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };
    
    // Set initial state for animated elements
    const animatedElements = document.querySelectorAll('.feature-card, .service-card, .portfolio-item, .post-card');
    if (animatedElements.length > 0) {
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });
        
        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Run once on load
    }
});