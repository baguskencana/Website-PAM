-- Active: 1678669866525@@127.0.0.1@3306@db pam



CREATE TABLE Coba_Pelanggan
(
    id_pelanggan INT PRIMARY KEY NOT NULL,
    nama VARCHAR(100) NOT NULL,
    pemakaian_bulan_lalu INT,
    pemakaian_bulan_ini INT NOT NULL
) ENGINE=InnoDB

INSERT INTO `Coba_Pelanggan` (`id_pelanggan`,`nama`,`pemakaian_bulan_lalu`,`pemakaian_bulan_ini`)
VALUES
('210402','Bagus Kencana','0','100'),
('2113101021','Nyoman','0','200')

UPDATE Coba_Pelanggan
SET Coba_Pelanggan.pemakaian_bulan_lalu = Coba_Pelanggan.pemakaian_bulan_ini, Coba_Pelanggan.pemakaian_bulan_ini = 400
WHERE id_pelanggan = 210402;

CREATE TABLE Coba_Tarif
(
    id_coba INT,
    KEY id(`id_coba`),
    CONSTRAINT id_ FOREIGN KEY(`id_coba`) REFERENCES `Coba_Pelanggan`(`id_pelanggan`)
    bulan_lalu INT,
    bulan_ini INT
) ENGINE=InnoDB

INSERT INTO `Coba_Tarif` (`id_coba`,`bulan_lalu`,`bulan_ini`)
SELECT id_pelanggan, pemakaian_bulan_lalu, pemakaian_bulan_ini
FROM Coba_Pelanggan



SELECT * FROM coba_tarif

SELECT Coba_Pelanggan.nama, Coba_Tarif.*
FROM Coba_Tarif
INNER JOIN Coba_Pelanggan ON Coba_Tarif.id_coba = Coba_Pelanggan.id_pelanggan

CREATE TABLE Cobaa_Pelanggan
(
    id_pelanggan INT PRIMARY KEY NOT NULL,
    nama VARCHAR(100) NOT NULL
) ENGINE=InnoDB

INSERT INTO `Cobaa_Pelanggan` (`id_pelanggan`,`nama`)
VALUES
('210402','Bagus Kencana'),
('2113101021','Nyoman')

CREATE TABLE Coba_Bulan_Lalu
(
    id_lalu INT,
    KEY id(`id_lalu`),
    CONSTRAINT id_lalu FOREIGN KEY(`id_lalu`) REFERENCES `Cobaa_Pelanggan`(`id_pelanggan`),
    bulan_lalu INT
) ENGINE=InnoDB

INSERT INTO `Coba_Bulan_Lalu` (`id_lalu`,`bulan_lalu`)
VALUES
('210402','0')

CREATE TABLE Coba_Bulan_Ini
(
    id_ini INT,
    KEY id(`id_ini`),
    CONSTRAINT id_ini FOREIGN KEY(`id_ini`) REFERENCES `Cobaa_Pelanggan`(`id_pelanggan`),
    bulan_ini INT
) ENGINE=InnoDB

INSERT INTO `Coba_Bulan_Ini` (`id_ini`,`bulan_ini`)
VALUES
('210402','200')

CREATE TABLE Struk
(
    id__ INT,
    nama_ VARCHAR(100),
    bulanlalu INT,
    bulanini INT
) ENGINE=InnoDB

INSERT INTO `Struk` (`id__`,`nama_`,`bulanlalu`,`bulanini`)
SELECT Cobaa_Pelanggan.*, Coba_Bulan_Lalu.bulan_lalu, Coba_Bulan_Ini.bulan_ini
FROM ((Cobaa_Pelanggan
INNER JOIN Coba_Bulan_Lalu ON Coba_Bulan_Lalu.id_lalu = Cobaa_Pelanggan.id_pelanggan)
INNER JOIN Coba_Bulan_Ini ON Coba_Bulan_Ini.id_ini = Cobaa_Pelanggan.id_pelanggan)

SELECT * FROM Struk

UPDATE Coba_Bulan_Lalu
SET Coba_Bulan_Lalu.bulan_lalu = Coba_Bulan_Ini.bulan_ini
WHERE id_lalu = 210402;

UPDATE Coba_Bulan_Ini
SET Coba_Bulan_Ini.bulan_ini = 400
WHERE id_ini = 210402;