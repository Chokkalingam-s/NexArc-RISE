<?php
require_once __DIR__ . '/../config/db.php';

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM Form WHERE formId=?");
$stmt->execute([$id]);
$form = $stmt->fetch(PDO::FETCH_ASSOC);

if ($form):
?>
  <h4><?= htmlspecialchars($form['name']) ?> <small class="text-muted">(<?= $form['email'] ?>)</small></h4>
  <p><strong>Country:</strong> <?= $form['country'] ?></p>
  <p><strong>DOB:</strong> <?= $form['dob'] ?> (Age: <?= $form['age'] ?>)</p>
  <p><strong>Sex:</strong> <?= $form['sex'] ?></p>
  <p><strong>Address:</strong> <?= $form['address'] ?></p>
  <p><strong>Phone:</strong> <?= $form['phone_no'] ?></p>
  <p><strong>Degree:</strong> <?= $form['degree'] ?></p>
  <p><strong>Form Type:</strong> <?= $form['formType'] ?></p>
  <p><strong>Note:</strong> <?= $form['note'] ?></p>

  <div class="btn-group mt-3">
    <button class="btn btn-sm btn-outline-primary" onclick="updateStatus(<?= $form['formId'] ?>,'Answered')">Mark as Answered</button>
    <button class="btn btn-sm btn-outline-warning" onclick="updateStatus(<?= $form['formId'] ?>,'Unread')">Mark as Unread</button>
    <button class="btn btn-sm btn-outline-danger" onclick="updateStatus(<?= $form['formId'] ?>,'Spam')">Mark as Spam</button>
  </div>
<?php endif; ?>
