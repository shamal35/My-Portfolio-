<?php
require_once 'includes/config.php';
require_once 'includes/db.php';

if (!isset($_GET['id'])) {
    header('Location: blog.php');
    exit;
}
$post_id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM blog_posts WHERE post_id = ? AND status = "published"');
$stmt->execute([$post_id]);
$post = $stmt->fetch();
if (!$post) {
    header('Location: blog.php');
    exit;
}
$page_title = htmlspecialchars($post['title']) . ' | Cybersecurity Blog';
$current_page = 'blog.php';
include 'includes/header.php';
?>
<section class="blog-single">
    <div class="container">
        <div class="post-single">
            <?php if ($post['featured_image']): ?>
                <img src="assets/<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="post-single-image">
            <?php endif; ?>
            <div class="post-meta">
                <span class="post-category"><?php echo htmlspecialchars($post['category']); ?></span>
                <span class="post-date"><?php echo htmlspecialchars($post['published_at']); ?></span>
            </div>
            <h1 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h1>
            <div class="post-excerpt"><?php echo nl2br(htmlspecialchars($post['excerpt'])); ?></div>
            <div class="post-content"><?php echo $post['content']; ?></div>
        </div>
        <a href="blog.php" class="btn btn-secondary">&larr; Back to Blog</a>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
