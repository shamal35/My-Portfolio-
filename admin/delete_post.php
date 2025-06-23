<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
require_once '../includes/config.php';
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $post_id = (int)$_POST['id'];
    $stmt = $pdo->prepare('DELETE FROM blog_posts WHERE post_id = ?');
    $stmt->execute([$post_id]);
}
header('Location: manage_posts.php');
exit;
