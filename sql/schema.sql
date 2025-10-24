CREATE DATABASE IF NOT EXISTS gestion_ecole;
USE gestion_ecole;

-- Table des utilisateurs pour login
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin','prof','etudiant') DEFAULT 'admin'
);

-- Table Etudiant
CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sexe ENUM('M','F') NOT NULL,
    filiere VARCHAR(100) NOT NULL
);

-- Table Prof
CREATE TABLE prof (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    langues VARCHAR(255) NOT NULL,
    specialite VARCHAR(255) NOT NULL
);

-- Admin par défaut
-- IMPORTANT : en vrai utilise password_hash() côté PHP.
INSERT INTO users (email, password_hash, role)
VALUES ('admin@ecole.ma', 'admin123', 'admin');
