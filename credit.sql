-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 01:02 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `credit`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int(11) NOT NULL AUTO_INCREMENT,
  `KTP_ID` bigint(16) NOT NULL,
  `nama_files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id_files`, `KTP_ID`, `nama_files`, `tanggal_upload`) VALUES
(1, 1111111111111112, '1111111111111112_1.xlsx', '2017-03-03 08:18:09'),
(3, 1111111111111113, '1111111111111113_3.xlsx', '2017-03-03 13:05:14'),
(4, 1111111111111114, '1111111111111114_4.xlsx', '2017-03-03 13:12:02'),
(5, 1111111111111115, '1111111111111115_5.xlsx', '2017-03-03 13:15:52'),
(6, 1111111111111112, '1111111111111112_6.docx', '2017-03-07 05:10:51'),
(7, 1111111111111111, '1111111111111111_7.xlsx', '2017-03-17 01:01:58'),
(8, 1111111111111113, '1111111111111113_8.xlsx', '2017-03-17 01:03:24'),
(9, 1111111111111114, '1111111111111114_9.xlsx', '2017-03-17 01:04:01'),
(10, 1111111111111117, '1111111111111117_10.xlsx', '2017-03-17 01:04:10'),
(11, 1111111111111116, '1111111111111116_11.xlsx', '2017-03-17 01:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kredit`
--

CREATE TABLE IF NOT EXISTS `jenis_kredit` (
  `ID_kredit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kredit` varchar(50) NOT NULL,
  `deskripsi` varchar(5000) NOT NULL,
  `ID_user` int(10) NOT NULL,
  PRIMARY KEY (`ID_kredit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jenis_kredit`
--

INSERT INTO `jenis_kredit` (`ID_kredit`, `nama_kredit`, `deskripsi`, `ID_user`) VALUES
(1, 'Kredit Usaha Rakyat', 'Semua beasiswa ditangani oleh Divisi Pembinaan Program Kemahasiswaan dan Kesejahteraan Mahasiswa, salah satu beasiswa yang sering diurus tiap tahunnya adalah PPA. Beasiswa ini bertujuan membantu meringankan beban orang tua mahasiswa terutama dari keluarga kurang mampu secara ekonomi. \r\nBeasiswa PPA adalah beasiswa yang diberikan untuk peningkatan pemeratan dan kesempatan belajar bagi mahasiswa yang mengalami kesulitan membayar biaya pendidikannya sebagai akibat krisis ekonomi, terutama bagi mahasiswa yang berprestasi akademik.\r\n\r\nAdapun tujuan PPA secara umum yaitu :\r\n- Meningkatkan pemerataan dan kesempatan belajar bagi mahasiswa yang mengalami kesulitan membayar pendidikan.\r\n- Mendorong dan mempertahankan semangat belajar mahasiswa agar mereka dapat menyelesaikan studi/pendidikan tepat waktunya.\r\n- Mendorong untuk meningkatkan prestasi akademik sehingga memacu peningkatan kualitas pendidikan.\r\nBeasiswa ini dananya bersumber dari DIPA UPI yang diperuntukan semua mahasiswa pada semua jurusan dan jenjang pendidikan di UPI kecuali mahasiswa Sekolah Pascasarjana. \r\nMahasiswa yang ingin mengajukan beasiswa PPA mesti memenuhi beberapa persyaratan, yaitu :\r\n- Permohonan tertulis dari mahasiswa yang bersangkurang ditujukan kepada Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan melalui Pembantu Dekan Bidang Akademik dan Keamhasiswaan pada fakultas masing-masing.\r\n- Surat keterangan tidak mampu dari kelurahan/Desa setempat.\r\n- Masih aktif kuliah ( tidak sedang menjalani cuti kuliah ) minimal duduk di semester 3, yang dibuktikan dengan kartu tanda mahasiswa (KTM) dan kwitansi pembayaran SPP terakhir.\r\n- Keterangan dari Fakultas yang menyatakan berkelakuan baik, tidak pernah melanggar tata tertib kampus dan tidak sedang menerima beasiswa dari sumber lain.\r\n- Mahasiswa mengikuti wawancara yang dilaksanakan oleh ketua jurusan masing-masing.\r\n- IPK minimal 3,00 bagi mahasiswa semester 3 ke atas.\r\n- Diutamakan yang aktif dalam kegiatan kemahasiswaan yang diprogramkan oleh Universitas.\r\nSecara praktisnya, mahasiswa yang sudah duduk pada semester 3 diajukan oleh ketua angkatan masing-masing program studi. Pada tahap pertama, biasanya mahasiswa yang langsung menerima PPA tiga orang, sisanya diberikan pada tahun selanjutnya. \r\nAdapun prosedur yang mesti ditempuh terhadap pengajuan beasiswa harus melalui banyak tahapan. Ketika permohonan pengajuan yang ditujukan kepada Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan harus melalui Jurusan terlebih dahulu, atau juga bisa langsung ke fakultas. Setelah itu Jurusan menyeleksi sesuai persyaratan yang ditetapkan dan meneruskan hasilnya termasuk berkas hasil seleksi ke Fakultas. \r\nFakultas meneruskan kepada Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan. Direktorat Pembinaan Kemahasiswaan. Kemudia Direktorat ini mengecek kembali berkas usulan dari Fakultas. Selanjutnya disusun daftar calon usulan dari tiap Fakultas dan disampaikan kepada Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan untuk mendapatkan persetujuan. \r\nPembantu Rektor Bidang Kemahasiswaan dan Kemitraan mengajukan daftar usulan penerima beasiswa PPA ke Dirjen Dikti di Jakarata. Setelah ada persetujuan dari Dirjen Dikti Jakarta kemudian Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan membuat SK penerima beasiswa PPA ditandatangani Rektor. \r\nSelanjutnya Rektor/Pembantu Rektor Bidang Kemahasiswaan dan Kemitraan mengirimkan nomor rekening dan menandatangani perjanjian penerima beasiswa untuk proses pencairan dana. Setelah surat perintah pencaiaran dana (SP2D)diterbitkan oleh KPKN Jakarta, maka Dirjen Dikti segera memberitahu pengiriman dana beasiswa. \r\nPenanggungjawab penyelenggaraan kegiatan /Direktorat Keuangan membuat daftar pembayaran beasiswa dan memberitahu pencairan beasiswa kepada Direktorat Pembinaan Kemahasiswaan. Berdasarkan pemberitahuan dari Direktorat Keuangan, Direktorat Pembinaan Kemahasiswaan membuat pemgumuman/panggilan. Direktorat Pembinaan Kemahasiswaan menyiapkan dan melayani slip untuk pengambilan uang. \r\nTerakhir mahasiswa tinggal mengambil slip Direktorat Pembinaan Kemahasiswaan dan menukarkan ke Direktorat Keuangan. Tentu saja Direktorat Pembinaan Kemahasiswaan mendokumentasikan surat/berkas beasiswa PPA. \r\nPPA Baru sebenarnya sama dengan PPA, hanya saja PPA baru muncul karena beasiswa Technological Professional Skill and Development Project (TPSDP) tidak ada lagi sejak tahun 2005. Beasiswa jenis ini adalah program bantuan terhadap mahasiswa yang dikelola oleh kegiatan Pengembangan Pendidikan Profesional dan Keahlian yang dibiayai sebagian dari pinjaman Bank Pembangunan Asia Loan 1792-INO. Beasiswa TPSDP hanya berlaku untuk mahasiswa FPTK (kecuali PKK) dan FPMIPA pada semua jurusan program non pendidikan.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `ID_kriteria` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_kriteria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_kriteria`, `nama_kriteria`) VALUES
(1, 'Reputasi UKM'),
(2, 'Harga Barang Tanggungan'),
(3, 'Aset UKM'),
(4, 'Dana yang Diajukan'),
(5, 'Kemampuan Mencicil');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_kredit`
--

CREATE TABLE IF NOT EXISTS `kriteria_kredit` (
  `ID_kredit` int(11) NOT NULL,
  `ID_kriteria` int(11) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_kredit`
--

INSERT INTO `kriteria_kredit` (`ID_kredit`, `ID_kriteria`, `bobot`) VALUES
(1, 1, 0.102),
(1, 2, 0.2),
(1, 3, 0.151),
(1, 4, 0.298),
(1, 5, 0.249);

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kredit`
--

CREATE TABLE IF NOT EXISTS `peserta_kredit` (
  `no` int(255) NOT NULL AUTO_INCREMENT,
  `tgl_pendaftaran` date NOT NULL,
  `KTP_ID` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `reputasi` varchar(50) NOT NULL,
  `hargaBarang` varchar(50) NOT NULL,
  `brg_ditanggungkan` int(11) NOT NULL,
  `aset` varchar(50) NOT NULL,
  `aset_ukm` int(255) NOT NULL,
  `dana` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `ID_kredit` int(10) NOT NULL,
  `scor` decimal(5,3) NOT NULL,
  `hitung_ke` int(11) NOT NULL,
  `dana_diajukan` int(11) NOT NULL,
  `lama_cicil` int(1) NOT NULL,
  `cicil_perbulan` int(255) NOT NULL,
  `penghasilan_perbulan` int(255) NOT NULL,
  `mampu_cicil` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `peserta_kredit`
--

INSERT INTO `peserta_kredit` (`no`, `tgl_pendaftaran`, `KTP_ID`, `nama`, `alamat`, `reputasi`, `hargaBarang`, `brg_ditanggungkan`, `aset`, `aset_ukm`, `dana`, `no_tlp`, `ID_kredit`, `scor`, `hitung_ke`, `dana_diajukan`, `lama_cicil`, `cicil_perbulan`, `penghasilan_perbulan`, `mampu_cicil`, `status`) VALUES
(1, '2017-03-17', 1111111111111111, 'rrr', 'rrr', '1', 'Rp 1.000.000 - Rp 2.000.000', 1500000, 'Rp 1.000.000 - Rp 2.000.000', 1500000, 'Rp 2.000.000 - Rp 3.000.000', '111', 1, 0.198, 0, 2500000, 2, 50000, 500000, 2, 0),
(2, '2017-03-03', 1111111111111112, 'a', 'a', '1', '< Rp 1.000.000', 0, '< Rp 1.000.000', 0, '< Rp 1.000.000', '555', 1, 0.198, 1, 5000000, 0, 0, 0, 0, 2),
(3, '2017-03-03', 1111111111111113, 'das', 'dadsa', '5', '< Rp 1.000.000', 0, '< Rp 1.000.000', 0, '> Rp 4.000.000', '433', 1, 0.085, 1, 50000000, 0, 0, 0, 0, 1),
(4, '2017-03-03', 1111111111111114, 'empatbelas', 'dd', '1', '> Rp 4.000.000', 0, '> Rp 4.000.000', 0, '< Rp 1.000.000', '333', 1, 0.374, 0, 5000000, 0, 0, 0, 0, 0),
(5, '2017-03-03', 1111111111111115, 'limabelas', 'sada', '1', '< Rp 1.000.000', 0, '> Rp 4.000.000', 0, '< Rp 1.000.000', '8888', 1, 0.300, 1, 5000000, 0, 0, 0, 0, 1),
(6, '2017-03-17', 1111111111111116, 'wqwq', 'wqwq', '1', '< Rp 1.000.000', 500000, '< Rp 1.000.000', 0, '< Rp 1.000.000', '5', 1, 0.198, 0, 5000000, 1, 0, 0, 0, 0),
(7, '2017-03-17', 1111111111111117, 'ee', 'gsd', '1', '< Rp 1.000.000', 500000, '< Rp 1.000.000', 0, '< Rp 1.000.000', '555', 1, 0.198, 0, 5000000, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_kriteria`
--

CREATE TABLE IF NOT EXISTS `relasi_kriteria` (
  `ID_kredit` int(11) NOT NULL,
  `id_kriteria1` int(11) NOT NULL,
  `id_kriteria2` int(11) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_kriteria`
--

INSERT INTO `relasi_kriteria` (`ID_kredit`, `id_kriteria1`, `id_kriteria2`, `bobot`) VALUES
(1, 1, 1, 1),
(1, 1, 2, 0.5),
(1, 1, 3, 0.5),
(1, 1, 4, 0.5),
(1, 1, 5, 0.5),
(1, 2, 1, 2),
(1, 2, 2, 1),
(1, 2, 3, 2),
(1, 2, 4, 0.5),
(1, 2, 5, 0.5),
(1, 3, 1, 2),
(1, 3, 2, 0.5),
(1, 3, 3, 1),
(1, 3, 4, 0.5),
(1, 3, 5, 0.5),
(1, 4, 1, 2),
(1, 4, 2, 2),
(1, 4, 3, 2),
(1, 4, 4, 1),
(1, 4, 5, 2),
(1, 5, 1, 2),
(1, 5, 2, 2),
(1, 5, 3, 2),
(1, 5, 4, 0.5),
(1, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IDUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `username`, `password`, `level`) VALUES
(1, 'admin', 'pssi', '1'),
(2, 'kur', '1234', '2');

-- --------------------------------------------------------

--
-- Table structure for table `view_peserta`
--
-- in use(#1356 - View 'credit.view_peserta' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)
-- in use (#1356 - View 'credit.view_peserta' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
