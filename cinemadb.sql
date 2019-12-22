-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Kas 2016, 21:53:47
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cinemadb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilets`
--

CREATE TABLE `bilets` (
  `bilet_id` int(10) UNSIGNED NOT NULL,
  `seans_id` int(10) UNSIGNED NOT NULL,
  `bilet_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barkod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `koltuk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `musteri_adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `musteri_telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `musteri_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fiyat_grubu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toplam_tutar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rezervasyon_bilet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odeme_sekli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odeme_kodu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seans_tarihi` date NOT NULL,
  `iptal` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bilets`
--

INSERT INTO `bilets` (`bilet_id`, `seans_id`, `bilet_no`, `barkod`, `koltuk`, `musteri_adi`, `musteri_telefon`, `musteri_mail`, `fiyat_grubu`, `toplam_tutar`, `rezervasyon_bilet`, `odeme_sekli`, `odeme_kodu`, `seans_tarihi`, `iptal`, `created_at`, `updated_at`) VALUES
(1, 1, '123654789', '123654789', 'A1,A2', 'Nataliiya Chabanova', '66 791 38 46', 'nchabanova@ukr.net', 'Öğrenci', '40', 'Bilet', 'Nakit', '', '2016-11-11', 1, '2016-11-10 22:00:00', '2016-11-11 05:19:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filims`
--

CREATE TABLE `filims` (
  `movie_id` int(10) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yonetmen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oyuncular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `konu` text COLLATE utf8_unicode_ci NOT NULL,
  `ulke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yas_siniri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suresi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gosterimde` tinyint(1) NOT NULL,
  `gelecek` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `filims`
--

INSERT INTO `filims` (`movie_id`, `adi`, `yonetmen`, `oyuncular`, `konu`, `ulke`, `yil`, `yas_siniri`, `kategori`, `suresi`, `gosterimde`, `gelecek`, `created_at`, `updated_at`) VALUES
(1, 'Tolga Kaya', 'Beceriksiz adam', 'kendi çalar kendi oynar', 'Konusuz yaşam', 'Türkiye', '2013', '70', 'gerilim', '37 Yıl', 1, 0, '2016-11-04 06:37:28', '2016-11-04 06:37:28'),
(2, 'Natali Kaya', 'Beceriksiz kadın', 'kendi çalar kendi oynar', 'Konusuz yaşam', 'Ukrayna', '2013', '70', 'gerilim', '37 Yıl', 1, 0, '2016-11-04 06:37:28', '2016-11-04 06:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fiyat_grups`
--

CREATE TABLE `fiyat_grups` (
  `grup_id` int(10) UNSIGNED NOT NULL,
  `grup_adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `fiyat_grups`
--

INSERT INTO `fiyat_grups` (`grup_id`, `grup_adi`, `aciklama`, `created_at`, `updated_at`) VALUES
(1, 'Öğrenci', 'Öğrenci İndirimi', '2016-11-04 06:37:28', '2016-11-04 06:37:28'),
(2, 'Emekli', 'Emekli İndirimi', '2016-11-04 06:37:28', '2016-11-04 06:37:28'),
(3, 'Çiftçi', 'Çiftçi indirimi', '2016-11-04 19:47:42', '2016-11-04 19:47:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeris`
--

CREATE TABLE `galeris` (
  `galeri_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `tur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sayfa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uzanti` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `galeris`
--

INSERT INTO `galeris` (`galeri_id`, `movie_id`, `tur`, `sayfa`, `kod`, `adi`, `uzanti`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'resim', 'single', 'tek', 'deneme', 'jpg', '', '2016-11-04 06:37:28', '2016-11-04 06:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `medias`
--

CREATE TABLE `medias` (
  `media_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uzanti` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` tinyint(1) NOT NULL DEFAULT '0',
  `tek` tinyint(1) NOT NULL DEFAULT '0',
  `galeri` tinyint(1) NOT NULL DEFAULT '0',
  `video` tinyint(1) NOT NULL DEFAULT '0',
  `tumb` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `medias`
--

INSERT INTO `medias` (`media_id`, `movie_id`, `adi`, `uzanti`, `poster`, `tek`, `galeri`, `video`, `tumb`, `url`, `created_at`, `updated_at`) VALUES
(8, 1, '1-resim.jpg', 'jpg', 0, 1, 0, 0, 0, NULL, '2016-11-02 08:55:40', '2016-11-02 08:55:40'),
(9, 1, 'B6h8fpGh_album_image.png', 'png', 1, 0, 1, 0, 0, NULL, '2016-11-02 07:42:08', '2016-11-02 10:19:12'),
(10, 1, 'aijHQYl0_album_image.jpg', 'jpg', 0, 0, 0, 0, 0, NULL, '2016-11-02 07:43:25', '2016-11-02 10:20:03'),
(11, 1, 'Rgzl6Sxw_album_image.jpg', 'jpg', 0, 0, 1, 0, 0, NULL, '2016-11-02 07:43:51', '2016-11-02 07:43:51'),
(12, 1, 'nCgFWAIL_album_image.jpg', 'jpg', 0, 0, 1, 0, 0, NULL, '2016-11-02 07:44:35', '2016-11-02 07:44:35'),
(13, 1, 'uZ2bKCmk_album_image.jpg', 'jpg', 0, 0, 1, 0, 0, NULL, '2016-11-02 11:19:43', '2016-11-02 11:19:43'),
(15, 1, 'Wicho4ir_album_image.jpg', 'jpg', 0, 0, 0, 1, 0, 'https://www.youtube.com/watch?v=Ne5J4bxWypI', '2016-11-02 11:47:07', '2016-11-02 11:47:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '2014_10_12_000000_create_users_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2016_10_23_040715_create_tests_table', 1),
(56, '2016_10_23_110335_create_filims_table', 1),
(57, '2016_10_23_130752_create_fiyat_grups_table', 1),
(58, '2016_10_23_134913_create_slides_table', 1),
(59, '2016_10_23_141711_create_galeris_table', 1),
(60, '2016_10_23_165644_create_salons_table', 1),
(61, '2016_10_23_170633_create_seans_table', 1),
(62, '2016_10_23_184305_create_seans_fiyats_table', 1),
(63, '2016_10_27_185440_create_bilets_table', 1),
(64, '2016_10_29_061419_create_salonduzens_table', 1),
(65, '2016_11_01_195414_create_medias_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salonduzens`
--

CREATE TABLE `salonduzens` (
  `id` int(10) UNSIGNED NOT NULL,
  `salon_id` int(10) UNSIGNED NOT NULL,
  `sits_line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sits_row` text COLLATE utf8_unicode_ci NOT NULL,
  `sits_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `salonduzens`
--

INSERT INTO `salonduzens` (`id`, `salon_id`, `sits_line`, `sits_row`, `sits_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'A,B,C', 'A1,A2,A3,X,A4,A5,A6-B1,B2,B3,B4,B5,B6,X,B7,B8,B9,B10,B11,B12-C1,C2,C3,X,C4,C5,C6', '1,2,3,4,5,6,7,8,9,10,11,12', '2016-11-04 06:37:29', '2016-11-04 06:37:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `salons`
--

CREATE TABLE `salons` (
  `salon_id` int(10) UNSIGNED NOT NULL,
  `salon_adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `salons`
--

INSERT INTO `salons` (`salon_id`, `salon_adi`, `aciklama`, `created_at`, `updated_at`) VALUES
(1, 'Koca Salon', 'Büyük perde', '2016-11-04 06:37:28', '2016-11-04 06:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seans`
--

CREATE TABLE `seans` (
  `seans_id` int(10) UNSIGNED NOT NULL,
  `salon_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `bitis_tarihi` date NOT NULL,
  `saat` time NOT NULL,
  `standart_fiyat` decimal(16,2) NOT NULL,
  `hafta_sonu_fiyati` decimal(16,0) NOT NULL,
  `fix_fiyat` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `seans`
--

INSERT INTO `seans` (`seans_id`, `salon_id`, `movie_id`, `bitis_tarihi`, `saat`, `standart_fiyat`, `hafta_sonu_fiyati`, `fix_fiyat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-12-29', '22:30:00', '20.00', '25', 0, '2016-11-04 06:37:28', '2016-11-04 06:37:28'),
(2, 1, 1, '2016-12-29', '20:30:00', '20.00', '25', 0, '2016-11-04 06:37:28', '2016-11-04 06:37:28'),
(3, 1, 1, '2016-12-29', '23:30:00', '20.00', '25', 0, '2016-11-04 06:37:28', '2016-11-04 06:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seans_fiyats`
--

CREATE TABLE `seans_fiyats` (
  `fiyat_id` int(10) UNSIGNED NOT NULL,
  `seans_id` int(10) UNSIGNED NOT NULL,
  `grup_id` int(10) UNSIGNED NOT NULL,
  `standart_fiyat` decimal(16,2) NOT NULL,
  `hafta_sonu_fiyati` decimal(16,0) NOT NULL,
  `iskonto_orani` decimal(16,2) NOT NULL,
  `sabit_fiyat` decimal(16,2) NOT NULL,
  `bilet_adedi` int(11) NOT NULL,
  `gecerlilik_tarihi` date NOT NULL,
  `iptal` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `seans_fiyats`
--

INSERT INTO `seans_fiyats` (`fiyat_id`, `seans_id`, `grup_id`, `standart_fiyat`, `hafta_sonu_fiyati`, `iskonto_orani`, `sabit_fiyat`, `bilet_adedi`, `gecerlilik_tarihi`, `iptal`, `created_at`, `updated_at`) VALUES
(17, 2, 1, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-05 09:00:03', '2016-11-06 15:30:07'),
(23, 1, 2, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 06:32:03', '2016-11-06 15:30:07'),
(31, 1, 3, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 06:32:03', '2016-11-06 15:30:07'),
(32, 1, 1, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:07'),
(33, 1, 2, '100.00', '0', '0.00', '0.00', 0, '2016-11-06', 0, '2016-11-06 12:22:28', '2016-11-06 12:27:24'),
(34, 1, 3, '100.00', '0', '0.00', '0.00', 0, '2016-11-06', 0, '2016-11-06 12:22:28', '2016-11-06 12:27:24'),
(35, 2, 1, '100.00', '0', '0.00', '0.00', 0, '2016-11-06', 0, '2016-11-06 12:22:28', '2016-11-06 12:27:24'),
(36, 2, 2, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:07'),
(37, 2, 3, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:08'),
(38, 3, 1, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:08'),
(39, 3, 2, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:08'),
(40, 3, 3, '30.00', '35', '10.00', '0.00', 0, '2017-03-18', 0, '2016-11-06 12:22:28', '2016-11-06 15:30:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(10) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altbaslik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buton` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yazi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `slides`
--

INSERT INTO `slides` (`slide_id`, `adi`, `video`, `baslik`, `altbaslik`, `buton`, `yazi`, `created_at`, `updated_at`) VALUES
(1, 'first-slide.jpg', '', 'Bu bir başlık', 'bu da alt baslik', 'butonumuz', 'felan flanfelan flanfelan flan\r\nfelan flan felan flanfelan flan', NULL, NULL),
(2, 'next-slide.jpg', '', 'ikinci başlık', 'bu ikinci alt baslik', 'ikinci btn', '', NULL, NULL),
(3, 'first-slide.jpg', '', 'videolu başlık', 'bu video alt baslik', 'btn video', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `tests`
--

INSERT INTO `tests` (`id`, `adi`, `aciklama`, `created_at`, `updated_at`) VALUES
(1, 'Tolga Kaya', 'Beceriksiz adam', '2016-11-04 06:37:28', '2016-11-04 06:37:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bilets`
--
ALTER TABLE `bilets`
  ADD PRIMARY KEY (`bilet_id`),
  ADD KEY `bilets_seans_id_index` (`seans_id`);

--
-- Tablo için indeksler `filims`
--
ALTER TABLE `filims`
  ADD PRIMARY KEY (`movie_id`);

--
-- Tablo için indeksler `fiyat_grups`
--
ALTER TABLE `fiyat_grups`
  ADD PRIMARY KEY (`grup_id`);

--
-- Tablo için indeksler `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`galeri_id`),
  ADD KEY `galeris_movie_id_index` (`movie_id`);

--
-- Tablo için indeksler `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `medias_movie_id_index` (`movie_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Tablo için indeksler `salonduzens`
--
ALTER TABLE `salonduzens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salonduzens_salon_id_unique` (`salon_id`),
  ADD KEY `salonduzens_salon_id_index` (`salon_id`);

--
-- Tablo için indeksler `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`salon_id`);

--
-- Tablo için indeksler `seans`
--
ALTER TABLE `seans`
  ADD PRIMARY KEY (`seans_id`),
  ADD KEY `seans_salon_id_index` (`salon_id`),
  ADD KEY `seans_movie_id_index` (`movie_id`);

--
-- Tablo için indeksler `seans_fiyats`
--
ALTER TABLE `seans_fiyats`
  ADD PRIMARY KEY (`fiyat_id`),
  ADD KEY `seans_fiyats_seans_id_index` (`seans_id`),
  ADD KEY `seans_fiyats_grup_id_index` (`grup_id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Tablo için indeksler `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bilets`
--
ALTER TABLE `bilets`
  MODIFY `bilet_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `filims`
--
ALTER TABLE `filims`
  MODIFY `movie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `fiyat_grups`
--
ALTER TABLE `fiyat_grups`
  MODIFY `grup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `galeris`
--
ALTER TABLE `galeris`
  MODIFY `galeri_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `medias`
--
ALTER TABLE `medias`
  MODIFY `media_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Tablo için AUTO_INCREMENT değeri `salonduzens`
--
ALTER TABLE `salonduzens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `salons`
--
ALTER TABLE `salons`
  MODIFY `salon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `seans`
--
ALTER TABLE `seans`
  MODIFY `seans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `seans_fiyats`
--
ALTER TABLE `seans_fiyats`
  MODIFY `fiyat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bilets`
--
ALTER TABLE `bilets`
  ADD CONSTRAINT `bilets_seans_id_foreign` FOREIGN KEY (`seans_id`) REFERENCES `seans` (`seans_id`);

--
-- Tablo kısıtlamaları `galeris`
--
ALTER TABLE `galeris`
  ADD CONSTRAINT `galeris_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `filims` (`movie_id`);

--
-- Tablo kısıtlamaları `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `filims` (`movie_id`);

--
-- Tablo kısıtlamaları `salonduzens`
--
ALTER TABLE `salonduzens`
  ADD CONSTRAINT `salonduzens_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`salon_id`);

--
-- Tablo kısıtlamaları `seans`
--
ALTER TABLE `seans`
  ADD CONSTRAINT `seans_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `filims` (`movie_id`),
  ADD CONSTRAINT `seans_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salons` (`salon_id`);

--
-- Tablo kısıtlamaları `seans_fiyats`
--
ALTER TABLE `seans_fiyats`
  ADD CONSTRAINT `seans_fiyats_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `fiyat_grups` (`grup_id`),
  ADD CONSTRAINT `seans_fiyats_seans_id_foreign` FOREIGN KEY (`seans_id`) REFERENCES `seans` (`seans_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
