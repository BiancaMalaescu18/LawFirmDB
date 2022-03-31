-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 09:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colocviu`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Rata` ()  NO SQL
SELECT r1.id_cj 'id', r1.id_r 'i1', r1.data 'd1', r1.suma 's1', r2.id_r 'i2', r2.data 'd2', r2.suma 's2' FROM Rata r1
INNER JOIN Rata r2 ON (r1.id_r + 1 = r2.id_r AND r1.id_cj = r2.id_cj)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `salar` ()  NO SQL
SELECT P.nume 'numele', (SUM (C_j.onorar)/12) 'salarul'
                    FROM Contract_m C_m, Persoana P, Contract_j C_j 
                    WHERE Functie='Avocat'  AND (C_m.data BETWEEN date('2019-01-01') AND date('2019-12-31')) AND C_m.id_angajat = P.id_p AND C_j.id_avocat=P.id_p
                    GROUP BY P.nume$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contract_j`
--

CREATE TABLE `contract_j` (
  `id_cj` int(4) NOT NULL,
  `data` date NOT NULL,
  `obiect` varchar(30) NOT NULL,
  `onorar` double NOT NULL,
  `nr_pagini` int(5) NOT NULL,
  `id_client` int(4) NOT NULL,
  `id_avocat` int(11) NOT NULL,
  `tva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_j`
--

INSERT INTO `contract_j` (`id_cj`, `data`, `obiect`, `onorar`, `nr_pagini`, `id_client`, `id_avocat`, `tva`) VALUES
(1, '2019-04-04', 'Mediere', 1000, 11, 11, 10, 19),
(2, '2019-04-06', 'Operatiuni fiduciare', 2000, 17, 12, 10, 19),
(3, '2019-06-01', 'Consultatii juridice', 500, 5, 15, 13, 19),
(4, '2019-06-17', 'Consultatii juridice', 400, 6, 15, 14, 19),
(6, '2019-07-28', 'Domiciliere firma', 1500, 20, 20, 19, 19),
(7, '2019-04-06', 'Operatiuni fiduciare', 1800, 6, 20, 19, 19),
(123, '2019-07-01', 'Redactare acte', 200, 12, 17, 18, 19);

-- --------------------------------------------------------

--
-- Table structure for table `contract_m`
--

CREATE TABLE `contract_m` (
  `id_cm` int(4) NOT NULL,
  `data` date NOT NULL,
  `functie` varchar(30) NOT NULL,
  `salar_baza` double NOT NULL,
  `comision` double NOT NULL,
  `id_angajat` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_m`
--

INSERT INTO `contract_m` (`id_cm`, `data`, `functie`, `salar_baza`, `comision`, `id_angajat`) VALUES
(1, '2019-03-01', 'Avocat', 5000, 30, 10),
(2, '2019-04-02', 'Avocat', 3000, 40, 14),
(3, '2019-04-03', 'Avocat', 4000, 30, 14),
(4, '2019-02-01', 'Ingrijitor', 2000, 0, 16),
(5, '2019-05-01', 'Avocat', 4300, 32, 18),
(6, '2019-07-04', 'Avocat', 3700, 40, 19);

-- --------------------------------------------------------

--
-- Table structure for table `persoana`
--

CREATE TABLE `persoana` (
  `id_p` int(4) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persoana`
--

INSERT INTO `persoana` (`id_p`, `nume`, `email`, `adresa`) VALUES
(10, 'Popescu Marius', 'marius.p@gmail.com', 'Cluj-Napoca, Strada Pandurilor Nr. 10'),
(11, 'Andriescu Antonio', 'aantoniovasile@gmail.com', 'Piatra Neamt, Strada Alexandru Lapusneanu Nr.35'),
(12, 'Farcas Ana', 'ana.fa@gmail.com', 'Floresti, Strada Libertatii Nr.1'),
(13, 'Andrei Vasile', ' TELEFON:0545-123456', 'Apahida, Strada Republicii Nr.11'),
(14, 'Pop Natalia', 'natalia_pop_3@gmail.com', 'Cluj-Napoca, Strada Ion Mester Nr. 5'),
(15, 'Croitor Teodor', 'teo_cr@gmail.com', 'Cluj-Napoca, Strada Dorobantilor Nr. 99'),
(16, 'Istrate Alexandra', 'ale_istrate@gmail.com', 'Cluj-Napoca, Strada Republicii Nr. 15A'),
(17, 'Pop Ileana', 'il_p@gmail.com', 'Cluj-Napoca, Strada Splaiul Independentei Nr. 5'),
(18, 'Ionescu George', 'ionescu_george_avocat@gmail.com', 'Cluj-Napoca, Strada Plopilor Nr. 5'),
(19, 'Popescu Ovidiu', 'pop.ov@gmail.com', 'Cluj-Napoca, Strada Libertatii nr.2'),
(20, 'Aluas Dana ', 'aluas_d@gmail.com', 'Bistrita, Strada Bucuresti Nr. 10');

-- --------------------------------------------------------

--
-- Table structure for table `rata`
--

CREATE TABLE `rata` (
  `id_cj` int(4) NOT NULL,
  `id_r` int(11) NOT NULL,
  `data` date NOT NULL,
  `suma` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rata`
--

INSERT INTO `rata` (`id_cj`, `id_r`, `data`, `suma`) VALUES
(1, 1, '2019-04-04', 500),
(2, 1, '2019-04-06', 700),
(3, 1, '2019-06-01', 300),
(4, 1, '2019-06-17', 200),
(7, 1, '2019-12-17', 100),
(123, 1, '2019-07-01', 100),
(1, 2, '2019-04-06', 300),
(2, 2, '2019-04-12', 700),
(3, 2, '2019-07-01', 200),
(1, 3, '2019-04-27', 200),
(2, 3, '2019-04-30', 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract_j`
--
ALTER TABLE `contract_j`
  ADD PRIMARY KEY (`id_cj`),
  ADD KEY `contract_j_id_client_fk` (`id_client`),
  ADD KEY `contract_j_id_vocat_fk` (`id_avocat`);

--
-- Indexes for table `contract_m`
--
ALTER TABLE `contract_m`
  ADD PRIMARY KEY (`id_cm`),
  ADD KEY `contract_m_id_angajat_fk` (`id_angajat`);

--
-- Indexes for table `persoana`
--
ALTER TABLE `persoana`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `rata`
--
ALTER TABLE `rata`
  ADD PRIMARY KEY (`id_r`,`id_cj`),
  ADD KEY `rata_id_cj_fk` (`id_cj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract_m`
--
ALTER TABLE `contract_m`
  MODIFY `id_cm` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persoana`
--
ALTER TABLE `persoana`
  MODIFY `id_p` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract_j`
--
ALTER TABLE `contract_j`
  ADD CONSTRAINT `contract_j_id_client_fk` FOREIGN KEY (`id_client`) REFERENCES `persoana` (`id_p`),
  ADD CONSTRAINT `contract_j_id_vocat_fk` FOREIGN KEY (`id_avocat`) REFERENCES `persoana` (`id_p`);

--
-- Constraints for table `contract_m`
--
ALTER TABLE `contract_m`
  ADD CONSTRAINT `contract_m_id_angajat_fk` FOREIGN KEY (`id_angajat`) REFERENCES `persoana` (`id_p`);

--
-- Constraints for table `rata`
--
ALTER TABLE `rata`
  ADD CONSTRAINT `rata_id_cj_fk` FOREIGN KEY (`id_cj`) REFERENCES `contract_j` (`id_cj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
