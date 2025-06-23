<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
require_once '../includes/config.php';
require_once '../includes/db.php';

// Fetch all blog posts
$stmt = $pdo->query('SELECT * FROM blog_posts ORDER BY published_at DESC');
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blog Posts</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .admin-table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; }
        .admin-table th, .admin-table td { padding: 0.75rem 1rem; border: 1px solid #334155; }
        .admin-table th { background: #2563eb; color: #fff; }
        .admin-table tr:nth-child(even) { background: #1e293b; }
        .admin-table tr:nth-child(odd) { background: #0f172a; }
        .admin-actions a, .admin-actions button {
            margin-right: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 4px;
            border: none;
            text-decoration: none;
            color: #fff;
            background: #2563eb;
            cursor: pointer;
        }
        .admin-actions .delete-btn { background: #ef4444; }
        .add-btn {
            display: inline-block;
            margin-bottom: 1rem;
            background: #10b981;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Manage Blog Posts</h1>
        <a href="add_post.php" class="add-btn">+ Add New Post</a>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($posts): foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post['post_id']; ?></td>
                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                    <td><?php echo htmlspecialchars($post['category']); ?></td>
                    <td><?php echo htmlspecialchars($post['status']); ?></td>
                    <td><?php echo htmlspecialchars($post['published_at']); ?></td>
                    <td class="admin-actions">
                        <a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit</a>
                        <form action="delete_post.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $post['post_id']; ?>">
                            <button type="submit" class="delete-btn" onclick="return confirm('Delete this post?');">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="6">No posts found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="dashboard.php">&larr; Back to Dashboard</a>
    </div>
</body>
</html>
