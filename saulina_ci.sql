-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 03.30
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saulina_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `judul_agenda` varchar(255) NOT NULL,
  `isi_agenda` varchar(5000) NOT NULL,
  `tempat_agenda` varchar(255) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `waktu_agenda` time NOT NULL,
  `foto_agenda` varchar(255) NOT NULL,
  `tglinput_agenda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul_agenda`, `isi_agenda`, `tempat_agenda`, `tgl_agenda`, `waktu_agenda`, `foto_agenda`, `tglinput_agenda`) VALUES
(1, 'Pelantikan Pengurus Gereja Kristen Indonesia', 'Menyambut Gubernur dan menampilkan tari kreasi', 'Swiss Bell Hotel', '2021-06-19', '10:00:00', '8c8fd35a4ef75165612176a3b99b3580.jpg', '2021-07-21'),
(2, 'Penampilan pelantikan GMKI', 'Tari Kreasi', 'Gedung Pramuka', '2021-06-19', '17:00:00', 'dde9528489c72ff186b33e02e8d305de.jpg', '2021-07-09'),
(3, 'Pernikahan Adat batak Briptu Jerry & Briptu Rotua', 'Menampilkan tari kreasi', 'Gedung Gubernur', '2021-07-08', '13:00:00', 'fb4d30a66ed75ff5be37c0b9662863cf.jpeg', '2021-07-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_galeri` int(11) NOT NULL,
  `ket_galeri` varchar(255) NOT NULL,
  `foto_galeri` varchar(255) NOT NULL,
  `tglinput_galeri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_galeri`, `ket_galeri`, `foto_galeri`, `tglinput_galeri`) VALUES
(1, 'Saulina', 'a4c6d7d3381041ae64d453c366caecc7.jpeg', '2019-12-25'),
(2, 'Saulina', 'c01087ac92ec853d5e9a3db3cf9a79de.jpg', '2019-12-25'),
(3, 'Saulina', '0db9b900cd91d6400998c6c83f46bd1e.jpg', '2019-12-25'),
(4, 'Saulina', 'b0ec2e91cb283186f42f1a329d590050.jpeg', '2021-07-07'),
(5, 'Saulina', 'fcf6e0731f113f7a2183fab96abf8dad.jpg', '2021-07-07'),
(6, 'Saulina', '96ff5d5a3305cd0dcfa76c6e104627cb.jpg', '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok_penari` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto_jasa` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama`, `stok_penari`, `harga`, `deskripsi`, `foto_jasa`, `tgl_input`) VALUES
(2, 'Tarian Batak Angkola', 4, 400000, 'Manomu-nomu (menyambut pengantin dan keluarga), manupakki, pemberian ulos, dan tari kreasi (custom)', '0cf8266f5aa8e106fc2c9ea193476780.jpg', '2021-06-02'),
(6, 'Tari Batak Simalungun', 4, 500000, 'Manomu-nomu (menyambut pengantin dan keluarga), manupakki, pemberian ulos, dan tari kreasi (custom)', '076aff4cbc625bfff72bd0069afacb82.jpg', '2021-07-06'),
(7, 'Tarian Batak Karo', 8, 500000, 'Manomu-nomu (menyambut pengantin dan keluarga), manupakki, pemberian ulos, dan tari kreasi (custom)', '530d41df25e675a4c0564bff6d8b4165.jpg', '2021-06-23'),
(9, 'Tarian Batak Toba', 8, 400000, 'Manomu-nomu (menyambut pengantin dan keluarga), manupakki, pemberian ulos, dan tari kreasi (custom)', '9647f00941fb06d4ab553705a54bd873.jpg', '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat_kontak` varchar(255) NOT NULL,
  `email_kontak` varchar(100) NOT NULL,
  `telepon_kontak` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat_kontak`, `email_kontak`, `telepon_kontak`) VALUES
(1, 'jl sultan haji bandar lampung kecamatan kejora', 'saulinadancer@gmail.com', '085769881454');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pem` int(11) NOT NULL,
  `id_sewa` varchar(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status` int(11) NOT NULL,
  `status_notif` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pem`, `id_sewa`, `biaya`, `foto`, `tgl_bayar`, `status`, `status_notif`, `dp`, `sisa`) VALUES
(1, 'T1', 1600000, '7410e814ac0808129fa7a28c2d5b950c.jpg', '2021-07-09', 2, 1, 1600000, 0),
(2, 'T2', 2000000, 'be8dffc5e38f9c525b799dd02f474235.jpeg', '2021-07-18', 2, 1, 2000000, 0),
(3, 'T3', 1600000, '89960d8569cd9c78cf69a58ad457528f.jpg', '2021-07-19', 2, 1, 200000, 1400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tglinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `judul`, `deskripsi`, `stok`, `harga`, `foto`, `tglinput`) VALUES
(2, 'Karo', 'Kebaya, songket, ulos karo, tudung kepala, dan accessoris', 0, 0, '844abf2d66d0dcc91f72c28f2e79a187.jpg', '2021-07-07'),
(3, 'Karo', 'Kebaya berwarna hijau, songket, ulos karo, tudung kepala.', 0, 0, '95dcab18b3cd4efb707ff3e40f846c19.jpg', '2021-07-06'),
(4, 'Toba', 'Kebaya berwarna merah, rok ulos hitam, sortali, kain ulos hitam, hiasan kepala, bunga di kepala, dan masker', 0, 0, 'da779b842ef55c62c5b1774f320f4859.jpg', '2021-07-07'),
(5, 'Toba', 'Kebaya berwarna kuning, rok ulos sadum, sortali, tandok, ikat pinggang, siger, bunga, dan gelang tangan.', 0, 0, '9dc8959426502a80bed493add210b86a.jpeg', '2021-07-07'),
(6, 'Toba', 'Kebaya kutu baru merah, ulos sadum merah, kain ulos hitam, siger, sortali, bunga, dan accessoris lainnya', 0, 0, '30e0962bdb90c491972e4f7d29875639.jpeg', '2021-07-07'),
(7, 'Toba', 'Kebaya putih, kain rok putih hitam, ikat pinggang, sortali, mahkota, bunga, dan masker.', 0, 0, 'b0ec32edaf25da5e1a87fac086bfc25c.jpg', '2021-07-07'),
(8, 'Toba', 'Kebaya kutu baru berwarna biru, rok ulos sadum merah, sortali, ikat pinggang, ulos sadum merah, gelang tangan dan gelang kaki', 0, 0, 'dadb28a051738e914955fa784a0a6bda.jpeg', '2021-07-07'),
(9, 'Simalungun', 'Kebaya berwarna ungu, kain rok ulos simalungun, ulos simalungun, ikat pinggang, bunga dan bulang', 0, 0, 'a6592122d3fde929c2825e788be44fc6.jpg', '2021-07-07'),
(10, 'Simalungun', 'Kebaya kutu barumerah, kain rok ulos simalungun, ulos simalungun, ikat pinggang, bulang, bros dan gelang tangan.', 0, 0, 'f9327ae05a71b7c1c2a45fecf462f6db.jpg', '2021-07-07'),
(11, 'angkola', 'Kebaya kutu baru merah, ulos hitam, ulos sadum merah, sortali, ikat pinggang, bunga, gelang, dan anting.', 0, 0, '61b98ba9093dffac634f566b97678847.jpg', '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_profil` text NOT NULL,
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `judul`, `isi_profil`, `foto_profil`) VALUES
(1, 'Sejarah Saulina Dancer', 'Saulina dancer berdiri sejak tahun 2018, saat itu ada beberapa wanita yang awalnya hanya iseng dan kebetulan hobi menari ditawarkan oleh sanak saudaranya untuk tampil di acara pernikahan mereka. Lalu setelah acara tersebut mereka berinisiatif untuk menawarkan jasa menari di setiap acara pernikahan teman-temannya kurang lebih 2 bulan lamanya dan job pun semakin ramai. Pada akhirnya mereka berdiskusi, terciptalah nama Saulina Dancer yang artinya \"wanita yang teramat mempesona\".\r\nTidak lama kemudian, logo Saulina Dancer pun dibuat yang artinya ada seorang perempuan  sedang menyatukan dua tangannya berpakaian layaknya adat batak melambangkan seorang penari batak yang sedang menari somba. Lalu dibelakang perempuan tersebut ada motif bewarna merah dan hitam melambangkan kain ulos khas batak yang dibuat menggunakan alat tenun', '9c7d4c6a6e1d79308d700a48255cae42.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_jasa`
--

CREATE TABLE `sewa_jasa` (
  `id_sj` varchar(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_penari` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_acara` date NOT NULL,
  `waktu` time NOT NULL,
  `status_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `sewa_jasa`
--

INSERT INTO `sewa_jasa` (`id_sj`, `id_jasa`, `id_user`, `jumlah_penari`, `biaya`, `tgl_sewa`, `alamat`, `tgl_acara`, `waktu`, `status_pesanan`) VALUES
('T1', 9, 1, 4, 1600000, '2021-07-09', 'Graha Adora', '2021-07-15', '11:30:00', 0),
('T2', 6, 1, 4, 2000000, '2021-07-18', 'Natar lampung Selatan', '2021-07-20', '10:23:00', 0),
('T3', 2, 1, 4, 1600000, '2021-07-19', 'Sinarta', '2021-07-25', '12:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_jasa_detail`
--

CREATE TABLE `sewa_jasa_detail` (
  `id_sj` varchar(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `sewa_jasa_detail`
--

INSERT INTO `sewa_jasa_detail` (`id_sj`, `id_produk`) VALUES
('T1', 6),
('T1', 3),
('T2', 3),
('T2', 2),
('T3', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_slider` varchar(255) NOT NULL,
  `tglinput_slider` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `deskripsi`, `foto_slider`, `tglinput_slider`, `status`) VALUES
(13, 'Tarian Batak Simalungun', 'Tortor (tarian) merupakan tarian seremonial yang disajikan bersaman dengan penyajian musik gondang, gonrang, gordang. Secara umum, posisi menyembah ini diperlihatkan dua lakon,pertama,badan berdiri dengan posisi kepala menunduk, telapak tangan terbuka dan dirapatkan serta di taruh di depan wajah yang menunduk serta badan (torso) sedikit condong (membungkuk ke depan).\r\nSelanjutnya, badan membungkuk total, kedua telapak tangan terbuka dan ditaruh di depan kepala serta kepala menunduk sehingga lakon yang tampak cenderung seolah-olah mencium tanah.', '8590df14a6efd760ad988ed564d52121.jpg', '2021-06-24', 1),
(14, 'Tarian Batak Karo', 'Tor-tor Batak karo merupakan tarian suku batak wilayah Karo Sumatera Utara yang juga memiliki jenis gerakan dan tujuan tertentu. Masyarakat Karo sendiri menyelenggarakan tarian khas ini sesuai dengan hajat masing-masing tuan rumah. Setidaknya ada 3 jenis tarian karo yang sering diselenggarakan oleh masyarakat Karo, yaitu tari Gundala-gundala, Ndikkar, dan Piso Surit.', 'c1eac347f79fae7b17f4b7ce7e6f1152.jpg', '2021-06-24', 1),
(15, 'Tarian Batak Toba', 'Tor-tor adalah tarian purba yang identik dengan gerakan yang diiringi dengan alat musik gondang. Tortor Batak Toba sendiri merupakan tarian Batak yang berasal dari wilayah Toba yang meliputi Tapanuli Utara, Toba Samosir, Samosir, dan Humbang Hasundutan.', '210b7b8ded1d9e70b708a220211a2928.jpg', '2021-06-24', 1),
(16, 'Tarian Batak Angkola', 'Adat Batak Angkola berada di Tapanuli Selatan, banyak yang belum mengetahui tentang itu. Tor-tor Batak Angkola itu ada sedikit perbedaan antar sub etnis, baik musik ataupun gerakan tangannya. Tor-tor di Tapanuli Selatan diiringi oleh Gondang Sembilan yang sering juga disebut Onang-onang, karena ada lirik musik pengiringnya yang berbunyi Onang-onang Ile Baya Onang.', '76368f2cb123ec534663275a68e865de.jpg', '2021-07-21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `nama`, `alamat`, `umur`, `status`, `foto`) VALUES
(2, 'Ruth Artha Nauli Hutagalung', 'Kedaton Bandar Lampung', 21, 'Mahasiswi', 'c81334882619f28db7284a6081b181ba.jpeg'),
(3, 'Hanna Yunika Nainggolan', 'Waykandis Bandar Lampung', 25, 'Bekerja', 'e61b02d809715ebc6f34524a5e5b7538.jpeg'),
(4, 'Ester Debora Priscila Sialalahi', 'Korpri Bandar Lampung', 24, 'Bekerja', '0fa72e2ce9cad5c576e080909994e847.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `token` varchar(100) NOT NULL,
  `aktif` int(2) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `alamat_user`, `no_hp`, `token`, `aktif`, `code`) VALUES
(3, 'andi', 'edplampung01@gmail.com', '123456', 'way halim', '345345345345', '59124ca574f7810cb80836f719878f3e628b96a2d68665c8abb93fe8739615c5', 1, 'ZKIYlSkoqPXURtM'),
(6, 'agus', 'agussulistiono0@gmail.com', 'agus', 'semaka', '534545345345', 'fc098bf380077e15c005a3e4d267baa36c3855a87f827f5d2d38698dfa196fd6', 1, 'z4F9H1JmTahv8Wy'),
(7, 'agus', 'agussulistionoa0@gmail.com', '0000000000', 'semaka', '34534534534534', 'fc098bf380077e15c005a3e4d267baa36c3855a87f827f5d2d38698dfa196fd6', 1, 'Hrl6eWbEMo9fsiK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `ket_video` varchar(255) NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `tglinput_video` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `ket_video`, `link_video`, `tglinput_video`) VALUES
(4, 'Tortor Kreasi Panomu-nomu “Horbo Paung”', 'https://www.youtube.com/embed/AmY2Mjwj4dI', '2021-07-18'),
(5, 'Tortor Kreasi Panomu-nomuon Pengantin Adat Batak “Sihutur Sanggul”', 'https://www.youtube.com/embed/uPuha4fYPus', '2021-07-18'),
(6, 'Tortor Kreasi Batak Simalungun dan Batak Toba Provinsi Lampung', 'https://www.youtube.com/embed/F0VdzbClYCA', '2021-07-18'),
(7, 'Tortor Kreasi Panomu-nomu “Gondang Sahala” Di Bagas Raya Bandarlampung', 'https://www.youtube.com/embed/Yz_71N--mNw', '2021-07-18'),
(8, 'Tortor Kreasi “Saulina Dancer” Provinsi Lampung', 'https://www.youtube.com/embed/NG5BWDW8ZKw', '2021-07-18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE;

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`) USING BTREE;

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_galeri`) USING BTREE;

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`) USING BTREE;

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pem`) USING BTREE;

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`) USING BTREE;

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`) USING BTREE;

--
-- Indeks untuk tabel `sewa_jasa`
--
ALTER TABLE `sewa_jasa`
  ADD PRIMARY KEY (`id_sj`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`) USING BTREE;

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
