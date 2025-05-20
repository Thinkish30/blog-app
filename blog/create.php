<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: ../admin/login.php"); exit; }
include("../config/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    header("Location: ../admin/dashboard.php");
}
?>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="content" placeholder="Content" rows="10" required></textarea><br>
    <button type="submit">Create</button>
</form>
