<?php
// verify.php - Verify or Reject Student Registration
include 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Get parameters
$id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? '';

// Validate action
if (!in_array($action, ['verify', 'reject'])) {
    echo "<script>alert('Aksi tidak valid');window.location='dashboard.php';</script>";
    exit;
}

// Set status
$status = ($action === 'verify') ? 'verified' : 'rejected';

// Update student status
$stmt = $conn->prepare("UPDATE students SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    $message = ($action === 'verify') ? 'Pendaftaran telah diverifikasi!' : 'Pendaftaran telah ditolak!';
    echo "<script>alert('$message');window.location='dashboard.php';</script>";
} else {
    echo "<script>alert('Gagal mengubah status');window.location='dashboard.php';</script>";
}

$stmt->close();
$conn->close();
?>
