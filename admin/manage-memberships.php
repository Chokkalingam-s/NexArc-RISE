<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header("Location: index.php");
  exit;
}
require_once __DIR__ . '/../config/db.php';

// fetch counts
$counts = [
  'Waiting' => 0,
  'Accepted' => 0,
  'Terminated' => 0,
  'Cancelled' => 0
];
$stmt = $conn->query("SELECT membershipStatus, COUNT(*) as cnt FROM Membership GROUP BY membershipStatus");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) $counts[$r['membershipStatus']] = (int)$r['cnt'];

// default view = Waiting
$view = 'Waiting';

// fetch all memberships (we'll filter in front-end)
$stmt = $conn->query("SELECT * FROM Membership ORDER BY membershipId DESC");
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Manage Memberships - NexArc RISE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{
      --glass: rgba(255,255,255,0.6);
      --muted: #6b7280;
      --accent: #0d6efd;
    }
    body { background: linear-gradient(180deg, #eef2ff 0%, #ffffff 100%); font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    .top-stats .card { background: rgba(255,255,255,0.7); border: 0; }
    .status-badge { font-size:0.78rem; padding: 0.25rem 0.6rem; border-radius: 999px; }
    .member-card { background: rgba(255,255,255,0.75); border: 1px solid rgba(15,23,42,0.03); transition: transform .12s, box-shadow .12s; }
    .member-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(15,23,42,0.06); }
    .member-thumb { width:56px; height:56px; object-fit:cover; border-radius:8px; background:#f3f4f6; }
    .filter-btn.active { box-shadow: none; border: 1px solid rgba(13,110,253,0.15); background: rgba(13,110,253,0.07); }
    @media (max-width: 767px) {
      .desktop-only { display:none; }
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="../admin">NexArc - RISE Admin</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="manage-projects.php">Projects</a></li>
      <li class="nav-item"><a class="nav-link active" href="manage-memberships.php">Memberships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-schools.php">Schools & Scholarships</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-guide.php">Guide</a></li>
      <li class="nav-item"><a class="nav-link" href="manage-forms.php">Forms</a></li>
      <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container py-4">
  <!-- header stats -->
  <div class="row g-3 mb-4 top-stats">
    <div class="col-12 col-md-4">
      <div class="card p-3">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small text-muted">Active Members</div>
            <h4 id="count-accepted"><?= (int)$counts['Accepted'] ?></h4>
          </div>
          <div class="text-end">
            <div class="small text-muted">Waiting</div>
            <h5 id="count-waiting"><?= (int)$counts['Waiting'] ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card p-3">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <div class="small text-muted">Past Members</div>
            <h4 id="count-past"><?= (int)$counts['Terminated'] + (int)$counts['Cancelled'] ?></h4>
          </div>
          <div class="text-end">
            <div class="small text-muted">Cancelled</div>
            <h5 id="count-cancelled"><?= (int)$counts['Cancelled'] ?></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 text-md-end">
      <div class="d-flex gap-2 justify-content-md-end">
        <button class="btn btn-outline-primary filter-btn active" data-filter="Waiting">Waiting <span class="badge bg-primary ms-2" id="badge-waiting"><?= (int)$counts['Waiting'] ?></span></button>
        <button class="btn btn-outline-success filter-btn" data-filter="Accepted">Accepted <span class="badge bg-success ms-2" id="badge-accepted"><?= (int)$counts['Accepted'] ?></span></button>
        <button class="btn btn-outline-danger filter-btn" data-filter="Terminated">Terminated <span class="badge bg-danger ms-2" id="badge-terminated"><?= (int)$counts['Terminated'] ?></span></button>
        <button class="btn btn-outline-secondary filter-btn" data-filter="Cancelled">Cancelled <span class="badge bg-secondary ms-2" id="badge-cancelled"><?= (int)$counts['Cancelled'] ?></span></button>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <!-- left: list -->
    <div class="col-12 col-lg-5">
      <div class="card p-3">
        <div id="membersList" class="d-flex flex-column gap-2">
          <!-- member items will be rendered here -->
          <?php foreach ($members as $m): 
            // prepare safe variables
            $status = $m['membershipStatus'] ?? 'Waiting';
            $thumb = !empty($m['identity_image']) ? '../'.ltrim($m['identity_image'],'/') : 'https://via.placeholder.com/80?text=ID';
          ?>
            <div class="member-card p-2 d-flex gap-3 align-items-start" data-id="<?= (int)$m['membershipId'] ?>" data-status="<?= htmlspecialchars($status) ?>">
              <img src="<?= htmlspecialchars($thumb) ?>" class="member-thumb" alt="id">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fw-semibold"><?= htmlspecialchars($m['name']) ?></div>
                    <div class="small text-muted"><?= htmlspecialchars($m['degree'] . ' • ' . $m['country']) ?></div>
                  </div>
                  <div class="text-end">
                    <div>
                      <span class="status-badge <?=
                        $status === 'Accepted' ? 'bg-success text-white' :
                        ($status === 'Waiting' ? 'bg-warning text-dark' :
                        ($status === 'Terminated' ? 'bg-danger text-white' : 'bg-secondary text-white'))
                      ?>"><?= htmlspecialchars($status) ?></span>
                    </div>
                    <div class="small text-muted mt-1"><?= htmlspecialchars($m['date_of_request']) ?></div>
                  </div>
                </div>
                <div class="mt-2 d-flex gap-2">
                  <button class="btn btn-sm btn-outline-primary view-btn">View</button>
                  <!-- actions quick: Accept / Cancel / Terminate -->
                  <?php if ($status === 'Waiting'): ?>
                    <button class="btn btn-sm btn-success action-btn" data-action="accept">Accept</button>
                    <button class="btn btn-sm btn-secondary action-btn" data-action="cancel">Cancel</button>
                  <?php elseif ($status === 'Accepted'): ?>
                    <button class="btn btn-sm btn-danger action-btn" data-action="terminate">Terminate</button>
                  <?php elseif ($status === 'Cancelled'): ?>
                    <button class="btn btn-sm btn-success action-btn" data-action="accept">Accept</button>
                  <?php else: ?>
                    <button class="btn btn-sm btn-outline-secondary action-btn" data-action="restore">Restore</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- right: details (desktop) -->
    <div class="col-12 col-lg-7 desktop-only">
      <div id="detailsCard" class="card p-3" style="min-height:340px;">
        <div class="text-muted">Select a member to view details</div>
      </div>
    </div>
  </div>
</div>

<!-- Member details modal (also used for accept position prompt) -->
<div class="modal fade" id="memberModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="memberModalTitle" class="modal-title">Member Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="memberModalBody">
        <!-- filled dynamically -->
      </div>
      <div class="modal-footer">
        <div id="memberModalActions" class="me-auto"></div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Accept modal (asks for optional position) -->
<div class="modal fade" id="acceptModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="acceptForm" class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Approve Member</h5></div>
      <div class="modal-body">
        <input type="hidden" name="memberId" id="acceptMemberId">
        <div class="mb-2">
          <label class="form-label">Position (optional)</label>
          <input name="position" id="acceptPosition" class="form-control" placeholder="e.g. Research Associate">
        </div>
        <div class="form-text">Approving will set this member's status to <strong>Accepted</strong> and record approval date.</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Approve</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script>
const membersList = document.getElementById('membersList');
const detailsCard = document.getElementById('detailsCard');
const memberModal = new bootstrap.Modal(document.getElementById('memberModal'));
const acceptModal = new bootstrap.Modal(document.getElementById('acceptModal'));
const acceptForm = document.getElementById('acceptForm');

function formatMemberFull(m){
  // returns HTML for full details (safe-ish; server returns data too)
  return `
    <div class="row g-2">
      <div class="col-md-4 text-center">
        <img src="${m.identity_image ? m.identity_image : 'https://via.placeholder.com/150?text=ID'}" class="img-fluid rounded mb-2" style="max-height:180px;">
        <div class="small text-muted">Requested: ${m.date_of_request}</div>
        <div class="small text-muted">Status: ${m.membershipStatus}</div>
      </div>
      <div class="col-md-8">
        <h4 class="mb-1">${m.name}</h4>
        <p class="mb-1"><strong>Email:</strong> ${m.email}</p>
        <p class="mb-1"><strong>Phone:</strong> ${m.phone_no}</p>
        <p class="mb-1"><strong>Country:</strong> ${m.country} &nbsp; <strong>Age:</strong> ${m.age} &nbsp; <strong>Sex:</strong> ${m.sex}</p>
        <p class="mb-1"><strong>Degree:</strong> ${m.degree} &nbsp; <strong>Designation:</strong> ${m.designation}</p>
        <p class="mb-1"><strong>How heard:</strong> ${m.howdoyougettoknow}</p>
        <p class="mb-1"><strong>Position:</strong> ${m.position ?? '-'}</p>
        <hr>
        <p><strong>Address:</strong><br>${m.address}</p>
        <p><strong>Notes:</strong><br>${m.note}</p>
      </div>
    </div>
  `;
}

// helper: fetch JSON
async function postAction(data){
  const res = await fetch('membership_action.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });
  return res.json();
}

// Click handlers (delegation)
membersList.addEventListener('click', async (e) => {
  const card = e.target.closest('.member-card');
  if (!card) return;
  const id = card.dataset.id;
  const actionBtn = e.target.closest('.action-btn');
  const viewBtn = e.target.closest('.view-btn');

  // View full details
  if(viewBtn){
    // request full member details from server
    const resp = await fetch(`membership_action.php?action=get&id=${id}`);
    const m = await resp.json();
    document.getElementById('memberModalTitle').textContent = m.name;
    document.getElementById('memberModalBody').innerHTML = formatMemberFull(m);
    // dynamic action buttons in modal footer
    const footer = document.getElementById('memberModalActions');
    footer.innerHTML = ''; // reset
    if(m.membershipStatus === 'Waiting'){
      footer.innerHTML = `<button class="btn btn-success" id="modalAccept">Accept</button>
                          <button class="btn btn-secondary" id="modalCancel">Cancel</button>`;
    } else if(m.membershipStatus === 'Accepted'){
      footer.innerHTML = `<button class="btn btn-danger" id="modalTerminate">Terminate</button>`;
    } else if(m.membershipStatus === 'Cancelled'){
      footer.innerHTML = `<button class="btn btn-success" id="modalAccept">Accept</button>
                          <button class="btn btn-outline-secondary" id="modalRestore">Restore</button>`;
    } else if(m.membershipStatus === 'Terminated'){
      footer.innerHTML = `<button class="btn btn-outline-secondary" id="modalRestore">Restore</button>`;
    }
    memberModal.show();

    // attach modal action listeners
    setTimeout(()=> {
      document.getElementById('modalAccept')?.addEventListener('click', () => {
        document.getElementById('acceptMemberId').value = id;
        acceptModal.show();
      });
      document.getElementById('modalCancel')?.addEventListener('click', async ()=>{
        if(!confirm('Cancel this waiting member?')) return;
        const result = await postAction({ action:'cancel', id: id });
        if(result.success) applyUpdate(result);
        memberModal.hide();
      });
      document.getElementById('modalTerminate')?.addEventListener('click', async ()=>{
        if(!confirm('Terminate this accepted member?')) return;
        const result = await postAction({ action:'terminate', id: id });
        if(result.success) applyUpdate(result);
        memberModal.hide();
      });
      document.getElementById('modalRestore')?.addEventListener('click', async ()=>{
        if(!confirm('Restore member to Waiting?')) return;
        const result = await postAction({ action:'restore', id: id });
        if(result.success) applyUpdate(result);
        memberModal.hide();
      });
    }, 50);

    return;
  }

  // Quick action buttons in list
  if(actionBtn){
    const action = actionBtn.dataset.action;
    if(action === 'accept'){
      document.getElementById('acceptMemberId').value = id;
      acceptModal.show();
    } else if(action === 'cancel'){
      if(!confirm('Cancel this waiting member?')) return;
      const result = await postAction({ action:'cancel', id: id });
      if(result.success) applyUpdate(result);
    } else if(action === 'terminate'){
      if(!confirm('Terminate this accepted member?')) return;
      const result = await postAction({ action:'terminate', id: id });
      if(result.success) applyUpdate(result);
    } else if(action === 'restore'){
      if(!confirm('Restore member to Waiting?')) return;
      const result = await postAction({ action:'restore', id: id });
      if(result.success) applyUpdate(result);
    }
  }
});

// Accept form submit
acceptForm.addEventListener('submit', async (evt)=>{
  evt.preventDefault();
  const id = document.getElementById('acceptMemberId').value;
  const position = document.getElementById('acceptPosition').value;
  acceptModal.hide();
  const result = await postAction({ action:'accept', id: id, position: position });
  if(result.success) applyUpdate(result);
});

// Filter buttons
document.querySelectorAll('.filter-btn').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    const f = btn.dataset.filter;
    filterList(f);
  });
});

function filterList(status){
  document.querySelectorAll('.member-card').forEach(card=>{
    if(status === 'All' || card.dataset.status === status) card.style.display = '';
    else card.style.display = 'none';
  });
  // update top counts visually
}

// applyUpdate: update DOM after server action
function applyUpdate(result){
  // result should contain member object and counts
  const m = result.member;
  // find existing card (if any)
  const existing = document.querySelector(`.member-card[data-id='${m.membershipId}']`);
  if(existing){
    // update dataset/status and badge text
    existing.dataset.status = m.membershipStatus;
    existing.querySelector('.status-badge').textContent = m.membershipStatus;
    // update small fields
    existing.querySelector('.small.text-muted')?.textContent = m.degree + ' • ' + m.country;
    // update action buttons area (simpler: replace innerHTML of action area)
    // rebuild the action buttons area:
    const actionsDiv = existing.querySelector('div.d-flex.mt-2');
    if(actionsDiv){
      let html = `<button class="btn btn-sm btn-outline-primary view-btn">View</button> `;
      if(m.membershipStatus === 'Waiting'){
        html += `<button class="btn btn-sm btn-success action-btn" data-action="accept">Accept</button>
                 <button class="btn btn-sm btn-secondary action-btn" data-action="cancel">Cancel</button>`;
      } else if(m.membershipStatus === 'Accepted'){
        html += `<button class="btn btn-sm btn-danger action-btn" data-action="terminate">Terminate</button>`;
      } else if(m.membershipStatus === 'Cancelled'){
        html += `<button class="btn btn-sm btn-success action-btn" data-action="accept">Accept</button>`;
      } else {
        html += `<button class="btn btn-sm btn-outline-secondary action-btn" data-action="restore">Restore</button>`;
      }
      actionsDiv.innerHTML = html;
    }
    // if the current filter hides this member, hide it
    const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'Waiting';
    if(activeFilter !== 'All' && m.membershipStatus !== activeFilter) existing.style.display = 'none'; else existing.style.display = '';
  } else {
    // new card (possible when restoring to Waiting from Terminated): create element and insert at top
    const container = document.getElementById('membersList');
    const div = document.createElement('div');
    div.className = 'member-card p-2 d-flex gap-3 align-items-start';
    div.dataset.id = m.membershipId;
    div.dataset.status = m.membershipStatus;
    const img = m.identity_image ? m.identity_image : 'https://via.placeholder.com/80?text=ID';
    div.innerHTML = `
      <img src="${img}" class="member-thumb" alt="id">
      <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="fw-semibold">${m.name}</div>
            <div class="small text-muted">${m.degree} • ${m.country}</div>
          </div>
          <div class="text-end">
            <div><span class="status-badge ${m.membershipStatus === 'Accepted' ? 'bg-success text-white' : (m.membershipStatus === 'Waiting' ? 'bg-warning text-dark' : (m.membershipStatus === 'Terminated' ? 'bg-danger text-white' : 'bg-secondary text-white'))}">${m.membershipStatus}</span></div>
            <div class="small text-muted mt-1">${m.date_of_request}</div>
          </div>
        </div>
        <div class="mt-2 d-flex gap-2">
          <button class="btn btn-sm btn-outline-primary view-btn">View</button>
        </div>
      </div>`;
    container.prepend(div);
  }

  // update top counters
  document.getElementById('badge-accepted').textContent = result.counts.Accepted;
  document.getElementById('badge-waiting').textContent = result.counts.Waiting;
  document.getElementById('badge-terminated').textContent = result.counts.Terminated;
  document.getElementById('badge-cancelled').textContent = result.counts.Cancelled;
  document.getElementById('count-accepted').textContent = result.counts.Accepted;
  document.getElementById('count-waiting').textContent = result.counts.Waiting;
  document.getElementById('count-past').textContent = result.counts.Terminated + result.counts.Cancelled;
  document.getElementById('count-cancelled').textContent = result.counts.Cancelled;
}
</script>
</body>
</html>
