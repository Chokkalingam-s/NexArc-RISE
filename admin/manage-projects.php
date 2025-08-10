<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php'; // provides $conn (PDO)

// Status filter (GET)
$statusFilter = isset($_GET['status']) && in_array($_GET['status'], ['Ongoing', 'Completed']) ? $_GET['status'] : '';

// Fetch projects
try {
    if ($statusFilter) {
        $stmt = $conn->prepare("SELECT * FROM Project WHERE status = ? ORDER BY year_of_start DESC, title ASC");
        $stmt->execute([$statusFilter]);
    } else {
        $stmt = $conn->query("SELECT * FROM Project ORDER BY status ASC, year_of_start DESC, title ASC");
    }
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("DB Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Projects - NexArc RISE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .card-img-top{ object-fit:cover; height:180px; }
    .project-card { min-height: 380px; display:flex; flex-direction:column; }
    .project-body { flex:1 1 auto; }
    @media (max-width:576px){ .card-img-top{ height:140px; } }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="../admin">NexArc - RISE Admin</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="adminNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link active" href="manage-projects.php">Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-memberships.php">Memberships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container py-4">
  <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-3">
    <h4 class="mb-0">Manage Projects</h4>
    <div class="d-flex gap-2 w-100 w-sm-auto">
      <form method="get" class="d-flex gap-2">
        <select name="status" class="form-select" onchange="this.form.submit()">
          <option value="">All Status</option>
          <option value="Ongoing" <?= $statusFilter === 'Ongoing' ? 'selected' : '' ?>>Ongoing</option>
          <option value="Completed" <?= $statusFilter === 'Completed' ? 'selected' : '' ?>>Completed</option>
        </select>
      </form>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">
        <i class="bi bi-plus-circle"></i> Add New Project
      </button>
    </div>
  </div>

  <div class="row g-3">
    <?php if (count($projects) > 0): ?>
      <?php foreach ($projects as $proj): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card project-card shadow-sm">
     <?php
$imagePath = __DIR__ . '/../' . ltrim($proj['image'], '/'); // absolute path check
$imageURL = '../' . ltrim($proj['image'], '/'); // web URL

if (!empty($proj['image']) && file_exists($imagePath)): ?>
    <img src="<?= htmlspecialchars($imageURL) ?>" class="card-img-top" alt="<?= htmlspecialchars($proj['title']) ?>">
<?php else: ?>

              <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                <i class="bi bi-image" style="font-size:2rem;color:#888;"></i>
              </div>
            <?php endif; ?>
            <div class="card-body project-body">
              <h5 class="card-title"><?= htmlspecialchars($proj['title']) ?></h5>
              <p class="mb-1"><small class="text-muted">Start: <?= htmlspecialchars($proj['year_of_start'] ?: '—') ?> • Status: <strong><?= htmlspecialchars($proj['status']) ?></strong></small></p>
              <p class="card-text"><?= nl2br(htmlspecialchars(strlen($proj['description'])>200 ? substr($proj['description'],0,200).'...' : $proj['description'])) ?></p>
            </div>
            <div class="card-footer d-flex gap-2 flex-wrap">
              <button class="btn btn-sm btn-outline-primary" 
                      data-bs-toggle="modal" 
                      data-bs-target="#editProjectModal"
                      data-id="<?= (int)$proj['pId'] ?>">
                <i class="bi bi-pencil-square"></i> Edit
              </button>

              <?php if ($proj['status'] === 'Ongoing'): ?>
                <button class="btn btn-sm btn-success" 
                        data-bs-toggle="modal" 
                        data-bs-target="#completeProjectModal"
                        data-id="<?= (int)$proj['pId'] ?>">
                  <i class="bi bi-check-circle"></i> Mark Completed
                </button>
              <?php else: ?>
                <a href="<?= htmlspecialchars($proj['link'] ?: '#') ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                  <i class="bi bi-link-45deg"></i> Paper Link
                </a>
              <?php endif; ?>

              <form method="post" action="delete_project.php" class="d-inline" onsubmit="return confirm('Delete this project permanently?');">
                <input type="hidden" name="pId" value="<?= (int)$proj['pId'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <p class="text-muted">No projects found.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- ADD PROJECT MODAL -->
<div class="modal fade" id="addProjectModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="save_project.php" method="post" enctype="multipart/form-data" id="addProjectForm">
        <div class="modal-header">
          <h5 class="modal-title">Add New Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <?php include 'project_form_fields.php'; // renders form fields (no existing data) ?>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Project</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDIT MODAL (content loaded via fetch) -->
<div class="modal fade" id="editProjectModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="update_project.php" method="post" enctype="multipart/form-data" id="editProjectForm">
        <div class="modal-header">
          <h5 class="modal-title">Edit Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="editProjectFields">
          <!-- loaded via ajax -->
          <div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update Project</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- COMPLETE PROJECT MODAL -->
<div class="modal fade" id="completeProjectModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="complete_project.php" method="post" id="completeProjectForm">
        <div class="modal-header">
          <h5 class="modal-title">Complete Project</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="completeProjectFields">
          <!-- loaded via ajax -->
          <div class="text-center py-4"><div class="spinner-border text-primary" role="status"></div></div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Mark as Completed</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  // load edit modal content
  var editModal = document.getElementById('editProjectModal');
  editModal.addEventListener('show.bs.modal', function (ev) {
    var button = ev.relatedTarget;
    var id = button.getAttribute('data-id');
    fetch('project_form_fields.php?edit=1&id=' + encodeURIComponent(id))
      .then(r => r.text())
      .then(html => document.getElementById('editProjectFields').innerHTML = html)
      .catch(()=> document.getElementById('editProjectFields').innerHTML = '<p class="text-danger">Failed to load</p>');
  });

  // load complete modal content
  var compModal = document.getElementById('completeProjectModal');
  compModal.addEventListener('show.bs.modal', function (ev) {
    var button = ev.relatedTarget;
    var id = button.getAttribute('data-id');
    fetch('complete_form_fields.php?id=' + encodeURIComponent(id))
      .then(r => r.text())
      .then(html => document.getElementById('completeProjectFields').innerHTML = html)
      .catch(()=> document.getElementById('completeProjectFields').innerHTML = '<p class="text-danger">Failed to load</p>');
  });

  // Toggle extra paper fields on status change in the add form
  var addForm = document.getElementById('addProjectForm');
  if (addForm) {
    addForm.querySelectorAll('[name="status"]').forEach(function(sel){
      sel.addEventListener('change', function(){
        var val = this.value;
        var paperWrap = document.getElementById('paperDetailsWrapper');
        if (paperWrap) paperWrap.style.display = (val === 'Completed') ? 'block' : 'none';
      });
    });
  }
});
</script>
</body>
</html>
