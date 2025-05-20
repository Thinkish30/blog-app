<?php
session_start();
include("../config/connection.php");
if (!isset($_SESSION['admin'])) { header("Location: ../admin/login.php"); exit; }
$id = $_GET['id'];
$conn->query("DELETE FROM posts WHERE id=$id");
header("Location: ../admin/dashboard.php");
?>