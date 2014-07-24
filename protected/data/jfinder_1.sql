-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2014 at 01:32 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.9

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`idcompanies`, `name`, `url`, `country`, `description`, `state`, `city`, `address`, `pin`, `phone`, `person`) VALUES
(1, 'satish', 'www.sprytechies.com', 'India', 'Golf', 'Rajasthan', 'Jaipur', 'Tonk Phatak', 302018, '9879879870', 'Solanki'),
(3, 'Mohit', 'www.infosis.com', 'India', 'Cricket', 'Rajasthan', 'Jaipur', 'Shastri Nagar', 302014, '9879879870', 'Mohit Kadel'),
(5, 'Vivek', 'www.sprytechies.com', 'India', 'Music', 'Rajasthan', 'Jaipur', 'Tonk', 302014, '895556471', 'Vivek');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company_users`
--

INSERT INTO `company_users` (`idcompany_users`, `idcompanies`, `idusers`) VALUES
(1, 1, 80),
(2, 5, 83);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `idjobs` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(45) DEFAULT NULL,
  `to` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amountfrom` varchar(45) DEFAULT NULL,
  `amountto` varchar(45) DEFAULT NULL,
  `keywords` varchar(45) DEFAULT NULL,
  `cdate` varchar(45) DEFAULT NULL,
  `mdate` varchar(45) DEFAULT NULL,
  `confirmation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idjobs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE IF NOT EXISTS `jobs_applied` (
  `idjobsapplied` int(45) NOT NULL AUTO_INCREMENT,
  `idjobs` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  `cdate` varchar(45) DEFAULT NULL,
  `mdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idjobsapplied`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `email`, `password`, `cdate`, `mdate`, `activkey`, `type`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cf1fa3059c63a69073c33c8e5a87e479', NULL, 1),
(2, 'mohit', 'mohit.kadel@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4a848a0d67c5785f6602daedbc123a6d', NULL, 1),
(19, 'satish.solanki', 'satish.solanki@gmail.com', 'b8377b23bb86899405d2455cc6da3556', '2014-02-19 07:25:51', NULL, 'd6d3e0f643860aa53c6667e4d58241e0', NULL, 1),
(22, 'dheeraj.mathur', 'dheeraj.mathur@sprytechies.com', 'd9c59c1aa00818c948423d8d9f141f30', '2014-02-19 07:35:34', NULL, '7c7c69107443947002b16ac7b83d3bc0', NULL, 1),
(23, 'govind.joshi', 'govind.joshi@sprytechies.com', '2654f4a1c04731cd0b9a50382d5031cd', '2014-02-19 07:38:41', NULL, 'bf2b0c07e2cf3cb210b2fc93438f9e22', NULL, 1),
(28, 'qwe', 'qwe@qwe.com', 'efe6398127928f1b2e9ef3207fb82663', '2014-02-20 04:52:14', NULL, '111563e1d6fff6818a788ba3ed53e0e4', NULL, 1),
(54, 'mohit.kadel', 'mohit.kadel@sprytechies.com', 'd8052f9e09a17e6907629e76bbd261cc', '2014-02-24 08:40:17', NULL, '66185e6661e47d41bd59203ae37a1110', NULL, 1),
(79, 'er.mohitkadel', 'er.mohitkadel@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', '2014-02-25 04:46:18', '2014-02-25 04:49:28', '3e4d0a43ad1b88216b42deb2027b379b', NULL, 1),
(80, 'satish.solanki', 'satish.solanki@sprytechies.com', '827ccb0eea8a706c4c34a16891f84e7b', '2014-02-28 14:02:36', NULL, 'efbd844cc3e578fdaa2b0a1b3257b047', NULL, 1),
(83, 'Vivek', 'Vivek@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2014-03-01 07:55:09', NULL, '09a08d678abbc3b489d89d1b3b3cfcdf', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_edu`
--

CREATE TABLE IF NOT EXISTS `user_edu` (
  `idedu` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `completed` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `description` text,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idedu`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `user_edu`
--

INSERT INTO `user_edu` (`idedu`, `idusers`, `name`, `degree`, `completed`, `ongoing`, `description`, `cdate`, `mdate`) VALUES
(1, 19, 'Government Senior Secondary School', 'PCM', NULL, NULL, NULL, NULL, NULL),
(4, 22, 'St. Admands', 'PCM', NULL, NULL, NULL, '2014-02-19 07:35:34', NULL),
(5, 23, 'Government Senior Secondary School', 'Arts', NULL, NULL, NULL, '2014-02-19 07:38:41', NULL),
(8, 28, 'jaipur school', 'senior secondary school', NULL, NULL, NULL, '2014-02-20 04:52:14', NULL),
(9, 28, 'jaipur school', 'secondary school', NULL, NULL, NULL, '2014-02-20 04:52:14', NULL),
(69, 54, 'jaipur school', 'senior secondary school', '0000-00-00 00:00:00', NULL, NULL, '2014-02-24 08:40:17', '2014-03-01 05:20:02'),
(70, 54, 'jaipur school', 'secondary school', '0000-00-00 00:00:00', NULL, NULL, '2014-02-24 08:40:18', '2014-03-01 05:20:02'),
(150, 79, 'Jaipur National University ', 'Bachelor of Technology (B.Tech.)', '0000-00-00 00:00:00', NULL, NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(151, 79, 'Web Development-Grass Institute', 'Certification', '0000-00-00 00:00:00', NULL, NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(152, 79, 'Tata CMC Academy', 'Certification', '0000-00-00 00:00:00', NULL, NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(153, 79, 'Jaipur School', 'Senior Secondary', '0000-00-00 00:00:00', NULL, NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(154, 79, 'Central Board Of Secondary Education', '10th', '0000-00-00 00:00:00', NULL, NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_exp`
--

CREATE TABLE IF NOT EXISTS `user_exp` (
  `idexp` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `company` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` text,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idexp`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `user_exp`
--

INSERT INTO `user_exp` (`idexp`, `idusers`, `company`, `name`, `location`, `description`, `from`, `to`, `ongoing`, `cdate`, `mdate`) VALUES
(1, 19, 'Spry Techies', 'Web Developer', 'Jaipur', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 22, 'Spry Techies', 'Web Developer', 'Jaipur', NULL, NULL, NULL, NULL, '2014-02-19 07:35:34', NULL),
(5, 23, 'Spry Techies', 'Seo', 'Jaipur', NULL, NULL, NULL, NULL, '2014-02-19 07:38:41', NULL),
(6, 28, 'infosys', 'software developer', 'jaipur', NULL, NULL, NULL, NULL, '2014-02-20 04:52:14', NULL),
(44, 54, 'infosys', 'software developer', 'jaipur', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2014-02-24 08:40:17', '2014-03-01 05:20:02'),
(45, 54, 'sprytechies', 'web developer', 'jaipur', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2014-02-24 08:40:17', '2014-03-01 05:20:02'),
(79, 79, 'Infosys', 'Software Developer', 'Jaipur', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(80, 79, 'Spry Techies', 'Jr. Web Developer', 'Jaipur', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36'),
(81, 79, 'Achievers', 'IT Trainer', 'Jaipur', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2014-02-25 04:46:20', '2014-02-28 11:41:36');

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
(79, 'LinkedIn', '08Dve9M9Y9', 'a:24:{s:10:"identifier";s:10:"08Dve9M9Y9";s:10:"webSiteURL";N;s:10:"profileURL";s:49:"http://www.linkedin.com/pub/mohit-kadel/55/10/96b";s:8:"photoURL";s:113:"http://m.c.lnkd.licdn.com/mpr/mprx/0_r9mLMnTgk83PtdO7rqgsMqA0X65KrEa7-cssMzKfRilTfaJfyrYdcvX3oeLmPSf_AzuRntme_Bnl";s:11:"displayName";s:11:"Mohit Kadel";s:11:"description";s:0:"";s:9:"firstName";s:5:"Mohit";s:8:"lastName";s:5:"Kadel";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";s:2:"19";s:10:"birthMonth";s:1:"2";s:9:"birthYear";s:4:"1992";s:5:"email";s:23:"er.mohitkadel@gmail.com";s:13:"emailVerified";s:23:"er.mohitkadel@gmail.com";s:5:"phone";s:10:"8963090659";s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;s:10:"educations";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"5";}s:9:"education";a:5:{i:0;a:6:{s:2:"id";s:9:"117832768";s:11:"school-name";s:26:"Jaipur National University";s:6:"degree";s:32:"Bachelor of Technology (B.Tech.)";s:14:"field-of-study";s:16:"Computer Science";s:10:"start-date";a:1:{s:4:"year";s:4:"2009";}s:8:"end-date";a:1:{s:4:"year";s:4:"2013";}}i:1;a:6:{s:2:"id";s:9:"138427782";s:11:"school-name";s:31:"Web Development-Grass Institute";s:6:"degree";s:13:"Certification";s:14:"field-of-study";s:9:"PHP-MySql";s:10:"start-date";a:1:{s:4:"year";s:4:"2012";}s:8:"end-date";a:1:{s:4:"year";s:4:"2012";}}i:2;a:6:{s:2:"id";s:9:"138428278";s:11:"school-name";s:16:"Tata CMC Academy";s:6:"degree";s:13:"Certification";s:14:"field-of-study";s:4:"Java";s:10:"start-date";a:1:{s:4:"year";s:4:"2011";}s:8:"end-date";a:1:{s:4:"year";s:4:"2011";}}i:3;a:6:{s:2:"id";s:9:"117833409";s:11:"school-name";s:13:"Jaipur School";s:6:"degree";s:16:"Senior Secondary";s:14:"field-of-study";s:3:"PCM";s:10:"start-date";a:1:{s:4:"year";s:4:"2007";}s:8:"end-date";a:1:{s:4:"year";s:4:"2009";}}i:4;a:6:{s:2:"id";s:9:"138427776";s:11:"school-name";s:36:"Central Board Of Secondary Education";s:5:"notes";a:0:{}s:10:"activities";a:0:{}s:6:"degree";s:4:"10th";s:14:"field-of-study";a:0:{}}}}s:9:"positions";a:2:{s:11:"@attributes";a:1:{s:5:"total";s:1:"3";}s:8:"position";a:3:{i:0;a:5:{s:2:"id";s:9:"483735127";s:5:"title";s:18:"Software Developer";s:10:"start-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:2:"11";}s:10:"is-current";s:4:"true";s:7:"company";a:5:{s:2:"id";s:7:"1685843";s:4:"name";s:12:"Spry Techies";s:4:"size";s:15:"11-50 employees";s:4:"type";s:14:"Privately Held";s:8:"industry";s:35:"Information Technology and Services";}}i:1;a:6:{s:2:"id";s:9:"418490386";s:5:"title";s:17:"Jr. Web Developer";s:10:"start-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:1:"6";}s:8:"end-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:2:"10";}s:10:"is-current";s:5:"false";s:7:"company";a:5:{s:2:"id";s:7:"1685843";s:4:"name";s:12:"Spry Techies";s:4:"size";s:15:"11-50 employees";s:4:"type";s:14:"Privately Held";s:8:"industry";s:35:"Information Technology and Services";}}i:2;a:7:{s:2:"id";s:9:"347407090";s:5:"title";s:10:"IT Trainer";s:7:"summary";s:83:"I was teaching DBMS, Conversion Theory- Binary to Decimals, Peripheral Devices etc.";s:10:"start-date";a:2:{s:4:"year";s:4:"2012";s:5:"month";s:2:"11";}s:8:"end-date";a:2:{s:4:"year";s:4:"2013";s:5:"month";s:1:"1";}s:10:"is-current";s:5:"false";s:7:"company";a:2:{s:4:"name";s:9:"Achievers";s:8:"industry";s:17:"Computer Software";}}}}}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"47037ad8-55ee-46cb-8dbe-db4bdf41eb4b";s:18:"oauth_token_secret";s:36:"1260c1c3-aba3-4e14-a8dd-6b414ec25275";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"47037ad8-55ee-46cb-8dbe-db4bdf41eb4b";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"1260c1c3-aba3-4e14-a8dd-6b414ec25275";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}'),
(31, 'LinkedIn', '142I4t5fHG', 'a:22:{s:10:"identifier";s:10:"142I4t5fHG";s:10:"webSiteURL";N;s:10:"profileURL";s:53:"http://www.linkedin.com/pub/christy-walton/68/7a0/b98";s:8:"photoURL";s:0:"";s:11:"displayName";s:14:"christy walton";s:11:"description";s:0:"";s:9:"firstName";s:7:"christy";s:8:"lastName";s:6:"walton";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";N;s:10:"birthMonth";N;s:9:"birthYear";N;s:5:"email";s:27:"walton.christy012@gmail.com";s:13:"emailVerified";s:27:"walton.christy012@gmail.com";s:5:"phone";N;s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"9df3f080-cd7a-4714-bc2f-3852b61088e7";s:18:"oauth_token_secret";s:36:"b6a62208-981d-4068-9406-f9a8be32896a";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"9df3f080-cd7a-4714-bc2f-3852b61088e7";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"b6a62208-981d-4068-9406-f9a8be32896a";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}'),
(32, 'LinkedIn', 'E1DlDQdCRD', 'a:22:{s:10:"identifier";s:10:"E1DlDQdCRD";s:10:"webSiteURL";N;s:10:"profileURL";s:49:"http://www.linkedin.com/pub/mohit-kadel/55/10/96b";s:8:"photoURL";s:113:"http://m.c.lnkd.licdn.com/mpr/mprx/0_r9mLMnTgk83PtdO7rqgsMqA0X65KrEa7-cssMzKfRilTfaJfyrYdcvX3oeLmPSf_AzuRntme_Bnl";s:11:"displayName";s:11:"Mohit Kadel";s:11:"description";s:0:"";s:9:"firstName";s:5:"Mohit";s:8:"lastName";s:5:"Kadel";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";N;s:10:"birthMonth";N;s:9:"birthYear";N;s:5:"email";s:23:"er.mohitkadel@gmail.com";s:13:"emailVerified";s:23:"er.mohitkadel@gmail.com";s:5:"phone";N;s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"d89287cc-7959-4d46-98cd-2c4005d98870";s:18:"oauth_token_secret";s:36:"287ade7c-cc33-4108-94b3-e008bbd41969";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"d89287cc-7959-4d46-98cd-2c4005d98870";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"287ade7c-cc33-4108-94b3-e008bbd41969";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}'),
(69, 'LinkedIn', 'oFIHNddhSv', 'a:24:{s:10:"identifier";s:10:"oFIHNddhSv";s:10:"webSiteURL";N;s:10:"profileURL";s:53:"http://www.linkedin.com/pub/christy-walton/68/7a0/b98";s:8:"photoURL";s:0:"";s:11:"displayName";s:14:"christy walton";s:11:"description";s:0:"";s:9:"firstName";s:7:"christy";s:8:"lastName";s:6:"walton";s:6:"gender";N;s:8:"language";N;s:3:"age";N;s:8:"birthDay";N;s:10:"birthMonth";N;s:9:"birthYear";N;s:5:"email";s:27:"walton.christy012@gmail.com";s:13:"emailVerified";s:27:"walton.christy012@gmail.com";s:5:"phone";N;s:7:"address";N;s:7:"country";N;s:6:"region";N;s:4:"city";N;s:3:"zip";N;s:10:"educations";s:8:"\n    \n  ";s:9:"positions";s:0:"";}', 'a:4:{s:50:"hauth_session.linkedin.token.access_token_linkedin";s:229:"a:4:{s:11:"oauth_token";s:36:"9e0ea362-36a1-44d0-9fc3-036e30a5f7f8";s:18:"oauth_token_secret";s:36:"3a40207f-0355-44b2-ba63-7cdc36a5ed28";s:16:"oauth_expires_in";s:7:"5183998";s:30:"oauth_authorization_expires_in";s:7:"5183998";}";s:41:"hauth_session.linkedin.token.access_token";s:44:"s:36:"9e0ea362-36a1-44d0-9fc3-036e30a5f7f8";";s:48:"hauth_session.linkedin.token.access_token_secret";s:44:"s:36:"3a40207f-0355-44b2-ba63-7cdc36a5ed28";";s:35:"hauth_session.linkedin.is_logged_in";s:4:"i:1;";}');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `iduser_profile` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
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
  `profile_url` varchar(255) NOT NULL,
  `cv_url` varchar(255) NOT NULL,
  `cv` varchar(128) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iduser_profile`),
  KEY `idusers` (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`iduser_profile`, `idusers`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `pin`, `twitter`, `websites`, `heading`, `keyskills`, `profile_url`, `cv_url`, `cv`, `cdate`, `mdate`) VALUES
(1, 79, 'mohit kadel', 'er.mohitkadel@gmail.com', '8963090659', 'India', 'Rajasthan', 'Jaipur', '15 Ram Nagar', 302016, 'mohit_kadel', 'mohitkadel.com', 'mohit', 'php mysql', '', '', NULL, NULL, NULL),
(2, 54, 'mohit', 'mohit@gmail.com', '895623124', 'india', 'Rajasthan', 'Jaipur', 'Tonk phatak', 302018, 'mohit@twiiter.com', 'www.sprytechies.com', 'Web developer', 'Php', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `idprojects` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `description` text,
  `position` varchar(128) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT NULL,
  `mdate` timestamp NULL DEFAULT NULL,
  `ongoing` int(1) DEFAULT NULL,
  PRIMARY KEY (`idprojects`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_users`
--
ALTER TABLE `company_users`
  ADD CONSTRAINT `company_users_ibfk_2` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_users_ibfk_1` FOREIGN KEY (`idcompanies`) REFERENCES `companies` (`idcompanies`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_edu`
--
ALTER TABLE `user_edu`
  ADD CONSTRAINT `user_edu_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_exp`
--
ALTER TABLE `user_exp`
  ADD CONSTRAINT `user_exp_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
