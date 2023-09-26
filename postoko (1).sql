-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 17.59
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postoko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `kunci` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_akun` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_akun` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategori_akun_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pajak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `kunci`, `kode_akun`, `nama_akun`, `kategori_akun_id`, `pajak`, `saldo`, `deskripsi`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '-', '1-10001', 'Kas', '1', '', '0', '', '2021-06-11 07:36:52', NULL, '0'),
(2, '-', '1-10002', 'Rekening Bank', '1', '', '0', '', '2021-06-11 07:40:15', NULL, '0'),
(3, '-', '1-10003', 'Giro', '1', '', '0', '', '2021-06-11 07:40:41', NULL, '0'),
(4, '-', '1-10100', 'Piutang Usaha', '2', '', '0', '', '2021-06-11 07:41:17', NULL, '0'),
(5, '-', '1-10101', 'Piutang Belum Ditagih', '2', '', '0', '', '2021-06-11 07:41:45', NULL, '0'),
(6, '-', '1-10102', 'Cadangan Kerugian Piutang', '2', '', '0', '', '2021-06-11 07:42:44', NULL, '0'),
(7, '-', '1-10200', 'Persediaan Barang', '3', '', '0', '', '2021-06-11 07:43:15', NULL, '0'),
(8, '-', '1-10300', 'Piutang Lain', '4', '', '0', '', '2021-06-11 07:44:17', NULL, '0'),
(9, '-', '1-10301', 'Piutang karyawan', '4', '', '0', '', '2021-06-11 07:50:04', NULL, '0'),
(10, '-', '1-10400', 'Dana Belum Disetor', '4', '', '0', '', '2021-06-11 08:36:59', NULL, '0'),
(11, '-', '1-10401', 'Aset Lancar Lainnya', '4', '', '0', '', '2021-06-11 08:36:59', NULL, '0'),
(12, '-', '1-10402', 'Biaya Dibayar Di Muka', '4', '', '0', '', '2021-06-11 08:36:59', NULL, '0'),
(13, '-', '1-10403', 'Uang Muka', '4', '', '0', '', '2021-06-11 08:36:59', NULL, '0'),
(14, '-', '1-10500', 'PPN Masukan', '4', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(15, '-', '1-10501', 'Pajak Dibayar Di Muka - PPh 22', '4', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(16, '-', '1-10502', 'Pajak Dibayar Di Muka - PPh 23', '4', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(17, '-', '1-10503', 'Pajak Dibayar Di Muka - PPh 25', '4', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(18, '-', '1-10700', 'Aset Tetap - Tanah', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(19, '-', '1-10701', 'Aset Tetap - Bangunan', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(20, '-', '1-10702', 'Aset Tetap - Building Improvements', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(21, '-', '1-10703', 'Aset Tetap - Kendaraan', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(22, '-', '1-10704', 'Aset Tetap - Mesin & Peralatan', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(23, '-', '1-10705', 'Aset Tetap - Perlengkapan Kantor', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(24, '-', '1-10706', 'Aset Tetap - Aset Sewa Guna Usaha', '5', '', '0', '', '2021-06-11 08:37:00', NULL, '0'),
(25, '-', '1-10707', 'Aset Tak Berwujud', '5', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(26, '-', '1-10751', 'Akumulasi Penyusutan - Bangunan', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(27, '-', '1-10752', 'Akumulasi Penyusutan - Building Improvements', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(28, '-', '1-10753', 'Akumulasi penyusutan - Kendaraan', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(29, '-', '1-10754', 'Akumulasi Penyusutan - Mesin & Peralatan', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(30, '-', '1-10755', 'Akumulasi Penyusutan - Peralatan Kantor', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(31, '-', '1-10756', 'Akumulasi Penyusutan - Aset Sewa Guna Usaha', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(32, '-', '1-10757', 'Akumulasi Amortisasi', '6', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(33, '-', '1-10800', 'Investasi', '7', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(34, '-', '2-20100', 'Hutang Usaha', '8', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(35, '-', '2-20101', 'Hutang Belum Ditagih', '8', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(36, '-', '2-20200', 'Hutang Lain Lain', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(37, '-', '2-20201', 'Hutang Gaji', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(38, '-', '2-20202', 'Hutang Deviden', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(39, '-', '2-20203', 'Pendapatan Diterima Di Muka', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(40, '-', '2-20205', 'Hutang Konsinyasi', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(41, '-', '2-20301', 'Sarana Kantor Terhutang', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(42, '-', '2-20302', 'Bunga Terhutang', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(43, '-', '2-20399', 'Biaya Terhutang Lainnya', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(44, '-', '2-20400', 'Hutang Bank', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(45, '-', '2-20500', 'PPN Keluaran', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(46, '-', '2-20501', 'Hutang Pajak - PPh 21', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(47, '-', '2-20502', 'Hutang Pajak - PPh 22', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(48, '-', '2-20503', 'Hutang Pajak - PPh 23', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(49, '-', '2-20504', 'Hutang Pajak - PPh 29', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(50, '-', '2-20599', 'Hutang Pajak Lainnya', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(51, '-', '2-20600', 'Hutang dari Pemegang Saham', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(52, '-', '2-20601', 'Kewajiban Lancar Lainnya', '9', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(53, '-', '2-20700', 'Kewajiban Manfaat Karyawan', '10', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(54, '-', '3-30000', 'Modal Saham', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(55, '-', '3-30001', 'Tambahan Modal Disetor', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(56, '-', '3-30100', 'Laba Ditahan', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(57, '-', '3-30200', 'Deviden', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(58, '-', '3-30300', 'Pendapatan Komprehensif Lainnya', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(59, '-', '3-30999', 'Ekuitas Saldo Awal', '11', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(60, '-', '4-40000', 'Pendapatan', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(61, '-', '4-40100', 'Diskon Penjualan', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(62, '-', '4-40200', 'Retur Penjualan', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(63, '-', '4-40201', 'Pendapatan Belum Ditagih', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(64, '-', '5-50000', 'Beban Pokok Pendapatan', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(65, '-', '5-50100', 'Diskon Pembelian', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(66, '-', '5-50200', 'Retur Pembelian', '12', NULL, '0', NULL, '2021-06-11 08:37:00', NULL, '0'),
(67, '-', '5-50300', 'Pengiriman & Pengangkutan', '12', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(68, '-', '5-50400', 'Biaya Impor', '12', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(69, '-', '5-50500', 'Biaya Produksi', '12', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(70, '-', '6-60000', 'Biaya Penjualan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(71, '-', '6-60001', 'Iklan & Promosi', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(72, '-', '6-60002', 'Komisi & Fee', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(73, '-', '6-60003', 'Bensin, Tol dan Parkir - Penjualan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(74, '-', '6-60004', 'Perjalanan Dinas - Penjualan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(75, '-', '6-60005', 'Komunikasi - Penjualan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(76, '-', '6-60006', 'Marketing Lainnya', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(77, '-', '6-60100', 'Biaya Umum & Administratif', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(78, '-', '6-60101', 'Gaji', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(79, '-', '6-60102', 'Upah', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(80, '-', '6-60103', 'Makanan & Transportasi', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(81, '-', '6-60104', 'Lembur', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(82, '-', '6-60105', 'Pengobatan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(83, '-', '6-60106', 'THR & Bonus', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(84, '-', '6-60107', 'Jamsostek', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(85, '-', '6-60108', 'Insentif', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(86, '-', '6-60109', 'Pesangon', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(87, '-', '6-60110', 'Manfaat dan Tunjangan Lain', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(88, '-', '6-60200', 'Donasi', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(89, '-', '6-60201', 'Hiburan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(90, '-', '6-60202', 'Bensin, Tol dan Parkir - Umum', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(91, '-', '6-60203', 'Perbaikan & Pemeliharaan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(92, '-', '6-60204', 'Perjalanan Dinas - Umum', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(93, '-', '6-60205', 'Makanan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(94, '-', '6-60206', 'Komunikasi - Umum', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(95, '-', '6-60207', 'Iuran & Langganan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(96, '-', '6-60208', 'Asuransi', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(97, '-', '6-60209', 'Legal & Profesional', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(98, '-', '6-60210', 'Beban Manfaat Karyawan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(99, '-', '6-60211', 'Sarana Kantor', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(100, '-', '6-60212', 'Pelatihan & Pengembangan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(101, '-', '6-60213', 'Beban Piutang Tak Tertagih', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(102, '-', '6-60214', 'Pajak dan Perizinan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(103, '-', '6-60215', 'Denda', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(104, '-', '6-60217', 'Listrik', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(105, '-', '6-60218', 'Air', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(106, '-', '6-60219', 'IPL', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(107, '-', '6-60220', 'Langganan Software', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(108, '-', '6-60300', 'Beban Kantor', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(109, '-', '6-60301', 'Alat Tulis Kantor & Printing', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(110, '-', '6-60302', 'Bea Materai', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(111, '-', '6-60303', 'Keamanan dan Kebersihan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(112, '-', '6-60304', 'Supplies dan Material', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(113, '-', '6-60305', 'Pemborong', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(114, '-', '6-60400', 'Biaya Sewa - Bangunan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(115, '-', '6-60401', 'Biaya Sewa - Kendaraan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(116, '-', '6-60402', 'Biaya Sewa - Operasional', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(117, '-', '6-60403', 'Biaya Sewa - Lain - lain', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(118, '-', '6-60500', 'Penyusutan - Bangunan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(119, '-', '6-60501', 'Penyusutan - Perbaikan Bangunan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(120, '-', '6-60502', 'Penyusutan - Kendaraan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(121, '-', '6-60503', 'Penyusutan - Mesin & Peralatan', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(122, '-', '6-60504', 'Penyusutan - Peralatan Kantor', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(123, '-', '6-60599', 'Penyusutan - Aset Sewa Guna Usaha', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(124, '-', '6-60216', 'Pengeluaran Barang Rusak', '13', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(125, '-', '7-70000', 'Pendapatan Bunga - Bank', '14', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(126, '-', '7-70001', 'Pendapatan Bunga - Deposito', '14', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(127, '-', '7-70002', 'Pendapatan Komisi - Barang Konsinyasi', '14', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(128, '-', '7-70003', 'Pembulatan', '14', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(129, '-', '7-70099', 'Pendapatan Lain - lain', '14', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(130, '-', '8-80000', 'Beban Bunga', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(131, '-', '8-80001', 'Provisi', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(132, '-', '8-80002', '(Laba)/Rugi Pelepasan Aset Tetap', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(133, '-', '8-80100', 'Penyesuaian Persediaan', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(134, '-', '8-80999', 'Beban Lain - lain', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(135, '-', '9-90000', 'Beban Pajak - Kini', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0'),
(136, '-', '9-90001', 'Beban Pajak - Tangguhan', '15', NULL, '0', NULL, '2021-06-11 08:37:01', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `satuan_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `foto`, `nama`, `satuan_id`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '60bc304eefccb.png', 'web', '5', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataharga`
--

CREATE TABLE `dataharga` (
  `id` int(11) NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barang_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `dataharga`
--

INSERT INTO `dataharga` (`id`, `supplier_id`, `barang_id`, `harga`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '1', '1', '200000', '2021-06-11 05:00:03', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goupkontak`
--

CREATE TABLE `goupkontak` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `goupkontak`
--

INSERT INTO `goupkontak` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Group 1', '2021-06-11 10:29:04', NULL, '0'),
(2, 'Group 2', '2021-06-11 10:29:12', NULL, '0'),
(3, 'Group 3', '2021-06-11 10:29:19', NULL, '0'),
(4, 'Group 4', '2021-06-11 10:29:19', NULL, '0'),
(5, 'Group 5', '2021-06-11 10:29:25', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'KTP', '2021-06-11 23:39:40', NULL, '0'),
(2, 'Paspor', '2021-06-11 23:39:46', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'sigle', '2021-06-12 03:03:56', NULL, '0'),
(2, 'bundle', '2021-06-12 03:04:01', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriakun`
--

CREATE TABLE `kategoriakun` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategoriakun`
--

INSERT INTO `kategoriakun` (`id`, `kategori`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Kas &amp; Bank', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(2, 'Akun Piutang', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(3, 'Persediaan', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(4, 'Aktiva Lancar Lainnya', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(5, 'Aktiva Tetap', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(6, 'Depresiasi &amp; Amortisasi', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(7, 'Aktiva Lainnya', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(8, 'Aktiva Lainnya', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(9, 'Akun Hutang', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(10, 'Kewajiban Lancar Lainnya', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(11, 'Ekuitas', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(12, 'Pendapatan', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(13, 'Harga Pokok Penjualan', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(14, 'Beban', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(15, 'Pendapatan Lainnya', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriproduk`
--

CREATE TABLE `kategoriproduk` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategoriproduk`
--

INSERT INTO `kategoriproduk` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Bahan Baku', '2021-06-12 00:03:09', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipe_kontak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_kontak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `panggilan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_awal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_tengah` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_akhir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `handphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identitas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info_lain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_pembayaran` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_pengirim` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_piutang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_hutang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `syarat_pembayaran_utama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama_panggilan`, `tipe_kontak`, `group_kontak`, `panggilan`, `nama_awal`, `nama_tengah`, `nama_akhir`, `handphone`, `identitas`, `email`, `info_lain`, `nama_perusahaan`, `telp`, `fax`, `npwp`, `alamat_pembayaran`, `alamat_pengirim`, `bank`, `akun_piutang`, `akun_hutang`, `syarat_pembayaran_utama`, `kode`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Gugus Darmayanto', '[\"1\"]', '1', '1', 'Gugus', 'Darmayanto', '', '085800455338', '', 'webshunternet@gmail.com', '', 'Pt Valid Data Solusi', '', '', '', '', 'Jln. Simpang Tenaga II No. 12. Gedung B. Lantai 2. MALANG.', '', '', '', '', NULL, '2021-06-13 03:31:07', NULL, '0'),
(2, 'Daniel', '{\"2\":\"3\"}', '1', '1', '', '', '', '085800455338', '', 'ggsd09031997@gmail.com', '', 'Pt Valid Data Solusi', '', '', '', '', 'Jln. Simpang Tenaga II No. 12. Gedung B. Lantai 2. MALANG.', '', '', '', '', NULL, '2021-06-13 04:15:48', NULL, '0'),
(3, 'intan', '{\"1\":\"2\"}', '2', '1', '', '', '', '085800455338', '', 'ggsd09031997@gmail.com', '', 'PT a', '', '', '', '', 'Jln. Simpang Tenaga II No. 12. Gedung B. Lantai 2. MALANG.', '{', '', '', '', 's-0001', '2021-06-13 08:31:21', NULL, '0'),
(4, 'kokoh ivan', '{\"1\":\"2\"}', '2', '1', '', '', '', '085800455338', '', 'ggsd09031997@gmail.com', '', 'PT b', '', '', '', '', 'Jln. Simpang Tenaga II No. 12. Gedung B. Lantai 2. MALANG.', '{', '', '', '', 's-0002', '2021-06-13 09:13:57', NULL, '0'),
(5, 'intan v', '{\"2\":\"3\"}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '{\"1\":{\"nama_bank\":\"\",\"kantor_cabang_bank\":\"\",\"pemegang_akun_bank\":\"\",\"nomor_rekening\":\"\"}}', '', '', '', NULL, '2021-06-13 12:13:09', NULL, '1'),
(6, 'qwe', '{\"1\":\"2\"}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '{', '', '', '', NULL, '2021-06-13 12:14:54', NULL, '1'),
(7, 'rt', '{\"1\":\"2\"}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '{\"1\":{\"nama_bank\":\"\",\"kantor_cabang_bank\":\"\",\"pemegang_akun_bank\":\"\",\"nomor_rekening\":\"\"}}', '', '', '', NULL, '2021-06-13 12:15:15', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leveluser`
--

CREATE TABLE `leveluser` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `leveluser`
--

INSERT INTO `leveluser` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Admin', '2021-06-11 10:47:21', NULL, '0'),
(2, 'Sales', '2021-06-11 10:47:30', NULL, '0'),
(3, 'Gudang', '2021-06-11 10:47:37', NULL, '0'),
(4, 'Accounting', '2021-06-11 10:47:47', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id` int(11) NOT NULL,
  `pajak` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persentase_efektif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pemotongan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_pajak_penjualan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_pajak_pembelian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id`, `pajak`, `nama`, `persentase_efektif`, `pemotongan`, `akun_pajak_penjualan`, `akun_pajak_pembelian`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '1', 'PPN', '10', '1', '', '', '2021-06-11 07:09:15', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panggilan`
--

CREATE TABLE `panggilan` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `panggilan`
--

INSERT INTO `panggilan` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Bapak', '2021-06-13 04:14:09', NULL, '0'),
(2, 'Ibu', '2021-06-13 04:14:16', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `termin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jatuh_tempo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ongkir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pembayaran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihanpajak`
--

CREATE TABLE `pilihanpajak` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pilihanpajak`
--

INSERT INTO `pilihanpajak` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Satu', '2021-06-11 05:00:01', '0000-00-00 00:00:00', '0'),
(2, 'Group', '2021-06-11 05:00:01', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_barang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga_beli` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_pembelian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pajak_pembelian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga_jual` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_penjualan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pajak_jual` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batas_stok` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `akun_stok` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bundle_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama`, `kode`, `kategori`, `unit`, `deskripsi`, `jenis_barang`, `barcode`, `harga_beli`, `akun_pembelian`, `pajak_pembelian`, `harga_jual`, `akun_penjualan`, `pajak_jual`, `batas_stok`, `akun_stok`, `bundle_id`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '60c45afe11806.png', 'kain Sutera', '10001', '1', '2', 'kain untuk bahan kaos', '1', '102945689', '100000', '', '', '150000', '', '', '1000', '', '', '2021-06-12 06:55:04', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Lusin', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(2, 'Gross', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(3, 'Rim', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(4, 'Kodi', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0'),
(5, 'pcs', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notelp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `foto`, `nama`, `alamat`, `notelp`, `whatsapp`, `telegram`, `instagram`, `facebook`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '60bc73355f786.png', 'gigo', 'jl terusan bogor', '085800455338', 'https://wa.me/6285800455338', '085800455338', '085800455338', '085800455338', '2021-06-11 05:00:02', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `termin`
--

CREATE TABLE `termin` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `termin`
--

INSERT INTO `termin` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '30', '2021-06-13 14:59:37', NULL, '0'),
(2, '14', '2021-06-13 14:59:42', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipekontak`
--

CREATE TABLE `tipekontak` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tipekontak`
--

INSERT INTO `tipekontak` (`id`, `pilihan`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, 'Pelanggan', '2021-06-11 09:18:27', NULL, '0'),
(2, 'Supplier', '2021-06-11 09:18:56', NULL, '0'),
(3, 'Karyawan', '2021-06-11 09:19:07', NULL, '0'),
(4, 'Lainnya', '2021-06-11 09:19:16', NULL, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordview` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `foto`, `nama`, `level`, `username`, `password`, `passwordview`, `created_at`, `updated_at`, `delete_set`) VALUES
(1, '60c3e82e470ab.png', 'Gugus Darmayanto', '1', 'admin', '72487f5f9f06a39b1453c9ddb56d67ca', 'administrator', '2021-06-11 10:48:19', NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dataharga`
--
ALTER TABLE `dataharga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goupkontak`
--
ALTER TABLE `goupkontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoriakun`
--
ALTER TABLE `kategoriakun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `leveluser`
--
ALTER TABLE `leveluser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panggilan`
--
ALTER TABLE `panggilan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pilihanpajak`
--
ALTER TABLE `pilihanpajak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipekontak`
--
ALTER TABLE `tipekontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dataharga`
--
ALTER TABLE `dataharga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `goupkontak`
--
ALTER TABLE `goupkontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategoriakun`
--
ALTER TABLE `kategoriakun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategoriproduk`
--
ALTER TABLE `kategoriproduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `panggilan`
--
ALTER TABLE `panggilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pilihanpajak`
--
ALTER TABLE `pilihanpajak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `termin`
--
ALTER TABLE `termin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tipekontak`
--
ALTER TABLE `tipekontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
