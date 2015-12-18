-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2015 at 01:37 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_angkutan`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkot`
--

CREATE TABLE IF NOT EXISTS `angkot` (
  `id_angkot` int(5) NOT NULL AUTO_INCREMENT,
  `nama_angkot` varchar(5) NOT NULL,
  `tarif_angkot` int(10) NOT NULL,
  `ciri_angkot` mediumtext NOT NULL,
  PRIMARY KEY (`id_angkot`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `angkot`
--

INSERT INTO `angkot` (`id_angkot`, `nama_angkot`, `tarif_angkot`, `ciri_angkot`) VALUES
(1, 'D1', 4000, 'Warna biru putih'),
(2, 'D2', 4000, 'Warna biru orange'),
(3, 'D3', 4000, 'Warna biru merah'),
(4, 'D4', 4000, 'Warna biru kuning'),
(5, 'D5', 4000, 'Warna biru'),
(6, 'D6', 4000, 'Warna biru muda'),
(7, 'D7', 4000, 'Warna biru abu-abu'),
(8, 'D8', 4000, 'Warna biru tua'),
(9, 'D9', 4000, 'Warna biru hijau'),
(10, 'D10', 4000, 'Warna biru tua'),
(11, 'Jalur', 4000, '');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_berita` date NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `nama_berita` varchar(30) NOT NULL,
  `isi_berita` text NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tgl_berita`, `judul_berita`, `nama_berita`, `isi_berita`) VALUES
(1, '2015-12-03', 'Tarif Angkutan Umum di Cirebon Naik 100 Persen', 'umum', '<p><span style="color: #333333; font-family: Arial, sans-serif; font-size: 15px; line-height: 25px;">Kenaikan harga bahan bakar minyak (BBM) berdampak naiknya tarif angkutan kota. Kenaikan tarif angkot mencapai 100 persen. Siswa yang akan berangkat sekolah hari ini kaget dengan pemberlakuan tarif baru secara sepihak itu.</span></p>\r\n<p><span style="color: #333333; font-family: Arial, sans-serif; font-size: 15px; line-height: 25px;">Dia tidak mengetahui berita ihwal kenaikan harga BBM bersubsidi yang berdampak naiknya ongkos angkutan umum. Adapun ibunya tetap memberi uang saku Rp 10.000 hari ini, yang mencakup ongkos angkot. Sisa uang jajan tersebut biasanya dia tabung di sekolah. "Kalau dulu ongkos pulang-pergi hanya Rp 3.000, sekarang berat banget, menjadi Rp 6.000,"&nbsp;</span><br style="color: #333333; font-family: Arial, sans-serif; font-size: 15px; line-height: 25px;" /><span style="color: #333333; font-family: Arial, sans-serif; font-size: 15px; line-height: 25px;">Tarif angkutan umum di Cirebon untuk pelajar naik 100 persen, dari semula Rp 1.500 menjadi Rp 3.000. Sedangkan tarif umum naik Rp 2.000 dari semula Rp 3.000 menjadi Rp 5.000.</span></p>\r\n<p>&nbsp;</p>'),
(2, '2015-05-28', 'Protes One Way Jalan Kartini, Puluhan Sopir Angkot D7 Demo di Gunung Sari', 'Umum', '<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">Puluhan sopir angkutan umum D7 melakukan aksi unjuk rasa di Jalan Kartini-Bundaran lampu merah Gunung Sari menuntut agar penetapan satu jalur di Jalan Kartini untuk dikembalikan menjadi dua arah. Dalam aksinya ini, pengunjuk rasa memarkirkan kendaraannya di Jalan Kartini sampai ke lampu merah Gunung Sari. Tidak hanya memarkirkan kendarannya di jalan, pengunjuk rasa juga membakar ban bekas di perempatan lampu merah Gunung Sari.</p>\r\n<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">Dalam orasinya mereka menilai terkait penetapan satu jalur di Jalan Kartini, paguyuban angkutan D7 merasa dirugikan, karena pendapatan berkurang. Selain dari hal ini penetapan one way di Jalan Kartini juga tidak mempunyai kekuatan hukum yang kuat. Beberapa faktor yang menyebabkan kebijakan penepatan one way salah satunya terkait audiensi yang dilakukan DPC Organda mengenai penetapan kebijakan trayek angkot dan status one way ini tidak melibatkan paguyuban angkot D7 sehingga kebijakan ini terkesan hanya sepihak.</p>\r\n<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">Mereka juga menuntut untuk membubarkan DPC Organda Cirebon, menuntut untuk Kepala Dishubinkom dan Walikota Cirebon agar turun dari jabatannya dan kembalikan trayek seperti semula serta hapuskan kebijakan One Way. Apabila tuntutannya tidak dipenuhi, mereka mengancam akan menduduki Jalan Kartini sampai tuntutannya dipenuhi. Dalam hal ini kami paguyuban angkot D7 tidak ingin berbenturan dengan pihak manapun khususnya sesama angkot.</p>\r\n<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">&ldquo;Dishub sudah ingkar janji, Dishub janjikan kami one way satu bulan, liat hasil evaluasi, tapi hasil evaluasi tidak pernah kasih tahu. Dishub juga berjanji akan menaruh anggotanya di trayek yang rawan benturan sesama sopir angkot, tapi tidak ada anggota yang menjaga.</p>\r\n<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">Sementara itu, Sekretaris Dishubinkom Kota Cirebon, yang menemui pengunjuk rasa mengatakan keputusan Jalur Kartini bukan keputusan pihaknya, namun keputusan ada di tangan Forum lalu lintas. Pihaknya juga mengatakan akan mengadakan rapat pleno untuk membahas permasalahan ini.</p>\r\n<p style="margin: 0px 0px 10px; color: #454545; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; text-align: justify;">&ldquo;Keputusan melalui rapat forum, dengan adanya masukan besok akan rapat pleno akan kami bahas. Insya Allah keputusannya bisa diterima semua pihak.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE IF NOT EXISTS `jalan` (
  `id_jalan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_jalan` varchar(100) NOT NULL,
  `jarak` float NOT NULL,
  PRIMARY KEY (`id_jalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama_jalan`, `jarak`) VALUES
(1, 'Jalan Elang Raya', 1.4),
(2, 'Jalan Rajawali Raya A', 1.5),
(3, 'Jalan Rajawali Raya B', 1.6),
(4, 'Jalan Ahmad Yani A', 2.5),
(5, 'Jalan Ahmad Yani B', 2.4),
(6, 'Jalan Benteng A', 1.4),
(7, 'Jalan Benteng B', 1.3),
(8, 'Jalan Kesunean A', 2.3),
(9, 'Jalan Kesunean B', 2.2),
(10, 'Jalan RA Kartini A', 1.3),
(11, 'Jalan RA Kartini B', 1.4),
(12, 'Jalan Diponegoro', 2.4),
(13, 'Jalan Sisingamangaraja', 2.6),
(14, 'Jalan Perumnas', 3.2),
(15, 'Jalan Sunyaragi A', 1.2),
(16, 'Jalan Sunyaragi B', 1.1),
(17, 'Jalan Kesambi Raya A', 1.6),
(18, 'Jalan Kesambi Raya B', 1.5),
(19, 'Jalan Jagasatru', 2.4),
(20, 'Jalan Pulasaren', 2.7),
(21, 'Jalan Lemah Wungkuk', 3.2),
(22, 'Jalan Tuparev', 2.2),
(23, 'Jalan Dawuan', 3.1),
(24, 'Jalan Brigjen Dharsono A', 1.2),
(25, 'Jalan Brigjen Dharsono B', 1.1),
(26, 'Jalan Pemuda A', 1.9),
(27, 'Jalan Pemuda B', 1.8),
(28, 'Jalan Majasem A', 1.7),
(29, 'Jalan Majasem B', 1.6),
(30, 'Jalan Evakuasi A', 1.5),
(31, 'Jalan Evakuasi B', 1.4),
(32, 'Jalan Cipto Mangunkusumo A', 2.2),
(33, 'Jalan Cipto Mangunkusumo B', 2.1),
(34, 'Jalan Pekalangan', 3.4),
(35, 'Jalan KS Tubun A', 2.5),
(36, 'Jalan KS Tubun B', 2.4),
(37, 'Jalan Pilang Raya', 2.8),
(38, 'Jalan Penggung Raya A', 2.4),
(39, 'Jalan Penggung Raya B', 2.3),
(40, 'Jalan Kanggraksan A', 2.4),
(41, 'Jalan Kanggraksan B', 2.3),
(42, 'Jalan Pandesan', 3.3),
(43, 'Jalan Siliwangi', 3.1),
(44, 'Jalan Merdeka', 2.5),
(45, 'Jalan Kalitanjung A', 2.3),
(46, 'Jalan Kalitanjung B', 2.2),
(47, 'Jalan Yos Sudarso A', 1.7),
(48, 'Jalan Yos Sudarso B', 1.6),
(49, 'Jalan Veteran A', 2.2),
(50, 'Jalan Veteran B', 2.1),
(51, 'Jalan Karanggetas A', 2.2),
(52, 'Jalan Karanggetas B', 2.3),
(53, 'Jalan Bima Stadion A', 1.9),
(54, 'Jalan Bima Stadion B', 1.8),
(55, 'Jalan Wahidin Sudirohusodo', 1.8),
(56, 'Jalan Pekiringan', 3.3),
(57, 'Jalan Dr Sudarsono', 1.4),
(58, 'Jalan Perjuangan A', 1.7),
(59, 'Jalan Perjuangan B', 1.6),
(60, 'Jalan Pangeran Drajat', 3.2);

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE IF NOT EXISTS `jalur` (
  `id_jalur` int(5) NOT NULL AUTO_INCREMENT,
  `id_angkot` int(5) NOT NULL,
  `no_urut` int(3) NOT NULL,
  `nama_jalan` int(5) NOT NULL,
  PRIMARY KEY (`id_jalur`),
  KEY `nama_jalan` (`nama_jalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `id_angkot`, `no_urut`, `nama_jalan`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 4),
(4, 1, 4, 8),
(5, 1, 5, 47),
(6, 1, 6, 6),
(7, 1, 7, 49),
(8, 1, 8, 51),
(9, 1, 9, 10),
(10, 1, 10, 55),
(11, 1, 11, 12),
(12, 1, 12, 13),
(13, 1, 13, 7),
(14, 1, 14, 48),
(15, 1, 15, 9),
(16, 1, 16, 5),
(17, 1, 17, 14),
(18, 1, 18, 3),
(19, 2, 1, 1),
(20, 2, 2, 60),
(21, 2, 3, 15),
(22, 2, 4, 17),
(23, 2, 5, 56),
(24, 2, 6, 19),
(25, 2, 7, 20),
(26, 2, 8, 21),
(27, 2, 9, 44),
(28, 2, 10, 6),
(29, 2, 11, 13),
(30, 2, 12, 12),
(31, 2, 13, 55),
(32, 2, 14, 10),
(33, 2, 15, 22),
(34, 2, 16, 23),
(35, 2, 17, 24),
(36, 2, 18, 53),
(37, 2, 19, 26),
(38, 2, 20, 58),
(39, 2, 21, 28),
(40, 2, 22, 45),
(41, 2, 23, 30),
(42, 2, 24, 40),
(43, 2, 25, 4),
(44, 3, 1, 1),
(45, 3, 2, 3),
(46, 3, 3, 5),
(47, 3, 4, 39),
(48, 3, 5, 41),
(49, 3, 6, 31),
(50, 3, 7, 46),
(51, 3, 8, 29),
(52, 3, 9, 59),
(53, 3, 10, 25),
(54, 3, 11, 27),
(55, 3, 12, 33),
(56, 3, 13, 11),
(57, 3, 14, 50),
(58, 3, 15, 52),
(59, 3, 16, 42),
(60, 3, 17, 34),
(61, 3, 18, 56),
(62, 3, 19, 20),
(63, 3, 20, 19),
(64, 3, 21, 18),
(65, 4, 1, 1),
(66, 4, 2, 3),
(67, 4, 3, 5),
(68, 4, 4, 39),
(69, 4, 5, 41),
(70, 4, 6, 31),
(71, 4, 7, 29),
(72, 4, 8, 16),
(73, 4, 9, 25),
(74, 4, 10, 23),
(75, 4, 11, 22),
(76, 4, 12, 11),
(77, 4, 13, 55),
(78, 4, 14, 12),
(79, 4, 15, 13),
(80, 4, 16, 7),
(81, 4, 17, 21),
(82, 4, 18, 34),
(83, 4, 19, 56),
(84, 4, 20, 19),
(85, 4, 21, 18),
(86, 4, 22, 60),
(87, 5, 1, 1),
(88, 5, 2, 2),
(89, 5, 3, 14),
(90, 5, 4, 4),
(91, 5, 5, 60),
(92, 5, 6, 56),
(93, 5, 7, 19),
(94, 5, 8, 20),
(95, 5, 9, 21),
(96, 5, 10, 44),
(97, 5, 11, 34),
(98, 5, 12, 35),
(99, 5, 13, 51),
(100, 5, 14, 49),
(101, 5, 15, 43),
(102, 5, 16, 55),
(103, 5, 17, 10),
(104, 5, 18, 32),
(105, 5, 19, 15),
(106, 6, 1, 1),
(107, 6, 2, 17),
(108, 6, 3, 34),
(109, 6, 4, 35),
(110, 6, 5, 10),
(111, 6, 6, 55),
(112, 6, 7, 43),
(113, 6, 8, 49),
(114, 6, 9, 51),
(115, 6, 10, 56),
(116, 6, 11, 19),
(117, 6, 12, 18),
(118, 6, 13, 60),
(119, 6, 14, 3),
(120, 6, 15, 5),
(121, 6, 16, 14),
(122, 7, 1, 1),
(123, 7, 2, 60),
(124, 7, 3, 19),
(125, 7, 4, 56),
(126, 7, 5, 34),
(127, 7, 6, 35),
(128, 7, 7, 51),
(129, 7, 8, 49),
(130, 7, 9, 10),
(131, 7, 10, 55),
(132, 7, 11, 37),
(133, 7, 12, 23),
(134, 7, 13, 22),
(135, 7, 14, 32),
(136, 7, 15, 26),
(137, 7, 16, 24),
(138, 7, 17, 58),
(139, 7, 18, 15),
(140, 7, 19, 40),
(141, 7, 20, 38),
(142, 7, 21, 4),
(143, 8, 1, 1),
(144, 8, 2, 60),
(145, 8, 3, 33),
(146, 8, 4, 22),
(147, 8, 5, 23),
(148, 8, 6, 37),
(149, 8, 7, 55),
(150, 8, 8, 11),
(151, 8, 9, 50),
(152, 8, 10, 55),
(153, 8, 11, 56),
(154, 8, 12, 19),
(155, 8, 13, 3),
(156, 9, 1, 1),
(157, 9, 2, 60),
(158, 9, 3, 17),
(159, 9, 4, 57),
(160, 9, 5, 32),
(161, 9, 6, 55),
(162, 9, 7, 22),
(163, 9, 8, 23),
(164, 9, 9, 25),
(165, 9, 10, 54),
(166, 9, 11, 27),
(167, 9, 12, 59),
(168, 9, 13, 16),
(169, 9, 14, 29),
(170, 9, 15, 31),
(171, 9, 16, 46),
(172, 9, 17, 41),
(173, 9, 18, 39),
(174, 9, 19, 5),
(175, 10, 1, 1),
(176, 10, 2, 5),
(177, 10, 3, 39),
(178, 10, 4, 41),
(179, 10, 5, 46),
(180, 10, 6, 31),
(181, 10, 7, 16),
(182, 10, 8, 29),
(183, 10, 9, 59),
(184, 10, 10, 54),
(185, 10, 11, 25),
(186, 10, 12, 27),
(187, 10, 13, 33),
(188, 10, 14, 11),
(189, 10, 15, 36),
(190, 10, 16, 52),
(191, 10, 17, 7),
(192, 10, 18, 42),
(193, 10, 19, 34),
(194, 10, 20, 35),
(195, 10, 21, 10),
(196, 10, 22, 32),
(197, 10, 23, 26),
(198, 10, 24, 24),
(199, 10, 25, 53),
(200, 10, 26, 58),
(201, 10, 27, 28),
(202, 10, 28, 15),
(203, 10, 29, 30),
(204, 10, 30, 45),
(205, 10, 31, 40),
(206, 10, 32, 38),
(207, 10, 33, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama_lengkap`, `email`, `password`) VALUES
(1, 'Dian Githa P ', 'dian@gmail.com', '5787be38ee03a9ae5360f54d9026465f'),
(2, 'Aninda Cyntia', 'namasayaaninda@gmail.com', '21232f297a57a5a743894a0e4a801fc3');
