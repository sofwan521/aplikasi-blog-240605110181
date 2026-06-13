-- ============================================================
-- DATABASE: db_blog
-- Sistem Manajemen Blog (CMS) - Laravel Version
-- ============================================================

CREATE DATABASE IF NOT EXISTS db_blog
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE db_blog;

-- Membuat tabel penulis
CREATE TABLE IF NOT EXISTS penulis (
  id INT NOT NULL AUTO_INCREMENT,
  nama_depan VARCHAR(100) NOT NULL,
  nama_belakang VARCHAR(100) NOT NULL,
  user_name VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  foto VARCHAR(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (id),
  UNIQUE KEY uq_user_name (user_name)
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Membuat tabel kategori_artikel
CREATE TABLE IF NOT EXISTS kategori_artikel (
  id INT NOT NULL AUTO_INCREMENT,
  nama_kategori VARCHAR(100) NOT NULL,
  keterangan TEXT,
  PRIMARY KEY (id),
  UNIQUE KEY uq_nama_kategori (nama_kategori)
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Membuat tabel artikel
CREATE TABLE IF NOT EXISTS artikel (
  id INT NOT NULL AUTO_INCREMENT,
  id_penulis INT NOT NULL,
  id_kategori INT NOT NULL,
  judul VARCHAR(255) NOT NULL,
  isi TEXT NOT NULL,
  gambar VARCHAR(255) NOT NULL,
  hari_tanggal VARCHAR(50) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_artikel_penulis
    FOREIGN KEY (id_penulis) REFERENCES penulis (id)
    ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_artikel_kategori
    FOREIGN KEY (id_kategori) REFERENCES kategori_artikel (id)
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- ============================================================
-- SAMPLE DATA
-- Password: admin123 (hashed dengan bcrypt)
-- ============================================================

INSERT INTO penulis (nama_depan, nama_belakang, user_name, password, foto) VALUES
('Budi', 'Irawan', 'budi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.png'),
('Wati', 'Cantik', 'wati', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'default.png');

INSERT INTO kategori_artikel (nama_kategori, keterangan) VALUES
('Air Terjun', 'Tempat wisata air terjun.'),
('Pantai', 'Tempat wisata pantai'),
('Tutorial', 'Artikel panduan langkah demi langkah'),
('Database', 'Artikel seputar pengelolaan database'),
('Web Design', 'Artikel tentang desain antarmuka web');

INSERT INTO artikel (id_penulis, id_kategori, judul, isi, gambar, hari_tanggal) VALUES
(1, 1, 'Air Terjun Coban Rondo Malang',
 'Coban Rondo adalah salah satu destinasi wisata alam paling ikonik di Malang yang selalu berhasil mencuri perhatian para pencinta keindahan alam.',
 'artikel_69f361eb448a83.97399946.jpg',
 'Kamis, 23 April 2026 | 07:48');
