<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include("../config/connection.php");
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<h2>Welcome Admin</h2>
<a href="../blog/create.php">Create Post</a> | <a href="logout.php">Logout</a>
<hr>
<?php while ($row = $result->fetch_assoc()): ?>
    <h3><?= $row['title'] ?></h3>
    <p><?= substr($row['content'], 0, 100) ?>...</p>
    <a href="../blog/edit.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="../blog/delete.php?id=<?= $row['id'] ?>">Delete</a>
    <hr>
<?php endwhile; ?>
