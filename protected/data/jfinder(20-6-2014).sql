-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2014 at 02:37 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jfinder`
--

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
  `idcompanies` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`idcompanies`, `name`, `url`, `country`, `description`, `state`, `city`, `address`, `pin`, `phone`, `person`) VALUES
(2, 'spry', 'sprytechies.com', 'India', 'I Love cricket and musics', 'rajasthan', 'jaipur', 'gandhi path', 302021, '9876543210', 'Arvind Sharma'),
(4, 'sprytechies', 'www.sprytechies.com', 'india', 'jaipur based company ', 'rajasthan', 'jaipur', 'vaishali nagar, jaipur ', 302021, '9887384408', 'Arvind sharma'),
(7, 'deep_soft pvt ltd', 'deep.com', 'india', 'the innovative company', 'rajsthan', 'kishangarh', 'kishangarh', 301543, '123456789', 'Deependra singh');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_meta`
--

INSERT INTO `company_meta` (`idcompanymeta`, `idcompany`, `meta_name`, `meta_value`) VALUES
(1, 7, 'spry', 'four teams works'),
(2, 2, 'good', '50 teams are working');

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

CREATE TABLE IF NOT EXISTS `company_users` (
  `idcompany_users` int(11) NOT NULL AUTO_INCREMENT,
  `idcompanies` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcompany_users`),
  KEY `idcompanies` (`idcompanies`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `company_users`
--

INSERT INTO `company_users` (`idcompany_users`, `idcompanies`, `idusers`) VALUES
(2, 2, 13),
(4, 2, 15),
(5, 2, 32),
(6, 4, 17),
(9, 7, 22),
(10, 7, 36),
(11, 2, 37),
(12, 4, 38);

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
  `idjobs` int(11) NOT NULL AUTO_INCREMENT,
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
  `location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idjobs`),
  KEY `idcompany` (`idcompany`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`idjobs`, `datefrom`, `dateto`, `title`, `description`, `type`, `amountfrom`, `amountto`, `keywords`, `cdate`, `mdate`, `confirmation`, `idcompany`, `location`) VALUES
(9, '2014-05-23 06:20:08', '2014-06-03 18:30:00', 'php developer', 'we need php developer fresher', '0', 10000, 20000, '1', '2014-05-22 18:30:00', '2014-06-12 06:06:40', 0, 4, 'jaipur'),
(10, '2014-05-22 18:30:00', '2014-05-29 18:30:00', 'software  developer', ' we need software developer in urgent', '0', 10000, 20000, '1', '2014-05-23 07:19:07', '0000-00-00 00:00:00', NULL, 7, 'kishangarh'),
(11, '2014-05-22 18:30:00', '2014-05-23 18:30:00', 'marketing manager', 'we need marketing manager', '0', 5000, 6000, 'marketing manager', '2014-05-23 07:20:59', '0000-00-00 00:00:00', NULL, 7, 'jaipur'),
(12, '2014-05-26 07:11:20', '2014-05-26 07:11:20', 'android developer', 'we are looking for good android developer', '1', 10000, 20000, 'computer engineer', '2014-05-25 18:30:00', '2014-05-29 18:30:00', 0, 4, 'jaipur'),
(13, '2014-06-11 18:30:00', '2014-06-19 18:30:00', 'software  developer', 'requires new talent', '0', 10000, 25000, '2', '2014-06-12 05:54:14', '0000-00-00 00:00:00', NULL, 7, 'jaipur');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE IF NOT EXISTS `jobs_applied` (
  `idjobsapplied` int(11) NOT NULL AUTO_INCREMENT,
  `idjobs` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `cdate` varchar(45) DEFAULT NULL,
  `mdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idjobsapplied`),
  KEY `idjobs` (`idjobs`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`idjobsapplied`, `idjobs`, `idusers`, `cdate`, `mdate`) VALUES
(7, 9, 43, '2014-05-23 11:50:42', '1400826042'),
(8, 10, 20, '2014-05-26 09:27:19', '1401076639'),
(37, 11, 20, '2014-05-26 16:45:41', '1401102941'),
(38, 9, 40, '2014-06-10 10:37:23', '1402376843'),
(39, 10, 40, '2014-06-10 10:37:28', '1402376848'),
(40, 11, 40, '2014-06-10 10:37:31', '1402376851'),
(41, 12, 40, '2014-06-10 10:37:56', '1402376876'),
(42, 9, 41, '2014-06-10 10:40:53', '1402377053'),
(43, 10, 41, '2014-06-10 10:40:55', '1402377055'),
(44, 9, 42, '2014-06-10 10:41:27', '1402377087'),
(45, 10, 42, '2014-06-9 10:41:30', '1402377090'),
(46, 9, 43, '2014-06-10 10:41:59', '1402377119'),
(47, 10, 43, '2014-06-10 10:42:02', '1402377122'),
(48, 13, 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_saved`
--

CREATE TABLE IF NOT EXISTS `jobs_saved` (
  `idsavedjob` int(11) NOT NULL AUTO_INCREMENT,
  `idjobs` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `cdate` varchar(45) NOT NULL,
  `mdate` varchar(45) NOT NULL,
  `note` varchar(1000) NOT NULL,
  PRIMARY KEY (`idsavedjob`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `jobs_saved`
--

INSERT INTO `jobs_saved` (`idsavedjob`, `idjobs`, `iduser`, `cdate`, `mdate`, `note`) VALUES
(41, 9, 20, '2014-05-28 17:25:18', '1401278118', ''),
(43, 10, 20, '2014-05-29 10:22:14', '1401339134', 'save this'),
(44, 11, 20, '2014-06-03 15:09:58', '1401788398', 'save');

-- --------------------------------------------------------

--
-- Table structure for table `job_invites`
--

CREATE TABLE IF NOT EXISTS `job_invites` (
  `idjobinvites` int(11) NOT NULL AUTO_INCREMENT,
  `idjobsapplied` int(11) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `invitedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idjobinvites`),
  KEY `idjobsapplied` (`idjobsapplied`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `job_invites`
--

INSERT INTO `job_invites` (`idjobinvites`, `idjobsapplied`, `description`, `cdate`, `mdate`, `invitedon`) VALUES
(1, 7, 'your invitation is over', '2014-06-04 10:22:53', '2014-06-04 11:39:19', '2014-06-03 18:30:00'),
(6, 7, 'one moer', '2014-06-04 11:11:48', NULL, '2014-06-03 18:30:00'),
(7, 37, 'ds', '2014-06-04 11:12:17', NULL, '0000-00-00 00:00:00'),
(8, 7, 'call him', '2014-06-04 11:30:14', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_messages`
--

CREATE TABLE IF NOT EXISTS `job_messages` (
  `idjobmessages` int(11) NOT NULL AUTO_INCREMENT,
  `fromto` int(4) NOT NULL COMMENT '1: user to company, 2: company to user',
  `message` text CHARACTER SET utf8 NOT NULL,
  `cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mdate` timestamp NULL DEFAULT NULL,
  `idjobsapplied` int(11) NOT NULL,
  PRIMARY KEY (`idjobmessages`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `job_messages`
--

INSERT INTO `job_messages` (`idjobmessages`, `fromto`, `message`, `cdate`, `mdate`, `idjobsapplied`) VALUES
(7, 1, 'hi', '2014-05-26 04:04:31', '0000-00-00 00:00:00', 8),
(9, 1, 'a', '2014-05-26 04:29:19', '0000-00-00 00:00:00', 10),
(11, 1, '10', '2014-05-26 04:33:13', '0000-00-00 00:00:00', 8),
(14, 1, '11', '2014-05-26 04:45:00', '0000-00-00 00:00:00', 9),
(19, 1, 'now my id is  19', '2014-05-26 04:58:16', '0000-00-00 00:00:00', 7),
(20, 1, 'now its 10', '2014-05-26 05:02:34', '2014-01-08 00:24:00', 8),
(21, 1, 'its for 11', '2014-05-26 06:24:56', '0000-00-00 00:00:00', 31),
(22, 1, 'now again', '2014-05-26 07:05:03', '0000-00-00 00:00:00', 7),
(23, 1, 'in 11', '2014-05-26 07:05:33', '0000-00-00 00:00:00', 32),
(24, 1, 'it s 11', '2014-05-26 07:06:24', '0000-00-00 00:00:00', 33),
(25, 1, 'applied for marketing manager', '2014-05-26 07:07:26', '0000-00-00 00:00:00', 34),
(26, 1, 'i am a good android developer', '2014-05-26 07:12:11', '0000-00-00 00:00:00', 35),
(27, 1, 'hi there i am using jfinder', '2014-05-26 11:34:04', '0000-00-00 00:00:00', 38),
(28, 1, 'check job applied', '2014-05-27 09:15:23', '2014-01-18 15:53:00', 7),
(29, 1, 'i am applying now', '2014-05-27 10:16:27', '0000-00-00 00:00:00', 37),
(30, 1, 'in this alse', '2014-05-27 10:16:54', '0000-00-00 00:00:00', 39);

-- --------------------------------------------------------

--
-- Table structure for table `job_terms`
--

CREATE TABLE IF NOT EXISTS `job_terms` (
  `idjobterms` int(11) NOT NULL AUTO_INCREMENT,
  `idjobs` int(11) NOT NULL,
  `idterms` int(11) NOT NULL,
  PRIMARY KEY (`idjobterms`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `job_terms`
--

INSERT INTO `job_terms` (`idjobterms`, `idjobs`, `idterms`) VALUES
(11, 10, 15),
(12, 12, 16),
(15, 9, 19),
(16, 9, 20),
(17, 9, 21),
(19, 9, 23),
(20, 9, 24);

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
  `mdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `name` varchar(254) NOT NULL,
  `slug` varchar(254) DEFAULT NULL,
  `type` int(4) NOT NULL COMMENT '1: category, 2:tag',
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idterms`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`idterms`, `name`, `slug`, `type`, `parent`) VALUES
(15, 'deep', 'deep.com', 1, 15),
(16, 'any', 'any.com', 1, 15),
(20, 'new', 'jo', 2, NULL),
(21, 'one more', 'more.com', 2, 20),
(23, 'tag1', 'tag1', 2, 20),
(24, 'again', 'any.com', 1, 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `email`, `password`, `cdate`, `mdate`, `activkey`, `type`, `status`) VALUES
(11, 'satish.solanki', 'satish.solanki@sprytechies.com', 'b8377b23bb86899405d2455cc6da3556', '2014-03-03 09:04:17', '2014-06-05 11:13:04', '74564a800f5a669ca8331580c129ecc5', 1, 1),
(12, 'walton.christy012', 'walton.christy012@gmail.com', 'a82af2bfa7115941feb6943308b51062', '2014-03-03 09:14:02', '2014-03-03 09:14:38', NULL, 1, 1),
(13, 'arvind', 'arvind@sprytechies.com', 'arvind', '2014-03-03 10:39:30', '2014-06-12 05:02:42', 'faea4535e37fa436825ea8d160d6115e', 2, 1),
(14, 'raju', 'raju@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-03-05 04:30:54', '2014-06-03 11:07:38', '11f0acfc7a5b6b2ea67de9c686c2ba75', 1, 1),
(15, 'deependra.diamond', 'deependra.diamond@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2014-05-01 05:58:09', '2014-05-01 05:59:22', 'ee55d2ec6f3c9844ff498f292ff41405', 2, 1),
(16, 'viv.parashar93', 'viv.parashar93@hotmail.com', '061a01a98f80f415b1431236b62bb10b', '2014-05-01 09:29:47', '2014-05-01 09:29:59', '36a08f8fb0d9e19c93734dee814f8f8a', 1, 1),
(17, 'vivek.parashar21', 'vivek.parashar21@sprytechies.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-05-01 10:34:22', '2014-06-03 11:24:48', 'db56c33b7d36c2ed77c7b4e8f5edc515', 2, 1),
(20, 'vivek', 'vivek@gmail.com', '061a01a98f80f415b1431236b62bb10b', '2014-05-02 10:14:18', NULL, '081444008a92c56c60f745f4dbe28ee0', 1, 1),
(22, 'deependra.singh', 'deependra.singh@sprytechies.com', '827ccb0eea8a706c4c34a16891f84e7b', '2014-05-23 07:16:56', NULL, 'f378021b4de2ed39487bce98e20c39fb', 2, 1),
(32, 'abhi11', 'abhi11@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-03 11:28:01', '2014-06-05 12:00:49', '786e24348e5a155c6326276c6ce48616', 2, 1),
(33, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2014-06-05 03:54:53', NULL, '555cd35f5c7f7fe27b641a190f926cab', 0, 1),
(36, 'new', 'new@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-05 12:19:16', '2014-06-05 12:22:17', 'f02fa649e8b0893b8302b35611ab5cb7', 2, 1),
(37, 'a', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-06 08:55:06', NULL, 'a09fe896e7aaed1714190c8708dbab36', 2, 1),
(38, 'satveer4', 'satveer4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-06 09:26:13', '2014-06-12 05:14:52', '2d6ba4b4fd1ee5305c57dade11c1fa0b', 2, 1),
(40, 'abcd', 'abcd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-10 05:06:54', NULL, '4e4febb20a6d3bacf991abe454a08fb9', 1, 1),
(41, 'one', 'one@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-10 05:09:11', NULL, '9e13d91d270f7a69787a9f322d9c5a53', 1, 1),
(42, 'two', 'two@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-10 05:09:55', NULL, '68449ccf30ec1dda34368ea9db0ed88e', 1, 1),
(43, 'three312', 'three312@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-10 05:10:22', '2014-06-12 04:52:45', 'c482023375c4af3e09c8e85d12eb77aa', 1, 1),
(46, 'four4', 'four4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2014-06-12 04:53:27', '2014-06-12 04:54:47', 'f9c2070977a7a5d30dc4ed3554e9d291', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_edu`
--

CREATE TABLE IF NOT EXISTS `user_edu` (
  `idedu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `completed` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `description` text,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `idusers` int(11) NOT NULL,
  PRIMARY KEY (`idedu`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_edu`
--

INSERT INTO `user_edu` (`idedu`, `name`, `degree`, `completed`, `ongoing`, `description`, `cdate`, `mdate`, `idusers`) VALUES
(8, 'jaipur school', 'senior secondary school', '2013-06-03 18:30:00', 1, NULL, '2014-03-03 09:04:18', '2014-06-04 08:07:09', 11),
(9, 'walton.christy012', 'b.tech', '0000-00-00 00:00:00', 0, NULL, '2014-03-03 09:14:38', '2014-06-03 05:59:55', 12),
(10, NULL, NULL, NULL, 0, NULL, '2014-03-03 09:14:38', NULL, 12),
(11, 'st.wilfred ins. of engg. & tech. ajmer', 'b.a', '0000-00-00 00:00:00', 0, NULL, '2014-05-01 05:59:22', '2014-06-03 05:58:56', 15),
(12, 'govt.sr.sec. school kishangarh', 'b.tech', '0000-00-00 00:00:00', 0, NULL, '2014-05-01 05:59:22', '2014-06-03 05:58:28', 15),
(18, 'st.wilfreds', 'b.tech', '0000-00-00 00:00:00', NULL, NULL, '2014-06-04 07:49:20', '2014-06-04 07:51:52', 22),
(19, 'lpu', 'b.tech', '2014-06-03 18:30:00', NULL, 'good marks', '2014-06-04 07:53:55', '2014-06-05 12:15:11', 32),
(22, 'aa', 'aa', '0000-00-00 00:00:00', 0, 'sdfsffds', '2014-06-05 12:13:43', NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_exp`
--

CREATE TABLE IF NOT EXISTS `user_exp` (
  `idexp` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`idexp`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_exp`
--

INSERT INTO `user_exp` (`idexp`, `company`, `name`, `location`, `description`, `from`, `to`, `ongoing`, `cdate`, `mdate`, `idusers`) VALUES
(15, 'infosys', 'software developer', 'jaipur', 'worked very good', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2014-03-03 09:04:18', '2014-06-03 05:30:50', 11),
(16, 'Spry Techies', 'web developer', 'jaipur', 'worked very fine', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2014-05-01 09:29:59', '2014-06-03 10:21:10', 16);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`idusermeta`, `idusers`, `meta_name`, `meta_value`) VALUES
(1, 15, 'deep', 'good person '),
(2, 15, 'deependra', 'php developer');

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

--
-- Dumping data for table `user_oauth`
--

INSERT INTO `user_oauth` (`user_id`, `provider`, `identifier`, `profile_cache`, `session_data`) VALUES
(15, 'LinkedIn', '63FQnEO36s', 'a:24:{s:10:"identifier";s:10:"63FQnEO36s";s:10:"webSiteURL";N;s:10:"profileURL";s:53:"http://www.linkedin.com/pub/deependra-singh/77/a66/94";s:8:"photoURL";s:0:"";s:11:"displayName";s:15:"deependra singh";s:11:"description";s:0:"";s:9:"firstName";s:9:"deependra";s:8:"lastName";s:5:"singh";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";N;s:10:"birthMonth";N;s:9:"birthYear";N;s:5:"email";s:27:"deependra.diamond@gmail.com";s:13:"emailVerified";s:27:"deependra.diamond@gmail.com";s:5:"phone";s:10:"9667891039";s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;s:10:"educations";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"2";}s:9:"education";a:2:{i:0;a:6:{s:2:"id";s:9:"175052961";s:11:"school-name";s:38:"st.wilfred ins. of engg. & tech. ajmer";s:6:"degree";s:7:"b.tech.";s:14:"field-of-study";s:20:"Computer Engineering";s:10:"start-date";a:1:{s:4:"year";s:4:"2009";}s:8:"end-date";a:1:{s:4:"year";s:4:"2013";}}i:1;a:2:{s:2:"id";s:9:"175052862";s:11:"school-name";s:30:"govt.sr.sec. school kishangarh";}}}s:9:"positions";a:1:{s:11:"@attributes";a:1:{s:5:"total";s:1:"0";}}}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"2d9aa3de-1fdc-4951-a549-4f94c1e5b442";s:18:"oauth_token_secret";s:36:"b7e57ed8-7ba0-4f5f-a8cf-3031e7773152";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"2d9aa3de-1fdc-4951-a549-4f94c1e5b442";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"b7e57ed8-7ba0-4f5f-a8cf-3031e7773152";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}'),
(16, 'LinkedIn', 'go_OfR1LuQ', 'a:24:{s:10:"identifier";s:10:"go_OfR1LuQ";s:10:"webSiteURL";N;s:10:"profileURL";s:53:"http://www.linkedin.com/pub/vivek-parashar/89/73a/a18";s:8:"photoURL";s:113:"http://m.c.lnkd.licdn.com/mpr/mprx/0_Fl0jZWGPJ32dA_wDLAgaZol0J8wZP_UDL1ICZo__65xWuFuSwBfA9EcScaIQrks36tjiBSA5UmLm";s:11:"displayName";s:14:"vivek parashar";s:11:"description";s:0:"";s:9:"firstName";s:5:"vivek";s:8:"lastName";s:8:"parashar";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";s:1:"7";s:10:"birthMonth";s:1:"3";s:9:"birthYear";s:4:"1995";s:5:"email";s:26:"viv.parashar93@hotmail.com";s:13:"emailVerified";s:26:"viv.parashar93@hotmail.com";s:5:"phone";N;s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;s:10:"educations";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"2";}s:9:"education";a:2:{i:0;a:6:{s:2:"id";s:9:"202663537";s:11:"school-name";s:23:"univercity of rajasthan";s:6:"degree";s:17:"Bachelor''s Degree";s:14:"field-of-study";s:7:"commrce";s:10:"start-date";a:1:{s:4:"year";s:4:"2011";}s:8:"end-date";a:1:{s:4:"year";s:4:"2014";}}i:1;a:6:{s:2:"id";s:9:"202663422";s:11:"school-name";s:15:"partibha public";s:6:"degree";s:2:"10";s:14:"field-of-study";a:0:{}s:10:"start-date";a:1:{s:4:"year";s:4:"2003";}s:8:"end-date";a:1:{s:4:"year";s:4:"2010";}}}}s:9:"positions";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"2";}s:8:"position";a:2:{i:0;a:6:{s:2:"id";s:9:"496538429";s:5:"title";s:13:"web developer";s:7:"summary";s:17:"php web developer";s:10:"start-date";a:2:{s:4:"year";s:4:"2014";s:5:"month";s:1:"1";}s:10:"is-current";s:4:"true";s:7:"company";a:5:{s:2:"id";s:7:"1685843";s:4:"name";s:12:"Spry Techies";s:4:"size";s:15:"11-50 employees";s:4:"type";s:14:"Privately Held";s:8:"industry";s:35:"Information Technology and Services";}}i:1;a:6:{s:2:"id";s:9:"497994127";s:5:"title";s:13:"web developer";s:10:"start-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:1:"6";}s:8:"end-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:2:"12";}s:10:"is-current";s:5:"false";s:7:"company";a:5:{s:2:"id";s:6:"217495";s:4:"name";s:7:"CMC LTD";s:4:"size";s:17:"10,001+ employees";s:4:"type";s:14:"Public Company";s:8:"industry";s:35:"Information Technology and Services";}}}}}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"1710c1bb-2953-4b80-9808-fe15022a11c0";s:18:"oauth_token_secret";s:36:"02c8f341-6ca0-4d05-bc37-15898f6fa26b";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"1710c1bb-2953-4b80-9808-fe15022a11c0";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"02c8f341-6ca0-4d05-bc37-15898f6fa26b";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}'),
(12, 'LinkedIn', 'oFIHNddhSv', 'a:24:{s:10:"identifier";s:10:"oFIHNddhSv";s:10:"webSiteURL";N;s:10:"profileURL";s:53:"http://www.linkedin.com/pub/christy-walton/68/7a0/b98";s:8:"photoURL";s:0:"";s:11:"displayName";s:14:"christy walton";s:11:"description";s:0:"";s:9:"firstName";s:7:"christy";s:8:"lastName";s:6:"walton";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";N;s:10:"birthMonth";N;s:9:"birthYear";N;s:5:"email";s:27:"walton.christy012@gmail.com";s:13:"emailVerified";s:27:"walton.christy012@gmail.com";s:5:"phone";N;s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;s:10:"educations";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"1";}s:9:"education";a:4:{s:2:"id";s:9:"208510638";s:11:"school-name";s:23:"Harvard Business School";s:10:"start-date";a:1:{s:4:"year";s:4:"2003";}s:8:"end-date";a:1:{s:4:"year";s:4:"2005";}}}s:9:"positions";a:1:{s:11:"@attributes";a:1:{s:5:"total";s:1:"0";}}}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"9e0ea362-36a1-44d0-9fc3-036e30a5f7f8";s:18:"oauth_token_secret";s:36:"3a40207f-0355-44b2-ba63-7cdc36a5ed28";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"9e0ea362-36a1-44d0-9fc3-036e30a5f7f8";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"3a40207f-0355-44b2-ba63-7cdc36a5ed28";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `iduser_profile` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`iduser_profile`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`iduser_profile`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `pin`, `twitter`, `websites`, `heading`, `keyskills`, `cv`, `cdate`, `mdate`, `idusers`, `image`) VALUES
(1, 'Satish Solanki', 'satish@gmail.ocm', '9876543210', 'india', 'Rajasthan', 'Jaipur', 'tonk phatak', 12345, NULL, NULL, NULL, 'php', 'resume', NULL, '2014-06-03 09:15:18', 11, NULL),
(2, 'vivek', 'vivek@gmail.com', '12345', 'india', 'rajasthan', 'jaipur', 'house', 305801, NULL, NULL, NULL, 'php', 'resume', '2014-05-02 10:01:48', '2014-06-02 09:15:00', 16, NULL),
(3, 'vivek', 'vivek@gmail.com', '678910', 'india', 'raj', NULL, NULL, 3015801, NULL, NULL, NULL, NULL, NULL, '2014-05-27 04:01:55', '2014-06-04 04:33:18', 20, NULL),
(9, 'a', 'abc@gmail.com', 'a', 'aa', 'a', 'a', 'a', 123456789, NULL, NULL, NULL, 'php', 'cv', '2014-06-03 05:36:35', '2014-06-05 12:04:28', 14, NULL),
(10, 'new', 'new@gmail.com', '12345', 'india', 'rajasthan', 'k', 's', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-06 08:37:48', NULL, 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `idprojects` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`idprojects`, `name`, `url`, `fromtime`, `totime`, `description`, `position`, `cdate`, `mdate`, `ongoing`, `idusers`) VALUES
(1, 'online bank', 'online bank.com', '2014-06-03 06:02:08', '2014-06-03 06:02:08', 'very good project', 'good', '2014-06-03 06:02:08', '2014-06-03 06:02:08', 1, 15),
(12, 'jfinder', 'localhost/jfinder', '2014-05-30 18:30:00', '2014-06-03 18:30:00', 'good project', 'current', NULL, NULL, 1, 22),
(14, 'jfinder', 'jfinder.com', '2013-06-03 18:30:00', '2014-06-04 18:30:00', '50 % completed', 'under construction', NULL, NULL, 1, 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_users`
--
ALTER TABLE `company_users`
  ADD CONSTRAINT `company_users_ibfk_2` FOREIGN KEY (`idcompanies`) REFERENCES `companies` (`idcompanies`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_users_ibfk_3` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`idcompany`) REFERENCES `companies` (`idcompanies`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD CONSTRAINT `jobs_applied_ibfk_1` FOREIGN KEY (`idjobs`) REFERENCES `jobs` (`idjobs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jobs_applied_ibfk_2` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_invites`
--
ALTER TABLE `job_invites`
  ADD CONSTRAINT `job_invites_ibfk_1` FOREIGN KEY (`idjobsapplied`) REFERENCES `jobs_applied` (`idjobsapplied`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
