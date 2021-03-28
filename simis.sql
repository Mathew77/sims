-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 04:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simis`
--

-- --------------------------------------------------------

--
-- Table structure for table `cct_ms_beneficiary`
--

CREATE TABLE `cct_ms_beneficiary` (
  `beneficiaryid` int(11) NOT NULL,
  `first` varchar(45) NOT NULL,
  `last` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `education` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `lgaid` int(11) DEFAULT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `date_of_enrolment` date DEFAULT NULL,
  `date_of_exit` date DEFAULT NULL,
  `reason_for_exit` varchar(255) DEFAULT NULL,
  `middle` varchar(45) DEFAULT NULL,
  `qualification` varchar(45) DEFAULT NULL,
  `gps` varchar(100) DEFAULT NULL,
  `primary_assignment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cct_ms_period`
--

CREATE TABLE `cct_ms_period` (
  `periodid` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` double NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cct_ms_period`
--

INSERT INTO `cct_ms_period` (`periodid`, `fullname`, `priority`, `start_date`, `end_date`, `active`) VALUES
(1, 'Jan - Feb 2021', 1, '2021-01-01', '2021-02-28', 1),
(2, 'Mar - Apr 2021', 2, '2021-03-01', '2021-04-30', 1),
(3, 'May - Jun 2021', 3, '2021-05-01', '2021-06-30', 1),
(4, 'Jul - Aug 2021', 4, '2021-07-01', '2020-08-31', 1),
(5, 'Sep - Oct 2021', 5, '2021-09-01', '2021-10-31', 1),
(6, 'Nov - Dec 2021', 6, '2021-11-01', '2021-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cct_tr_core`
--

CREATE TABLE `cct_tr_core` (
  `id` int(11) NOT NULL,
  `beneficiaryid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `collected_date` date NOT NULL,
  `is_disability` smallint(6) DEFAULT NULL,
  `is_bank` smallint(6) DEFAULT NULL,
  `bank_distance` varchar(45) DEFAULT NULL,
  `is_bvn` smallint(6) DEFAULT NULL,
  `is_nin` smallint(6) DEFAULT NULL,
  `is_household_head` smallint(6) DEFAULT NULL,
  `income_source` varchar(45) DEFAULT NULL,
  `household_income_perday` double DEFAULT NULL,
  `is_part_cooperative` smallint(6) DEFAULT NULL,
  `person_in_household` int(11) DEFAULT NULL,
  `dependant_below_18` int(11) DEFAULT NULL,
  `dependant_below_2` int(11) DEFAULT NULL,
  `dependent_in_school` int(11) DEFAULT NULL,
  `children_immunized` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cct_tr_periodic`
--

CREATE TABLE `cct_tr_periodic` (
  `id` int(11) NOT NULL,
  `beneficiaryid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `has_collected` smallint(6) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `data_collected_date` date DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `is_challenging` smallint(6) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `gps` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gee_ms_beneficiary`
--

CREATE TABLE `gee_ms_beneficiary` (
  `beneficiaryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `lgaid` int(11) NOT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `npower_id` varchar(45) DEFAULT NULL,
  `first` varchar(45) DEFAULT NULL,
  `middle` varchar(45) DEFAULT NULL,
  `last` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `state_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `primary_assignment` varchar(255) DEFAULT NULL,
  `qualification` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `biz_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gee_ms_period`
--

CREATE TABLE `gee_ms_period` (
  `periodid` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gee_ms_period`
--

INSERT INTO `gee_ms_period` (`periodid`, `fullname`, `priority`, `start_date`, `end_date`, `active`) VALUES
(1, 'Jan - Mar 2021', 1, '2021-01-01', '2021-03-31', 1),
(2, 'Apr - Jun 2021', 2, '2021-04-01', '2021-06-30', 1),
(3, 'Jul - Sep 2021', 3, '2021-07-01', '2021-09-30', 1),
(4, 'Oct - Dec 2021', 4, '2021-10-01', '2021-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gee_tr_core`
--

CREATE TABLE `gee_tr_core` (
  `id` int(11) NOT NULL,
  `beneficiaryid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `gps` varchar(100) DEFAULT NULL,
  `staff_employed_male` int(11) DEFAULT NULL,
  `staff_employed_female` int(11) NOT NULL,
  `category_of_loan` varchar(100) DEFAULT NULL,
  `amount_received` double DEFAULT NULL,
  `avg_daily_turnover` double DEFAULT NULL,
  `avg_daily_expense` double DEFAULT NULL,
  `avg_turnover_bfload` double DEFAULT NULL,
  `repayment_due` date DEFAULT NULL,
  `has_paid_back` smallint(6) DEFAULT NULL,
  `profit_plough_back` double DEFAULT NULL,
  `is_tax_payer` smallint(6) DEFAULT NULL,
  `frequency_of_tax` varchar(45) DEFAULT NULL,
  `tax_amount` double DEFAULT NULL,
  `is_disabled` smallint(6) DEFAULT NULL,
  `is_head_of_household` smallint(6) DEFAULT NULL,
  `person_in_household` int(11) DEFAULT NULL,
  `is_dependent` smallint(6) DEFAULT NULL,
  `dependent_below_18` int(11) DEFAULT NULL,
  `dependent_below_2` int(11) DEFAULT NULL,
  `is_dependent_in_school` smallint(6) DEFAULT NULL,
  `is_dependent_below_2` smallint(6) DEFAULT NULL,
  `dependent_immunized` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_lga`
--

CREATE TABLE `ms_lga` (
  `LgaId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_lga`
--

INSERT INTO `ms_lga` (`LgaId`, `StateId`, `Fullname`, `Description`) VALUES
(1, 1, 'Aba North', NULL),
(2, 1, 'Aba South', NULL),
(3, 1, 'Arochukwu', NULL),
(4, 1, 'Bende', NULL),
(5, 1, 'Ikwuano', NULL),
(6, 1, 'Isiala Ngwa North', NULL),
(7, 1, 'Isiala Ngwa South', NULL),
(8, 1, 'Isuikwuato', NULL),
(9, 1, 'Obi Ngwa', NULL),
(10, 1, 'Ohafia', NULL),
(11, 1, 'Osisioma Ngwa', NULL),
(12, 1, 'Ugwunagbo', NULL),
(13, 1, 'Ukwa East', NULL),
(14, 1, 'Ukwa West', NULL),
(15, 1, 'Umu Nneochi', NULL),
(16, 1, 'Umuahia North', NULL),
(17, 1, 'Umuahia South', NULL),
(18, 2, 'Demsa', NULL),
(19, 2, 'Fufore', NULL),
(20, 2, 'Ganye', NULL),
(21, 2, 'Girei', NULL),
(22, 2, 'Gombi', NULL),
(23, 2, 'Guyuk', NULL),
(24, 2, 'Hong', NULL),
(25, 2, 'Jada', NULL),
(26, 2, 'Lamurde', NULL),
(27, 2, 'Madagali', NULL),
(28, 2, 'Maiha', NULL),
(29, 2, 'Mayo Belwa', NULL),
(30, 2, 'Michika', NULL),
(31, 2, 'Mubi North', NULL),
(32, 2, 'Mubi South', NULL),
(33, 2, 'Numan', NULL),
(34, 2, 'Shelleng', NULL),
(35, 2, 'Song', NULL),
(36, 2, 'Toungo', NULL),
(37, 2, 'Yola North', NULL),
(38, 2, 'Yola South', NULL),
(39, 3, 'Abak', NULL),
(40, 3, 'Eastern Obolo', NULL),
(41, 3, 'Eket', NULL),
(42, 3, 'Esit Eket', NULL),
(43, 3, 'Essien Udim', NULL),
(44, 3, 'Etim Ekpo', NULL),
(45, 3, 'Etinan', NULL),
(46, 3, 'Ibeno', NULL),
(47, 3, 'Ibesikpo Asutan', NULL),
(48, 3, 'Ibiono Ibom', NULL),
(49, 3, 'Ika', NULL),
(50, 3, 'Ikono', NULL),
(51, 3, 'Ikot Abasi', NULL),
(52, 3, 'Ikot Ekpene', NULL),
(53, 3, 'Ini', NULL),
(54, 3, 'Itu', NULL),
(55, 3, 'Mbo', NULL),
(56, 3, 'Mkpat Enin', NULL),
(57, 3, 'Nsit Atai', NULL),
(58, 3, 'Nsit Ibom', NULL),
(59, 3, 'Nsit Ubium', NULL),
(60, 3, 'Obot Akara', NULL),
(61, 3, 'Okobo', NULL),
(62, 3, 'Onna', NULL),
(63, 3, 'Oron', NULL),
(64, 3, 'Oruk Anam', NULL),
(65, 3, 'Udung Uko', NULL),
(66, 3, 'Ukanafun', NULL),
(67, 3, 'Uruan', NULL),
(68, 3, 'Urue Offong-Oruko', NULL),
(69, 3, 'Uyo', NULL),
(70, 4, 'Aguata', NULL),
(71, 4, 'Anambra East', NULL),
(72, 4, 'Anambra West', NULL),
(73, 4, 'Anaocha', NULL),
(74, 4, 'Awka North', NULL),
(75, 4, 'Awka-South', NULL),
(76, 4, 'Ayamelum', NULL),
(77, 4, 'Dunukofia', NULL),
(78, 4, 'Ekwusigo', NULL),
(79, 4, 'Idemili North', NULL),
(80, 4, 'Idemili South', NULL),
(81, 4, 'Ihiala', NULL),
(82, 4, 'Njikoka', NULL),
(83, 4, 'Nnewi North', NULL),
(84, 4, 'Nnewi South', NULL),
(85, 4, 'Ogbaru', NULL),
(86, 4, 'Onitsha North', NULL),
(87, 4, 'Onitsha South', NULL),
(88, 4, 'Orumba North', NULL),
(89, 4, 'Orumba South', NULL),
(90, 4, 'Oyi', NULL),
(91, 5, 'Alkaleri', NULL),
(92, 5, 'Bauchi', NULL),
(93, 5, 'Bogoro', NULL),
(94, 5, 'Dambam', NULL),
(95, 5, 'Darazo', NULL),
(96, 5, 'Dass', NULL),
(97, 5, 'Gamawa', NULL),
(98, 5, 'Ganjuwa', NULL),
(99, 5, 'Giade', NULL),
(100, 5, 'Itas-Gadau', NULL),
(101, 5, 'Jama\'Are', NULL),
(102, 5, 'Katagum', NULL),
(103, 5, 'Kirfi', NULL),
(104, 5, 'Misau', NULL),
(105, 5, 'Ningi', NULL),
(106, 5, 'Shira', NULL),
(107, 5, 'Tafawa Balewa', NULL),
(108, 5, 'Toro', NULL),
(109, 5, 'Warji', NULL),
(110, 5, 'Zaki', NULL),
(111, 6, 'Brass', NULL),
(112, 6, 'Ekeremor', NULL),
(113, 6, 'Kolokuma-Opokuma', NULL),
(114, 6, 'Nembe', NULL),
(115, 6, 'Ogbia', NULL),
(116, 6, 'Sagbama', NULL),
(117, 6, 'Southern Ijaw', NULL),
(118, 6, 'Yenagoa', NULL),
(119, 7, 'Ado', NULL),
(120, 7, 'Agatu', NULL),
(121, 7, 'Apa', NULL),
(122, 7, 'Buruku', NULL),
(123, 7, 'Gboko', NULL),
(124, 7, 'Guma', NULL),
(125, 7, 'Gwer East', NULL),
(126, 7, 'Gwer West', NULL),
(127, 7, 'Katsina-Ala', NULL),
(128, 7, 'Konshisha', NULL),
(129, 7, 'Kwande', NULL),
(130, 7, 'Logo', NULL),
(131, 7, 'Makurdi', NULL),
(132, 7, 'Obi', NULL),
(133, 7, 'Ogbadibo', NULL),
(134, 7, 'Ohimini', NULL),
(135, 7, 'Oju', NULL),
(136, 7, 'Okpokwu', NULL),
(137, 7, 'Otukpo', NULL),
(138, 7, 'Tarka', NULL),
(139, 7, 'Ukum', NULL),
(140, 7, 'Ushongo', NULL),
(141, 7, 'Vandeikya', NULL),
(142, 8, 'Abadam', NULL),
(143, 8, 'Askira-Uba', NULL),
(144, 8, 'Bama', NULL),
(145, 8, 'Bayo', NULL),
(146, 8, 'Biu', NULL),
(147, 8, 'Chibok', NULL),
(148, 8, 'Damboa', NULL),
(149, 8, 'Dikwa', NULL),
(150, 8, 'Gubio', NULL),
(151, 8, 'Guzamala', NULL),
(152, 8, 'Gwoza', NULL),
(153, 8, 'Hawul', NULL),
(154, 8, 'Jere', NULL),
(155, 8, 'Kaga', NULL),
(156, 8, 'Kala-Balge', NULL),
(157, 8, 'Konduga', NULL),
(158, 8, 'Kukawa', NULL),
(159, 8, 'Kwaya Kusar', NULL),
(160, 8, 'Mafa', NULL),
(161, 8, 'Magumeri', NULL),
(162, 8, 'Maiduguri', NULL),
(163, 8, 'Marte', NULL),
(164, 8, 'Mobbar', NULL),
(165, 8, 'Monguno', NULL),
(166, 8, 'Ngala', NULL),
(167, 8, 'Nganzai', NULL),
(168, 8, 'Shani', NULL),
(169, 9, 'Abi', NULL),
(170, 9, 'Akamkpa', NULL),
(171, 9, 'Akpabuyo', NULL),
(172, 9, 'Bakassi', NULL),
(173, 9, 'Bekwarra', NULL),
(174, 9, 'Biase', NULL),
(175, 9, 'Boki', NULL),
(176, 9, 'Calabar Municipal', NULL),
(177, 9, 'Calabar South', NULL),
(178, 9, 'Etung', NULL),
(179, 9, 'Ikom', NULL),
(180, 9, 'Obanliku', NULL),
(181, 9, 'Obubra', NULL),
(182, 9, 'Obudu', NULL),
(183, 9, 'Odukpani', NULL),
(184, 9, 'Ogoja', NULL),
(185, 9, 'Yakurr', NULL),
(186, 9, 'Yala', NULL),
(187, 10, 'Aniocha North', NULL),
(188, 10, 'Aniocha South', NULL),
(189, 10, 'Bomadi', NULL),
(190, 10, 'Burutu', NULL),
(191, 10, 'Ethiope East', NULL),
(192, 10, 'Ethiope West', NULL),
(193, 10, 'Ika North East', NULL),
(194, 10, 'Ika South', NULL),
(195, 10, 'Isoko North', NULL),
(196, 10, 'Isoko South', NULL),
(197, 10, 'Ndokwa East', NULL),
(198, 10, 'Ndokwa West', NULL),
(199, 10, 'Okpe', NULL),
(200, 10, 'Oshimili North', NULL),
(201, 10, 'Oshimili South', NULL),
(202, 10, 'Patani', NULL),
(203, 10, 'Sapele', NULL),
(204, 10, 'Udu', NULL),
(205, 10, 'Ughelli North', NULL),
(206, 10, 'Ughelli South', NULL),
(207, 10, 'Ukwuani', NULL),
(208, 10, 'Uvwie', NULL),
(209, 10, 'Warri North', NULL),
(210, 10, 'Warri South', NULL),
(211, 10, 'Warri South West', NULL),
(212, 11, 'Abakaliki', NULL),
(213, 11, 'Afikpo North', NULL),
(214, 11, 'Afikpo South', NULL),
(215, 11, 'Ebonyi', NULL),
(216, 11, 'Ezza North', NULL),
(217, 11, 'Ezza South', NULL),
(218, 11, 'Ikwo', NULL),
(219, 11, 'Ishielu', NULL),
(220, 11, 'Ivo', NULL),
(221, 11, 'Izzi', NULL),
(222, 11, 'Ohaozara', NULL),
(223, 11, 'Ohaukwu', NULL),
(224, 11, 'Onicha', NULL),
(225, 12, 'Akoko-Edo', NULL),
(226, 12, 'Egor', NULL),
(227, 12, 'Esan Central', NULL),
(228, 12, 'Esan North East', NULL),
(229, 12, 'Esan South East', NULL),
(230, 12, 'Esan West', NULL),
(231, 12, 'Etsako Central', NULL),
(232, 12, 'Etsako East', NULL),
(233, 12, 'Etsako West', NULL),
(234, 12, 'Igueben', NULL),
(235, 12, 'Ikpoba Okha', NULL),
(236, 12, 'Oredo', NULL),
(237, 12, 'Orhionmwon', NULL),
(238, 12, 'Ovia North East', NULL),
(239, 12, 'Ovia South West', NULL),
(240, 12, 'Owan East', NULL),
(241, 12, 'Owan West', NULL),
(242, 12, 'Uhunmwonde', NULL),
(243, 13, 'Ado Ekiti', NULL),
(244, 13, 'Aiyekire (Gbonyin)', NULL),
(245, 13, 'Efon', NULL),
(246, 13, 'Ekiti East', NULL),
(247, 13, 'Ekiti South West', NULL),
(248, 13, 'Ekiti West', NULL),
(249, 13, 'Emure', NULL),
(250, 13, 'Ido Osi', NULL),
(251, 13, 'Ijero', NULL),
(252, 13, 'Ikere', NULL),
(253, 13, 'Ikole', NULL),
(254, 13, 'Ilejemeje', NULL),
(255, 13, 'Irepodun-Ifelodun', NULL),
(256, 13, 'Ise Orun', NULL),
(257, 13, 'Moba', NULL),
(258, 13, 'Oye', NULL),
(259, 14, 'Aninri', NULL),
(260, 14, 'Awgu', NULL),
(261, 14, 'Enugu East', NULL),
(262, 14, 'Enugu North', NULL),
(263, 14, 'Enugu South', NULL),
(264, 14, 'Ezeagu', NULL),
(265, 14, 'Igbo Etiti', NULL),
(266, 14, 'Igbo-Eze North', NULL),
(267, 14, 'Igbo-Eze South', NULL),
(268, 14, 'Isi-Uzo', NULL),
(269, 14, 'Nkanu East', NULL),
(270, 14, 'Nkanu West', NULL),
(271, 14, 'Nsukka', NULL),
(272, 14, 'Oji-River', NULL),
(273, 14, 'Udenu', NULL),
(274, 14, 'Udi', NULL),
(275, 14, 'Uzo-Uwani', NULL),
(276, 15, 'Abaji', NULL),
(277, 15, 'Abuja Municipal Area Council', NULL),
(278, 15, 'Bwari', NULL),
(279, 15, 'Gwagwalada', NULL),
(280, 15, 'Kuje', NULL),
(281, 15, 'Kwali', NULL),
(282, 16, 'Akko', NULL),
(283, 16, 'Balanga', NULL),
(284, 16, 'Billiri', NULL),
(285, 16, 'Dukku', NULL),
(286, 16, 'Funakaye', NULL),
(287, 16, 'Gombe', NULL),
(288, 16, 'Kaltungo', NULL),
(289, 16, 'Kwami', NULL),
(290, 16, 'Nafada', NULL),
(291, 16, 'Shongom', NULL),
(292, 16, 'Yamaltu Deba', NULL),
(293, 17, 'Aboh Mbaise', NULL),
(294, 17, 'Ahiazu Mbaise', NULL),
(295, 17, 'Ehime Mbano', NULL),
(296, 17, 'Ezinihitte', NULL),
(297, 17, 'Ideato North', NULL),
(298, 17, 'Ideato South', NULL),
(299, 17, 'Ihitte-Uboma', NULL),
(300, 17, 'Ikeduru', NULL),
(301, 17, 'Isiala Mbano', NULL),
(302, 17, 'Isu', NULL),
(303, 17, 'Mbaitoli', NULL),
(304, 17, 'Ngor Okpala', NULL),
(305, 17, 'Njaba', NULL),
(306, 17, 'Nkwerre', NULL),
(307, 17, 'Nwangele', NULL),
(308, 17, 'Obowo', NULL),
(309, 17, 'Oguta', NULL),
(310, 17, 'Ohaji-Egbema', NULL),
(311, 17, 'Okigwe', NULL),
(312, 17, 'Unuimo', NULL),
(313, 17, 'Orlu', NULL),
(314, 17, 'Orsu', NULL),
(315, 17, 'Oru East', NULL),
(316, 17, 'Oru West', NULL),
(317, 17, 'Owerri Municipal', NULL),
(318, 17, 'Owerri North', NULL),
(319, 17, 'Owerri West', NULL),
(320, 18, 'Auyo', NULL),
(321, 18, 'Babura', NULL),
(322, 18, 'Birnin Kudu', NULL),
(323, 18, 'Biriniwa', NULL),
(324, 18, 'Buji', NULL),
(325, 18, 'Dutse', NULL),
(326, 18, 'Gagarawa', NULL),
(327, 18, 'Garki', NULL),
(328, 18, 'Gumel', NULL),
(329, 18, 'Guri', NULL),
(330, 18, 'Gwaram', NULL),
(331, 18, 'Gwiwa', NULL),
(332, 18, 'Hadejia', NULL),
(333, 18, 'Jahun', NULL),
(334, 18, 'Kafin Hausa', NULL),
(335, 18, 'Kaugama', NULL),
(336, 18, 'Kazaure', NULL),
(337, 18, 'Kiri Kassamma', NULL),
(338, 18, 'Kiyawa', NULL),
(339, 18, 'Maigatari', NULL),
(340, 18, 'Malam Madori', NULL),
(341, 18, 'Miga', NULL),
(342, 18, 'Ringim', NULL),
(343, 18, 'Roni', NULL),
(344, 18, 'Sule Tankarkar', NULL),
(345, 18, 'Taura', NULL),
(346, 18, 'Yankwashi', NULL),
(347, 19, 'Birnin Gwari', NULL),
(348, 19, 'Chikun', NULL),
(349, 19, 'Giwa', NULL),
(350, 19, 'Igabi', NULL),
(351, 19, 'Ikara', NULL),
(352, 19, 'Jaba', NULL),
(353, 19, 'Jema\'A', NULL),
(354, 19, 'Kachia', NULL),
(355, 19, 'Kaduna North', NULL),
(356, 19, 'Kaduna South', NULL),
(357, 19, 'Kagarko', NULL),
(358, 19, 'Kajuru', NULL),
(359, 19, 'Kaura', NULL),
(360, 19, 'Kauru', NULL),
(361, 19, 'Kubau', NULL),
(362, 19, 'Kudan', NULL),
(363, 19, 'Lere', NULL),
(364, 19, 'Makarfi', NULL),
(365, 19, 'Sabon Gari', NULL),
(366, 19, 'Sanga', NULL),
(367, 19, 'Soba', NULL),
(368, 19, 'Zangon Kataf', NULL),
(369, 19, 'Zaria', NULL),
(370, 20, 'Ajingi', NULL),
(371, 20, 'Albasu', NULL),
(372, 20, 'Bagwai', NULL),
(373, 20, 'Bebeji', NULL),
(374, 20, 'Bichi', NULL),
(375, 20, 'Bunkure', NULL),
(376, 20, 'Dala', NULL),
(377, 20, 'Dambatta', NULL),
(378, 20, 'Dawakin Kudu', NULL),
(379, 20, 'Dawakin Tofa', NULL),
(380, 20, 'Doguwa', NULL),
(381, 20, 'Fagge', NULL),
(382, 20, 'Gabasawa', NULL),
(383, 20, 'Garko', NULL),
(384, 20, 'Garum Mallam', NULL),
(385, 20, 'Gaya', NULL),
(386, 20, 'Gezawa', NULL),
(387, 20, 'Gwale', NULL),
(388, 20, 'Gwarzo', NULL),
(389, 20, 'Kabo', NULL),
(390, 20, 'Kano Municipal', NULL),
(391, 20, 'Karaye', NULL),
(392, 20, 'Kibiya', NULL),
(393, 20, 'Kiru', NULL),
(394, 20, 'Kumbotso', NULL),
(395, 20, 'Kunchi', NULL),
(396, 20, 'Kura', NULL),
(397, 20, 'Madobi', NULL),
(398, 20, 'Makoda', NULL),
(399, 20, 'Minjibir', NULL),
(400, 20, 'Nassarawa', NULL),
(401, 20, 'Rano', NULL),
(402, 20, 'Rimin Gado', NULL),
(403, 20, 'Rogo', NULL),
(404, 20, 'Shanono', NULL),
(405, 20, 'Sumaila', NULL),
(406, 20, 'Takai', NULL),
(407, 20, 'Tarauni', NULL),
(408, 20, 'Tofa', NULL),
(409, 20, 'Tsanyawa', NULL),
(410, 20, 'Tudun Wada', NULL),
(411, 20, 'Ungogo', NULL),
(412, 20, 'Warawa', NULL),
(413, 20, 'Wudil', NULL),
(414, 21, 'Bakori', NULL),
(415, 21, 'Batagarawa', NULL),
(416, 21, 'Batsari', NULL),
(417, 21, 'Baure', NULL),
(418, 21, 'Bindawa', NULL),
(419, 21, 'Charanchi', NULL),
(420, 21, 'Dan Musa', NULL),
(421, 21, 'Dandume', NULL),
(422, 21, 'Danja', NULL),
(423, 21, 'Daura', NULL),
(424, 21, 'Dutsi', NULL),
(425, 21, 'Dutsin Ma', NULL),
(426, 21, 'Faskari', NULL),
(427, 21, 'Funtua', NULL),
(428, 21, 'Ingawa', NULL),
(429, 21, 'Jibia', NULL),
(430, 21, 'Kafur', NULL),
(431, 21, 'Kaita', NULL),
(432, 21, 'Kankara', NULL),
(433, 21, 'Kankia', NULL),
(434, 21, 'Katsina', NULL),
(435, 21, 'Kurfi', NULL),
(436, 21, 'Kusada', NULL),
(437, 21, 'Mai\'Adua', NULL),
(438, 21, 'Malumfashi', NULL),
(439, 21, 'Mani', NULL),
(440, 21, 'Mashi', NULL),
(441, 21, 'Matazu', NULL),
(442, 21, 'Musawa', NULL),
(443, 21, 'Rimi', NULL),
(444, 21, 'Sabuwa', NULL),
(445, 21, 'Safana', NULL),
(446, 21, 'Sandamu', NULL),
(447, 21, 'Zango', NULL),
(448, 22, 'Aleiro', NULL),
(449, 22, 'Arewa Dandi', NULL),
(450, 22, 'Argungu', NULL),
(451, 22, 'Augie', NULL),
(452, 22, 'Bagudo', NULL),
(453, 22, 'Birnin Kebbi', NULL),
(454, 22, 'Bunza', NULL),
(455, 22, 'Dandi', NULL),
(456, 22, 'Wasagu-Danko', NULL),
(457, 22, 'Fakai', NULL),
(458, 22, 'Gwandu', NULL),
(459, 22, 'Jega', NULL),
(460, 22, 'Kalgo', NULL),
(461, 22, 'Koko-Besse', NULL),
(462, 22, 'Maiyama', NULL),
(463, 22, 'Ngaski', NULL),
(464, 22, 'Sakaba', NULL),
(465, 22, 'Shanga', NULL),
(466, 22, 'Suru', NULL),
(467, 22, 'Yauri', NULL),
(468, 22, 'Zuru', NULL),
(469, 23, 'Adavi', NULL),
(470, 23, 'Ajaokuta', NULL),
(471, 23, 'Ankpa', NULL),
(472, 23, 'Bassa', NULL),
(473, 23, 'Dekina', NULL),
(474, 23, 'Ibaji', NULL),
(475, 23, 'Idah', NULL),
(476, 23, 'Igalamela Odolu', NULL),
(477, 23, 'Ijumu', NULL),
(478, 23, 'Kabba-Bunu', NULL),
(479, 23, 'Kogi', NULL),
(480, 23, 'Lokoja', NULL),
(481, 23, 'Mopa Muro', NULL),
(482, 23, 'Ofu', NULL),
(483, 23, 'Ogori-Magongo', NULL),
(484, 23, 'Okehi', NULL),
(485, 23, 'Okene', NULL),
(486, 23, 'Olamaboro', NULL),
(487, 23, 'Omala', NULL),
(488, 23, 'Yagba East', NULL),
(489, 23, 'Yagba West', NULL),
(490, 24, 'Asa', NULL),
(491, 24, 'Baruten', NULL),
(492, 24, 'Edu', NULL),
(493, 24, 'Ekiti', NULL),
(494, 24, 'Ifelodun', NULL),
(495, 24, 'Ilorin East', NULL),
(496, 24, 'Ilorin South', NULL),
(497, 24, 'Ilorin West', NULL),
(498, 24, 'Irepodun', NULL),
(499, 24, 'Isin', NULL),
(500, 24, 'Kaiama', NULL),
(501, 24, 'Moro', NULL),
(502, 24, 'Offa', NULL),
(503, 24, 'Oke Ero', NULL),
(504, 24, 'Oyun', NULL),
(505, 24, 'Pategi', NULL),
(506, 25, 'Agege', NULL),
(507, 25, 'Ajeromi-Ifelodun', NULL),
(508, 25, 'Alimosho', NULL),
(509, 25, 'Amuwo-Odofin', NULL),
(510, 25, 'Apapa', NULL),
(511, 25, 'Badagry', NULL),
(512, 25, 'Epe', NULL),
(513, 25, 'Eti Osa', NULL),
(514, 25, 'Ibeju-Lekki', NULL),
(515, 25, 'Ifako-Ijaiye', NULL),
(516, 25, 'Ikeja', NULL),
(517, 25, 'Ikorodu', NULL),
(518, 25, 'Kosofe', NULL),
(519, 25, 'Lagos Island', NULL),
(520, 25, 'Lagos Mainland', NULL),
(521, 25, 'Mushin', NULL),
(522, 25, 'Ojo', NULL),
(523, 25, 'Oshodi-Isolo', NULL),
(524, 25, 'Shomolu', NULL),
(525, 25, 'Surulere', NULL),
(526, 26, 'Akwanga', NULL),
(527, 26, 'Awe', NULL),
(528, 26, 'Doma', NULL),
(529, 26, 'Karu', NULL),
(530, 26, 'Keana', NULL),
(531, 26, 'Keffi', NULL),
(532, 26, 'Kokona', NULL),
(533, 26, 'Lafia', NULL),
(534, 26, 'Nasarawa', NULL),
(535, 26, 'Nasarawa Eggon', NULL),
(536, 26, 'Obi', NULL),
(537, 26, 'Toto', NULL),
(538, 26, 'Wamba', NULL),
(539, 27, 'Agaie', NULL),
(540, 27, 'Agwara', NULL),
(541, 27, 'Bida', NULL),
(542, 27, 'Borgu', NULL),
(543, 27, 'Bosso', NULL),
(544, 27, 'Chanchaga', NULL),
(545, 27, 'Edati', NULL),
(546, 27, 'Gbako', NULL),
(547, 27, 'Gurara', NULL),
(548, 27, 'Katcha', NULL),
(549, 27, 'Kontagora', NULL),
(550, 27, 'Lapai', NULL),
(551, 27, 'Lavun', NULL),
(552, 27, 'Magama', NULL),
(553, 27, 'Mariga', NULL),
(554, 27, 'Mashegu', NULL),
(555, 27, 'Mokwa', NULL),
(556, 27, 'Munya', NULL),
(557, 27, 'Paikoro', NULL),
(558, 27, 'Rafi', NULL),
(559, 27, 'Rijau', NULL),
(560, 27, 'Shiroro', NULL),
(561, 27, 'Suleja', NULL),
(562, 27, 'Tafa', NULL),
(563, 27, 'Wushishi', NULL),
(564, 28, 'Abeokuta North', NULL),
(565, 28, 'Abeokuta South', NULL),
(566, 28, 'Ado Odo-Ota', NULL),
(567, 28, 'Ewekoro', NULL),
(568, 28, 'Ifo', NULL),
(569, 28, 'Ijebu East', NULL),
(570, 28, 'Ijebu North', NULL),
(571, 28, 'Ijebu North East', NULL),
(572, 28, 'Ijebu Ode', NULL),
(573, 28, 'Ikenne', NULL),
(574, 28, 'Imeko Afon', NULL),
(575, 28, 'Ipokia', NULL),
(576, 28, 'Obafemi Owode', NULL),
(577, 28, 'Odeda', NULL),
(578, 28, 'Odogbolu', NULL),
(579, 28, 'Ogun Waterside', NULL),
(580, 28, 'Remo North', NULL),
(581, 28, 'Sagamu', NULL),
(582, 28, 'Yewa North', NULL),
(583, 28, 'Yewa South', NULL),
(584, 29, 'Akoko North East', NULL),
(585, 29, 'Akoko North West', NULL),
(586, 29, 'Akoko South East', NULL),
(587, 29, 'Akoko South West', NULL),
(588, 29, 'Akure North', NULL),
(589, 29, 'Akure South', NULL),
(590, 29, 'Ese Odo', NULL),
(591, 29, 'Idanre', NULL),
(592, 29, 'Ifedore', NULL),
(593, 29, 'Ilaje', NULL),
(594, 29, 'Ile-Oluji-Okeigbo', NULL),
(595, 29, 'Irele', NULL),
(596, 29, 'Odigbo', NULL),
(597, 29, 'Okitipupa', NULL),
(598, 29, 'Ondo East', NULL),
(599, 29, 'Ondo West', NULL),
(600, 29, 'Ose', NULL),
(601, 29, 'Owo', NULL),
(602, 30, 'Aiyedaade', NULL),
(603, 30, 'Aiyedire', NULL),
(604, 30, 'Atakunmosa East', NULL),
(605, 30, 'Atakunmosa West', NULL),
(606, 30, 'Boluwaduro', NULL),
(607, 30, 'Boripe', NULL),
(608, 30, 'Ede North', NULL),
(609, 30, 'Ede South', NULL),
(610, 30, 'Egbedore', NULL),
(611, 30, 'Ejigbo', NULL),
(612, 30, 'Ife Central', NULL),
(613, 30, 'Ife East', NULL),
(614, 30, 'Ife North', NULL),
(615, 30, 'Ife South', NULL),
(616, 30, 'Ifedayo', NULL),
(617, 30, 'Ifelodun', NULL),
(618, 30, 'Ila', NULL),
(619, 30, 'Ilesa East', NULL),
(620, 30, 'Ilesa West', NULL),
(621, 30, 'Irepodun', NULL),
(622, 30, 'Irewole', NULL),
(623, 30, 'Isokan', NULL),
(624, 30, 'Iwo', NULL),
(625, 30, 'Obokun', NULL),
(626, 30, 'Odo-Otin', NULL),
(627, 30, 'Ola-Oluwa', NULL),
(628, 30, 'Olorunda', NULL),
(629, 30, 'Oriade', NULL),
(630, 30, 'Orolu', NULL),
(631, 30, 'Osogbo', NULL),
(632, 31, 'Afijio', NULL),
(633, 31, 'Akinyele', NULL),
(634, 31, 'Atiba', NULL),
(635, 31, 'Atisbo', NULL),
(636, 31, 'Egbeda', NULL),
(637, 31, 'Ibadan North', NULL),
(638, 31, 'Ibadan North East', NULL),
(639, 31, 'Ibadan North West', NULL),
(640, 31, 'Ibadan South East', NULL),
(641, 31, 'Ibadan South West', NULL),
(642, 31, 'Ibarapa Central', NULL),
(643, 31, 'Ibarapa East', NULL),
(644, 31, 'Ibarapa North', NULL),
(645, 31, 'Ido', NULL),
(646, 31, 'Irepo', NULL),
(647, 31, 'Iseyin', NULL),
(648, 31, 'Itesiwaju', NULL),
(649, 31, 'Iwajowa', NULL),
(650, 31, 'Kajola', NULL),
(651, 31, 'Lagelu', NULL),
(652, 31, 'Ogbomoso North', NULL),
(653, 31, 'Ogbomoso South', NULL),
(654, 31, 'Ogo Oluwa', NULL),
(655, 31, 'Olorunsogo', NULL),
(656, 31, 'Oluyole', NULL),
(657, 31, 'Ona Ara', NULL),
(658, 31, 'Oorelope', NULL),
(659, 31, 'Ori Ire', NULL),
(660, 31, 'Oyo East', NULL),
(661, 31, 'Oyo West', NULL),
(662, 31, 'Saki East', NULL),
(663, 31, 'Saki West', NULL),
(664, 31, 'Surulere', NULL),
(665, 32, 'Barkin Ladi', NULL),
(666, 32, 'Bassa', NULL),
(667, 32, 'Bokkos', NULL),
(668, 32, 'Jos East', NULL),
(669, 32, 'Jos North', NULL),
(670, 32, 'Jos South', NULL),
(671, 32, 'Kanam', NULL),
(672, 32, 'Kanke', NULL),
(673, 32, 'Langtang North', NULL),
(674, 32, 'Langtang South', NULL),
(675, 32, 'Mangu', NULL),
(676, 32, 'Mikang', NULL),
(677, 32, 'Pankshin', NULL),
(678, 32, 'Qua\'An Pan', NULL),
(679, 32, 'Riyom', NULL),
(680, 32, 'Shendam', NULL),
(681, 32, 'Wase', NULL),
(682, 33, 'Abua-Odual', NULL),
(683, 33, 'Ahoada East', NULL),
(684, 33, 'Ahoada West', NULL),
(685, 33, 'Akuku Toru', NULL),
(686, 33, 'Andoni', NULL),
(687, 33, 'Asari Toru', NULL),
(688, 33, 'Bonny', NULL),
(689, 33, 'Degema', NULL),
(690, 33, 'Eleme', NULL),
(691, 33, 'Emuoha', NULL),
(692, 33, 'Etche', NULL),
(693, 33, 'Gokana', NULL),
(694, 33, 'Ikwerre', NULL),
(695, 33, 'Khana', NULL),
(696, 33, 'Obio-Akpor', NULL),
(697, 33, 'Ogba-Egbema-Ndoni', NULL),
(698, 33, 'Ogu-Bolo', NULL),
(699, 33, 'Okrika', NULL),
(700, 33, 'Omuma', NULL),
(701, 33, 'Opobo-Nkoro', NULL),
(702, 33, 'Oyigbo', NULL),
(703, 33, 'Port Harcourt', NULL),
(704, 33, 'Tai', NULL),
(705, 34, 'Binji', NULL),
(706, 34, 'Bodinga', NULL),
(707, 34, 'Dange Shuni', NULL),
(708, 34, 'Gada', NULL),
(709, 34, 'Goronyo', NULL),
(710, 34, 'Gudu', NULL),
(711, 34, 'Gwadabawa', NULL),
(712, 34, 'Illela', NULL),
(713, 34, 'Isa', NULL),
(714, 34, 'Kebbe', NULL),
(715, 34, 'Kware', NULL),
(716, 34, 'Rabah', NULL),
(717, 34, 'Sabon Birni', NULL),
(718, 34, 'Shagari', NULL),
(719, 34, 'Silame', NULL),
(720, 34, 'Sokoto North', NULL),
(721, 34, 'Sokoto South', NULL),
(722, 34, 'Tambuwal', NULL),
(723, 34, 'Tangaza', NULL),
(724, 34, 'Tureta', NULL),
(725, 34, 'Wamakko', NULL),
(726, 34, 'Wurno', NULL),
(727, 34, 'Yabo', NULL),
(728, 35, 'Ardo Kola', NULL),
(729, 35, 'Bali', NULL),
(730, 35, 'Donga', NULL),
(731, 35, 'Gashaka', NULL),
(732, 35, 'Gassol', NULL),
(733, 35, 'Ibi', NULL),
(734, 35, 'Jalingo', NULL),
(735, 35, 'Karim Lamido', NULL),
(736, 35, 'Kurmi', NULL),
(737, 35, 'Lau', NULL),
(738, 35, 'Sardauna', NULL),
(739, 35, 'Takum', NULL),
(740, 35, 'Ussa', NULL),
(741, 35, 'Wukari', NULL),
(742, 35, 'Yorro', NULL),
(743, 35, 'Zing', NULL),
(744, 36, 'Bade', NULL),
(745, 36, 'Bursari', NULL),
(746, 36, 'Damaturu', NULL),
(747, 36, 'Fika', NULL),
(748, 36, 'Fune', NULL),
(749, 36, 'Geidam', NULL),
(750, 36, 'Gujba', NULL),
(751, 36, 'Gulani', NULL),
(752, 36, 'Jakusko', NULL),
(753, 36, 'Karasuwa', NULL),
(754, 36, 'Machina', NULL),
(755, 36, 'Nangere', NULL),
(756, 36, 'Nguru', NULL),
(757, 36, 'Potiskum', NULL),
(758, 36, 'Tarmuwa', NULL),
(759, 36, 'Yunusari', NULL),
(760, 36, 'Yusufari', NULL),
(761, 37, 'Anka', NULL),
(762, 37, 'Bakura', NULL),
(763, 37, 'Birnin Magaji', NULL),
(764, 37, 'Bukkuyum', NULL),
(765, 37, 'Bungudu', NULL),
(766, 37, 'Gummi', NULL),
(767, 37, 'Gusau', NULL),
(768, 37, 'Kaura Namoda', NULL),
(769, 37, 'Maradun', NULL),
(770, 37, 'Maru', NULL),
(771, 37, 'Shinkafi', NULL),
(772, 37, 'Talata Mafara', NULL),
(773, 37, 'Tsafe', NULL),
(774, 37, 'Zurmi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_program`
--

CREATE TABLE `ms_program` (
  `programid` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `label` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_program`
--

INSERT INTO `ms_program` (`programid`, `program`, `label`) VALUES
(1, 'CCT', 'cct'),
(2, 'GEEP', 'geep'),
(3, 'NHGSFP', 'nhgsfp'),
(4, 'N-Power', 'npower');

-- --------------------------------------------------------

--
-- Table structure for table `ms_region`
--

CREATE TABLE `ms_region` (
  `regionid` int(11) NOT NULL,
  `region` varchar(45) NOT NULL,
  `note` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_region`
--

INSERT INTO `ms_region` (`regionid`, `region`, `note`) VALUES
(1, 'North Central', NULL),
(2, 'North East', NULL),
(3, 'North West', NULL),
(4, 'South East', NULL),
(5, 'South South', NULL),
(6, 'South West', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_state`
--

CREATE TABLE `ms_state` (
  `StateId` int(11) NOT NULL,
  `RegionId` int(11) DEFAULT NULL,
  `Fullname` varchar(20) NOT NULL,
  `Label` varchar(3) DEFAULT NULL,
  `Zone` varchar(30) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_state`
--

INSERT INTO `ms_state` (`StateId`, `RegionId`, `Fullname`, `Label`, `Zone`, `Description`) VALUES
(1, 4, 'ABIA', 'AB', 'South East', NULL),
(2, 2, 'ADAMAWA', 'AD', 'North East', NULL),
(3, 5, 'AKWA IBOM', 'AK', 'South South', NULL),
(4, 4, 'ANAMBRA', 'AN', 'South East', NULL),
(5, 2, 'BAUCHI', 'BA', 'North East', NULL),
(6, 5, 'BAYELSA', 'BY', 'South South', NULL),
(7, 1, 'BENUE', 'BE', 'North Central', NULL),
(8, 2, 'BORNO', 'BO', 'North East', NULL),
(9, 5, 'CROSS RIVER', 'CR', 'South South', NULL),
(10, 5, 'DELTA', 'DE', 'South South', NULL),
(11, 4, 'EBONYI', 'EB', 'South East', NULL),
(12, 5, 'EDO', 'ED', 'South South', NULL),
(13, 6, 'EKITI', 'EK', 'South West', NULL),
(14, 4, 'ENUGU', 'EN', 'South East', NULL),
(15, 1, 'FCT', 'FC', 'North Central', NULL),
(16, 2, 'GOMBE', 'GO', 'North East', NULL),
(17, 4, 'IMO', 'IM', 'South East', NULL),
(18, 3, 'JIGAWA', 'JI', 'North West', NULL),
(19, 3, 'KADUNA', 'KD', 'North West', NULL),
(20, 3, 'KANO', 'KN', 'North West', NULL),
(21, 3, 'KATSINA', 'KT', 'North West', NULL),
(22, 3, 'KEBBI', 'KE', 'North West', NULL),
(23, 1, 'KOGI', 'KO', 'North Central', NULL),
(24, 1, 'KWARA', 'KW', 'North Central', NULL),
(25, 6, 'LAGOS', 'LA', 'South West', NULL),
(26, 1, 'NASARAWA', 'NA', 'North Central', NULL),
(27, 1, 'NIGER', 'NI', 'North Central', NULL),
(28, 6, 'OGUN', 'OG', 'South West', NULL),
(29, 6, 'ONDO', 'ON', 'South West', NULL),
(30, 6, 'OSUN', 'OS', 'South West', NULL),
(31, 6, 'OYO', 'OY', 'South West', NULL),
(32, 1, 'PLATEAU', 'PL', 'North Central', NULL),
(33, 5, 'RIVERS', 'RI', 'South South', NULL),
(34, 3, 'SOKOTO', 'SO', 'North West', NULL),
(35, 2, 'TARABA', 'TA', 'North East', NULL),
(36, 2, 'YOBE', 'YO', 'North East', NULL),
(37, 3, 'ZAMFARA', 'ZA', 'North West', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `npo_ms_beneficiary`
--

CREATE TABLE `npo_ms_beneficiary` (
  `beneficiaryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `lgaid` int(11) NOT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `first` varchar(45) DEFAULT NULL,
  `middle` varchar(45) DEFAULT NULL,
  `last` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `enrolment_date` date DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `reason for exit` varchar(255) DEFAULT NULL,
  `batch` varchar(45) DEFAULT NULL,
  `npower_id` varchar(50) DEFAULT NULL,
  `primary_assignment` varchar(255) DEFAULT NULL,
  `gps` varchar(100) DEFAULT NULL,
  `program_type` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `level_of_education` varchar(45) DEFAULT NULL,
  `is_graduate` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `npo_ms_period`
--

CREATE TABLE `npo_ms_period` (
  `periodid` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `npo_ms_period`
--

INSERT INTO `npo_ms_period` (`periodid`, `fullname`, `priority`, `start_date`, `end_date`, `active`) VALUES
(1, 'January 2021', 1, '2021-01-01', '2021-01-31', 1),
(2, 'February 2021', 2, '2021-02-01', '2021-02-28', 1),
(3, 'March 2021', 3, '2021-03-01', '2021-03-31', 1),
(4, 'April 2021', 4, '2021-04-01', '2021-04-30', 1),
(5, 'May 2021', 5, '2021-05-01', '2021-05-31', 1),
(6, 'June 2021', 6, '2021-06-01', '2021-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `npo_tr_core`
--

CREATE TABLE `npo_tr_core` (
  `id` int(11) NOT NULL,
  `beneficiaryid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `collected_date` date NOT NULL,
  `has_received_stipend` smallint(6) DEFAULT NULL,
  `work_days_inperiod` int(11) DEFAULT NULL,
  `total_work_days` int(11) DEFAULT NULL,
  `absent_reason` varchar(255) DEFAULT NULL,
  `has_gained_skill` smallint(6) DEFAULT NULL,
  `has_commence_trade` smallint(6) DEFAULT NULL,
  `plan_after` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sfp_ms_beneficiary`
--

CREATE TABLE `sfp_ms_beneficiary` (
  `beneficiaryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `lgaid` int(11) NOT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gps` varchar(100) DEFAULT NULL,
  `no_of_classes` int(11) DEFAULT NULL,
  `head_teacher` varchar(45) DEFAULT NULL,
  `head_phone` varchar(45) DEFAULT NULL,
  `cook_name` varchar(45) DEFAULT NULL,
  `cook_phone` varchar(45) DEFAULT NULL,
  `cook_start` date DEFAULT NULL,
  `cook_exit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sfp_ms_period`
--

CREATE TABLE `sfp_ms_period` (
  `periodid` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `priority` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sfp_ms_period`
--

INSERT INTO `sfp_ms_period` (`periodid`, `fullname`, `priority`, `start_date`, `end_date`, `active`) VALUES
(1, '2021 Week 1', 1, '2021-03-01', '2021-03-05', 1),
(2, '2021 Week 2', 2, '2021-03-08', '2021-03-12', 1),
(3, '2021 Week 3', 3, '2021-03-15', '2021-03-19', 1),
(4, '2021 Week 4', 4, '2021-03-22', '2021-03-26', 1),
(5, '2021 Week 5', 5, '2021-03-29', '2021-04-02', 1),
(6, '2021 Week 6', 6, '2021-04-05', '2021-04-09', 1),
(7, '2021 Week 7', 7, '2021-04-12', '2021-04-16', 1),
(8, '2021 Week 8', 8, '2021-04-19', '2021-04-23', 1),
(9, '2021 Week 9', 9, '2021-04-26', '2021-04-30', 1),
(10, '2021 Week 10', 10, '2021-05-03', '2021-05-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sfp_tr_core`
--

CREATE TABLE `sfp_tr_core` (
  `coreid` int(11) NOT NULL,
  `beneficiaryid` int(11) NOT NULL,
  `periodid` int(11) NOT NULL,
  `gps` varchar(200) NOT NULL,
  `collected_date` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `class_feed_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sfp_tr_periodic`
--

CREATE TABLE `sfp_tr_periodic` (
  `id` int(11) NOT NULL,
  `coreid` int(11) NOT NULL,
  `daily` date DEFAULT NULL,
  `is_feeding` smallint(6) NOT NULL,
  `no_of_pupil` int(11) NOT NULL,
  `food_type` varchar(255) DEFAULT NULL,
  `food_quality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_module_list`
--

CREATE TABLE `sys_module_list` (
  `id` int(11) NOT NULL,
  `module` varchar(20) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_module_list`
--

INSERT INTO `sys_module_list` (`id`, `module`, `label`) VALUES
(1, 'system', 'System Admin'),
(2, 'users', 'User Admin'),
(3, 'date', 'Data Entry'),
(4, 'reporting', 'Reporting'),
(5, 'dashboard', 'Dasboard'),
(6, 'alert', 'Alert/Monitoring');

-- --------------------------------------------------------

--
-- Table structure for table `sys_program_list`
--

CREATE TABLE `sys_program_list` (
  `id` int(11) NOT NULL,
  `program` varchar(50) DEFAULT NULL,
  `Label` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_activity`
--

CREATE TABLE `sys_user_activity` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `activity` varchar(45) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_info`
--

CREATE TABLE `sys_user_info` (
  `userid` int(11) NOT NULL,
  `sid` varchar(60) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `first` varchar(45) DEFAULT NULL,
  `last` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_info`
--

INSERT INTO `sys_user_info` (`userid`, `sid`, `loginid`, `first`, `last`, `phone`, `email`, `pwd`, `hash`, `active`, `created`, `updated`) VALUES
(1, 'w3gp9-7coxt-gurci-u5x0y-s4zvk', 'fc-001-1234', 'Kolajo', 'Adeyinka', '08011223344', 'kolajo@live.com', '$2y$10$CNyx380MBALq/BXnyWBrTOCues.U44UD.UkF/D0BEPwpCkT6geHzK', 'af614c96e60003f126f529d71542e3d4', 1, '2021-03-03 13:36:05', '2021-03-24 13:38:20'),
(2, '2eqc9-i5h50-d0a93-89con-stgcs', 'ab-001-0002', 'System ', 'Sample', '08099999999', NULL, '$2y$10$VIhVfilUoaW7tNBGNDkNNeOufTb.lKjjhEmZrwykVlUlR1oEnvOMS', '5e8ff9bf55ba3508199d22e984129be6', 1, '2021-03-28 15:13:04', '2021-03-28 16:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_privilege`
--

CREATE TABLE `sys_user_privilege` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `lga` varchar(45) DEFAULT NULL,
  `program` varchar(45) DEFAULT NULL,
  `module` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `category_privilege` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_privilege`
--

INSERT INTO `sys_user_privilege` (`id`, `userid`, `state`, `lga`, `program`, `module`, `category`, `category_privilege`) VALUES
(1, 1, 'admin', 'admin', 'admin', 'admin', 'admin', NULL),
(2, 2, 'abia', 'Aba North, Aba South, Arochukwu', 'cct, geep, nhgsfp, npower', 'data, reporting', 'Data Consultant', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cct_ms_beneficiary`
--
ALTER TABLE `cct_ms_beneficiary`
  ADD PRIMARY KEY (`beneficiaryid`);

--
-- Indexes for table `cct_ms_period`
--
ALTER TABLE `cct_ms_period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indexes for table `cct_tr_core`
--
ALTER TABLE `cct_tr_core`
  ADD PRIMARY KEY (`id`,`beneficiaryid`);

--
-- Indexes for table `cct_tr_periodic`
--
ALTER TABLE `cct_tr_periodic`
  ADD PRIMARY KEY (`id`,`beneficiaryid`);

--
-- Indexes for table `gee_ms_beneficiary`
--
ALTER TABLE `gee_ms_beneficiary`
  ADD PRIMARY KEY (`beneficiaryid`);

--
-- Indexes for table `gee_ms_period`
--
ALTER TABLE `gee_ms_period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indexes for table `gee_tr_core`
--
ALTER TABLE `gee_tr_core`
  ADD PRIMARY KEY (`id`,`beneficiaryid`,`periodid`);

--
-- Indexes for table `ms_lga`
--
ALTER TABLE `ms_lga`
  ADD PRIMARY KEY (`LgaId`) USING BTREE,
  ADD KEY `mslga_Fullname` (`Fullname`) USING BTREE,
  ADD KEY `StateId` (`StateId`) USING BTREE;

--
-- Indexes for table `ms_program`
--
ALTER TABLE `ms_program`
  ADD PRIMARY KEY (`programid`);

--
-- Indexes for table `ms_region`
--
ALTER TABLE `ms_region`
  ADD PRIMARY KEY (`regionid`);

--
-- Indexes for table `ms_state`
--
ALTER TABLE `ms_state`
  ADD PRIMARY KEY (`StateId`) USING BTREE,
  ADD KEY `msstate_Fullname` (`Fullname`) USING BTREE;

--
-- Indexes for table `npo_ms_beneficiary`
--
ALTER TABLE `npo_ms_beneficiary`
  ADD PRIMARY KEY (`beneficiaryid`);

--
-- Indexes for table `npo_ms_period`
--
ALTER TABLE `npo_ms_period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indexes for table `npo_tr_core`
--
ALTER TABLE `npo_tr_core`
  ADD PRIMARY KEY (`id`,`beneficiaryid`,`periodid`);

--
-- Indexes for table `sfp_ms_beneficiary`
--
ALTER TABLE `sfp_ms_beneficiary`
  ADD PRIMARY KEY (`beneficiaryid`);

--
-- Indexes for table `sfp_ms_period`
--
ALTER TABLE `sfp_ms_period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indexes for table `sfp_tr_core`
--
ALTER TABLE `sfp_tr_core`
  ADD PRIMARY KEY (`coreid`,`beneficiaryid`,`periodid`);

--
-- Indexes for table `sfp_tr_periodic`
--
ALTER TABLE `sfp_tr_periodic`
  ADD PRIMARY KEY (`id`,`coreid`);

--
-- Indexes for table `sys_module_list`
--
ALTER TABLE `sys_module_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_program_list`
--
ALTER TABLE `sys_program_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user_activity`
--
ALTER TABLE `sys_user_activity`
  ADD PRIMARY KEY (`id`,`userid`);

--
-- Indexes for table `sys_user_info`
--
ALTER TABLE `sys_user_info`
  ADD PRIMARY KEY (`userid`,`sid`);

--
-- Indexes for table `sys_user_privilege`
--
ALTER TABLE `sys_user_privilege`
  ADD PRIMARY KEY (`id`,`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cct_ms_beneficiary`
--
ALTER TABLE `cct_ms_beneficiary`
  MODIFY `beneficiaryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cct_ms_period`
--
ALTER TABLE `cct_ms_period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cct_tr_core`
--
ALTER TABLE `cct_tr_core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cct_tr_periodic`
--
ALTER TABLE `cct_tr_periodic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gee_ms_beneficiary`
--
ALTER TABLE `gee_ms_beneficiary`
  MODIFY `beneficiaryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gee_ms_period`
--
ALTER TABLE `gee_ms_period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gee_tr_core`
--
ALTER TABLE `gee_tr_core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_lga`
--
ALTER TABLE `ms_lga`
  MODIFY `LgaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `ms_program`
--
ALTER TABLE `ms_program`
  MODIFY `programid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ms_region`
--
ALTER TABLE `ms_region`
  MODIFY `regionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_state`
--
ALTER TABLE `ms_state`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `npo_ms_beneficiary`
--
ALTER TABLE `npo_ms_beneficiary`
  MODIFY `beneficiaryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `npo_ms_period`
--
ALTER TABLE `npo_ms_period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `npo_tr_core`
--
ALTER TABLE `npo_tr_core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sfp_ms_beneficiary`
--
ALTER TABLE `sfp_ms_beneficiary`
  MODIFY `beneficiaryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sfp_ms_period`
--
ALTER TABLE `sfp_ms_period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sfp_tr_core`
--
ALTER TABLE `sfp_tr_core`
  MODIFY `coreid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sfp_tr_periodic`
--
ALTER TABLE `sfp_tr_periodic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_module_list`
--
ALTER TABLE `sys_module_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_program_list`
--
ALTER TABLE `sys_program_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_user_activity`
--
ALTER TABLE `sys_user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_user_info`
--
ALTER TABLE `sys_user_info`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_user_privilege`
--
ALTER TABLE `sys_user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
