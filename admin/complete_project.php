<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php';

$pId = intval($_POST['pId'] ?? 0);
$year_of_end = !empty($_POST['year_of_end']) ? intval($_POST['year_of_end']) : null;
$paper_title = trim($_POST['paper_title'] ?? '');
$authors = trim($_POST['authors'] ?? '');
$details = trim($_POST['details'] ?? '');
$typeOfPublish = trim($_POST['typeOfPublish'] ?? '');
$nameOfPublish = trim($_POST['nameOfPublish'] ?? '');
$link = trim($_POST['link'] ?? '');

if ($pId <= 0) { header("Location: manage-projects.php"); exit; }
if (empty($year_of_end) || empty($paper_title) || empty($authors) || empty($typeOfPublish) || empty($nameOfPublish)) {
    $_SESSION['error'] = "Please complete all required fields to mark project as completed.";
    header("Location: manage-projects.php"); exit;
}

try {
    $stmt = $conn->prepare("UPDATE Project SET year_of_end=?, status='Completed', paper_title=?, authors=?, details=?, typeOfPublish=?, nameOfPublish=?, link=? WHERE pId=?");
    $stmt->execute([$year_of_end, $paper_title, $authors, $details, $typeOfPublish, $nameOfPublish, $link, $pId]);
    $_SESSION['success'] = "Project marked as Completed.";
} catch (Exception $e) {
    $_SESSION['error'] = "DB error: ".$e->getMessage();
}
header("Location: manage-projects.php");
exit;
