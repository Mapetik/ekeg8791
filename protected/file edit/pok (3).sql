-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 04:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pok`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_kegiatan`
--

CREATE TABLE IF NOT EXISTS `detil_kegiatan` (
`id` int(11) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `target` varchar(15) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `penanggung_jawab` varchar(40) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `versi` varchar(20) NOT NULL,
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
`id` int(11) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `target` int(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `satuan` int(11) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `penanggung_jawab` int(70) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `versi` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `bulan` int(2) DEFAULT NULL,
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode_kegiatan`, `id_layanan`, `nama_kegiatan`, `target`, `volume`, `harga_satuan`, `satuan`, `sumber_dana`, `penanggung_jawab`, `id_rekaman`, `versi`, `status`, `bulan`, `recoverable`) VALUES
(1, '525112', 1, 'Workshop penyusunan perangkat perkuliahan pascasarjana\r\n', 72085000, 200, 360425, 1, 1, 1, 0, '-', 1, 1, NULL),
(2, '525112', 1, 'Penyiapan pendukung perkuliahan pascasarjana\r\n', 5000000, 50, 100000, 1, 1, 1, 0, '-', 1, 1, NULL),
(3, '525112', 1, 'Rapat Koordinasi Awal Perkuliahan Pascasarjana\r\n', 15000000, 100, 150000, 1, 1, 1, 0, '-', 1, 1, NULL),
(4, '1', 1, 'Matrikulasi Pascasarjana', 8368000, 1000, 8368, 1, 1, 2, 0, '0', 1, 8, NULL),
(5, '525112', 1, 'Monitoring dan evaluasi perkuliahan pascasarjana\r\n', 12770000, 2, 6385000, 1, 1, 1, 0, '-', 0, 1, NULL),
(6, '1', 1, 'Dosen luar biasa/tamu pascasarjana', 467500000, 200, 2337500, 1, 5, 2, 0, '0', 1, 1, NULL),
(7, '525112', 1, 'Penyelenggaraan ujian tesis/disertasi/komprehensif\r\n', 150270000, 2, 75135000, 1, 1, 1, 0, '-', 1, 1, NULL),
(8, '525112', 1, 'Wisuda Pascasarjana\r\n', 162500000, 650, 250000, 1, 1, 1, 0, '-', 1, 1, NULL),
(9, '525112', 2, 'Remunerasi BLU', 559680000, 44, 12720000, 1, 1, 1, 0, '-', 1, 1, NULL),
(10, '4', 4, 'Pelatihan/Workshop penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana', 21440000, 25, 857600, 1, 1, 2, 0, '0', 1, 5, NULL),
(11, '444', 4, 'penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana', 17250000, 90000, 1150000, 1, 1, 1, 0, '0', 1, 9, NULL),
(12, '525112', 4, 'Penyediaan bahan-bahan laboratorium pascasarjana\r\n', 50000000, 1, 50000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(13, '525112', 5, 'Workshop penyusunan proposal pengabdian\r\n', 15960000, 35, 456000, 1, 1, 1, 0, '-', 1, 1, NULL),
(14, '525112', 5, 'Pendanaan Pengabdian Dosen\r\n', 24000000, 4, 6000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(15, '537112', 6, 'Pengadaan Alat Penunjang Pendidikan\r\n', 372015000, 45, 8267000, 1, 1, 1, 0, '-', 1, 1, NULL),
(16, '525112', 7, 'Penyelenggaraan Penerimaan Mahasiswa baru jalur  SBMPTN/SNMPTN/Mandiri Pascasarjana\r\n', 181581000, 1000, 181581, 1, 1, 1, 0, '-', 1, 1, NULL),
(17, '525112', 7, 'Penyelenggaraan ujian penerimaan maba Pascasarjana\r\n', 31802000, 1000, 31802, 1, 1, 1, 0, '-', 1, 1, NULL),
(18, '525112', 7, 'Verifikasi Berkas Pendaftaran Maba Pascasarjana\r\n', 2500000, 1000, 2500, 1, 1, 1, 0, '-', 1, 1, NULL),
(19, '525112', 7, 'Orientasi Mahasiswa Baru pascasarjana\r\n', 8370000, 100, 83700, 1, 1, 1, 0, '-', 1, 1, NULL),
(20, '525112', 7, 'Verifikasi Kelulusan Mahasiswa Baru Pascasarjana\r\n', 74250000, 75, 990000, 1, 1, 1, 0, '-', 1, 1, NULL),
(21, '525112', 8, 'Penyusunan kurikulum KBKK dan KKNI\r\n', 230100000, 15, 15340000, 1, 1, 1, 0, '-', 1, 1, NULL),
(22, '525112', 8, 'Workshop pengembangan kurikulum KBKK dan KKNI\r\n', 50000000, 100, 500000, 1, 1, 1, 0, '-', 1, 1, NULL),
(23, '525112', 8, 'Workshop penyusunan pedoman program dual degree. Joint degree, credit-exchange program, sandwich program, lecture exchange\r\n', 24282000, 1, 24282000, 1, 1, 1, 0, '-', 1, 1, NULL),
(24, '525112', 8, 'Workshop pedoman kelas internasional\r\n', 16092000, 50, 321840, 1, 1, 1, 0, '-', 1, 1, NULL),
(25, '525112', 8, 'Pengembangan Dokumen Mutu dan SOP\r\n', 105270000, 1, 105270000, 1, 1, 1, 0, '-', 1, 1, NULL),
(26, '525112', 8, 'Workshop Penjaminan Mutu\r\n', 30371000, 1, 30371000, 1, 1, 1, 0, '-', 1, 1, NULL),
(27, '525112', 8, 'Review akreditasi prodi dan institusi\r\n', 32030000, 5, 6406000, 1, 1, 1, 0, '-', 1, 1, NULL),
(28, '525112', 8, 'Visitasi akreditasi prodi dan institusi\r\n', 76600000, 5, 15320000, 1, 1, 1, 0, '-', 1, 1, NULL),
(29, '525112', 8, 'Pendampingan dan review internal penyusunan Borang Akreditasi Prodi\r\n', 22700000, 3, 7566667, 1, 1, 1, 0, '-', 1, 1, NULL),
(30, '525112', 9, 'Kuliah Umum\r\n', 200000000, 1000, 200000, 1, 1, 1, 0, '-', 1, 1, NULL),
(31, '525112', 9, 'Tracerstudi/ survey/pendataan alumni\r\n', 11950000, 1, 11950000, 1, 1, 1, 0, '-', 1, 1, NULL),
(32, '525112', 9, 'Penyelenggaraan kegiatan BEM.U/BMF\r\n', 66772000, 2, 33386000, 1, 1, 1, 0, '-', 1, 1, NULL),
(33, '525112', 9, 'Workshop Penulisan Karya Ilmiah\r\n', 32347000, 10, 3234700, 1, 1, 1, 0, '-', 1, 1, NULL),
(34, '525112', 9, 'Pelatihan soft skill\r\n', 38922000, 100, 389220, 1, 1, 1, 0, '-', 1, 1, NULL),
(35, '525112', 9, 'Pelatihan leadership mahasiswa\r\n', 17815000, 70, 254500, 1, 1, 1, 0, '-', 1, 1, NULL),
(36, '525112', 9, 'Workshop Dosen Pendamping Kegiatan Mahasiswa\r\n', 14010000, 1, 14010000, 1, 1, 1, 0, '-', 1, 1, NULL),
(37, '525112', 9, 'Penyelenggaraan kompetisi seni\r\n', 13485000, 3, 4495000, 1, 1, 1, 0, '-', 1, 1, NULL),
(38, '525112', 9, 'Penyelenggaraan gelar karya Unggulan\r\n', 14930000, 1, 14930000, 1, 1, 1, 0, '-', 1, 1, NULL),
(39, '525112', 9, 'Penyelenggaraan kompetisi olahraga\r\n', 13725000, 5, 2745000, 1, 1, 1, 0, '-', 1, 1, NULL),
(40, '525112', 10, 'Seminar Nasional (tenaga pendidik)\r\n', 200500000, 10, 20050000, 1, 1, 1, 0, '-', 1, 1, NULL),
(41, '525112', 10, 'Forum komunikasi PPs se- Indonesia dan Seminar Nasional\r\n', 199140000, 1, 199140000, 1, 1, 1, 0, '-', 1, 1, NULL),
(42, '525112', 10, 'Seminar Internasional (tenaga pendidik)\r\n', 124800000, 1, 124800000, 1, 1, 1, 0, '-', 1, 1, NULL),
(43, '525112', 10, 'Pelatihan (tenaga pendidik)\r\n', 31741000, 50, 634820, 1, 1, 1, 0, '-', 1, 1, NULL),
(44, '525112', 10, 'Workshop (tenaga pendidik)\r\n', 61152000, 2, 30576000, 1, 1, 1, 0, '-', 1, 1, NULL),
(45, '525112', 10, 'Pengiriman Delegasi Dosen\r\n', 32815000, 10, 3281500, 1, 1, 1, 0, '-', 1, 1, NULL),
(46, '525112', 11, 'Pelatihan di bidang administrasi peningkatan kompetensi\r\n', 60000000, 40, 1500000, 1, 1, 1, 0, '-', 1, 1, NULL),
(47, '525112', 11, 'Mengikuti Kegiatan Pelatihan Keterampilan\r\n', 6090000, 2, 3045000, 1, 1, 1, 0, '-', 1, 1, NULL),
(48, '525112', 12, 'Workshop penyusunan proposal penelitian\r\n', 20885000, 50, 417700, 1, 1, 1, 0, '-', 1, 1, NULL),
(49, '525112', 12, 'Seminar hasil penelitian\r\n', 114117000, 500, 114117000, 1, 1, 1, 0, '-', 1, 1, NULL),
(50, '525112', 12, 'Workshop penyusunan artikel penelitian\r\n', 44516000, 70, 635943, 1, 1, 1, 0, '-', 1, 1, NULL),
(51, '525112', 12, 'Pendanaan  Penelitian Kerjasama\r\n', 200000000, 2, 100000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(52, '525112', 12, 'Pendanaan  Kelembagaan\r\n', 260000000, 13, 20000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(53, '525112', 12, 'Pendanaan  Mahasiswa\r\n', 129000000, 30, 4300000, 1, 1, 1, 0, '-', 1, 1, NULL),
(54, '525112', 12, 'Pendanaan  Penelitian Bertema Konservasi\r\n', 60000000, 2, 30000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(55, '525112', 12, 'Pendanaan  Penelitian Bertema Kependidikan\r\n', 60000000, 2, 30000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(56, '525112', 12, 'Pendanaan  Penelitian Dosen Desentralisasi\r\n', 100000000, 2, 50000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(57, '525112', 12, 'Pendanaan Penelitian Terapan\r\n', 60000000, 3, 20000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(58, '525112', 12, 'Pendanaan Penelitian profesor\r\n', 125000000, 5, 25000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(59, '525112', 13, 'Worksop Penyusunan dan inputing data SKP\r\n', 12707000, 1, 12707000, 1, 1, 1, 0, '-', 1, 1, NULL),
(60, '525112', 13, 'Inisiasi kerjasama bidang pendidikan\r\n', 38605000, 4, 9651250, 1, 1, 1, 0, '-', 1, 1, NULL),
(61, '525112', 13, 'Kerjasama Instansi Pemerintah\r\n', 300000000, 2, 150000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(62, '525112', 13, 'Kerjasama Instansi Non Pemerintah\r\n', 30220000, 2, 15110000, 1, 1, 1, 0, '-', 1, 1, NULL),
(63, '525112', 13, 'Kerjasama Antar Perguruan Tinggi Dalam Negeri\r\n', 70792000, 4, 17698000, 1, 1, 1, 0, '-', 1, 1, NULL),
(64, '525112', 13, 'Pemasangan Iklan di media cetak\r\n', 19500000, 1, 19500000, 1, 1, 1, 0, '-', 1, 1, NULL),
(65, '525112', 13, 'Penyusunan buletin\r\n', 38430000, 2000, 19215, 1, 1, 1, 0, '-', 1, 1, NULL),
(66, '525112', 13, 'Rapat Kerja Tahunan\r\n', 311115000, 3, 103705000, 1, 1, 1, 0, '-', 1, 1, NULL),
(67, '525112', 13, 'Rapat Evaluasi Program dan Anggaran\r\n', 28734000, 1, 28734000, 1, 1, 1, 0, '-', 1, 1, NULL),
(68, '525112', 13, 'Rapat Koordinasi Bulanan\r\n', 75405000, 24, 3141875, 1, 1, 1, 0, '-', 1, 1, NULL),
(69, '525112', 13, 'Penyusunan LAKUK/LAKIP\r\n', 23100000, 1, 23100000, 1, 1, 1, 0, '-', 1, 1, NULL),
(70, '525112', 13, 'Perjalanan Dinas Biasa\r\n', 188750000, 12, 15729167, 1, 1, 1, 0, '-', 1, 1, NULL),
(71, '525112', 13, 'Kepanitiaan Bulan Fakultas\r\n', 30000000, 50, 600000, 1, 1, 1, 0, '-', 1, 1, NULL),
(72, '525112', 13, 'Pembukaan Bulan Fakultas\r\n', 50560000, 200, 252800, 1, 1, 1, 0, '-', 1, 1, NULL),
(73, '525112', 13, 'Pameran/Expo (Bulan Fakultas)\r\n', 55328000, 1, 55328000, 1, 1, 1, 0, '-', 1, 1, NULL),
(74, '525112', 13, 'Kegiatan Sosial (Bulan Fakultas)\r\n', 16000000, 1, 16000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(75, '525112', 13, 'Kegiatan Kerohanian (Bulan Fakultas)\r\n', 7800000, 1, 7800000, 1, 1, 1, 0, '-', 1, 1, NULL),
(76, '525112', 13, 'Lomba dalam rangka bulan fakultas\r\n', 33041000, 1, 33041000, 1, 1, 1, 0, '-', 1, 1, NULL),
(77, '525112', 13, 'Temu alumni (Dies Natalis)\r\n', 14391000, 1, 14391000, 1, 1, 1, 0, '-', 1, 1, NULL),
(78, '525112', 13, 'Seminar Nasional (Dies Natalis)\r\n', 94432000, 1, 94432000, 1, 1, 1, 0, '-', 1, 1, NULL),
(79, '525112', 13, 'Seminar Internasional dalam rangka Dies Natalis Unnes\r\n', 256016000, 1, 256016000, 1, 1, 1, 0, '-', 1, 1, NULL),
(80, '525112', 13, 'Pagelaran Seni (Dies Natalis)\r\n', 32836000, 1, 32836000, 1, 1, 1, 0, '-', 1, 1, NULL),
(81, '525112', 13, 'Pengadaan Persediaan bahan habis pakai (ATK)\r\n', 150000000, 1, 150000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(82, '525112', 13, 'Keperluan Pokok (minuman sehari2, langganan koran/majalah, fotokopi)\r\n', 252450000, 1, 252450000, 1, 1, 1, 0, '-', 1, 1, NULL),
(83, '525112', 13, 'Pengadaan Seragam (PSH,Jas Senat,Batik,OR,Satpam,CS,Jasket,toga senat)\r\n', 400000000, 1000, 400000, 1, 1, 1, 0, '-', 1, 1, NULL),
(84, '525112', 13, 'Upgrade/integrasi SIM\r\n', 16000000, 1, 16000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(85, '525114', 14, 'Pemeliharaan sarana prasarana\r\n', 20000000, 10, 2000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(86, '525114', 14, 'Pemeliharaan peralatan perkantoran\r\n', 270000000, 100, 2700000, 1, 1, 1, 0, '-', 1, 1, NULL),
(87, '525114', 14, 'Pemeliharaan Kendaraan Roda 2\r\n', 1302000, 1, 1302000, 1, 1, 1, 0, '-', 1, 1, NULL),
(88, '525114', 14, 'Pemeliharaan Kendaraan Roda 4\r\n', 98518000, 4, 24629500, 1, 1, 1, 0, '-', 1, 1, NULL),
(89, '525114', 14, 'Pemeliharaan Jaringan Internet\r\n', 75000000, 1, 75000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(90, '525114', 14, 'Pengadaan Alat Penunjang Perkantoran\r\n', 576000000, 48, 12000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(91, '525114', 15, 'Pemeliharaan/ rehab ringan gedung\r\n', 598250000, 10, 59825000, 1, 1, 1, 0, '-', 1, 1, NULL),
(92, '525114', 15, 'Penataan halaman dan taman\r\n', 100000000, 1, 100000000, 1, 1, 1, 0, '-', 1, 1, NULL),
(93, '2', 1, 'afkaje', 281, 89791, 8797, 1, 1, 1, 0, '0', 1, 1, 1),
(94, '2', 16, 'WU', 1000000, 1, 1000000, 1, 1, 2, 0, '0', 0, 1, NULL),
(95, '2', 16, 'Bismillah', 5000, 1, 2, 1, 1, 2, 0, '0', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
`id` int(11) NOT NULL,
  `kode_layanan` varchar(10) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_layanan` varchar(200) NOT NULL,
  `target` varchar(20) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `versi` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `kode_layanan`, `id_program`, `nama_layanan`, `target`, `id_rekaman`, `versi`, `status`, `recoverable`) VALUES
(1, '003', 1, 'Layanan Pendidikan Mahasiswa Pascasarjana\r\n', ' 1062978000 ', 0, '', 1, NULL),
(2, '004', 1, 'Layanan Pendidikan Badan Layanan Umum (BLU)', ' 1062978000 ', 0, '', 1, NULL),
(3, '003', 1, 'Administrasi Pendidikan Mahasiswa Pascasarjana\r\n', ' 81031000 ', 0, '', 1, NULL),
(4, '2', 2, '[UPDATED] Administrasi Pendidikan Mahasiswa Pascasarjana ', '81031000', 0, '0', 1, NULL),
(5, '001', 3, 'Tanpa Sub Output', '24000000', 0, '', 1, NULL),
(6, '001', 4, 'Tanpa sub output\r\n', '372015000', 0, '', 1, NULL),
(7, '003', 5, 'Mahasiswa Baru Pascasarjana', '298503000', 0, '', 1, NULL),
(8, '001', 6, 'tanpa sub output', '544589000', 0, '', 1, NULL),
(9, '', 7, 'Tanpa Sub Output', '378444000', 0, '', 1, NULL),
(10, '001', 8, 'Tenaga Pendidik', '689041000', 0, '', 1, NULL),
(11, '002', 8, 'Tenaga Kependidikan', '66090000', 0, '', 1, NULL),
(12, '001', 9, 'Bantuan Penelitian', '1059516000', 0, '', 1, NULL),
(13, '001', 10, 'Tanpa sub output', '2779752000', 0, '', 1, NULL),
(14, '', 11, 'Tanpa sub output', '960820000', 0, '', 1, NULL),
(15, '001', 12, 'Tanpa sub output', '658250000', 0, '', 1, NULL),
(16, '0024', 19, 'Bismillah', '1000000', 0, '0', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penanggung_jawab`
--

CREATE TABLE IF NOT EXISTS `penanggung_jawab` (
`id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`id`, `nama`, `status`, `recoverable`) VALUES
(1, 'Asdir I', 0, NULL),
(2, 'Asdir II', 1, NULL),
(3, 'Kasubbag Umum dan Kepegawaian', 1, NULL),
(4, 'Pokja Penelitian dan Pengabdian Masyarakat', 1, NULL),
(5, 'Kasubbag Umum dan Kepegawaian', 1, NULL),
(6, 'Asdir I dan Kaprodi', 1, NULL),
(7, 'Pokja Jejaring Internasional', 1, NULL),
(8, 'Pokja Penjaminan Mutu', 1, NULL),
(9, 'Pokja Penjaminan Mutu, Pokja Verifikasi Tesis dan Disertasi', 1, NULL),
(10, 'Pokja Kemahasiswaan dan Alumni', 1, NULL),
(11, 'Pokja Kemahasiswaan dan Alumni dan BEM', 0, NULL),
(12, 'Pokja Kemahasiswaan dan Alumni dan Kaprodi POR', 1, NULL),
(13, 'Pokja Jejaring Internasional', 1, NULL),
(14, 'Direksi', 1, NULL),
(15, 'Kasubbag Umum dan Kepegawaian', 1, NULL),
(16, 'Kaprodi (PEP, Kejuruan, Indonesia, IPA, Inggris)', 1, NULL),
(17, 'Pokja Kepengawasan Sekolah', 0, NULL),
(18, 'Panitia Dies Natalis PPs', 1, NULL),
(19, 'Pokja Teknologi Informasi', 1, NULL),
(20, 'Direksi', 1, NULL),
(21, 'Asdir III', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`id` int(11) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(200) NOT NULL,
  `target` varchar(20) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `kode_program`, `nama_program`, `target`, `tahun_anggaran`, `id_rekaman`, `status`) VALUES
(1, '5308.015', 'Layanan  Pendidikan [Base Line]', ' 1439284000 ', 2015, 0, 1),
(2, '5308.016', 'Layanan Administrasi Pendidikan\r\n[Base Line]', ' 81031000 ', 2015, 0, 1),
(3, '5308.028', 'Hasil Pengabdian Kepada Masyarakat [Base Line]', ' 24000000 ', 2015, 0, 1),
(4, '5308.046', 'Alat Pendidikan Pendukung Pembelajaran [Base Line]', ' 372015000 ', 2015, 0, 1),
(5, '5308.061', 'Mahasiswa Baru\r\n[Base Line]', ' 298503000 ', 2015, 0, 1),
(6, '5308.062', 'Prodi Memenuhi Standar Mutu Pendidikan\r\n[Base Line]', ' 544589000 ', 2015, 0, 1),
(7, '5308.063', 'Layanan pemberdayaan mahasiswa\r\n[Base Line]', ' 378444000 ', 2015, 0, 1),
(8, '5308.064', 'Pendidik dan Tenaga Kependidikan Peserta Pengembangan SDM\r\n[Base Line]', ' 755131000 ', 2015, 0, 1),
(9, '5308.065', 'Hasil Penelitian [Base Line]', ' 1059516000 ', 2015, 0, 1),
(10, '5308.994', 'Layanan Perkantoran [Base Line]', ' 2779752000 ', 2015, 0, 1),
(11, '5308.997', 'Peralatan dan Fasilitas Perkantoran [Base Line]', ' 960820000 ', 2015, 0, 1),
(12, '5308.998', 'Gedung/Bangunan[Base Line]', ' 658250000 ', 2015, 0, 1),
(13, '50123.242', 'Alfian Faiz', '90000', 2015, 0, 1),
(14, '50123.2424', 'Bismillah', '7192', 2015, 0, 1),
(15, '50123.241', 'Bismillah', '241321342', 2015, 0, 1),
(16, '2413', 'Bismillah', '2132131', 2015, 0, 1),
(17, '50123.241', 'Semua bisa', '900002', 2018, 0, 1),
(18, '50123.241', 'Nikah :)', '50000000', 2021, 0, 1),
(19, '50123.241', 'Nikah :)', '5000000', 2020, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE IF NOT EXISTS `realisasi` (
`id` int(11) NOT NULL,
  `tanggal_input` date NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `nominal` int(18) NOT NULL,
  `bulan` int(2) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `versi` varchar(20) NOT NULL,
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`id`, `tanggal_input`, `id_kegiatan`, `nominal`, `bulan`, `id_rekaman`, `versi`, `recoverable`) VALUES
(1, '2016-01-19', '1', 3648, 1, 1, '1', NULL),
(2, '2016-01-20', '2', 1000, 1, 1, '1', NULL),
(3, '2016-01-06', '3', 1000, 1, 1, '1', NULL),
(4, '2016-01-04', '4', 1000, 2, 1, '1', NULL),
(5, '2016-01-22', '5', 1000, 2, 1, '1', NULL),
(6, '2016-01-22', '6', 1000, 2, 1, '1', NULL),
(7, '2016-01-22', '7', 1000, 3, 1, '1', NULL),
(8, '2016-01-15', '8', 1000, 3, 1, '1', NULL),
(9, '2016-01-14', '9', 1000, 3, 1, '1', NULL),
(10, '2016-01-06', '7', 100, 2, 1, '1', NULL),
(11, '2016-01-05', '7', 100, 1, 1, '1', NULL),
(12, '2016-01-06', '8', 100, 2, 1, '1', NULL),
(13, '2016-01-11', '8', 100, 1, 1, '1', NULL),
(14, '2016-01-07', '9', 100, 2, 1, '1', NULL),
(15, '2016-01-14', '9', 100, 1, 1, '1', NULL),
(16, '2016-01-21', '10', 100, 1, 1, '1', NULL),
(17, '2016-01-14', '13', 200000, 1, 1, '1', NULL),
(18, '2016-01-14', '11', 4444, 1, 1, '1', NULL),
(19, '2016-02-07', '1', 20000, 2, 1, '1', 1),
(20, '2016-02-24', '3', 90000, 3, 1, '1', 1),
(21, '2016-02-17', '4', 700000, 5, 1, '1', 1),
(22, '2016-02-10', '1', 10000, 6, 1, '1', 1),
(23, '2016-02-16', '1', 1000000, 7, 1, '1', 1),
(24, '2016-02-16', '1', 50000, 8, 1, '1', 1),
(25, '2016-02-10', '1', 20000, 9, 1, '1', 1),
(26, '2016-02-15', '1', 50000, 10, 1, '1', 1),
(27, '2016-02-10', '1', 500000, 11, 1, '1', 1),
(28, '2016-02-25', '1', 60000, 12, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reco_kegiatan`
--

CREATE TABLE IF NOT EXISTS `reco_kegiatan` (
`id` int(11) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `target` int(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `penanggung_jawab` varchar(70) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `bulan` int(2) DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reco_kegiatan`
--

INSERT INTO `reco_kegiatan` (`id`, `kode_kegiatan`, `id_layanan`, `nama_kegiatan`, `target`, `volume`, `harga_satuan`, `satuan`, `sumber_dana`, `penanggung_jawab`, `id_rekaman`, `status`, `bulan`, `id_kegiatan`, `waktu_update`) VALUES
(1, '525112', 4, 'penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana\r\n', 17250000, 15, 1150000, 'Judul', 'PNBP', 'Pokja Penelitian dan Pengabdian Masyarakat', 0, 1, 1, 11, '2016-01-18 10:39:38'),
(2, '525112', 4, 'Pelatihan/Workshop penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana\r\n', 21440000, 25, 857600, '-', 'PNBP', 'Pokja Penelitian dan Pengabdian Masyarakat', 0, 1, 1, 10, '2016-01-18 10:39:51'),
(3, '4', 4, 'penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana', 17250000, 90000, 1150000, '1', '1', '2', 0, 1, 9, 11, '2016-01-18 10:40:03'),
(4, '525112', 1, 'Matrikulasi Pascasarjana\r\n', 8368000, 1000, 8368, '1', '1', '1', 0, 1, 1, 4, '2016-01-19 00:58:54'),
(5, '525112', 1, 'Dosen luar biasa/tamu pascasarjana\r\n', 467500000, 200, 2337500, '1', '1', '1', 0, 1, 1, 6, '2016-01-19 00:59:28'),
(6, '9900', 4, 'Pelatihan/Workshop penyusunan buku ajar dan buku teks nasioanal/internasional pascasarjana', 21440000, 25, 857600, '1', '1', '1', 0, 1, 1, 10, '2016-01-19 08:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `reco_layanan`
--

CREATE TABLE IF NOT EXISTS `reco_layanan` (
`id` int(11) NOT NULL,
  `kode_layanan` varchar(10) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_layanan` varchar(200) NOT NULL,
  `target` varchar(20) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `id_layanan` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reco_layanan`
--

INSERT INTO `reco_layanan` (`id`, `kode_layanan`, `id_program`, `nama_layanan`, `target`, `id_rekaman`, `status`, `id_layanan`, `waktu_update`) VALUES
(1, '003', 2, 'Administrasi Pendidikan Mahasiswa Pascasarjana', '81031000', 0, 1, 4, '2016-01-18 10:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `reco_penanggung_jawab`
--

CREATE TABLE IF NOT EXISTS `reco_penanggung_jawab` (
`id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reco_program`
--

CREATE TABLE IF NOT EXISTS `reco_program` (
`id` int(11) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(200) NOT NULL,
  `target` varchar(20) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `id_rekaman` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reco_program`
--

INSERT INTO `reco_program` (`id`, `kode_program`, `nama_program`, `target`, `tahun_anggaran`, `id_rekaman`, `id_program`, `waktu_update`) VALUES
(1, '50123.241', 'sakfjhaef', '2413213', 2016, 0, 15, '2016-01-18 09:45:13'),
(2, '50123.241', '8000', '80000', 2016, 0, 17, '2016-01-18 09:51:50'),
(3, '50123.241', 'Semua bisa', '80000', 2016, 0, 17, '2016-01-18 09:54:53'),
(4, '50123.241', 'Semua bisa', '90000', 2016, 0, 17, '2016-01-18 09:54:59'),
(5, '50123.241', 'Semua bisa', '900002', 2016, 0, 17, '2016-01-18 10:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `reco_realisasi`
--

CREATE TABLE IF NOT EXISTS `reco_realisasi` (
`id` int(11) NOT NULL,
  `tanggal_input` date NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `nominal` int(18) NOT NULL,
  `bulan` int(2) NOT NULL,
  `id_rekaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reco_satuan`
--

CREATE TABLE IF NOT EXISTS `reco_satuan` (
`id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reco_sumber_dana`
--

CREATE TABLE IF NOT EXISTS `reco_sumber_dana` (
`id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deskripsi` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekaman_pengguna`
--

CREATE TABLE IF NOT EXISTS `rekaman_pengguna` (
`id` int(11) NOT NULL,
  `kode_rekaman` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(20) NOT NULL,
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
`id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`, `deskripsi`, `status`, `recoverable`) VALUES
(1, 'Rupiah', 'Nominal Rupiah', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE IF NOT EXISTS `sumber_dana` (
`id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `deskripsi` varchar(400) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `recoverable` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `nama`, `deskripsi`, `status`, `recoverable`) VALUES
(1, 'PNBP', '', 1, NULL),
(2, 'SPP', '', 1, NULL),
(3, 'Hibah', '', 1, NULL),
(4, 'APBN', '', 1, NULL),
(5, 'Koperasi', '', 1, NULL),
(6, 'Pribadi', 'Sumber Dana Pribadi', 1, NULL),
(7, 'Pribadi', 'Sumber Dana Pribadi', 1, NULL),
(8, 'Masyarakat', 'dana dari urunan', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tlp` varchar(14) NOT NULL,
  `unitbagian` varchar(20) NOT NULL,
  `recoverable` int(1) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `level`, `status`, `nip`, `tlp`, `unitbagian`, `recoverable`, `username`, `password`) VALUES
(1, 'admin', 2, 1, '-', '-', 'Administrator', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', 0, 1, '5302413039', '087700860194', 'TU', NULL, 'alfian2', 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, 'no name', 1, 1, '0000000', '000000000', 'Admin E kegiatan', NULL, 'noname', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'unknow', 0, 1, '0000000', '000000000', 'Pembinaan', NULL, 'uptoyou', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_kegiatan`
--
ALTER TABLE `detil_kegiatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_kegiatan`
--
ALTER TABLE `reco_kegiatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_layanan`
--
ALTER TABLE `reco_layanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_penanggung_jawab`
--
ALTER TABLE `reco_penanggung_jawab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_program`
--
ALTER TABLE `reco_program`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_realisasi`
--
ALTER TABLE `reco_realisasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_satuan`
--
ALTER TABLE `reco_satuan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reco_sumber_dana`
--
ALTER TABLE `reco_sumber_dana`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekaman_pengguna`
--
ALTER TABLE `rekaman_pengguna`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_kegiatan`
--
ALTER TABLE `detil_kegiatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `reco_kegiatan`
--
ALTER TABLE `reco_kegiatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reco_layanan`
--
ALTER TABLE `reco_layanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reco_penanggung_jawab`
--
ALTER TABLE `reco_penanggung_jawab`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reco_program`
--
ALTER TABLE `reco_program`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reco_realisasi`
--
ALTER TABLE `reco_realisasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reco_satuan`
--
ALTER TABLE `reco_satuan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reco_sumber_dana`
--
ALTER TABLE `reco_sumber_dana`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekaman_pengguna`
--
ALTER TABLE `rekaman_pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
