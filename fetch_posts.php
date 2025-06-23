<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
$stmt = $pdo->query('SELECT * FROM blog_posts WHERE status = "published" ORDER BY published_at DESC');
$posts = $stmt->fetchAll();
if ($posts): foreach ($posts as $post): ?>
<article class="post-card">
    <div class="post-image">
        <?php if ($post['featured_image'] && file_exists('assets/' . $post['featured_image'])): ?>
            <img src="assets/<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
        <?php else: ?>
            <div class="image-placeholder"></div>
        <?php endif; ?>
    </div>
    <div class="post-content">
        <div class="post-meta">
            <span class="post-category"><?php echo htmlspecialchars($post['category']); ?></span>
            <span class="post-date"><?php echo htmlspecialchars($post['published_at']); ?></span>
        </div>
        <h2 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h2>
        <p class="post-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
        <a href="blog-single.php?id=<?php echo $post['post_id']; ?>" class="read-more">Read More</a>
    </div>
</article>
<?php endforeach; else: ?>
<p>No blog posts found.</p>
<?php endif; ?>
