<?php
// dashboard.php - Admin Dashboard for PPDB
include 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Get statistics
$total = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];
$pending = $conn->query("SELECT COUNT(*) as total FROM students WHERE status = 'pending'")->fetch_assoc()['total'];
$verified = $conn->query("SELECT COUNT(*) as total FROM students WHERE status = 'verified'")->fetch_assoc()['total'];
$rejected = $conn->query("SELECT COUNT(*) as total FROM students WHERE status = 'rejected'")->fetch_assoc()['total'];

// Get all students
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - PPDB SMP Negeri 1 Pirime</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: #f0f2f5;
    }
    
    /* Sidebar Styles */
    .sidebar {
      min-height: 100vh;
      background: linear-gradient(180deg, #1e3c72 0%, #2a5298 50%, #1e3c72 100%);
      box-shadow: 4px 0 20px rgba(0,0,0,0.15);
      position: fixed;
      width: 260px;
      z-index: 100;
    }
    
    .sidebar-brand {
      padding: 25px 20px;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .sidebar-brand img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 3px solid white;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    
    .sidebar-brand h5 {
      color: white;
      margin-top: 15px;
      font-weight: 700;
    }
    
    .sidebar-brand p {
      color: rgba(255,255,255,0.7);
      font-size: 0.85rem;
    }
    
    .sidebar-menu {
      padding: 20px 0;
    }
    
    .sidebar a {
      color: rgba(255,255,255,0.8);
      text-decoration: none;
      padding: 15px 25px;
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
      font-weight: 500;
    }
    
    .sidebar a:hover, .sidebar a.active {
      background: rgba(255,255,255,0.15);
      border-left-color: #38ef7d;
      color: white;
    }
    
    .sidebar a i {
      margin-right: 12px;
      width: 20px;
      text-align: center;
    }
    
    /* Main Content */
    .main-content {
      margin-left: 260px;
      min-height: 100vh;
    }
    
    /* Top Navbar */
    .top-navbar {
      background: white;
      box-shadow: 0 2px 15px rgba(0,0,0,0.08);
      padding: 15px 30px;
      position: sticky;
      top: 0;
      z-index: 50;
    }
    
    .navbar-brand-custom {
      font-weight: 800;
      color: #1e3c72;
      font-size: 1.3rem;
    }
    
    /* Stat Cards */
    .stat-card {
      border-radius: 20px;
      padding: 28px;
      color: white;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 100%;
      height: 100%;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    .stat-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    
    .stat-card h2 {
      font-weight: 800;
      font-size: 2.5rem;
      margin: 10px 0;
    }
    
    .stat-card .stat-icon {
      width: 60px;
      height: 60px;
      background: rgba(255,255,255,0.2);
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }
    
    .bg-gradient-total { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .bg-gradient-pending { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
    .bg-gradient-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
    .bg-gradient-rejected { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%); }
    
    /* Table Card */
    .table-card {
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.1);
      border: none;
      overflow: hidden;
    }
    
    .table-card .card-header {
      background: white;
      border-bottom: 2px solid #f0f0f0;
      padding: 20px 25px;
    }
    
    .table-card .card-header h5 {
      color: #1e3c72;
      font-weight: 700;
      margin: 0;
    }
    
    .table thead th {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white;
      border: none;
      padding: 18px;
      font-weight: 600;
    }
    
    .table tbody tr {
      transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
      background: linear-gradient(135deg, #f8f9ff 0%, #e8f4ff 100%);
    }
    
    .table tbody td {
      padding: 15px 18px;
      vertical-align: middle;
    }
    
    .badge-status {
      padding: 8px 15px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.8rem;
    }
    
    .badge-pending { 
      background: linear-gradient(135deg, #ffc107 0%, #ffdb4d 100%); 
      color: #000;
    }
    .badge-verified { 
      background: linear-gradient(135deg, #28a745 0%, #48c764 100%); 
      color: #fff;
    }
    .badge-rejected { 
      background: linear-gradient(135deg, #dc3545 0%, #e4606d 100%); 
      color: #fff;
    }
    
    .btn-action {
      padding: 8px 14px;
      border-radius: 10px;
      font-size: 0.85rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-action:hover {
      transform: scale(1.05);
    }
    
    /* Page Title */
    .page-title {
      color: #1e3c72;
      font-weight: 800;
      margin-bottom: 30px;
    }
    
    .page-title span {
      color: #4facfe;
    }
    
    /* Footer */
    .main-footer {
      background: white;
      padding: 20px;
      text-align: center;
      color: #6c757d;
      border-top: 1px solid #f0f0f0;
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="row g-0">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 sidebar p-0">
        <div class="sidebar-brand">
          <img src="../images/logo/logo.jpg" alt="Logo">
          <h5>Admin PPDB</h5>
          <p><?= $_SESSION['admin_name']; ?></p>
        </div>
        
        <div class="sidebar-menu">
          <a href="dashboard.php" class="active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
          <a href="#">
            <i class="fas fa-users"></i> Data Pendaftaran
          </a>
          <a href="#">
            <i class="fas fa-file-alt"></i> Laporan
          </a>
          <a href="#">
            <i class="fas fa-cog"></i> Pengaturan
          </a>
          <a href="logout.php" class="mt-auto">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar d-flex justify-content-between align-items-center">
          <a class="navbar-brand-custom" href="#">
            <i class="fas fa-school me-2"></i> SMP Negeri 1 Pirime
          </a>
          <div class="d-flex align-items-center">
            <div class="me-3 text-end">
              <small class="text-muted d-block">Welcome back,</small>
              <strong><?= $_SESSION['admin_name']; ?></strong>
            </div>
            <img src="../images/logo/logo.jpg" alt="Admin" width="45" height="45" class="rounded-circle">
            <a href="logout.php" class="btn btn-outline-danger btn-sm ms-3">
              <i class="fas fa-sign-out-alt me-1"></i> Keluar
            </a>
          </div>
        </nav>
        
        <!-- Content -->
        <div class="p-4">
          <h2 class="page-title">Dashboard <span>PPDB</span></h2>
          
          <!-- Statistics Cards -->
          <div class="row mb-4">
            <div class="col-md-3 mb-3">
              <div class="stat-card bg-gradient-total">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <p class="mb-1 opacity-90">Total Pendaftaran</p>
                    <h2><?= $total; ?></h2>
                    <small class="opacity-75">Siswa</small>
                  </div>
                  <div class="stat-icon"><i class="fas fa-users"></i></div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 mb-3">
              <div class="stat-card bg-gradient-pending">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <p class="mb-1 opacity-90">Menunggu Verifikasi</p>
                    <h2><?= $pending; ?></h2>
                    <small class="opacity-75">Siswa</small>
                  </div>
                  <div class="stat-icon"><i class="fas fa-clock"></i></div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 mb-3">
              <div class="stat-card bg-gradient-success">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <p class="mb-1 opacity-90">Diterima</p>
                    <h2><?= $verified; ?></h2>
                    <small class="opacity-75">Siswa</small>
                  </div>
                  <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 mb-3">
              <div class="stat-card bg-gradient-rejected">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <p class="mb-1 opacity-90">Ditolak</p>
                    <h2><?= $rejected; ?></h2>
                    <small class="opacity-75">Siswa</small>
                  </div>
                  <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Table Card -->
          <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5><i class="fas fa-list me-2"></i> Data Pendaftaran Siswa Baru</h5>
              <button class="btn btn-success btn-sm">
                <i class="fas fa-download me-1"></i> Export
              </button>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th width="60">No</th>
                      <th>No. Registrasi</th>
                      <th>Nama Lengkap</th>
                      <th>Sekolah Asal</th>
                      <th>Tgl Daftar</th>
                      <th>Status</th>
                      <th width="180">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        $statusClass = $row['status'];
                        $tgl = date('d/m/Y', strtotime($row['created_at']));
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><strong><?= $row['registration_number']; ?></strong></td>
                      <td><?= $row['full_name']; ?></td>
                      <td><?= $row['previous_school']; ?></td>
                      <td><?= $tgl; ?></td>
                      <td>
                        <span class="badge badge-status badge-<?= $statusClass; ?>">
                          <?= ucfirst($row['status']); ?>
                        </span>
                      </td>
                      <td>
                        <a href="view.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-action" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="verify.php?id=<?= $row['id']; ?>&action=verify" class="btn btn-success btn-action" onclick="return confirm('Terima pendaftar ini?')" title="Terima">
                          <i class="fas fa-check"></i>
                        </a>
                        <a href="verify.php?id=<?= $row['id']; ?>&action=reject" class="btn btn-danger btn-action" onclick="return confirm('Tolak pendaftar ini?')" title="Tolak">
                          <i class="fas fa-times"></i>
                        </a>
                      </td>
                    </tr>
                    <?php 
                      }
                    } else {
                    ?>
                    <tr>
                      <td colspan="7" class="text-center py-5">
                        <i class="fas fa-inbox fa-4x text-muted mb-3 d-block"></i>
                        <h5 class="text-muted">Belum ada data pendaftar</h5>
                        <p class="text-muted mb-0">Data pendaftar akan muncul di sini setelah ada yang mendaftar</p>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Footer -->
        <div class="main-footer">
          <p class="mb-0">&copy; 2025 SMP Negeri 1 Pirime. All rights reserved. | Dibangunkan oleh Kanius Wanimbo</p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
