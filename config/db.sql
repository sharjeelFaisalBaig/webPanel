-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 05:55 AM
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
-- Database: `webcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `callbackid` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `bookingstatus` varchar(15) NOT NULL,
  `bookername` varchar(30) NOT NULL,
  `bookerphone` varchar(20) NOT NULL,
  `bookeremail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `callbacks`
--

INSERT INTO `callbacks` (`callbackid`, `bookingdate`, `bookingstatus`, `bookername`, `bookerphone`, `bookeremail`) VALUES
(14, '2020-12-29', 'pending', 'Sharjeel Faisal', '+92 3228299115', 'humnepaise@gmail.com'),
(15, '2020-12-29', 'pending', 'Faisal Baig', '+92 3228299115', 'ri9606404@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `countrysupported`
--

CREATE TABLE `countrysupported` (
  `countryid` int(11) NOT NULL,
  `countryname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countrysupported`
--

INSERT INTO `countrysupported` (`countryid`, `countryname`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegowina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Congo, the Democratic Republic of the'),
(51, 'Cook Islands'),
(52, 'Costa Rica'),
(53, 'Cote d\'Ivoire'),
(54, 'Croatia (Hrvatska)'),
(55, 'Cuba'),
(56, 'Cyprus'),
(57, 'Czech Republic'),
(58, 'Denmark'),
(59, 'Djibouti'),
(60, 'Dominica'),
(61, 'Dominican Republic'),
(62, 'East Timor'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'France, Metropolitan'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard and Mc Donald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran (Islamic Republic of)'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea, Democratic People\'s Republic of'),
(115, 'Korea, Republic of'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People\'s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macau'),
(128, 'Macedonia, The Former Yugoslav Republic '),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia, Federated States of'),
(142, 'Moldova, Republic of'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Panama'),
(167, 'Papua New Guinea'),
(168, 'Paraguay'),
(169, 'Peru'),
(170, 'Philippines'),
(171, 'Pitcairn'),
(172, 'Poland'),
(173, 'Portugal'),
(174, 'Puerto Rico'),
(175, 'Qatar'),
(176, 'Reunion'),
(177, 'Romania'),
(178, 'Russian Federation'),
(179, 'Rwanda'),
(180, 'Saint Kitts and Nevis'),
(181, 'Saint LUCIA'),
(182, 'Saint Vincent and the Grenadines'),
(183, 'Samoa'),
(184, 'San Marino'),
(185, 'Sao Tome and Principe'),
(186, 'Saudi Arabia'),
(187, 'Senegal'),
(188, 'Seychelles'),
(189, 'Sierra Leone'),
(190, 'Singapore'),
(191, 'Slovakia (Slovak Republic)'),
(192, 'Slovenia'),
(193, 'Solomon Islands'),
(194, 'Somalia'),
(195, 'South Africa'),
(196, 'South Georgia and the South Sandwich Isl'),
(197, 'Spain'),
(198, 'Sri Lanka'),
(199, 'St. Helena'),
(200, 'St. Pierre and Miquelon'),
(201, 'Sudan'),
(202, 'Suriname'),
(203, 'Svalbard and Jan Mayen Islands'),
(204, 'Swaziland'),
(205, 'Sweden'),
(206, 'Switzerland'),
(207, 'Syrian Arab Republic'),
(208, 'Taiwan, Province of China'),
(209, 'Tajikistan'),
(210, 'Tanzania, United Republic of'),
(211, 'Thailand'),
(212, 'Togo'),
(213, 'Tokelau'),
(214, 'Tonga'),
(215, 'Trinidad and Tobago'),
(216, 'Tunisia'),
(217, 'Turkey'),
(218, 'Turkmenistan'),
(219, 'Turks and Caicos Islands'),
(220, 'Tuvalu'),
(221, 'Uganda'),
(222, 'Ukraine'),
(223, 'United Arab Emirates'),
(224, 'United Kingdom'),
(225, 'United States'),
(226, 'United States Minor Outlying Islands'),
(227, 'Uruguay'),
(228, 'Uzbekistan'),
(229, 'Vanuatu'),
(230, 'Venezuela'),
(231, 'Viet Nam'),
(232, 'Virgin Islands (British)'),
(233, 'Virgin Islands (U.S.)'),
(234, 'Wallis and Futuna Islands'),
(235, 'Western Sahara'),
(236, 'Yemen'),
(237, 'Yugoslavia'),
(238, 'Zambia'),
(239, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussionid` int(11) NOT NULL,
  `discussionername` varchar(30) NOT NULL,
  `discussioneremail` varchar(45) NOT NULL,
  `discussionerphone` varchar(20) NOT NULL,
  `discussiondate` date NOT NULL,
  `discussionstatus` varchar(15) NOT NULL,
  `discussiondiscountgranted` int(11) NOT NULL DEFAULT 0,
  `discussionercountry` varchar(35) NOT NULL,
  `discussionerprojecttype` varchar(35) NOT NULL,
  `discussionerprojectname` varchar(30) NOT NULL,
  `discussionercompanyname` varchar(25) NOT NULL,
  `discussionercompanylocation` varchar(80) NOT NULL,
  `discussionercompanytype` varchar(35) NOT NULL,
  `discussionercompanybudget` varchar(20) NOT NULL,
  `discussionshortdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussionid`, `discussionername`, `discussioneremail`, `discussionerphone`, `discussiondate`, `discussionstatus`, `discussiondiscountgranted`, `discussionercountry`, `discussionerprojecttype`, `discussionerprojectname`, `discussionercompanyname`, `discussionercompanylocation`, `discussionercompanytype`, `discussionercompanybudget`, `discussionshortdesc`) VALUES
(6, 'Vishal Ramesh', 'vishalramesh11@yahoo.com', '+92 021-929887287', '2020-12-29', 'failed', 30, 'Pakistan', 'Electronic QR / BAR Code Attendance', 'System Infinite', 'SystemInfinite.co', 'Block 10D, GIZRI KARACHI PAKISTAN', 'Industrial', '$5.000 — $10.000', 'Hello Iam CEO of SystemInfinite.co Vishal Ramesh Contac me as soon as possible !'),
(7, 'Suriayya Alam', 'bussiness@yeslogodesign.com', '+1809 92987161797', '2020-12-29', 'pending', 0, 'Dominican Republic', 'B2B Portals', 'harmaal', 'Baig.co', 'Baig.co', 'E-Commerce', 'More than $10,000', 'Sharjeel'),
(8, 'Sharjeel', 'rishad@gmail.com', '+47 2135096995', '2020-12-29', 'discussed', 0, 'United States', 'Event Management Website', 'Harmaal', 'Baig.co', 'Baig.co', 'Academy', 'More than $10,000', 'Sharjeel');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `orderername` varchar(30) NOT NULL,
  `ordereremail` varchar(40) NOT NULL,
  `orderdate` date NOT NULL,
  `ordererphone` varchar(25) NOT NULL,
  `orderstatus` varchar(20) NOT NULL,
  `ordertype` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `orderername`, `ordereremail`, `orderdate`, `ordererphone`, `orderstatus`, `ordertype`) VALUES
(5, 'Faisal Baig', 'faisalRajaBadshah@gmail.com', '2017-08-17', '+92 3288299127', 'pending', 'Ecommerce Website'),
(6, 'Sharjeel', 'sharjeel@btech.com', '2017-08-11', '+91 8826789299', 'qouted', 'Ecommerce Website'),
(7, 'Sharjeel Faisal', 'ri9606404@gmail.com', '2020-12-29', '+47 2135096995', 'pending', 'Educational Website');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `todosid` int(11) NOT NULL,
  `todosname` varchar(60) NOT NULL,
  `todosassignerid` int(11) NOT NULL,
  `todosassignername` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `userRoleName` varchar(11) NOT NULL,
  `userRoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`userRoleName`, `userRoleId`) VALUES
('regular', 1),
('admin', 2),
('master', 3),
('super-admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userFullName` varchar(30) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `userDOB` date NOT NULL,
  `userGender` varchar(10) NOT NULL,
  `userName` varchar(500) NOT NULL,
  `userPassword` varchar(500) NOT NULL,
  `userRole` int(1) NOT NULL,
  `userImg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userFullName`, `userPhone`, `userEmail`, `userAddress`, `userDOB`, `userGender`, `userName`, `userPassword`, `userRole`, `userImg`) VALUES
(57, 'Sharjeel Faisal', '03228299115', 'admin@gmail.com', 'Mulholland DriveLos Angeles', '2020-12-02', 'male', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 4, 'api/uploads/money-back (1).png'),
(58, 'Faisal Baig', '923132047292', 'faisal@gmail.com', 'Defence Phase 3 Karachi Sindh Pakistan', '2020-12-18', 'male', '3681d8ad7bb216df331942be90fa1a48', '3681d8ad7bb216df331942be90fa1a48', 3, 'api/uploads/Untitled (10) (1).png'),
(59, 'Mustafa Qureshi', '92229912891', 'mustafaQuershi@gmail.com', 'secBex', '2020-12-02', 'male', '8c387ec81cbf1094a2d5b86988f81be1', '8c387ec81cbf1094a2d5b86988f81be1', 1, 'api/uploads/Brown-Leather-Bag-PNG-Free-Download.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`callbackid`);

--
-- Indexes for table `countrysupported`
--
ALTER TABLE `countrysupported`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussionid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`todosid`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`userRoleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `callbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countrysupported`
--
ALTER TABLE `countrysupported`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `todosid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `userRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
