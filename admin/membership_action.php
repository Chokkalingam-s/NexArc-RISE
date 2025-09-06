<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  http_response_code(403);
  echo json_encode(['success'=>false,'msg'=>'Not logged in']);
  exit;
}
require_once __DIR__ . '/../config/db.php';
header('Content-Type: application/json');

// Helper: return updated counts
function getCounts($conn){
  $stmt = $conn->query("SELECT membershipStatus, COUNT(*) as cnt FROM Membership GROUP BY membershipStatus");
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $counts = ['Waiting'=>0,'Accepted'=>0,'Terminated'=>0,'Cancelled'=>0];
  foreach($rows as $r) $counts[$r['membershipStatus']] = (int)$r['cnt'];
  return $counts;
}

// GET single member (for "view")
if(isset($_GET['action']) && $_GET['action'] === 'get' && isset($_GET['id'])){
  $id = intval($_GET['id']);
  $stmt = $conn->prepare("SELECT * FROM Membership WHERE membershipId = ?");
  $stmt->execute([$id]);
  $m = $stmt->fetch(PDO::FETCH_ASSOC);
  // convert identity_image path to usable url
  if($m && !empty($m['identity_image']) && file_exists(__DIR__ . '/../' . ltrim($m['identity_image'],'/'))){
    $m['identity_image'] = '../' . ltrim($m['identity_image'],'/');
  } else {
    $m['identity_image'] = '';
  }
  echo json_encode($m ?: []);
  exit;
}

// For POST actions
$input = json_decode(file_get_contents('php://input'), true);
if(!$input) {
  echo json_encode(['success'=>false,'msg'=>'Invalid request']);
  exit;
}

$action = $input['action'] ?? '';
$id = intval($input['id'] ?? 0);

// guard
if(!$id || !$action){
  echo json_encode(['success'=>false,'msg'=>'Missing parameters']);
  exit;
}

try {
  if($action === 'accept'){
    // set membershipStatus = 'Accepted', date_of_approved = today, optional position
    $position = trim($input['position'] ?? '');
    $today = date('Y-m-d');
    $stmt = $conn->prepare("UPDATE Membership SET membershipStatus='Accepted', date_of_approved=?, position=? WHERE membershipId=?");
    $stmt->execute([$today, $position ?: null, $id]);
  } elseif($action === 'terminate'){
    // only if currently accepted
    $today = date('Y-m-d');
    $stmt = $conn->prepare("UPDATE Membership SET membershipStatus='Terminated', date_of_termination=? WHERE membershipId=?");
    $stmt->execute([$today, $id]);
  } elseif($action === 'cancel'){
    // only if waiting
    $stmt = $conn->prepare("UPDATE Membership SET membershipStatus='Cancelled' WHERE membershipId=?");
    $stmt->execute([$id]);
  } elseif($action === 'restore'){
    // restore to Waiting
    $stmt = $conn->prepare("UPDATE Membership SET membershipStatus='Waiting', date_of_termination=NULL, date_of_approved=NULL, position=NULL WHERE membershipId=?");
    $stmt->execute([$id]);
  } else {
    echo json_encode(['success'=>false,'msg'=>'Unknown action']);
    exit;
  }

  // fetch updated member
  $stmt = $conn->prepare("SELECT * FROM Membership WHERE membershipId = ?");
  $stmt->execute([$id]);
  $m = $stmt->fetch(PDO::FETCH_ASSOC);
  if($m && !empty($m['identity_image']) && file_exists(__DIR__ . '/../' . ltrim($m['identity_image'],'/'))){
    $m['identity_image'] = '../' . ltrim($m['identity_image'],'/');
  } else {
    $m['identity_image'] = '';
  }

  $counts = getCounts($conn);
  echo json_encode(['success'=>true, 'member'=>$m, 'counts'=>$counts]);
  exit;

} catch (Exception $e){
  echo json_encode(['success'=>false,'msg'=>$e->getMessage()]);
  exit;
}
