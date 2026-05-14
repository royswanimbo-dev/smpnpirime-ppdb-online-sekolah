<?php
// view.php - View Student Details
include 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Get student data
$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

if (!$student) {
    echo "<script>alert('Data tidak ditemukan');window.location='dashboard.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pendaftaran - PPDB SMP Negeri 1 Pirime</title>
  
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
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
      min-height: 100vh;
    }
    
    /* Navbar */
    .navbar-custom {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
      padding: 15px 0;
    }
    
    .navbar-brand-custom {
      font-weight: 800;
      color: white !important;
      font-size: 1.2rem;
    }
    
    /* Cards */
    .detail-card {
      border-radius: 20px;
      box-shadow: 0 15px 45px rgba(0,0,0,0.1);
      border: none;
      overflow: hidden;
      margin-bottom: 25px;
    }
    
    .detail-card .card-header {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #4facfe 100%);
      color: white;
      padding: 25px;
      position: relative;
      overflow: hidden;
    }
    
    .detail-card .card-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 150px;
      height: 150px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    /* Section Title */
    .section-title-custom {
      font-weight: 700;
      color: #1e3c72;
      border-bottom: 3px solid #4facfe;
      padding-bottom: 10px;
      margin-bottom: 20px;
      display: inline-block;
      font-size: 1.1rem;
    }
    
    .section-icon-box {
      width: 45px;
      height: 45px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      margin-right: 12px;
      vertical-align: middle;
    }
    
    /* Doc Preview */
    .doc-preview {
      border: 2px solid #e8e8e8;
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .doc-preview:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .doc-preview img {
      max-width: 100%;
      max-height: 180px;
      border-radius: 10px;
      object-fit: cover;
    }
    
    /* Status Badge */
    .status-badge {
      padding: 10px 22px;
      border-radius: 25px;
      font-weight: 700;
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .badge-pending { 
      background: linear-gradient(135deg, #ffc107 0%, #ffdb4d 100%); 
      color: #000;
      box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
    }
    .badge-verified { 
      background: linear-gradient(135deg, #28a745 0%, #48c764 100%); 
      color: #fff;
      box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
    }
    .badge-rejected { 
      background: linear-gradient(135deg, #dc3545 0%, #e4606d 100%); 
      color: #fff;
      box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
    }
    
    /* Data Labels */
    .data-label {
      font-weight: 600;
      color: #1e3c72;
      font-size: 0.85rem;
      margin-bottom: 4px;
    }
    
    .data-value {
      color: #495057;
      font-size: 1rem;
    }
    
    /* Buttons */
    .btn-action-custom {
      padding: 14px 30px;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1rem;
      transition: all 0.3s ease;
    }
    
    .btn-back {
      background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
      border: none;
      color: white;
      padding: 14px 30px;
      border-radius: 14px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-back:hover {
      transform: translateY(-3px);
      color: white;
    }
    
    /* Page Title */
    .page-title {
      color: #1e3c72;
      font-weight: 800;
      margin-bottom: 25px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand-custom" href="dashboard.php">
        <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
      </a>
    </div>
  </nav>
  
  <div class="container py-4">
    <h2 class="page-title">Detail <span>Pendaftaran</span></h2>
    
    <div class="row">
      <div class="col-lg-8 mx-auto">
        
        <!-- Student Details Card -->
        <div class="card detail-card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h4 class="mb-2"><i class="fas fa-user-graduate me-2"></i>Data Pribadi Siswa</h4>
                <small class="opacity-75">Nomor Registrasi: <strong><?= $student['registration_number']; ?></strong></small>
              </div>
              <span class="status-badge badge-<?= $student['status']; ?>">
                <i class="fas fa-<?= $student['status'] == 'verified' ? 'check' : ($student['status'] == 'rejected' ? 'times' : 'clock'); ?> me-1"></i>
                <?= ucfirst($student['status']); ?>
              </span>
            </div>
          </div>
          <div class="card-body p-4">
            
            <!-- Data Pribadi Section -->
            <h5 class="section-title-custom">
              <span class="section-icon-box"><i class="fas fa-user"></i></span>
              Informasi Pribadi
            </h5>
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="data-label">Nama Lengkap</div>
                <div class="data-value fw-bold"><?= $student['full_name']; ?></div>
              </div>
              <div class="col-md-3 mb-3">
                <div class="data-label">Tempat Lahir</div>
                <div class="data-value"><?= $student['birth_place'] ?: '-'; ?></div>
              </div>
              <div class="col-md-3 mb-3">
                <div class="data-label">Tanggal Lahir</div>
                <div class="data-value"><?= $student['birth_date'] ? date('d/m/Y', strtotime($student['birth_date'])) : '-'; ?></div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="data-label">Jenis Kelamin</div>
                <div class="data-value"><?= $student['gender'] == 'L' ? '👦 Laki-laki' : '👧 Perempuan'; ?></div>
              </div>
              <div class="col-md-8 mb-3">
                <div class="data-label">Alamat Lengkap</div>
                <div class="data-value"><?= $student['address'] ?: '-'; ?></div>
              </div>
            </div>
            
            <!-- Data Wali Section -->
            <h5 class="section-title-custom mt-4">
              <span class="section-icon-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"><i class="fas fa-users"></i></span>
              Data Orang Tua / Wali
            </h5>
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="data-label">Nama Orang Tua / Wali</div>
                <div class="data-value"><?= $student['guardian_name'] ?: '-'; ?></div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="data-label">Sekolah Asal</div>
                <div class="data-value"><?= $student['previous_school']; ?></div>
              </div>
            </div>
            
            <!-- Data Kontak Section -->
            <h5 class="section-title-custom mt-4">
              <span class="section-icon-box" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"><i class="fas fa-phone"></i></span>
              Data Kontak
            </h5>
            <div class="row">
              <div class="col-md-4 mb-3">
                <div class="data-label">No. HP</div>
                <div class="data-value"><?= $student['phone'] ?: '-'; ?></div>
              </div>
              <div class="col-md-8 mb-3">
                <div class="data-label">Email</div>
                <div class="data-value"><?= $student['email'] ?: '-'; ?></div>
              </div>
            </div>
            
            <!-- Tanggal Pendaftaran -->
            <h5 class="section-title-custom mt-4">
              <span class="section-icon-box" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);"><i class="fas fa-calendar"></i></span>
              Informasi Pendaftaran
            </h5>
            <div class="row">
              <div class="col-md-6">
                <div class="data-label">Tanggal Pendaftaran</div>
                <div class="data-value"><i class="fas fa-clock me-1"></i> <?= date('d F Y, H:i', strtotime($student['created_at'])); ?> WIT</div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Documents Card -->
        <div class="card detail-card">
          <div class="card-header">
            <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Dokumen Pendukung</h5>
          </div>
          <div class="card-body p-4">
            <div class="row">
              <!-- Photo -->
              <div class="col-md-4 mb-3">
                <label class="data-label d-block mb-2">Foto Siswa</label>
                <div class="doc-preview">
                  <?php if ($student['dok_photo']) { ?>
                    <img src="uploads/<?= $student['dok_photo']; ?>" alt="Foto">
                    <div class="mt-3">
                      <a href="uploads/<?= $student['dok_photo']; ?>" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-expand me-1"></i> Lihat Full
                      </a>
                    </div>
                  <?php } else { ?>
                    <i class="fas fa-user fa-4x text-muted"></i>
                    <p class="text-muted mb-0 mt-2">Tidak ada</p>
                  <?php } ?>
                </div>
              </div>
              
              <!-- KK -->
              <div class="col-md-4 mb-3">
                <label class="data-label d-block mb-2">Kartu Keluarga</label>
                <div class="doc-preview">
                  <?php if ($student['dok_kk']) { ?>
                    <img src="uploads/<?= $student['dok_kk']; ?>" alt="KK">
                    <div class="mt-3">
                      <a href="uploads/<?= $student['dok_kk']; ?>" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-expand me-1"></i> Lihat Full
                      </a>
                    </div>
                  <?php } else { ?>
                    <i class="fas fa-file fa-4x text-muted"></i>
                    <p class="text-muted mb-0 mt-2">Tidak ada</p>
                  <?php } ?>
                </div>
              </div>
              
              <!-- Akte -->
              <div class="col-md-4 mb-3">
                <label class="data-label d-block mb-2">Akte Kelahiran</label>
                <div class="doc-preview">
                  <?php if ($student['dok_akte']) { ?>
                    <img src="uploads/<?= $student['dok_akte']; ?>" alt="Akte">
                    <div class="mt-3">
                      <a href="uploads/<?= $student['dok_akte']; ?>" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-expand me-1"></i> Lihat Full
                      </a>
                    </div>
                  <?php } else { ?>
                    <i class="fas fa-file fa-4x text-muted"></i>
                    <p class="text-muted mb-0 mt-2">Tidak ada</p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Action Buttons -->
        <?php if ($student['status'] == 'pending') { ?>
        <div class="card detail-card">
          <div class="card-header" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Aksi Verifikasi</h5>
          </div>
          <div class="card-body text-center p-4">
            <p class="mb-4">Pilih tindakan untuk pendaftar ini:</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
              <a href="verify.php?id=<?= $student['id']; ?>&action=verify" class="btn btn-success btn-action-custom" onclick="return confirm('Terima pendaftar ini?')">
                <i class="fas fa-check-circle me-2"></i>Terima Pendaftaran
              </a>
              <a href="verify.php?id=<?= $student['id']; ?>&action=reject" class="btn btn-danger btn-action-custom" onclick="return confirm('Tolak pendaftar ini?')">
                <i class="fas fa-times-circle me-2"></i>Tolak Pendaftaran
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
        
        <!-- Back Button -->
        <div class="text-center mt-4">
          <a href="dashboard.php" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
