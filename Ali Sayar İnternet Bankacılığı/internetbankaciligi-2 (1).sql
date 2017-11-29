-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Ağu 2017, 01:14:00
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `internetbankaciligi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakiyeler`
--

CREATE TABLE `bakiyeler` (
  `bakiye_id` int(10) UNSIGNED NOT NULL,
  `hesap_id` int(10) UNSIGNED NOT NULL,
  `bakiye` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bakiyeler`
--

INSERT INTO `bakiyeler` (`bakiye_id`, `hesap_id`, `bakiye`) VALUES
(3, 3, '7500'),
(4, 4, '11000'),
(5, 5, '50'),
(6, 6, '2050');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(45) NOT NULL,
  `logo` text NOT NULL,
  `yetkili_isim_soyisim` varchar(45) NOT NULL,
  `banka_adres` text NOT NULL,
  `banka_telefon` varchar(45) NOT NULL,
  `sistem` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `isim`, `logo`, `yetkili_isim_soyisim`, `banka_adres`, `banka_telefon`, `sistem`) VALUES
(1, 'Ziraatma Bankası', '', 'Jonothan Jonot', 'Pasifik', '35263969', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular`
--

CREATE TABLE `basvurular` (
  `basvuru_id` int(10) UNSIGNED NOT NULL,
  `basvuru_not` text NOT NULL,
  `basvuru_limit` varchar(35) NOT NULL,
  `musteri_id` int(10) UNSIGNED NOT NULL,
  `durum` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `tarih` datetime NOT NULL,
  `tur` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `basvurular`
--

INSERT INTO `basvurular` (`basvuru_id`, `basvuru_not`, `basvuru_limit`, `musteri_id`, `durum`, `tarih`, `tur`) VALUES
(3, 'sad as d', '8000', 5, 2, '2017-08-06 22:58:18', 'İhtiyaç Kredisi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `borclar`
--

CREATE TABLE `borclar` (
  `borc_id` int(10) UNSIGNED NOT NULL,
  `hesap_id` int(10) UNSIGNED NOT NULL,
  `musteri_id` int(10) UNSIGNED NOT NULL,
  `borc` decimal(10,0) NOT NULL,
  `tarih` datetime NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `borclar`
--

INSERT INTO `borclar` (`borc_id`, `hesap_id`, `musteri_id`, `borc`, `tarih`, `aciklama`) VALUES
(2, 3, 5, '0', '2017-08-06 03:03:47', 'Array'),
(3, 4, 6, '1000', '2017-08-07 00:42:27', 'Ev taksidini elden aldı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplar`
--

CREATE TABLE `hesaplar` (
  `hesap_id` int(10) UNSIGNED NOT NULL,
  `hesap_no` int(10) UNSIGNED NOT NULL,
  `musteri_no` int(10) UNSIGNED NOT NULL,
  `acilis_tarihi` datetime NOT NULL,
  `para_birimi_id` int(10) UNSIGNED NOT NULL,
  `hesap_turu_id` int(10) UNSIGNED NOT NULL,
  `banka_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hesaplar`
--

INSERT INTO `hesaplar` (`hesap_id`, `hesap_no`, `musteri_no`, `acilis_tarihi`, `para_birimi_id`, `hesap_turu_id`, `banka_id`) VALUES
(3, 1501985038, 3339791051, '2017-08-06 04:03:58', 1, 1, 1),
(5, 1502060000, 4294967295, '2017-08-07 00:53:20', 1, 1, 1),
(6, 1502060033, 1249502051, '2017-08-07 00:53:53', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesap_turleri`
--

CREATE TABLE `hesap_turleri` (
  `hesap_tur_id` int(10) UNSIGNED NOT NULL,
  `hesap_tur_isim` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hesap_turleri`
--

INSERT INTO `hesap_turleri` (`hesap_tur_id`, `hesap_tur_isim`) VALUES
(1, 'Vadeli'),
(2, 'Vadesiz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

CREATE TABLE `islemler` (
  `islem_id` int(10) UNSIGNED NOT NULL,
  `alici_hesap_no` int(10) UNSIGNED NOT NULL,
  `verici_hesap_no` int(10) UNSIGNED NOT NULL,
  `musteri_no` int(10) UNSIGNED NOT NULL,
  `islem_tarihi` datetime NOT NULL,
  `islem_miktari` decimal(10,0) NOT NULL,
  `islem_tur_id` int(10) UNSIGNED NOT NULL,
  `banka_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islem_turleri`
--

CREATE TABLE `islem_turleri` (
  `islem_tur_id` int(10) UNSIGNED NOT NULL,
  `islem_tur_isim` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `islem_turleri`
--

INSERT INTO `islem_turleri` (`islem_tur_id`, `islem_tur_isim`) VALUES
(1, 'Havale'),
(2, 'Eft'),
(3, 'Borç Ödeme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `musteri_id` int(10) UNSIGNED NOT NULL,
  `ad` varchar(45) NOT NULL,
  `soyad` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `parola` varchar(45) NOT NULL,
  `anne_kizlik_soyad` varchar(45) NOT NULL,
  `adres` text NOT NULL,
  `musteri_no` int(10) UNSIGNED NOT NULL,
  `yonetici` tinyint(3) UNSIGNED NOT NULL,
  `banka_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`musteri_id`, `ad`, `soyad`, `telefon`, `email`, `parola`, `anne_kizlik_soyad`, `adres`, `musteri_no`, `yonetici`, `banka_id`) VALUES
(5, 'Halil ', 'Savaşcı', '22222', 'sdasasad', '123123', 'özev', 'dddddd', 3339791051, 1, 1),
(6, 'Osman', 'Kata', '025632', 'ısman@asd.con', '123123', 'asdasd', 'asdsad', 4294967295, 0, 1),
(7, 'Ali', 'Sayar', '05469689595', 'ali@bank.com', '123123', 'lale', 'beyşehir merkez', 1249502051, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `para_birimleri`
--

CREATE TABLE `para_birimleri` (
  `para_birim_id` int(10) UNSIGNED NOT NULL,
  `para_birim_kisaltma` varchar(45) NOT NULL,
  `para_birim_isim` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `para_birimleri`
--

INSERT INTO `para_birimleri` (`para_birim_id`, `para_birim_kisaltma`, `para_birim_isim`) VALUES
(1, 'TL', 'Türk Lirası'),
(2, 'EUR', 'Euro'),
(3, 'USD', 'Amerikan Doları');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bakiyeler`
--
ALTER TABLE `bakiyeler`
  ADD PRIMARY KEY (`bakiye_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `basvurular`
--
ALTER TABLE `basvurular`
  ADD PRIMARY KEY (`basvuru_id`);

--
-- Tablo için indeksler `borclar`
--
ALTER TABLE `borclar`
  ADD PRIMARY KEY (`borc_id`);

--
-- Tablo için indeksler `hesaplar`
--
ALTER TABLE `hesaplar`
  ADD PRIMARY KEY (`hesap_id`);

--
-- Tablo için indeksler `hesap_turleri`
--
ALTER TABLE `hesap_turleri`
  ADD PRIMARY KEY (`hesap_tur_id`);

--
-- Tablo için indeksler `islemler`
--
ALTER TABLE `islemler`
  ADD PRIMARY KEY (`islem_id`);

--
-- Tablo için indeksler `islem_turleri`
--
ALTER TABLE `islem_turleri`
  ADD PRIMARY KEY (`islem_tur_id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `para_birimleri`
--
ALTER TABLE `para_birimleri`
  ADD PRIMARY KEY (`para_birim_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bakiyeler`
--
ALTER TABLE `bakiyeler`
  MODIFY `bakiye_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `basvurular`
--
ALTER TABLE `basvurular`
  MODIFY `basvuru_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `borclar`
--
ALTER TABLE `borclar`
  MODIFY `borc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `hesaplar`
--
ALTER TABLE `hesaplar`
  MODIFY `hesap_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `hesap_turleri`
--
ALTER TABLE `hesap_turleri`
  MODIFY `hesap_tur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `islemler`
--
ALTER TABLE `islemler`
  MODIFY `islem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `islem_turleri`
--
ALTER TABLE `islem_turleri`
  MODIFY `islem_tur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `musteri_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `para_birimleri`
--
ALTER TABLE `para_birimleri`
  MODIFY `para_birim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
