-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 11:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'Computer Science,IT, Politics, Sports, Cricket, etc.',
  `Description` varchar(500) NOT NULL COMMENT 'Description to explain what this category means.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and ime when system has updated this record.Super Admin ID you can insert static.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information,Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Computer', 'Lorem ipsum is simply dummy text', '2021-02-22 22:31:36', NULL, '2021-02-22 22:31:36', NULL, b'01'),
(2, 'Science', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:15', NULL, '2021-02-22 22:39:15', NULL, b'01'),
(3, 'IT', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:21', NULL, '2021-02-22 22:39:21', NULL, b'01'),
(4, 'History', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:34', NULL, '2021-02-22 22:39:34', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `CountryCode` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phonecode` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when System as created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this rocord.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `CountryCode`, `Name`, `Phonecode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'AF', 'Afghanistan', 93, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(2, 'AL', 'Albania', 355, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(3, 'DZ', 'Algeria', 213, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(4, 'AS', 'American Samoa', 1684, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(5, 'AD', 'Andorra', 376, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(6, 'AO', 'Angola', 244, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(7, 'AI', 'Anguilla', 1264, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(8, 'AQ', 'Antarctica', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(9, 'AG', 'Antigua And Barbuda', 1268, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(10, 'AR', 'Argentina', 54, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(11, 'AM', 'Armenia', 374, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(12, 'AW', 'Aruba', 297, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(13, 'AU', 'Australia', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(14, 'AT', 'Austria', 43, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(15, 'AZ', 'Azerbaijan', 994, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(16, 'BS', 'Bahamas The', 1242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(17, 'BH', 'Bahrain', 973, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(18, 'BD', 'Bangladesh', 880, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(19, 'BB', 'Barbados', 1246, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(20, 'BY', 'Belarus', 375, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(21, 'BE', 'Belgium', 32, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(22, 'BZ', 'Belize', 501, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(23, 'BJ', 'Benin', 229, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(24, 'BM', 'Bermuda', 1441, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(25, 'BT', 'Bhutan', 975, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(26, 'BO', 'Bolivia', 591, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(27, 'BA', 'Bosnia and Herzegovina', 387, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(28, 'BW', 'Botswana', 267, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(29, 'BV', 'Bouvet Island', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(30, 'BR', 'Brazil', 55, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(31, 'IO', 'British Indian Ocean Territory', 246, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(32, 'BN', 'Brunei', 673, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(33, 'BG', 'Bulgaria', 359, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(34, 'BF', 'Burkina Faso', 226, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(35, 'BI', 'Burundi', 257, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(36, 'KH', 'Cambodia', 855, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(37, 'CM', 'Cameroon', 237, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(38, 'CA', 'Canada', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(39, 'CV', 'Cape Verde', 238, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(40, 'KY', 'Cayman Islands', 1345, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(41, 'CF', 'Central African Republic', 236, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(42, 'TD', 'Chad', 235, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(43, 'CL', 'Chile', 56, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(44, 'CN', 'China', 86, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(45, 'CX', 'Christmas Island', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(46, 'CC', 'Cocos (Keeling) Islands', 672, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(47, 'CO', 'Colombia', 57, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(48, 'KM', 'Comoros', 269, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(49, 'CG', 'Congo', 242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(50, 'CD', 'Congo The Democratic Republic Of The', 242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(51, 'CK', 'Cook Islands', 682, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(52, 'CR', 'Costa Rica', 506, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(53, 'CI', 'Cote D Ivoire (Ivory Coast)', 225, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(54, 'HR', 'Croatia (Hrvatska)', 385, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(55, 'CU', 'Cuba', 53, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(56, 'CY', 'Cyprus', 357, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(57, 'CZ', 'Czech Republic', 420, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(58, 'DK', 'Denmark', 45, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(59, 'DJ', 'Djibouti', 253, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(60, 'DM', 'Dominica', 1767, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(61, 'DO', 'Dominican Republic', 1809, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(62, 'TP', 'East Timor', 670, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(63, 'EC', 'Ecuador', 593, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(64, 'EG', 'Egypt', 20, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(65, 'SV', 'El Salvador', 503, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(66, 'GQ', 'Equatorial Guinea', 240, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(67, 'ER', 'Eritrea', 291, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(68, 'EE', 'Estonia', 372, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(69, 'ET', 'Ethiopia', 251, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(70, 'XA', 'External Territories of Australia', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(71, 'FK', 'Falkland Islands', 500, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(72, 'FO', 'Faroe Islands', 298, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(73, 'FJ', 'Fiji Islands', 679, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(74, 'FI', 'Finland', 358, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(75, 'FR', 'France', 33, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(76, 'GF', 'French Guiana', 594, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(77, 'PF', 'French Polynesia', 689, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(78, 'TF', 'French Southern Territories', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(79, 'GA', 'Gabon', 241, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(80, 'GM', 'Gambia The', 220, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(81, 'GE', 'Georgia', 995, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(82, 'DE', 'Germany', 49, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(83, 'GH', 'Ghana', 233, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(84, 'GI', 'Gibraltar', 350, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(85, 'GR', 'Greece', 30, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(86, 'GL', 'Greenland', 299, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(87, 'GD', 'Grenada', 1473, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(88, 'GP', 'Guadeloupe', 590, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(89, 'GU', 'Guam', 1671, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(90, 'GT', 'Guatemala', 502, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(91, 'XU', 'Guernsey and Alderney', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(92, 'GN', 'Guinea', 224, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(93, 'GW', 'Guinea-Bissau', 245, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(94, 'GY', 'Guyana', 592, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(95, 'HT', 'Haiti', 509, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(96, 'HM', 'Heard and McDonald Islands', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(97, 'HN', 'Honduras', 504, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(98, 'HK', 'Hong Kong S.A.R.', 852, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(99, 'HU', 'Hungary', 36, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(100, 'IS', 'Iceland', 354, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(101, 'IN', 'India', 91, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(102, 'ID', 'Indonesia', 62, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(103, 'IR', 'Iran', 98, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(104, 'IQ', 'Iraq', 964, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(105, 'IE', 'Ireland', 353, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(106, 'IL', 'Israel', 972, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(107, 'IT', 'Italy', 39, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(108, 'JM', 'Jamaica', 1876, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(109, 'JP', 'Japan', 81, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(110, 'XJ', 'Jersey', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(111, 'JO', 'Jordan', 962, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(112, 'KZ', 'Kazakhstan', 7, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(113, 'KE', 'Kenya', 254, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(114, 'KI', 'Kiribati', 686, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(115, 'KP', 'Korea North', 850, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(116, 'KR', 'Korea South', 82, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(117, 'KW', 'Kuwait', 965, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(118, 'KG', 'Kyrgyzstan', 996, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(119, 'LA', 'Laos', 856, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(120, 'LV', 'Latvia', 371, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(121, 'LB', 'Lebanon', 961, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(122, 'LS', 'Lesotho', 266, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(123, 'LR', 'Liberia', 231, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(124, 'LY', 'Libya', 218, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(125, 'LI', 'Liechtenstein', 423, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(126, 'LT', 'Lithuania', 370, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(127, 'LU', 'Luxembourg', 352, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(128, 'MO', 'Macau S.A.R.', 853, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(129, 'MK', 'Macedonia', 389, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(130, 'MG', 'Madagascar', 261, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(131, 'MW', 'Malawi', 265, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(132, 'MY', 'Malaysia', 60, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(133, 'MV', 'Maldives', 960, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(134, 'ML', 'Mali', 223, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(135, 'MT', 'Malta', 356, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(136, 'XM', 'Man (Isle of)', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(137, 'MH', 'Marshall Islands', 692, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(138, 'MQ', 'Martinique', 596, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(139, 'MR', 'Mauritania', 222, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(140, 'MU', 'Mauritius', 230, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(141, 'YT', 'Mayotte', 269, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(142, 'MX', 'Mexico', 52, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(143, 'FM', 'Micronesia', 691, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(144, 'MD', 'Moldova', 373, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(145, 'MC', 'Monaco', 377, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(146, 'MN', 'Mongolia', 976, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(147, 'MS', 'Montserrat', 1664, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(148, 'MA', 'Morocco', 212, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(149, 'MZ', 'Mozambique', 258, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(150, 'MM', 'Myanmar', 95, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(151, 'NA', 'Namibia', 264, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(152, 'NR', 'Nauru', 674, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(153, 'NP', 'Nepal', 977, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(154, 'AN', 'Netherlands Antilles', 599, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(155, 'NL', 'Netherlands The', 31, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(156, 'NC', 'New Caledonia', 687, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(157, 'NZ', 'New Zealand', 64, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(158, 'NI', 'Nicaragua', 505, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(159, 'NE', 'Niger', 227, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(160, 'NG', 'Nigeria', 234, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(161, 'NU', 'Niue', 683, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(162, 'NF', 'Norfolk Island', 672, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(163, 'MP', 'Northern Mariana Islands', 1670, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(164, 'NO', 'Norway', 47, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(165, 'OM', 'Oman', 968, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(166, 'PK', 'Pakistan', 92, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(167, 'PW', 'Palau', 680, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(168, 'PS', 'Palestinian Territory Occupied', 970, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(169, 'PA', 'Panama', 507, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(170, 'PG', 'Papua new Guinea', 675, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(171, 'PY', 'Paraguay', 595, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(172, 'PE', 'Peru', 51, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(173, 'PH', 'Philippines', 63, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(174, 'PN', 'Pitcairn Island', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(175, 'PL', 'Poland', 48, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(176, 'PT', 'Portugal', 351, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(177, 'PR', 'Puerto Rico', 1787, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(178, 'QA', 'Qatar', 974, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(179, 'RE', 'Reunion', 262, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(180, 'RO', 'Romania', 40, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(181, 'RU', 'Russia', 70, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(182, 'RW', 'Rwanda', 250, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(183, 'SH', 'Saint Helena', 290, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(184, 'KN', 'Saint Kitts And Nevis', 1869, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(185, 'LC', 'Saint Lucia', 1758, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(186, 'PM', 'Saint Pierre and Miquelon', 508, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(188, 'WS', 'Samoa', 684, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(189, 'SM', 'San Marino', 378, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(190, 'ST', 'Sao Tome and Principe', 239, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(191, 'SA', 'Saudi Arabia', 966, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(192, 'SN', 'Senegal', 221, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(193, 'RS', 'Serbia', 381, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(194, 'SC', 'Seychelles', 248, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(195, 'SL', 'Sierra Leone', 232, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(196, 'SG', 'Singapore', 65, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(197, 'SK', 'Slovakia', 421, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(198, 'SI', 'Slovenia', 386, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(199, 'XG', 'Smaller Territories of the UK', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(200, 'SB', 'Solomon Islands', 677, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(201, 'SO', 'Somalia', 252, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(202, 'ZA', 'South Africa', 27, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(203, 'GS', 'South Georgia', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(204, 'SS', 'South Sudan', 211, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(205, 'ES', 'Spain', 34, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(206, 'LK', 'Sri Lanka', 94, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(207, 'SD', 'Sudan', 249, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(208, 'SR', 'Suriname', 597, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(210, 'SZ', 'Swaziland', 268, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(211, 'SE', 'Sweden', 46, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(212, 'CH', 'Switzerland', 41, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(213, 'SY', 'Syria', 963, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(214, 'TW', 'Taiwan', 886, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(215, 'TJ', 'Tajikistan', 992, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(216, 'TZ', 'Tanzania', 255, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(217, 'TH', 'Thailand', 66, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(218, 'TG', 'Togo', 228, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(219, 'TK', 'Tokelau', 690, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(220, 'TO', 'Tonga', 676, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(221, 'TT', 'Trinidad And Tobago', 1868, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(222, 'TN', 'Tunisia', 216, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(223, 'TR', 'Turkey', 90, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(224, 'TM', 'Turkmenistan', 7370, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(225, 'TC', 'Turks And Caicos Islands', 1649, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(226, 'TV', 'Tuvalu', 688, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(227, 'UG', 'Uganda', 256, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(228, 'UA', 'Ukraine', 380, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(229, 'AE', 'United Arab Emirates', 971, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(230, 'GB', 'United Kingdom', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(231, 'US', 'United States', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(232, 'UM', 'United States Minor Outlying Islands', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(233, 'UY', 'Uruguay', 598, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(234, 'UZ', 'Uzbekistan', 998, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(235, 'VU', 'Vanuatu', 678, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(236, 'VA', 'Vatican City State (Holy See)', 39, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(237, 'VE', 'Venezuela', 58, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(238, 'VN', 'Vietnam', 84, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(239, 'VG', 'Virgin Islands (British)', 1284, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(240, 'VI', 'Virgin Islands (US)', 1340, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(241, 'WF', 'Wallis And Futuna Islands', 681, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(242, 'EH', 'Western Sahara', 212, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(243, 'YE', 'Yemen', 967, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(244, 'YU', 'Yugoslavia', 38, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(245, 'ZM', 'Zambia', 260, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(246, 'ZW', 'Zimbabwe', 263, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `Seller` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `Downloader` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `IsSellerHasAllowedDownload` bit(2) NOT NULL DEFAULT b'0' COMMENT 'For paid notes default false.For free notes it will be true anyway.',
  `AttachmentPath` varchar(1000) DEFAULT NULL COMMENT 'for paid notes default false. for free notes it will be true anyway.',
  `IsAttachmentDownloaded` bit(2) NOT NULL DEFAULT b'0',
  `AttachmentDownloadedDate` datetime DEFAULT NULL COMMENT 'for paid notes default false. for free notes it will be true anyway.',
  `IsPaid` int(11) NOT NULL COMMENT 'default false. for free notes it will be true anyway.',
  `PurchasedPrice` bit(64) NOT NULL,
  `NoteTitle` varchar(100) NOT NULL COMMENT 'We need to store Note Title to this Table.',
  `NoteCategory` varchar(100) NOT NULL COMMENT 'We need to store Note Category to this Table.',
  `CreatedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin Id you can insert static.',
  `ModifiedDate` datetime DEFAULT NULL COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updatNoteed this record. Super Admin Id you can insert static.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Value` varchar(100) NOT NULL COMMENT 'Value to display over UI for each data item',
  `DataValue` varchar(100) NOT NULL COMMENT 'Unique identifier for dataitem per category which admin never can change.',
  `RefCategory` varchar(100) NOT NULL COMMENT 'category name i.e. NotesStatus, SellingMode, Gendet etc.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record. ',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin Id you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record. Super Admin Id you can insert static.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ID`, `Value`, `DataValue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', '2021-02-21 14:15:49', 3, '2021-02-21 14:15:49', 3, b'01'),
(2, 'Female', 'Fe', 'Gender', '2021-02-21 14:19:22', 3, '2021-02-21 14:19:22', 3, b'01'),
(3, 'Unknown', 'U', 'Gender', '2021-02-21 14:19:22', 3, '2021-02-21 14:19:22', 3, b'00'),
(4, 'Paid', 'P', 'Selling Mode', '2021-02-21 14:20:29', 3, '2021-02-21 14:20:29', 3, b'01'),
(5, 'Free', 'F', 'Selling Mode', '2021-02-21 14:20:29', 3, '2021-02-21 14:20:29', 3, b'01'),
(6, 'Draft', 'Draft', 'Notes Status', '2021-02-21 14:21:05', 3, '2021-02-21 14:21:05', 3, b'01'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-02-21 14:22:04', 3, '2021-02-21 14:22:04', 3, b'01'),
(8, 'In Review', 'In Review', 'Notes Status', '2021-02-21 14:22:42', 3, '2021-02-21 14:22:42', 3, b'01'),
(9, 'Published', 'Approved', 'Notes Status', '2021-02-21 14:23:22', 3, '2021-02-21 14:23:22', 3, b'01'),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-02-21 14:23:52', 3, '2021-02-21 14:23:52', 3, b'01'),
(11, 'Removed', 'Removed', 'Notes Status', '2021-02-21 14:24:22', 3, '2021-02-21 14:24:22', 3, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--

CREATE TABLE `sellernotes` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `SellerID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users Table.',
  `Status` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Referencedata Table.',
  `ActionBy` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Users Table.',
  `AdminRemarks` varchar(10000) DEFAULT NULL COMMENT 'Admin will enter the remarks when he will reject the notes or when he will mark status removed for notes via unpublished function.',
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL COMMENT 'FOREIGN KEY relationship with Category Table.',
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Types Table.',
  `NumberOfPages` int(11) DEFAULT NULL,
  `Description` varchar(1000) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Countries Table.',
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(2) NOT NULL DEFAULT b'0' COMMENT 'Set false if selling mode is free and set to true if selling mode is paid.',
  `SellingPrice` decimal(10,0) DEFAULT NULL COMMENT 'if selling mode is paid - selling price can not be null.',
  `NotesPreview` varchar(10000) DEFAULT NULL COMMENT 'if selling mode is paid - note preview cannot be null.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellernotes`
--

INSERT INTO `sellernotes` (`ID`, `SellerID`, `Status`, `ActionBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberOfPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(3, 3, 7, 3, NULL, '2021-02-23 09:32:29', 'Java Security', 3, '', 1, 0, 'Lorem ipsum is simply dummy text', 'IIT', 1, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '250', '', '2021-02-23 09:32:29', NULL, '2021-02-23 09:32:29', NULL, b'01'),
(4, 10, 7, 10, NULL, NULL, 'AI Learning', 1, '', 3, 0, 'OK!!! IT is very useful notes.. ', 'LJIET', 4, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '500', '', '2021-02-23 09:49:08', NULL, '2021-02-23 09:49:08', NULL, b'01'),
(10, 4, 6, 4, NULL, NULL, 'C++ Notes', 3, '', 3, 0, 'C++ is the basic language...', 'IIT', 47, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-01 10:34:28', NULL, '2021-03-01 10:34:28', NULL, b'01'),
(15, 4, 6, 4, NULL, NULL, '.Net Notes', 1, '240380_Pink Roses 2.jpg', 2, 20, '.Net is also very nice PL....', 'MS', 101, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'banner.jpg', '2021-03-02 16:53:28', NULL, '2021-03-02 16:53:28', NULL, b'01'),
(18, 4, 7, 4, NULL, NULL, 'Opentext', 2, '5.png', 3, 50, 'Open Text is also PL.....', 'GEC', 16, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '500', 'l1.jpg', '2021-03-02 18:49:39', NULL, '2021-03-02 18:49:39', NULL, b'01'),
(20, 4, 7, 4, NULL, NULL, 'Spring ', 1, 'lighton1.gif', 2, 100, 'yesssssssssssssssssssssssssssssssssssssssss', 'IIT', 17, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-02 18:56:15', NULL, '2021-03-02 18:56:15', NULL, b'01'),
(21, 4, 9, 4, NULL, NULL, 'jjjjjj', 1, 'lighton.jpg', 2, 20, 'yggggggggggggggggggggggggggggggg', 'IIT', 18, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'01', '950', 's11.jpg', '2021-03-02 19:07:24', NULL, '2021-03-02 19:07:24', NULL, b'01'),
(23, 10, 9, 10, NULL, NULL, 'eeeeeeeeee', 1, '10th_marksheet.jpeg', 2, 50, 'weeeeeeeeeeeeeee', 'GEC', 17, 'GOGO', '023', 'Ridham', b'00', '0', '12th_marksheet.jpeg', '2021-03-02 19:47:37', NULL, '2021-03-02 19:47:37', NULL, b'01'),
(24, 3, 9, 3, NULL, NULL, 'AWS', 2, '003.jpg', 3, 50, 'AWS is very big subject  & also very good one...', 'IIT', 101, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', '006.jpg', '2021-03-04 15:12:20', NULL, '2021-03-04 15:12:20', NULL, b'01'),
(25, 3, 9, 3, NULL, NULL, 'C Notes', 1, '004.jpg', 2, 100, 'yesssss!!!!!!!!!!!@@@@########...............', 'LJIET', 2, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '004.jpg', '2021-03-04 15:18:40', NULL, '2021-03-04 15:18:40', NULL, b'01'),
(26, 3, 9, 3, NULL, NULL, 'JAVA+++', 1, 'i1.png', 3, 100, 'yess!!! This is very nice book..!!!!', 'LDRP', 19, 'GOGO', '023', 'MR. Ridham Gandhi', b'01', '786', 's8.jpg', '2021-03-04 15:54:04', NULL, '2021-03-04 15:54:04', NULL, b'01'),
(27, 3, 9, 3, NULL, NULL, 'App Works', 3, 'i2.png', 1, 20, 'ohhhhh !!!!!!!!!!!!!!!!!!', 'GEC', 52, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'i4.jpg', '2021-03-04 16:02:43', NULL, '2021-03-04 16:02:43', NULL, b'01'),
(28, 3, 9, 3, NULL, NULL, 'CN', 2, 't6.png', 1, 100, 'ok... Fine We have to study CN subject!!', 'LDRP', 56, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '10000', 't3.jpeg', '2021-03-04 16:10:34', NULL, '2021-03-04 16:10:34', NULL, b'01'),
(29, 3, 9, 3, NULL, NULL, 'DBMS', 3, 'user-2.jpg', 3, 20, 'goooooooooooooood..................', 'GEC', 67, 'GOGO', '023', 'MR. Bhumin Mandal', b'00', '0', 'user-1.jpg', '2021-03-04 16:20:53', NULL, '2021-03-04 16:20:53', NULL, b'01'),
(30, 3, 6, 3, NULL, NULL, 'Data Structure', 1, 'M4.jpg', 1, 50, 'Data Structure is very important subject..', 'LDRP', 50, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '950', 'M1.png', '2021-03-04 16:37:39', NULL, '2021-03-04 16:37:39', NULL, b'01'),
(31, 3, 7, 3, NULL, NULL, 'OS', 1, 'M1.png', 2, 20, 'Finally I did it..', 'IIT', 54, 'GOGO', '023', 'MR. Ridham Gandhi', b'01', '700', 'loff.jpg', '2021-03-04 16:45:21', NULL, '2021-03-04 16:45:21', NULL, b'01'),
(32, 3, 9, 3, NULL, NULL, 'WWW', 1, 'lighton.jpg', 2, 100, 'uyjhhhhhhhhhhhhhhhhhhh', 'GEC', 2, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'lighton1.gif', '2021-03-04 16:51:49', NULL, '2021-03-04 16:51:49', NULL, b'01'),
(33, 3, 9, 3, NULL, NULL, 'DS', 1, 'lon.jpg', 1, 50, 'lllllllllllllllllllllllllllllllllllllllll', 'LJIET', 16, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '10000', 'lighton1.gif', '2021-03-04 16:53:36', NULL, '2021-03-04 16:53:36', NULL, b'01'),
(34, 3, 7, 3, NULL, NULL, 'SE', 1, 'lightoff.jpg', 3, 50, 'ok.........................', 'MS', 246, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', 'bitnami.ico', '2021-03-04 16:57:46', NULL, '2021-03-04 16:57:46', NULL, b'01'),
(35, 3, 9, 3, NULL, NULL, 'EME', 2, 'Riya_Photo.jpg', 1, 100, 'DONE!!!!!!!!!!!!!!!!!!!!!!!!!', 'LDRP', 19, 'GOGO', '023', 'Ridham', b'00', '0', 'Pan_card.jpeg', '2021-03-04 17:06:08', NULL, '2021-03-04 17:06:08', NULL, b'01'),
(36, 3, 9, 3, NULL, NULL, 'CD', 4, 'client-5.png', 2, 20, 'CD is very nice subject..', 'IIT', 63, 'GOGO', '023', 'Ridham', b'01', '10000', 'client-8.png', '2021-03-04 17:11:57', NULL, '2021-03-04 17:11:57', NULL, b'01'),
(39, 3, 7, 3, NULL, NULL, 'Maths', 1, 'pin-location.png', 1, 50, 'oooooooooooooooooooooooooooooo', 'IIT', 15, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '0', '', '2021-03-04 21:56:08', NULL, '2021-03-04 21:56:08', NULL, b'01'),
(40, 3, 6, 3, NULL, NULL, 'CA1', 1, 'stats-bg.jpg', 2, 50, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'LDRP', 13, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '255', '', '2021-03-04 21:59:17', NULL, '2021-03-04 21:59:17', NULL, b'01'),
(49, 29, 6, NULL, NULL, NULL, 'MVC', 2, 'IMG-20180530-WA0159.jpg', 1, 100, 'okkkkkkkkkkkkkkkk', 'LDRP', 3, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '1000000', 't2.jpg', '2021-03-05 16:36:46', NULL, '2021-03-05 16:36:46', NULL, b'01'),
(50, 29, 6, NULL, NULL, NULL, 'NCC', 1, 't6.png', 2, 50, 'fine!!!!!!!!!!!!!!!!!!!!!!!!', 'LJIET', 17, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', 's9.jpg', '2021-03-05 16:57:41', NULL, '2021-03-05 16:57:41', NULL, b'01'),
(51, 29, 6, NULL, NULL, NULL, 'OM', 2, 'IMG-20180530-WA0159.jpg', 1, 100, 'Okkkkkkkkk', 'LJIET', 18, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', 's11.jpg', '2021-03-05 17:02:32', NULL, '2021-03-05 17:02:32', NULL, b'01'),
(52, 29, 6, NULL, NULL, NULL, 'DSS', 2, 'IMG-20180530-WA0159.jpg', 2, 20, 'okkkkkk!!!!!!!!!!!!!!', 'IIT', 56, 'GOGO', '023', 'MR. Bhumin Mandal', b'00', '0', 's3.jpg', '2021-03-05 17:06:45', NULL, '2021-03-05 17:06:45', NULL, b'01'),
(53, 29, 6, NULL, NULL, NULL, 'ES', 3, 'l1.jpg', 1, 100, 'Good Notes.......', 'GEC', 48, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '789', 'loff.jpg', '2021-03-05 17:10:33', NULL, '2021-03-05 17:10:33', NULL, b'01'),
(54, 29, 6, NULL, NULL, NULL, 'BM', 1, 'lon.jpg', 3, 50, 'ok...', 'LDRP', 14, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', 'lighton1.gif', '2021-03-05 17:15:31', NULL, '2021-03-05 17:15:31', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachments`
--

CREATE TABLE `sellernotesattachments` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(10000) NOT NULL COMMENT 'Notes Attachments user uploads with file name.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record. Super Admin ID you can insert static.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellernotesattachments`
--

INSERT INTO `sellernotesattachments` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 26, 's5.jpg', 'Members/3/1/Attachments/s5.jpg', '2021-03-04 15:54:04', NULL, '2021-03-04 15:54:04', NULL, b'01'),
(2, 27, 'admin.rar', 'Members/3/1/Attachments/admin.rar', '2021-03-04 16:02:43', NULL, '2021-03-04 16:02:43', NULL, b'01'),
(3, 28, 'favicon_io.zip', 'Members/3/28/Attachments/favicon_io.zip', '2021-03-04 16:10:34', NULL, '2021-03-04 16:10:34', NULL, b'01'),
(4, 29, 'style (1).css', 'Members/3/29/Attachments/style (1).css', '2021-03-04 16:20:53', NULL, '2021-03-04 16:20:53', NULL, b'01'),
(5, 30, 'NotesMarketPlace_Data_Dictionary.sql.zip', 'Members/3/30/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', '2021-03-04 16:37:39', NULL, '2021-03-04 16:37:39', NULL, b'01'),
(6, 31, '.project', 'Members/3/31/Attachments/.project', '2021-03-04 16:45:21', NULL, '2021-03-04 16:45:21', NULL, b'01'),
(7, 32, 'loff.jpg', 'Members/3/32/Attachments/loff.jpg', '2021-03-04 16:51:49', NULL, '2021-03-04 16:51:49', NULL, b'01'),
(9, 34, 'bitnami.ico', 'Members/3/34/Attachments/bitnami.ico', '2021-03-04 16:57:46', NULL, '2021-03-04 16:57:46', NULL, b'01'),
(10, 35, '12th_marksheet.jpeg', 'Members/3/35/Attachments/12th_marksheet.jpeg', '2021-03-04 17:06:08', NULL, '2021-03-04 17:06:08', NULL, b'01'),
(14, 39, 'admin.rar', 'Members/3/39/Attachments/admin.rar', '2021-03-04 21:56:08', NULL, '2021-03-04 21:56:08', NULL, b'01'),
(15, 40, 'a1.java', 'Members/3/40/Attachments/a1.java', '2021-03-04 21:59:17', NULL, '2021-03-04 21:59:17', NULL, b'01'),
(16, 49, 'Array', 'Members/29/49/Attachments/Array', '2021-03-05 16:36:46', NULL, '2021-03-05 16:36:46', NULL, b'01'),
(17, 50, 'M', 'Members/29/50/Attachments/M', '2021-03-05 16:57:41', NULL, '2021-03-05 16:57:41', NULL, b'01'),
(18, 51, 'i', 'Members/29/51/Attachments/i', '2021-03-05 17:04:32', NULL, '2021-03-05 17:04:32', NULL, b'01'),
(19, 52, 'M', 'Members/29/52/Attachments/M', '2021-03-05 17:06:45', NULL, '2021-03-05 17:06:45', NULL, b'01'),
(20, 53, 'NotesMarketPlace_Data_Dictionary.sql.zip', 'Members/29/53/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', '2021-03-05 17:10:33', NULL, '2021-03-05 17:10:33', NULL, b'01'),
(21, 53, 'NoteMarketPlace_Database_Riya_Gandhi (2).zip', 'Members/29/53/Attachments/NoteMarketPlace_Database_Riya_Gandhi (2).zip', '2021-03-05 17:10:33', NULL, '2021-03-05 17:10:33', NULL, b'01'),
(22, 54, 'NotesMarketPlace_Data_Dictionary.sql.zip', 'Members/29/54/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', '2021-03-05 17:15:31', NULL, '2021-03-05 17:15:31', NULL, b'01'),
(23, 54, 'NoteMarketPlace_Database_Riya_Gandhi (2).zip', 'Members/29/54/Attachments/NoteMarketPlace_Database_Riya_Gandhi (2).zip', '2021-03-05 17:15:31', NULL, '2021-03-05 17:15:31', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--

CREATE TABLE `sellernotesreportedissues` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `ReportedBYID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with users table.',
  `AgainstDownloadID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Downloads table.',
  `Remarks` varchar(10000) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record. Super Admin ID you can insert static.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `ReviewedByID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `AgainstDownloadsID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Downloads table.',
  `Ratings` decimal(10,0) NOT NULL COMMENT 'Ratings can be 1 to 5. it is also can be 1.5,2.5 etc. this is required.',
  `Comments` varchar(10000) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record. ',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record. Super Admin Id you can insert static.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_configuration`
--

CREATE TABLE `system_configuration` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `KeyNote` varchar(100) NOT NULL COMMENT 'SupportEmailAddress, SupportContact Number, EmailAddressesForNotify, DefaultNoteDisplayPicture, DefaultMemberDisplayPicture, FBICON, TWITTERICON, LNICON etc.',
  `Value` varchar(1000) NOT NULL COMMENT 'Value of each key which will Super Admin will Configure.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.Super Admin ID you can insert static.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'HandWritten notes, university notes, novel, story books etc.',
  `Description` varchar(500) NOT NULL COMMENT 'Description to explain what this type means.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Val1', 'Lorem ipsum is simply dummy text', '2021-02-22 22:11:10', NULL, '2021-02-22 22:11:10', NULL, b'01'),
(2, 'Val2', 'Lorem ipsum is simply dummy text', '2021-02-22 22:35:13', NULL, '2021-02-22 22:35:13', NULL, b'01'),
(3, 'Val3', 'Lorem ipsum is simply dummy text', '2021-02-22 22:35:30', NULL, '2021-02-22 22:35:30', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL COMMENT 'Primary Key',
  `UserID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with ReferenceData table.bind distinct value from ReferenceDtata table with filter RefCategory=''Gender'' ans IsActive = 1.',
  `SecondaryEmailAddress` varchar(100) NOT NULL COMMENT 'For Admin user only.',
  `Phone number - Country Code` varchar(5) NOT NULL COMMENT 'bind distinct CountryCode from Country table with filter IsActive=1.',
  `Phone number` varchar(20) NOT NULL,
  `Profile Picture` varchar(500) DEFAULT NULL COMMENT 'Profile Picture of the user. ',
  `Address Line 1` varchar(100) NOT NULL,
  `Address Line 2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip Code` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL COMMENT 'Bind distinct Country from Country table with filter IsActive=1.',
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created a record.',
  `CraetedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this rocord.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this rocord.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Phone number - Country Code`, `Phone number`, `Profile Picture`, `Address Line 1`, `Address Line 2`, `City`, `State`, `Zip Code`, `Country`, `University`, `College`, `CreatedDate`, `CraetedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 3, '1999-10-10 00:00:00', 2, '', '+91', '9898150042', '', '320,Gokuldham Society near goregav', ',Bombay-75', 'Ahmedabad', 'Gujarat', '310008', 'India', 'GTU', 'LJIET', '2021-02-23 16:27:16', NULL, '2021-02-23 16:27:16', NULL),
(2, 10, '1999-10-06 00:00:00', 1, '', '+91', '9687848995', '', '56,Arihant Society near bus stop', 'vasna,Ahmedabad-380007', 'Ahmedabad', 'Gujarat', '380007', 'India', 'IIT', 'LJIET', '2021-02-23 16:32:30', NULL, '2021-02-23 16:32:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(50) NOT NULL COMMENT 'Entries can be Member, Admin or Super Admin',
  `Description` varchar(400) DEFAULT NULL COMMENT 'What this role usage is one can write here.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record. Super Admin ID you can insert static.',
  `IsActive` bit(2) NOT NULL DEFAULT b'1' COMMENT 'Required Information,Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Admin', 'Admin Who can have control on all over.. ', '2021-02-20 12:56:57', 0, '2021-02-20 12:56:57', 0, b'01'),
(2, 'Member', 'User who is gonna use our website..', '2021-02-20 13:15:27', 0, '2021-02-20 13:15:27', 0, b'01'),
(3, 'Super Admin', 'Super Admin who can manage all activities of users...', '2021-02-20 13:21:51', 0, '2021-02-20 13:21:51', 0, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `RoleID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with UserRoles table',
  `FirstName` varchar(50) NOT NULL COMMENT 'Required Information',
  `LastName` varchar(50) NOT NULL COMMENT 'Required Information',
  `EmailID` varchar(100) NOT NULL COMMENT 'Required Information | Unique EmailID across table.',
  `Password` varchar(24) NOT NULL COMMENT 'Required Information',
  `IsEmailVerified` bit(2) DEFAULT b'0' COMMENT 'Required Information, Default set to false.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who updateds this record.',
  `IsActive` bit(2) NOT NULL DEFAULT b'10' COMMENT 'Required Information, default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(3, 1, 'Riya', 'Gandhi', 'riya1999@gmail.com', 'Riya143', b'01', '2021-02-20 13:15:27', NULL, '2021-02-20 13:15:27', NULL, b'10'),
(4, 1, 'Ridham', 'Gandhi', 'gandhiridham@gmail.com', 'Ridham173', b'01', '2021-02-20 13:22:25', NULL, '2021-02-20 13:22:25', NULL, b'10'),
(10, 2, 'Mihir', 'Patel', 'mihirpatel06@gmail.com', 'Riya658', b'01', '2021-02-20 18:47:53', NULL, '2021-02-20 18:47:53', NULL, b'10'),
(11, 2, 'Deep', 'Dave', 'deepdave21@gmail.com', 'Riya658', b'01', '2021-02-20 18:50:58', NULL, '2021-02-20 18:50:58', NULL, b'10'),
(12, 2, 'Shailvi', 'Gandhi', 'shailvigandhi@gmail.com', 'Riya658', b'01', '2021-02-20 19:05:25', NULL, '2021-02-20 19:05:25', NULL, b'10'),
(13, 2, 'stephan', 'howkins', 'stephan@gmail.com', 'Riya658', b'01', '2021-02-21 13:42:30', NULL, '2021-02-21 13:42:30', NULL, b'10'),
(19, 2, 'Dhruvil', 'Patel', 'dhruvilpatel@gmail.com', 'Dhdhdh$10', b'00', '2021-03-02 20:02:07', NULL, '2021-03-02 20:02:07', NULL, b'10'),
(20, 2, 'Raj', 'Patel', 'rajpatel85@gmail.com', 'Raj$8435', b'01', '2021-03-03 11:32:53', NULL, '2021-03-03 11:32:53', NULL, b'10'),
(21, 2, 'Krishna', 'Gandhi', 'krishnagandhi2112@gmail.com', 'Krishna@2112', b'00', '2021-03-03 11:36:57', NULL, '2021-03-03 11:36:57', NULL, b'10'),
(22, 2, 'Kanika', 'Patel', 'Kanikapatel78@gmail.com', 'Kanika#7878', b'00', '2021-03-03 15:54:52', NULL, '2021-03-03 15:54:52', NULL, b'10'),
(23, 2, 'Munu', 'Trivedi', 'Munutrivedi2020@gmail.com', 'Munu@2020', b'00', '2021-03-05 10:36:44', NULL, '2021-03-05 10:36:44', NULL, b'10'),
(24, 2, 'KKR', 'Dave', 'KKRDave745@gmail.com', 'KKRdave#3030', b'00', '2021-03-05 10:39:29', NULL, '2021-03-05 10:39:29', NULL, b'10'),
(25, 2, 'Diku', 'Jadav', 'DikuJadav789@gmail.com', 'Diku@5050', b'00', '2021-03-05 10:44:58', NULL, '2021-03-05 10:44:58', NULL, b'10'),
(26, 2, 'Miya', 'Gandhi', 'MiyaGandhi1006@gmail.com', 'Miyamr@1006', b'00', '2021-03-05 10:49:07', NULL, '2021-03-05 10:49:07', NULL, b'10'),
(27, 2, 'Roli', 'Dave', 'rolidave568@gmail.com', 'Roli@1010', b'01', '2021-03-05 14:05:36', NULL, '2021-03-05 14:05:36', NULL, b'10'),
(28, 2, 'Boby', 'Jhonson', 'boby20368@gmail.com', 'Boby$1987', b'01', '2021-03-05 14:42:26', NULL, '2021-03-05 14:42:26', NULL, b'10'),
(29, 2, 'Zen', 'Jadav', 'gandhiriya99@gmail.com', 'Zen@9898', b'01', '2021-03-05 14:49:16', NULL, '2021-03-05 14:49:16', NULL, b'10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ActionBy` (`ActionBy`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`);

--
-- Indexes for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedBYID` (`ReportedBYID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

--
-- Indexes for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `system_configuration`
--
ALTER TABLE `system_configuration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Gender` (`Gender`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=2444;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

--
-- Constraints for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD CONSTRAINT `sellernotes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_3` FOREIGN KEY (`ActionBy`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_4` FOREIGN KEY (`Category`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_5` FOREIGN KEY (`NoteType`) REFERENCES `types` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_6` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`);

--
-- Constraints for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD CONSTRAINT `sellernotesattachments_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`);

--
-- Constraints for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_2` FOREIGN KEY (`ReportedBYID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD CONSTRAINT `sellernotesreviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `RoleID` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
