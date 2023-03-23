/* Note:
-- DROP webspp DB IF Exist
--
*/
DROP DATABASE IF EXISTS webspp;
CREATE DATABASE IF NOT EXISTS webspp;
USE webspp;



/* Note:
-- Table Admin
--
*/
CREATE TABLE admin (
    id_admin int(11) NOT NULL AUTO_INCREMENT,
    nama_admin varchar(50) NOT NULL,
    user_admin varchar(50) NOT NULL,
    pass_admin varchar(50) NOT NULL,
    PRIMARY KEY(id_admin)
);

INSERT INTO admin (id_admin, nama_admin, user_admin, pass_admin) VALUES
    (1, 'Widi Ar', 'widi', 'widi'),
    (2, 'Admin', 'admin', 'admin');




/* Note:
-- Table Angkatan
--
*/
CREATE TABLE angkatan (
    id_angkatan int(11) NOT NULL AUTO_INCREMENT,
    nama_angkatan varchar(50) NOT NULL,
    biaya varchar(50) NOT NULL,
    PRIMARY KEY(id_angkatan)
);

INSERT INTO angkatan (id_angkatan, nama_angkatan, biaya) VALUES
    (1, '01', '20000');




/* Note:
-- Table Kelas
--
*/
CREATE TABLE kelas (
    id_kelas int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_kelas varchar(50) NOT NULL
);

INSERT INTO kelas (id_kelas, nama_kelas) VALUES
    (1, '2B');




/* Note:
-- Table Pembayaran 
--
*/
CREATE TABLE pembayaran (
    idspp int(11) NOT NULL AUTO_INCREMENT,
    id_siswa int(11) DEFAULT NULL,
    jatuhtempo varchar(50) NOT NULL,
    bulan varchar(50) NOT NULL,
    nobayar varchar(50) NOT NULL,
    tglbayar varchar(50) DEFAULT NULL,
    jumlah varchar(50) NOT NULL,
    ket varchar(50) DEFAULT NULL,
    id_admin int(11) NOT NULL,
    PRIMARY KEY(idspp)
);

INSERT INTO pembayaran (idspp, id_siswa, jatuhtempo, bulan, nobayar, tglbayar, jumlah, ket, id_admin) VALUES
    (1236, 35, '2024-01-26', 'Januari  2024', '', NULL, '20000', NULL, 0),
    (1237, 35, '2024-02-26', 'Februari  2024', '', NULL, '20000', NULL, 0),
    (1238, 35, '2024-03-26', 'Maret  2024', '', NULL, '20000', NULL, 0),
    (1239, 35, '2024-04-26', 'April  2024', '', NULL, '20000', NULL, 0),
    (1240, 35, '2024-05-26', 'Mei  2024', '', NULL, '20000', NULL, 0),
    (1241, 35, '2024-06-26', 'Juni  2024', '', NULL, '20000', NULL, 0),
    (1242, 35, '2024-07-26', 'Juli  2024', '', NULL, '20000', NULL, 0),
    (1243, 35, '2024-08-26', 'Agustus  2024', '', NULL, '20000', NULL, 0),
    (1244, 35, '2024-09-26', 'September  2024', '', NULL, '20000', NULL, 0),
    (1245, 35, '2024-10-26', 'Oktober  2024', '', NULL, '20000', NULL, 0),
    (1246, 35, '2024-11-26', 'November  2024', '', NULL, '20000', NULL, 0),
    (1247, 35, '2024-12-26', 'Desember  2024', '', NULL, '20000', NULL, 0);



/* Note:
-- Table Siswa
--
*/
CREATE TABLE siswa (
    id_siswa int(11) NOT NULL AUTO_INCREMENT,
    nis varchar(50) NOT NULL,
    nama varchar(50) NOT NULL,
    tempat_lahir varchar(50) NOT NULL,
    tanggal_lahir date DEFAULT NULL,
    gender varchar(5) NOT NULL,
    agama varchar(12) NOT NULL,
    pendidikan_sebelum varchar(5) NOT NULL,
    nama_ayah varchar(50) NOT NULL,
    nama_ibu varchar(50) NOT NULL,
    nama_wali varchar(50) NOT NULL,
    pekerjaan_ayah varchar(50) NOT NULL,
    pekerjaan_ibu varchar(50) NOT NULL,
    pekerjaan_wali varchar(50) NOT NULL,
    id_angkatan int(11) NOT NULL,
    id_tahun int(11) NOT NULL,
    id_kelas int(11) NOT NULL,
    alamat text NOT NULL,
    PRIMARY KEY(id_siswa)
);

INSERT INTO siswa (id_siswa, nis, nama, tempat_lahir, tanggal_lahir, gender, agama, pendidikan_sebelum, nama_ayah, nama_ibu, nama_wali, pekerjaan_ayah, pekerjaan_ibu, pekerjaan_wali, id_angkatan, id_tahun, id_kelas, alamat) VALUES
    (11, '01', 'ADAD TSAQIB ELAFFAN', '', '0000-00-00', 'Jenis', '', '', '', '', '', '', '', '', 1, 1, 1, 'Jln'),
    (12, '02', 'ADELIA UFAIRAH ATMARINI', '', '0000-00-00', 'Jenis', '', '', '', '', '', '', '', '', 1, 1, 1, ''),
    (14, '03', 'AHMAD AL FARIZI', '', '0000-00-00', 'Jenis', '', '', '', '', '', '', '', '', 1, 1, 1, '');





/* Note:
-- Table Tahun
--
*/
CREATE TABLE tahun (
    id_tahun int(11) NOT NULL AUTO_INCREMENT,
    tahun_ajaran varchar(50) NOT NULL,
    PRIMARY KEY(id_tahun)
);

INSERT INTO tahun (id_tahun, tahun_ajaran) VALUES
    (1, '2022-2023'),
    (2, '2023-2024');





