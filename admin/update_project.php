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

$pId = intval($_POST['pId'] ?? 0);
if ($pId <= 0) { header("Location: manage-projects.php"); exit; }

$title = trim($_POST['title'] ?? '');
$colloborator = trim($_POST['colloborator'] ?? '');
$description = trim($_POST['description'] ?? '');
$participant = trim($_POST['participant'] ?? null);
$year_of_start = !empty($_POST['year_of_start']) ? intval($_POST['year_of_start']) : null;
$status = in_array($_POST['status'] ?? 'Ongoing', ['Ongoing','Completed']) ? $_POST['status'] : 'Ongoing';

$paper_title = trim($_POST['paper_title'] ?? '');
$authors = trim($_POST['authors'] ?? '');
$details = trim($_POST['details'] ?? '');
$typeOfPublish = trim($_POST['typeOfPublish'] ?? '');
$nameOfPublish = trim($_POST['nameOfPublish'] ?? '');
$link = trim($_POST['link'] ?? '');
$year_of_end = !empty($_POST['year_of_end']) ? intval($_POST['year_of_end']) : null;

if ($status === 'Completed') {
    if (empty($year_of_end) || empty($paper_title) || empty($authors) || empty($typeOfPublish) || empty($nameOfPublish)) {
        $_SESSION['error'] = "To set status Completed, provide year of end and paper details.";
        header("Location: manage-projects.php"); exit;
    }
}

try {
    // fetch existing to know current image path
    $stmt = $conn->prepare("SELECT image FROM Project WHERE pId = ?");
    $stmt->execute([$pId]);
    $old = $stmt->fetch(PDO::FETCH_ASSOC);

    $imagePath = $old['image'] ?? null;
    // remove image?
    if (!empty($_POST['remove_image']) && $_POST['remove_image'] == '1') {
        if ($imagePath && file_exists(__DIR__ . '/../' . ltrim($imagePath, '/'))) {
            @unlink(__DIR__ . '/../' . ltrim($imagePath, '/'));
        }
        $imagePath = null;
    }

    // new upload?
    if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $newimg = uploadImage($_FILES['image']);
        if ($newimg === null) {
            $_SESSION['error'] = "Image upload failed.";
            header("Location: manage-projects.php"); exit;
        }
        // remove old
        if ($imagePath && file_exists(__DIR__ . '/../' . ltrim($imagePath, '/'))) {
            @unlink(__DIR__ . '/../' . ltrim($imagePath, '/'));
        }
        $imagePath = $newimg;
    }

    $stmt = $conn->prepare("UPDATE Project SET title=?, image=?, colloborator=?, description=?, participant=?, year_of_start=?, year_of_end=?, status=?, paper_title=?, authors=?, details=?, typeOfPublish=?, nameOfPublish=?, link=? WHERE pId=?");
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
        $status === 'Completed' ? $link : null,
        $pId
    ]);
    $_SESSION['success'] = "Project updated.";
} catch (Exception $e) {
    $_SESSION['error'] = "DB error: ".$e->getMessage();
}
header("Location: manage-projects.php");
exit;
