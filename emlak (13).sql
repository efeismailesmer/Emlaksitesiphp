-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Oca 2025, 21:24:51
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emlak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altkategori`
--

CREATE TABLE `altkategori` (
  `altkat_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `alt_baslik` varchar(200) NOT NULL,
  `alt_sira` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `altkategori`
--

INSERT INTO `altkategori` (`altkat_id`, `kategori_id`, `alt_baslik`, `alt_sira`) VALUES
(1, 1, 'Satılık Daireler', 1),
(2, 4, 'Kiralık Daireler', 2),
(3, 4, 'Kiralık Dükkanlar', 3),
(5, 4, 'Günlük Kiralık Ev ', 4),
(6, 4, 'Kiralık Villa', 5),
(7, 1, 'Satılık Dükkanlar', 2),
(8, 1, 'Satılık Villa', 3),
(9, 1, 'Devren işyeri', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arsa`
--

CREATE TABLE `arsa` (
  `id` int(11) NOT NULL,
  `metre` int(11) NOT NULL,
  `il` varchar(50) NOT NULL,
  `ilce` varchar(50) NOT NULL,
  `mahalle` varchar(100) NOT NULL,
  `cadde` varchar(100) NOT NULL,
  `aciklama` text NOT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  `uyead` varchar(100) NOT NULL,
  `uyetelefon` varchar(15) NOT NULL,
  `uyeemail` varchar(100) NOT NULL,
  `profil_fotografi` varchar(255) DEFAULT NULL,
  `ilan_baslik` varchar(255) NOT NULL DEFAULT 'Başlık belirtilmedi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `arsa`
--

INSERT INTO `arsa` (`id`, `metre`, `il`, `ilce`, `mahalle`, `cadde`, `aciklama`, `resim`, `fiyat`, `uyead`, `uyetelefon`, `uyeemail`, `profil_fotografi`, `ilan_baslik`) VALUES
(1, 233, 'adada', 'adasda', 'asdad', 'addada', 'adada', 'img_6765f60cc048c.jpg', 99999999.99, 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'yuvam Emlak1'),
(2, 233, 'adada', 'adasda', 'asdad', 'addada', 'adada', 'img_6765f8fc884f2.jpg', 99999999.99, 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'yuvam Emlak1'),
(6, 2113, '2312', 's21312', '231123', '123123', '1233', 'img_677865d623314.jpg', 321313.00, 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'asdad'),
(7, 123123, 'sdaad', 'adasd', 'asdasd', 'asdasd', 'asdasd', 'img_677d8c69518e5.gif', 2313.00, 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'dsadsa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(10) NOT NULL,
  `ayar_baslik` varchar(200) NOT NULL,
  `ayar_aciklama` varchar(350) NOT NULL,
  `ayar_key` varchar(350) NOT NULL,
  `ayar_telefon` int(13) NOT NULL,
  `ayar_email` varchar(120) NOT NULL,
  `ayar_facebook` varchar(150) NOT NULL,
  `ayar_instagram` varchar(150) NOT NULL,
  `ayar_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_baslik`, `ayar_aciklama`, `ayar_key`, `ayar_telefon`, `ayar_email`, `ayar_facebook`, `ayar_instagram`, `ayar_logo`) VALUES
(0, 'Yuvam Emlak', 'Yuvam Emlakta aradığınız her kratere göre ev bulabilirsiniz.', 'Yuvam Emlak,Emlak Sitesi,Emlak,Kiralık Ev,Satılık Ev,Günlük Ev', 2147483637, 'yuvamemlak@gmail.com', 'www.facebook.com', 'www.instagram.com', '2870728253house.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cokluresim`
--

CREATE TABLE `cokluresim` (
  `cokluresim_id` int(11) NOT NULL,
  `resim` varchar(250) NOT NULL,
  `ilan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `cokluresim`
--

INSERT INTO `cokluresim` (`cokluresim_id`, `resim`, `ilan_id`) VALUES
(28, '2173926547agency-01.jpg', 25),
(29, '2273222951agency-02.jpg', 25),
(30, '2988922978agency-03.jpg', 25),
(31, '2283728138agency-04.jpg', 25),
(32, '2754320875almes-panjur-sistemleri-1-jpg (1).jfif', 27),
(47, '2542728396resim_2024-10-16_221647933.png', 10),
(48, '2126729385k5.PNG', 2),
(49, '2095629777k4.PNG', 2),
(50, '2916520470k8.PNG', 2),
(51, '2821620744k9.PNG', 2),
(52, '2256720684k2.PNG', 2),
(53, '2419125061k3.PNG', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `danismanlar`
--

CREATE TABLE `danismanlar` (
  `danisman_id` int(11) NOT NULL,
  `danisman_isim` varchar(250) NOT NULL,
  `danisman_gorev` varchar(250) NOT NULL,
  `danisman_telefon` varchar(25) NOT NULL,
  `danisman_mail` varchar(100) NOT NULL,
  `danisman_resim` varchar(200) NOT NULL,
  `danisman_sifre` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `danismanlar`
--

INSERT INTO `danismanlar` (`danisman_id`, `danisman_isim`, `danisman_gorev`, `danisman_telefon`, `danisman_mail`, `danisman_resim`, `danisman_sifre`) VALUES
(7, 'Hamza', 'Emlak Danışmanı', '05045855555', 'info@emlak.com', '27315207631.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'Ahmet', 'Reklam Yöneticisi', '05452254655', 'info@abcd.com', '2814029275agent-03.jpg', '123456'),
(9, 'Abdullah', 'Emlak Danışmanı', '054554554555', 'info@yazilimyolcusu.com', '2242522723agent-06.jpg', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'test', 'test', '1031020022', 'sadhjasdj@gmail.com', '2609526712', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Test', 'Testa', '93453984312', 'test@gmail.com', '2429820653', '1234'),
(12, 'ege', 'patron', '5523960322', 'ege1234@gmail.com', '2261427185', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(10) NOT NULL,
  `hakkimizda_baslik` varchar(250) NOT NULL,
  `hakkimizda_aciklama` text NOT NULL,
  `hakkimizda_resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_aciklama`, `hakkimizda_resim`) VALUES
(0, 'Yuvam Emlak Hakkımızda', '<p>Yuvam Emlak Hoşgeldiniz</p>\r\n\r\n<p>Kuruluş tarihimiz.02.10.2024</p>\r\n\r\n<p>Kurucumuz:Efe ismail Esmer</p>\r\n\r\n<p>Sitemizde her ilden her şeyirden evler bulabilirsiniz.</p>\r\n\r\n<p>Uygun fiyatlı evler bulabilirsiniz.</p>\r\n\r\n<p>Amacımız her ailenin bir ev sahibi olmasıdır.</p>\r\n\r\n<p>Danışman sayısı:4</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlar`
--

CREATE TABLE `ilanlar` (
  `ilan_id` int(10) NOT NULL,
  `altkategori_id` int(10) DEFAULT 1,
  `kategori_id` int(10) DEFAULT 1,
  `ilan_baslik` varchar(200) NOT NULL,
  `ilan_aciklama` text NOT NULL,
  `ilan_sira` int(10) NOT NULL,
  `ilan_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ilan_anahtarkelime` varchar(250) NOT NULL,
  `ilan_metrekare` int(4) NOT NULL,
  `ilan_odasayisi` int(10) NOT NULL,
  `ilan_binayas` int(10) NOT NULL,
  `ilan_bkat` int(10) NOT NULL,
  `ilan_isitma` varchar(300) NOT NULL,
  `ilan_takas` varchar(300) NOT NULL,
  `ilan_aidat` int(10) NOT NULL,
  `danisman_id` int(10) NOT NULL,
  `ilan_adres` varchar(250) NOT NULL,
  `ilan_resim` varchar(250) NOT NULL,
  `ilan_fiyat` decimal(10,0) NOT NULL,
  `aktif` tinyint(1) DEFAULT 0,
  `anahtarkelime` varchar(255) NOT NULL,
  `uyead` varchar(255) DEFAULT NULL,
  `uyetelefon` varchar(50) DEFAULT NULL,
  `uyeemail` varchar(100) DEFAULT NULL,
  `profil_fotografi` varchar(255) DEFAULT NULL,
  `ilan_tur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilanlar`
--

INSERT INTO `ilanlar` (`ilan_id`, `altkategori_id`, `kategori_id`, `ilan_baslik`, `ilan_aciklama`, `ilan_sira`, `ilan_tarih`, `ilan_anahtarkelime`, `ilan_metrekare`, `ilan_odasayisi`, `ilan_binayas`, `ilan_bkat`, `ilan_isitma`, `ilan_takas`, `ilan_aidat`, `danisman_id`, `ilan_adres`, `ilan_resim`, `ilan_fiyat`, `aktif`, `anahtarkelime`, `uyead`, `uyetelefon`, `uyeemail`, `profil_fotografi`, `ilan_tur`) VALUES
(2, 2, 4, 'Tekirdağ Kiralık Daire   ', '<h1>Tekirdağ Kiralık Daire</h1>\r\n', 1, '2024-10-21 11:12:33', '  Tekirdağ Kiralık Daire', 180, 5, 4, 3, 'Doğalgaz', '', 300, 0, 'Tekirdağ ilindedir.', '2130320133resim_2024-10-17_193050482.png', 12000, 0, '', NULL, NULL, NULL, NULL, ''),
(5, 2, 4, 'Tekirdağ Kiralık Ev   ', '<p>Tekirdağ Kiralık Ev&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, '2024-10-21 11:11:52', '  Tekirdağ Kiralık Ev ', 200, 5, 8, 2, 'Doğalgaz', '', 250, 0, 'Şehrin Merkezinde', '2656728058resim_2024-10-17_195459301.png', 14000, 0, '', NULL, NULL, NULL, NULL, ''),
(6, 1, 1, 'Tekirdağ Satılık Ev   ', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2024-10-21 11:07:22', '   Tekirdağ satılık daire', 180, 4, 6, 2, 'doğalgaz', 'Evet', 200, 0, 'Tekirdağ', '2203120438resim_2024-10-16_222514648.png', 1800000, 0, '', NULL, NULL, NULL, NULL, ''),
(10, 1, 1, 'Tekirdağ ili satılık ev   ', '', 3, '2024-10-21 11:09:12', '   Tekirdağ satılık ev', 200, 5, 4, 10, 'Doğalgaz', '', 250, 0, 'Tekirdağ süleymanpaşa civarında', '2819429815resim_2024-10-16_221107757.png', 2000000, 0, '', NULL, NULL, NULL, NULL, ''),
(11, 5, 4, 'Tekirdağ Günlük Kiralık Ev        ', '<p>G&uuml;nl&uuml;k kiralık ev 500 tl</p>\r\n', 1, '2024-10-21 11:03:08', '        Tekirdağ günlük kiralık ev', 120, 4, 10, 2, 'Doğalgaz', '', 0, 0, 'Tekirdağ Çorlu civarında', '2421329894resim_2024-10-16_223034631.png', 500, 0, '', NULL, NULL, NULL, NULL, ''),
(148, 0, 0, 'Tekirdağ Satılık Dükkan', 'Tekirdağ Satılık Dükkan', 1, '2024-11-19 18:10:03', 'Tekirdağ Satılık Dükkan', 120, 3, 3, 0, 'Doğalgaz', 'Hayır', 250, 0, 'Tekirdağ Çorlu civarında', 'img_673ccdba71ae5.png', 1800000, 1, '', NULL, NULL, NULL, NULL, ''),
(149, 0, 0, 'Tekirdağ Satılık Ev', 'Tekirdağ Satılık Ev', 4, '2024-11-19 17:43:38', 'Tekirdağ satılık ev', 200, 5, 5, 4, 'Doğalgaz', 'Hayır', 250, 0, 'Tekirdağ Çorlu civarında', 'img_673cce342f397.png', 1500000, 1, '', 'efe', '05448222474', 'efeismail71@gmail.com', 'profil_673c516f6d10e.jpg', ''),
(151, 7, 7, 'Tekirdağ Satılık Dükkan', 'Tekirdağ satılık dükkan', 5, '2024-11-19 18:25:20', 'Tekirdağ Satılık Dükkan', 120, 4, 1, 0, 'Doğalgaz', 'Hayır', 250, 0, 'Tekirdağ Çorlu civarında', 'img_673cd73844940.png', 1500000, 1, '', NULL, NULL, NULL, NULL, ''),
(156, 1, 1, 'sadsa', 'sadasdasd', 2, '2024-11-23 22:22:49', '2', 32, 2, 2, 2, '2', '22', 22, 0, '2', 'img_674255b4c1045.png', 22, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık'),
(161, 1, 1, 'dasdsa', '2', 2, '2024-11-23 23:03:12', '2', 2, 2, 2, 2, '2', '2', 2, 0, '2', 'img_67425e7dc0cd4.png', 2, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Kiralık'),
(162, 1, 1, 'Tekirdağ Devren İş yeri', 'Çorlu içinde', 1, '2024-11-30 22:18:12', 'Tekirdağ Devren İşyeri', 120, 1, 6, 0, 'Doğalgaz', 'Hayır', 200, 0, 'Tekirdağ Çorlu civarında', 'img_674b8f24df68c.png', 1600000, 1, '', NULL, NULL, NULL, NULL, ''),
(163, 1, 1, 'Tekirdağ Satılık Villa', 'Satılık Villa', 1, '2024-11-30 22:28:04', 'Tekirdağ Satılık Villa', 260, 6, 5, 0, 'Doğalgaz', 'Hayır', 0, 0, 'Tekirdağ Çorlu civarında', 'img_674b9174af4d7.png', 6250000, 1, '', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlarr`
--

CREATE TABLE `ilanlarr` (
  `id` int(11) NOT NULL,
  `ilan_baslik` varchar(255) NOT NULL,
  `ilan_aciklama` text NOT NULL,
  `ilan_sira` int(11) DEFAULT NULL,
  `ilan_anahtarkelime` varchar(255) DEFAULT NULL,
  `ilan_metrekare` int(11) DEFAULT NULL,
  `ilan_odasayisi` int(11) DEFAULT NULL,
  `ilan_binayas` int(11) DEFAULT NULL,
  `ilan_bkat` int(11) DEFAULT NULL,
  `ilan_isitma` varchar(255) DEFAULT NULL,
  `ilan_takas` varchar(255) DEFAULT NULL,
  `ilan_aidat` int(11) DEFAULT NULL,
  `ilan_adres` varchar(255) DEFAULT NULL,
  `ilan_resim` varchar(255) DEFAULT NULL,
  `ilan_fiyat` decimal(10,2) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT 1,
  `anahtarkelime` varchar(255) NOT NULL,
  `uyead` varchar(255) DEFAULT NULL,
  `uyetelefon` varchar(50) DEFAULT NULL,
  `uyeemail` varchar(100) DEFAULT NULL,
  `profil_fotografi` varchar(255) DEFAULT NULL,
  `ilan_tur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilanlarr`
--

INSERT INTO `ilanlarr` (`id`, `ilan_baslik`, `ilan_aciklama`, `ilan_sira`, `ilan_anahtarkelime`, `ilan_metrekare`, `ilan_odasayisi`, `ilan_binayas`, `ilan_bkat`, `ilan_isitma`, `ilan_takas`, `ilan_aidat`, `ilan_adres`, `ilan_resim`, `ilan_fiyat`, `aktif`, `anahtarkelime`, `uyead`, `uyetelefon`, `uyeemail`, `profil_fotografi`, `ilan_tur`) VALUES
(128, 'Tekirdağ Satılık Ev', 'Tekirdağ Satılık Ev', 4, 'Tekirdağ satılık ev', 200, 5, 5, 4, 'Doğalgaz', 'Hayır', 250, 'Tekirdağ Çorlu civarında', 'img_673cce342f397.png', 1500000.00, 1, '', 'efe', '05448222474', 'efeismail71@gmail.com', 'profil_673c516f6d10e.jpg', ''),
(129, 'Tekirdağ Satılık Dükkan', 'sadasdasd', 2, '2', 2, 22, 2, 2, '2', '2', 2, '2', 'img_6740fd3a7da04.png', 2.00, 0, '', 'efe', '05448222474', 'efeismail71@gmail.com', 'hakan.jpeg', ''),
(130, 'sadasd', 'asdasd', 2, '2', 2, 2, 2, 2, '2', '2', 2, '2', 'img_6741189e88bec.png', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', ''),
(131, 'sadsa', 'sadasdasd', 2, '2', 32, 2, 2, 2, '2', '22', 22, '2', 'img_674254148464e.png', 22.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık'),
(132, 'sadsa', 'sadasdasd', 2, '2', 32, 2, 2, 2, '2', '22', 22, '2', 'img_674255086d837.png', 22.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık'),
(133, 'sadsa', 'sadasdasd', 2, '2', 32, 2, 2, 2, '2', '22', 22, '2', 'img_674255543c4f8.png', 22.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık'),
(134, 'sadsa', 'sadasdasd', 2, '2', 32, 2, 2, 2, '2', '22', 22, '2', 'img_674255b4c1045.png', 22.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık'),
(135, 'dasdsa', '2', 2, '2', 2, 2, 2, 2, '2', '2', 2, '2', 'img_67425773c95df.png', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Kiralık'),
(136, 'dasdsa', '2', 2, '2', 2, 2, 2, 2, '2', '2', 2, '2', 'img_67425b2d95eef.png', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Kiralık'),
(137, 'dasdsa', '2', 2, '2', 2, 2, 2, 2, '2', '2', 2, '2', 'img_67425b76729d1.png', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Kiralık'),
(138, 'dasdsa', '2', 2, '2', 2, 2, 2, 2, '2', '2', 2, '2', 'img_67425e7dc0cd4.png', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Kiralık'),
(139, '2', 'asdasdasd', 65, '5', 5, 5, 55, 3, 'trddr', 'dtrd', 3, '2', 'img_6765f927b961f.jpg', 2.00, 1, '', 'efeg', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png', 'Satılık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori_baslik` varchar(200) NOT NULL,
  `kategori_sira` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_baslik`, `kategori_sira`) VALUES
(1, 'Satılık İlanlar', 1),
(4, 'Kiralık İlanlar', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uyeid` int(11) NOT NULL,
  `uyead` varchar(255) DEFAULT NULL,
  `uyesifre` varchar(255) DEFAULT NULL,
  `uyetelefon` varchar(255) DEFAULT NULL,
  `uyemail` varchar(255) DEFAULT NULL,
  `profil_fotografi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uyeid`, `uyead`, `uyesifre`, `uyetelefon`, `uyemail`, `profil_fotografi`) VALUES
(32, 'efe', '$2y$10$r/dHCQ3xDT7zUCL4NCQZK.bSIIjorBwQWg9iveEuhx5UWlVqPKPNe', '1234567890', 'efeismail74@gmail.com', 'imaj (4).png'),
(34, 'Ahmet', '$2y$10$2DEJf3BrOv9kuHt54BepGe2Zr4vZ0iuNab6iUaPADiZp.7n/fExh2', '05448222478', 'ahmet67@gmail.com', 'aslan3.jpeg'),
(36, 'eyüp', NULL, '05448222478', 'eyup22@gmail.com', 'imaj (2).png'),
(37, 'efeg', '1234', '05448222474', 'efeismail71@gmail.com', 'imaj (4).png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `altkategori`
--
ALTER TABLE `altkategori`
  ADD PRIMARY KEY (`altkat_id`);

--
-- Tablo için indeksler `arsa`
--
ALTER TABLE `arsa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `cokluresim`
--
ALTER TABLE `cokluresim`
  ADD PRIMARY KEY (`cokluresim_id`);

--
-- Tablo için indeksler `danismanlar`
--
ALTER TABLE `danismanlar`
  ADD PRIMARY KEY (`danisman_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `ilanlar`
--
ALTER TABLE `ilanlar`
  ADD PRIMARY KEY (`ilan_id`);

--
-- Tablo için indeksler `ilanlarr`
--
ALTER TABLE `ilanlarr`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uyeid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `altkategori`
--
ALTER TABLE `altkategori`
  MODIFY `altkat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `arsa`
--
ALTER TABLE `arsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `cokluresim`
--
ALTER TABLE `cokluresim`
  MODIFY `cokluresim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `danismanlar`
--
ALTER TABLE `danismanlar`
  MODIFY `danisman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `ilanlar`
--
ALTER TABLE `ilanlar`
  MODIFY `ilan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Tablo için AUTO_INCREMENT değeri `ilanlarr`
--
ALTER TABLE `ilanlarr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uyeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
