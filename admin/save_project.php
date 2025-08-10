<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php';

function uploadImage($file) {
    $targetDir = __DIR__ . '/../uploads/projects/';
    if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

    if ($file['error'] !== UPLOAD_ERR_OK) return null;

    $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
    if (!in_array($file['type'], $allowed)) return null;
    if ($file['size'] > 3 * 1024 * 1024) return null; // 3MB

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = 'proj_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $dest = $targetDir . $name;
    if (!move_uploaded_file($file['tmp_name'], $dest)) return null;
    return 'uploads/projects/' . $name;
}

$title = trim($_POST['title'] ?? '');
$colloborator = trim($_POST['colloborator'] ?? '');
$description = trim($_POST['description'] ?? '');
$participant = trim($_POST['participant'] ?? null);
$year_of_start = !empty($_POST['year_of_start']) ? intval($_POST['year_of_start']) : null;
$status = in_array($_POST['status'] ?? 'Ongoing', ['Ongoing','Completed']) ? $_POST['status'] : 'Ongoing';

// Paper fields (may be empty)
$paper_title = trim($_POST['paper_title'] ?? '');
$authors = trim($_POST['authors'] ?? '');
$details = trim($_POST['details'] ?? '');
$typeOfPublish = trim($_POST['typeOfPublish'] ?? '');
$nameOfPublish = trim($_POST['nameOfPublish'] ?? '');
$link = trim($_POST['link'] ?? '');
$year_of_end = !empty($_POST['year_of_end']) ? intval($_POST['year_of_end']) : null;

if ($status === 'Completed') {
    // required validation for completed
    if (empty($year_of_end) || empty($paper_title) || empty($authors) || empty($typeOfPublish) || empty($nameOfPublish)) {
        $_SESSION['error'] = "To save as Completed, please provide Year of End and paper details.";
        header("Location: manage-projects.php"); exit;
    }
}

$imagePath = null;
if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
    $imagePath = uploadImage($_FILES['image']);
    if ($imagePath === null) {
        $_SESSION['error'] = "Image upload failed (type/size).";
        header("Location: manage-projects.php"); exit;
    }
}

try {
    $stmt = $conn->prepare("INSERT INTO Project (title, image, colloborator, description, participant, year_of_start, year_of_end, status, paper_title, authors, details, typeOfPublish, nameOfPublish, link) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([
        $title,
        $imagePath,
        $colloborator,
        $description,
        $participant,
        $year_of_start,
        $status === 'Completed' ? $year_of_end : null,
        $status,
        $status === 'Completed' ? $paper_title : null,
        $status === 'Completed' ? $authors : null,
        $status === 'Completed' ? $details : null,
        $status === 'Completed' ? $typeOfPublish : null,
        $status === 'Completed' ? $nameOfPublish : null,
        $status === 'Completed' ? $link : null
    ]);
    $_SESSION['success'] = "Project saved.";
} catch (Exception $e) {
    $_SESSION['error'] = "DB error: " . $e->getMessage();
}
header("Location: manage-projects.php");
exit;
