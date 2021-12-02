-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2021 pada 03.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(5) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `nopol` varchar(10) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `name`, `nopol`, `sts`) VALUES
(1, 'Truk Tronton', 'A5555BC', 1),
(2, 'Truk Tronton ok', 'A2345AC', 2),
(4, 'Truk Tronton', 'A4335CC', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `kode_customer` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `name`, `alamat`, `telepon`, `email`, `kode_customer`) VALUES
(3, 'sadasdasd', 'Gedung Krakatau IT, Jl. Raya Anyer Km 3, Cilegon, Banten, 42441', '(0254) 83170', 'gugum@gmail.com', 'CS0002'),
(4, 'CS0002', 'Serang Banten', '087772227271', 'sendra@gmail.com', 'CS0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(5) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gudang`
--

INSERT INTO `gudang` (`id`, `kode`, `name`) VALUES
(1, 'A0001', 'PT Gudang AB'),
(2, 'A0002', 'PT Gudang AB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `name` text DEFAULT NULL,
  `nilai` decimal(20,2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `kode_customer` varchar(20) DEFAULT '',
  `sts` int(5) DEFAULT NULL,
  `tanggal_approval` date DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `file_bayar` varchar(200) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `bulan` varchar(5) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `transaksi` int(5) DEFAULT NULL,
  `nomor` varchar(200) DEFAULT NULL,
  `kategori` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `nilai`, `tanggal`, `file`, `invoice`, `create`, `kode_customer`, `sts`, `tanggal_approval`, `alasan`, `tanggal_bayar`, `file_bayar`, `role_id`, `bulan`, `tahun`, `qty`, `transaksi`, `nomor`, `kategori`) VALUES
(1, 'Simpan kode tersebut diatas dengan nama index.php atau nama lain terserah yang anda inginkan. kemudian jalankan menggunakan localhost maupun secara hosting. Perlu diketahui juga aplikasi ini tidak menggunakan database, yaitu hanya melakukan proses dari data-data yang diinputkan oleh pengguna.', '20000000.00', '2021-11-12', '001JTSTR-IPPINVXI2021.jpg', '001/JTS/TR-IPP/INV/XI/2021', '2021-11-30 09:37:22', 'CS0003', 3, '2021-11-30', NULL, '2021-11-30', 'BY001/JTS/TR-IPP/INV/XI/2021.png', 2, NULL, NULL, 200, 1, '001JTSTR-IPPINVXI2021', 2),
(2, NULL, NULL, NULL, NULL, '001/JTS/TR-IPP/INV/XI/2021', '2021-11-30 09:37:28', '', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '001JTSTR-IPPINVXI2021', 2),
(8, 'Ankutan', '20000000.00', '2021-12-10', '001AKJTSTR-IPPINVXII2021.png', '001/AK/JTS/TR-IPP/INV/XII/2021', '2021-12-01 10:42:50', 'CS0003', 3, '2021-12-01', NULL, '2021-12-01', 'BY001/AK/JTS/TR-IPP/INV/XII/2021.png', 3, '12', 2021, NULL, NULL, '001AKJTSTR-IPPINVXII2021', 1),
(9, 'Customer nyass', '20000000.00', '2021-12-10', '002AKJTSTR-IPPINVXII2021.png', '002/AK/JTS/TR-IPP/INV/XII/2021', '2021-12-01 10:43:49', 'CS0003', 2, '2021-12-01', NULL, NULL, NULL, 3, '12', 2021, NULL, NULL, '002AKJTSTR-IPPINVXII2021', 1),
(10, NULL, NULL, NULL, NULL, '003/AK/JTS/TR-IPP/INV/XII/2021', '2021-12-02 07:27:50', '', 0, NULL, NULL, NULL, NULL, 3, '12', 2021, NULL, NULL, '003AKJTSTR-IPPINVXII2021', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(5) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Admin Surabaya'),
(3, 'Admin Cilegon'),
(4, 'Direktur'),
(5, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rolenya`
--

CREATE TABLE `rolenya` (
  `nik` varchar(10) NOT NULL,
  `id` int(10) NOT NULL,
  `role` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rolenya`
--

INSERT INTO `rolenya` (`nik`, `id`, `role`) VALUES
('00018', 1, 1),
('00033', 2, 1),
('00036', 3, 1),
('00040', 4, 1),
('00041', 5, 1),
('00043', 6, 1),
('00047', 7, 1),
('00048', 8, 1),
('00050', 9, 1),
('00051', 10, 1),
('00052', 11, 1),
('00054', 12, 1),
('00056', 13, 1),
('00057', 14, 1),
('00058', 15, 1),
('00060', 16, 1),
('00061', 17, 1),
('00063', 18, 1),
('00064', 19, 1),
('00065', 20, 1),
('00066', 21, 1),
('00067', 22, 1),
('00068', 23, 1),
('00069', 24, 1),
('00071', 25, 1),
('00073', 26, 1),
('00074', 27, 1),
('00075', 28, 1),
('00076', 29, 1),
('00077', 30, 1),
('00078', 31, 1),
('00079', 32, 1),
('00081', 33, 1),
('00087', 34, 1),
('00088', 35, 1),
('00090', 36, 1),
('00091', 37, 1),
('00097', 38, 1),
('00099', 39, 1),
('00100', 40, 1),
('00101', 41, 1),
('00102', 42, 1),
('00103', 43, 1),
('00104', 44, 1),
('00106', 45, 1),
('00108', 46, 1),
('00110', 47, 1),
('00114', 48, 1),
('00116', 49, 1),
('00117', 50, 1),
('00119', 51, 1),
('00120', 52, 1),
('00121', 53, 1),
('00122', 54, 1),
('00125', 55, 1),
('00126', 56, 1),
('00129', 57, 1),
('00137', 58, 1),
('00138', 59, 1),
('00147', 60, 1),
('00148', 61, 1),
('00150', 62, 1),
('00151', 63, 1),
('00152', 64, 1),
('00156', 65, 1),
('00157', 66, 1),
('00160', 67, 1),
('00161', 68, 1),
('00162', 69, 1),
('00163', 70, 1),
('00164', 71, 1),
('00165', 72, 1),
('00166', 73, 1),
('00167', 74, 1),
('00168', 75, 1),
('00169', 76, 1),
('00172', 77, 1),
('00173', 78, 1),
('00174', 79, 1),
('00176', 80, 1),
('00177', 81, 1),
('00180', 82, 1),
('00182', 83, 1),
('00184', 84, 1),
('00185', 85, 1),
('00186', 86, 1),
('10001', 87, 1),
('10002', 88, 1),
('10003', 89, 1),
('10004', 90, 1),
('10005', 91, 1),
('10006', 92, 1),
('10007', 93, 1),
('10008', 94, 1),
('10009', 95, 1),
('10010', 96, 1),
('10011', 97, 1),
('10012', 98, 1),
('10013', 99, 1),
('10014', 100, 1),
('10015', 101, 1),
('10016', 102, 1),
('10017', 103, 1),
('10018', 104, 1),
('10019', 105, 1),
('10020', 106, 1),
('10021', 107, 1),
('10022', 108, 1),
('10023', 109, 1),
('10024', 110, 1),
('10025', 111, 1),
('10026', 112, 1),
('10027', 113, 1),
('10028', 114, 1),
('10029', 115, 1),
('10030', 116, 1),
('10031', 117, 1),
('10032', 118, 1),
('10034', 119, 1),
('10036', 120, 1),
('10037', 121, 1),
('10038', 122, 1),
('10039', 123, 1),
('10040', 124, 1),
('10042', 125, 1),
('10043', 126, 1),
('10044', 127, 1),
('10045', 128, 1),
('10046', 129, 1),
('10048', 130, 1),
('10049', 131, 1),
('10050', 132, 1),
('10051', 133, 1),
('10052', 134, 1),
('10053', 135, 1),
('10054', 136, 1),
('10055', 137, 1),
('10056', 138, 1),
('10057', 139, 1),
('10058', 140, 1),
('10059', 141, 1),
('10060', 142, 1),
('10065', 143, 1),
('70005', 144, 1),
('70006', 145, 1),
('70007', 146, 1),
('80024', 147, 1),
('80025', 148, 1),
('80026', 149, 1),
('80027', 150, 1),
('80036', 151, 1),
('80061', 152, 1),
('90176', 153, 1),
('90190', 154, 1),
('90220', 155, 1),
('90223', 156, 1),
('90235', 157, 1),
('90251', 158, 1),
('90262', 159, 1),
('90269', 160, 1),
('90274', 161, 1),
('90282', 162, 1),
('90284', 163, 1),
('90294', 164, 1),
('90301', 165, 1),
('90305', 166, 1),
('90318', 167, 1),
('90328', 168, 1),
('90330', 169, 1),
('90340', 170, 1),
('90343', 171, 1),
('90352', 172, 1),
('90361', 173, 1),
('90367', 174, 1),
('90381', 175, 1),
('90382', 176, 1),
('90389', 177, 1),
('90392', 178, 1),
('90393', 179, 1),
('90394', 180, 1),
('90396', 181, 1),
('90397', 182, 1),
('90398', 183, 1),
('90400', 184, 1),
('90401', 185, 1),
('90402', 186, 1),
('90404', 187, 1),
('90410', 188, 1),
('90414', 189, 1),
('90415', 190, 1),
('90417', 191, 1),
('90419', 192, 1),
('90422', 193, 1),
('90423', 194, 1),
('90424', 195, 1),
('90426', 196, 1),
('90428', 197, 1),
('90429', 198, 1),
('90430', 199, 1),
('90433', 200, 1),
('90434', 201, 1),
('90435', 202, 1),
('90436', 203, 1),
('90437', 204, 1),
('90438', 205, 1),
('90441', 206, 1),
('90443', 207, 1),
('90444', 208, 1),
('90445', 209, 1),
('90448', 210, 1),
('90453', 211, 1),
('90455', 212, 1),
('90457', 213, 1),
('90459', 214, 1),
('90461', 215, 1),
('90462', 216, 1),
('90463', 217, 1),
('90466', 218, 1),
('90467', 219, 1),
('90468', 220, 1),
('90470', 221, 1),
('90471', 222, 1),
('90472', 223, 1),
('90473', 224, 1),
('90475', 225, 1),
('90476', 226, 1),
('90477', 227, 1),
('90478', 228, 1),
('90480', 229, 1),
('90482', 230, 1),
('90483', 231, 1),
('90484', 232, 1),
('90485', 233, 1),
('90486', 234, 1),
('90487', 235, 1),
('90489', 236, 1),
('90490', 237, 1),
('90491', 238, 1),
('90492', 239, 1),
('90493', 240, 1),
('90494', 241, 1),
('90495', 242, 1),
('90496', 243, 1),
('90498', 244, 1),
('90500', 245, 1),
('90501', 246, 1),
('90502', 247, 1),
('90503', 248, 1),
('90504', 249, 1),
('90505', 250, 1),
('90506', 251, 1),
('90507', 252, 1),
('90508', 253, 1),
('90511', 254, 1),
('90512', 255, 1),
('90514', 256, 1),
('90515', 257, 1),
('90516', 258, 1),
('90517', 259, 1),
('90518', 260, 1),
('90519', 261, 1),
('90520', 262, 1),
('90531', 263, 1),
('90532', 264, 1),
('90533', 265, 1),
('90534', 266, 1),
('90535', 267, 1),
('90536', 268, 1),
('90537', 269, 1),
('90540', 270, 1),
('90541', 271, 1),
('90542', 272, 1),
('90544', 273, 1),
('90545', 274, 1),
('90546', 275, 1),
('90547', 276, 1),
('90548', 277, 1),
('90549', 278, 1),
('90550', 279, 1),
('90551', 280, 1),
('90552', 281, 1),
('90553', 282, 1),
('90555', 283, 1),
('90557', 284, 1),
('90560', 285, 1),
('90561', 286, 1),
('90562', 287, 1),
('90564', 288, 1),
('90565', 289, 1),
('90568', 290, 1),
('90569', 291, 1),
('90570', 292, 1),
('90571', 293, 1),
('90572', 294, 1),
('90574', 295, 1),
('90575', 296, 1),
('90576', 297, 1),
('90577', 298, 1),
('90578', 299, 1),
('90579', 300, 1),
('90580', 301, 1),
('90581', 302, 1),
('90582', 303, 1),
('90583', 304, 1),
('90584', 305, 1),
('90585', 306, 1),
('90586', 307, 1),
('90587', 308, 1),
('90588', 309, 1),
('90589', 310, 1),
('90590', 311, 1),
('90591', 312, 1),
('97016', 313, 1),
('97027', 314, 1),
('97034', 315, 1),
('97041', 316, 1),
('97044', 317, 1),
('97046', 318, 1),
('97049', 319, 1),
('97050', 320, 1),
('97051', 321, 1),
('97053', 322, 1),
('97055', 323, 1),
('97058', 324, 1),
('97059', 325, 1),
('97060', 326, 1),
('97061', 327, 1),
('97062', 328, 1),
('97064', 329, 1),
('97065', 330, 1),
('97067', 331, 1),
('97069', 332, 1),
('97073', 333, 1),
('97075', 334, 1),
('97076', 335, 1),
('97077', 336, 1),
('97079', 337, 1),
('97080', 338, 1),
('97081', 339, 1),
('97082', 340, 1),
('97084', 341, 1),
('97085', 342, 1),
('97087', 343, 1),
('97088', 344, 1),
('97089', 345, 1),
('97090', 346, 1),
('97091', 347, 1),
('97093', 348, 1),
('97094', 349, 1),
('97096', 350, 1),
('97097', 351, 1),
('97098', 352, 1),
('97099', 353, 1),
('97100', 354, 1),
('97101', 355, 1),
('97102', 356, 1),
('97104', 357, 1),
('97105', 358, 1),
('97107', 359, 1),
('97108', 360, 1),
('97109', 361, 1),
('97111', 362, 1),
('97112', 363, 1),
('97114', 364, 1),
('97115', 365, 1),
('97116', 366, 1),
('97120', 367, 1),
('97122', 368, 1),
('97123', 369, 1),
('97125', 370, 1),
('97128', 371, 1),
('97130', 372, 1),
('97131', 373, 1),
('97132', 374, 1),
('97133', 375, 1),
('97134', 376, 1),
('97135', 377, 1),
('97136', 378, 1),
('97137', 379, 1),
('97138', 380, 1),
('97139', 381, 1),
('97141', 382, 1),
('97142', 383, 1),
('97143', 384, 1),
('97144', 385, 1),
('97145', 386, 1),
('97146', 387, 1),
('97147', 388, 1),
('97148', 389, 1),
('97150', 390, 1),
('97151', 391, 1),
('97152', 392, 1),
('97153', 393, 1),
('97156', 394, 1),
('97158', 395, 1),
('97161', 396, 1),
('97162', 397, 1),
('97163', 398, 1),
('97164', 399, 1),
('97165', 400, 1),
('97166', 401, 1),
('97167', 402, 1),
('97168', 403, 1),
('97169', 404, 1),
('97170', 405, 1),
('97171', 406, 1),
('AS001', 407, 1),
('JL040', 408, 1),
('JLK11', 409, 1),
('JLK12', 410, 1),
('JLK13', 411, 1),
('JLK15', 412, 1),
('JLP02', 413, 1),
('JLP03', 414, 1),
('JLP04', 415, 1),
('JLP05', 416, 1),
('JLP10', 417, 1),
('JLP12', 418, 1),
('JLP13', 419, 1),
('JLP15', 420, 1),
('JLP17', 421, 1),
('JLP20', 422, 1),
('K0030', 423, 1),
('K0042', 424, 1),
('K0045', 425, 1),
('K0047', 426, 1),
('K0050', 427, 1),
('K0051', 428, 1),
('K0052', 429, 1),
('K0053', 430, 1),
('K0057', 431, 1),
('K0062', 432, 1),
('K0063', 433, 1),
('KC001', 434, 1),
('KC002', 435, 1),
('KC003', 436, 1),
('KC004', 437, 1),
('KC005', 438, 1),
('KC006', 439, 1),
('KC007', 440, 1),
('KC008', 441, 1),
('KC010', 442, 1),
('KC011', 443, 1),
('KC013', 444, 1),
('KC015', 445, 1),
('KPM001', 446, 1),
('KPM002', 447, 1),
('KPM003', 448, 1),
('KPM004', 449, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_invoice`
--

CREATE TABLE `status_invoice` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_invoice`
--

INSERT INTO `status_invoice` (`id`, `name`, `color`) VALUES
(1, 'Approval Direktur', 'red'),
(2, 'Proses Akutansi', 'green'),
(3, 'Selesai', 'blue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tagihan`
--

CREATE TABLE `status_tagihan` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_tagihan`
--

INSERT INTO `status_tagihan` (`id`, `name`, `color`) VALUES
(1, 'Persetujuan', 'aqua'),
(2, 'Proses Pembayaran', 'red'),
(3, 'Selesai', 'blue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(10) NOT NULL,
  `name` text DEFAULT NULL,
  `nilai` decimal(20,2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `create` datetime DEFAULT NULL,
  `kode_vendor` varchar(20) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL,
  `tanggal_approval` date DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `file_bayar` varchar(200) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `tagihan` int(5) DEFAULT NULL,
  `alat_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `name`, `nilai`, `tanggal`, `file`, `invoice`, `create`, `kode_vendor`, `sts`, `tanggal_approval`, `alasan`, `tanggal_bayar`, `file_bayar`, `role_id`, `tagihan`, `alat_id`) VALUES
(1, 'Tagihan Listrik Gudang', '2000000.00', '2021-11-23', '200/inv/2001.pdf', '200/inv/2001', '2021-11-29 15:51:32', 'VN0001', 3, '2021-11-29', NULL, '2021-11-29', 'BY200/inv/2001.png', NULL, NULL, NULL),
(2, 'Tagihan Listrik bulanan', '2000000.00', '2021-11-17', '001/INV/XXX/2021.pdf', '001/INV/XXX/2021', '2021-11-29 14:27:13', 'VN0001', 3, '2021-11-29', NULL, '2021-11-29', 'BY001/INV/XXX/2021.png', NULL, NULL, NULL),
(3, 'Perbaikan ban dll', '2000000.00', '2021-12-17', '0012/INV/XXX/2021.pdf', '0012/INV/XXX/2021', '2021-12-01 16:21:43', 'VN0001', 3, '2021-12-01', NULL, '2021-12-01', 'BY0012/INV/XXX/2021.png', 3, 1, 1),
(4, 'Perbaikan mesin ok', '1000000.00', '2021-12-24', '00221/INV/XXX/2021.pdf', '00221/INV/XXX/2021', '2021-12-01 16:53:48', 'VN0001', 1, NULL, NULL, NULL, NULL, 3, 1, 2),
(5, 'Perbaikan', '3000000.00', '2021-12-24', 'TG22001-INV-XXX-2021.pdf', '22001/INV/XXX/2021', '2021-12-01 16:58:26', 'VN0001', 1, NULL, NULL, NULL, NULL, 3, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_alat`
--

CREATE TABLE `transaksi_alat` (
  `id` int(10) NOT NULL,
  `alat_id` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `invoice_id` int(10) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_alat`
--

INSERT INTO `transaksi_alat` (`id`, `alat_id`, `tanggal`, `invoice_id`, `sts`, `qty`) VALUES
(1, 1, '2021-12-01', 8, 1, 200),
(2, 4, '2021-12-01', 8, 1, 100),
(3, 1, '2021-12-01', 9, 1, NULL),
(4, 4, '2021-12-01', 9, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_gudang`
--

CREATE TABLE `transaksi_gudang` (
  `id` int(10) NOT NULL,
  `gudang_id` varchar(20) DEFAULT '',
  `qty` int(20) DEFAULT NULL,
  `tarnsaksi` int(5) DEFAULT NULL,
  `invoice_id` int(10) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `transaksi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_gudang`
--

INSERT INTO `transaksi_gudang` (`id`, `gudang_id`, `qty`, `tarnsaksi`, `invoice_id`, `sts`, `tanggal`, `transaksi`) VALUES
(1, '1', 200, NULL, 1, 1, '2021-11-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sts_pass` int(5) DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costcenter_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `sts_pass`, `no_hp`, `costcenter_id`) VALUES
(1, 'Administrator', 'administrator@gmail.com', '12345678', NULL, '$2y$10$u/3gUs9lTbLD/LOGyKutme0PLlg9SazbNWHyhsJMr.0DfFk963WDC', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Admin Surabaya', 'admin1@gmail.com', '11111111', NULL, '$2y$10$u/3gUs9lTbLD/LOGyKutme0PLlg9SazbNWHyhsJMr.0DfFk963WDC', '2', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Admin Cilegon', 'admin2@gmail.com', '22222222', NULL, '$2y$10$u/3gUs9lTbLD/LOGyKutme0PLlg9SazbNWHyhsJMr.0DfFk963WDC', '3', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Khony Suminar (Direktur)', 'direktur@gmail.com', '33333333', NULL, '$2y$10$u/3gUs9lTbLD/LOGyKutme0PLlg9SazbNWHyhsJMr.0DfFk963WDC', '4', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Keuangan', 'keuangan@gmail.com', '44444444', NULL, '$2y$10$u/3gUs9lTbLD/LOGyKutme0PLlg9SazbNWHyhsJMr.0DfFk963WDC', '5', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(5) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `kode_vendor` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `alamat`, `telepon`, `email`, `kode_vendor`) VALUES
(1, 'PT JAYA TATARA SEJAHTERA', 'Komplek BBS III Blok A3 No. 2', '0254 389669', 'sales@jayatatarasejahtera.com', 'VN0001'),
(3, 'PT Rezeki Mulia Bersama', 'Head Office Jl. Margomulyo no. 61 Surabaya, Indonesia', '+62 31-749-3030', 'infomarketing@rejekimuliabersama.co.id', 'VN0002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rolenya`
--
ALTER TABLE `rolenya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_karyawan` (`nik`) USING BTREE;

--
-- Indeks untuk tabel `status_invoice`
--
ALTER TABLE `status_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_tagihan`
--
ALTER TABLE `status_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_alat`
--
ALTER TABLE `transaksi_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_gudang`
--
ALTER TABLE `transaksi_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rolenya`
--
ALTER TABLE `rolenya`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT untuk tabel `status_invoice`
--
ALTER TABLE `status_invoice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_tagihan`
--
ALTER TABLE `status_tagihan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi_alat`
--
ALTER TABLE `transaksi_alat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi_gudang`
--
ALTER TABLE `transaksi_gudang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
