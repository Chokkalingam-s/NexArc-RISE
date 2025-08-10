<?php
// complete_form_fields.php
require_once __DIR__ . '/../config/db.php';
$id = intval($_GET['id'] ?? 0);
$data = [
  'pId'=>$id, 'paper_title'=>'', 'authors'=>'', 'details'=>'',
  'typeOfPublish'=>'', 'nameOfPublish'=>'', 'link'=>'', 'year_of_end'=>''
];
if ($id > 0) {
  $stmt = $conn->prepare("SELECT paper_title, authors, details, typeOfPublish, nameOfPublish, link, year_of_end FROM Project WHERE pId = ?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row) $data = array_merge($data, $row);
}
?>
<input type="hidden" name="pId" value="<?= (int)$data['pId'] ?>">
<p class="text-muted">Provide the publication / paper details and year of completion below. These fields are required to change status to <strong>Completed</strong>.</p>

<div class="row g-2">
  <div class="col-12">
    <label class="form-label">Year of End <span class="text-danger">*</span></label>
    <input required name="year_of_end" type="number" min="1900" max="2100" class="form-control" value="<?= htmlspecialchars($data['year_of_end']) ?>">
  </div>

  <div class="col-12">
    <label class="form-label">Paper Title <span class="text-danger">*</span></label>
    <input required name="paper_title" class="form-control" value="<?= htmlspecialchars($data['paper_title']) ?>">
  </div>

  <div class="col-12">
    <label class="form-label">Authors <span class="text-danger">*</span></label>
    <input required name="authors" class="form-control" value="<?= htmlspecialchars($data['authors']) ?>">
  </div>

  <div class="col-12">
    <label class="form-label">Details <span class="text-muted">(short summary)</span></label>
    <textarea name="details" rows="3" class="form-control"><?= htmlspecialchars($data['details']) ?></textarea>
  </div>

  <div class="col-12 col-md-4">
    <label class="form-label">Type Of Publish <span class="text-danger">*</span></label>
    <select required name="typeOfPublish" class="form-select">
      <option value="">-- select --</option>
      <option value="Journal" <?= $data['typeOfPublish']==='Journal' ? 'selected':'' ?>>Journal</option>
      <option value="Conference" <?= $data['typeOfPublish']==='Conference' ? 'selected':'' ?>>Conference</option>
    </select>
  </div>

  <div class="col-12 col-md-4">
    <label class="form-label">Journal/Conference Name <span class="text-danger">*</span></label>
    <input required name="nameOfPublish" class="form-control" value="<?= htmlspecialchars($data['nameOfPublish']) ?>">
  </div>

  <div class="col-12 col-md-4">
    <label class="form-label">Paper Link</label>
    <input name="link" type="url" class="form-control" value="<?= htmlspecialchars($data['link']) ?>">
  </div>
</div>
