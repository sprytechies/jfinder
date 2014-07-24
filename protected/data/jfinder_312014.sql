-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2014 at 12:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jfinder`
--
CREATE DATABASE IF NOT EXISTS `jfinder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jfinder`;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `idcities` int(11) NOT NULL AUTO_INCREMENT,
  `idcountries` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `latitude` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `longitude` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idcities`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `idcompanies` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `description` text,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(1028) DEFAULT NULL,
  `pin` int(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `person` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idcompanies`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_meta`
--

CREATE TABLE IF NOT EXISTS `company_meta` (
  `idcompanymeta` int(11) NOT NULL AUTO_INCREMENT,
  `idcompany` int(11) NOT NULL,
  `meta_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `meta_value` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idcompanymeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

CREATE TABLE IF NOT EXISTS `company_users` (
  `idcompany_users` int(11) NOT NULL,
  `idcompanies` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcompany_users`),
  KEY `idcompanies` (`idcompanies`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `idcountries` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `iso` varchar(4) NOT NULL,
  PRIMARY KEY (`idcountries`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`idcountries`, `name`, `iso`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Bouvet Island', 'BV'),
(30, 'Brazil', 'BR'),
(31, 'British Antarctic Territory', 'BQ'),
(32, 'British Indian Ocean Territory', 'IO'),
(33, 'British Virgin Islands', 'VG'),
(34, 'Brunei', 'BN'),
(35, 'Bulgaria', 'BG'),
(36, 'Burkina Faso', 'BF'),
(37, 'Burundi', 'BI'),
(38, 'Cambodia', 'KH'),
(39, 'Cameroon', 'CM'),
(40, 'Canada', 'CA'),
(41, 'Canton and Enderbury Islands', 'CT'),
(42, 'Cape Verde', 'CV'),
(43, 'Cayman Islands', 'KY'),
(44, 'Central African Republic', 'CF'),
(45, 'Chad', 'TD'),
(46, 'Chile', 'CL'),
(47, 'China', 'CN'),
(48, 'Christmas Island', 'CX'),
(49, 'Cocos Islands', 'CC'),
(50, 'Colombia', 'CO'),
(51, 'Comoros', 'KM'),
(52, 'Congo - Brazzaville', 'CG'),
(53, 'Congo - Kinshasa', 'CD'),
(54, 'Cook Islands', 'CK'),
(55, 'Costa Rica', 'CR'),
(56, 'Croatia', 'HR'),
(57, 'Cuba', 'CU'),
(58, 'Cyprus', 'CY'),
(59, 'Czech Republic', 'CZ'),
(60, 'Côte d’Ivoire', 'CI'),
(61, 'Denmark', 'DK'),
(62, 'Djibouti', 'DJ'),
(63, 'Dominica', 'DM'),
(64, 'Dominican Republic', 'DO'),
(65, 'Dronning Maud Land', 'NQ'),
(66, 'East Germany', 'DD'),
(67, 'Ecuador', 'EC'),
(68, 'Egypt', 'EG'),
(69, 'El Salvador', 'SV'),
(70, 'Equatorial Guinea', 'GQ'),
(71, 'Eritrea', 'ER'),
(72, 'Estonia', 'EE'),
(73, 'Ethiopia', 'ET'),
(74, 'Falkland Islands', 'FK'),
(75, 'Faroe Islands', 'FO'),
(76, 'Fiji', 'FJ'),
(77, 'Finland', 'FI'),
(78, 'France', 'FR'),
(79, 'French Guiana', 'GF'),
(80, 'French Polynesia', 'PF'),
(81, 'French Southern Territories', 'TF'),
(82, 'Gabon', 'GA'),
(83, 'Gambia', 'GM'),
(84, 'Georgia', 'GE'),
(85, 'Germany', 'DE'),
(86, 'Ghana', 'GH'),
(87, 'Gibraltar', 'GI'),
(88, 'Greece', 'GR'),
(89, 'Greenland', 'GL'),
(90, 'Grenada', 'GD'),
(91, 'Guadeloupe', 'GP'),
(92, 'Guam', 'GU'),
(93, 'Guatemala', 'GT'),
(94, 'Guernsey', 'GG'),
(95, 'Guinea', 'GN'),
(96, 'Guinea-Bissau', 'GW'),
(97, 'Guyana', 'GY'),
(98, 'Haiti', 'HT'),
(99, 'Honduras', 'HN'),
(100, 'Hong Kong SAR China', 'HK'),
(101, 'Hungary', 'HU'),
(102, 'Iceland', 'IS'),
(103, 'India', 'IN'),
(104, 'Indonesia', 'ID'),
(105, 'Iran', 'IR'),
(106, 'Iraq', 'IQ'),
(107, 'Ireland', 'IE'),
(108, 'Isle of Man', 'IM'),
(109, 'Israel', 'IL'),
(110, 'Italy', 'IT'),
(111, 'Jamaica', 'JM'),
(112, 'Japan', 'JP'),
(113, 'Jersey', 'JE'),
(114, 'Johnston Island', 'JT'),
(115, 'Jordan', 'JO'),
(116, 'Kazakhstan', 'KZ'),
(117, 'Kenya', 'KE'),
(118, 'Kiribati', 'KI'),
(119, 'Kuwait', 'KW'),
(120, 'Kyrgyzstan', 'KG'),
(121, 'Laos', 'LA'),
(122, 'Latvia', 'LV'),
(123, 'Lebanon', 'LB'),
(124, 'Lesotho', 'LS'),
(125, 'Liberia', 'LR'),
(126, 'Libya', 'LY'),
(127, 'Liechtenstein', 'LI'),
(128, 'Lithuania', 'LT'),
(129, 'Luxembourg', 'LU'),
(130, 'Macau SAR China', 'MO'),
(131, 'Macedonia', 'MK'),
(132, 'Madagascar', 'MG'),
(133, 'Malawi', 'MW'),
(134, 'Malaysia', 'MY'),
(135, 'Maldives', 'MV'),
(136, 'Mali', 'ML'),
(137, 'Malta', 'MT'),
(138, 'Marshall Islands', 'MH'),
(139, 'Martinique', 'MQ'),
(140, 'Mauritania', 'MR'),
(141, 'Mauritius', 'MU'),
(142, 'Mayotte', 'YT'),
(143, 'Metropolitan France', 'FX'),
(144, 'Mexico', 'MX'),
(145, 'Micronesia', 'FM'),
(146, 'Midway Islands', 'MI'),
(147, 'Moldova', 'MD'),
(148, 'Monaco', 'MC'),
(149, 'Mongolia', 'MN'),
(150, 'Montenegro', 'ME'),
(151, 'Montserrat', 'MS'),
(152, 'Morocco', 'MA'),
(153, 'Mozambique', 'MZ'),
(154, 'Myanmar', 'MM'),
(155, 'Namibia', 'NA'),
(156, 'Nauru', 'NR'),
(157, 'Nepal', 'NP'),
(158, 'Netherlands', 'NL'),
(159, 'Netherlands Antilles', 'AN'),
(160, 'Neutral Zone', 'NT'),
(161, 'New Caledonia', 'NC'),
(162, 'New Zealand', 'NZ'),
(163, 'Nicaragua', 'NI'),
(164, 'Niger', 'NE'),
(165, 'Nigeria', 'NG'),
(166, 'Niue', 'NU'),
(167, 'Norfolk Island', 'NF'),
(168, 'North Korea', 'KP'),
(169, 'North Vietnam', 'VD'),
(170, 'Northern Mariana Islands', 'MP'),
(171, 'Norway', 'NO'),
(172, 'Oman', 'OM'),
(173, 'Pacific Islands Trust Territory', 'PC'),
(174, 'Pakistan', 'PK'),
(175, 'Palau', 'PW'),
(176, 'Palestinian Territories', 'PS'),
(177, 'Panama', 'PA'),
(178, 'Panama Canal Zone', 'PZ'),
(179, 'Papua New Guinea', 'PG'),
(180, 'Paraguay', 'PY'),
(181, 'Peru', 'PE'),
(182, 'Philippines', 'PH'),
(183, 'Pitcairn Islands', 'PN'),
(184, 'Poland', 'PL'),
(185, 'Portugal', 'PT'),
(186, 'Puerto Rico', 'PR'),
(187, 'Qatar', 'QA'),
(188, 'Romania', 'RO'),
(189, 'Russia', 'RU'),
(190, 'Rwanda', 'RW'),
(191, 'Réunion', 'RE'),
(192, 'Saint Barthélemy', 'BL'),
(193, 'Saint Helena', 'SH'),
(194, 'Saint Kitts and Nevis', 'KN'),
(195, 'Saint Lucia', 'LC'),
(196, 'Saint Martin', 'MF'),
(197, 'Saint Pierre and Miquelon', 'PM'),
(198, 'Saint Vincent and the Grenadines', 'VC'),
(199, 'Samoa', 'WS'),
(200, 'San Marino', 'SM'),
(201, 'Saudi Arabia', 'SA'),
(202, 'Senegal', 'SN'),
(203, 'Serbia', 'RS'),
(204, 'Serbia and Montenegro', 'CS'),
(205, 'Seychelles', 'SC'),
(206, 'Sierra Leone', 'SL'),
(207, 'Singapore', 'SG'),
(208, 'Slovakia', 'SK'),
(209, 'Slovenia', 'SI'),
(210, 'Solomon Islands', 'SB'),
(211, 'Somalia', 'SO'),
(212, 'South Africa', 'ZA'),
(213, 'South Korea', 'KR'),
(214, 'Spain', 'ES'),
(215, 'Sri Lanka', 'LK'),
(216, 'Sudan', 'SD'),
(217, 'Suriname', 'SR'),
(218, 'Svalbard and Jan Mayen', 'SJ'),
(219, 'Swaziland', 'SZ'),
(220, 'Sweden', 'SE'),
(221, 'Switzerland', 'CH'),
(222, 'Syria', 'SY'),
(223, 'Sao Tome and Principe', 'ST'),
(224, 'Taiwan', 'TW'),
(225, 'Tajikistan', 'TJ'),
(226, 'Tanzania', 'TZ'),
(227, 'Thailand', 'TH'),
(228, 'Timor-Leste', 'TL'),
(229, 'Togo', 'TG'),
(230, 'Tokelau', 'TK'),
(231, 'Tonga', 'TO'),
(232, 'Trinidad and Tobago', 'TT'),
(233, 'Tunisia', 'TN'),
(234, 'Turkey', 'TR'),
(235, 'Turkmenistan', 'TM'),
(236, 'Turks and Caicos Islands', 'TC'),
(237, 'Tuvalu', 'TV'),
(238, 'U.S. Minor Outlying Islands', 'UM'),
(239, 'U.S. Virgin Islands', 'VI'),
(240, 'Uganda', 'UG'),
(241, 'Ukraine', 'UA'),
(242, 'United Arab Emirates', 'AE'),
(243, 'United Kingdom', 'GB'),
(244, 'United States', 'US'),
(245, 'Unknown or Invalid Region', 'ZZ'),
(246, 'Uruguay', 'UY'),
(247, 'Uzbekistan', 'UZ'),
(248, 'Vanuatu', 'VU'),
(249, 'Vatican City', 'VA'),
(250, 'Venezuela', 'VE'),
(251, 'Vietnam', 'VN'),
(252, 'Wake Island', 'WK'),
(253, 'Wallis and Futuna', 'WF'),
(254, 'Western Sahara', 'EH'),
(255, 'Yemen', 'YE'),
(256, 'Zambia', 'ZM'),
(257, 'Zimbabwe', 'ZW'),
(258, 'Aland Islands', 'AX');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `idjobs` int(11) NOT NULL,
  `datefrom` timestamp NULL DEFAULT NULL,
  `dateto` timestamp NULL DEFAULT NULL,
  `title` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `type` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `amountfrom` int(16) DEFAULT NULL,
  `amountto` int(16) DEFAULT NULL,
  `keywords` text CHARACTER SET utf8,
  `cdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirmation` int(4) DEFAULT NULL,
  `idcompany` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idjobs`),
  KEY `idcompany` (`idcompany`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE IF NOT EXISTS `jobs_applied` (
  `idjobsapplied` varchar(45) NOT NULL,
  `idjobs` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  `cdate` varchar(45) DEFAULT NULL,
  `mdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idjobsapplied`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_messages`
--

CREATE TABLE IF NOT EXISTS `job_messages` (
  `idjobmessages` int(11) NOT NULL AUTO_INCREMENT,
  `fromto` int(4) NOT NULL COMMENT '1: user to company, 2: company to user',
  `message` text CHARACTER SET utf8 NOT NULL,
  `cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idjobsapplied` int(11) NOT NULL,
  PRIMARY KEY (`idjobmessages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_terms`
--

CREATE TABLE IF NOT EXISTS `job_terms` (
  `idjobterms` int(11) NOT NULL AUTO_INCREMENT,
  `idjobs` int(11) NOT NULL,
  `idterms` int(11) NOT NULL,
  PRIMARY KEY (`idjobterms`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `idmessages` int(11) NOT NULL AUTO_INCREMENT,
  `mfrom` int(11) NOT NULL,
  `mto` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(4) NOT NULL,
  PRIMARY KEY (`idmessages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `search_log`
--

CREATE TABLE IF NOT EXISTS `search_log` (
  `idsearch_log` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) DEFAULT NULL,
  `term` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ipaddress` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(254) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idsearch_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `idterms` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(254) NOT NULL,
  `slug` int(254) DEFAULT NULL,
  `type` int(4) NOT NULL COMMENT '1: category, 2:tag',
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idterms`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `activkey` varchar(128) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `email`, `password`, `cdate`, `mdate`, `activkey`, `type`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cf1fa3059c63a69073c33c8e5a87e479', NULL, 1),
(2, 'mohit', 'mohit.kadel@sprytechies.com', 'd8052f9e09a17e6907629e76bbd261cc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4a848a0d67c5785f6602daedbc123a6d', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_edu`
--

CREATE TABLE IF NOT EXISTS `user_edu` (
  `idworkex` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `completed` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `description` text,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idworkex`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_exp`
--

CREATE TABLE IF NOT EXISTS `user_exp` (
  `idjobs` int(11) NOT NULL,
  `company` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` text,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idjobs`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `idusermeta` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `meta_name` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `meta_value` varchar(2048) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idusermeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_oauth`
--

CREATE TABLE IF NOT EXISTS `user_oauth` (
  `user_id` int(11) NOT NULL,
  `provider` varchar(45) NOT NULL,
  `identifier` varchar(64) NOT NULL,
  `profile_cache` text,
  `session_data` text,
  PRIMARY KEY (`provider`,`identifier`),
  UNIQUE KEY `unic_user_id_name` (`user_id`,`provider`),
  KEY `oauth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `iduser_profile` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(1028) DEFAULT NULL,
  `pin` int(16) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  `websites` varchar(128) DEFAULT NULL,
  `heading` varchar(1028) DEFAULT NULL,
  `keyskills` varchar(1028) DEFAULT NULL,
  `cv` varchar(128) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `idusers` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `idprojects` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `fromtime` timestamp NULL DEFAULT NULL,
  `totime` timestamp NULL DEFAULT NULL,
  `description` text,
  `position` varchar(128) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idprojects`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_users`
--
ALTER TABLE `company_users`
  ADD CONSTRAINT `company_users_ibfk_1` FOREIGN KEY (`idcompanies`) REFERENCES `companies` (`idcompanies`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`idcompany`) REFERENCES `companies` (`idcompanies`);

--
-- Constraints for table `user_edu`
--
ALTER TABLE `user_edu`
  ADD CONSTRAINT `user_edu_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

--
-- Constraints for table `user_exp`
--
ALTER TABLE `user_exp`
  ADD CONSTRAINT `user_exp_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
