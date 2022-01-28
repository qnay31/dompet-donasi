-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 08.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dompetyatim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pengurus`
--

CREATE TABLE `akun_pengurus` (
  `id` int(11) NOT NULL,
  `id_pengurus` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `profil` varchar(200) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_pengurus`
--

INSERT INTO `akun_pengurus` (`id`, `id_pengurus`, `nama`, `email`, `username`, `password`, `profil`, `posisi`) VALUES
(1, 'admin_user', 'Meylisa Dwi Anggraheni Puspitasari', 'dypa.amanah@gmail.com', 'admin_keuangan', '$2y$10$6FHDXZqjFi7xqG7ccpo1mubbF640cSAEt0ooXDe1bvfuUa79Rm1Oq', 'profil.png', 'Administrasi Keuangan'),
(2, 'user_only', 'Yayasan Alkirom Amanah', 'dypa.amanah@gmail.com', 'user_alkirom', '$2y$10$6FHDXZqjFi7xqG7ccpo1mubbF640cSAEt0ooXDe1bvfuUa79Rm1Oq', 'profil.png', 'New User'),
(3, 'ketua_user', 'Riki Subagja', 'dypa.amanah@gmail.com', 'riki1011', '$2y$10$6FHDXZqjFi7xqG7ccpo1mubbF640cSAEt0ooXDe1bvfuUa79Rm1Oq', 'profil.png', 'Ketua Yayasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `nama_rek` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `bank`, `nama_rek`, `no_rek`) VALUES
(1, 'BRI', 'Yayasan Dompet Yatim', '052301000259302'),
(2, 'BNI', 'Dompet Piatu Amanah Yayasan', '946713835');

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `link` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `terkumpul` varchar(50) NOT NULL,
  `penggunaan_dana` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `dibuat` date NOT NULL,
  `berakhir` date NOT NULL,
  `deskripsi` text NOT NULL,
  `ajakan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `campaign`
--

INSERT INTO `campaign` (`id`, `link`, `nama`, `judul`, `terkumpul`, `penggunaan_dana`, `target`, `dibuat`, `berakhir`, `deskripsi`, `ajakan`, `foto`, `status`) VALUES
(1, 'banturizal', 'fauzi rhamadan', 'yatim piatu rizal, bantu melawan thalasemia', '1950020', '0', '30000000', '2021-10-22', '2021-11-24', '&lt;p&gt;&lt;strong&gt;Muhammad Rizal ( 16 thn ) didiagnosa thalassemia sejak usia 6 tahun. Rizal kini tinggal hanya Bersama Kakek &amp; Neneknya yang bekerja serabutan. Setiap 3 Minggu sekali Rizal harus melakukan transfuse darah, untuk sekali transfuse mereka harus menyiapkan dana minimal sebesar Rp 300.000 dan itu rutin. Jika dihitung , selain dipenuhi pikiran untuk kesembuhan Rizal tentu kakek &amp; nenek Rizal selalu mencari berbagai cara untuk memenuhi kebutuhan hidupnya sehari â€“ hari.&lt;/strong&gt;&lt;/p&gt;&lt;figure&gt;&lt;em&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/171e2ca33f34a942ee3fba08151b0d4e.jpg&quot; data-image=&quot;93j580piqnvz&quot;&gt;&lt;/em&gt;&lt;/figure&gt;\r\n&lt;p&gt;&lt;em&gt;â€œPernah sekali, waktu abis transfuse kita bingung cari cara untuk pulang karena uang kita ngepas banget. Rizal waktu itu rewel karena lapar juga kan. Setelah luntang lantung tanpa kejelasan di depan rumah sakit akhirnya dipertemukan dengan  Sahabatbaik, akhirnya dikasih ongkos untuk pulang sama diaâ€&lt;/em&gt; â€“ Nenek&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/36cdc464de2e9d1bf4b70d4874400a7d.jpg&quot; data-image=&quot;d4smeznbf4f7&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;Nenek setelah berusaha semaksimal mungkin kini hanya berpasrah pada Allah dan berpedoman pada Surah Al-Baqarah ayat 286 yang berbunyi,&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;Allah tidak membebani seseorang melainkan sesuai dengan kesanggupannya. Ia mendapat pahala (dari kebajikan) yang diusahakannya dan ia mendapat siksa (dari kejahatan) yang dikerjakannya. (Mereka berdoa): â€œYa Tuhan kami, janganlah Engkau hukum kami jika kami lupa atau kami tersalah. Ya Tuhan kami, janganlah Engkau bebankan kepada kami beban yang berat sebagaimana Engkau bebankan kepada orang-orang sebelum kami. Ya Tuhan kami, janganlah Engkau pikulkan kepada kami apa yang tak sanggup kami memikulnya. Beri maaflah kami, ampunilah kami dan rahmatilah kami. Engkaulah Penolong kami, maka tolonglah kami terhadap kaum yang kafir.&quot;&lt;/em&gt;&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/1fc7333d48e699ab986e72d57c5472d3.jpg&quot; data-image=&quot;3kfbijkdrsqw&quot;&gt;&lt;/figure&gt;', '&lt;p&gt;&lt;strong&gt;&lt;/strong&gt;&lt;strong&gt;Sahabat, Ayo kita menjadi perantara untuk kehidupan Rizal, Dengan cara :&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Klik tombol â€œDonasi Sekarangâ€&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Data Diri&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Nominal Donasi&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Pilih Metode Pembayaran&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Donatur akan mendapat laporan via Whatsapp&lt;/strong&gt;&lt;/li&gt;&lt;/ol&gt;\r\n&lt;p&gt;Sahabat Baik Juga dapat membagian halaman galang dana ini agar lebih banyak lagi orang yang membantu Rizal&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;', '1634868584.jpeg', 'Berlangsung'),
(2, 'agungberjuang', 'zaeni muchtar', 'berjuang melawan thalasemia, agung pratama', '1491021', '0', '30000000', '2021-10-22', '2022-01-20', '&lt;p&gt;&lt;strong&gt;Agung Pratama ( 17 Tahun ) ,sejak kecil ia ditinggal oleh kedua orang tuanya dan harus hidup berpindah pindah dari saudara ke saudara lainnya. Agung kecil dahulu bercita â€“ cita menjadi dokter agar dapat membantu banyak orang, namun sayang cita cita itu harus dikubur dalam â€“ dalam karena ia ternyata memiliki kelainan darah yaitu thalassemia yang menghambat semua tumbuh kembangnya serta  mengharuskan dia transfusi darah 10 hari sekali di RS PMI Bogor.&lt;/strong&gt; Tentunya transfuse pun memiliki resiko karena akan kelebihan zat besi didalam tubuh serta jika darah yang diterima agung tidak cocok maka ia akan mengalami sekujur badan gatal dan kejang kejang diikuti sesak nafas .&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/c9498f937fd48530228b72c526b8e325.jpg&quot; data-image=&quot;o0dsx30z2uo2&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;Karena, keterbatasan fisik dan daya kembang pikirnya iapun sangat sulit untuk memenuhi kebutuhan hidupnya dan hanya mengandalkan pemberian dari sahabat sahabat baik disekitarnya. Yuk  Sahabatbaik mari kita terus bermanfaat dan terus memberikan semangat kehidupan untuk Agung Pratama.&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/cebbb70921895094105ac7bfe4ba1d6a.jpg&quot; data-image=&quot;azbbyelmp936&quot;&gt;&lt;/figure&gt;', '&lt;p&gt;&lt;strong&gt;Sahabat, Ayo kita ringankan beban Agung dalam melawan penyakit Thalasemia yang dideritanya, Dengan cara :&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Klik tombol â€œDonasi Sekarangâ€&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Data Diri&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Nominal Donasi&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Pilih Metode Pembayaran&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Donatur akan mendapat laporan via Whatsapp&lt;/strong&gt;&lt;/li&gt;&lt;/ol&gt;\r\n&lt;p&gt;Sahabat Baik Juga dapat membagian halaman galang dana ini agar lebih banyak lagi orang yang membantu Agung&lt;/p&gt;', '1634868727.jpeg', 'Berlangsung'),
(3, 'bantufarzhan', 'fauzi rhamadan', 'bantu farzhan yatim penderita syndrome rubella', '554056', '0', '30000000', '2021-10-22', '2022-01-20', '&lt;p&gt;&lt;strong&gt;31 Januari 2021, menjadi hari yang berat bagi Ibu Novi dan khanza beserta Farzhan, Ayahnya yang telah sakit lama qodarullah dipanggil oleh sang khalik , kini ibu novi merawat Farzhan dan khanza seorang diri. Untuk memenuhi kebutuhan sehari â€“ hari dan kebutuhan Farzhan yang menderita Sindrom Rubella kini ibu Novi bekerja di kantor pos Indonesia.&lt;/strong&gt; Dengan terpaksa ibu Novi menitipkan Farzhan &amp; Khanza kepada neneknya mengingat kebutuhan untuk farzhan sendiri cukup banyak dalam 3 hari saja Farzhan menghabiskan satu kaleng susu belum untuk terapi imun beserta obat obatannya.  &lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/d72e485d9ea29e87453b131ce43894eb.jpg&quot; data-image=&quot;y7tcsw3or2g0&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;&lt;em&gt;â€œKarena butuh penangan khusus jadi pada saat ingin operasi cesar harus pindah rumah sakit, dokter bilang tidak ada bola mata dan setelah kejang pada saat umur 3 bulan itu baru ketahuan kalo farzhan memiliki sindromâ€&lt;/em&gt; Bu Novi  &lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/54422c6a067661117d03f80b38c128ca.jpg&quot; data-image=&quot;396h9e0o7cne&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;Sedikit informasi &lt;strong&gt; SahabatBaik&lt;/strong&gt;, sindrom yang diderita Farzhan ini sindrom yang cukup langka dan mengakibatkan pembengkakan ginjal dan tidak berfungsinya organ mata beserta tidak berkembangnya daya pikir , bahkan untuk kebutuhan proteinnya hanya bisa melalui susu. Maka dari itu penderita harus rutin control ke dokter.&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/a9b4c9ab63e18e83fedec86161f0b2d2.jpg&quot; data-image=&quot;hbr2gacd2x93&quot;&gt;&lt;/figure&gt;', '&lt;p&gt;&lt;strong&gt;Sahabat, Ayo kita ringankan beban Ibu Novi dalam merawat Farzhan, Dengan cara :&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Klik tombol â€œDonasi Sekarangâ€&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Data Diri&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Nominal Donasi&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Pilih Metode Pembayaran&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Donatur akan mendapat laporan via Whatsapp&lt;/strong&gt;\r\n                                                                &lt;/li&gt;\r\n                                                            &lt;/ol&gt;\r\n&lt;p&gt;Sahabat Baik Juga dapat membagian halaman galang dana ini agar lebih banyak lagi orang yang membantu Ibu Novi.&lt;/p&gt;', '1634868890.jpeg', 'Berlangsung'),
(4, 'prestasiyatim', 'alhafidz ramadhan', 'halimah, yatim bukan halangan untuk berprestasi', '800043', '0', '30000000', '2021-10-22', '2022-01-20', '&lt;p&gt;&lt;strong&gt;Siti Halimah sudah 2 kali menulis karya ilmiah untuk tingkat bogor &amp; tingkat nasional salah satunya berjudul â€œPengaruh dompetsampah terhadap perekonomian masyarakatâ€ pada saat duduk di bangku kelas 3 SMP. &lt;/strong&gt;Aktivitasnya menulis karena ilmiah sama sekali tidak mengganggu pembelajaran di sekolah , bahkan dia selalu mendapatkan nilai diatas rata rata dan selalu mendapati peringkat 5 besar di sekolahnya dalam lomba penulisan karya ilmiah yang diadakan oleh &lt;em&gt;Indonesian Young Scientist Assosiciatin ( iysa ) &lt;/em&gt;Di Bogor , Siti halimah mampu mendapat peringkat kedua dari ribuan orang yang mendaftar bahkan mengalahkan beberapa siswa SMK , sang ibu merasa bangga dengan semua prestasi yang berhasil ditoreh oleh anaknya â€œ&lt;em&gt;Ganyangka gitu, anak tadinya tidak bisa apa apa di sekolah itu bisa majuâ€ &lt;/em&gt;Pada saat SD kelas 4 pada saat mau menuju hari raya Idul Fitri . sehari hari ibunda siti halimah menjaga warung kopi di lapangan sepak bola namun semenjak pandemic ini lapangan sepak bola tidak boleh digunakan otomatis membuatnya tidak memiliki pendapatan. &lt;em&gt;â€œHarapan saya mah halimah jadi anak yang sukses bisa banggain orang tua dan solehah serta memiliki kehidupan yang lebih baik dan menjadi lebih berguna bagi orang lainâ€.&lt;/em&gt;&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/16679a2fb2cdded23946e2145194cc1f.jpg&quot; data-image=&quot;rljfgpfds6yi&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;&lt;em&gt;Ditinggal sang Ayah sejak duduk dibangku kelas 4 Sekolah Dasar , dan ibunda hanya bekerja sebagai penjaga warung kopi di lapangan Sepakbola dengan pendapatan yang tidak pasti terlebih dalam masa Pandemi seperti saat ini lapangan tidak boleh digunakan otomatis membuatnya tidak memiliki pendapatan sama sekali . Meskipun kondisinya seperti itu , Siti Halimah ( 15 Tahun ) tidak menjadikannya halangan dan tidak menyurutkan semangatnya untuk berprestasi.&lt;/em&gt;&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/c6946a6aa0b8805fa48130fe1236e4c7.jpg&quot; data-image=&quot;aazrawuaovoo&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;Siti Halimah telah berhasil dua kali menyabet gelar dalam lomba penulisan karya ilmiah, salah satunya ialah lomba yang diadakan oleh &lt;strong&gt;&lt;em&gt;Indonesian Young Scientist Association ( IYSA )&lt;/em&gt;&lt;/strong&gt;&lt;em&gt;. &lt;/em&gt;Pada saat itu Halimah duduk dibangku kelas 3 Sekolah Menengah Pertama mampu mendapat peringkat kedua dari ribuan orang yang mendaftar, dan bahkan mengalahkan beberapa siswa Sekolah Menengah Atas . &lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/d470f4d4e302caf8864a662af6d90ebf.jpg&quot; data-image=&quot;wy57bcszk0mm&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;&lt;em&gt;â€œGanyangka gitu, bangga banget saya . Anak yang tadinya tidak bisa apa apa di sekolah itu bisa maju. Saya berharap Halimah jadi anak yang sukses, sholehah , dan memiliki kehidupan yang lebih baik serta lebih berguna untuk orang lainâ€  &lt;/em&gt;&lt;strong&gt;Tutur ibu Eni Suhaeti ( Ibunda Halimah ) &lt;/strong&gt;&lt;em&gt;&lt;br&gt;&lt;/em&gt;&lt;/p&gt;', '&lt;p&gt; &lt;strong&gt;Sahabatbaik, Jangan biarkan Halimah terhenti prestasinya bantu tuntutan kehidupannya , Dengan cara :&lt;/strong&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Klik tombol â€œDonasi Sekarangâ€&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Data Diri&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Nominal Donasi&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Pilih Metode Pembayaran&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Donatur akan mendapat laporan via Whatsapp&lt;/strong&gt;&lt;/li&gt;&lt;/ol&gt;\r\n&lt;p&gt;Sahabat Baik Juga dapat membagian halaman galang dana ini agar lebih banyak lagi orang yang membantu Halimah        &lt;/p&gt;', '1634869268.jpeg', 'Berlangsung'),
(5, 'infaqyatim', 'dompet yatim', 'berbagi kebaikan melukis senyuman yatim', '6520010', '0', '100000000', '2021-10-22', '2021-11-24', '&lt;p&gt;&lt;strong&gt;Di masa pandemi ini kita sangat kesulitan tetapi pandemi ini juga mengajarkan kita untuk mengasah rasa kemanusiaan  dan kepeduliaan .  Sahabatbaik &lt;/strong&gt;&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/752db4738fc1c2995398700e64ac316b.jpg&quot; data-image=&quot;d29obnvqk1ot&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt; Sahabatbaik&lt;/strong&gt;,  melansir dari data kementerian sosial Republik Indonesia, Jumlah anak yatim pada tahun 2019 mencapai kurang lebih 8 Juta jiwa dan dalam masa pandemi ini bertambah menjadi sekitar 18 â€“ 20 Juta jiwa sementara terkhusus di provinsi Jawa Barat tercatat 7.200 anak menjadi yatim karena pandemi ini , tentu ini menjadi tanggung jawab kita Bersama demi keberlangsungan hidup mereka yang telah ditinggal oleh salah satu tiang keluarga. Maka dari itu kami akan selalu peduli terhadap mereka yang Rasul cinta.&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/2ac867e5b10a45cbc5b701abc612b2f7.jpg&quot; data-image=&quot;5wvcznaraoos&quot;&gt;&lt;/figure&gt;\r\n&lt;p&gt;Kami mengajak &lt;strong&gt; Sahabatbaik&lt;/strong&gt; semua untuk berbagi kebaikan &amp; melukiskan senyuman kepada seluruh anak â€“ anak yatim tersebut, dimulai dari pergerakan pergerakan kecil tentunya akan berdampak besar bagi kehidupan mereka. 10.000 dari kalian akan amat berdampak besar nantinya.&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/3ad01dc464b717248adc7a44abca55d3.jpg&quot; data-image=&quot;ux4ss8c6tks4&quot;&gt;&lt;/figure&gt;&lt;figure&gt;&lt;img src=&quot;https://www.dompetdonasi.com/data_admin/assets/images/cerita_campaign/4a47d529bd9863fd4d1dd0b01ba0a4ea.jpg&quot; data-image=&quot;5yq3vh33t21x&quot;&gt;&lt;/figure&gt;', '&lt;p&gt;&lt;strong&gt;&lt;strong&gt;Sahabat, Ayo kita menjadi pelukis senyuman pada seluruh anak yatim , Dengan cara :&lt;/strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Klik tombol â€œDonasi Sekarangâ€&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Data Diri&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Masukkan Nominal Donasi&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Pilih Metode Pembayaran&lt;/strong&gt;&lt;/li&gt;\r\n                                                                &lt;li&gt;&lt;strong&gt;Donatur akan mendapat laporan via Whatsapp&lt;/strong&gt;\r\n                                                                &lt;/li&gt;\r\n                                                            &lt;/ol&gt;\r\n&lt;p&gt;Sahabat Baik Juga dapat membagian halaman galang dana ini agar lebih banyak lagi orang yang melukiskan senyuman kepada mereka&lt;/p&gt;', '1634875216.jpeg', 'Berlangsung'),
(6, 'zakat', 'dompet yatim', 'berbagi kebahagiaan dengan zakat', '10057', '0', '100000000', '2021-11-02', '2022-01-31', '&lt;p&gt;dengan berzakat bisa mensucikan harta&amp;nbsp;&lt;/p&gt;', '', '1635840916.jpeg', 'Berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dompet`
--

CREATE TABLE `data_dompet` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `visitor` varchar(100) NOT NULL,
  `donatur` varchar(90) NOT NULL,
  `donasi_terkumpul` varchar(50) NOT NULL,
  `pencairan_dana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dompet`
--

INSERT INTO `data_dompet` (`id`, `bulan`, `tahun`, `visitor`, `donatur`, `donasi_terkumpul`, `pencairan_dana`) VALUES
(1, 'Januari', '2021', '', '', '', ''),
(2, 'Februari', '2021', '', '', '', ''),
(3, 'Maret', '2021', '', '', '', ''),
(4, 'April', '2021', '', '', '', ''),
(5, 'Mei', '2021', '', '', '', ''),
(6, 'Juni', '2021', '', '', '', ''),
(7, 'Juli', '2021', '', '', '', ''),
(8, 'Agustus', '2021', '', '', '', ''),
(9, 'September', '2021', '', '', '', ''),
(10, 'Oktober', '2021', '14', '50', '13261109', ''),
(11, 'November', '2021', '16', '3', '564113', ''),
(12, 'Desember', '2021', '16', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_donatur` varchar(255) NOT NULL,
  `nama_tampil` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `doa` varchar(255) NOT NULL,
  `donasi` varchar(50) NOT NULL,
  `dibuat` datetime NOT NULL,
  `berakhir` datetime NOT NULL,
  `via` varchar(50) NOT NULL,
  `kode_unik` varchar(10) NOT NULL,
  `jumlah_donasi` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `link`, `jenis`, `nama_donatur`, `nama_tampil`, `no_hp`, `doa`, `donasi`, `dibuat`, `berakhir`, `via`, `kode_unik`, `jumlah_donasi`, `status`) VALUES
(1, 'banturizal', 'Yatim Piatu Rizal, Bantu Melawan Thalasemia', 'hamba allah', 'anonim', '0869845415112', 'semoga kembali normal', '50000', '2021-10-20 10:16:25', '2021-10-20 22:16:25', 'BRI', '1', '50001', 'Terkonfirmasi'),
(2, 'bantufarzhan', 'Bantu Farzhan. Yatim Penderita Syndrome Rubella', 'farhan', 'farhan', '584395834589', 'Ada rezeki tapi sedikit mudah mudahan bermanfaat', '50000', '2021-10-20 10:28:03', '2021-10-20 22:28:03', 'BNI', '2', '50002', 'Terkonfirmasi'),
(3, 'banturizal', 'Yatim Piatu Rizal, Bantu Melawan Thalasemia', 'deri haryanto', 'deri haryanto', '0845698785441', 'semoga rizal selalu didalam lindungan Allah SWT', '1200000', '2021-10-20 10:37:41', '2021-10-20 22:37:41', 'BRI', '3', '1200003', 'Terkonfirmasi'),
(4, 'agungberjuang', 'Berjuang Melawan Thalasemia, Agung Pratama', 'fadhillah', 'fadhillah', '0245484566', 'Semoga dilancarkan semuanya', '150000', '2021-10-20 11:33:15', '2021-10-20 23:33:15', 'BRI', '4', '150004', 'Terkonfirmasi'),
(5, 'banturizal', 'Yatim Piatu Rizal, Bantu Melawan Thalasemia', 'toni', 'toni', '0524546482', 'Semoga bermanfaat untuk adik rizal', '500000', '2021-10-20 11:34:18', '2021-10-20 23:34:18', 'BNI', '5', '500005', 'Terkonfirmasi'),
(6, 'bantufarzhan', 'Bantu Farzhan. Yatim Penderita Syndrome Rubella', 'jafran', 'jafran', '08975451521', 'Semangat buat ibu novi dan ade farzan semoga di berikan perlindungan selalu oleh allah swt', '1500000', '2021-10-20 11:36:07', '2021-10-20 23:36:07', 'BRI', '6', '1500006', 'Terkonfirmasi'),
(7, 'bantufarzhan', 'Bantu Farzhan. Yatim Penderita Syndrome Rubella', 'fauzi Rhamadan Salahudin', 'fauzi', '0855465465', 'kuat ya farzhan, semoga Allah SWT senantiasa memberikan kesehatan Aamiin', '950000', '2021-10-20 11:38:38', '2021-10-20 23:38:38', 'BNI', '7', '950007', 'Terkonfirmasi'),
(8, 'agungberjuang', 'Berjuang Melawan Thalasemia, Agung Pratama', 'meylisa', 'meylisa', '057845411541', 'semoga agung kuat yaa, tetap ceria', '841000', '2021-10-20 11:39:37', '2021-10-20 23:39:37', 'BRI', '8', '841008', 'Terkonfirmasi'),
(9, 'agungberjuang', 'Berjuang Melawan Thalasemia, Agung Pratama', '12345', 'anonim', '08609483509', 'semoga berkah...', '500000', '2021-10-20 18:00:18', '2021-10-21 06:00:18', 'BRI', '9', '500009', 'Terkonfirmasi'),
(10, 'banturizal', 'Yatim Piatu Rizal, Bantu Melawan Thalasemia', 'Hamba Allah', 'anonim', '08579393682', 'Semoga lekas membaik', '100000', '2021-10-21 22:34:32', '2021-10-22 10:34:32', 'BNI', '11', '100011', 'Terkonfirmasi'),
(13, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Ade Ruhiyat', 'ade ruhiyat', '087800435844', 'Semoga semakin Amanah. Doakan saya semoga dilancarkan Rezekinya', '150000', '2021-10-22 11:46:46', '2021-10-22 23:46:46', 'BNI', '13', '150000', 'Terkonfirmasi'),
(14, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Anwar Affandi', 'anwar affandi', '085740057573', 'Semoga semakin berkembang di penjuru Indonesia', '100000', '2021-10-22 11:52:37', '2021-10-22 23:52:37', 'BNI', '14', '100000', 'Terkonfirmasi'),
(15, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Raino Suprayogi', 'raino suprayogi', '085840414270', 'alhamdulillah semoga semakin amanah dan banyak membantu sesama umat', '50000', '2021-10-22 11:56:07', '2021-10-22 23:56:07', 'BNI', '15', '50015', 'Terkonfirmasi'),
(16, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Akhy', 'anonim', '085877653452', 'semoga menjadi yayasan yang dapat membantu lebih banyak lagi anak-anak yatim', '200000', '2021-10-22 13:37:41', '2021-10-23 01:37:41', 'BRI', '16', '200000', 'Terkonfirmasi'),
(17, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Dede Yusuf', 'Dede Yusuf', '085710150252', '', '200000', '2021-10-22 13:39:08', '2021-10-23 01:39:08', 'BRI', '17', '200000', 'Terkonfirmasi'),
(18, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Suhendra', 'Suhendra', '087888534233', 'semoga amanah ya dan semoga yayasan nya lebih berkembang', '100000', '2021-10-22 13:41:20', '2021-10-23 01:41:20', 'BRI', '18', '100000', 'Terkonfirmasi'),
(19, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Wahyu Rifandy', 'Wahyu Rifandy', '088867549877', 'semoga berkah dan bermanfaat untuk anak-anak yatim', '50000', '2021-10-22 13:43:57', '2021-10-23 01:43:57', 'BRI', '19', '50000', 'Terkonfirmasi'),
(20, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hj. Marlinah', 'Hj. Marlinah', '083856435569', 'semoga bermanfaat untuk anak- anak tersayangku yang ada di sana', '100000', '2021-10-22 15:14:41', '2021-10-23 03:14:41', 'BRI', '20', '100000', 'Terkonfirmasi'),
(21, 'prestasiyatim', 'halimah, yatim bukan halangan untuk berprestasi', 'ASDWAQS', 'anonim', '56465132', 'Semangat terus untuk Halimah agar lebih berprestasi . Semoga nanti anak anak saya dapat berprestasi seperti halimah .', '50000', '2021-10-22 16:49:47', '2021-10-23 04:49:47', 'BRI', '21', '50021', 'Terkonfirmasi'),
(22, 'prestasiyatim', 'halimah, yatim bukan halangan untuk berprestasi', 'muhammad faisal', 'muhammad faisal', '0856987458451', 'semoga apa yang dicita citakan Halimah tercapai, Aamiin', '750000', '2021-10-22 16:56:26', '2021-10-23 04:56:26', 'BNI', '22', '750022', 'Terkonfirmasi'),
(23, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '088885632498', 'SEmoga bermanfaat untuk anak-anak yatim disana', '50000', '2021-10-23 09:52:20', '2021-10-23 21:52:20', 'BNI', '23', '50000', 'Terkonfirmasi'),
(24, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085822328285', 'mohon maaf baru bisa membantu sedikit. semoga bermanfaat untuk anak-anak disana', '1322245', '2021-10-23 09:55:05', '2021-10-23 21:55:05', 'BNI', '24', '1322245', 'Terkonfirmasi'),
(25, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085814638160', 'tetap Amanah dan selalu istiqomah untuk yayasannya. semoga semakin banyak rekan-rekan yang berdonasi', '200000', '2021-10-23 09:57:41', '2021-10-23 21:57:41', 'BNI', '25', '200000', 'Terkonfirmasi'),
(26, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Susana Ernawati', 'Susana Ernawati', '087854237669', 'mohon maaf cuma sedikit semoga bermanfaat', '100000', '2021-10-23 10:06:10', '2021-10-23 22:06:10', 'BRI', '26', '100000', 'Terkonfirmasi'),
(27, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Wa Ode Istina', 'Wa Ode Istina', '081887823699', '', '20000', '2021-10-23 10:08:04', '2021-10-23 22:08:04', 'BRI', '27', '20000', 'Terkonfirmasi'),
(28, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085895218709', 'Maaf hanya sedikit semoga bisa selalu istiqomah membantu anak anak yang membutuhkan', '200000', '2021-10-23 10:10:14', '2021-10-23 22:10:14', 'BRI', '28', '200000', 'Terkonfirmasi'),
(30, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '083892369885', 'Bismillah semoga bermanfaat untuk anak-anak yang membutuhkan.', '200000', '2021-10-25 09:44:03', '2021-10-25 21:44:03', 'BRI', '30', '200000', 'Terkonfirmasi'),
(31, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Ali Murtado', 'Ali Murtado', '085822752637', 'semoga dapat sedikit membantu', '100000', '2021-10-25 09:46:23', '2021-10-25 21:46:23', 'BRI', '31', '100000', 'Terkonfirmasi'),
(32, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Jumiah', 'Jumiah', '087810368053', '', '50000', '2021-10-25 09:48:27', '2021-10-25 21:48:27', 'BRI', '32', '50000', 'Terkonfirmasi'),
(33, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085710045064', 'semoga bermanfaat untuk adik-adik yaa', '250000', '2021-10-25 09:50:17', '2021-10-25 21:50:17', 'BRI', '33', '250000', 'Terkonfirmasi'),
(34, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '089634858776', '', '670800', '2021-10-25 09:56:20', '2021-10-25 21:56:20', 'BNI', '34', '670800', 'Terkonfirmasi'),
(35, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '088886755645', 'Mohon maaf baru bisa antu sedikit. semoga saya selalu istiqomah dalam berbagi', '50000', '2021-10-25 09:58:29', '2021-10-25 21:58:29', 'BNI', '35', '50000', 'Terkonfirmasi'),
(36, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085764357644', 'semoga bermanfaat untuk adik-adik yang membutuhkan', '50000', '2021-10-25 10:00:17', '2021-10-25 22:00:17', 'BNI', '36', '50000', 'Terkonfirmasi'),
(37, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Heni heni', 'heni heni', '08878165436', '', '100010', '2021-10-25 14:18:39', '2021-10-26 02:18:39', 'BRI', '37', '100037', 'Terkonfirmasi'),
(38, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Suroso So', 'Suroso So', '0889897376838', 'Semoga anak anak yatim disana tumbuh menjadi anak yang Sholeh dan Sholehah serta semoga rezeki ini menjadi sebuah keberkahan untuk semuanya Aamiin Yaa Rabbal Alamin ', '300000', '2021-10-25 18:10:47', '2021-10-26 06:10:47', 'BNI', '38', '300009', 'Terkonfirmasi'),
(40, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'PATRICK ', 'PATRICK', '084773638739', 'Semoga anak2 yatim sehat2 selalu dalam lindungan alloh SWT', '100000', '2021-10-26 06:38:22', '2021-10-26 18:38:22', 'BNI', '40', '100000', 'Terkonfirmasi'),
(41, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Heni heni', 'Heni Heni', '08962398765', 'Ada sedikit rezeki tolong di bagikan ke anak anak ya', '500850', '2021-10-26 09:29:44', '2021-10-26 21:29:44', 'BNI', '41', '500850', 'Terkonfirmasi'),
(42, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'SATIWEN BINTI YASAWIGENA', 'SATIWEN BINTI YASAWIGENA', '089797863542', 'Semoga seluruh anak2 yatim dan semua pengasuhnya sehat2 selalu dalam lindungan alloh SWT', '100000', '2021-10-26 10:12:45', '2021-10-26 22:12:45', 'BNI', '42', '100000', 'Terkonfirmasi'),
(43, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Suluh Edi Wibowo', 'Suluh Edi Wibowo', '083888976455', '', '10000', '2021-10-26 10:21:55', '2021-10-26 22:21:55', 'BNI', '43', '10000', 'Terkonfirmasi'),
(44, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'Hamba Allah', '085734211246', '', '100000', '2021-10-26 10:23:44', '2021-10-26 22:23:44', '', '44', '100000', 'Terkonfirmasi'),
(45, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085712129887', '', '100000', '2021-10-26 10:25:20', '2021-10-26 22:25:20', 'BNI', '45', '100000', 'Terkonfirmasi'),
(46, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '089978673452', 'Mohon maaf baru bisa bantu sedikit. semoga bermanfaat', '50000', '2021-10-26 10:27:09', '2021-10-26 22:27:09', 'BNI', '46', '50000', 'Terkonfirmasi'),
(47, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Prasetyo', 'Prasetyo', '089972495629', 'semoga amanah dan selalu istiqomah dalam membantu adik-adik yang membutuhkan', '50000', '2021-10-26 10:28:41', '2021-10-26 22:28:41', 'BNI', '47', '50000', 'Terkonfirmasi'),
(48, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '085724761320', 'bahagia selalu adik-adik semoga semakin banyak lagi teman yang berbagi kebahagiaan untuk kalian', '50000', '2021-10-26 10:30:33', '2021-10-26 22:30:33', 'BNI', '48', '50000', 'Terkonfirmasi'),
(49, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '087878645235', '', '50000', '2021-10-26 10:36:01', '2021-10-26 22:36:01', 'BNI', '49', '50000', 'Terkonfirmasi'),
(50, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Hamba Allah', 'anonim', '083873546273', 'semoga membantu memberi kebahagiaan untuk adik-adik yang membutuhkan disana', '250000', '2021-10-26 10:39:35', '2021-10-26 22:39:35', 'BRI', '50', '250000', 'Terkonfirmasi'),
(51, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Wandi Hariyani', 'Wandi Hariyani', '085898645833', 'semangat ya adik-adik semoga kelak kalian menjadi anak yang sukses', '471000', '2021-10-26 10:42:17', '2021-10-26 22:42:17', 'BRI', '51', '471000', 'Terkonfirmasi'),
(52, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Dwi Novi Lesta', 'Anonim', '085810150252', '', '25000', '2021-10-26 10:43:30', '2021-10-26 22:43:30', 'BRI', '52', '25000', 'Terkonfirmasi'),
(53, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Dwi Novi Lesta', 'Anonim', '085810150252', '', '25000', '2021-10-26 10:44:33', '2021-10-26 22:44:33', 'BRI', '53', '25000', 'Terkonfirmasi'),
(54, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'Dwi Novi Lesta', 'Anonim', '085810150252', '', '25000', '2021-10-26 10:45:41', '2021-10-26 22:45:41', 'BRI', '54', '125054', 'Terkonfirmasi'),
(55, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'dsafdaf', '', '54354543534', '', '546546565', '2021-10-29 10:18:38', '2021-10-29 22:18:38', 'BNI', '55', '546546055', 'Pending'),
(56, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'dfsafda', 'admin', '345453543545', '', '454666', '2021-11-01 14:34:30', '2021-11-02 02:34:30', 'BRI', '56', '454056', 'Terkonfirmasi'),
(57, 'zakat', 'berbagi kebahagiaan dengan zakat', 'banjar', 'banjar', '08945896541', '', '10000', '2021-11-02 16:14:52', '2021-11-03 04:14:52', 'midtrans', '57', '10057', 'Terkonfirmasi'),
(58, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'zaeni ', 'hgd', '08787541511', '', '100000', '2021-11-04 10:56:38', '2021-11-04 22:56:38', '', '58', '100000', 'Terkonfirmasi'),
(59, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'frsfserf', '', '454354354', '', '454354', '2021-11-24 10:21:12', '2021-11-24 22:21:12', '', '59', '454059', 'Pending'),
(60, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'rsatfgratw4er', '', '453543534', '', '4354354', '2021-11-24 10:25:22', '2021-11-24 22:25:22', '', '60', '4354060', 'Pending'),
(61, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fatr4wat', '', '12132131', '', '21323231', '2021-11-24 10:55:47', '2021-11-24 22:55:47', '', '61', '21323061', 'Pending'),
(62, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'sobat baik', 'anonim', '694586904554', '', '2000000', '2021-11-24 14:22:05', '2021-11-25 02:22:05', 'BRI', '62', '2000062', 'Pending'),
(63, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'sobat baik', 'anonim', '694586904554', '', '2000000', '2021-11-24 14:23:29', '2021-11-25 02:23:29', 'BNI', '63', '2000063', 'Pending'),
(64, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'sobat baik', 'anonim', '694586904554', '', '2000000', '2021-11-24 14:24:04', '2021-11-25 02:24:04', 'BNI', '64', '2000064', 'Pending'),
(65, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'sobat baik', 'anonim', '694586904554', '', '2000000', '2021-11-24 14:24:15', '2021-11-25 02:24:15', 'BNI', '65', '2000065', 'Pending'),
(66, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'sobat baik', 'anonim', '694586904554', '', '2000000', '2021-11-24 14:24:37', '2021-11-25 02:24:37', 'Qris', '66', '2000066', 'Pending'),
(67, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fauzi', 'anonim', '0254554654', 'dfsadsaf', '100000', '2021-11-24 14:30:56', '2021-11-25 02:30:56', 'BNI', '67', '100067', 'Pending'),
(68, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fauzi', 'anonim', '0254554654', 'dfsadsaf', '100000', '2021-11-24 14:31:37', '2021-11-25 02:31:37', 'BRI', '68', '100068', 'Pending'),
(69, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'ar4d', '', '653853663', '', '10000', '2021-11-24 14:32:07', '2021-11-25 02:32:07', 'BRI', '69', '10069', 'Pending'),
(70, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsafdsa', '', '435454634', '', '100000', '2021-11-24 15:15:01', '2021-11-25 03:15:01', 'Qris', '70', '100070', 'Pending'),
(71, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'we4r', '', '43243434324', '', '34243432', '2021-11-24 15:29:11', '2021-11-25 03:29:11', '', '71', '34243071', 'Pending'),
(72, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'werfss', '', '234234252', '', '34254235', '2021-11-24 15:30:27', '2021-11-25 03:30:27', '', '72', '34254072', 'Pending'),
(73, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsgfsga', '', '32143242432', '', '43242424', '2021-11-24 15:31:02', '2021-11-25 03:31:02', '', '73', '43242073', 'Pending'),
(74, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fgfdsdgf', '', '43535353', '', '1232334', '2021-11-24 15:35:15', '2021-11-25 03:35:15', '', '74', '1232074', 'Pending'),
(75, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'gfdsgrfsgr', '', '432423423', '', '4342343', '2021-11-24 15:39:34', '2021-11-25 03:39:34', 'BNI Virtual Account', '75', '4342075', 'Pending'),
(76, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fauzi ', '', '9045890248', '', '1200000', '2021-11-24 15:45:19', '2021-11-25 03:45:19', 'BRI Virtual Account', '76', '1200076', 'Pending'),
(77, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fgsagfg', '', '3242424432', '', '2132134', '2021-11-24 16:30:56', '2021-11-25 04:30:56', 'Gopay', '77', '2132077', 'Pending'),
(78, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fgsagfg', '', '3242424432', '', '2132134', '2021-11-24 16:31:15', '2021-11-25 04:31:15', 'Qris', '78', '2132078', 'Pending'),
(79, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsafas', '', '324324324', '', '2342434', '2021-11-24 17:16:09', '2021-11-25 05:16:09', 'BNI Virtual Account', '79', '2342079', 'Pending'),
(80, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsfgsagd', '', '4545345534', '', '100000', '2021-11-24 17:22:25', '2021-11-25 05:22:25', 'BRI', '80', '100080', 'Pending'),
(81, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsfgsagd', '', '4545345534', '', '100000', '2021-11-24 17:22:35', '2021-11-25 05:22:35', 'BRI Virtual Account', '81', '100081', 'Pending'),
(82, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'fdsfgsagd', '', '4545345534', '', '100000', '2021-11-24 17:22:47', '2021-11-25 05:22:47', 'Qris', '82', '100082', 'Pending'),
(83, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'haii ', '', '05695906859', '', '256000', '2021-11-25 10:12:30', '2021-11-25 22:12:30', 'BNI Virtual Account', '83', '256083', 'Pending'),
(84, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'safd', '', '33425344545', '', '100000', '2021-11-25 10:27:01', '2021-11-25 22:27:01', 'Gopay', '84', '100084', 'Pending'),
(85, 'banturizal', 'yatim piatu rizal, bantu melawan thalasemia', 'et5gdfgs', '', '4545325434534', '', '100000', '2021-11-25 10:28:35', '2021-11-25 22:28:35', 'BNI', '85', '100085', 'Terkonfirmasi'),
(86, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'amin', 'anonim', '0856984545456', '', '121000', '2021-11-25 13:33:20', '2021-11-26 01:33:20', 'BNI', '86', '121086', 'Pending'),
(87, 'bantufarzhan', 'bantu farzhan yatim penderita syndrome rubella', 'amin', 'anonim', '0856984545456', '', '121000', '2021-11-25 13:34:28', '2021-11-26 01:34:28', 'BRI', '87', '121087', 'Pending'),
(88, 'infaqyatim', 'berbagi kebaikan melukis senyuman yatim', 'fasdfdas', '', '313131434', '', '1234443', '2021-11-25 15:54:19', '2021-11-26 03:54:19', 'Qris', '88', '1234088', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivity`
--

CREATE TABLE `log_aktivity` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_aktivity`
--

INSERT INTO `log_aktivity` (`id`, `nama`, `ip`, `tanggal`, `history`) VALUES
(1, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-10-19 10:37:46', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(2, 'fauzi rhamadan', '127.0.0.1', '2021-10-19 10:53:12', 'fauzi rhamadan telah membuat campaign baru dengan judul Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(3, 'zaeni muchtar', '127.0.0.1', '2021-10-19 10:59:53', 'zaeni muchtar telah membuat campaign baru dengan judul Berjuang Melawan Thalasemia, Agung Pratama'),
(4, 'fauzi rhamadan', '127.0.0.1', '2021-10-19 11:01:55', 'fauzi rhamadan telah membuat campaign baru dengan judul Bantu Farzhan. Yatim Penderita Syndrome Rube'),
(5, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-19 11:02:18', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(6, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-19 11:06:08', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi campaign baru'),
(7, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-19 11:09:00', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi campaign baru dengan judul Berjuang Melawan '),
(8, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-19 11:09:22', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi campaign baru dengan judul Yatim Piatu Rizal'),
(9, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-10-19 11:12:20', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(10, 'hamba allah', '127.0.0.1', '2021-10-20 10:16:25', 'hamba allah telah melakukan input donasi untuk Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(11, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 10:22:27', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(12, 'farhan', '127.0.0.1', '2021-10-20 10:28:03', 'farhan telah melakukan input donasi untuk Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(13, 'deri haryanto', '127.0.0.1', '2021-10-20 10:37:41', 'deri haryanto telah melakukan input donasi untuk Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(14, 'fadhillah', '127.0.0.1', '2021-10-20 11:33:15', 'fadhillah telah melakukan input donasi untuk Berjuang Melawan Thalasemia, Agung Pratama'),
(15, 'toni', '127.0.0.1', '2021-10-20 11:34:18', 'toni telah melakukan input donasi untuk Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(16, 'jafran', '127.0.0.1', '2021-10-20 11:36:07', 'jafran telah melakukan input donasi untuk Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(17, 'fauzi', '127.0.0.1', '2021-10-20 11:38:38', 'fauzi telah melakukan input donasi untuk Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(18, 'meylisa', '127.0.0.1', '2021-10-20 11:39:37', 'meylisa telah melakukan input donasi untuk Berjuang Melawan Thalasemia, Agung Pratama'),
(19, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:43:31', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(20, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:53:36', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(21, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:54:23', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(22, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:57:33', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(23, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:59:02', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(24, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:59:16', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(25, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 11:59:51', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(26, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:00:22', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(27, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:00:53', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(28, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:01:20', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(29, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:01:49', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(30, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:02:10', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(31, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 12:59:36', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(32, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:02:41', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(33, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:05:21', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Berjuang Melawan Thalasemia, Agung Pratama'),
(34, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:05:33', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Berjuang Melawan Thalasemia, Agung Pratama'),
(35, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:05:42', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(36, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:05:51', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(37, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 13:06:06', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(38, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-10-20 13:07:59', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(39, '12345', '127.0.0.1', '2021-10-20 18:00:18', '12345 telah melakukan input donasi untuk Berjuang Melawan Thalasemia, Agung Pratama'),
(40, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 18:02:48', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(41, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 18:04:02', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Berjuang Melawan Thalasemia, Agung Pratama'),
(42, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-20 22:02:44', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(43, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-10-20 22:05:53', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(44, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-10-21 16:24:54', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(45, 'zaeni', '127.0.0.1', '2021-10-22 16:46:34', 'zaeni telah melakukan input donasi untuk Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(46, 'zaeni', '127.0.0.1', '2021-10-22 16:47:44', 'zaeni telah melakukan input donasi untuk Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(47, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-22 16:49:11', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(48, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-22 16:49:50', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign Bantu Farzhan. Yatim Penderita Syndrome Rubella'),
(49, 'ardian', '127.0.0.1', '2021-10-22 17:04:07', 'ardian telah melakukan input donasi untuk Berjuang Melawan Thalasemia, Agung Pratama'),
(50, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-26 09:43:48', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(51, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-27 09:29:31', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(52, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-27 10:19:41', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(53, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 09:13:05', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(54, '4edferw', '127.0.0.1', '2021-10-29 10:17:44', '4edferw telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(55, 'dsafdaf', '127.0.0.1', '2021-10-29 10:18:38', 'dsafdaf telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(56, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:31:05', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(57, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:42:23', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(58, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:42:31', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(59, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:42:55', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(60, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:43:00', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(61, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:43:23', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(62, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:43:36', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(63, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:43:49', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(64, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:43:55', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(65, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:44:15', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(66, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:44:26', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(67, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:44:38', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(68, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:44:43', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(69, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:44:57', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(70, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:45:17', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(71, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:45:35', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(72, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:45:49', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(73, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:46:22', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(74, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:46:28', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(75, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:46:33', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(76, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:46:37', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(77, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-10-29 11:48:23', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebaikan melukis senyuman yatim'),
(78, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-01 14:34:02', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(79, 'dfsafda', '127.0.0.1', '2021-11-01 14:34:30', 'dfsafda telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(80, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-01 14:45:55', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign bantu farzhan yatim penderita syndrome rubella'),
(81, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-01 14:46:01', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign bantu farzhan yatim penderita syndrome rubella'),
(82, 'Riki Subagja', '127.0.0.1', '2021-11-01 15:37:59', 'Riki Subagja Telah Login Halaman Dashboard'),
(83, 'Riki Subagja', '127.0.0.1', '2021-11-01 15:45:23', 'Riki Subagja Telah Login Halaman Dashboard'),
(84, 'Riki Subagja', '127.0.0.1', '2021-11-02 09:12:18', 'Riki Subagja Telah Login Halaman Dashboard'),
(85, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-02 09:24:17', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(86, 'dompet yatim', '127.0.0.1', '2021-11-02 15:14:31', 'dompet yatim telah membuat campaign baru dengan judul berbagi kebahagiaan dengan zakat'),
(87, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-02 15:16:22', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(88, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-02 15:16:36', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi campaign baru dengan judul berbagi kebahagiaan dengan zakat'),
(89, 'banjar', '127.0.0.1', '2021-11-02 16:14:52', 'banjar telah melakukan input donasi untuk berbagi kebahagiaan dengan zakat'),
(90, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-03 09:42:42', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(91, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-03 11:12:51', 'Yayasan Alkirom Amanah telah Mengupdate Campaign update berbagi kepada sesama'),
(92, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-03 11:22:11', 'Yayasan Alkirom Amanah telah Mengupdate Campaign Berbagi Kebaikan Melukis Senyuman Yatim'),
(93, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-03 11:36:50', 'Yayasan Alkirom Amanah telah Mengupdate Campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(94, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-11-03 11:37:52', 'Yayasan Alkirom Amanah telah Mengupdate Campaign Yatim Piatu Rizal, Bantu Melawan Thalasemia'),
(95, 'Yayasan Alkirom Amanah', '::1', '2021-11-03 16:06:16', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard'),
(96, 'zaeni ', '127.0.0.1', '2021-11-04 10:56:38', 'zaeni  telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(97, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:07:29', 'Meylisa Dwi Anggraheni Puspitasari Telah Login Halaman Dashboard'),
(98, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:15:57', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(99, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:16:26', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(100, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:16:37', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(101, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:16:42', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(102, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:17:18', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(103, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:17:31', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign bantu farzhan yatim penderita syndrome rubella'),
(104, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:17:46', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(105, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:22:41', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(106, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:23:46', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(107, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:25:56', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign yatim piatu rizal, bantu melawan thalasemia'),
(108, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:26:59', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign yatim piatu rizal, bantu melawan thalasemia'),
(109, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:27:04', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign yatim piatu rizal, bantu melawan thalasemia'),
(110, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:29:07', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign yatim piatu rizal, bantu melawan thalasemia'),
(111, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:30:05', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign yatim piatu rizal, bantu melawan thalasemia'),
(112, 'Meylisa Dwi Anggraheni Puspitasari', '127.0.0.1', '2021-11-04 14:32:11', 'Meylisa Dwi Anggraheni Puspitasari telah Mengkonfirmasi donasi yang masuk dari campaign berbagi kebahagiaan dengan zakat'),
(113, 'frsfserf', '127.0.0.1', '2021-11-24 10:21:12', 'frsfserf telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(114, 'rsatfgratw4er', '127.0.0.1', '2021-11-24 10:25:22', 'rsatfgratw4er telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(115, 'fatr4wat', '127.0.0.1', '2021-11-24 10:55:47', 'fatr4wat telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(116, 'sobat baik', '127.0.0.1', '2021-11-24 14:22:05', 'sobat baik telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(117, 'sobat baik', '127.0.0.1', '2021-11-24 14:23:29', 'sobat baik telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(118, 'sobat baik', '127.0.0.1', '2021-11-24 14:24:04', 'sobat baik telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(119, 'sobat baik', '127.0.0.1', '2021-11-24 14:24:15', 'sobat baik telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(120, 'sobat baik', '127.0.0.1', '2021-11-24 14:24:37', 'sobat baik telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(121, 'fauzi', '127.0.0.1', '2021-11-24 14:30:56', 'fauzi telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(122, 'fauzi', '127.0.0.1', '2021-11-24 14:31:37', 'fauzi telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(123, 'ar4d', '127.0.0.1', '2021-11-24 14:32:07', 'ar4d telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(124, 'fdsafdsa', '127.0.0.1', '2021-11-24 15:15:01', 'fdsafdsa telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(125, 'we4r', '127.0.0.1', '2021-11-24 15:29:11', 'we4r telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(126, 'werfss', '127.0.0.1', '2021-11-24 15:30:27', 'werfss telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(127, 'fdsgfsga', '127.0.0.1', '2021-11-24 15:31:02', 'fdsgfsga telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(128, 'fgfdsdgf', '127.0.0.1', '2021-11-24 15:35:15', 'fgfdsdgf telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(129, 'gfdsgrfsgr', '127.0.0.1', '2021-11-24 15:39:34', 'gfdsgrfsgr telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(130, 'fauzi ', '127.0.0.1', '2021-11-24 15:45:19', 'fauzi  telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(131, 'fgsagfg', '127.0.0.1', '2021-11-24 16:30:56', 'fgsagfg telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(132, 'fgsagfg', '127.0.0.1', '2021-11-24 16:31:15', 'fgsagfg telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(133, 'fdsafas', '127.0.0.1', '2021-11-24 17:16:09', 'fdsafas telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(134, 'fdsfgsagd', '127.0.0.1', '2021-11-24 17:22:25', 'fdsfgsagd telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(135, 'fdsfgsagd', '127.0.0.1', '2021-11-24 17:22:35', 'fdsfgsagd telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(136, 'fdsfgsagd', '127.0.0.1', '2021-11-24 17:22:47', 'fdsfgsagd telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(137, 'haii ', '127.0.0.1', '2021-11-25 10:12:30', 'haii  telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(138, 'safd', '127.0.0.1', '2021-11-25 10:27:01', 'safd telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(139, 'et5gdfgs', '127.0.0.1', '2021-11-25 10:28:35', 'et5gdfgs telah melakukan input donasi untuk yatim piatu rizal, bantu melawan thalasemia'),
(140, 'amin', '127.0.0.1', '2021-11-25 13:33:20', 'amin telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(141, 'amin', '127.0.0.1', '2021-11-25 13:34:28', 'amin telah melakukan input donasi untuk bantu farzhan yatim penderita syndrome rubella'),
(142, 'fasdfdas', '127.0.0.1', '2021-11-25 15:54:19', 'fasdfdas telah melakukan input donasi untuk berbagi kebaikan melukis senyuman yatim'),
(143, 'Yayasan Alkirom Amanah', '127.0.0.1', '2021-12-03 14:48:28', 'Yayasan Alkirom Amanah Telah Login Halaman Dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token_donasi`
--

CREATE TABLE `token_donasi` (
  `id` int(11) NOT NULL,
  `id_donasi` varchar(100) NOT NULL,
  `snap_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token_donasi`
--

INSERT INTO `token_donasi` (`id`, `id_donasi`, `snap_token`) VALUES
(1, '76', 'd0de2d60-d1f2-4362-9e14-06fdcc72cf71'),
(2, '77', 'ff9392a2-1cbd-4a47-be6e-c37e20e2da66'),
(3, '78', '2a5c671e-9281-45bf-af8e-9b088bea41b1'),
(4, '79', '9db98987-c689-4eb0-9c73-1da5fee83c1c'),
(5, '81', '28a769bd-fb82-4b93-841d-a4933984bc8c'),
(6, '83', '8389443a-5284-4c43-9115-cf239cdb0358'),
(7, '84', '1ad1d359-ccc4-4336-b2e9-e95bf1c5bd73'),
(8, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `update_campaign`
--

CREATE TABLE `update_campaign` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `judul_update` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `update_cerita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `update_campaign`
--

INSERT INTO `update_campaign` (`id`, `link`, `judul_update`, `tanggal`, `update_cerita`) VALUES
(1, 'infaqyatim', 'update berbagi kepada sesama', '2021-11-03', '&lt;p&gt;dengan ini kami membagikan sembako serta santunan yang telah sahabat berikan, alhamdulillah berjalan lancar untuk santunan tersebut&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;http://localhost/admin_dompet/assets/images/update-campaign/d3c8fb75e2095c766c77a536b2d2cc39.jpg&quot; data-image=&quot;aapq1xbw387m&quot;&gt;&lt;/figure&gt;'),
(2, 'infaqyatim', 'berbagi sesama yatim', '2021-11-04', '&lt;p&gt;fafdjlk afhdlkajfkds jfalkfjakdsf&lt;/p&gt;'),
(3, 'banturizal', 'update - perkembangan rizal terkini', '2021-11-03', '&lt;p&gt;alhamdulillah kondisi saat ini rizal sudah membaik&lt;/p&gt;&lt;figure&gt;&lt;img src=&quot;http://localhost/admin_dompet/assets/images/update-campaign/1a340daec8e2c6c3192b4324f1c22c95.jpg&quot; data-image=&quot;cu7z7cspyffa&quot;&gt;&lt;/figure&gt;'),
(4, 'banturizal', 'kondisi terbaik rizal', '2021-11-03', '&lt;p&gt;kondisi terkini rizal saat ini sudah sangat membaik, dimana rizal sudah bisa bersenang senang ria&lt;/p&gt;');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_pengurus`
--
ALTER TABLE `akun_pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_dompet`
--
ALTER TABLE `data_dompet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktivity`
--
ALTER TABLE `log_aktivity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token_donasi`
--
ALTER TABLE `token_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `update_campaign`
--
ALTER TABLE `update_campaign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_pengurus`
--
ALTER TABLE `akun_pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_dompet`
--
ALTER TABLE `data_dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `log_aktivity`
--
ALTER TABLE `log_aktivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `token_donasi`
--
ALTER TABLE `token_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `update_campaign`
--
ALTER TABLE `update_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
