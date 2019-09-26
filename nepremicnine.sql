-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 26. sep 2019 ob 20.41
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
-- Struktura tabele `nepremicnine`
--

CREATE TABLE `nepremicnine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `opis1` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `opis2` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `naslov` varchar(100) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `objava` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posredovanje` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `vrsta` varchar(20) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `lokacija` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `telefon` text COLLATE utf8mb4_slovenian_ci NOT NULL,
  `tip` varchar(50) COLLATE utf8mb4_slovenian_ci NOT NULL,
  `velikost` int(11) NOT NULL,
  `parcela` double NOT NULL,
  `uporabnik_id` bigint(20) UNSIGNED NOT NULL,
  `kraj_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `nepremicnine`
--

INSERT INTO `nepremicnine` (`id`, `ime`, `opis1`, `opis2`, `naslov`, `objava`, `posredovanje`, `vrsta`, `lokacija`, `telefon`, `tip`, `velikost`, `parcela`, `uporabnik_id`, `kraj_id`) VALUES
(24, 'Moderna hiša', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Zelo dobra hiša, izolacija odlična, toplotna črpalka in še več.', 'Braslovče 61a', '2019-09-25 16:52:52', 'Prodaja', 'novogradnja', 'Braslovče', '070-744-153', '5 in večsobna nepremičnina', 310, 1500, 2, 5),
(25, 'Vila Herbert', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.', 'Špeglova Ulica 10', '2019-09-25 16:53:00', 'Prodaja', 'novogradnja', 'Pesje pri Velenju', '070-744-153', '5 in večsobna nepremičnina', 420, 2230, 2, 43),
(26, 'Stanovanjska hiša', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.', 'Ulica Janka Ulriha, 44', '2019-09-25 16:53:04', 'Prodaja', 'novogradnja', 'Pesje pri Velenju', '070-744-153', '4-sobna nepremičnina', 150, 750, 2, 43),
(27, 'Nova montažna hiša', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.', 'Obrtniška ulica 4', '2019-09-25 16:57:20', 'Prodaja', 'montazna', 'predmestje', '070-744-153', '5 in večsobna nepremičnina', 95, 350, 2, 27),
(28, 'Montažna hiša', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Miklošičeva ulica', '2019-09-25 16:58:46', 'Nakup', 'montazna', 'predmestje', '070-744-153', '5 in večsobna nepremičnina', 150, 500, 2, 26),
(29, 'Hiša ob morju', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.', 'Primorska Cesta 12', '2019-09-26 15:45:42', 'Prodaja', 'pocitniski', 'ob obali', '070-744-153', 'nepremičnina', 185, 352, 2, 33),
(30, 'Apartma na morju', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Prešernova cesta 1', '2019-09-26 15:48:06', 'Nakup', 'pocitniski', 'središče mesta', '051-267-558', 'nepremičnina tipa apartma', 80, 150, 2, 20),
(31, 'Pisarniško poslopje', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Cankarjeva cesta 3', '2019-09-26 18:25:20', 'Prodaja', 'poslovni', 'center', '070-744-153', 'soba', 150, 150, 2, 26),
(32, 'Pisarna', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Miklošičeva ulica 6', '2019-09-26 18:27:13', 'Oddaja', 'poslovni', 'center', '070-744-153', 'nepremičnina', 100, 100, 2, 26),
(34, 'Slabaaa hiša', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Minecraft 3', '2019-09-26 18:35:01', 'Najem', 'hisa', 'predmestje', '051-267-558', '5 in večsobna nepremičnina', 420, 690, 4, 24),
(35, 'Slab vikend, edino', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id interdum velit laoreet id donec ultrices tincidunt arcu non. Adipiscing bibendum est ultricies integer quis. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Facilisi morbi tempus iaculis urna id volutpat lacus. Viverra mauris in aliquam sem fringilla ut morbi. Viverra nam libero justo laoreet sit amet cursus. Quam lacus suspendisse faucibus interdum posuere lorem. Euismod lacinia at quis risus sed vulputate. Pellentesque eu tincidunt tortor aliquam nulla.\r\n\r\n', 'Slodiggers 45', '2019-09-26 18:38:37', 'Prodaja', 'vikend', 'sredi ničesar', '051-267-558', 'nepremičnina', 456, 1000, 4, 13);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `nepremicnine`
--
ALTER TABLE `nepremicnine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`),
  ADD KEY `kraj_id` (`kraj_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `nepremicnine`
--
ALTER TABLE `nepremicnine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
