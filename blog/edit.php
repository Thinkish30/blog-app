<?php
session_start();
include("../config/connection.php");
if (!isset($_SESSION['admin'])) { header("Location: ../admin/login.php"); exit; }
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header("Location: ../admin/dashboard.php");
} else {
    $result = $conn->query("SELECT * FROM posts WHERE id=$id");
    $post = $result->fetch_assoc();
}
?>
<form method="POST">
    <input type="text" name="title" value="<?= $post['title'] ?>" required><br>
    <textarea name="content" rows="10" required><?= $post['content'] ?></textarea><br>
    <button type="submit">Update</button>
</form>
