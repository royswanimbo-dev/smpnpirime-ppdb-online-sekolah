<?php
// submit_register.php - Handle registration form submission
include 'config.php';

// Function to upload file
function uploadFile($file, $prefix = '') {
    global $conn;
    
    if ($file['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        
        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        
        if (!in_array($ext, $allowed)) {
            return null;
        }
        
        $newName = $prefix . time() . '_' . rand(1000, 9999) . '.' . $ext;
        $uploadPath = UPLOAD_DIR . $newName;
        
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return $newName;
        }
    }
    return null;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Sanitize input
    $reg_number = "REG" . date("YmdHis");
    $full_name = trim($_POST['full_name']);
    $birth_place = trim($_POST['birth_place']);
    $birth_date = $_POST['birth_date'] ?? null;
    $gender = $_POST['gender'] ?? 'L';
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $guardian_name = trim($_POST['guardian_name']);
    $previous_school = trim($_POST['previous_school']);
    
    // Upload files
    $foto = uploadFile($_FILES['dok_photo'], 'foto_');
    $kk = uploadFile($_FILES['dok_kk'], 'kk_');
    $akte = uploadFile($_FILES['dok_akte'], 'akte_');
    
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO students (
        registration_number, full_name, birth_place, birth_date, gender, 
        address, phone, email, guardian_name, previous_school, 
        dok_photo, dok_kk, dok_akte, status
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
    
    $stmt->bind_param(
        "ssssssssssssss",
        $reg_number, $full_name, $birth_place, $birth_date, $gender,
        $address, $phone, $email, $guardian_name, $previous_school,
        $foto, $kk, $akte
    );
    
    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Pendaftaran Berhasil - PPDB SMPN 1 Pirime</title>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
          <style>
            body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
            .success-card { background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); padding: 40px; text-align: center; max-width: 500px; }
            .success-icon { font-size: 80px; color: #38ef7d; }
            .reg-number { background: #f8f9fa; padding: 15px; border-radius: 10px; font-size: 24px; font-weight: bold; color: #1e3c72; margin: 20px 0; }
          </style>
        </head>
        <body>
          <div class='success-card'>
            <div class='success-icon'><i class='fas fa-check-circle'></i></div>
            <h3 class='mt-3'>Pendaftaran Berhasil!</h3>
            <p>Selamat! Data Anda telah berhasil terdaftar dalam sistem PPDB SMP Negeri 1 Pirime.</p>
            <div class='reg-number'>$reg_number</div>
            <p class='text-muted'>Silakan simpan nomor registrasi di atas untuk mengecek status pendaftaran.</p>
            <a href='register.php' class='btn btn-primary'>Kembali ke Form</a>
<a href='../index.php' class='btn btn-secondary'>Beranda</a>
          </div>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Error - PPDB SMPN 1 Pirime</title>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
          <style>
            body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f5576c 0%, #fa709a 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
            .error-card { background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); padding: 40px; text-align: center; max-width: 500px; }
            .error-icon { font-size: 80px; color: #dc3545; }
          </style>
        </head>
        <body>
          <div class='error-card'>
            <div class='error-icon'><i class='fas fa-times-circle'></i></div>
            <h3 class='mt-3'>Terjadi Kesalahan!</h3>
            <p>Mohon maaf, data Anda gagal disimpan. Silakan coba lagi.</p>
            <button onclick='history.back()' class='btn btn-primary'>Coba Lagi</button>
          </div>
        </body>
        </html>";
    }
    
    $stmt->close();
} else {
    // Redirect to register page if accessed directly
    header("Location: register.php");
    exit;
}

$conn->close();
?>
