-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 10. sep 2019 ob 22.12
-- Različica strežnika: 10.1.28-MariaDB
-- Različica PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `nepremicnine`
--

-- --------------------------------------------------------

--
-- Struktura tabele `drzave`
--

CREATE TABLE `drzave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `kraji`
--

CREATE TABLE `kraji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `posta` int(11) NOT NULL,
  `drzava_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `nepremicnine`
--

CREATE TABLE `nepremicnine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `naslov` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `objava` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uporabnik_id` bigint(20) UNSIGNED NOT NULL,
  `kraj_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `slike`
--

CREATE TABLE `slike` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8mb4_slovenian_ci,
  `nepremicnina_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sporocila`
--

CREATE TABLE `sporocila` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uporabnik_id` bigint(20) UNSIGNED NOT NULL,
  `nepremicnina_id` bigint(20) UNSIGNED NOT NULL,
  `msg` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `priimek` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `geslo` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `tip` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `drzave`
--
ALTER TABLE `drzave`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksi tabele `kraji`
--
ALTER TABLE `kraji`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `drzava_id` (`drzava_id`);

--
-- Indeksi tabele `nepremicnine`
--
ALTER TABLE `nepremicnine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`),
  ADD KEY `kraj_id` (`kraj_id`);

--
-- Indeksi tabele `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `nepremicnina_id` (`nepremicnina_id`);

--
-- Indeksi tabele `sporocila`
--
ALTER TABLE `sporocila`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `nepremicnina_id` (`nepremicnina_id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `drzave`
--
ALTER TABLE `drzave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `kraji`
--
ALTER TABLE `kraji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `nepremicnine`
--
ALTER TABLE `nepremicnine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `slike`
--
ALTER TABLE `slike`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `sporocila`
--
ALTER TABLE `sporocila`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
