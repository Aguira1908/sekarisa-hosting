-- ============================================
-- SI-PANCONG (Juarajasa.id) Database Setup
-- Oracle Database
-- ============================================
-- Jalankan script ini di SQL*Plus atau SQL Developer
-- untuk membuat seluruh struktur database.
--
-- Versi: Oracle 12c+ (menggunakan IDENTITY column)
-- ============================================

-- ============================================
-- 1. TABEL USERS
-- ============================================
CREATE TABLE users (
    id_user      NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    email        VARCHAR2(100) NOT NULL,
    nama         VARCHAR2(100) NOT NULL,
    password     VARCHAR2(100) NOT NULL,
    role         VARCHAR2(20) DEFAULT 'user'
);

-- ============================================
-- 2. TABEL PESANAN
-- ============================================
CREATE TABLE pesanan (
    id_pesanan   NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    id_user      NUMBER NOT NULL,
    nama         VARCHAR2(100),
    hp           VARCHAR2(20),
    layanan      VARCHAR2(20),
    durasi       NUMBER DEFAULT 0,
    jumlah_foto  NUMBER DEFAULT 0,
    deskripsi    VARCHAR2(1000),
    file_upload  VARCHAR2(500),
    link_drive   VARCHAR2(500),
    total        NUMBER DEFAULT 0,
    status       VARCHAR2(20) DEFAULT 'Pending',
    hasil_video  VARCHAR2(500),
    CONSTRAINT fk_pesanan_user FOREIGN KEY (id_user)
        REFERENCES users(id_user)
);

-- ============================================
-- 3. TABEL REVISI
-- ============================================
CREATE TABLE revisi (
    id_revisi      NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    id_pesanan     NUMBER NOT NULL,
    deskripsi      VARCHAR2(1000),
    link_referensi VARCHAR2(500),
    hasil_revisi   VARCHAR2(500),
    CONSTRAINT fk_revisi_pesanan FOREIGN KEY (id_pesanan)
        REFERENCES pesanan(id_pesanan)
);

-- ============================================
-- 4. TABEL NEWSLETTER
-- ============================================
CREATE TABLE newsletter (
    id_newsletter  NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    email          VARCHAR2(100) NOT NULL,
    id_user        NUMBER,
    CONSTRAINT fk_newsletter_user FOREIGN KEY (id_user)
        REFERENCES users(id_user)
);

-- ============================================
-- 5. TABEL PEMBAYARAN
-- ============================================
CREATE TABLE pembayaran (
    id_pembayaran      NUMBER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    id_pesanan         NUMBER NOT NULL,
    metode             VARCHAR2(50),
    total_bayar        NUMBER DEFAULT 0,
    status_pembayaran  VARCHAR2(50) DEFAULT 'Menunggu Pembayaran',
    tanggal_bayar      DATE,
    CONSTRAINT fk_pembayaran_pesanan FOREIGN KEY (id_pesanan)
        REFERENCES pesanan(id_pesanan)
);

-- ============================================
-- 6. INSERT ADMIN USER
-- ============================================
-- GANTI email dan password sesuai kebutuhan
INSERT INTO users (email, nama, password, role)
VALUES ('admin@juarajasa.id', 'Admin', 'admin123', 'admin');

COMMIT;
