<?php
// Start session and include config/db
session_start();
require_once 'includes/config.php';
require_once 'includes/db.php';

// Ensure CSRF token is set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Initialize variables
$errors = [];
$success = false;

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = "Invalid CSRF token. Please try again.";
    } else {
        // Sanitize inputs
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
        
        // Validate inputs
        if (empty($name)) $errors[] = "Name is required.";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
        if (empty($subject)) $errors[] = "Subject is required.";
        if (empty($message)) $errors[] = "Message is required.";
        
        if (empty($errors)) {
            try {
                // Insert into database
                $stmt = $pdo->prepare("INSERT INTO contact_submissions 
                                      (name, email, subject, message, ip_address, user_agent) 
                                      VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $name,
                    $email,
                    $subject,
                    $message,
                    $_SERVER['REMOTE_ADDR'],
                    $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
                ]);
                
                // Send email notification
                $to = RECIPIENT_EMAIL;
                $emailSubject = "New Contact Form Submission: $subject";
                $emailBody = "You have received a new message from your website contact form.\n\n";
                $emailBody .= "Name: $name\n";
                $emailBody .= "Email: $email\n\n";
                $emailBody .= "Subject: $subject\n\n";
                $emailBody .= "Message:\n$message\n";
                
                $headers = "From: $name <$email>" . "\r\n";
                $headers .= "Reply-To: $email" . "\r\n";
                
                mail($to, $emailSubject, $emailBody, $headers);
                
                $success = true;
                
                // Clear form fields
                $name = $email = $subject = $message = '';
            } catch(PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                $errors[] = "There was a problem sending your message. Please try again later.";
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<section class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h1 class="section-title">Get In Touch</h1>
                <p class="contact-description">
                    Interested in discussing a project or need cybersecurity advice? Feel free to contact me using the form or through any of the channels below.
                </p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email</h3>
                            <a href="mailto:shamal@example.com">shamal@example.com</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Phone</h3>
                            <a href="tel:+94771234567">+94 77 123 4567</a>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Location</h3>
                            <span>Colombo, Sri Lanka</span>
                        </div>
                    </div>
                </div>
                
                <div class="contact-social">
                    <h3>Follow Me</h3>
                    <div class="social-links">
                        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank" aria-label="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.upwork.com/freelancers/~youraccount" target="_blank" aria-label="Upwork">
                            <i class="fab fa-upwork"></i>
                        </a>
                        <a href="https://tryhackme.com/p/yourusername" target="_blank" aria-label="TryHackMe">
                            <i class="fas fa-shield-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        Thank you for your message! I will get back to you as soon as possible.
                    </div>
                <?php elseif (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST" id="contactForm">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject ?? ''); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <div class="container">
        <h2 class="section-title">Location</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126743.5857934995!2d79.78616430000001!3d6.9349963999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo!5e0!3m2!1sen!2slk!4v1620000000000!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>