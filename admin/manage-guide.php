<?php 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php'; // $conn (PDO)

// Handle Add
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = trim($_POST['name']);
    $googleScholorLink = trim($_POST['googleScholorLink']);
    $imagePath = '';

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../uploads/guides/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = 'uploads/guides/' . $fileName;
        }
    }

    $stmt = $conn->prepare("INSERT INTO ProjectGuide (name, image, googleScholorLink) VALUES (?, ?, ?)");
    $stmt->execute([$name, $imagePath, $googleScholorLink]);
    header("Location: manage-guide.php");
    exit;
}

// Handle Edit
if (isset($_POST['action']) && $_POST['action'] === 'edit') {
    $pgId = intval($_POST['pgId']);
    $name = trim($_POST['name']);
    $googleScholorLink = trim($_POST['googleScholorLink']);

    // Fetch old image path
    $stmtOld = $conn->prepare("SELECT image FROM ProjectGuide WHERE pgId = ?");
    $stmtOld->execute([$pgId]);
    $oldImage = $stmtOld->fetchColumn();

    $imagePath = $oldImage;

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../uploads/guides/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = 'uploads/guides/' . $fileName;
            if ($oldImage && file_exists('../' . $oldImage)) unlink('../' . $oldImage);
        }
    }

    $stmt = $conn->prepare("UPDATE ProjectGuide SET name=?, image=?, googleScholorLink=? WHERE pgId=?");
    $stmt->execute([$name, $imagePath, $googleScholorLink, $pgId]);
    header("Location: manage-guide.php");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $pgId = intval($_GET['delete']);

    // Delete image
    $stmt = $conn->prepare("SELECT image FROM ProjectGuide WHERE pgId=?");
    $stmt->execute([$pgId]);
    $oldImage = $stmt->fetchColumn();
    if ($oldImage && file_exists('../' . $oldImage)) unlink('../' . $oldImage);

    $stmt = $conn->prepare("DELETE FROM ProjectGuide WHERE pgId=?");
    $stmt->execute([$pgId]);
    header("Location: manage-guide.php");
    exit;
}

// Fetch all guides
$stmt = $conn->query("SELECT * FROM ProjectGuide ORDER BY pgId DESC");
$guides = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Guide - NexArc RISE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="../admin">NexArc - RISE Admin</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="adminNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="manage-projects.php">Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-memberships.php">Memberships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link active" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Project Guides</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i> Add Guide</button>
    </div>

    <table class="table table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Google Scholar</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($guides as $g): ?>
            <tr>
                <td><?php if($g['image']): ?><img src="../<?= htmlspecialchars($g['image']) ?>" width="60"><?php endif; ?></td>
                <td><?= htmlspecialchars($g['name']) ?></td>
                <td><a href="<?= htmlspecialchars($g['googleScholorLink']) ?>" target="_blank">View</a></td>
                <td>
                    <button class="btn btn-warning btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editModal"
                        data-id="<?= $g['pgId'] ?>"
                        data-name="<?= htmlspecialchars($g['name']) ?>"
                        data-link="<?= htmlspecialchars($g['googleScholorLink']) ?>"
                        data-image="<?= htmlspecialchars($g['image']) ?>">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <a href="?delete=<?= $g['pgId'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this guide?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="post" enctype="multipart/form-data" class="modal-content">
        <input type="hidden" name="action" value="add">
        <div class="modal-header"><h5 class="modal-title">Add Guide</h5></div>
        <div class="modal-body">
            <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
            <div class="mb-3"><label>Google Scholar Link</label><input type="url" name="googleScholorLink" class="form-control" required></div>
            <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-primary">Save</button></div>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="post" enctype="multipart/form-data" class="modal-content">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="pgId" id="editPgId">
        <div class="modal-header"><h5 class="modal-title">Edit Guide</h5></div>
        <div class="modal-body">
            <div class="mb-3"><label>Name</label><input type="text" name="name" id="editName" class="form-control" required></div>
            <div class="mb-3"><label>Google Scholar Link</label><input type="url" name="googleScholorLink" id="editLink" class="form-control" required></div>
            <div class="mb-3"><label>Image (leave blank to keep old)</label><input type="file" name="image" class="form-control"></div>
            <div id="oldImage" class="mt-2"></div>
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-primary">Update</button></div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('editModal').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    document.getElementById('editPgId').value = button.getAttribute('data-id');
    document.getElementById('editName').value = button.getAttribute('data-name');
    document.getElementById('editLink').value = button.getAttribute('data-link');
    var img = button.getAttribute('data-image');
    document.getElementById('oldImage').innerHTML = img ? `<img src="../${img}" width="80">` : '';
});
</script>
</body>
</html>
