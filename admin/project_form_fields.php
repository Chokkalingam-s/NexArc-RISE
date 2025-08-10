<?php
// project_form_fields.php
require_once __DIR__ . '/../config/db.php';

$editing = isset($_GET['edit']) && $_GET['edit'] == '1';
$data = [
    'pId'=>'', 'title'=>'', 'image'=>'', 'colloborator'=>'', 'description'=>'',
    'participant'=>'', 'year_of_start'=>'', 'year_of_end'=>'', 'status'=>'Ongoing',
    'paper_title'=>'', 'authors'=>'', 'details'=>'', 'typeOfPublish'=>'', 'nameOfPublish'=>'', 'link'=>''
];

if ($editing) {
    $id = intval($_GET['id'] ?? 0);
    if ($id > 0) {
        $stmt = $conn->prepare("SELECT * FROM Project WHERE pId = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) $data = array_merge($data, $row);
    }
}
?>

<input type="hidden" name="<?= $editing ? 'pId' : '' ?>" value="<?= $editing ? (int)$data['pId'] : '' ?>">

<div class="row g-2">
  <div class="col-12">
    <label class="form-label">Title <span class="text-danger">*</span></label>
    <input required name="title" class="form-control" value="<?= htmlspecialchars($data['title']) ?>">
  </div>

  <div class="col-12 col-md-6">
    <label class="form-label">Image (cover)</label>
    <input type="file" accept="image/*" name="image" class="form-control">
    <?php if (!empty($data['image']) && $editing): ?>
      <?php $imageURL = '../' . ltrim($data['image'], '/'); ?>
<small class="text-muted">Current: <a href="<?= htmlspecialchars($imageURL) ?>" target="_blank">view</a></small>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="removeImage" name="remove_image" value="1">
        <label class="form-check-label" for="removeImage">Remove existing image</label>
      </div>
    <?php endif; ?>
  </div>

  <div class="col-12 col-md-6">
    <label class="form-label">Collaborator(s)</label>
    <input name="colloborator" class="form-control" value="<?= htmlspecialchars($data['colloborator']) ?>">
  </div>

  <div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" rows="4" class="form-control"><?= htmlspecialchars($data['description']) ?></textarea>
  </div>

  <div class="col-12 col-md-6">
    <label class="form-label">Participant (optional)</label>
    <input name="participant" class="form-control" value="<?= htmlspecialchars($data['participant']) ?>">
  </div>

  <div class="col-6 col-md-3">
    <label class="form-label">Year of Start</label>
    <input name="year_of_start" type="number" min="1900" max="2100" class="form-control" value="<?= htmlspecialchars($data['year_of_start']) ?>">
  </div>

  <div class="col-6 col-md-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
      <option value="Ongoing" <?= $data['status']==='Ongoing' ? 'selected':'' ?>>Ongoing</option>
      <option value="Completed" <?= $data['status']==='Completed' ? 'selected':'' ?>>Completed</option>
    </select>
  </div>
</div>

<!-- Paper details: toggled when status == Completed -->
<div id="paperDetailsWrapper" style="margin-top:16px; display: <?= $data['status']==='Completed' ? 'block' : 'none' ?>;">
  <hr>
  <h6>Paper / Publication Details (only for Completed)</h6>
  <div class="row g-2">
    <div class="col-12">
      <label class="form-label">Paper Title</label>
      <input name="paper_title" class="form-control" value="<?= htmlspecialchars($data['paper_title']) ?>">
    </div>

    <div class="col-12">
      <label class="form-label">Authors</label>
      <input name="authors" class="form-control" value="<?= htmlspecialchars($data['authors']) ?>">
    </div>

    <div class="col-12">
      <label class="form-label">Details</label>
      <textarea name="details" rows="3" class="form-control"><?= htmlspecialchars($data['details']) ?></textarea>
    </div>

    <div class="col-12 col-md-4">
      <label class="form-label">Type of Publish</label>
      <select name="typeOfPublish" class="form-select">
        <option value="">-- Select --</option>
        <option value="Journal" <?= $data['typeOfPublish']==='Journal' ? 'selected':'' ?>>Journal</option>
        <option value="Conference" <?= $data['typeOfPublish']==='Conference' ? 'selected':'' ?>>Conference</option>
      </select>
    </div>

    <div class="col-12 col-md-4">
      <label class="form-label">Journal / Conference Name</label>
      <input name="nameOfPublish" class="form-control" value="<?= htmlspecialchars($data['nameOfPublish']) ?>">
    </div>

    <div class="col-12 col-md-4">
      <label class="form-label">Paper Link</label>
      <input name="link" type="url" class="form-control" value="<?= htmlspecialchars($data['link']) ?>">
    </div>

    <div class="col-6 col-md-3">
      <label class="form-label">Year of End</label>
      <input name="year_of_end" type="number" min="1900" max="2100" class="form-control" value="<?= htmlspecialchars($data['year_of_end']) ?>">
    </div>
  </div>
</div>

<script>
// toggle paper details when status changes (for the included form)
(function(){
  var wrapper = document.getElementById('paperDetailsWrapper');
  var statusSelect = document.querySelector('select[name="status"]');
  if (statusSelect) {
    statusSelect.addEventListener('change', function(){
      if (this.value === 'Completed') wrapper.style.display = 'block';
      else wrapper.style.display = 'none';
    });
  }
})();
</script>
