<?php
include("config/connection.php");
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<h1>My Blog</h1>
<?php while ($row = $result->fetch_assoc()): ?>
    <h2><?= $row['title'] ?></h2>
    <p><?= substr($row['content'], 0, 150) ?>...</p>
    <hr>
<?php endwhile; ?>
