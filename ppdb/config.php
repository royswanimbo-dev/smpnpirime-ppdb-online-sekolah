<?php
// config.php - Database Configuration for PPDB SMP Negeri 1 Pirime
session_start();

// Database configuration
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ppdb_pirime";

// Create database connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");

// Define base URL
define('BASE_URL', 'http://localhost/ppdb/');

// Define upload directory
define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Create uploads directory if not exists
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}
?>
