CREATE TABLE Pelanggann
(
    id_pelanggan INT PRIMARY KEY NOT NULL,
    nama VARCHAR(100) NOT NULL,
    pemakaian_bulan_lalu INT,
    pemakaian_bulan_ini INT NOT NULL,
    tanggal_pelaporan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB

INSERT INTO `Pelanggann` (`id_pelanggan`,`nama`,`pemakaian_bulan_lalu`,`pemakaian_bulan_ini`)
VALUES
('210402','Bagus Kencana','0','100'),
('2113101021','Nyoman','0','200')

SELECT * FROM Pelanggann

CREATE TABLE Strukk
(
    nomor INT PRIMARY KEY AUTO_INCREMENT,
    id__ INT,
    nama_ VARCHAR(100),
    bulan_lalu INT,
    bulan_ini INT,
    tanggal DATETIME
) ENGINE=InnoDB

INSERT INTO `Strukk` (`id__`,`nama_`, `bulan_lalu`,`bulan_ini`, `tanggal`)
SELECT DISTINCT id_pelanggan, nama, pemakaian_bulan_lalu, pemakaian_bulan_ini, tanggal_pelaporan
FROM Pelanggann
WHERE id_pelanggan = '2113101021'

SELECT * FROM  Strukk

UPDATE Pelanggann
SET Pelanggann.pemakaian_bulan_lalu = Pelanggann.pemakaian_bulan_ini, Pelanggann.pemakaian_bulan_ini = 400
WHERE id_pelanggan = 210402;

UPDATE Pelanggann
SET Pelanggann.pemakaian_bulan_lalu = Pelanggann.pemakaian_bulan_ini, Pelanggann.pemakaian_bulan_ini = 500, tanggal_pelaporan =  CURRENT_TIMESTAMP
WHERE id_pelanggan = 2113101021;