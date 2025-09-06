<?php 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php'; // $conn (PDO)

// Handle Add/Edit/Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type']; // 'school' or 'scholarship'
    $action = $_POST['action']; // 'add', 'edit', 'delete'

    if ($action === 'delete') {
        $idField = ($type === 'school') ? 'schoolId' : 'scholorshipId';
        $table = ($type === 'school') ? 'School' : 'Scholorship';
        $stmt = $conn->prepare("DELETE FROM $table WHERE $idField = ?");
        $stmt->execute([$_POST['id']]);
        header("Location: manage-schools.php");
        exit;
    }

    // Common fields
    $title = $_POST['title'] ?? '';
    $place_university = $_POST['place_university'] ?? '';
    $link = $_POST['link'] ?? '';
    $description = $_POST['description'] ?? '';

    // Handle image
    $imageName = $_POST['existing_image'] ?? '';
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }

    if ($type === 'school') {
        if ($action === 'add') {
            $stmt = $conn->prepare("INSERT INTO School (schoolname, place, link, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $place_university, $link, $imageName]);
        } elseif ($action === 'edit') {
            $stmt = $conn->prepare("UPDATE School SET schoolname=?, place=?, link=?, image=? WHERE schoolId=?");
            $stmt->execute([$title, $place_university, $link, $imageName, $_POST['id']]);
        }
    } else { // scholarship
        if ($action === 'add') {
            $stmt = $conn->prepare("INSERT INTO Scholorship (title, university, link, description, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $place_university, $link, $description, $imageName]);
        } elseif ($action === 'edit') {
            $stmt = $conn->prepare("UPDATE Scholorship SET title=?, university=?, link=?, description=?, image=? WHERE scholorshipId=?");
            $stmt->execute([$title, $place_university, $link, $description, $imageName, $_POST['id']]);
        }
    }

    header("Location: manage-schools.php");
    exit;
}

// Fetch existing records
$schools = $conn->query("SELECT * FROM School ORDER BY schoolId DESC")->fetchAll(PDO::FETCH_ASSOC);
$scholarships = $conn->query("SELECT * FROM Scholorship ORDER BY scholorshipId DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Schools & Scholarships - NexArc RISE</title>
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
      <li class="nav-item"><a class="nav-link active" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container py-4">
  <div class="row">
    <!-- Schools -->
    <div class="col-md-6">
      <h4>Schools <button class="btn btn-sm btn-success" onclick="openModal('school')"><i class="bi bi-plus-circle"></i></button></h4>
      <div class="row">
        <?php foreach ($schools as $s): ?>
        <div class="col-12 mb-3">
          <div class="card">
            <img src="../uploads/<?= htmlspecialchars($s['image']) ?>" class="card-img-top" height="150" style="object-fit:cover;">
            <div class="card-body">
              <h5><?= htmlspecialchars($s['schoolname']) ?></h5>
              <p><?= htmlspecialchars($s['place']) ?></p>
              <a href="<?= htmlspecialchars($s['link']) ?>" target="_blank" class="btn btn-primary btn-sm">Visit</a>
              <button class="btn btn-warning btn-sm" onclick='editItem(<?= json_encode($s) ?>, "school")'><i class="bi bi-pencil"></i></button>
              <form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                <input type="hidden" name="type" value="school">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $s['schoolId'] ?>">
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Scholarships -->
    <div class="col-md-6">
      <h4>Scholarships <button class="btn btn-sm btn-success" onclick="openModal('scholarship')"><i class="bi bi-plus-circle"></i></button></h4>
      <div class="row">
        <?php foreach ($scholarships as $s): ?>
        <div class="col-12 mb-3">
          <div class="card">
            <img src="../uploads/<?= htmlspecialchars($s['image']) ?>" class="card-img-top" height="150" style="object-fit:cover;">
            <div class="card-body">
              <h5><?= htmlspecialchars($s['title']) ?></h5>
              <p><strong><?= htmlspecialchars($s['university']) ?></strong></p>
              <p><?= htmlspecialchars($s['description']) ?></p>
              <a href="<?= htmlspecialchars($s['link']) ?>" target="_blank" class="btn btn-primary btn-sm">Apply</a>
              <button class="btn btn-warning btn-sm" onclick='editItem(<?= json_encode($s) ?>, "scholarship")'><i class="bi bi-pencil"></i></button>
              <form method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                <input type="hidden" name="type" value="scholarship">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $s['scholorshipId'] ?>">
                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="type" id="type">
        <input type="hidden" name="action" id="action">
        <input type="hidden" name="id" id="itemId">
        <input type="hidden" name="existing_image" id="existing_image">

        <div class="mb-3">
          <label class="form-label" id="labelTitle">Title</label>
          <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label" id="labelPlaceUniversity">Place / University</label>
          <input type="text" name="place_university" id="place_university" class="form-control">
        </div>
        <div class="mb-3 scholarship-only">
          <label class="form-label">Description</label>
          <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Link</label>
          <input type="url" name="link" id="link" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const modal = new bootstrap.Modal(document.getElementById('itemModal'));

function openModal(type) {
  document.getElementById('type').value = type;
  document.getElementById('action').value = 'add';
  document.getElementById('itemId').value = '';
  document.getElementById('existing_image').value = '';
  document.getElementById('title').value = '';
  document.getElementById('place_university').value = '';
  document.getElementById('description').value = '';
  document.getElementById('link').value = '';

  document.querySelectorAll('.scholarship-only').forEach(el => el.style.display = type === 'scholarship' ? '' : 'none');
  modal.show();
}

function editItem(data, type) {
  document.getElementById('type').value = type;
  document.getElementById('action').value = 'edit';
  document.getElementById('itemId').value = data[type === 'school' ? 'schoolId' : 'scholorshipId'];
  document.getElementById('existing_image').value = data.image;
  document.getElementById('title').value = type === 'school' ? data.schoolname : data.title;
  document.getElementById('place_university').value = type === 'school' ? data.place : data.university;
  document.getElementById('description').value = data.description ?? '';
  document.getElementById('link').value = data.link;

  document.querySelectorAll('.scholarship-only').forEach(el => el.style.display = type === 'scholarship' ? '' : 'none');
  modal.show();
}
</script>
</body>
</html>
