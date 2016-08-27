SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------
--
-- Database: `call_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ps_application`
--

DROP TABLE IF EXISTS `ps_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_application_status` int(11) DEFAULT NULL,
  `id_project_type` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `money_requested` int(11) NOT NULL DEFAULT '0',
  `mdhPartBudget` int(11) NOT NULL DEFAULT '0',
  `id_call` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_application`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_application_lang`
--

DROP TABLE IF EXISTS `ps_application_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application_lang` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `acronym` varchar(32) DEFAULT NULL,
  `keywords` text,
  `overview` text,
  PRIMARY KEY (`id_application`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_application_status`
--

DROP TABLE IF EXISTS `ps_application_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application_status` (
  `id_application_status` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_application_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `ps_application_status_lang`
--

DROP TABLE IF EXISTS `ps_application_status_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application_status_lang` (
  `id_application_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_application_status`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_application_partner`
--

DROP TABLE IF EXISTS `ps_application_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application_partner` (
  `id_application_partner` int(11) NOT NULL AUTO_INCREMENT,
  `id_application` int(11) NOT NULL,
  `id_partner` int(11) NOT NULL,
  PRIMARY KEY (`id_application_partner`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_application_attachment`
--

DROP TABLE IF EXISTS `ps_application_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_application_attachment` (
  `id_application_attachment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_application` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `date_of_upload` date NOT NULL,
  PRIMARY KEY (`id_application_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_customer_application`
--

DROP TABLE IF EXISTS `ps_customer_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_customer_application` (
  `id_customer` int(11) NOT NULL,
  `id_application` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`,`id_application`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;




SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `call_calendar`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS `ps_call`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
--
-- Table structure for table `ps_call`
--

CREATE TABLE `ps_call` (
  `id_call` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_funding_agency` int(11) unsigned NOT NULL,
  `id_call_status` int(11) unsigned NOT NULL,
  `id_call_type` int(11) unsigned NOT NULL,
  `planed_project_start` date NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `repeating` tinyint(1) DEFAULT '0',
  `url_to_call` text,
  PRIMARY KEY (`id_call`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP TABLE IF EXISTS `ps_call_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
--
-- Table structure for table `ps_call_lang`
--

CREATE TABLE `ps_call_lang` (
  `id_call` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) unsigned NOT NULL,
  `keywords` text,
  `title` text,
  `description` text,
  `requirements` text,
  `acronym` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_call`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `ps_call_status`
--

DROP TABLE IF EXISTS `ps_call_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_status` (
  `id_call_status` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_call_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_call_status_lang`
--

DROP TABLE IF EXISTS `ps_call_status_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_status_lang` (
  `id_call_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_call_status`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_call_type`
--

DROP TABLE IF EXISTS `ps_call_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_type` (
  `id_call_type` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_call_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_call_type_lang`
--

DROP TABLE IF EXISTS `ps_call_type_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_type_lang` (
  `id_call_type` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_call_type`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_deadline`
--

DROP TABLE IF EXISTS `ps_deadline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_deadline` (
  `id_deadline` int(11) NOT NULL AUTO_INCREMENT,
  `id_call` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_deadline`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_deadline_lang`
--

DROP TABLE IF EXISTS `ps_deadline_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_deadline_lang` (
  `id_deadline` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_deadline`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ps_call_attachment`
--

DROP TABLE IF EXISTS `ps_call_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_attachment` (
  `id_call` int(10) unsigned NOT NULL,
  `id_attachment` int(10) unsigned NOT NULL,
  `date_of_upload` date NOT NULL,
  `id_call_attachment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_call_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ps_funding_program_lang`
--

DROP TABLE IF EXISTS `ps_funding_program_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_funding_program_lang` (
  `id_funding_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_funding_program`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



-- Table structure for table `ps_funding_program_lang`

DROP TABLE `ps_funding_program_lang`;

CREATE TABLE `ps_funding_program_lang` (
  `id_funding_program` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_funding_program`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Table structure for table `ps_call_contact`
--

DROP TABLE IF EXISTS `ps_call_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_call_contact` (
  `id_call` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  PRIMARY KEY (`id_call`,`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


-- MODIFICATIONS

ALTER TABLE ps_customer_lang ADD keywords text;

ALTER TABLE ps_customer ADD subscription tinyint(1) DEFAULT '0';





