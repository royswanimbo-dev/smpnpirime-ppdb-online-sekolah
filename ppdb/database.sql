-- Database PPDB SMP Negeri 1 Pirime
-- Run this SQL in phpMyAdmin

CREATE DATABASE IF NOT EXISTS ppdb_pirime CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ppdb_pirime;

-- Table for admins
CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  name VARCHAR(150) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for students
CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  registration_number VARCHAR(30) NOT NULL UNIQUE,
  full_name VARCHAR(200) NOT NULL,
  birth_place VARCHAR(100),
  birth_date DATE,
  gender ENUM('L','P') DEFAULT 'L',
  address TEXT,
  phone VARCHAR(30),
  email VARCHAR(100),
  guardian_name VARCHAR(200),
  previous_school VARCHAR(200),
  dok_kk VARCHAR(255),
  dok_akte VARCHAR(255),
  dok_photo VARCHAR(255),
  status ENUM('pending','verified','rejected') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin
-- Password: admin123 (hashed with bcrypt)
INSERT INTO admins (username, password_hash, name)
VALUES ('admin', '$2y$10$7Qq2B8H1vT6w64U2.zvF0ehWbTkDLFUnfDqKJDdleqlTnyr4VRDCi', 'Administrator');
