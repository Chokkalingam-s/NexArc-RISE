<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php';

$pId = intval($_POST['pId'] ?? 0);
if ($pId <= 0) { header("Location: manage-projects.php"); exit; }

try {
    $stmt = $conn->prepare("SELECT image FROM Project WHERE pId = ?");
    $stmt->execute([$pId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && !empty($row['image'])) {
        $path = __DIR__ . '/../' . ltrim($row['image'], '/');
        if (file_exists($path)) @unlink($path);
    }

    $stmt = $conn->prepare("DELETE FROM Project WHERE pId = ?");
    $stmt->execute([$pId]);
    $_SESSION['success'] = "Project deleted.";
} catch (Exception $e) {
    $_SESSION['error'] = "DB error: " . $e->getMessage();
}
header("Location: manage-projects.php");
exit;
