-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inscription_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `idea` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `idea`, `created_at`, `status`) VALUES
(31, 'ariri ayman', 'aririayman0@gmail.com', '0694845625', 'mmmmmmmmmm', '2025-04-23 14:06:22', 'like'),
(32, 'ariri ayman', 'aririayman@gmail.com', '0694845625', 'iiiiiiiiiii', '2025-04-23 14:06:37', 'dislike'),
(33, 'qscour', 'ascour@gmail.com', '0000000000000', 'bra', '2025-04-23 14:33:25', 'like'),
(34, 'ikram', 'souala@gmail.com', '0694845625', 'kkkkkkkkkkkkkkkkkkkkkkkkk', '2025-04-23 15:20:19', 'dislike'),
(35, 'ana', 'ana0@gmail.com', '0694845625', 'arararar', '2025-04-24 14:43:32', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `image`, `url`, `language`) VALUES
(1, 'Projet 1', 'babe1.png', 'https://zodiag08.github.io/khouchali-chaimae/', 'HTML'),
(2, 'Projet 2', 'movie.png', 'https://zodiag08.github.io/aya-jnane/', 'JavaScript'),
(3, 'Projet 3', 'mike up.png', 'https://zodiag08.github.io/qatar-nada/', 'PHP'),
(4, 'Projet 4', 'shop.png', 'https://zodiag08.github.io/faresibrahim/', 'React'),
(14, 'bbbbb', 'uploads/img_6808f43a2755f6.70997580.png', 'https://www.youtube.com/watch?v=GHSTunyabXI&amp;list=RD-y4VnMGrfEs&amp;index=3', 'pythone css html'),
(16, 'uuu', 'uploads/img_6809059b78fe74.28116646.jpg', 'https://www.youtube.com/watch?v=GHSTunyabXI&amp;list=RD-y4VnMGrfEs&amp;index=3', 'pythone css html react');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `link`) VALUES
(1, 'Web Design', 'Création de designs modernes et responsives pour sites web.', 'web design.html'),
(2, 'Web Development', 'Développement web back-end et front-end sur mesure.', 'Web Development.html'),
(3, 'Creative Design', 'Conception graphique et design créatif selon vos idées.', 'Creative Design.html');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
('like'),
('dislike'),
('vu');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `date_naissance`, `email`, `mot_de_passe`, `image`, `date_inscription`, `role`) VALUES
(11, 'ayman', 'ariri', '2005-08-08', 'aririayman0@gmail.com', '$2y$10$ayfNMWLhaJBoaaIruDYsrelG/4exv.o4v4540imxSr0ap0aBv1.ve', 'uploads/profil_68000fc9312a14.26588784.jpg', '2025-04-16 20:15:05', 'user'),
(18, 'marwa', 'ariri', '2008-01-01', 'marwaariri@gmail.com', '$2y$10$f5UaCukTRKgtKIXhzUrjvO83rpveP6OtDMtGdQ3YhcpzmwxFY9t8.', 'uploads/profil_68040f4fb4b1b8.18571778.jpg', '2025-04-19 21:02:07', 'admin'),
(19, 'moulatay', 'abdelilah', '2006-01-01', 'moulatayabdelilah@gmail.com', '$2y$10$Q8JYAcICID95uhP4nGM9IOo45bHNg87zpQfJBmtC/g40tTkFHiCHG', 'uploads/profil_680427e64feed2.92675753.jpg', '2025-04-19 22:47:02', 'admin'),
(20, 'zaza', 'zaza', '1999-09-09', 'zaza@gmail.com', '$2y$10$fMkcB0gmYAYGf9hYmJ6cj.9nfaiTXsn1gimEVGisUCaH0o543MsJm', 'uploads/profil_68042e6a820160.38394677.jpg', '2025-04-19 23:14:50', 'user'),
(22, 'ayman', 'ariri', '1999-09-09', 'aririaymanpppp@gmail.com', '$2y$10$lBuUVAPlsE2zmIZ6zhVba.AX4vX5UXhITjHte6kz37.zcqbshSA/i', 'uploads/profil_68076fd61ce785.16061108.jpg', '2025-04-22 10:30:46', 'user'),
(23, 'ascour', 'bochra', '1999-09-09', 'ascour@gmail.com', '$2y$10$/d1EkzrCRbGKQeUMBjLfE.gG3ygqU/gB2w6q04VbsaPEkktBJVLwa', 'uploads/profil_6808f8ea610f31.31067605.png', '2025-04-23 14:27:54', 'user'),
(24, 'sara', 'el', '2025-04-22', 'sara@gmail.com', '$2y$10$AGoUtjf2rieDAWGl.HjixOxOQgSdxwyBOEuD1iroZv6PRp5Or0w0G', 'uploads/profil_6808fa8c5cf112.16469756.jpg', '2025-04-23 14:34:52', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
