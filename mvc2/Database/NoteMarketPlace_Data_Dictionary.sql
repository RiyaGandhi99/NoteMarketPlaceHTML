-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 09:42 PM
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
(2, 'Science', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:15', NULL, '2021-02-22 22:39:15', NULL, b'00'),
(3, 'IT', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:21', NULL, '2021-02-22 22:39:21', NULL, b'01'),
(4, 'History', 'Lorem ipsum is simply dummy text', '2021-02-22 22:39:34', NULL, '2021-02-22 22:39:34', NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
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

INSERT INTO `countries` (`ID`, `Name`, `Phonecode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Afghanistan', 93, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(2, 'Albania', 355, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'00'),
(3, 'Algeria', 213, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(4, 'American Samoa', 1684, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'00'),
(5, 'Andorra', 376, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(6, 'Angola', 244, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(7, 'Anguilla', 1264, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(8, 'Antarctica', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(9, 'Antigua And Barbuda', 1268, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(10, 'Argentina', 54, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(11, 'Armenia', 374, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(12, 'Aruba', 297, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(13, 'Australia', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(14, 'Austria', 43, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(15, 'Azerbaijan', 994, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(16, 'Bahamas The', 1242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(17, 'Bahrain', 973, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(18, 'Bangladesh', 880, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(19, 'Barbados', 1246, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(20, 'Belarus', 375, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(21, 'Belgium', 32, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(22, 'Belize', 501, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(23, 'Benin', 229, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(24, 'Bermuda', 1441, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(25, 'Bhutan', 975, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(26, 'Bolivia', 591, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(27, 'Bosnia and Herzegovina', 387, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(28, 'Botswana', 267, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(29, 'Bouvet Island', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(30, 'Brazil', 55, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(31, 'British Indian Ocean Territory', 246, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(32, 'Brunei', 673, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(33, 'Bulgaria', 359, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(34, 'Burkina Faso', 226, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(35, 'Burundi', 257, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(36, 'Cambodia', 855, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(37, 'Cameroon', 237, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(38, 'Canada', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(39, 'Cape Verde', 238, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(40, 'Cayman Islands', 1345, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(41, 'Central African Republic', 236, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(42, 'Chad', 235, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(43, 'Chile', 56, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(44, 'China', 86, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(45, 'Christmas Island', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(46, 'Cocos (Keeling) Islands', 672, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(47, 'Colombia', 57, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(48, 'Comoros', 269, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(49, 'Congo', 242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(50, 'Congo The Democratic Republic Of The', 242, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(51, 'Cook Islands', 682, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(52, 'Costa Rica', 506, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(53, 'Cote D Ivoire (Ivory Coast)', 225, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(54, 'Croatia (Hrvatska)', 385, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(55, 'Cuba', 53, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(56, 'Cyprus', 357, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(57, 'Czech Republic', 420, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(58, 'Denmark', 45, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(59, 'Djibouti', 253, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(60, 'Dominica', 1767, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(61, 'Dominican Republic', 1809, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(62, 'East Timor', 670, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(63, 'Ecuador', 593, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(64, 'Egypt', 20, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(65, 'El Salvador', 503, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(66, 'Equatorial Guinea', 240, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(67, 'Eritrea', 291, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(68, 'Estonia', 372, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(69, 'Ethiopia', 251, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(70, 'External Territories of Australia', 61, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(71, 'Falkland Islands', 500, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(72, 'Faroe Islands', 298, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(73, 'Fiji Islands', 679, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(74, 'Finland', 358, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(75, 'France', 33, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(76, 'French Guiana', 594, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(77, 'French Polynesia', 689, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'00'),
(78, 'French Southern Territories', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(79, 'Gabon', 241, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(80, 'Gambia The', 220, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(81, 'Georgia', 995, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(82, 'Germany', 49, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(83, 'Ghana', 233, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(84, 'Gibraltar', 350, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(85, 'Greece', 30, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(86, 'Greenland', 299, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(87, 'Grenada', 1473, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(88, 'Guadeloupe', 590, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(89, 'Guam', 1671, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(90, 'Guatemala', 502, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(91, 'Guernsey and Alderney', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(92, 'Guinea', 224, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(93, 'Guinea-Bissau', 245, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(94, 'Guyana', 592, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(95, 'Haiti', 509, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(96, 'Heard and McDonald Islands', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(97, 'Honduras', 504, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(98, 'Hong Kong S.A.R.', 852, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(99, 'Hungary', 36, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(100, 'Iceland', 354, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(101, 'India', 91, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(102, 'Indonesia', 62, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(103, 'Iran', 98, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(104, 'Iraq', 964, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(105, 'Ireland', 353, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(106, 'Israel', 972, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(107, 'Italy', 39, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(108, 'Jamaica', 1876, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(109, 'Japan', 81, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(110, 'Jersey', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(111, 'Jordan', 962, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(112, 'Kazakhstan', 7, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(113, 'Kenya', 254, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(114, 'Kiribati', 686, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(115, 'Korea North', 850, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(116, 'Korea South', 82, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(117, 'Kuwait', 965, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(118, 'Kyrgyzstan', 996, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(119, 'Laos', 856, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(120, 'Latvia', 371, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(121, 'Lebanon', 961, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(122, 'Lesotho', 266, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(123, 'Liberia', 231, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(124, 'Libya', 218, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(125, 'Liechtenstein', 423, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(126, 'Lithuania', 370, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(127, 'Luxembourg', 352, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(128, 'Macau S.A.R.', 853, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(129, 'Macedonia', 389, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(130, 'Madagascar', 261, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(131, 'Malawi', 265, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(132, 'Malaysia', 60, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(133, 'Maldives', 960, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(134, 'Mali', 223, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(135, 'Malta', 356, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(136, 'Man (Isle of)', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(137, 'Marshall Islands', 692, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(138, 'Martinique', 596, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(139, 'Mauritania', 222, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(140, 'Mauritius', 230, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(141, 'Mayotte', 269, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(142, 'Mexico', 52, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(143, 'Micronesia', 691, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(144, 'Moldova', 373, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(145, 'Monaco', 377, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(146, 'Mongolia', 976, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(147, 'Montserrat', 1664, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(148, 'Morocco', 212, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(149, 'Mozambique', 258, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(150, 'Myanmar', 95, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(151, 'Namibia', 264, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(152, 'Nauru', 674, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(153, 'Nepal', 977, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(154, 'Netherlands Antilles', 599, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(155, 'Netherlands The', 31, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(156, 'New Caledonia', 687, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(157, 'New Zealand', 64, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(158, 'Nicaragua', 505, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(159, 'Niger', 227, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(160, 'Nigeria', 234, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(161, 'Niue', 683, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(162, 'Norfolk Island', 672, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(163, 'Northern Mariana Islands', 1670, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(164, 'Norway', 47, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(165, 'Oman', 968, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(166, 'Pakistan', 92, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(167, 'Palau', 680, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(168, 'Palestinian Territory Occupied', 970, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(169, 'Panama', 507, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(170, 'Papua new Guinea', 675, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(171, 'Paraguay', 595, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(172, 'Peru', 51, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(173, 'Philippines', 63, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(174, 'Pitcairn Island', 0, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(175, 'Poland', 48, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(176, 'Portugal', 351, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(177, 'Puerto Rico', 1787, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(178, 'Qatar', 974, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(179, 'Reunion', 262, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(180, 'Romania', 40, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(181, 'Russia', 70, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(182, 'Rwanda', 250, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(183, 'Saint Helena', 290, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(184, 'Saint Kitts And Nevis', 1869, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(185, 'Saint Lucia', 1758, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(186, 'Saint Pierre and Miquelon', 508, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(187, 'Saint Vincent And The Grenadines', 1784, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(188, 'Samoa', 684, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(189, 'San Marino', 378, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(190, 'Sao Tome and Principe', 239, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(191, 'Saudi Arabia', 966, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(192, 'Senegal', 221, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(193, 'Serbia', 381, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(194, 'Seychelles', 248, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(195, 'Sierra Leone', 232, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(196, 'Singapore', 65, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(197, 'Slovakia', 421, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(198, 'Slovenia', 386, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(199, 'Smaller Territories of the UK', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(200, 'Solomon Islands', 677, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(205, 'Spain', 34, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(206, 'Sri Lanka', 94, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(210, 'Swaziland', 268, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(212, 'Switzerland', 41, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(213, 'Syria', 963, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(227, 'Uganda', 256, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(228, 'Ukraine', 380, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(229, 'United Arab Emirates', 971, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(230, 'United Kingdom', 44, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(231, 'United States', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(232, 'United States Minor Outlying Islands', 1, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01'),
(245, 'Zambia', 260, '2021-02-23 14:33:46', NULL, '2021-02-23 14:33:46', NULL, b'01');

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

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(3, 4, 10, 21, b'01', 'Members/3/4/Attachments/style (1).css', b'00', NULL, 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(4, 31, 20, 10, b'01', 'Members/3/4/Attachments/style (1).css', b'01', '2021-03-16 11:41:08', 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(5, 4, 10, 12, b'00', 'Members/3/4/Attachments/style (1).css', b'00', NULL, 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(6, 4, 10, 25, b'00', 'Members/3/4/Attachments/style (1).css', b'00', NULL, 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(11, 4, 27, 3, b'00', 'Members/3/4/Attachments/style (1).css', b'01', NULL, 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(12, 4, 10, 3, b'01', 'Members/3/4/Attachments/style (1).css', b'00', NULL, 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(13, 39, 3, 10, b'01', 'Members/29/39/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', b'01', '2021-03-14 14:10:11', 0, b'0000000000000000000000000000000000000000000000000000000000000000', 'Maths', 'Computer', NULL, NULL, NULL, NULL),
(14, 39, 3, 20, b'01', 'Members/29/39/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', b'01', NULL, 0, b'0000000000000000000000000000000000000000000000000000000000000000', 'Maths', 'Computer', NULL, NULL, NULL, NULL),
(16, 39, 3, 27, b'01', 'Members/29/39/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', b'01', NULL, 0, b'0000000000000000000000000000000000000000000000000000000000000000', 'Maths', 'Computer', NULL, NULL, NULL, NULL),
(20, 3, 3, 10, b'00', 'Members/3/28/Attachments/favicon_io.zip', b'00', '2021-03-24 03:23:07', 1, b'0000000000000000000000000000000000000000000000000000000011111010', 'Handwritten Notes', 'IT', NULL, NULL, NULL, NULL),
(22, 39, 10, 20, b'01', 'Members/29/39/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', b'01', '2021-03-24 16:29:42', 0, b'0000000000000000000000000000000000000000000000000000000000000000', 'Maths', 'Computer', NULL, NULL, NULL, NULL),
(64, 4, 10, 27, b'01', 'Members/3/4/Attachments/style (1).css', b'00', '2021-03-27 04:12:41', 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(66, 4, 10, 28, b'01', 'Members/3/4/Attachments/style (1).css', b'01', '2021-03-27 04:20:44', 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(67, 4, 10, 23, b'01', 'Members/3/4/Attachments/style (1).css', b'01', '2021-03-27 15:36:52', 1, b'0000000000000000000000000000000000000000000000000000000111110100', 'AI Learning', 'Computer', NULL, NULL, NULL, NULL),
(68, 21, 10, 29, b'01', 'Members/29/21/Attachments/Math-I.pdf', b'01', '2021-03-27 15:37:11', 1, b'0000000000000000000000000000000000000000000000000000000000000000', 'jjjjjj', 'Computer', NULL, NULL, NULL, NULL);

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
(4, 10, 8, 10, NULL, NULL, 'AI Learning', 1, '', 3, 0, 'OK!!! IT is very useful notes.. ', 'LJIET', 4, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '500', '', '2021-02-23 09:49:08', NULL, '2021-02-23 09:49:08', NULL, b'01'),
(10, 4, 6, 4, NULL, NULL, 'C++ Notes', 3, '', 3, 0, 'C++ is the basic language...', 'IIT', 47, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-01 10:34:28', NULL, '2021-03-01 10:34:28', NULL, b'01'),
(15, 4, 6, 4, NULL, NULL, '.Net Notes', 1, '240380_Pink Roses 2.jpg', 2, 20, '.Net is also very nice PL....', 'MS', 101, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'banner.jpg', '2021-03-02 16:53:28', NULL, '2021-03-02 16:53:28', NULL, b'01'),
(18, 4, 7, 4, NULL, NULL, 'Opentext', 2, '5.png', 3, 50, 'Open Text is also PL.....', 'GEC', 16, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '500', 'l1.jpg', '2021-03-02 18:49:39', NULL, '2021-03-02 18:49:39', NULL, b'01'),
(20, 4, 7, 4, NULL, NULL, 'Spring ', 1, 'lighton1.gif', 2, 100, 'yesssssssssssssssssssssssssssssssssssssssss', 'IIT', 17, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-02 18:56:15', NULL, '2021-03-02 18:56:15', NULL, b'01'),
(21, 4, 9, 4, NULL, NULL, 'jjjjjj', 1, 'lighton.jpg', 2, 20, 'yggggggggggggggggggggggggggggggg', 'IIT', 18, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'01', '950', 's11.jpg', '2021-03-02 19:07:24', NULL, '2021-03-02 19:07:24', NULL, b'01'),
(23, 10, 9, 10, NULL, NULL, 'eeeeeeeeee', 1, '10th_marksheet.jpeg', 2, 50, 'weeeeeeeeeeeeeee', 'GEC', 17, 'GOGO', '023', 'Ridham', b'00', '0', '12th_marksheet.jpeg', '2021-03-02 19:47:37', NULL, '2021-03-02 19:47:37', NULL, b'01'),
(24, 3, 9, 3, NULL, NULL, 'AWS', 2, '003.jpg', 3, 50, 'AWS is very big subject  & also very good one...', 'IIT', 101, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', '006.pdf', '2021-03-04 15:12:20', NULL, '2021-03-04 15:12:20', NULL, b'01'),
(25, 3, 9, 3, NULL, NULL, 'C Notes', 1, '004.jpg', 2, 100, 'yesssss!!!!!!!!!!!@@@@########...............', 'LJIET', 2, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '004.jpg', '2021-03-04 15:18:40', NULL, '2021-03-04 15:18:40', NULL, b'01'),
(26, 3, 9, 3, NULL, NULL, 'JAVA+++', 1, 'i1.png', 3, 100, 'yess!!! This is very nice book..!!!!', 'LDRP', 19, 'GOGO', '023', 'MR. Ridham Gandhi', b'01', '786', 's8.jpg', '2021-03-04 15:54:04', NULL, '2021-03-04 15:54:04', NULL, b'01'),
(27, 3, 9, 3, NULL, NULL, 'App Works', 3, 'i2.png', 1, 20, 'ohhhhh !!!!!!!!!!!!!!!!!!', 'GEC', 52, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'i4.jpg', '2021-03-04 16:02:43', NULL, '2021-03-04 16:02:43', NULL, b'01'),
(28, 3, 9, 3, NULL, NULL, 'CN', 2, 't6.png', 1, 100, 'ok... Fine We have to study CN subject!!', 'LDRP', 56, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '10000', 't3.jpeg', '2021-03-04 16:10:34', NULL, '2021-03-04 16:10:34', NULL, b'01'),
(29, 3, 9, 3, NULL, NULL, 'DBMS', 3, 'user-2.jpg', 3, 20, 'goooooooooooooood..................', 'GEC', 67, 'GOGO', '023', 'MR. Bhumin Mandal', b'00', '0', 'user-1.jpg', '2021-03-04 16:20:53', NULL, '2021-03-04 16:20:53', NULL, b'01'),
(30, 3, 6, 3, NULL, NULL, 'Data Structure', 1, 'M4.jpg', 1, 50, 'Data Structure is very important subject..', 'LDRP', 50, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '950', 'M1.png', '2021-03-04 16:37:39', NULL, '2021-03-04 16:37:39', NULL, b'01'),
(31, 3, 8, 3, NULL, NULL, 'OS', 1, 'M1.png', 2, 20, 'Finally I did it..', 'IIT', 54, 'GOGO', '023', 'MR. Ridham Gandhi', b'01', '700', 'loff.jpg', '2021-03-04 16:45:21', NULL, '2021-03-04 16:45:21', NULL, b'01'),
(32, 3, 9, 3, NULL, NULL, 'WWW', 1, 'lighton.jpg', 2, 100, 'uyjhhhhhhhhhhhhhhhhhhh', 'GEC', 2, 'GOGO', '023', 'Ms. Pooja A. Mehta', b'00', '0', 'lighton1.gif', '2021-03-04 16:51:49', NULL, '2021-03-04 16:51:49', NULL, b'01'),
(33, 3, 9, 3, NULL, NULL, 'DS', 1, 'lon.jpg', 1, 50, 'lllllllllllllllllllllllllllllllllllllllll', 'LJIET', 16, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '10000', 'lighton1.gif', '2021-03-04 16:53:36', NULL, '2021-03-04 16:53:36', NULL, b'01'),
(34, 3, 7, 3, NULL, NULL, 'SE', 1, 'lightoff.jpg', 3, 50, 'ok.........................', 'MS', 246, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', 'bitnami.ico', '2021-03-04 16:57:46', NULL, '2021-03-04 16:57:46', NULL, b'01'),
(35, 3, 9, 3, NULL, NULL, 'EME', 2, 'Riya_Photo.jpg', 1, 100, 'DONE!!!!!!!!!!!!!!!!!!!!!!!!!', 'LDRP', 19, 'GOGO', '023', 'Ridham', b'00', '0', 'Pan_card.jpeg', '2021-03-04 17:06:08', NULL, '2021-03-04 17:06:08', NULL, b'01'),
(36, 3, 9, 3, NULL, NULL, 'CD', 4, 'client-5.png', 2, 20, 'CD is very nice subject..', 'IIT', 63, 'GOGO', '023', 'Ridham', b'01', '10000', 'client-8.png', '2021-03-04 17:11:57', NULL, '2021-03-04 17:11:57', NULL, b'01'),
(39, 10, 10, 10, 'This Note is not good for viewers..', NULL, 'Maths', 1, 'pin-location.png', 1, 50, 'lorem is dummy text.', 'IIT', 15, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-04 21:56:08', NULL, '2021-03-04 21:56:08', NULL, b'01'),
(40, 3, 6, 3, NULL, NULL, 'CA1', 1, 'stats-bg.jpg', 2, 50, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'LDRP', 13, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'01', '255', '', '2021-03-04 21:59:17', NULL, '2021-03-04 21:59:17', NULL, b'01'),
(49, 29, 6, NULL, NULL, NULL, 'MVC', 2, 'IMG-20180530-WA0159.jpg', 1, 100, 'okkkkkkkkkkkkkkkk', 'LDRP', 3, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '1000000', 't2.jpg', '2021-03-05 16:36:46', NULL, '2021-03-05 16:36:46', NULL, b'01'),
(50, 29, 6, NULL, NULL, NULL, 'NCC', 1, 't6.png', 2, 50, 'fine!!!!!!!!!!!!!!!!!!!!!!!!', 'LJIET', 17, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', 's9.jpg', '2021-03-05 16:57:41', NULL, '2021-03-05 16:57:41', NULL, b'01'),
(51, 29, 6, NULL, NULL, NULL, 'OM', 2, 'IMG-20180530-WA0159.jpg', 1, 100, 'Okkkkkkkkk', 'LJIET', 18, 'GOGO', '023', 'MR. Ridham Gandhi', b'00', '0', 's11.jpg', '2021-03-05 17:02:32', NULL, '2021-03-05 17:02:32', NULL, b'01'),
(52, 29, 6, NULL, NULL, NULL, 'DSS', 2, 'IMG-20180530-WA0159.jpg', 2, 20, 'okkkkkk!!!!!!!!!!!!!!', 'IIT', 56, 'GOGO', '023', 'MR. Bhumin Mandal', b'00', '0', 's3.jpg', '2021-03-05 17:06:45', NULL, '2021-03-05 17:06:45', NULL, b'01'),
(53, 29, 6, NULL, NULL, NULL, 'ES', 3, 'l1.jpg', 1, 100, 'Good Notes.......', 'GEC', 48, 'GOGO', '023', 'MR. Bhumin Mandal', b'01', '789', 'loff.jpg', '2021-03-05 17:10:33', NULL, '2021-03-05 17:10:33', NULL, b'01'),
(54, 10, 6, NULL, NULL, NULL, 'BM', 1, '', 2, 0, 'okkkkkkkkkkkkkkkkkk', 'LDRP', 14, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-05 17:15:31', NULL, '2021-03-05 17:15:31', NULL, b'01'),
(55, 10, 6, NULL, NULL, NULL, 'S3 Service', 1, '', 3, 0, 'okkkkkkkkkkkkkkkk', 'LJIET', 3, 'GOGO', '023', 'MR. A P J Abdul Kalam', b'00', '0', '', '2021-03-26 23:38:39', NULL, '2021-03-26 23:38:39', NULL, b'01');

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
(1, 39, 'Math-I.pdf', 'Members/29/39/Attachments/Math-I.pdf', '2021-03-04 15:54:04', NULL, '2021-03-04 15:54:04', NULL, b'01'),
(2, 39, 'Notes Marketplace - Admin', 'Members/29/39/Attachments/Notes Marketplace - Admin.pdf', '2021-03-04 16:02:43', NULL, '2021-03-04 16:02:43', NULL, b'01'),
(3, 54, 'NoteMarketPlace_Database_Riya_Gandhi (2).zip', 'Members/10/54/Attachments/NoteMarketPlace_Database_Riya_Gandhi (2).zip', '2021-03-04 16:10:34', NULL, '2021-03-04 16:10:34', NULL, b'01'),
(4, 54, 'NotesMarketPlace_Data_Dictionary.sql.zip', 'Members/10/54/Attachments/NotesMarketPlace_Data_Dictionary.sql.zip', '2021-03-04 16:20:53', NULL, '2021-03-04 16:20:53', NULL, b'01'),
(5, 4, 'Notes Marketplace - Admin', 'Members/10/4/Attachments/Notes Marketplace - Admin.pdf', '2021-03-04 16:02:43', NULL, '2021-03-04 16:02:43', NULL, b'01');

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

--
-- Dumping data for table `sellernotesreportedissues`
--

INSERT INTO `sellernotesreportedissues` (`ID`, `NoteID`, `ReportedBYID`, `AgainstDownloadID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(18, 39, 10, 4, 'This note is not so useful!!', '2021-03-24 13:39:51', NULL, '2021-03-24 13:39:51', NULL),
(26, 4, 10, 13, 'Ok These is not interesting subject..', '2021-03-24 13:51:00', NULL, '2021-03-24 13:51:00', NULL);

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

--
-- Dumping data for table `sellernotesreviews`
--

INSERT INTO `sellernotesreviews` (`ID`, `NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 39, 10, 13, '3', 'Maths is my fav subject!', '2021-03-24 13:54:55', NULL, '2021-03-24 13:54:55', NULL, b'01'),
(7, 4, 10, 20, '5', 'Nice Book!!', '2021-03-24 13:59:39', NULL, '2021-03-24 13:59:39', NULL, b'01'),
(8, 4, 12, 20, '4', 'This book is Good!!', '2021-03-24 13:59:39', NULL, '2021-03-24 13:59:39', NULL, b'01'),
(9, 4, 11, 20, '3', 'Great Book!! Helped a lot!! Thanks for the note.', '2021-03-24 13:59:39', NULL, '2021-03-24 13:59:39', NULL, b'01'),
(10, 4, 24, 20, '4', 'Thanks for the note!!! Good One!', '2021-03-24 13:59:39', NULL, '2021-03-24 13:59:39', NULL, b'01'),
(11, 18, 24, 20, '4', 'Thanks for the note!!! Good One!', '2021-03-24 13:59:39', NULL, '2021-03-24 13:59:39', NULL, b'01');

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

--
-- Dumping data for table `system_configuration`
--

INSERT INTO `system_configuration` (`ID`, `KeyNote`, `Value`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Support email address', 'gogoproject2020@gmail.com', '2021-03-10 18:18:01', NULL, '2021-03-10 18:18:01', NULL, b'01'),
(24, 'Support phone number', '9898150042', '2021-03-10 18:18:01', NULL, '2021-03-10 18:18:01', NULL, b'01'),
(25, 'Email Address(es)(for various events system will send notificatio to these users)', 'gandhiriya99@gmail.com', '2021-03-10 18:18:01', NULL, '2021-03-10 18:18:01', NULL, b'01'),
(26, 'Facebook URL', 'https://facebook.com', '2021-03-10 18:18:01', NULL, '2021-03-10 18:18:01', NULL, b'01'),
(27, 'Twitter URL', 'https://twitter.com', '2021-03-10 18:18:02', NULL, '2021-03-10 18:18:02', NULL, b'01'),
(28, 'Linkedin URL', 'https://linked.com', '2021-03-10 18:18:02', NULL, '2021-03-10 18:18:02', NULL, b'01'),
(29, 'Default image for notes(if seller do not upload)', '', '2021-03-10 18:18:02', NULL, '2021-03-10 18:18:02', NULL, b'01'),
(30, 'Default Profile Picture(if seller do not upload)', '', '2021-03-10 18:18:02', NULL, '2021-03-10 18:18:02', NULL, b'01');

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
(1, 'Handwritten Notes', 'Lorem ipsum is simply dummy text', '2021-02-22 22:11:10', NULL, '2021-02-22 22:11:10', NULL, b'00'),
(2, 'University Book', 'Lorem ipsum is simply dummy text', '2021-02-22 22:35:13', NULL, '2021-02-22 22:35:13', NULL, b'00'),
(3, 'Self-write', 'Lorem ipsum is simply dummy text', '2021-02-22 22:35:30', NULL, '2021-02-22 22:35:30', NULL, b'00'),
(4, 'College Notes', 'Lorem Is dummy text.', '2021-03-11 17:29:31', NULL, '2021-03-11 17:29:31', NULL, b'01'),
(5, 'Novel', 'Lorem Is dummy text.', '2021-03-11 17:29:41', NULL, '2021-03-11 17:29:41', NULL, b'01'),
(6, 'Darshan Notes', 'Lorem Is dummy text.', '2021-03-11 17:29:49', NULL, '2021-03-11 17:29:49', NULL, b'00');

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
(2, 10, '1999-10-06 00:00:00', 1, '', '+91', '9687848995', '1.jpg', '56,Arihant Society near bus stop', 'vasna,Ahmedabad-380007', 'Ahmedabad', 'Gujarat', '380007', 'India', 'IIT', 'LJIET', '2021-02-23 16:32:30', NULL, '2021-02-23 16:32:30', NULL),
(3, 20, '2000-06-10 00:00:00', 1, '', '+91', '9659859321', '', '22,susi society near bus station', 'Ahmedabad ,Gujarat', 'Ahmedabad', 'Gujarat', '380018', 'Bahrain', 'NIIT', 'GEC', '2021-03-08 15:50:24', NULL, '2021-03-08 15:50:24', NULL),
(4, 29, '2001-01-10 00:00:00', 1, '', '+93', '9845278956', '', '302, Punit Society near bus stop', 'vasna,Ahmedabad-380007', 'Ahmedabad', 'Gujarat', '310008', 'Pakistan', 'GTU', 'LJIET', '2021-03-08 16:24:11', NULL, '2021-03-08 16:24:11', NULL),
(5, 11, '1999-06-24 00:00:00', 1, '', '+93', '9898150042', '', '302, Punit Society near bus stop', 'Ahmedabad ,Gujarat', 'Ahmedabad', 'Gujarat', '380007', 'Bangladesh', 'GTU', 'LJIET', '2021-03-08 16:31:40', NULL, '2021-03-08 16:31:40', NULL),
(6, 12, '2000-01-10 00:00:00', 2, '', '+93', '9687848995', '', '22,susi society near bus station', 'vasna,Ahmedabad-380007', 'Ahmedabad', 'Gujarat', '380018', 'Bangladesh', 'GTU', 'GIT', '2021-03-08 16:35:28', NULL, '2021-03-08 16:35:28', NULL),
(7, 24, '2011-10-10 10:49:19', 2, '', '+91', '9687848945', '', '22,susi society near bus station', 'Ahmedabad ,Gujarat', 'Ahmedabad', 'Gujarat', '380008', 'India', 'IIT', 'GEC', '2021-03-23 10:40:16', NULL, '2021-03-23 10:40:16', NULL),
(9, 27, '2005-02-08 00:00:00', 2, '', '+93', '9659859321', 'Roli.jpg', '302, Punit Society near bus stop', ',Bombay-75', 'Ahmedabad', 'Gujarat', '310058', 'Barbados', 'NIIT', 'LJIET', '2021-03-23 11:17:10', NULL, '2021-03-23 11:17:10', NULL),
(10, 21, '2011-10-10 10:49:19', 2, '', '+91', '9687898568', '', '22,susi society near bus station', 'Ahmedabad ,Gujarat', 'Ahmedabad', 'Gujarat', '380056', 'India', 'IIT', 'GEC', '2021-03-23 10:40:16', NULL, '2021-03-23 10:40:16', NULL),
(11, 23, '2013-12-10 09:42:30', 2, '', '+93', '9659859321', 'client-3.jpg', '320,Gokuldham Society near goregav', 'vasna,Ahmedabad-380007', 'Ahmedabad', 'Gujarat', '310007', 'Belgium', 'NIIT', 'GEC', '2021-03-27 09:41:01', NULL, '2021-03-27 09:41:01', NULL),
(12, 22, '1999-06-08 00:00:00', 2, '', '+93', '9659859321', 'team-6.jpg', '302, Punit Society near bus stop', ',Gujarat-75', 'Ahmedabad', 'Gujarat', '3800089', 'Belarus', 'GTU', 'GEC', '2021-03-27 09:50:19', NULL, '2021-03-27 09:50:19', NULL);

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
(3, 1, 'Riya', 'Gandhi', 'riya1999@gmail.com', 'Mrmr#1006', b'01', '2021-02-20 13:15:27', NULL, '2021-02-20 13:15:27', NULL, b'10'),
(4, 1, 'Ridham', 'Gandhi', 'gandhiridham@gmail.com', 'Ridham173', b'01', '2021-02-20 13:22:25', NULL, '2021-02-20 13:22:25', NULL, b'10'),
(10, 2, 'Mihir', 'Patel', 'mihirpatel06@gmail.com', 'Mihir$6588', b'01', '2021-02-20 18:47:53', NULL, '2021-02-20 18:47:53', NULL, b'10'),
(11, 2, 'Deep', 'Dave', 'deepdave21@gmail.com', 'Riya658', b'01', '2021-02-20 18:50:58', NULL, '2021-02-20 18:50:58', NULL, b'10'),
(12, 2, 'Shailvi', 'Gandhi', 'shailvigandhi@gmail.com', 'Shailvi^10', b'01', '2021-02-20 19:05:25', NULL, '2021-02-20 19:05:25', NULL, b'10'),
(19, 2, 'Dhruvil', 'Patel', 'dhruvilpatel@gmail.com', 'Dhdhdh$10', b'00', '2021-03-02 20:02:07', NULL, '2021-03-02 20:02:07', NULL, b'10'),
(20, 2, 'Raj', 'Patel', 'rajpatel85@gmail.com', 'Raj@1010', b'01', '2021-03-03 11:32:53', NULL, '2021-03-03 11:32:53', NULL, b'10'),
(21, 2, 'Krishna', 'Gandhi', 'krishnagandhi2112@gmail.com', 'Krishna@2112', b'00', '2021-03-03 11:36:57', NULL, '2021-03-03 11:36:57', NULL, b'10'),
(22, 2, 'Kanika', 'Patel', 'kanikapatel5897@gmail.com', 'Kanika#7878', b'01', '2021-03-03 15:54:52', NULL, '2021-03-03 15:54:52', NULL, b'10'),
(23, 2, 'Munu', 'Trivedi', 'Munutrivedi2020@gmail.com', 'Munu@2020', b'01', '2021-03-05 10:36:44', NULL, '2021-03-05 10:36:44', NULL, b'10'),
(24, 2, 'KKR', 'Dave', 'KKRdave898@gmail.com', 'KKRdave#3030', b'01', '2021-03-05 10:39:29', NULL, '2021-03-05 10:39:29', NULL, b'10'),
(25, 2, 'Diku', 'Jadav', 'DikuJadav789@gmail.com', 'Diku@5050', b'00', '2021-03-05 10:44:58', NULL, '2021-03-05 10:44:58', NULL, b'10'),
(26, 2, 'Miya', 'Gandhi', 'MiyaGandhi1006@gmail.com', 'Miya$1999', b'00', '2021-03-05 10:49:07', NULL, '2021-03-05 10:49:07', NULL, b'10'),
(27, 2, 'Roli', 'Dave', 'RoliDave789@gmail.com', 'Roli&7878', b'01', '2021-03-05 14:05:36', NULL, '2021-03-05 14:05:36', NULL, b'10'),
(28, 2, 'Boby', 'Jhonson', 'boby20368@gmail.com', 'Boby$1987', b'01', '2021-03-05 14:42:26', NULL, '2021-03-05 14:42:26', NULL, b'10'),
(29, 2, 'Zen', 'Jadav', 'zenjadav8975@gmail.com', 'Zen@9898', b'01', '2021-03-05 14:49:16', NULL, '2021-03-05 14:49:16', NULL, b'10');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=2447;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=13;

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
