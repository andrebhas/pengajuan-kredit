-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2017 at 05:11 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id_files`, `KTP_ID`, `nama_files`, `tanggal_upload`) VALUES
(4, 1111111111111114, '1111111111111114_4.xlsx', '2017-03-03 13:12:02'),
(5, 1111111111111115, '1111111111111115_5.xlsx', '2017-03-03 13:15:52'),
(7, 1111111111111111, '1111111111111111_7.xlsx', '2017-03-17 01:01:58'),
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
  `deskripsi` mediumtext NOT NULL,
  `ID_user` int(10) NOT NULL,
  PRIMARY KEY (`ID_kredit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jenis_kredit`
--

INSERT INTO `jenis_kredit` (`ID_kredit`, `nama_kredit`, `deskripsi`, `ID_user`) VALUES
(1, 'Kredit Usaha Rakyat', '<b>PROGRAM KREDIT USAHA RAKYAT(KUR)</b>\r\nKredit Usaha Rakyat (KUR) merupakan program yang termasuk dalam Kelompok Program Penanggulangan Kemiskinan Berbasis Pemberdayaan Usaha Ekonomi Mikro dan Kecil (klaster 3).Klaster ini bertujuan untuk meningkatkan akses permodalan dan sumber daya lainnya bagi usaha mikro dan kecil.\r\n1.	Apa yang dimaksud dengan program Kredit Usaha Rakyat (KUR)?\r\nKUR adalah skema kredit/pembiayaan modal kerja dan atau investasi yang khusus diperuntukkan bagi Usaha Mikro Kecil Menengah dan Koperasi (UMKMK) di bidang usaha produktif dan  layak (feasible), namun mempunyai keterbatasan dalam pemenuhan persyaratan yang ditetapkan Perbankan (belum bankable). KUR merupakan program pemberian kredit/pembiayaan dengan nilai dibawah Rp 500.000.000 dengan pola penjaminan oleh Pemerintah dengan besarnya coverage penjaminan maksimal 80% dari plafon kredit untuk sektor pertanian, kelautan dan perikanan, kehutanan, dan industri kecil, dan 70% dari plafon kredit  untuk sektor lainnya. . Lembaga penjaminnya yang terlibat adalah 2 lembaga penjamin nasional, yaitu PTJamkrindo dan PT Askrindo; dan 2 lembaga penjamin daerah, yaitu PT Penjaminan Kredit Daerah Jawa Timur (Jamkrida Jatim) dan PT. Jamkrida Bali MandaraTerdapat tiga skema KUR yaitu; (1) KUR Mikro dengan plafon sampai dengan Rp 20 Juta dikenakan suku bunga kredit maksimal 22% per tahun, (2) KUR Ritel dengan plafon dari Rp 20 Juta sampai dengan Rp 500 Juta dikenakan suku bunga kredit maksimal 13% per tahun, (3) KUR Linkage dengan plafon sampai dengan Rp 2 milyar. KUR Linkage biasanya menggunakan lembaga lain, seperti Koperasi, BPR, dan Lembaga Keuangan Non-bank, untuk menerus-pinjamkan KUR dari Bank Pelaksana kepada UMKMK\r\n \r\n2.	Apa tujuan pelaksanaan program KUR?\r\nTujuan program KUR adalah mengakselerasi pengembangan kegiatan perekonomian di sektor riil dalam rangka penanggulangan dan pengentasan kemiskinan serta perluasan kesempatan kerja. Secara lebih rinci, tujuan program KUR adalah sebagai berikut:\r\n1.	Mempercepat pengembangan Sektor Riil dan Pemberdayaan Usaha Mikro, Kecil, Menengah, danKoperasi (UMKMK)\r\n2.	Meningkatkan akses pembiayaan dan mengembangkanUMKM & Koperasi kepada Lembaga Keuangan\r\n3.	Sebagai upaya penanggulangan / pengentasan kemiskinandan perluasan kesempatan kerja\r\n3.	Apakah yang dimaksud dengan usaha produktif, usaha layak dan belum bankable?\r\n1.	Usaha Produktif adalah usaha untuk menghasilkan barang atau jasa untukmemberikan nilai tambah dan meningkatkan pendapatan bagi pelaku usaha.\r\n2.	Usaha Layak adalah usaha calon debitur yang menguntungkan/memberikan labasehingga mampu membayar bunga/marjin dan mengembalikan seluruh hutang/kewajiban pokok Kredit/Pembiayaan dalam jangka waktu yang disepakati antara Bank Pelaksana dengan Debitur KUR.\r\n3.	Belum Bankable adalah UMKMK yang belum dapat memenuhi persyaratanperkreditan/ pembiayaan dari Bank, seperti dalam penyediaan agunan. \r\n4.	Siapa saja yang terlibat dalam pelaksanaan program KUR?\r\nAda tiga (3) pilar penting dalam pelaksanaan program ini. Pertama adalah pemerintah, yaitu Bank Indonesia (BI) dan Departemen Teknis (Departemen Keuangan, Departemen Pertanian, Departemen Kehutanan, Departemen Kelautan dan Perikanan, Departemen Perindustrian, dan Kementerian Koperasi dan UKM).Pemerintah berfungsi membantu dan mendukung pelaksanaan pemberian berikut penjaminan kredit.Kedua, lembaga penjaminan yang berfungsi sebagai penjamin atas kredit dan pembiayaan yang disalurkan oleh perbankan.Ketiga, perbankan sebagai penerima jaminan berfungsi menyalurkan kredit kepada UMKM dan Koperasi.\r\n\r\nBertindak sebagai lembaga penjaminan dalam program ini adalah PT. (Persero) Asuransi Kredit Indonesia (PT. Askrindo) dan Perusahaan Umum Jaminan Kredit Indonesia (Perum Jamkrindo), Jamkrida Jatim dan Jamkrida Bali Mandara. Sedangkan pihak ketiga yaitu Bank Penyalur terdiri dari tujuh (7) Bank Umum dan duapuluh enam (26) Bank Pembangunan Daerah (BPD). Keenam Bank Umum penyalur KUR sampai saat ini adalah Bank BRI, Bank Mandiri, Bank BNI, Bank BTN, Bank Syariah Mandiri dan Bank Bukopin. Adapun 13 BPD penyalur KUR diantaranya adalah: Bank Nagari, Bank DKI, Bank Jatim, Bank Jateng, BPD DIY, Bank Jabar Banten, Bank NTB, Bank Kalbar, Bank Kalteng, Bank Kalsel, Bank Sulut, Bank Maluku dan Bank Papua.\r\n\r\nPihak-pihak yang terkait dengan penyaluran KUR di tingkat daerah disesuaikan dengan keberadaan masing-masing bank di daerahnya.Tujuh bank umum selaku penyalur secara umum berlaku di seluruh wilayah Indonesia.Untuk bank pembangunan daerah selaku bank penyalur tergantung daerah masing-masing sesuai dengan tugas penyaluran KUR sebagaimana disebutkan sebelumnya. Koordinasi program KUR secara umum dilakukan oleh TKPK Daerah melalui kelompok program Berbasis Pemberdayaan Usaha Ekonomi Mikro dan Kecil. Di beberapa daerah, keberadaan TKPK Daerah ini didukung oleh Tim Percepatan Penyalur KUR dibawah koordinasi Biro Ekonomi Pemerintah Tingkat I dan II. \r\n \r\n5.	Apakah KUR yang telah dijamin oleh perusahaan penjamin tidak perlu dilunasi kreditnya oleh UMKMK?\r\nSumber dana penyaluran KUR 100% bersumber dari dana Bank Pelaksana. Pemerintah, melalui perusahaan penjamin hanya  memberikan sebagian penjaminan terhadap Bank Pelaksana atas KUR yang diberikan kepada UMKMK. Perusahaa penjaminan mendapat Imbal Jasa Penjaminan (IJP) yang dibayar pemerintah. Karena itu,  UMKMK wajib melunasi KUR yang diterima dari Bank Pelaksana.\r\n6.	Siapa sasaran program KUR?\r\nSasaran program KUR adalah kelompok masyarakat yang telah dilatih dan ditingkatkan keberdayaan serta kemandiriannya pada kluster program sebelumnya.Harapannya agar kelompok masyarakat tersebut mampu untuk memanfaatkan skema pendanaan yang berasal dari lembaga keuangan formal seperti Bank, Koperasi, BPR dan sebagainya.Dilihat dari sisi kelembagaan, maka sasaran KUR adalah UMKMK (Usaha Mikro, Kecil, Menengah dan Koperasi).Sektor usaha yang diperbolehkan untuk memperoleh KUR adalah semua sektor usaha produktif.\r\n7.	Apa yang dimaksud dengan Usaha MIkro, Kecil, Menengah dan Koperasi?\r\nYang dimaksud dengan:\r\n1.	Usaha Mikro adalah usaha produktif milik orang perorangan dan/atau badan usahaperorangan yang memenuhi kriteria: memiliki kekayaan bersih paling banyak Rp.50.000.000,- (tidak termasuk tanah dan bangunan tempat usaha) atau memiliki hasilpenjualan tahunan paling banyak Rp. 300.000.000,-\r\n2.	Usaha Kecil adalah usaha ekonomi produktif yang berdiri sendiri, yang dilakukan oleh orang perorangan atau badan usaha yang bukan merupakan anak perusahaan atau bukan cabang perusahaan yang dimiliki, dikuasai, atau menjadi bagian baik langsung maupun tidak langsung dari Usaha Menengah atau Usaha Besar. Kriterianya adalah memiliki kekayaan bersih lebih dari Rp. 50.000.000,- s/d Rp. 500.000.000,- (tidak termasuk tanah dan bangunan tempat usaha) atau memilikihasil penjualan tahunan lebih dari Rp. 300.000.000,- s/d Rp. 2.500.000.000,-\r\n3.	Usaha Menengah adalah Usaha ekonomi produktif yang berdiri sendiri, yang dilakukan oleh orang perorangan atau badan usaha yang bukan merupakan anak perusahaan atau cabang perusahaan yang dimiliki, dikuasai, atau menjadi bagian baik langsung maupun tidak langsung dengan Usaha Besar. Kriterianya adalah: memiliki kekayaan bersih lebih dari Rp. 500.000.000,-s/d Rp. 10.000.000.000,- ( tidak termasuk tanah dan bangunan tempat usaha) atau memiliki hasil penjualan tahunan lebih dari Rp.2.500.000.000,- s/d Rp. 50.000.000.000,-\r\n4.	Koperasi adalah Badan Usaha yang beranggotakan orang seorang atau badan hukum Koperasi dengan melandaskan kegiatannya berdasarkan prinsip koperasi sekaligus sebagai gerakan ekonomi rakyat yang berdasar atas asaskekeluargaan.\r\n8.	Dimana lokasi pelaksanaan program KUR?\r\nProgram KUR dilaksanakan di seluruh Indonesia.\r\n9.	Bagaimanakah cara UMKMK mendapatkan KUR dari Bank Pelaksana?\r\nUMKMK dapat mendapatkan KUR dari Bank Pelaksana dengan cara sebagai berikut :\r\n1.	UMKMK mengajukan surat permohonan KUR kepada Bank dengan melampiridokumen seperti legalitas usaha, perizinan usaha, catatan keuangan dansebagainya.\r\n2.	Bank mengevaluasi/analisa kelayakan usaha UMKMK berdasarkan permohonanUMKMK tersebut.\r\n3.	Apabila menurut Bank usaha UMKMK layak maka Bank menyetujui permohonan KUR. Keputusan pemberian KUR sepenuhnya merupakan kewenangan Bank.\r\n4.	Bank dan UMKMK menandatangani Perjanjian Kredit/Pembiayaan.\r\n5.	UMKMK wajib membayar/mengangsur kewajiban pengembalian KUR kepadaBank sampai lunas.\r\n10.	Apa saja yang menjadi persyaratan umum bagi UMKMK untuk dapat menerima KUR? Siapakah yang memberikan putusan mengenai pemberian KUR?\r\nPersyaratan umum untuk dapat menerima KUR bagi UMKMK adalah:\r\n1.	Tidak sedang menerima kredit/pembiayaan dari perbankan dan/atau yang tidaksedang menerima Kredit Program dari Pemerintah;\r\n2.	Diperbolehkan sedang menerima kredit konsumtif (Kredit Kepemilikan Rumah, KreditKendaraan Bermotor, Kartu Kredit dan kredit konsumtif lainnya);\r\n3.	Bagi UMKMK yang masih tercatat Sistem Informasi Debitur BI, tetapi yang sudahmelunasi pinjaman, maka diperlukan Surat Keterangan Lunas dari Bank sebelumnya;\r\n4.	untuk KUR Mikro, tidak diwajibkan untuk dilakukan pengecekan Sistem InformasiDebitur Bank Indonesia.\r\n\r\nPutusan pemberian KUR sepenuhnya menjadi kewenangan Bank Pelaksana, sesuai dengan hasil analisa kelayakan usha calon debitur.\r\n11.	Apa saja yang menjadi persyaratan umum bagi UMKMK untuk dapat menerima KUR?\r\nDokumen legalitas dan perizinan yang minimal ada pada saat debitur mengajukanKUR kepada Bank antara lain:\r\n1.	Identitas diri nasabah, seperti KTP, SIM, Kartu Keluarga, dll.\r\n2.	Legalitas usaha, seperti akta pendirian, akta perubahan\r\n3.	Perzinan usaha, seperti SIU, TDP, SK Domisili, dll\r\n4.	Catatan pembukuan atau laporan keuangan\r\n5.	Salinan bukti agunan\r\n12.	Apakah debitur yang sudah pernah mendapatkan dan melunasi KUR boleh mengajukan KUR kembali?\r\nDebitur KUR yang sudah mendapatkan dan melunasi KUR diperbolehkan untuk mengajukan KUR kembali sepanjang masih belum bankable.\r\n13.	Bagaimana mekanisme pelaksanaan program KUR?\r\nMekanisme pelaksanaan KUR dapat digambarkan dalam skema berikut ini:\r\n1.	Pemerintah melakukan Penyertaan Modal Negara (PMN) kepada perusahaan penjamin kredit\r\n2.	Pemerintah membayar Imbal Jasa (IJP) sebesar 3,25% per tahun dari outstanding KUR\r\n3.	MoU antara Pemerintah, Bank Pelaksana dan Perusahaan Penjamin yang mengatur  mekanisme KUR serta hak dan kewajiban masing-masing pihak. \r\n4.	Bank menyalurkan KUR. Dana yang disalurkan sebagai KUR, 100% merupakan dana komersil bank.\r\n5.	Penerima KUR wajib memenuhi kewajiban pembayaran bunga dan cicilan pokok kepada bank.\r\n6.	Bank pelaksana mengajukan Daftar Nominatif Penerima KUR\r\n7.	PPK menerbitkan Sertifikat Penjamin (SP) dengan penjaminan sesuai dengan yang ditetapkan dalam SOP KUR\r\n8.	Bank Pelaksana mengajukan  klaim penjamin untuk kredit dengan kolektabilitas 4 dan 5. \r\n9.	Perusahaan Penjamin Kredit membayar klaim yang diajukan setelah melakukan verifikasi.\r\n\r\n14.	Berapakah besarnya dana pinjaman (plafon) KUR yang dapat diperoleh UMKMK?\r\nPlafon KUR yang dapat diperoleh UMKMK yaitu:\r\n1.	KUR Mikro: KUR yang diberikan dengan plafon sampai dengan Rp. 5.000.000,00 (lima juta rupiah).\r\n2.	KUR Ritel: KUR yang diberikan dengan plafon diatas Rp. 5.000.000,00 (lima juta rupiah) sampai dengan Rp. 500.000.000,00 (lima ratus juta rupiah)\r\n15.	Berapa jangka waktu yang dapat diberikan atas fasilitas KUR yang diterima debitur? Apakah KUR yang sudah eksis itu dapat diperpanjang atau diberikan tambahan plafon pinjaman?\r\nKepada debitur KUR dapat diberikan jangka waktu fasilitas KUR maksimal selama 3tahun untuk modal kerja dan maksimal lima (5) tahun untuk investasi. Pemberian penambahan plafon dapat dilakukan tanpa menunggu pinjaman dilunasi, dengan ketentuan sebagai berikut:\r\nDebitur yang bersangkutan masih belum dapat dikategorikan bankable.\r\n1.	Total pinjaman setelah penambahan tidak melebihi Rp 5.000.000,- untuk KURMikro atau tidak melebihi sebesar Rp 500.000.000,- (untuk KUR Ritel atau tidakmelebihi Rp.1.000.000.000 untuk KUR yang diberikan kepada Lembaga Linkage dengan pola executing.\r\n2.	Ketentuan lainnya, sesuai dengan ketentuan KUR Mikro atau KUR Ritel atau KURmelalui Lembaga Linkage.\r\n16.	Berapakah besarnya suku bunga KUR?\r\nSuku bunga KUR Mikro maksimal sebesar atau setara 22% efektif per tahun dan suku bunga KUR Ritel maksimal sebesar atau setara 13% efektif per tahun.\r\n17.	Apa saja bentuk agunan untuk KUR?\r\nUMKMK tetap menyerahkan agunan kepada Bank berupa:\r\n1.	Agunan Pokok yaitu kelayakan usaha dan obyek yang dibiayai.\r\n2.	Agunan Tambahan sesuai dengan ketentuan pada Bank Pelaksana, misalnya sertifikat tanah, BPKB mobil, dan lain sebagainya.\r\n18.	Apa saja yang menjadi kewajiban debitur KUR dan apa konsekuensi jika UMKMK tidak memenuhi kewajiban KUR?\r\nDebitur KUR memiliki kewajiban sebagai berikut:\r\n1.	Memenuhi persyaratan KUR yang ada pada Bank Pelaksana\r\n2.	Menyerahkan agunan kepada Bank\r\n3.	Membayar kewajiban (pokok pinjaman dan bunga) atas KUR yang diterima sesuai repayment yang disepakati dengan Bank sampai kredit lunas.\r\nApabila debitur UMKMK tidak melunasi kewajiban KUR, maka:\r\n1.	Bank pelaksana akan melakukan penjualan agunan dan apabila nilai penjualan agunan masih tidak mencukup maka debitur masih wajib melunasi KUR.\r\n2.	Terdaftar sebagai debitur blacklist Bank Indonesia.\r\n19.	Apakah UMKMK yang merupakan binaan atau rekomendasi dari kementerian teknis dapat langsung disetujui permohonan KUR-nya?\r\nApabila menurut Bank Pelaksana UMKMK tersebut dinyatakan layak dan memenuhi ketentuan dan persyaratan KUR, maka kepada UMKMK tersebut dapat diberikan KUR.\r\n20.	 Apakah KUR itu merupakan hibah pemerintah kepada masyarakat? Dari manakah sumber dananya?\r\nKUR BUKAN merupakah hibah pemerintah kepada masyarakat. Sesuai dengan pengertian KUR sebelumnya disebutkan bahwa KUR adalah kredit/pembiayaan kepada UMKMK (Usaha MIkro, Kecil, Menengah dan Koperasi), sehingga UMKMK wajib mengembalikan dana pinjaman KUR tersebut kepada Bank pemberi KUR. Perlu dipahami bahwa uang KUR bukanlah dana dari pemerintah melainkan dana dari pihak perbankan, sehingga disalurkan melalui mekanisme perbankan dan juga harus dikembalikan sesuai ketentuan dari pihak perbankan.Sumber dana penyaluran KUR adalah 100% (seratus persen) bersumber dari danaBank Pelaksana yang dihimpun dari dana masyarakat berupa giro, tabungan dan deposito.\r\n21.	Apakah manfaat KUR?\r\nBagi UMKMK, manfaat KUR adalah membantu pembiayaan yang dibutuhkan untuk mengembangkan usahanya. Sementara bagi pemerintah, manfaat KUR adalah tercapainya percepatan pengembangan sektor riil dan pemberdayaan UMKMK dalam rangka penanggulangan/pengentasan kemiskinan dan perluasan kesempatan kerja serta pertumbuhan ekonomi.\r\n22.	Bagaimana pengawasan pelaksanaan KUR?\r\nPemerintah melalui BPKP akan melakukan pengawasan yang bersifat preventif danmelakukan verifikasi secara selektif dan Bank Indonesia akan mengawasi Bank Pelaksana dalam kapasitas sebagai pengawas bank.', 2);

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
(1, 1, 0.228),
(1, 2, 0.069),
(1, 3, 0.176),
(1, 4, 0.126),
(1, 5, 0.401);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `peserta_kredit`
--

INSERT INTO `peserta_kredit` (`no`, `tgl_pendaftaran`, `KTP_ID`, `nama`, `alamat`, `reputasi`, `hargaBarang`, `brg_ditanggungkan`, `aset`, `aset_ukm`, `dana`, `no_tlp`, `ID_kredit`, `scor`, `hitung_ke`, `dana_diajukan`, `lama_cicil`, `cicil_perbulan`, `penghasilan_perbulan`, `mampu_cicil`, `status`) VALUES
(1, '2017-03-17', 1111111111111111, 'Susi Similikiti', 'Jember', '1', 'Rp 1.000.000 - Rp 2.000.000', 1500000, 'Rp 1.000.000 - Rp 2.000.000', 1500000, 'Rp 2.000.000 - Rp 3.000.000', '111', 1, 0.198, 4, 2500000, 2, 50000, 500000, 2, 0),
(8, '2017-07-11', 1111111111111110, 'Sukaesih', 'Jember', '4', '> Rp 4.000.000', 5000000, '< Rp 1.000.000', 500000, '> Rp 4.000.000', '111', 1, 0.167, 3, 5000000, 1, 454167, 0, 3, 0),
(9, '2017-07-11', 1111111111111120, 'Sriwati', 'Jember', '1', '< Rp 1.000.000', 500000, '> Rp 4.000.000', 5000000, 'Rp 3.000.000 - Rp 4.000.000', '111', 1, 0.266, 3, 3000000, 1, 272500, 0, 1, 0),
(10, '2017-07-11', 1111111111111130, 'Bambang Santoso', 'Jember', '4', 'Rp 3.000.000 - Rp 4.000.000', 4000000, '> Rp 4.000.000', 5000000, '> Rp 4.000.000', '111', 1, 0.133, 3, 5000000, 1, 454167, 0, 2, 0),
(14, '2017-07-17', 12312312312312, 'fjfjalksda', 'dfgdgdfgd', '1', '< Rp 1.000.000', 500000, '< Rp 1.000.000', 500000, '< Rp 1.000.000', '08325654569', 1, 0.105, 0, 500000, 1, 45417, 0, 1, 0),
(15, '2017-07-17', 33232131231231, 'rerererwrwe', 'ttwerwerwe', '1', '< Rp 1.000.000', 500000, '< Rp 1.000.000', 500000, '< Rp 1.000.000', '08325654569', 1, 0.105, 0, 500000, 1, 45417, 0, 1, 0),
(16, '2017-07-17', 1213321344444, 'gggsdsd', 'sdfsdfsdf', '3', '< Rp 1.000.000', 500000, 'Rp 1.000.000 - Rp 2.000.000', 1200000, '< Rp 1.000.000', '082231313', 1, 0.215, 0, 500000, 3, 17639, 0, 4, 0),
(17, '2017-07-17', 123143425453, 'asdasdasda', 'adsasdasd', '4', '< Rp 1.000.000', 500000, '< Rp 1.000.000', 500000, '< Rp 1.000.000', '012312313', 1, 0.231, 0, 500000, 5, 12083, 0, 4, 0);

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
(1, 1, 2, 3),
(1, 1, 3, 2),
(1, 1, 4, 3),
(1, 1, 5, 0.333),
(1, 2, 1, 0.333),
(1, 2, 2, 1),
(1, 2, 3, 0.333),
(1, 2, 4, 0.333),
(1, 2, 5, 0.2),
(1, 3, 1, 0.5),
(1, 3, 2, 3),
(1, 3, 3, 1),
(1, 3, 4, 2),
(1, 3, 5, 0.5),
(1, 4, 1, 0.333),
(1, 4, 2, 3),
(1, 4, 3, 0.5),
(1, 4, 4, 1),
(1, 4, 5, 0.2),
(1, 5, 1, 3),
(1, 5, 2, 5),
(1, 5, 3, 2),
(1, 5, 4, 5),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
