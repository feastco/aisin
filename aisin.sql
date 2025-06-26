-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 01:12 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aisin`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'coba 1', 'maulanaikhwan223@gmail.com', 'q2113idhsjdf');

-- --------------------------------------------------------

--
-- Table structure for table `master_fg`
--

CREATE TABLE `master_fg` (
  `id` int NOT NULL,
  `no_fg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nm_fg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_fg`
--

INSERT INTO `master_fg` (`id`, `no_fg`, `nm_fg`) VALUES
(1, '15104-0Y010-00', 'STRAINER S/A OIL'),
(2, '17177-0Y030-00', 'GASKET, INTAKE MANIFOLD'),
(3, '123-12345', 'Test 123');

-- --------------------------------------------------------

--
-- Table structure for table `master_part`
--

CREATE TABLE `master_part` (
  `id` int NOT NULL,
  `no_part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nm_part` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `min_stock` int NOT NULL,
  `max_stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_part`
--

INSERT INTO `master_part` (`id`, `no_part`, `nm_part`, `min_stock`, `max_stock`) VALUES
(1, '12101-BZ110-00', 'PAN SUB-ASSY, OIL', 800, 1200),
(2, '12101-BZ110-00-87', 'PAN SUB-ASSY, OIL', 800, 1200),
(3, '12101-BZ140-00', 'PAN SUB-ASSY, OIL', 800, 1200),
(7, '12345', 'Test 1', 500, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `master_part_need`
--

CREATE TABLE `master_part_need` (
  `id` int NOT NULL,
  `no_fg` varchar(50) NOT NULL,
  `no_part` varchar(50) NOT NULL,
  `qty_need` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_part_need`
--

INSERT INTO `master_part_need` (`id`, `no_fg`, `no_part`, `qty_need`) VALUES
(1, '15104-0Y010-00', '12101-BZ110-00', 1),
(2, '15104-0Y010-00', '12101-BZ110-00-87', 2),
(3, '15104-0Y010-00', '12101-BZ140-00', 3),
(6, '123-12345', '12345', 10);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `id` int NOT NULL,
  `no_part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nm_part` varchar(255) NOT NULL,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`id`, `no_part`, `nm_part`, `stok`) VALUES
(1, '12101-BZ110-00', 'PAN SUB-ASSY, OIL', 1607),
(2, '12101-BZ110-00-87', 'PAN SUB-ASSY, OIL', 2014),
(3, '12101-BZ140-00', 'PAN SUB-ASSY, OIL', 1221),
(13, '12345', 'Test 1', 830);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(2, 'PGN2', 'Fisco', 'fisco', '123');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(4, 'PETUGAS - 2', 'Vasco', 'vasco', '123'),
(5, 'PETUGAS - 77', 'umar', 'PTGS77', '123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `nama` varchar(24) NOT NULL,
  `deskripsi` varchar(64) NOT NULL,
  `gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `deskripsi`, `gambar`) VALUES
(3, 'gambar 30', 'coba gambar', 'Screenshot_2024-12-14_194810.png');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int NOT NULL,
  `no_fg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty_production` int NOT NULL,
  `date_production` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `no_fg`, `qty_production`, `date_production`) VALUES
(72, '123-12345', 1, '2024-11-06'),
(73, '123-12345', 1, '2024-11-06'),
(74, '123-12345', 1, '2024-11-06'),
(84, '123-12345', 2, '2024-11-11'),
(85, '123-12345', 2, '2024-11-13'),
(86, '15104-0Y010-00', 3, '2024-11-13');

--
-- Triggers `production`
--
DELIMITER $$
CREATE TRIGGER `after_delete_production` AFTER DELETE ON `production` FOR EACH ROW BEGIN
    -- Deklarasi variabel
    DECLARE qty_production INT;
    DECLARE no_fg VARCHAR(50);  -- Menyimpan no_fg untuk referensi
    DECLARE id INT;  -- Menyimpan id untuk referensi
    DECLARE qty_need INT;  -- Kebutuhan qty_need untuk part yang terkait

    -- Ambil qty_production, no_fg, dan id dari data yang dihapus
    SET qty_production = OLD.qty_production;
    SET no_fg = OLD.no_fg;
    SET id = OLD.id;  -- Menyimpan id yang unik untuk referensi

    -- Pastikan qty_production valid
    IF qty_production IS NULL OR qty_production = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'qty_production cannot be NULL or zero';
    END IF;

    -- Mengupdate stok part di tabel `part` sesuai dengan qty_production dan qty_need
    UPDATE part p
    JOIN master_part_need mpn ON p.no_part = mpn.no_part
    SET p.stok = p.stok + (mpn.qty_need * qty_production)  -- Menambah stok berdasarkan qty_production
    WHERE mpn.no_fg = no_fg;

    -- Menghapus hanya satu detail produksi di tabel `productionDetail` terkait dengan id_production yang dihapus
    DELETE FROM productionDetail
    WHERE id_production = id  -- Hapus detail yang terkait dengan id_production yang dihapus
    LIMIT 1;  -- Batasi hanya satu baris yang dihapus

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_production` AFTER INSERT ON `production` FOR EACH ROW BEGIN
    -- Definisikan variabel yang diperlukan
    DECLARE qty_production INT;

    -- Ambil nilai qty_production dari data yang baru di-insert
    SET qty_production = NEW.qty_production;

    -- Periksa apakah qty_production tidak boleh NULL atau 0
    IF qty_production IS NULL OR qty_production = 0 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'qty_production cannot be NULL or zero';
    END IF;

    -- Masukkan data ke tabel productionDetail tanpa mengalikan qty_need dengan qty_production
    INSERT INTO productionDetail (id_production, no_fg, qty_production, no_part, nm_part, qty_need, date_production)
    SELECT 
        NEW.id,  -- Menggunakan NEW.id untuk mendapatkan id_production
        NEW.no_fg,
        qty_production,
        mpn.no_part,
        p.nm_part,
        (mpn.qty_need * qty_production),  -- qty_need dihitung berdasarkan qty_production
        NEW.date_production
    FROM 
        master_part_need AS mpn
    JOIN 
        part AS p ON mpn.no_part = p.no_part
    WHERE 
        mpn.no_fg = NEW.no_fg;

    -- Kurangi stok di tabel part sesuai kebutuhan produksi (qty_need * qty_production)
    UPDATE part p
    JOIN master_part_need mpn ON p.no_part = mpn.no_part
    SET p.stok = p.stok - (mpn.qty_need * qty_production)
    WHERE mpn.no_fg = NEW.no_fg;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_production` AFTER UPDATE ON `production` FOR EACH ROW BEGIN
    -- Deklarasi variabel
    DECLARE qty_production INT;
    DECLARE no_fg VARCHAR(50);
    DECLARE id_production INT;

    -- Ambil nilai qty_production, no_fg, dan id_production yang baru di-update
    SET qty_production = NEW.qty_production;
    SET no_fg = NEW.no_fg;
    SET id_production = NEW.id;

    -- Pastikan qty_production valid (tanpa SIGNAL jika MySQL versi lama)
    IF qty_production IS NULL OR qty_production = 0 THEN
        -- Bisa menggunakan perintah lain seperti menulis log atau memanipulasi data
        -- Misalnya, mengabaikan perubahan atau mengupdate nilai default
        SET qty_production = 1; -- Atau nilai lain yang sesuai dengan kebijakan
    END IF;

    -- Update detail produksi di tabel productionDetail
    UPDATE productionDetail pd
    JOIN master_part_need mpn ON pd.no_fg = mpn.no_fg
    SET 
        pd.qty_production = qty_production,
        pd.date_production = NEW.date_production
    WHERE pd.id_production = id_production;

    -- Update stok part di tabel part sesuai dengan qty_production yang baru
    -- Menghitung perubahan stok berdasarkan perubahan qty_production
    UPDATE part p
    JOIN master_part_need mpn ON p.no_part = mpn.no_part
    SET p.stok = p.stok + (mpn.qty_need * (OLD.qty_production - qty_production))
    WHERE mpn.no_fg = no_fg;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productiondetail`
--

CREATE TABLE `productiondetail` (
  `id` int NOT NULL,
  `id_production` int NOT NULL,
  `no_fg` varchar(50) NOT NULL,
  `qty_production` int NOT NULL,
  `no_part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nm_part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty_need` int DEFAULT NULL,
  `date_production` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productiondetail`
--

INSERT INTO `productiondetail` (`id`, `id_production`, `no_fg`, `qty_production`, `no_part`, `nm_part`, `qty_need`, `date_production`) VALUES
(45, 72, '123-12345', 1, '12345', 'Test 1', 10, '2024-11-06'),
(46, 73, '123-12345', 1, '12345', 'Test 1', 20, '2024-11-06'),
(47, 74, '123-12345', 1, '12345', 'Test 1', 10, '2024-11-06'),
(52, 84, '123-12345', 2, '12345', 'Test 1', 20, '2024-11-11'),
(53, 85, '123-12345', 2, '12345', 'Test 1', 20, '2024-11-13'),
(54, 86, '15104-0Y010-00', 3, '12101-BZ110-00', 'PAN SUB-ASSY, OIL', 3, '2024-11-13'),
(55, 86, '15104-0Y010-00', 3, '12101-BZ110-00-87', 'PAN SUB-ASSY, OIL', 6, '2024-11-13'),
(56, 86, '15104-0Y010-00', 3, '12101-BZ140-00', 'PAN SUB-ASSY, OIL', 9, '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `receiving`
--

CREATE TABLE `receiving` (
  `id` int NOT NULL,
  `no_pkb` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `received_at` date NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receiving`
--

INSERT INTO `receiving` (`id`, `no_pkb`, `received_at`, `update_at`) VALUES
(1, '01/ADM/X/2024', '2024-10-22', '2024-10-25'),
(2, '02/ADM/X/2024', '2024-10-22', '2024-10-25'),
(44, '2323223232', '2024-11-06', NULL),
(45, '12121221', '2024-11-06', NULL),
(46, '2121212', '2024-11-06', NULL),
(48, '121212121212', '2024-11-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receivingdetail`
--

CREATE TABLE `receivingdetail` (
  `id` int NOT NULL,
  `no_pkb` varchar(50) NOT NULL,
  `no_part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty_received` int NOT NULL,
  `received_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receivingdetail`
--

INSERT INTO `receivingdetail` (`id`, `no_pkb`, `no_part`, `qty_received`, `received_at`) VALUES
(1, '01/ADM/X/2024', '12101-BZ110-00', 400, '2024-10-25'),
(2, '01/ADM/X/2024', '12101-BZ110-00-87', 800, '2024-10-25'),
(3, '02/ADM/X/2024', '17120-BZ121-00', 400, '2024-10-25'),
(44, '2323223232', '12345', 200, '2024-11-06'),
(45, '12121221', '12345', 40, '2024-11-06'),
(46, '2121212', '12345', 10, '2024-11-06'),
(48, '121212121212', '12345', 20, '2024-11-11');

--
-- Triggers `receivingdetail`
--
DELIMITER $$
CREATE TRIGGER `after_delete_receiving` AFTER DELETE ON `receivingdetail` FOR EACH ROW BEGIN
UPDATE part SET stok = stok - OLD.qty_received WHERE no_part = OLD.no_part;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_receiving` AFTER INSERT ON `receivingdetail` FOR EACH ROW BEGIN
UPDATE part SET stok = stok + NEW.qty_received WHERE no_part = NEW.no_part;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_receiving` AFTER UPDATE ON `receivingdetail` FOR EACH ROW BEGIN
UPDATE part SET stok = stok - OLD.qty_received + NEW.qty_received WHERE no_part = NEW.no_part;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_fg`
--
ALTER TABLE `master_fg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finishGood` (`no_fg`);

--
-- Indexes for table `master_part`
--
ALTER TABLE `master_part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_part` (`no_part`);

--
-- Indexes for table `master_part_need`
--
ALTER TABLE `master_part_need`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_fg` (`no_fg`),
  ADD KEY `no_part` (`no_part`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productiondetail`
--
ALTER TABLE `productiondetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production` (`no_fg`),
  ADD KEY `id_production` (`id_production`);

--
-- Indexes for table `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivingdetail`
--
ALTER TABLE `receivingdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Receiving` (`no_pkb`),
  ADD KEY `no_part` (`no_part`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_fg`
--
ALTER TABLE `master_fg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_part`
--
ALTER TABLE `master_part`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_part_need`
--
ALTER TABLE `master_part_need`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `productiondetail`
--
ALTER TABLE `productiondetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `receivingdetail`
--
ALTER TABLE `receivingdetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_part_need`
--
ALTER TABLE `master_part_need`
  ADD CONSTRAINT `master_part_need_ibfk_1` FOREIGN KEY (`no_part`) REFERENCES `master_part` (`no_part`) ON DELETE CASCADE;

--
-- Constraints for table `productiondetail`
--
ALTER TABLE `productiondetail`
  ADD CONSTRAINT `productionDetail_ibfk_1` FOREIGN KEY (`id_production`) REFERENCES `production` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
