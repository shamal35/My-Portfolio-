<?php
$page_title = "Cybersecurity Blog | Shamal Theekshana";
$current_page = "blog.php";
include 'includes/header.php';
require_once 'includes/config.php';
require_once 'includes/db.php';

// Fetch published blog posts from the database
$stmt = $pdo->query('SELECT * FROM blog_posts WHERE status = "published" ORDER BY published_at DESC');
$posts = $stmt->fetchAll();
?>
<section class="blog-hero">
    <div class="container">
        <h1 class="section-title">Cybersecurity Blog</h1>
        <p class="section-subtitle">Thoughts, tutorials, and insights on information security</p>
    </div>
</section>

<section class="blog-posts">
    <div class="container">
        <div class="posts-grid" id="posts-grid">
            <?php if ($posts): foreach ($posts as $post): ?>
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
        </div>
    </div>
</section>
<script>
function fetchPosts() {
    fetch('fetch_posts.php')
        .then(res => res.text())
        .then(html => {
            document.getElementById('posts-grid').innerHTML = html;
        });
}
setInterval(fetchPosts, 30000); // 30 seconds
</script>
<?php include 'includes/footer.php'; ?>