<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - NexArc - RISE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="#">NexArc - RISE Admin</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="adminNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="manage-projects.php">Projects</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-memberships.php">Memberships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container py-4">
  <h3>Welcome, <?= $_SESSION['admin_logged_in'] ?></h3>
  <p>This is your admin dashboard.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
