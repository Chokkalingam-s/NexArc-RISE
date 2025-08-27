<?php 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once __DIR__ . '/../config/db.php';

// Fetch all forms
$stmt = $conn->query("SELECT * FROM Form ORDER BY formId DESC");
$forms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Forms - NexArc RISE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background:linear-gradient(135deg,#f8f9fa,#e9ecef); font-family: 'Segoe UI', sans-serif; }
    .inbox-list { max-height:80vh; overflow-y:auto; border-right:1px solid #ddd; }
    .inbox-item { cursor:pointer; padding:15px; border-bottom:1px solid #eee; transition:0.2s; position:relative; background:rgba(255,255,255,0.8); }
    .inbox-item:hover { background:rgba(255,255,255,0.95); }
    .inbox-item.active { background:#f1f3f5; box-shadow:inset 3px 0 0 #0d6efd; }
    .status-dot { width:10px; height:10px; border-radius:50%; display:inline-block; margin-right:6px; }
    .Unread { background:#0d6efd; }
    .Answered { background:#198754; }
    .Read { background:#ffc107; }
    .Spam { background:#dc3545; }
    .details-container { background:rgba(255,255,255,0.9); border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1); padding:20px; margin:10px 0; }
    @media (max-width:768px){
      .col-md-8 { display:none; } /* hide fixed panel on mobile */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="../admin">NexArc - RISE Admin</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="manage-projects.php">Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-memberships.php">Memberships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link active" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid mt-3">
  <div class="row">
    <!-- Sidebar / Inbox -->
    <div class="col-md-4 inbox-list bg-white shadow-sm" id="inbox">
      <div class="p-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0">Inbox</h5>
        <div class="btn-group btn-group-sm">
          <button class="btn btn-outline-secondary filter-btn" data-filter="All">All</button>
          <button class="btn btn-outline-primary filter-btn" data-filter="Unread">Unread</button>
          <button class="btn btn-outline-warning filter-btn" data-filter="Read">Read</button>
          <button class="btn btn-outline-success filter-btn" data-filter="Answered">Answered</button>
          <button class="btn btn-outline-danger filter-btn" data-filter="Spam">Spam</button>
        </div>
      </div>
      <div id="formList">
        <?php foreach($forms as $f): ?>
          <div class="inbox-item" data-id="<?= $f['formId'] ?>" data-status="<?= $f['formStatus'] ?>">
            <div>
              <span class="status-dot <?= $f['formStatus'] ?>"></span>
              <strong><?= htmlspecialchars($f['name']) ?></strong> - <?= htmlspecialchars($f['formType']) ?>
            </div>
            <small class="text-muted"><?= htmlspecialchars($f['email']) ?></small>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Desktop fixed details -->
    <div class="col-md-8 p-4">
      <div id="formDetails" class="text-muted">Select a form to view details.</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const items = document.querySelectorAll(".inbox-item");
  const detailsPanel = document.getElementById("formDetails");
  let activeDetails = null;

  items.forEach(item => {
    item.addEventListener("click", function() {
      const id = this.dataset.id;
      const currentStatus = this.dataset.status;

      // toggle close on second click
      if(this.classList.contains("active")){
        closeDetails(this);
        return;
      }

      items.forEach(i => i.classList.remove("active"));
      this.classList.add("active");

      // Remove existing inline details (mobile)
      document.querySelectorAll(".inline-details").forEach(d => d.remove());

      fetch("view_form.php?id=" + id)
        .then(res => res.text())
        .then(html => {
          if(window.innerWidth <= 768){
            // Mobile → insert below clicked mail
            const div = document.createElement("div");
            div.className="details-container inline-details";
            div.innerHTML=html;
            this.insertAdjacentElement("afterend", div);
            activeDetails = div;
          } else {
            detailsPanel.innerHTML = '<div class="details-container">'+html+'</div>';
          }
        });

      // Mark as Read only if not Answered/Spam
      if(currentStatus !== "Answered" && currentStatus !== "Spam"){
        updateStatus(id, "Read", this);
      }
    });
  });

  // Filter
  document.querySelectorAll(".filter-btn").forEach(btn => {
    btn.addEventListener("click", function() {
      let filter = this.dataset.filter;
      items.forEach(item => {
        if (filter === "All" || item.dataset.status === filter) {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      });
    });
  });

  // ESC closes details
  document.addEventListener("keydown", function(e){
    if(e.key === "Escape"){
      items.forEach(i=>i.classList.remove("active"));
      detailsPanel.innerHTML = "Select a form to view details.";
      document.querySelectorAll(".inline-details").forEach(d => d.remove());
    }
  });
});

// Update status and UI
function updateStatus(id, status, item=null) {
  fetch("update_form_status.php", {
    method:"POST",
    headers:{ "Content-Type":"application/x-www-form-urlencoded" },
    body:"id="+id+"&status="+status
  }).then(()=> {
    const el = item || document.querySelector('.inbox-item.active');
    if(el){
      el.dataset.status = status;
      el.querySelector(".status-dot").className = "status-dot "+status;
    }
  });
}

function closeDetails(item){
  item.classList.remove("active");
  document.querySelectorAll(".inline-details").forEach(d => d.remove());
  document.getElementById("formDetails").innerHTML = "Select a form to view details.";
}
</script>
</body>
</html>
