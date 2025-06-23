<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #0f172a; }
        .dashboard {
            max-width: 900px;
            margin: 40px auto;
            background: #1e293b;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.2);
            color: #e2e8f0;
        }
        .dashboard h1 { text-align: center; margin-bottom: 2rem; }
        .dashboard-nav {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .dashboard-nav a {
            color: #2563eb;
            background: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }
        .dashboard-nav a:hover {
            background: #2563eb;
            color: #fff;
        }
        .dashboard-section {
            margin-bottom: 2rem;
            background: #0f172a;
            padding: 1.5rem;
            border-radius: 6px;
        }
        .logout-btn {
            display: block;
            margin: 0 auto;
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="dashboard-nav">
            <a href="manage_posts.php">Manage Blog Posts</a>
            <a href="manage_portfolio.php">Manage Portfolio</a>
            <a href="manage_messages.php">View Messages</a>
            <a href="manage_admins.php">Admin Users</a>
        </div>
        <div class="dashboard-section" id="posts">
            <h2>Blog Posts</h2>
            <p>Feature coming soon: Add, edit, and delete blog posts.</p>
        </div>
        <div class="dashboard-section" id="portfolio">
            <h2>Portfolio Items</h2>
            <p>Feature coming soon: Manage portfolio projects.</p>
        </div>
        <div class="dashboard-section" id="messages">
            <h2>Contact Messages</h2>
            <p>Feature coming soon: View and respond to contact form messages.</p>
        </div>
        <form method="post" action="logout.php">
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
