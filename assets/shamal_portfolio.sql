-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamal_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` enum('published','draft') DEFAULT 'published',
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `certification_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `issuing_organization` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `credential_id` varchar(50) DEFAULT NULL,
  `credential_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`certification_id`, `name`, `issuing_organization`, `issue_date`, `expiration_date`, `credential_id`, `credential_url`, `created_at`, `updated_at`) VALUES
(1, 'Certified Ethical Hacker (CEH)', 'EC-Council', '2023-05-10', NULL, 'ECC12345678', NULL, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 'CompTIA Security+', 'CompTIA', '2022-11-15', NULL, 'COMP98765432', NULL, '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `submission_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `status` enum('unread','read','replied','spam') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`submission_id`, `name`, `email`, `subject`, `message`, `ip_address`, `user_agent`, `status`, `created_at`) VALUES
(1, 'sdd', 'shama@gmail.com', 'dd', 'dd', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'unread', '2025-06-22 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `institution`, `degree`, `field_of_study`, `start_date`, `end_date`, `is_current`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ESOFT Metro Campus', 'Bachelor of Information Technology (Honours)', 'Information Systems Security', '2020-01-15', '2023-12-20', 0, 'Specialized in Information Systems Security with coursework in penetration testing, network security, cryptography, and secure software development.', '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `client` varchar(100) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `outcome` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `slug`, `category`, `description`, `client`, `project_date`, `outcome`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce Security Audit', 'ecommerce-security-audit', 'Penetration Testing', 'Conducted a comprehensive security assessment for a Sri Lankan e-commerce platform, identifying critical vulnerabilities including SQL injection and insecure direct object references.', 'LankaShop (Confidential)', '2023-03-15', 'Identified and helped remediate 5 critical vulnerabilities, improving the platform\'s security posture significantly.', 'project1.jpg', '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 'University Network Security', 'university-network-security', 'Network Security', 'Performed a network security assessment for a local university, identifying vulnerable services and recommending firewall rule optimizations.', 'Confidential University', '2023-01-10', 'Reduced attack surface by 40% through service hardening and firewall rule optimization.', 'project2.jpg', '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `project_technologies`
--

CREATE TABLE `project_technologies` (
  `project_id` int(11) NOT NULL,
  `tech_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_technologies`
--

INSERT INTO `project_technologies` (`project_id`, `tech_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 10),
(2, 1),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `icon_class` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `detailed_description` longtext DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `title`, `slug`, `icon_class`, `description`, `detailed_description`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Penetration Testing', 'penetration-testing', 'fas fa-shield-alt', 'Identify vulnerabilities in your systems before attackers do with thorough penetration testing.', 'Our penetration testing service simulates real-world attacks to identify security weaknesses in your systems. We use industry-standard tools and methodologies to test your web applications, networks, and infrastructure. After testing, you\'ll receive a detailed report with prioritized findings and actionable recommendations.', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 'Network Security Assessment', 'network-security-assessment', 'fas fa-network-wired', 'Secure your network infrastructure against intrusions and unauthorized access.', 'We conduct comprehensive assessments of your network infrastructure to identify vulnerabilities and misconfigurations. Our assessment covers firewalls, routers, switches, wireless networks, and other network components. You\'ll receive a detailed report with recommendations to improve your network security posture.', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `service_packages`
--

CREATE TABLE `service_packages` (
  `package_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `features` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_packages`
--

INSERT INTO `service_packages` (`package_id`, `service_id`, `title`, `price`, `is_featured`, `features`, `created_at`, `updated_at`) VALUES
(1, 1, 'Basic Assessment', 500.00, 0, '[\"Single system penetration test\", \"Basic vulnerability scan\", \"Summary report\", \"1 week turnaround\"]', '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 1, 'Standard Package', 1200.00, 1, '[\"Full web application test\", \"Network vulnerability scan\", \"Detailed technical report\", \"Remediation consultation\", \"2 weeks turnaround\"]', '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(3, 1, 'Enterprise Solution', 0.00, 0, '[\"Comprehensive security audit\", \"Multiple systems testing\", \"Executive and technical reports\", \"Ongoing consultation\", \"Priority support\"]', '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `setting_value` text NOT NULL,
  `setting_group` varchar(50) NOT NULL,
  `is_public` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`setting_id`, `setting_name`, `setting_value`, `setting_group`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Shamal Theekshana | Cybersecurity Specialist', 'general', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 'site_description', 'Freelance Information Systems Security Specialist with a BIT Honours Degree from ESOFT Metro Campus. Offering penetration testing, network security, and cybersecurity solutions.', 'general', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(3, 'contact_email', 'shamal@example.com', 'contact', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(4, 'phone_number', '+94771234567', 'contact', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(5, 'address', 'Colombo, Sri Lanka', 'contact', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(6, 'linkedin_url', 'https://www.linkedin.com/in/yourprofile', 'social', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(7, 'github_url', 'https://github.com/yourusername', 'social', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(8, 'upwork_url', 'https://www.upwork.com/freelancers/~youraccount', 'social', 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `proficiency` tinyint(3) DEFAULT 80,
  `is_featured` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `name`, `category`, `proficiency`, `is_featured`, `sort_order`) VALUES
(1, 'Penetration Testing', 'Security', 90, 1, 0),
(2, 'Vulnerability Assessment', 'Security', 85, 1, 0),
(3, 'Network Security', 'Security', 80, 1, 0),
(4, 'OWASP Top 10', 'Security', 95, 1, 0),
(5, 'Kali Linux', 'Technologies', 85, 1, 0),
(6, 'Metasploit', 'Technologies', 80, 0, 0),
(7, 'Burp Suite', 'Technologies', 75, 1, 0),
(8, 'Python', 'Programming', 85, 1, 0),
(9, 'Java', 'Programming', 80, 0, 0),
(10, 'Bash Scripting', 'Programming', 75, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `tech_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon_class` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`tech_id`, `name`, `icon_class`) VALUES
(1, 'Kali Linux', 'fab fa-linux'),
(2, 'Metasploit', 'fas fa-bug'),
(3, 'Burp Suite', 'fas fa-shield-alt'),
(4, 'Wireshark', 'fas fa-network-wired'),
(5, 'Nmap', 'fas fa-search'),
(6, 'Python', 'fab fa-python'),
(7, 'Java', 'fab fa-java'),
(8, 'PHP', 'fab fa-php'),
(9, 'JavaScript', 'fab fa-js'),
(10, 'OWASP ZAP', 'fas fa-shield-virus');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_title` varchar(100) NOT NULL,
  `client_company` varchar(100) DEFAULT NULL,
  `client_image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `client_name`, `client_title`, `client_company`, `client_image`, `content`, `rating`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'John Smith', 'CTO', 'TechSolutions Lanka', NULL, 'Shamal conducted a thorough penetration test for our e-commerce platform and identified critical vulnerabilities we had missed. His detailed report and remediation advice were invaluable.', 5, 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13'),
(2, 'Samantha Perera', 'IT Manager', 'Colombo University', NULL, 'The network security assessment provided clear insights into our vulnerabilities. Shamal\'s recommendations helped us significantly improve our security posture.', 5, 1, '2025-06-22 12:02:13', '2025-06-22 12:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('admin','editor') DEFAULT 'editor',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `full_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'shamal@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Shamal Theekshana', 'admin', '2025-06-22 12:02:13', '2025-06-22 12:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certification_id`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD PRIMARY KEY (`project_id`,`tech_id`),
  ADD KEY `tech_id` (`tech_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `service_packages`
--
ALTER TABLE `service_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`tech_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `certification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_packages`
--
ALTER TABLE `service_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;

--
-- Constraints for table `project_technologies`
--
ALTER TABLE `project_technologies`
  ADD CONSTRAINT `project_technologies_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_technologies_ibfk_2` FOREIGN KEY (`tech_id`) REFERENCES `technologies` (`tech_id`) ON DELETE CASCADE;

--
-- Constraints for table `service_packages`
--
ALTER TABLE `service_packages`
  ADD CONSTRAINT `service_packages_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
