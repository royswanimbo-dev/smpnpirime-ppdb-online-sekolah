<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - PPDB SMP Negeri 1 Pirime</title>
  
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
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }
    
    /* Animated Background */
    body::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(102, 126, 234, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(79, 172, 254, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(118, 75, 162, 0.2) 0%, transparent 40%);
      animation: bgAnimation 15s infinite linear;
    }
    
    @keyframes bgAnimation {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    .login-container {
      position: relative;
      z-index: 2;
    }
    
    .login-card {
      background: white;
      border-radius: 25px;
      box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
      overflow: hidden;
      max-width: 480px;
      width: 100%;
      animation: slideUp 0.6s ease-out;
    }
    
    @keyframes slideUp {
      from { 
        opacity: 0; 
        transform: translateY(40px); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0); 
      }
    }
    
    .login-header {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #4facfe 100%);
      padding: 45px 30px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .login-header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
      animation: shimmer 3s infinite linear;
    }
    
    @keyframes shimmer {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    .login-header h3 {
      font-weight: 800;
      margin-bottom: 5px;
      font-size: 1.8rem;
      position: relative;
      z-index: 2;
    }
    
    .login-header p {
      position: relative;
      z-index: 2;
      opacity: 0.9;
    }
    
    .login-body {
      padding: 45px 35px;
    }
    
    .form-label {
      font-weight: 600;
      color: #1e3c72;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }
    
    .form-control {
      border-radius: 14px;
      padding: 15px 18px;
      border: 2px solid #e8e8e8;
      transition: all 0.3s ease;
      font-size: 1rem;
    }
    
    .form-control:focus {
      border-color: #2a5298;
      box-shadow: 0 0 0 4px rgba(42, 82, 152, 0.12);
      transform: translateY(-2px);
    }
    
    .btn-login {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 14px;
      padding: 16px;
      font-weight: 700;
      font-size: 1.1rem;
      color: white;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(102, 126, 234, 0.45);
    }
    
    .input-group-text {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border: 2px solid #e8e8e8;
      border-right: none;
      border-radius: 14px 0 0 14px;
      padding: 15px;
    }
    
    .input-group .form-control {
      border-left: none;
      border-radius: 0 14px 14px 0;
    }
    
    .school-logo {
      width: 95px;
      height: 95px;
      border-radius: 50%;
      background: white;
      padding: 6px;
      margin-bottom: 18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      position: relative;
      z-index: 2;
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    
    .admin-icon {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }
    
    .admin-icon i {
      font-size: 2rem;
      color: white;
    }
    
    .divider {
      display: flex;
      align-items: center;
      margin: 25px 0;
    }
    
    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #dee2e6;
    }
    
    .divider span {
      padding: 0 15px;
      color: #6c757d;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container login-container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="login-card">
          <div class="login-header">
            <img src="../images/logo/logo.jpg" alt="Logo" class="school-logo">
            <h3>PPDB Admin</h3>
            <p>SMP Negeri 1 Pirime</p>
          </div>
          <div class="login-body">
            
            <div class="admin-icon">
              <i class="fas fa-user-shield"></i>
            </div>
            
            <?php
            $error = '';
            $success = '';
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $username = trim($_POST['username']);
              $password = $_POST['password'];
              
              if (empty($username) || empty($password)) {
                $error = '<div class="alert alert-danger border-0" style="border-radius: 12px; background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);">
                  <i class="fas fa-exclamation-circle me-2"></i>Username dan password wajib diisi!
                </div>';
              } else {
                $sql = "SELECT * FROM admins WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  if (password_verify($password, $row['password_hash'])) {
                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_username'] = $row['username'];
                    header("Location: dashboard.php");
                    exit;
                  } else {
                    $error = '<div class="alert alert-danger border-0" style="border-radius: 12px; background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);">
                      <i class="fas fa-exclamation-circle me-2"></i>Password yang Anda masukkan salah!
                    </div>';
                  }
                } else {
                  $error = '<div class="alert alert-danger border-0" style="border-radius: 12px; background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);">
                    <i class="fas fa-exclamation-circle me-2"></i>Username tidak ditemukan!
                  </div>';
                }
                
                $stmt->close();
              }
            }
            
            if ($error) {
              echo $error;
            }
            ?>
            
            <form method="POST">
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                  <input type="text" name="username" class="form-control" placeholder="Masukkan username admin" required>
                </div>
              </div>
              
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-key text-primary"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
              </div>
              
              <button type="submit" class="btn btn-login w-100">
                <i class="fas fa-sign-in-alt me-2"></i> Login
              </button>
            </form>
            
            <div class="divider">
              <span>atau</span>
            </div>
            
            <div class="text-center">
<a href="../index.php" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fas fa-home me-2"></i>Kembali ke Beranda
              </a>
            </div>
          </div>
        </div>
        
        <div class="text-center text-white mt-4">
          <p class="mb-0">&copy; 2025 SMP Negeri 1 Pirime. All rights reserved.</p>
          <small>Dibangunkan oleh Kanius Wanimbo</small>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
