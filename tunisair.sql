-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2016 at 04:27 م
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tunisair`
--

-- --------------------------------------------------------

--
-- Table structure for table `annuaire`
--

CREATE TABLE `annuaire` (
  `id` int(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codeP` varchar(30) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annuaire`
--

INSERT INTO `annuaire` (`id`, `adresse`, `codeP`, `ville`, `pays`, `tel`, `fax`, `email`) VALUES
(1, '12,Rue de l''artisanat Charguia II', '2035 - Tunis Carthage', 'Tunis', 'Tunisie', '(00 216 71) 942 744', '(00 216 71) 941 119', 'tunisair@tunisair.com');

-- --------------------------------------------------------

--
-- Table structure for table `badgeage`
--

CREATE TABLE `badgeage` (
  `id` int(20) NOT NULL,
  `mat` int(50) NOT NULL,
  `datepoint` date NOT NULL,
  `h8` time NOT NULL,
  `h13` time NOT NULL,
  `h14` time NOT NULL,
  `h17` time NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `badgeage`
--

INSERT INTO `badgeage` (`id`, `mat`, `datepoint`, `h8`, `h13`, `h14`, `h17`, `commentaire`) VALUES
(1, 1, '2016-05-03', '08:00:00', '13:00:00', '14:00:00', '17:00:00', 'tres bien'),
(2, 2, '2016-05-03', '08:00:00', '13:00:00', '14:00:00', '17:00:00', 'Je suis la');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `htext` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `convension`
--

CREATE TABLE `convension` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `htext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(50) NOT NULL,
  `recive_id` int(20) NOT NULL,
  `send_id` int(20) NOT NULL,
  `fromhow` varchar(50) NOT NULL,
  `tohow` varchar(50) NOT NULL,
  `object` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `del` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `recive_id`, `send_id`, `fromhow`, `tohow`, `object`, `message`, `date`, `del`) VALUES
(1, 2, 1, 'riahi@hotmail.fr', 'mar@hotmail.fr', 'rendez-vous', 'winek', '2016-05-24 13:15:22', 1),
(9, 6, 1, 'riahi@hotmail.fr', 'amin@hotmail.fr', 'rendez-vous', 'winek', '2016-05-27 11:07:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipage`
--

CREATE TABLE `equipage` (
  `id` int(20) NOT NULL,
  `num_vol` int(20) NOT NULL,
  `contenu` varchar(200) NOT NULL,
  `heure_vol` time NOT NULL,
  `date_vol` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipage`
--

INSERT INTO `equipage` (`id`, `num_vol`, `contenu`, `heure_vol`, `date_vol`) VALUES
(1, 214, 'Sami Majd Marwa Yossra Kalil Mohamed', '05:00:00', '2016-05-10'),
(2, 100, 'Aymen Ahmed Rim Lara Kamel Yassine', '14:00:00', '2016-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `historic`
--

CREATE TABLE `historic` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `htext` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historic`
--

INSERT INTO `historic` (`id`, `title`, `htext`) VALUES
(1, 'tunisair vol confirmation', 'Le Billet Prime est un titre de transport Tunisair (Hors Taxes) payÃƒÂ© par le\r\nmembre fidelys en contre partie des Miles Prime dÃƒÂ©duits de son compte. Il est\r\nutilisÃƒÂ© Pour les adhÃƒÂ©rents Silver, les dÃƒÂ©lais minimums de rÃƒÂ©servation dÃ¢â‚¬â„¢un Billet\r\nPrime sont de 3 jours avant la date du vol prÃƒÂ©vu.Pour les adhÃƒÂ©rents Gold, la rÃƒÂ©servation dÃ¢â‚¬â„¢un Billet Prime est possible sans dÃƒÂ©lai de restriction prÃƒÂ©alable avant la date du vol prÃƒÂ©vu.\r\nutilisÃƒÂ© Pour les adhÃƒÂ©rents Silver, les dÃƒÂ©lais minimums de rÃƒÂ©servation dÃ¢â‚¬â„¢un Billet\r\nPrime sont de 3 jours avant la date du vol prÃƒÂ©vu.Pour les adhÃƒÂ©rents Gold, la rÃƒÂ©servation dÃ¢â‚¬â„¢un Billet Prime est possible sans dÃƒÂ©lai de restriction prÃƒÂ©alable avant la date du vol prÃƒÂ©vu.');

-- --------------------------------------------------------

--
-- Table structure for table `pdfStore`
--

CREATE TABLE `pdfStore` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pdfStore`
--

INSERT INTO `pdfStore` (`id`, `title`, `url`) VALUES
(1, 'Triangular List Bullets', 0x2f74756e69736169722f7765622f696d616765732f75706c6f6164732f35336232663638386136383362393763306261386233336533636132613235322e706466);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id` int(20) NOT NULL,
  `mat` bigint(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id`, `mat`, `nom`, `prenom`, `adresse`) VALUES
(1, 1, 'Riahi', 'mohamed', 'habib'),
(2, 2, 'Marwen', 'Ajabi', 'Habib Bourguiba');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(20) NOT NULL,
  `mat` int(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reseau`
--

CREATE TABLE `reseau` (
  `id` int(20) NOT NULL,
  `agence` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reseau`
--

INSERT INTO `reseau` (`id`, `agence`, `adresse`, `tel`, `fax`, `email`) VALUES
(1, 'Nabel', 'Av Mohamed 5', '(+216) 98 125 148 ', '(+216) 72 125 148', 'NabelAgence@gmail.com'),
(3, 'Bizerte', 'Licée hayet', '(+216) 25 310 001', '(+216) 72 310 001', 'AgenceElBehi@hotmail.fr');

-- --------------------------------------------------------

--
-- Table structure for table `seekfold`
--

CREATE TABLE `seekfold` (
  `id` int(10) NOT NULL,
  `mat` bigint(50) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `url` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `telutil`
--

CREATE TABLE `telutil` (
  `id` int(20) NOT NULL,
  `tel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telutil`
--

INSERT INTO `telutil` (`id`, `tel`) VALUES
(2, '(00 216 71) 942 555');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `mat` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mat`, `username`, `password`, `email`, `role`, `post`) VALUES
(1, 1, 'riahi', '0000', 'riahi@hotmail.fr', 'admin', 'admin'),
(2, 2, 'Marwen', '1111', 'mar@hotmail.fr', 'agent', 'iocc');

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE `vol` (
  `id` int(20) NOT NULL,
  `immc` varchar(50) NOT NULL,
  `num_vol` int(30) NOT NULL,
  `esc_dep` varchar(30) NOT NULL,
  `esc_arr` varchar(30) NOT NULL,
  `etat_vol` varchar(20) NOT NULL,
  `dep_prog` int(30) NOT NULL,
  `arr_prog` int(30) NOT NULL,
  `dep_est` int(30) NOT NULL,
  `arr_est` int(30) NOT NULL,
  `dep_act` varchar(30) NOT NULL,
  `arr_act` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`id`, `immc`, `num_vol`, `esc_dep`, `esc_arr`, `etat_vol`, `dep_prog`, `arr_prog`, `dep_est`, `arr_est`, `dep_act`, `arr_act`) VALUES
(3, 'Test', 214, 'Paris', 'Paris', '4', 5, 12, 5, 12, 'London', 'London');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badgeage`
--
ALTER TABLE `badgeage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convension`
--
ALTER TABLE `convension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipage`
--
ALTER TABLE `equipage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdfStore`
--
ALTER TABLE `pdfStore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseau`
--
ALTER TABLE `reseau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekfold`
--
ALTER TABLE `seekfold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telutil`
--
ALTER TABLE `telutil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `badgeage`
--
ALTER TABLE `badgeage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `convension`
--
ALTER TABLE `convension`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `equipage`
--
ALTER TABLE `equipage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `historic`
--
ALTER TABLE `historic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pdfStore`
--
ALTER TABLE `pdfStore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reseau`
--
ALTER TABLE `reseau`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seekfold`
--
ALTER TABLE `seekfold`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telutil`
--
ALTER TABLE `telutil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vol`
--
ALTER TABLE `vol`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
