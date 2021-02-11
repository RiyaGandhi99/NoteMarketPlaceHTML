-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 07:57 PM
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
-- Creation: Feb 10, 2021 at 08:33 PM
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'Computer Science,IT, Politics, Sports, Cricket, etc.',
  `Description` varchar(500) NOT NULL COMMENT 'Description to explain what this category means.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and ime when system has updated this record.Super Admin ID you can insert static.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information,Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `categories`:
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--
-- Creation: Feb 10, 2021 at 08:19 PM
-- Last update: Feb 10, 2021 at 08:19 PM
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when System as created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this rocord.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `countries`:
--

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--
-- Creation: Feb 11, 2021 at 05:54 PM
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `NoteID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with SellerNotes table.',
  `Seller` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `Downloader` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users table.',
  `IsSellerHasAllowedDownload` tinyint(1) NOT NULL COMMENT 'For paid notes default false.For free notes it will be true anyway.',
  `AttachmentPath` varchar(1000) DEFAULT NULL COMMENT 'for paid notes default false. for free notes it will be true anyway.',
  `IsAttachmentDownloaded` tinyint(1) NOT NULL,
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
-- RELATIONSHIPS FOR TABLE `downloads`:
--   `NoteID`
--       `sellernotes` -> `ID`
--   `Seller`
--       `users` -> `ID`
--   `Downloader`
--       `users` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--
-- Creation: Feb 10, 2021 at 09:09 PM
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
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `referencedata`:
--

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--
-- Creation: Feb 11, 2021 at 04:48 PM
--

CREATE TABLE `sellernotes` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `SellerID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Users Table.',
  `Status` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with Referencedata Table.',
  `ActionBy` int(11) DEFAULT NULL COMMENT 'FOREIGN KEY relationship with Users Table.',
  `AdminRemarks` varchar(10000) DEFAULT NULL COMMENT 'Admin will enter the remarks when he will reject the notes or when he will mark status removed for notes via unpublished function.',
  `PublishedDate` datetime DEFAULT current_timestamp(),
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
  `IsPaid` tinyint(1) NOT NULL COMMENT 'Set false if selling mode is free and set to true if selling mode is paid.',
  `SellingPrice` decimal(10,0) DEFAULT NULL COMMENT 'if selling mode is paid - selling price can not be null.',
  `NotesPreview` varchar(10000) DEFAULT NULL COMMENT 'if selling mode is paid - note preview cannot be null.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sellernotes`:
--   `SellerID`
--       `users` -> `ID`
--   `Status`
--       `referencedata` -> `ID`
--   `ActionBy`
--       `users` -> `ID`
--   `Category`
--       `categories` -> `ID`
--   `NoteType`
--       `types` -> `ID`
--   `Country`
--       `countries` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachments`
--
-- Creation: Feb 11, 2021 at 05:48 PM
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
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sellernotesattachments`:
--   `NoteID`
--       `sellernotes` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--
-- Creation: Feb 11, 2021 at 05:53 PM
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
-- RELATIONSHIPS FOR TABLE `sellernotesreportedissues`:
--   `NoteID`
--       `sellernotes` -> `ID`
--   `ReportedBYID`
--       `users` -> `ID`
--   `AgainstDownloadID`
--       `downloads` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--
-- Creation: Feb 11, 2021 at 05:50 PM
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
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sellernotesreviews`:
--   `NoteID`
--       `sellernotes` -> `ID`
--   `ReviewedByID`
--       `users` -> `ID`
--   `AgainstDownloadsID`
--       `downloads` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_configuration`
--
-- Creation: Feb 10, 2021 at 08:59 PM
--

CREATE TABLE `system_configuration` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `KeyNote` varchar(100) NOT NULL COMMENT 'SupportEmailAddress, SupportContact Number, EmailAddressesForNotify, DefaultNoteDisplayPicture, DefaultMemberDisplayPicture, FBICON, TWITTERICON, LNICON etc.',
  `Value` varchar(1000) NOT NULL COMMENT 'Value of each key which will Super Admin will Configure.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.Super Admin ID you can insert static.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `system_configuration`:
--

-- --------------------------------------------------------

--
-- Table structure for table `types`
--
-- Creation: Feb 10, 2021 at 08:40 PM
--

CREATE TABLE `types` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(100) NOT NULL COMMENT 'HandWritten notes, university notes, novel, story books etc.',
  `Description` varchar(500) NOT NULL COMMENT 'Description to explain what this type means.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created this record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated this record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `types`:
--

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--
-- Creation: Feb 11, 2021 at 04:39 PM
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
-- RELATIONSHIPS FOR TABLE `userprofile`:
--   `UserID`
--       `users` -> `ID`
--   `Gender`
--       `referencedata` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--
-- Creation: Feb 10, 2021 at 07:27 PM
--

CREATE TABLE `userroles` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `Name` varchar(50) NOT NULL COMMENT 'Entries can be Member, Admin or Super Admin',
  `Description` varchar(400) DEFAULT NULL COMMENT 'What this role usage is one can write here.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.Super Admin ID you can insert static.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who has updated this record. Super Admin ID you can insert static.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information,Default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `userroles`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 11, 2021 at 04:21 PM
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `RoleID` int(11) NOT NULL COMMENT 'FOREIGN KEY relationship with UserRoles table',
  `FirstName` varchar(50) NOT NULL COMMENT 'Required Information',
  `LastName` varchar(50) NOT NULL COMMENT 'Required Information',
  `EmailID` varchar(100) NOT NULL COMMENT 'Required Information | Unique EmailID across table.',
  `Password` varchar(24) NOT NULL COMMENT 'Required Information',
  `IsEmailVerified` tinyint(1) DEFAULT NULL COMMENT 'Required Information, Default set to false.',
  `CreatedDate` datetime DEFAULT current_timestamp() COMMENT 'Date and time when system has created a record.',
  `CreatedBy` int(11) DEFAULT NULL COMMENT 'UserID who has created this record.',
  `ModifiedDate` datetime DEFAULT current_timestamp() COMMENT 'date and time when system has updated a record.',
  `ModifiedBy` int(11) DEFAULT NULL COMMENT 'UserID who updateds this record.',
  `IsActive` tinyint(1) NOT NULL COMMENT 'Required Information, default set to true.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users`:
--   `RoleID`
--       `userroles` -> `ID`
--

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY';

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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table categories
--

--
-- Metadata for table countries
--

--
-- Metadata for table downloads
--

--
-- Metadata for table referencedata
--

--
-- Metadata for table sellernotes
--

--
-- Metadata for table sellernotesattachments
--

--
-- Metadata for table sellernotesreportedissues
--

--
-- Metadata for table sellernotesreviews
--

--
-- Metadata for table system_configuration
--

--
-- Metadata for table types
--

--
-- Metadata for table userprofile
--

--
-- Metadata for table userroles
--

--
-- Metadata for table users
--

--
-- Metadata for database notesmarketplace
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
