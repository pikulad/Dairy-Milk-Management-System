-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 08:07 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dudhwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `password`) VALUES
(1, 'Rajan', '86b76f489d76d0ab3c98889519cc466a'),
(2, 'Priyank', '8f14e45fceea167a5a36dedd4bea2543');

-- --------------------------------------------------------

--
-- Table structure for table `tblarea`
--

CREATE TABLE IF NOT EXISTS `tblarea` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarea`
--

INSERT INTO `tblarea` (`id`, `name`, `pincode`) VALUES
(1, 'Zadeshwar', 392011),
(5, 'Tulsidham', 362011),
(6, 'kasak', 392012),
(7, 'Shaktinath', 392010),
(8, 'Panchbatti', 392010);

-- --------------------------------------------------------

--
-- Table structure for table `tblbill`
--

CREATE TABLE IF NOT EXISTS `tblbill` (
  `no` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Pending, 1:Delivered'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbill`
--

INSERT INTO `tblbill` (`no`, `customerid`, `date`, `total_amount`, `status`) VALUES
(1, 1, '2019-05-04', 132, 1),
(2, 2, '2019-05-04', 36, 0),
(3, 3, '2019-05-04', 36, 0),
(4, 3, '2019-05-04', 120, 0),
(5, 2, '2019-05-04', 36, 0),
(6, 3, '2019-05-05', 250, 1),
(7, 1, '2019-05-06', 360, 1),
(8, 7, '2019-05-06', 990, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE IF NOT EXISTS `tblcart` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`id`, `customerid`, `productid`, `qty`) VALUES
(24, 6, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landmarkid` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `fname`, `lname`, `address`, `landmarkid`, `gender`, `contactno`, `emailid`, `password`, `updatedatetime`) VALUES
(1, 'Priyank', 'Lad', 'Zadeshwar Gam', 5, 'Male', 9924209820, 'pikulad7@gmail.com', 'fd6c09734988030634a769b0c9b712ee', '2019-02-28 07:37:07'),
(2, 'Rajan', 'Prajapati', '7,Shakti Nath Soc. ,near Kumar Sala', 5, 'Male', 9909410487, '16mscit0041@gmail.com', 'f6565efd42846497a538b4d08a84bca8', '2019-02-28 08:17:38'),
(3, 'Adit', 'Lad', 'Sayan', 1, 'Male', 9687724688, 'ladadit@gmail.com', '486b6c6b267bc61677367eb6b6458764', '2019-03-26 08:36:29'),
(4, 'Vatsal', 'Bhakta', 'Vyara', 1, 'Male', 8980418585, 'bvatsal@ymail.com', '61bd60c60d9fb60cc8fc7767669d40a1', '2019-04-01 12:50:02'),
(5, 'Jay', 'Bhatt', '07,tulshidam soc.', 2, 'Male', 9466664567, 'jay.bhatt@gmail.com', '7b2dfbf68ed7e968605c74df90953a65', '2019-04-08 05:51:12'),
(6, 'jigna', 'Solanky', 'Surat', 1, 'Female', 9904599931, 'jigna.solanki@utu.ac.in', '7cf56a42cfd4fde31756c1535b03e480', '2019-04-08 06:05:56'),
(7, 'Adit', 'Lad', 'Zadeshwar Gam', 5, 'Male', 9687724688, 'ladadit05@gmail.com', '61bd60c60d9fb60cc8fc7767669d40a1', '2019-05-06 02:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerorder`
--

CREATE TABLE IF NOT EXISTS `tblcustomerorder` (
  `no` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomerorder`
--

INSERT INTO `tblcustomerorder` (`no`, `billno`, `productid`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 3, 1),
(4, 2, 3, 1),
(5, 3, 3, 1),
(6, 4, 4, 1),
(7, 5, 3, 1),
(8, 6, 2, 1),
(9, 7, 4, 3),
(10, 8, 2, 3),
(11, 8, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbllandmark`
--

CREATE TABLE IF NOT EXISTS `tbllandmark` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Areaid` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllandmark`
--

INSERT INTO `tbllandmark` (`id`, `Name`, `Areaid`, `Status`) VALUES
(1, 'ramvatika', 1, 0),
(2, 'Tulsidham', 5, 0),
(3, 'Zadeshwar chowkdi', 1, 0),
(4, 'Falshruti nagar', 8, 0),
(5, 'Zadeshwar Gam', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmeasurement`
--

CREATE TABLE IF NOT EXISTS `tblmeasurement` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `unitid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmeasurement`
--

INSERT INTO `tblmeasurement` (`id`, `type`, `unitid`) VALUES
(1, '100 gm', 1),
(2, '200 gm', 1),
(3, '250 gm', 1),
(4, '500 gm', 1),
(5, '1 kg', 2),
(6, '2 kg', 2),
(7, '5 kg', 2),
(8, '6 kg', 2),
(9, '200 ml', 3),
(10, '500 ml', 3),
(11, '1 lt', 4),
(12, '2 lt', 4),
(13, '5 lt', 4),
(14, '6 lt', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblmembership`
--

CREATE TABLE IF NOT EXISTS `tblmembership` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `advance_amount` int(11) NOT NULL,
  `advance_date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmilkcollection`
--

CREATE TABLE IF NOT EXISTS `tblmilkcollection` (
  `id` int(11) NOT NULL,
  `cattletype` varchar(10) NOT NULL,
  `liter` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `staffid` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmilkcollection`
--

INSERT INTO `tblmilkcollection` (`id`, `cattletype`, `liter`, `date`, `time`, `staffid`, `updatedatetime`) VALUES
(1, 'Cow', 7, '2019-05-06', '13:17:04', 10, '2019-05-06 18:30:59'),
(2, 'Buffelo', 10, '2019-05-06', '10:36:37', 11, '2019-05-06 18:33:55'),
(3, 'Buffelo', 5, '2019-05-06', '18:35:34', 11, '2019-05-06 18:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(11) NOT NULL,
  `productcategoryid` int(11) NOT NULL,
  `measurementid` int(11) NOT NULL,
  `price` float NOT NULL,
  `manufacture_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `update_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `productcategoryid`, `measurementid`, `price`, `manufacture_date`, `expire_date`, `update_datetime`, `status`) VALUES
(1, 2, 3, 60, '2019-02-21', '2019-02-28', '2019-02-21 04:42:27', 1),
(2, 3, 5, 250, '2019-02-24', '2019-03-24', '2019-02-24 05:49:20', 1),
(3, 1, 10, 36, '2019-02-26', '2019-02-27', '2019-02-26 09:01:39', 1),
(4, 2, 4, 120, '2019-02-26', '2019-02-28', '2019-02-26 09:12:23', 1),
(5, 4, 2, 20, '2019-03-06', '2019-03-09', '2019-03-06 04:04:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproductcategory`
--

CREATE TABLE IF NOT EXISTS `tblproductcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `imagepath` text NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproductcategory`
--

INSERT INTO `tblproductcategory` (`id`, `name`, `imagepath`, `description`) VALUES
(1, 'Milk', 'images/milk.png', 'Our Milk is also pure milk. we only feed our cows with natural foods that contain the essential nutrients and vitamins they need. The cows always have access to clean water that is free from pollutants. At our Dairy Farm, we believe that what we feed our cows matters, because the healthier and balanced the food, the better quality the milk.'),
(2, 'Paneer', 'images/product-4-300x300.jpg', 'Paneer  is a fresh cheese common in the Indian subcontinent. It is an unaged, non-melting farmer cheese made by curdling milk with a vegetable-derived acid, such as lemon juice. Its acid-set form is called chhena.'),
(3, 'Ghee', 'images/ghee1-500x500.jpg', 'Authentic pure desi ghee is made from cow milk which is untouched by human hands and comes from grass-fed happy cows directly from a state-of-the-art advanced and hygienic our Dairy Farm. our Ghee has a typical rich aroma, granular texture like homemade ghee, and high nutritional value. Direct from our Dairy Farm to your Table.'),
(4, 'Curd', 'images/product-3-300x300.jpg', 'Curds are a dairy product obtained by coagulating milk in a process called curdling.The increased acidity causes the milk proteins (casein) to tangle into solid masses, or curds. Milk that has been left to sour (raw milk alone or pasteurized milk with added lactic acid bacteria) will also naturally produce curds, and sour milk cheeses are produced this way.'),
(5, 'Butter Milk', 'images/product-9-300x300.jpg', 'Buttermilk is a dairy drink. Originally, buttermilk was the liquid left behind after churning butter out of cultured cream. This type of buttermilk is now specifically referred to as traditional buttermilk.');

-- --------------------------------------------------------

--
-- Table structure for table `tblretailer`
--

CREATE TABLE IF NOT EXISTS `tblretailer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landmarkid` int(11) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblretailer`
--

INSERT INTO `tblretailer` (`id`, `name`, `address`, `landmarkid`, `contactno`, `emailid`, `password`) VALUES
(1, 'Priyank Lad', 'pramukh nagar,zadeshwar chowkdi', 3, 9924209820, '16mscit007@gmail.com', 'fd6c09734988030634a769b0c9b712ee'),
(3, 'Jayeshbhai Prajapati', 'Zadeshwar Gam', 5, 9909322696, 'jayeshbhaiprajapati@gmail.com', 'rajan');

-- --------------------------------------------------------

--
-- Table structure for table `tblRetailerorder`
--

CREATE TABLE IF NOT EXISTS `tblRetailerorder` (
  `no` int(11) NOT NULL,
  `retailerid` int(11) NOT NULL,
  `litre` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblRetailerorder`
--

INSERT INTO `tblRetailerorder` (`no`, `retailerid`, `litre`, `price`, `date`) VALUES
(1, 1, 20, 36, '2019-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE IF NOT EXISTS `tblstaff` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landmarkid` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `fname`, `lname`, `address`, `landmarkid`, `gender`, `contactno`, `role`, `email`, `password`, `updatedatetime`) VALUES
(9, 'Rajan', 'Prajapati', '7,shiv shakti nagar,\r\nopp,kumarsaka ,\r\nZadeshwar', 1, 'Male', 9909410487, 1, 'rajan.rp80@gmail.com', 'rajan4197', '2019-05-06 02:44:26'),
(10, 'Yogi', 'Prajapati', '7,shivshakti nagar,\r\nopp,kumar sala,\r\nzadeshwar.', 1, 'Male', 9727404289, 1, 'yogi123@gmail.com', 'yogi1234', '2019-02-03 02:46:47'),
(11, 'Priyank', 'Prajapati', 'Pariya gam,\r\nSayan\r\n', 1, 'Male', 9924209820, 0, 'pikulad7@gmail.com', 'priyank', '2019-02-19 07:09:10'),
(12, 'Adit', 'Lad', 'def', 3, 'Male', 9687724688, 0, 'ladadit7@gmail.com', 'priyank', '2019-05-06 06:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblunit`
--

CREATE TABLE IF NOT EXISTS `tblunit` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblunit`
--

INSERT INTO `tblunit` (`id`, `type`) VALUES
(1, 'gram'),
(2, 'kilogram'),
(3, 'mililitre'),
(4, 'litre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblarea`
--
ALTER TABLE `tblarea`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tblbill`
--
ALTER TABLE `tblbill`
  ADD PRIMARY KEY (`no`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landmarkid` (`landmarkid`);

--
-- Indexes for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  ADD PRIMARY KEY (`no`),
  ADD KEY `tblcustomerorder_tblbill__fk` (`billno`),
  ADD KEY `tblcustomerorder_tblproduct__fk` (`productid`);

--
-- Indexes for table `tbllandmark`
--
ALTER TABLE `tbllandmark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Areaid` (`Areaid`);

--
-- Indexes for table `tblmeasurement`
--
ALTER TABLE `tblmeasurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unitid` (`unitid`);

--
-- Indexes for table `tblmembership`
--
ALTER TABLE `tblmembership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `tblmilkcollection`
--
ALTER TABLE `tblmilkcollection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productcategoryid` (`productcategoryid`),
  ADD KEY `measurementid` (`measurementid`);

--
-- Indexes for table `tblproductcategory`
--
ALTER TABLE `tblproductcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblretailer`
--
ALTER TABLE `tblretailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblretailer_tbllandmark__fk` (`landmarkid`);

--
-- Indexes for table `tblRetailerorder`
--
ALTER TABLE `tblRetailerorder`
  ADD PRIMARY KEY (`no`),
  ADD KEY `tblRetailerorder_tblretailer__fk` (`retailerid`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landmarkid` (`landmarkid`);

--
-- Indexes for table `tblunit`
--
ALTER TABLE `tblunit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblarea`
--
ALTER TABLE `tblarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblbill`
--
ALTER TABLE `tblbill`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbllandmark`
--
ALTER TABLE `tbllandmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblmeasurement`
--
ALTER TABLE `tblmeasurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblmembership`
--
ALTER TABLE `tblmembership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmilkcollection`
--
ALTER TABLE `tblmilkcollection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblproductcategory`
--
ALTER TABLE `tblproductcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblretailer`
--
ALTER TABLE `tblretailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblRetailerorder`
--
ALTER TABLE `tblRetailerorder`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblunit`
--
ALTER TABLE `tblunit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbill`
--
ALTER TABLE `tblbill`
  ADD CONSTRAINT `tblbill_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`id`);

--
-- Constraints for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`id`),
  ADD CONSTRAINT `tblcart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`id`);

--
-- Constraints for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD CONSTRAINT `tblcustomer_ibfk_1` FOREIGN KEY (`landmarkid`) REFERENCES `tbllandmark` (`id`);

--
-- Constraints for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  ADD CONSTRAINT `tblcustomerorder_tblbill__fk` FOREIGN KEY (`billno`) REFERENCES `tblbill` (`no`),
  ADD CONSTRAINT `tblcustomerorder_tblproduct__fk` FOREIGN KEY (`productid`) REFERENCES `tblproduct` (`id`);

--
-- Constraints for table `tbllandmark`
--
ALTER TABLE `tbllandmark`
  ADD CONSTRAINT `tbllandmark_ibfk_1` FOREIGN KEY (`Areaid`) REFERENCES `tblarea` (`id`);

--
-- Constraints for table `tblmeasurement`
--
ALTER TABLE `tblmeasurement`
  ADD CONSTRAINT `tblmeasurement_ibfk_1` FOREIGN KEY (`unitid`) REFERENCES `tblunit` (`id`);

--
-- Constraints for table `tblmembership`
--
ALTER TABLE `tblmembership`
  ADD CONSTRAINT `tblmembership_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `tblcustomer` (`id`);

--
-- Constraints for table `tblmilkcollection`
--
ALTER TABLE `tblmilkcollection`
  ADD CONSTRAINT `tblmilkcollection_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `tblstaff` (`id`);

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`productcategoryid`) REFERENCES `tblproductcategory` (`id`),
  ADD CONSTRAINT `tblproduct_ibfk_2` FOREIGN KEY (`measurementid`) REFERENCES `tblmeasurement` (`id`);

--
-- Constraints for table `tblretailer`
--
ALTER TABLE `tblretailer`
  ADD CONSTRAINT `tblretailer_tbllandmark__fk` FOREIGN KEY (`landmarkid`) REFERENCES `tbllandmark` (`id`);

--
-- Constraints for table `tblRetailerorder`
--
ALTER TABLE `tblRetailerorder`
  ADD CONSTRAINT `tblRetailerorder_tblretailer__fk` FOREIGN KEY (`retailerid`) REFERENCES `tblretailer` (`id`);

--
-- Constraints for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD CONSTRAINT `tblstaff_ibfk_1` FOREIGN KEY (`landmarkid`) REFERENCES `tbllandmark` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
