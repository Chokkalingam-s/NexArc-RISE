<?php
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE Form SET formStatus=? WHERE formId=?");
    $stmt->execute([$status, $id]);
    echo "success";
}
?>
