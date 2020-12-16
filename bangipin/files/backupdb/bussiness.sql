-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2019 pada 19.42
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bussiness`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `level` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`, `nama_lengkap`, `telepon`, `status`, `level`, `foto`) VALUES
('operator1', '$2a$08$5LvIUlx4gsGwEqrUMsZ5gesIpMy0dtHP5CQ0WaFCQKsa6.YrysZpC', 'ersajogja@gmail.com', 'Admin Satu', '085747875865', '1', '01', 'user-fb93.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atribut`
--

CREATE TABLE `atribut` (
  `id_atribut` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `posisi` int(11) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 atau Tidak Aktif=0',
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `judul_blog` varchar(255) DEFAULT NULL,
  `judul_seo` varchar(255) NOT NULL,
  `isi` text,
  `posting` varchar(50) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `tgl_modif` datetime NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `meta_deskripsi` varchar(255) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `kategori`, `judul_blog`, `judul_seo`, `isi`, `posting`, `tgl_posting`, `status`, `tgl_modif`, `gambar`, `tag`, `meta_deskripsi`, `meta_keyword`, `hits`) VALUES
(1, 'desain', 'Merk HandPhone Murah Keluaran Terbaru Dibawah 1 Jutaan', 'merk-handphone-murah-keluaran-terbaru-dibawah-1-jutaan', '<h2>Dari mana asalnya?</h2>\r\n<p style=\"text-align: justify;\">Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>\r\n<p style=\"text-align: justify;\">Bagian standar dari teks Lorem Ipsum yang digunakan sejak tahun 1500an kini di reproduksi kembali di bawah ini untuk mereka yang tertarik. Bagian 1.10.32 dan 1.10.33 dari \"de Finibus Bonorum et Malorum\" karya Cicero juga di reproduksi persis seperti bentuk aslinya, diikuti oleh versi bahasa Inggris yang berasal dari terjemahan tahun 1914 oleh H. Rackham.</p>', 'operator1', '2019-01-06 05:50:16', '1', '2019-01-06 18:20:51', 'blog-9f4c.jpg', '', 'jkhjkhjjjjjjjjjjkj', 'ghghhhhhhhhhhhhhhhhj', 0),
(2, 'desain', 'Laptop Gaming Spesifikasi Graphic Extra Tajam Terbaik 2018', 'laptop-gaming-spesifikasi-graphic-extra-tajam-terbaik-2018', '<h2>Mengapa kita menggunakannya?</h2>\r\n<p style=\"text-align: justify;\">Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti \"Bagian isi disini, bagian isi disini\", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat \"Lorem Ipsum\" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)</p>', 'operator1', '2019-01-06 05:58:17', '1', '2019-01-06 18:22:20', 'blog-4bda.jpg', '', 'asdfsf', 'sdffwe', 0),
(3, 'desain', 'Berbisnis Bersi Tanpa Riba, Gimana Caranya? Cek Postingan Berikut', 'berbisnis-bersi-tanpa-riba-gimana-caranya-cek-postingan-berikut', '<p style=\"text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', 'operator1', '2019-01-06 06:22:11', '1', '2019-01-10 01:13:14', 'blog-6731.jpg', '1,2,3', 'asdasd', 'asd', 0),
(4, 'desain', 'Kiat Sukses Membangun Bisnis Properti Dijaman Millenial Ini', 'kiat-sukses-membangun-bisnis-properti-dijaman-millenial-ini', '<h2>Dari mana saya bisa mendapatkannya?</h2>\r\n<p style=\"text-align: justify;\">Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yang sebenarnya di internet. Ia menggunakan kamus perbendaharaan yang terdiri dari 200 kata Latin, yang digabung dengan banyak contoh struktur kalimat untuk menghasilkan Lorem Ipsun yang nampak masuk akal. Karena itu Lorem Ipsun yang dihasilkan akan selalu bebas dari pengulangan, unsur humor yang sengaja dimasukkan, kata yang tidak sesuai dengan karakteristiknya dan lain sebagainya.</p>', 'operator1', '2019-01-06 09:18:38', '1', '2019-01-10 01:12:36', 'blog-dc49.jpg', '1', 'pendidikan', 'pendidikan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

CREATE TABLE `color` (
  `id` bigint(20) NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `colorcode` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `status_delete` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `telepon` text NOT NULL,
  `hobi` varchar(255) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `foto_member` varchar(50) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `alamat1` varchar(255) NOT NULL,
  `alamat2` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `invoice` varchar(15) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `kategori` varchar(30) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` float(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL,
  `modif_date` date NOT NULL,
  `hits` smallint(3) NOT NULL,
  `url` varchar(100) NOT NULL,
  `background` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 Atau Tidak Aktif=0',
  `posisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekspedisi`
--

INSERT INTO `ekspedisi` (`id`, `nama`, `gambar`, `status`, `posisi`) VALUES
(1, 'jne', 'ship-7356.png', '1', 1),
(2, 'tiki', 'ship-9ca6.png', '1', 2),
(3, 'pos', 'ship-9a86.png', '1', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `gambar`) VALUES
(1, 'Rumah Idaman tahun 2019', 'gal-0556.jpg'),
(2, '7 Referensi belajar graphic design pro', 'gal-e115.png'),
(3, 'Desain Arsitektur Modern dengan Sketch Up', 'gal-8b9f.png'),
(4, 'Tutorial Membuat Bayangan dengan Adobe Photoshop CS6', 'gal-84e5.png'),
(5, 'Tutorial Membuat Gradasi dengan Adobe Photoshop CS6', 'gal-b179.png'),
(6, 'Tutorial Membuat Merge Layer dan New Layer dengan Adobe Photoshop CS6', 'gal-8ff1.png'),
(7, 'ini adalah halaman percobaan', 'gal-372e.jpg'),
(8, 'Sepatu Sneakers olahraga modern style anak muda', 'gal-4366.jpg'),
(9, '', 'gal-cf93.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id`, `code`, `nama`, `date`) VALUES
(1, 'top', 'top', '2019-01-09'),
(2, 'bottom', 'bottom', '2019-01-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan_child`
--

CREATE TABLE `iklan_child` (
  `id_iklan` int(11) NOT NULL,
  `type` smallint(1) UNSIGNED NOT NULL DEFAULT '0',
  `nama_iklan` varchar(30) NOT NULL,
  `iklan_seo` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` smallint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Aktif=1 Atau Tidak Aktif=0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `kategori_seo` varchar(255) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `posting` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `kategori_seo`, `tgl_dibuat`, `posting`, `status`) VALUES
(1, 'Desain', 'desain', '2019-01-06 05:42:03', 'operator1', '1'),
(2, 'Hobi', 'hobi', '2019-01-08 20:47:22', 'operator1', '1'),
(3, 'Olahraga', 'olahraga', '2019-01-08 20:47:40', 'operator1', '1'),
(4, 'Gaya Hidup', 'gaya-hidup', '2019-01-08 20:49:47', 'operator1', '1'),
(5, 'Pendidikan', 'pendidikan', '2019-01-08 20:50:07', 'operator1', '1'),
(6, 'Informasi', 'informasi', '2019-01-08 20:50:45', 'operator1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kode_kategori` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_modif` datetime NOT NULL,
  `modifikasi_oleh` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 atau Tidak Aktif=0',
  `posisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`kode_kategori`, `parent_id`, `kategori`, `kategori_seo`, `tgl_dibuat`, `tgl_modif`, `modifikasi_oleh`, `username`, `status`, `posisi`) VALUES
(1, 0, 'otomotif', 'otomotif', '2018-12-17 23:39:42', '2018-12-17 23:39:42', '', 'operator1', '1', 1),
(2, 0, 'sepatu', 'sepatu', '2018-12-17 23:40:04', '2018-12-17 23:40:04', '', 'operator1', '1', 2),
(3, 0, 'bahan kimia', 'bahan-kimia', '2018-12-17 23:40:28', '2018-12-17 23:40:28', '', 'operator1', '1', 3),
(4, 0, 'pakaian', 'pakaian', '2018-12-17 23:41:01', '2018-12-17 23:41:01', '', 'operator1', '1', 4),
(5, 0, 'tas', 'tas', '2018-12-17 23:41:26', '2018-12-17 23:41:26', '', 'operator1', '1', 5),
(6, 0, 'olahraga', 'olahraga', '2018-12-17 23:42:19', '2018-12-17 23:42:19', '', 'operator1', '1', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `blogid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `komentar_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` text,
  `disetujui` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(1) NOT NULL DEFAULT '0',
  `dibaca` char(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `blogid`, `komentar_id`, `username`, `email`, `review`, `disetujui`, `tanggal`, `status`, `dibaca`) VALUES
(2, 3, 0, 'ervin', 'ersajogja@gmail.com', 'asdjlsjjjjjjjjj', 1, '2019-01-07 23:36:36', '0', '1'),
(3, 3, 2, 'Admin', 'ersajogja@gmail.com', 'sadddddddddddasd', 1, '2019-01-07 23:38:36', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laman`
--

CREATE TABLE `laman` (
  `id` int(11) NOT NULL,
  `nama_laman` varchar(100) NOT NULL,
  `tipe` char(1) NOT NULL DEFAULT '0',
  `laman_seo` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 Atau Tidak Aktif=0',
  `posisi` int(11) NOT NULL,
  `layout` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laman`
--

INSERT INTO `laman` (`id`, `nama_laman`, `tipe`, `laman_seo`, `konten`, `status`, `posisi`, `layout`) VALUES
(1, 'About', '0', 'about', '<p align=\"justify\"><span style=\"font-size: large;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span></p>\r\n<p align=\"justify\"><strong><span style=\"font-size: large;\">LOREM IPSUM DOLOR SIT AMET </span></strong></p>\r\n<p align=\"justify\"><span style=\"font-size: large;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </span></p>\r\n<p align=\"justify\"><strong><span style=\"font-size: large;\">INVESTIGATIONES DEMONSTRAVERUNT </span></strong></p>\r\n<p align=\"justify\"><span style=\"font-size: large;\">Lorem ipsum dolor sit amet Claritas est etiam processus dynamicus Duis autem vel eum iriure dolor Eodem modo typi Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. </span></p>\r\n<p align=\"justify\"><strong><span style=\"font-size: large;\">NAM LIBER TEMPOR CUM SOLUTA NOBIS </span></strong></p>\r\n<p align=\"justify\"><span style=\"font-size: large;\">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>\r\n<div>&nbsp;</div>', '1', 0, 'page_with_sidebar'),
(2, 'Contact', '0', 'contact', '<p><span style=\"font-size: 14pt;\"><strong>Apa Yang Bisa Kami Bantu ?</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p>Silahkan hubungi kami melalui formulir kontak dibawah ini yang sudah kami sediakan.</p>', '1', 0, 'page_with_sidebar'),
(3, 'Privacy Policy', '0', 'privacy-policy', '<p>&nbsp;</p>\r\n<div class=\"content-page\">\r\n<p align=\"justify\"><span style=\"font-size: medium;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>\r\n<h2 align=\"justify\">Use and storage of data</h2>\r\n<p align=\"justify\"><span style=\"font-size: medium;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</span></p>\r\n<p align=\"justify\"><span style=\"font-size: medium;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</span></p>\r\n<h3 align=\"justify\">Investigationes demonstraverunt</h3>\r\n<ol>\r\n<li>Lorem ipsum dolor sit amet</li>\r\n<li>Claritas est etiam processus dynamicus</li>\r\n<li>Duis autem vel eum iriure dolor</li>\r\n<li>Eodem modo typi</li>\r\n</ol>\r\n<p align=\"justify\"><span style=\"font-size: medium;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>\r\n<p align=\"justify\"><span style=\"font-size: medium;\">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</span></p>\r\n</div>', '1', 0, 'page_with_sidebar'),
(4, 'Blog', '0', 'blog', '', '1', 0, 'page_with_sidebar'),
(6, 'Download', '0', 'download', '', '1', 0, 'fullwidth'),
(7, 'Galeri', '0', 'galeri', '<p>Galeri dan portofolio project , client yangsudah dikerjakan zaf media.&nbsp; Dari Project Website hingga aplikasi sistem informasi.&nbsp; Bisa Anda lihat Dibawah ini</p>', '1', 0, 'page_with_sidebar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landingpage`
--

CREATE TABLE `landingpage` (
  `id` int(1) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `link` varchar(255) NOT NULL,
  `text_link` varchar(255) NOT NULL,
  `bghome` varchar(100) NOT NULL,
  `fonticon1` varchar(255) NOT NULL,
  `title_features1` varchar(255) NOT NULL,
  `deskripsi1` text NOT NULL,
  `link1` varchar(20) NOT NULL,
  `text_link1` varchar(50) NOT NULL,
  `fonticon2` varchar(255) NOT NULL,
  `title_features2` varchar(255) NOT NULL,
  `deskripsi2` text NOT NULL,
  `link2` varchar(255) NOT NULL,
  `text_link2` varchar(255) NOT NULL,
  `fonticon3` varchar(255) NOT NULL,
  `title_features3` varchar(255) NOT NULL,
  `deskripsi3` text NOT NULL,
  `link3` varchar(255) NOT NULL,
  `text_link3` varchar(255) NOT NULL,
  `appicon1` varchar(100) NOT NULL,
  `appfeatures1` varchar(100) NOT NULL,
  `appdeskripsi1` varchar(255) NOT NULL,
  `appicon2` varchar(100) NOT NULL,
  `appfeatures2` varchar(100) NOT NULL,
  `appdeskripsi2` varchar(255) NOT NULL,
  `appicon3` varchar(100) NOT NULL,
  `appfeatures3` varchar(100) NOT NULL,
  `appdeskripsi3` varchar(255) NOT NULL,
  `appicon4` varchar(100) NOT NULL,
  `appfeatures4` varchar(100) NOT NULL,
  `appdeskripsi4` varchar(255) NOT NULL,
  `imageapp` varchar(100) NOT NULL,
  `judulvideo` varchar(255) NOT NULL,
  `deskripsivideo` text NOT NULL,
  `backgroundvideo` varchar(255) NOT NULL,
  `idyoutube` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `landingpage`
--

INSERT INTO `landingpage` (`id`, `judul`, `deskripsi`, `link`, `text_link`, `bghome`, `fonticon1`, `title_features1`, `deskripsi1`, `link1`, `text_link1`, `fonticon2`, `title_features2`, `deskripsi2`, `link2`, `text_link2`, `fonticon3`, `title_features3`, `deskripsi3`, `link3`, `text_link3`, `appicon1`, `appfeatures1`, `appdeskripsi1`, `appicon2`, `appfeatures2`, `appdeskripsi2`, `appicon3`, `appfeatures3`, `appdeskripsi3`, `appicon4`, `appfeatures4`, `appdeskripsi4`, `imageapp`, `judulvideo`, `deskripsivideo`, `backgroundvideo`, `idyoutube`) VALUES
(1, 'Universal', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.\r\n\r\nIni Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'about', 'Visit', 'home-dd0f.jpg', 'cloud_off', 'Penyimpanan', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'www.google.com', 'Continue', 'forum', 'Diskusi', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'www.lorem.com', 'Continue', '3d_rotation', 'Rotasi', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'www.maps.google.co.id', 'Continue', 'fa fa-camera', 'Awesome Beauty Camera', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'fa fa-android', 'Live Chat Support', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'fa fa-comments', 'Live Chat Support', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'fa fa-file', 'Retina Ready', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'app-area-mockup.png', 'Iklan Video', 'Ini Adalah contoh halaman landing page. \r\nHalaman ini biasanya digunakan oleh perusahaan hanya dengan menampilkan satu halaman yang sudah mewakili dari seluruh perusahaan tersebut dalam mendeskripsikan produknya.', 'video-area-bg.jpg', '8g_wa06LlCA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` char(2) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('01', 'Administrator'),
('05', 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `name`, `caption`, `lat`, `lng`, `status`) VALUES
(1, 'Bang Ipin', 'Omah Website', '-902838', '783278', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `type` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `menu_parent` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `menu_seo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` smallint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Aktif=1 Atau Tidak Aktif=0',
  `posisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `type`, `menu_parent`, `nama_menu`, `menu_seo`, `url`, `status`, `posisi`) VALUES
(2, 1, 0, 'About', 'about', 'http://localhost/bussiness/about', 1, 2),
(3, 1, 0, 'Blog', 'blog', 'http://localhost/bussiness/blog', 1, 3),
(4, 1, 0, 'Galeri', 'galeri', 'http://localhost/bussiness/galeri', 1, 4),
(5, 1, 0, 'Download', 'download', 'http://localhost/bussiness/download', 1, 5),
(6, 1, 0, 'Contact', 'contact', 'http://localhost/bussiness/contact', 1, 7),
(7, 1, 8, 'Privacy Policy', 'privacy-policy', 'http://localhost/bussiness/privacy-policy', 1, 1),
(8, 1, 0, 'Pages', 'pages', '#', 1, 6),
(9, 1, 0, 'Home', 'home', 'http://localhost/bussiness/', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_parent`
--

CREATE TABLE `menu_parent` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_parent`
--

INSERT INTO `menu_parent` (`id`, `kode`, `nama`, `tanggal`) VALUES
(1, 'primary', 'menu utama', '2018-05-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `dibuat_oleh` varchar(30) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `dimodif_oleh` varchar(30) NOT NULL,
  `tgl_modif` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 Atau Tidak Aktif=0',
  `posisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `field` text,
  `status` smallint(1) UNSIGNED NOT NULL DEFAULT '0',
  `msporder` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `perusahaan` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `catatan` text NOT NULL,
  `bank_tujuan` varchar(30) NOT NULL,
  `id_pesanan` smallint(1) UNSIGNED NOT NULL DEFAULT '0',
  `invoice` varchar(15) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `subtotal` float NOT NULL,
  `ongkir` float NOT NULL,
  `total_harga` float DEFAULT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_pembayaran` varchar(30) NOT NULL,
  `status_pesanan` smallint(2) NOT NULL DEFAULT '0',
  `ekspedisi` varchar(30) NOT NULL,
  `layanan_pengiriman` varchar(30) NOT NULL,
  `estimasi_waktu` varchar(30) NOT NULL,
  `downloadid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `waktu_download` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `produk_seo` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `kode_kategori` bigint(20) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` int(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `favorit_produk` char(1) NOT NULL,
  `label` char(1) NOT NULL,
  `status_barang` char(1) NOT NULL COMMENT 'Diterbitkan = 1 atau Tidak diterbitkan =0',
  `meta_deskripsi` varchar(255) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_produsen` bigint(11) NOT NULL,
  `berat` decimal(15,0) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `dibaca` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode_barang`, `produk`, `produk_seo`, `deskripsi`, `deskripsi_singkat`, `kode_kategori`, `harga`, `diskon`, `qty`, `favorit_produk`, `label`, `status_barang`, `meta_deskripsi`, `meta_keyword`, `tag`, `gambar`, `id_produsen`, `berat`, `tgl_dibuat`, `dibaca`) VALUES
(1, 'BAR-0001', 'coba produk ringan', 'coba-produk-ringan', '<p>asdaaaaaaaaaaaaaaaaaa</p>', 'asdddddddddddddddddddddddddddddd', 1, '125000', 5000, 100, '1', '2', '1', 'saddddddddddddddddddd', 'asdddddddddddddddddddddddddd', '', 'prod-9831.png', 0, '1', '2018-12-17 23:53:13', 0),
(2, 'BAR-0002', 'cover motor honda vario 125 cc color merah muda', 'cover-motor-honda-vario-125-cc-color-merah-muda', '<p>asdaaaaaaaaaaaa</p>', 'asdaaaaaaaaaaaaaaaaa', 1, '125000', 5000, 100, '1', '2', '1', 'asddddddddddddddddddd', 'asdddddddddddddddddddddd', '', 'prod-788e.png', 0, '1', '2018-12-17 23:55:48', 0),
(3, 'BAR-0003', 'Cover motor honda scoopy mura meriah sekali', 'cover-motor-honda-scoopy-mura-meriah-sekali', '<p>aasdasdasd</p>', 'asdasdasdas', 1, '125000', 5000, 99, '', '2', '1', 'asdasda', 'asddddddddddddd', '', 'prod-c5db.png', 0, '1000', '2018-12-17 23:58:11', 7),
(4, 'BAR-0004', 'sepatu sneaker modern grey', 'sepatu-sneaker-modern-grey', '<p>sepatu sneaker modern grey</p>', 'sepatu sneaker modern grey', 2, '99000', 0, 100, '', '1', '1', 'sepatu sneaker modern grey', 'sepatu sneaker modern grey', '', 'prod-9969.png', 0, '2000', '2018-12-18 00:04:07', 0),
(5, 'BAR-0005', 'Batik Raja blu XL ', 'batik-raja-blu-xl', '<p>sepatu sneaker modern grey</p>', 'sepatu sneaker modern grey', 4, '70000', 5000, 50, '1', '1', '1', 'werwerwer', 'werwerwer', '', 'prod-9504.png', 0, '1000', '2018-12-18 00:07:08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('lq9gouh3b727m05ab957m5rtadbmpbmg', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036343735363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jjvl1oqu9q75n09r6i1ud4v5053kj2n6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036353037353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ld8jl2bm68sgd9v2eia4obohl9o8kv3o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036353430333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ci8gq7dq5aagto47nobvk0mqok10ulhd', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036353734373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rtr8sqfd9or1146aqvbjq5ln0skk1hpd', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036363036363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('je9if9hae0l8dbiha855u34sm6famd2c', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036363432373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('bopff1nu2n9j72ok4645k54kqor411nu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036373233313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('c7p2k5v2rpul212nge8dtv4o394lso8u', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036373631333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('dhn3c67j06sjadi7cgnhhbj2bn39nqva', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036373932333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('gbfbpst3deieot1ibuj0jro47skqe0oq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353036373932333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('u6nlgdtb2cjce6are1qt8ic3c2oot6au', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232343839363b),
('96t8fu69k4o14hao9vpji1qqbe3tokio', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232343932383b),
('i84fba4opuku1fh0c41n6qfhbmiv4nvi', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353232363134323b),
('sv2lc9q1ktqhni8c9fua9fm1li5odo9l', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533333531363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('hcu6hp8s3d3hfvphfec5udgd6qkglj3a', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533333536333b),
('i39pm0i3icns34o5v6rd1r3us7edu286', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533333531363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('5nghng4frnqufd2vo2g6sio4mufkr4fg', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533343030343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('okmb6bkfkvmtp3267ne65lp0b17va8l1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533343539323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rsp6p82btk7hdhnnb804qlbjt8jrjpc9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533343930313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4jcqtv46sv9oskif0mm8ejp4i870mr9c', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533353235323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('l3hub6mq5obnsm6bfd7nrns1fap31spq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353533353235323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9pd84juibi49ns7dejthj2npvk09ntlq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353534393839393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('l7qdsl0svunbqbleh9ohonpook5akivr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353534393839393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('50i9mv17c4m7nia5rgeih3ad22btofki', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353535313135343b),
('hiohbprnftvglav8jbqfjud8qhhuqrp9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353535313237393b),
('9o4u58msm2mojha3c1bj1q2n95qdajpa', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353535363038353b),
('1c053a99is2o6pmmj8cl25jocilrrcua', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353635353134323b),
('7o2ggp9ldpdt1mpjl92qa21639ed1cia', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353734353336353b),
('jke5epo5tu4sbrtoiobhig4stkosp3u3', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534353836353835313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('puul7dckce740p458v0bf2asoqa6huqu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363030373230313b),
('6hndp2a2713h572f2i7b32674eqalv61', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363433323533373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('d473jd5gu6b05brselb68a2cc760e3jk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363433333535303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('o13kmthna6k2ros6m60baa0ceidqvfsp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363433343538373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('qr4g1tdvnt4gqdofn8vkknjhsvltj93g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363433393430323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6cm4sotc755vv4fl4b70vrasjgta0185', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363433393836343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ct4bdp1ba0q0ut7gl5r4sg43pvjt6u0a', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434303138303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('eeq0m3dn4fj6i0ain44tb3u8vg8v2ggs', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434303736363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('bpj0fcvm8b10cotj4gjqd7fgd45j1ihc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434313038313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('t2ubitamomu1l8995mmcjdlacu15qkn2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434313936363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a3132303030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b613a31313a7b733a323a226964223b733a313a2233223b733a31313a226b6f64655f626172616e67223b733a383a224241522d30303033223b733a343a226e616d65223b733a34333a22436f766572206d6f746f7220686f6e64612073636f6f7079206d757261206d65726961682073656b616c69223b733a353a22696d616765223b733a31333a2270726f642d633564622e706e67223b733a353a226265726174223b733a343a2231303030223b733a383a226b617465676f7269223b733a383a226f746f6d6f746966223b733a31303a2270726f64756b5f73656f223b733a34333a22636f7665722d6d6f746f722d686f6e64612d73636f6f70792d6d7572612d6d65726961682d73656b616c69223b733a333a22717479223b643a313b733a353a227072696365223b643a3132303030303b733a353a22726f776964223b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b733a383a22737562746f74616c223b643a3132303030303b7d7d),
('d9ukr56vfro0jmpachv0va3met7jf16m', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434313631343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('224n6lrae3n69gkrvo0gvi2u79la3unm', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434323237323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rl93eilvjom03c418odctuc98r26tco3', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434323837313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rljb2kkio4am32pih003b8imip941vjo', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434333230363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('78o4idjtf4b4ukfp5n354s93acr6afok', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434333832343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9i1o7416ij5dmsj6ti6rr7sa3eavcurk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434343430373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('bdv78krb3pfq72g2fo6fm59krg8f386u', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434343733303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('8opb7u8etqgklm56mo5f02opvgjb857k', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434353130353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('u4sbb0e48ncq6adjr385mof75dkqpl48', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434353430383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('mtfffg2u3ut5qnfnseu5lns06j71du0l', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434363136333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7guakm56da40qtfi3klspomf9p7kql90', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363434363136333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('bqdishao7einptsu3plp8u0kc9bgu6i0', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437313435333b),
('kbbv4fguvtuua2nla00dlsuum32h24qn', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437313432363b),
('k0fi4d97oq0uf9bjrrsq4c4d6r8s4nif', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437313933373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('umrpf3s4plok50pqsmht95p1ifsbe93v', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437313539373b),
('n25726f90bhf8khlhllajs11bm4rnqsq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437313839323b),
('4oa6584u4niqmpqafsi4np2ln3qahsr9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437323239373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('976am8mbck0oea43pldssot6pkrhrkh7', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363437323239373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('dktdp8k0h7e48m1187i05952ksl3p6a6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363531383838363b),
('7bjr4t9n9jfp99vbtsib5l9eakjg1v53', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363535373230373b),
('ujdfj4aucuu2u4km6369vf49dfci66hh', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363630373636373b),
('el1uqk77grv92tm889as3hu7h3u1764e', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363630373533313b),
('es20ha3jbs2nuff1p4dkqlipcrl1mova', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363630373636373b),
('a3bqltf2ul8fgahmbk34v1ahc81s664g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363630393034333b),
('32j1ebcihk8131ap4olk09t7ca1ilc4k', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631313131373b),
('uuepir7p0l1tu55dg14vp5ln2gfjfk28', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631313634363b),
('jg6h835jd8g42dopi91i9vbc6jg703sp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631323034373b),
('mcpev3kv3soav0m8q9pe6aqioard7u3l', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631323635343b),
('h8mqokg81icu0slouo9ofpe901qjvsis', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631333030303b),
('pr0hr5plnlkr9m2hp13rdqg2teic0ek4', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631333536393b),
('2qbn1jkisl4rjr0ji8v675o7b3a00iln', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631343130393b),
('d329kgj7p7i7e1t1addjvut0ulqvck8c', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631333833313b),
('gkjo7h9jl3rmij95ng46vma8et08tocr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631343433373b),
('78gvf06lujfl33apg83usgtiunr9v525', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631343936393b),
('eo5esl0u33q0lgm91fb8h4u3udp90bkb', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631353333313b),
('vl94foilap8m22s6g16a591vpqbp70ov', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631353033313b),
('p8m86if12v4dis473b07k6nsvk4e72cr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631353333313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('40qlunc655uh23sg6d82g8654jpubibv', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631373239333b),
('867g577i8b2un3gddhg53om9a3rbh942', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631373239333b),
('iavjoh14qncavcm44cj192mu70mp80s4', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631393331323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('vg46abcc0o2il675a9lg60gvs5ipbtl1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631393233333b),
('k2etqk55ju2jfdvllm4mibfsjnpkid4e', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631393233353b),
('29hgrps3mn66gdsdbsmodeia7enbqjnp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363631393633363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('a2hg5mtnjgqrm55okfmggt0t668kuf2o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632303030383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jop5tvf7l8nl2c4voct99rmd2b1jb98p', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632303932323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1tdarvu366a0om95ttm59154n6cdi7rp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632313334323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('qbmmk6raft618d5cie5k2sp51289c9d1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632313731333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('s10mk8ogtj5dqe7ou9uacued4up0s8fl', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632323231393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('pc6sd4avg51uogfcp7tghvqe2ockm9mf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632323831313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1stsap55vdqosv47lmb3lrhp7b2hggvm', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632333133373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('b45u95lr3misbuel79vacmgs011dstp2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632333535343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('65mnnvds79hqetl1vpr28euut4gjh9cf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632333930303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fgmvs85guf8duajh4shbds9g3c0cj2cr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632343234323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('od5l0ma2p9o6f4j46o1qinej0jpn6i0v', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632343833323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('sib7phuiia29cch6t1ae1o1ah7hsg0ih', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632353135303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('maui2ftini727smo2j2jhupvaqdobb0q', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632353435323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9ursj3hrsb9300gevvkqv62jfeqber1f', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632353833333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ge54ie1o335ehhm7c700hcdrqopgbrta', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632363133373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('na30d4qnrk690ro6365d8jt7pupas2qs', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363632363133373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4qrkcs8u65gcnt3tkl2mn05ehe9g8r20', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363634333938353b),
('v9ngpgtgj30e6fo6rbo5ggj5trei0mqk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363634343036373b),
('9mk3dt7oigfivfto726a3p7npvi13ptr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638363430373b),
('3tr42ueu5nhba5v4s0deq6fip6vgu9j9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638363939383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jpp30ggme7jtrlvbdj050g786vptl6lj', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638363939383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fn0qe1msme057t7mj870c3quljqv2fts', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638383736343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('lirjc3ocdl4n4ejn2n1l9e9bmb98i69g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638393132393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('gpq6j5q9fqavd1icp7g4l0bgkd3mmdo9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638393433383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ts4v5kto2dqmu4n218iknau5hsbikhb1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363638393735373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b535543434553534d53477c733a32313a224c6f676f20626572686173696c2064692075626168223b5f5f63695f766172737c613a313a7b733a31303a22535543434553534d5347223b733a333a226f6c64223b7d),
('pb1opc2gu3i7qch236m1vid7b74r2uej', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639303036373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('p1houf62pmc32tv87vn7a6lufvbi4s1p', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639303430393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('64usetg419mfd2v35d4qim079ud40638', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639303738353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2g9svdebhp5bj1f2h4cf8k61ophp8pps', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639313135313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('m5q86ssn6s778no57bouubga9r9oqu80', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639313635373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('j2kbefhmkhqlm8efomo14j2aoc995ofi', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639313937383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b);
INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('e4sfqhjoeg15546hkuhem1f6rl1gita8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639323239393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6dplac7j8jek79r25op9bfcqmhpeb2t9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639323835373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('n2ut7l14hkfh41pkhs73sarv6hai65p0', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639323835373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('bn6e0k6bhf3vo9gcoa93nme9mf29nngn', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639343332383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fdka59n08a8b457a3f8letnkqimhc83c', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639343638393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b535543434553534d53477c733a32333a224461746120426572686173696c20446920557064617465223b5f5f63695f766172737c613a313a7b733a31303a22535543434553534d5347223b733a333a226f6c64223b7d),
('ni2n1sgsoqih2jm67mifmtf4m0grl6rp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639353030343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('cnpg0rdb988rip0vh19efqpilvrgej85', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639353637393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('n6vkdobkd1992nuvnedvq2if5t5rao7v', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639363030343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('lfm911djrrtng8ec82dpob1ae9h12ed6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639363434333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fk1iubaiieqkqvaf8d288sbqhe75ui2t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639363738303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('90pu4ekl3ov733p1bjolejdi9b28h6se', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639373133363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7epe21iqq3mv4u5mrb1nef5j18cl2n4t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639373632373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('qiik159jp958ubudb2gbcnqc5u98ojkk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639383334393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9ccr3vq2c5un6cmi3kkalvk83qjaepo5', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363639383334393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2jg3gvct2lgbgrpp1a94bhtvi7ne3sni', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732373731363b),
('rt9utetsplk5bjt18udk9bia409nccvi', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732373731363b),
('k4eut0unn9pqludmpr5prbuleaqk7m0r', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732383335333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('aq7e4fave5na07uvqritdesnqfm5nopr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732383638313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('44h7dkj71m7n7cf1s63vobeo4521ta4t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732383939393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('0b3203n7lu0fs1qnatojlk0dnqu8boob', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732393337383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('vp5m1v5o1bpvdg8roah05ctmns5d028u', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363732393836393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2tou4413uc64j7h6eiargn0gs3eqknvq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733303138393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6us77mhmb9uvblnomqpv68ugq17oj3v6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733303533313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('57182heuidvvu4jtef7sbnagl004s39j', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733303533313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4to5m7gm9cg7evm1ggbrc5pl5gomlllc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733363735393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('523mctdqrmh4umrhk13besuout2ihcl2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733363735393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1sn0qfn88pf56ghv9j67uadb61hls1l6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733383236363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('80qccvt0thmer8qqojhfdhgmhgd014q6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733383537353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('nlhb8dv86i4g69g967n0jhl462ch2jdo', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733383931353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rhuegvctqftrs588gfq3o5i7s611nr3e', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363733393538373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('nf68qke21nj58kag9r29j0u3nmc85mk0', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734303238343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6gighcupr1n61b4l9lp4713hb23d6vs1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734303630363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('vqukmgaksidgm1crg1v5aqu0i3jpv7ta', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734303931343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('lb7iu8nkh6b5g3gldukffh7li6v54r8k', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734313234343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kclt4p8jj43t5ct7bnvgp715nl78sgs6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734313536323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('inlq132cg5t4t0cn419aipte1gs3ls6o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734313930363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('pbksvb0v3ui58otbpbjmd8ebdpf3o5c1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734323738393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('o9vamichpola01tq60l9pkutf74i3t83', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734323738393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('a4ibuiraq10f0d6b33e7oq67hnslvunn', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734343530343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b6572726f727c733a3139303a223c64697620636c6173733d22616c65727420616c6572742d64616e676572223e200d0a090909093c627574746f6e20747970653d22627574746f6e2220636c6173733d22636c6f73652220646174612d6469736d6973733d22616c657274223e2674696d65733b3c2f627574746f6e3e5468652066696c6520796f752061726520617474656d7074696e6720746f2075706c6f6164206973206c6172676572207468616e20746865207065726d69747465642073697a652e3c2f6469763e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('m15i6kg3vugknc9kr6t8t6s95ujhc6kl', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734353139313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2ftev3u4m1bhsgkrrcdh8ensreurejh5', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734353439323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('t81eosqn7p2uvtfn45in2use9d4r68j8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363734353439323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('eseqia70aooqphdl7nhag0c66eabpli6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363737323931383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('5it8rpq1t1gegorj59ilp5f1r7drlo50', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363737333237363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('k5ljb2q47beomldc104bb28tqgpd0jv4', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363737333539393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('il8g7nn18vcedje8rss1boo1g9cm081l', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363737333539393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('0dkosrcc2fgv7qga6oovfrra2t3u5a29', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738323935323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tt33l0gsj91ubgtqkvd5mt9vt01dpfhf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738333631303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('mfe7s8u2qn9bqtas64s7kr6cuhjugbfs', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738343235353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rc8riocvsvej2j21apr5psj5jqs78qne', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738343537303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('l1q3agsdlcf8qna1ihge1jhqb52cp2eg', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738343537303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fd1b4j6g8d2fbtbp9if3ruejljhih4dj', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738363233363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ehhpsvq9hqgib91b92qk4b2k3mppkh3g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738363536303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kf81v4tle9du6ehr60nv3bler7cvneol', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738373234363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('vj6fguji8e1p545spitcnadnhdpkhtm1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738373535333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('46kb4qe7ttv210c6savsrbij1me57oev', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738373839323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('02h8tt7cs5cb4n1uvpnq0ar4ltr5d5qp', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738383139343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ngm7bj0dc6jinuimer5keh0aqol5nb9d', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738393138373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7r2df1mfbsl9uqdnkisoom28qmfo98mt', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363738393631383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fogbt34q2gkivtp9k7fmp5gatd7ot3ps', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739303032303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('l76c917tjpargcnp4a18tuiohpj2pshq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739303332353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('60ar5ijhplb24fermnvq84hcr4387v78', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739303636373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9canjpm3vc9rrlrsdie9gg1fs2qdoiqg', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739313131393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ds7epf0su1prmsd7vtafiu1qjc1qsto1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739313432343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4481lkbm7chla4k8r35oah0hcpaarbs9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739313735383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('hlehfrn6079u3dt5l9cv5n4a6u8ti1ti', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739323234353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9lvmd769bpcv8em0olfr0tqfhki1492p', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739323631363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('b3qmq6m7c8c1b5ighupisu5fc8self3t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739323937333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('a3imnc13lgr0lmra3kv7q59t0n10fdu1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739333335303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4ki0opsfdrepq5eqc1hmvl0e6680a8c9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739333637363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kf6pghlfr58t4ect393hlvl26b5u3jlt', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739343131363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('js8joa2h861lhp85bifu3guhorc8emg1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363739343131363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('m12ps6ukml2k29ruipllt62l5scpf2lr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831353238313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('em721909ivlrvf6m8uegssrfkvovqjke', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831343737373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2vn9majneagq5q8jd1559egfevjugulv', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831363134363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rao26d1025na507mltacedf7oj7h3542', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831363438373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kp1cdk947e97o8uql8q9ma750i69gg76', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831373336383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ad8v1mm70cqqmtvddtal7t8nmshv0evf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831373639313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('nu3b3kartqn48n8tun91jktk2icc5are', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831383135333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('rnvklofblruvan1qnr3rhlpfbr2njr3k', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363831383135333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('imf0ajjgnd67r2ilomjrlaqu97o7d2os', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363836383634393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tb247p9vq878cdjbcjo6hm40klcri9d2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363836393530383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('u5qvsbrok1ahhb0rnl1jhsq5up2i84ov', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363836393530383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('p4m3mbr7f4pi0390rgdfgcr5f8jb831t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837303833373b),
('g5u634g3k65au9ganfau1em6np7p0llr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837313536373b),
('su76rg7fj1d8drpcmolp535bf5cfhio1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837323038373b),
('8ohr34la1vn6oh1ftmdm2uo5babuca1v', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837323038373b),
('oqu0k4loo00nhupc164slodgcq1fe1go', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837373030333b),
('jlub9ilu55uqbokvbpbo01e7o0k3uso1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837373333373b),
('4daigfd94ag9e2mq9ona7nb06p130emf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837383233363b),
('8903fk7i588b5t89k0dlg2fqhrdikon2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837383834393b),
('od4prcid9vjslh1gcnfv51fuqb4ht8f8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837393234303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b);
INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('od9a39eqmvinkjeu51t1bigs5k2tii0n', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837393534343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('pfe81qohct86asb0eiq4qgp0kpubu96g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363837393934313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ulvqmht8sh4hfbeu7vdlh8efvpv0d7bb', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838303536343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('8e09bik7qqpakltcj8v0u6i8778kj2dt', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838303930383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('h2g6c6pkvnd823c4r38doqjo2vfid4pu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838313232323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jjlnaonmth7dunhuvcmsfcvt164ehnu8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838313537313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7tn97qghibblh534ta9jvni56mrru115', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838313931343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1can7mpu29hijgbn6m12jdpl3p71fdqf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838323334333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tr1s9f4vsg1sd07t2kj8pp0j216q0mv6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838323637373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('f53fiojfrqmitse43hn3khlbp9eedlf7', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838333031363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9c34ib257gbn4dpkgs10k75oeriniqj6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838333331393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ofq7jdkb8fm0es6j9k6d04p74asrtsac', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838333632393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7pf41lodkvlcssiec5lhe9dvljnbhgr6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838333935383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('r92hiij7sq5h8bc7abc1laektmejn39o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838343239313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('0982s9hbgnhker8419ovp5n7nn7iibuc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838343635303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('gos0i2rf2rvpjfaa6crpm92cleeqsduu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363838343635303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('oo6rsstdkn9dsl6ffmivpvecggknneo1', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930333433343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1e0noce7ubsicmof95bdufgpqp03tutt', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930333733373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9jv0ccb4du16aqusr4n5gshbponc7120', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930343033383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9nrel1kvttqbtt1ag0ivpqp10b0c2klc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930343538323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jg2sd7ba6bai345747fukjemgksmbufd', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930343934333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4qlvcq8d8d37a7knk4l66uiae9m539f7', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363930343934333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('e0ca2sn41r6ouch4mho8lqtuda6ho5m5', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935343537383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6n4mpq7ojc8h0quj7v48l6hrln7ao51r', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935353133323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2fgrd7se46skt1s0vo7dgooqa341a9fb', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935353434353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('gb4fbqvrr9m4ecc9pnccu48umdnk4uhe', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935353736333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b535543434553534d53477c733a32333a224461746120426572686173696c2044692054616d626168223b5f5f63695f766172737c613a313a7b733a31303a22535543434553534d5347223b733a333a226f6c64223b7d),
('hrtoh2dglea06lnmpi0lnn9vkal5up6m', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935363131313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('a7i766gcfc51hto5acfvjf20apeo9fs3', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935363437313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jma6c8lis4d5jn4ggi3lqd8hii31sm4i', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935363932343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('dtql340ti6n835avidot6ci3be9csq6i', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935373235363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('h4nrpodt2870b4pofdg9uau2qk0fps3f', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935373937323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('v8lrlr0g21uhh9ip0hnkhjoeu3jq4tc8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935383734333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('46587uitushpdhmkieqi0l9o0u62io2a', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935393038323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('t8ik9vmihcs641gijtot8jgmeqvj1v87', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935393339303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('unei894i6q5qbgmc2nrmsrn0ji76b5d6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935393639363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('0vopqag29gensp6vdtg3566i40i5h4ig', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363935393639363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('3krcq6vhuhekciuc4aqhpbuu1sd51i0u', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936313135393b),
('lvob78sr399d7l4uibhtvsia7kagk7ak', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936313737363b),
('u1vghto0g6980fuuf8a7fcctbv13at6n', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936323136323b),
('4g0gbg19fkho89uvpvkeo2i2epp90rav', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936323532313b),
('o4voco0dkaba94pqrk6i1n2mmdrpolgc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936323832373b),
('dnl9c8eho6k5ejhki8684tfjbhuagcsd', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936333135333b),
('hm4jv8on8829q55i4etqa22fj7jeoc74', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936333437353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('6iq1ls3fdh7nllfn6mcs24c1eihofbeq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936333830343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('r340r3jrft7njnfl803jre8l9jp7r2dl', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936343132363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('qb2p6h4uprf6qlevn79h70c38doeodhd', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936343532343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jihtv95i2797jcur1kqp0avd24cnpppi', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936343834383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jpqcbetail34citof8d4j5uvrrqlokja', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936353232343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kp1f0foiun48b1v6vosg2a89e70635ab', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936353630323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jg0n3b3ss148930sf2tt9u5rnl21nb1k', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936363038363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('n7t731jaqi2tca7oq5jo7nvuvoon5snb', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936363339393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('0iq3o98veiea493r11gauto3kom0sctm', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936363739373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('jkl6jvklh2o7dksuurtqbtbc99h1hoea', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936373430393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('gk9i7jm28kmlb7j9u9q4akcjeqmb2gnk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936373733373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('g1qd2nfch27g7ers0mauuf7jl5q5nas4', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936383134383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('omvoejjsgt6219to624iq11q42iaaaaj', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936383835343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('pdcc7svcvj5dnv9v9m677b4f8d0ml6up', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936393139333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('10512eim5rl4vad08tjrp2c16pfvd3mu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936393535313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('n47lmjkp78e6pp8injk0boolb43ps5b7', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363936393535313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('p7m4d3a88j0k0cah8bp919967rm5pt34', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373033383731343b),
('aii0cud8deu60t48sd0tlamtc2jmf360', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373033393936363b),
('j74o72qiarvn6qcget849i3m7bgfjq0s', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034303833363b),
('4sv06n7707fr7jag1hck5agrjm35aoo9', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034313438313b),
('ce3t7g13r90qgttg5v2ij12ak35teej2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034313738323b),
('opf7um38ev3upv481hpijo6bpas6bhos', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034313738323b),
('9n80jslk686n10ksrg30im01m06nh5tc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034323531313b),
('n4lkafqonr56o6b8himmne98af2ubvds', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034333433333b),
('gu906gsvl3a9aep93f1srv1e2uasrm01', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034333830333b),
('2om09acp09jqhkcmatq11699qdm9mu67', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034343435363b),
('aud06rgpn1rbl77hkdipcgtejffu6n7b', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034343131303b),
('pt3o5tt1fsen4nlkone248sse0lc8va2', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034343834383b),
('2o7vq3q23dqfu187b306i3djmjm93d8t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034353135373b),
('m6p2iq7dcou02gcbduqtl62bjdh00qrl', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034353439343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('qqe8pe3rb9tpf06ma8m73vr7mt2ifuj0', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034353831343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('b09fhehc64bg3lbb5g5lu3asam2erbug', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034363539393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('8thlhotdi5i6e3686ccg6rcernothiid', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034363234323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('fiefomgld5gpgdamfbljr6fhv2sca82o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034373032343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('h1a68hki4bu7f096ku207mbbojfoe5vk', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034373332363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('ve4qe8is73lechst0gevv6i6i19kri6t', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034373730353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('oe7e9n1n1uhls6c3bn9q2qod8hupdsa8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034383033383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1rfr22v9i232rovjiudkva2g7v6bb8rf', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034383334343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('oup82houu9oum7cf0pfmpvdcbgoodejr', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034383731333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tmplrt4f39g8s4sfdd9qq6uk4rmfrpbc', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034393039383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('clee2lrv21uvdu7gljguginlandcvtah', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034393531303b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('8gb8pn7h28t1hnlp3h4sbocs8sbe2dlb', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373034393837323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('1nf3873oabq0dqd1q33uf06nrfslu04e', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035303139343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tq2robu1srgors741nbvfkv7l1shou3o', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035303832363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('cg7v62as3f4uf176qarecp32336lj62q', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035313135383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('essp0n72a9umiu2r4ejgv9s2eaua53uu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035313537343b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9sl7l36lgn8ccav54gnp4igkd89ctue6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035313839323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('slirhkbd2qlq167uqvogq034a9k48tb5', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035323139333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('d4oaiil0v5hfbg708tp0l0cl905a1iq7', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035333030313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('7c7mraosne300pvpql7tqd5g3oggau6g', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035333338323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('kvle370mbin1chuh4d1hgnt3ecifi93s', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035333638333b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('9tbn8gltdbbek5j6i6mmps89kor6jnek', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035343130323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('50mf0hauuees44adaue2qvkmt4opp9qu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035343433353b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('cjpbr19sdabt0u3av349djg62fr6irq3', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035343933393b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4p8p51kprnlrip99licdo8if5dsefhqj', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035353234313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('q2pl23b9m1q1s03e1b7ro4frl3139de6', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035353635363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b);
INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7o3kcfbmn8k8qeaujhsnltriei7nbl93', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035353936313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4stva09shq4mk8o2cvahq2vjkm8mp6ul', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035363532313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('j1j3t8i68l2k85vic7h5490lg4njqv0e', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035363939373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('nojgila9oi20f5d7ht9qk1udmvtqe8ae', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035373331323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('u8lobet5m428r9d2lin993hso4dorjgq', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035373632313b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('4bd0jpjf8jugoklb4pt3jm3p9lbasnif', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035373935373b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('2dnr353b6q5qfg3petig5g6m1lbn7rjv', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035383335323b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('3na1tk1mblql5akohrk0asev69ksj01v', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035383731383b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('elltd6qm16lcrl805scot0kunrpsq7mu', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035393136363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b),
('tjj1bmtepoad82h8ern4qismf87a9uj8', '::1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373035393136363b6c6f676765645f696e7c623a313b70617373776f72647c733a36303a2224326124303824354c7649556c783467734777457172554d735a3567657349704d7930647448503543513057614643514b7361362e597279735a7043223b656d61696c7c733a31393a22657273616a6f676a6140676d61696c2e636f6d223b757365726e616d657c733a393a226f70657261746f7231223b6e616d615f6c656e676b61707c733a31303a2241646d696e2053617475223b7374617475737c733a313a2231223b666f746f7c733a303a22223b6c6576656c7c733a323a223031223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_config` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `deskripsi_situs` varchar(500) NOT NULL,
  `meta_deskripsi` varchar(500) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `email_website` varchar(50) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `komentar` varchar(150) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` char(255) NOT NULL,
  `maintenance` char(1) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `tumblr` text NOT NULL,
  `googleplus` text NOT NULL,
  `vimeo` text NOT NULL,
  `skype` text NOT NULL,
  `linkedin` text NOT NULL,
  `youtube` text NOT NULL,
  `hak_cipta` text NOT NULL,
  `tema` varchar(255) NOT NULL,
  `livechat` varchar(2000) NOT NULL,
  `analityc` varchar(2000) NOT NULL,
  `sharethis` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_config`, `nama`, `slogan`, `deskripsi_situs`, `meta_deskripsi`, `meta_keyword`, `telepon`, `alamat`, `email_website`, `pemilik`, `website`, `komentar`, `logo`, `favicon`, `maintenance`, `facebook`, `twitter`, `instagram`, `tumblr`, `googleplus`, `vimeo`, `skype`, `linkedin`, `youtube`, `hak_cipta`, `tema`, `livechat`, `analityc`, `sharethis`) VALUES
(1, 'Bang Ipin Blog\'s', 'Pemrograman Web, Custom Web, SEO Dan Jasa Pembuatan Website', 'Pemrograman web, Custom Web, SEO dan Jasa Pembuatan Website', 'Pemrograman web, Custom Web, SEO dan Jasa Pembuatan Website', 'Pemrograman web, Custom Web, SEO dan Jasa Pembuatan Website', '085747875865', 'Ds. Lemah Dadi RT 02 Bangunjiwo Kasihan Bantul\r\nYogyakarta', 'ersajogja@gmail.com', 'ERVIN SANTOSO', 'https://bangsoftware.000webhostapp.com', '', 'logo-6317.png', 'fvc-c552.png', '', 'bangipin15', 'bangipin15', 'bang__ipin', 'bangipin15', 'bangipin15', 'bangipin15', 'bangipin15', 'bangipin15', 'bangipin15', '', 'red', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5b29f725d0b5a5479681faca/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id` bigint(20) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `status_delete` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `dibuat_oleh` varchar(30) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `dimodif_oleh` varchar(30) NOT NULL,
  `tgl_modif` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 Atau Tidak Aktif=0',
  `tipe` char(1) NOT NULL COMMENT 'Top=1 Atau Bottom=0',
  `posisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `judul`, `deskripsi`, `gambar`, `dibuat_oleh`, `tgl_dibuat`, `dimodif_oleh`, `tgl_modif`, `status`, `tipe`, `posisi`) VALUES
(1, 'Lorem Ipsum', 'Apakah Lorem ipsum itu ? mungkin pada belum tahu.. cek blog kami', 'sli-620f.jpg', 'operator1', '2019-01-06 23:31:33', 'operator1', '2019-01-08 20:35:47', '1', '1', 1),
(2, 'CDR or AI', 'Desain grafis dengan software corel draw atau dengan Adobe ilustrator? Lebih Memilih Gambar Bitmap atau Vector', 'sli-652a.png', 'operator1', '2019-01-06 23:36:57', 'operator1', '2019-01-06 23:53:31', '1', '1', 0),
(3, 'Mau Buat CMS  Sendiri?', 'Tutorial lengkap membuat Content Manajemen System dengan PHP', 'sli-c9d3.png', 'operator1', '2019-01-09 22:13:31', 'operator1', '2019-01-09 22:13:31', '1', '1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2019-01-02', 1, '1546445105'),
('::1', '2019-01-03', 16, '1546518894'),
('::1', '2019-01-04', 5, '1546615477'),
('::1', '2019-01-05', 1, '1546623418'),
('::1', '2019-01-08', 26, '1546966797'),
('::1', '2019-01-09', 88, '1547053055'),
('::1', '2019-01-10', 51, '1547059206');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `status` char(1) NOT NULL COMMENT 'Aktif=1 atau Tidak Aktif=0',
  `posting` varchar(255) NOT NULL,
  `dimodif_oleh` varchar(255) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_modif` datetime NOT NULL,
  `posisi` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `tag_seo` varchar(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `tag`, `tag_seo`, `user_id`, `tgl_dibuat`) VALUES
(1, 'pendidikan', 'pendidikan', 'operator1', '2019-01-08 20:55:02'),
(2, 'galleri', 'galleri', 'operator1', '2019-01-08 20:55:16'),
(3, 'fashion', 'fashion', 'operator1', '2019-01-08 20:55:28'),
(4, 'piknik', 'piknik', 'operator1', '2019-01-08 20:55:38'),
(5, 'teknisi', 'teknisi', 'operator1', '2019-01-08 20:56:04'),
(6, 'domain', 'domain', 'operator1', '2019-01-08 20:56:14'),
(7, 'hosting', 'hosting', 'operator1', '2019-01-08 20:56:23'),
(8, 'pameran komputer', 'pameran-komputer', 'operator1', '2019-01-09 22:48:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id`, `tema`, `status`, `image`) VALUES
(1, 'default', '1', 'themes-88ce.png'),
(2, 'blue', '1', 'themes-cba7.png'),
(3, 'green', '1', 'themes-5f5d.png'),
(4, 'lightblue', '1', 'themes-414f.png'),
(5, 'pink', '1', 'themes-bdc2.png'),
(6, 'marsala', '1', 'themes-0779.png'),
(7, 'red', '1', 'themes-b80b.png'),
(8, 'violet', '1', 'themes-9b58.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `namaclient` varchar(50) NOT NULL,
  `emailclient` varchar(50) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `testimoni` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `namaclient`, `emailclient`, `perusahaan`, `testimoni`, `gambar`) VALUES
(1, 'ersa walian', 'ersajogja@gmail.com', '', 'Luar biasa pelayanannya ramah dan cepat.  Tidak salah saya buat aplikasi website disini. service support 24 jam.  Semoga terus berkembang usaha anda.', 'testi-2086.png'),
(2, 'Lina', 'Ersanawa@gmail.com', 'Alhuda.com', 'Dari mana saya bisa mendapatkannya?\r\nAda banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal.', 'testi-53a1.png'),
(3, 'Ipin', 'go.freshener@gmail.com', 'rumahidaman.com', 'Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu.', 'testi-caf3.png'),
(4, 'Hasan', 'bangsofftware123@gmail.com', 'Senior Web', 'Dari mana saya bisa mendapatkannya?\r\nAda banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk,', 'testi-2b2e.png'),
(5, 'Imron', 'bangunjiwosoftware@gmail.com', 'Rumahdahsyat.com', 'Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian tertentu. Karena itu inilah generator pertama yan', 'testi-a7cf.png'),
(6, 'Rudi', 'rudiAryo@gmail.com', 'rudicrew.com', 'sangat rekomendasi sekali', 'testi-6c9b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `produkid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `komentar_id` char(1) NOT NULL DEFAULT '0',
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `review` text,
  `disetujui` smallint(1) UNSIGNED NOT NULL DEFAULT '0',
  `status` smallint(1) NOT NULL DEFAULT '0',
  `votes` decimal(10,0) NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dibaca` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `invoice` (`invoice`) USING BTREE;

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iklan_child`
--
ALTER TABLE `iklan_child`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laman`
--
ALTER TABLE `laman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landingpage`
--
ALTER TABLE `landingpage`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_parent`
--
ALTER TABLE `menu_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD KEY `timestamp` (`timestamp`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_config`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `atribut`
--
ALTER TABLE `atribut`
  MODIFY `id_atribut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `iklan_child`
--
ALTER TABLE `iklan_child`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `kode_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laman`
--
ALTER TABLE `laman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu_parent`
--
ALTER TABLE `menu_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_config` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
