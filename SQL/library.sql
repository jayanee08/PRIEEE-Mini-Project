

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-09-30 05:43:08'),
(2, 'gts', 'gts@gmail.com', 'gts', '21232f297a57a5a743894a0e4a801fc3', '2022-09-30 05:55:42');

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Anuj kumar', '2017-07-08 12:49:09', '2017-07-08 15:16:59'),
(2, 'Chetan Bhagatt', '2017-07-08 14:30:23', '2017-07-08 15:15:09'),
(3, 'Anita Desai', '2017-07-08 14:35:08', NULL),
(4, 'HC Verma', '2017-07-08 14:35:21', NULL),
(5, 'R.D. Sharma ', '2017-07-08 14:35:36', NULL),
(9, 'fwdfrwer', '2017-07-08 15:22:03', NULL),
(11, 'Kabilan', '2022-10-31 06:57:55', NULL),
(12, 'princy', '2022-11-03 19:45:36', NULL);


CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `PubId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `PubId`, `ISBNNumber`, `BookPrice`, `stock`, `RegDate`, `UpdationDate`) VALUES
(1, 'PHP And MySql programming', 5, 1, 5, 222333, 20, 15, '2017-07-08 20:04:55', '2022-11-02 09:14:58'),
(3, 'physics', 6, 4, 5, 1111, 15, 10, '2017-07-08 20:17:31', '2022-11-02 09:06:58'),
(4, 'cloud computing', 5, 12, 7, 9090, 500, 100, '2022-11-03 19:47:19', NULL),
(5, 'Computer Architecture', 5, 12, 7, 890890, 690, 50, '2022-11-03 20:35:10', NULL);


CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Romantic', 1, '2017-07-04 18:35:25', '2017-07-06 16:00:42'),
(5, 'Technology', 1, '2017-07-04 18:35:39', '2017-07-08 17:13:03'),
(6, 'Science', 1, '2017-07-04 18:35:55', '0000-00-00 00:00:00'),
(7, 'Management', 0, '2017-07-04 18:36:16', '0000-00-00 00:00:00'),
(8, 'coding', 1, '2022-11-03 19:45:13', '0000-00-00 00:00:00');



CREATE TABLE `tblcourse` (
  `id` int(11) NOT NULL,
  `CourseName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblcourse` (`id`, `CourseName`, `creationDate`, `UpdationDate`) VALUES
(2, 'MCA', '2022-09-30 09:51:38', '2022-09-30 09:53:17'),
(3, 'java', '2022-11-03 19:46:19', NULL);




CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ToReturnDate` timestamp NULL DEFAULT NULL,
  `ReturnedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) NOT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ToReturnDate`, `ReturnedDate`, `RetrunStatus`, `fine`) VALUES
(1, 1, 'SID002', '2017-07-15 06:09:47', NULL, '2017-07-15 11:15:20', 1, 0),
(2, 1, 'SID002', '2017-07-15 06:12:27', NULL, '2017-07-15 11:15:23', 1, 5),
(3, 3, 'SID002', '2017-07-15 06:13:40', NULL, NULL, 0, NULL),
(4, 3, 'SID002', '2017-07-15 06:23:23', NULL, '2017-07-15 11:22:29', 1, 2),
(5, 1, 'SID009', '2017-07-15 10:59:26', NULL, NULL, 0, NULL),
(6, 3, 'SID011', '2017-07-15 18:02:55', NULL, NULL, 0, NULL),
(7, 3, 'SID002', '2022-11-01 11:29:29', NULL, NULL, 0, NULL),
(8, 3, 'SID002', '2022-11-01 11:32:30', NULL, NULL, 0, NULL),
(13, 3, 'SID002', '2022-11-01 11:45:55', '2022-11-01 11:45:55', '2022-11-01 11:50:51', 0, NULL),
(18, 3, 'SID002', '2022-10-30 12:20:42', '2022-10-30 12:20:32', NULL, 1, 120),
(19, 3, 'SID005', '2022-11-02 05:10:06', '2022-11-01 05:09:43', NULL, 0, 100),
(20, 4, '1', '2022-11-03 19:52:10', '2022-11-03 19:51:49', NULL, 1, 10),
(21, 4, '1', '2022-11-03 20:06:05', '2022-11-03 20:05:44', '2022-11-03 20:06:05', 0, NULL),
(22, 4, '1', '2022-11-03 20:07:15', '2022-11-04 20:07:00', '2022-11-03 20:07:15', 0, NULL),
(23, 5, '2', '2022-11-03 20:38:44', '2022-11-04 20:37:31', '2022-11-03 20:41:50', 1, 12),
(24, 5, '2', '2022-11-03 20:45:10', '2022-11-03 20:44:53', NULL, 0, NULL),
(25, 5, '2', '2022-11-03 20:45:39', '2022-11-04 20:45:27', NULL, 0, NULL);


CREATE TABLE `tblpublication` (
  `id` int(11) NOT NULL,
  `PublisherName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblpublication` (`id`, `PublisherName`, `creationDate`, `UpdationDate`) VALUES
(5, 'Emerald Publication', '2022-09-30 09:39:15', NULL),
(6, 'Ruby Publications', '2022-10-01 06:53:46', NULL),
(7, 'princy', '2022-11-03 19:46:00', NULL);



CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Anuj kumar', 'anuj.lpu1@gmail.com', '9865472555', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:37:05', '2017-07-15 18:26:21'),
(4, 'SID005', 'test', 'kps.sudhakar@gmail.com', '8569710025', '098f6bcd4621d373cade4e832627b4f6', 1, '2017-07-11 15:41:27', '2022-11-02 08:23:56'),
(8, 'SID009', 'test', 'test@gmail.com', '2359874527', '098f6bcd4621d373cade4e832627b4f6', 1, '2017-07-11 15:58:28', '2022-10-31 10:34:20'),
(9, 'SID010', 'Amit', 'amit@gmail.com', '8585856224', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 13:40:30', NULL),
(10, 'SID011', 'Sarita Pandey', 'sarita@gmail.com', '4672423754', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-15 18:00:59', NULL),
(11, '1', 'sangeetha', 'javateam2022@gmail.com', '5874125364', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2022-11-03 19:49:44', NULL),
(12, '2', 'parthiban', 'iotcloudsfire@gmail.com', '9856322123', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2022-11-03 20:36:58', NULL);


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tblpublication`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tblcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `tblpublication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
