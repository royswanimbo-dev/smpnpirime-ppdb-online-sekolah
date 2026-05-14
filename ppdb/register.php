<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Siswa Baru | SMP Negeri 1 Pirime</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f7fa;
    }
    
    /* Hero Section with Background */
    .hero-section {
      background: linear-gradient(rgba(30, 60, 114, 0.85), rgba(42, 82, 152, 0.85)),
                  url('../images/bg/smp.png');
      background-size: cover;
      background-position: center;
      padding: 100px 0 80px;
      position: relative;
    }
    
    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></svg>');
      background-size: 50px;
      opacity: 0.3;
    }
    
    .hero-content {
      position: relative;
      z-index: 2;
    }
    
    .school-logo-lg {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      border: 5px solid white;
      box-shadow: 0 10px 40px rgba(0,0,0,0.4);
      margin-bottom: 25px;
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    
    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      text-shadow: 3px 3px 6px rgba(0,0,0,0.4);
      letter-spacing: 2px;
    }
    
    .hero-subtitle {
      font-size: 1.4rem;
      opacity: 0.95;
    }
    
    /* Card Styles */
    .main-card {
      border: none;
      border-radius: 25px;
      box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      margin-top: -50px;
      position: relative;
      z-index: 10;
    }
    
    .card-header-custom {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #4facfe 100%);
      padding: 35px;
      position: relative;
      overflow: hidden;
    }
    
    .card-header-custom::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
      animation: shimmer 4s infinite linear;
    }
    
    @keyframes shimmer {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    /* Form Styles */
    .form-label {
      font-weight: 600;
      color: #1e3c72;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }
    
    .form-control, .form-select {
      border-radius: 14px;
      padding: 15px 18px;
      border: 2px solid #e8e8e8;
      transition: all 0.3s ease;
      font-size: 1rem;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: #2a5298;
      box-shadow: 0 0 0 4px rgba(42, 82, 152, 0.12);
      transform: translateY(-2px);
    }
    
    .form-control::placeholder {
      color: #bbb;
    }
    
    .input-group-text {
      border-radius: 14px 0 0 14px;
      border: 2px solid #e8e8e8;
      border-right: none;
      background: #fafafa;
    }
    
    /* Section Title */
    .section-title-custom {
      font-weight: 700;
      color: #1e3c72;
      border-bottom: 3px solid #4facfe;
      padding-bottom: 12px;
      margin-bottom: 25px;
      display: inline-block;
      font-size: 1.2rem;
    }
    
    .section-icon-box {
      width: 55px;
      height: 55px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.4rem;
      margin-bottom: 15px;
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }
    
    /* File Upload */
    .file-upload-wrapper {
      position: relative;
      border: 2px dashed #c8d6e5;
      border-radius: 18px;
      padding: 30px;
      text-align: center;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      transition: all 0.3s ease;
      cursor: pointer;
      height: 100%;
    }
    
    .file-upload-wrapper:hover {
      border-color: #4facfe;
      background: linear-gradient(135deg, #e8f4ff 0%, #d0e8ff 100%);
      transform: scale(1.02);
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.2);
    }
    
    .file-upload-wrapper i {
      font-size: 3rem;
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 12px;
    }
    
    .file-upload-wrapper input[type="file"] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }
    
    /* Buttons */
    .btn-submit-custom {
      background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
      border: none;
      border-radius: 18px;
      padding: 18px 55px;
      font-weight: 700;
      font-size: 1.15rem;
      transition: all 0.3s ease;
      box-shadow: 0 10px 25px rgba(56, 239, 125, 0.35);
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .btn-submit-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 35px rgba(56, 239, 125, 0.45);
    }
    
    .btn-home-custom {
      background: linear-gradient(135deg, #636e72 0%, #2d3436 100%);
      border: none;
      border-radius: 18px;
      padding: 18px 40px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .btn-home-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    
    /* Info Box */
    .info-box-modern {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 22px;
      padding: 32px;
      color: white;
      margin-bottom: 35px;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }
    
    .info-box-modern::before {
      content: '';
      position: absolute;
      top: -40px;
      right: -40px;
      width: 180px;
      height: 180px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
    }
    
    .info-box-modern::after {
      content: '';
      position: absolute;
      bottom: -30px;
      left: -30px;
      width: 120px;
      height: 120px;
      background: rgba(255,255,255,0.08);
      border-radius: 50%;
    }
    
    .info-box-modern i {
      font-size: 2.2rem;
      margin-bottom: 15px;
    }
    
    /* Required Star */
    .required {
      color: #e74c3c;
      font-weight: 700;
    }
    
    /* Footer */
    .footer-modern {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      padding: 45px 0 30px;
      margin-top: 60px;
    }
    
    /* Animation */
    .fade-in-up {
      animation: fadeInUp 0.6s ease-out;
    }
    
    @keyframes fadeInUp {
      from { 
        opacity: 0; 
        transform: translateY(30px); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0); 
      }
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <div class="hero-section">
    <div class="container text-center hero-content">
      <img src="../images/logo/logo.jpg" alt="Logo SMPN 1 Pirime" class="school-logo-lg">
      <h1 class="hero-title text-white">PPDB ONLINE</h1>
      <p class="hero-subtitle text-white">SMP Negeri 1 Pirime - Tahun Ajaran 2025/2026</p>
      <p class="text-white-50 mt-2">Mari bergabung dengan kami untuk masa depan yang cerah</p>
      <div class="mt-4">
        <a href="#form-section" class="btn btn-outline-light btn-lg rounded-pill px-4">
          <i class="fas fa-arrow-down me-2"></i>Daftar Sekarang
        </a>
      </div>
    </div>
  </div>

  <!-- Main Form Card -->
  <div class="container mb-5" id="form-section">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="main-card fade-in-up">
          <div class="card-header-custom text-white text-center">
            <h2 class="mb-2"><i class="fas fa-clipboard-list me-2"></i>Formulir Pendaftaran</h2>
            <p class="mb-0 opacity-75">Lengkapkan data diri Anda dengan benar dan lengkap</p>
          </div>
          
          <div class="card-body p-5">
            
            <!-- Info Box -->
            <div class="info-box-modern">
              <div class="row align-items-center">
                <div class="col-md-1 text-center">
                  <i class="fas fa-info-circle"></i>
                </div>
                <div class="col-md-11">
                  <h4 class="mb-2">Informasi PPDB SMP Negeri 1 Pirime</h4>
                  <p class="mb-0">Pendaftaran dibuka untuk siswa baru tahun ajaran 2025/2026. Silakan lengkapi formulir di bawah ini dengan data yang benar dan valid. Fields dengan tanda <span class="required">*</span> wajib diisi.</p>
                </div>
              </div>
            </div>
            
            <form action="submit_register.php" method="POST" enctype="multipart/form-data" class="row g-4">
              
              <!-- Data Pribadi Section -->
              <div class="col-12">
                <div class="d-flex align-items-center mb-3">
                  <div class="section-icon-box me-3">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                  <h4 class="section-title-custom mb-0">Data Pribadi Siswa</h4>
                </div>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-user text-primary"></i></span>
                  <input type="text" name="full_name" class="form-control" placeholder="Masukkan nama lengkap sesuai KK" required>
                </div>
              </div>
              
              <div class="col-md-3">
                <label class="form-label">Tempat Lahir</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-primary"></i></span>
                  <input type="text" name="birth_place" class="form-control" placeholder="Kota/Kabupaten">
                </div>
              </div>
              
              <div class="col-md-3">
                <label class="form-label">Tanggal Lahir</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-calendar-alt text-primary"></i></span>
                  <input type="date" name="birth_date" class="form-control">
                </div>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">Jenis Kelamin <span class="required">*</span></label>
                <select name="gender" class="form-select" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">👦 Laki-laki</option>
                  <option value="P">👧 Perempuan</option>
                </select>
              </div>
              
              <div class="col-md-8">
                <label class="form-label">Alamat Lengkap</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-home text-primary"></i></span>
                  <input type="text" name="address" class="form-control" placeholder="Jl. Desa, Kampung, Distrik, Kabupaten">
                </div>
              </div>
              
              <!-- Data Wali Section -->
              <div class="col-12 mt-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="section-icon-box me-3" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); box-shadow: 0 5px 15px rgba(245, 87, 108, 0.3);">
                    <i class="fas fa-users"></i>
                  </div>
                  <h4 class="section-title-custom mb-0">Data Orang Tua / Wali</h4>
                </div>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Nama Orang Tua / Wali</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-user-tie text-danger"></i></span>
                  <input type="text" name="guardian_name" class="form-control" placeholder="Nama ayah/ibu/wali">
                </div>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Sekolah Asal <span class="required">*</span></label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-school text-danger"></i></span>
                  <input type="text" name="previous_school" class="form-control" placeholder="Nama sekolah sebelumnya (SD/MI)" required>
                </div>
              </div>
              
              <!-- Data Kontak Section -->
              <div class="col-12 mt-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="section-icon-box me-3" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); box-shadow: 0 5px 15px rgba(79, 172, 254, 0.3);">
                    <i class="fas fa-phone"></i>
                  </div>
                  <h4 class="section-title-custom mb-0">Data Kontak</h4>
                </div>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">No. HP</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-phone-alt text-info"></i></span>
                  <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxxx">
                </div>
              </div>
              
              <div class="col-md-8">
                <label class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-envelope text-info"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="email@example.com">
                </div>
              </div>
              
              <!-- Upload Dokumen Section -->
              <div class="col-12 mt-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="section-icon-box me-3" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); box-shadow: 0 5px 15px rgba(250, 112, 154, 0.3);">
                    <i class="fas fa-file-upload"></i>
                  </div>
                  <h4 class="section-title-custom mb-0">Upload Dokumen</h4>
                </div>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">Foto Siswa <span class="required">*</span></label>
                <div class="file-upload-wrapper">
                  <input type="file" name="dok_photo" accept="image/*" required>
                  <i class="fas fa-camera"></i>
                  <p class="mb-1 mt-2 fw-semibold">Klik untuk upload foto</p>
                  <small class="text-muted">Format: JPG, PNG (Max 2MB)</small>
                </div>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">Kartu Keluarga</label>
                <div class="file-upload-wrapper">
                  <input type="file" name="dok_kk" accept="image/*,.pdf">
                  <i class="fas fa-id-card"></i>
                  <p class="mb-1 mt-2 fw-semibold">Klik untuk upload KK</p>
                  <small class="text-muted">Format: JPG, PNG, PDF</small>
                </div>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">Akte Kelahiran</label>
                <div class="file-upload-wrapper">
                  <input type="file" name="dok_akte" accept="image/*,.pdf">
                  <i class="fas fa-birthday-cake"></i>
                  <p class="mb-1 mt-2 fw-semibold">Klik untuk upload Akte</p>
                  <small class="text-muted">Format: JPG, PNG, PDF</small>
                </div>
              </div>
              
              <!-- Submit Button -->
              <div class="col-12 text-center mt-5">
                <button type="submit" class="btn btn-submit-custom">
                  <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                </button>
<a href="../index.php" class="btn btn-home-custom ms-3">
                  <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="footer-modern">
    <div class="container text-center text-white">
      <img src="../images/logo/logo.jpg" alt="Logo" width="70" height="70" class="rounded-circle mb-3 border-3 border-white">
      <h4 class="mb-2">SMP Negeri 1 Pirime</h4>
      <p class="mb-3">Kabupaten Lanny Jaya, Provinsi Papua Pegunungan</p>
      <div class="social-links mb-4">
        <a href="#" class="text-white me-3 fs-5"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-white me-3 fs-5"><i class="fab fa-instagram"></i></a>
        <a href="#" class="text-white me-3 fs-5"><i class="fab fa-youtube"></i></a>
        <a href="#" class="text-white fs-5"><i class="fab fa-whatsapp"></i></a>
      </div>
      <hr class="my-3" style="opacity: 0.3;">
      <p class="mb-1">&copy; 2025 SMP Negeri 1 Pirime. All rights reserved.</p>
      <small>Dibangunkan oleh Kanius Wanimbo dengan ❤️</small>
    </div>
  </footer>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
