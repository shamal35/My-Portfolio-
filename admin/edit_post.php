<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
require_once '../includes/config.php';
require_once '../includes/db.php';

if (!isset($_GET['id'])) {
    header('Location: manage_posts.php');
    exit;
}
$post_id = (int)$_GET['id'];
$error = '';
$success = '';

$stmt = $pdo->prepare('SELECT * FROM blog_posts WHERE post_id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();
if (!$post) {
    $error = 'Post not found.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $slug = trim($_POST['slug']);
    $excerpt = trim($_POST['excerpt']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);
    $status = $_POST['status'] ?? 'draft';
    $image = $post['featured_image'];
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] === UPLOAD_ERR_OK) {
        $image = 'uploads/' . basename($_FILES['featured_image']['name']);
        move_uploaded_file($_FILES['featured_image']['tmp_name'], '../assets/' . $image);
    }
    if ($title && $slug && $excerpt && $content && $category) {
        $stmt = $pdo->prepare('UPDATE blog_posts SET title=?, slug=?, excerpt=?, content=?, featured_image=?, category=?, status=? WHERE post_id=?');
        $stmt->execute([$title, $slug, $excerpt, $content, $image, $category, $status, $post_id]);
        $success = 'Post updated successfully!';
        // Refresh post data
        $stmt = $pdo->prepare('SELECT * FROM blog_posts WHERE post_id = ?');
        $stmt->execute([$post_id]);
        $post = $stmt->fetch();
    } else {
        $error = 'All fields except image are required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; }
        input, textarea, select { width: 100%; padding: 0.75rem; border-radius: 4px; border: 1px solid #334155; }
        .btn { background: #2563eb; color: #fff; border: none; padding: 0.75rem 2rem; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .alert { margin-bottom: 1rem; padding: 1rem; border-radius: 4px; }
        .alert-success { background: #10b981; color: #fff; }
        .alert-danger { background: #ef4444; color: #fff; }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Edit Blog Post</h1>
        <?php if ($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
        <?php if ($success): ?><div class="alert alert-success"><?php echo $success; ?></div><?php endif; ?>
        <?php if ($post): ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
            </div>
            <div class="form-group">
                <label>Slug (URL)</label>
                <input type="text" name="slug" value="<?php echo htmlspecialchars($post['slug']); ?>" required>
            </div>
            <div class="form-group">
                <label>Excerpt</label>
                <textarea name="excerpt" rows="2" required><?php echo htmlspecialchars($post['excerpt']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="8" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="<?php echo htmlspecialchars($post['category']); ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="published" <?php if($post['status']==='published') echo 'selected'; ?>>Published</option>
                    <option value="draft" <?php if($post['status']==='draft') echo 'selected'; ?>>Draft</option>
                </select>
            </div>
            <div class="form-group">
                <label>Featured Image</label>
                <?php if ($post['featured_image']): ?>
                    <img src="../assets/<?php echo $post['featured_image']; ?>" alt="Current Image" style="max-width:120px;display:block;margin-bottom:0.5rem;">
                <?php endif; ?>
                <input type="file" name="featured_image" accept="image/*">
            </div>
            <button class="btn" type="submit">Update Post</button>
        </form>
        <?php endif; ?>
        <a href="manage_posts.php">&larr; Back to Posts</a>
    </div>
</body>
</html>
