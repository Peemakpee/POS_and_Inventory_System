-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 12:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basedata2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(0, 'Mahogany'),
(2, 'Kamago'),
(3, 'Bamboo'),
(7, 'Coco');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`) VALUES
(9, 'Jack', 'Black', '09394566543'),
(11, 'A Walk in Customer', NULL, NULL),
(14, 'Miya', 'Sicat', '09781633451'),
(15, 'Peemak', 'Senabac', '09956288467'),
(16, 'Pablo', 'Gomez', '09891344576');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Mc Phy', 'Cabanes', 'Male', 'admin123@gmail.com', '09124033805', 1, '0000-00-00', 113),
(2, 'Rhea', 'Ambrad', 'Female', 'Rhea@gmail.com', '0905046472', 2, '09/17/2022', 159);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `INVENTORY_ID` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `SUP_PRICE` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `PROFIT` varchar(50) CHARACTER SET latin1 NOT NULL,
  `DATE_STOCK` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `SUPPLIER_ID` int(11) NOT NULL,
  `QTYREM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`INVENTORY_ID`, `QTY`, `SUP_PRICE`, `PRICE`, `PROFIT`, `DATE_STOCK`, `PRODUCT_ID`, `CATEGORY_ID`, `SUPPLIER_ID`, `QTYREM`) VALUES
(1, 500, 0, 120, '', '1993', 122, 0, 11, 0),
(2, 200, 0, 90, '', '1993', 123, 7, 17, 0),
(3, 50, 0, 130, '', '1993', 122, 0, 12, 0),
(4, 40, 0, 90, '', '1993', 123, 7, 16, 0),
(5, 20, 0, 190, '', '1992', 123, 7, 12, 0),
(6, 100, 0, 50, '', '2007', 124, 2, 17, 0),
(7, 30, 0, 89, '', '1989', 125, 3, 15, 0),
(8, 50, 0, 90, '', '1989', 125, 3, 12, 50),
(9, 30, 0, 55, '', '1988', 124, 2, 16, 30),
(10, 20, 0, 119, '', '1988', 122, 0, 12, 20),
(11, 10, 0, 88, '', '1988', 123, 7, 11, 10),
(12, 10, 0, 75, '', '1988', 125, 3, 12, 10),
(13, 30, 60, 62, '', '1988', 123, 7, 15, 30),
(14, 14, 50, 52, '', '1988', 123, 2, 16, 14),
(15, 34, 90, 92, '', '1988', 124, 2, 16, 34);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(111, 'Negros Occidental', 'Bacolod City'),
(112, 'Negros Occidental', 'Bacolod City'),
(113, 'Davao del Sur', 'Davao City'),
(114, 'Davao del Sur', 'Davao City'),
(115, 'Davao del Sur', 'Davao City'),
(116, 'Davao del Sur', 'Davao City'),
(126, 'Negros Occidental', 'Binalbagan'),
(130, 'Cebu', 'Bogo City'),
(131, 'Negros Occidental', 'Himamaylan'),
(132, 'Negros', 'Jupiter'),
(133, 'Aincrad', 'Floor 91'),
(134, 'negros', 'binalbagan'),
(135, 'hehe', 'tehee'),
(136, 'PLANET YEKOK', 'KOKEY'),
(137, 'Camiguin', 'Catarman'),
(138, 'Camiguin', 'Catarman'),
(139, 'Negros Occidental', 'Binalbagan'),
(140, 'Batangas', 'Lemery'),
(141, 'Capiz', 'Panay'),
(142, 'Camarines Norte', 'Labo'),
(143, 'Camarines Norte', 'Labo'),
(144, 'Camarines Norte', 'Labo'),
(145, 'Camarines Norte', 'Labo'),
(146, 'Capiz', 'Pilar'),
(147, 'Negros Occidental', 'Moises Padilla'),
(148, 'a', 'a'),
(149, '1', '1'),
(150, 'Negros Occidental', 'Himamaylan'),
(151, 'Masbate', 'Mandaon'),
(152, 'Aklanas', 'Madalagsasa'),
(153, 'Batangas', 'Mabini'),
(154, 'Bataan', 'Morong'),
(155, 'Davao del Sur', 'Davao City'),
(156, 'Negros Occidental', 'Bacolod'),
(157, 'Camarines Norte', 'Labo'),
(158, 'Negros Occidental', 'Binalbagan'),
(159, 'Davao del Sur', 'Davao City');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `NAME`, `CATEGORY_ID`, `DATE_STOCK_IN`) VALUES
(122, 'Mahogany(2x2x2)', 0, '2022-09-20'),
(123, 'Coco(2x2x2)', 0, '2022-09-20'),
(124, 'Kamago(2x2x2)', 2, '2022-09-20'),
(125, 'Bamboo3x3x3', 0, '2022-09-21'),
(126, 'Bamboo3x4x3', 3, '2022-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(11, 'CTRL F5 ', 114, '09070632475'),
(12, 'Davao Lumber Supplier', 115, '09085412761'),
(15, 'Traders Lumber Yard', 116, '09752496724'),
(16, 'Toril Lumber yard', 155, '09498317713'),
(17, 'Kwanggoals', 159, '09056485241');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`, `ID`) VALUES
(27, 11, '3', '260.00', '27.86', '232.14', '27.86', '260.00', '300', '2022-09-24 15:04 pm', '0924150520', 0),
(28, 14, '1', '180.00', '19.29', '160.71', '19.29', '180.00', '200', '2022-09-24 15:13 pm', '0924151359', 0),
(29, 16, '2', '170.00', '18.21', '151.79', '18.21', '170.00', '180', '2022-09-24 17:28 pm', '0924172816', 0),
(30, 9, '2', '139.00', '14.89', '124.11', '14.89', '139.00', '140', '2022-09-25 04:56 am', '092545612', 0),
(31, 16, '1', '90.00', '9.64', '80.36', '9.64', '90.00', '100', '2022-09-25 06:35 am', '092563602', 0),
(32, 14, '1', '89.00', '9.54', '79.46', '9.54', '89.00', '90', '2022-09-25 13:36 pm', '092573657', 0),
(33, 16, '2', '210.00', '22.50', '187.50', '22.50', '210.00', '210', '2022-09-25 14:58 pm', '092591744', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`, `DATE`) VALUES
(28, '0917102740', 'Mahogany(3x3x3)', '2', '450', 'Mc Phy', 'Manager', ''),
(29, '0917102924', 'Mahogany(3x3x3)', '1', '450', 'Mc Phy', 'Manager', ''),
(30, '0917102924', 'Coco(4x4x4)', '1', '900', 'Mc Phy', 'Manager', ''),
(31, '0917103040', 'Mahogany(4x4x4)', '1', '25', 'Mc Phy', 'Manager', ''),
(32, '091894222', 'Bamboo(2x2x2)', '1', '450', 'Mc Phy', 'Manager', ''),
(33, '091894222', 'Kamago(4x3x3)', '1', '650', 'Mc Phy', 'Manager', ''),
(34, '091894222', 'Coco(4x4x4)', '1', '900', 'Mc Phy', 'Manager', ''),
(35, '091894222', 'Mahogany(3x3x3)', '1', '450', 'Mc Phy', 'Manager', ''),
(36, '091894222', 'Mahogany(4x4x4)', '1', '25', 'Mc Phy', 'Manager', ''),
(37, '091894222', 'Bamboo(3x3x3)', '1', '550', 'Mc Phy', 'Manager', ''),
(38, '091894825', 'Kamago(4x3x3)', '3', '650', 'Mc Phy', 'Manager', ''),
(39, '091895709', 'Kamago(4x3x3)', '3', '650', 'Mc Phy', 'Manager', ''),
(40, '0918103219', 'Coco(5x5x5)', '2', '500', 'Mc Phy', 'Manager', ''),
(41, '0918103349', 'Bamboo(2x2x2)', '1', '450', 'Mc Phy', 'Manager', ''),
(42, '0918103349', 'Bamboo(3x3x3)', '1', '550', 'Mc Phy', 'Manager', ''),
(43, '0918110546', 'Mahogany(1x1x1)', '2', '300', 'Mc Phy', 'Manager', ''),
(44, '0924150520', 'Mahogany(2x2x2)', '1', '120', 'Mc Phy', 'Manager', ''),
(45, '0924150520', 'Kamago(2x2x2)', '1', '50', 'Mc Phy', 'Manager', ''),
(46, '0924150520', 'Coco(2x2x2)', '1', '90', 'Mc Phy', 'Manager', ''),
(47, '0924151359', 'Coco(2x2x2)', '2', '90', 'Mc Phy', 'Manager', ''),
(48, '0924172816', 'Mahogany(2x2x2)', '1', '120', 'Mc Phy', 'Manager', '2022-09-24 17:28 pm'),
(49, '0924172816', 'Kamago(2x2x2)', '1', '50', 'Mc Phy', 'Manager', '2022-09-24 17:28 pm'),
(50, '092545612', 'Bamboo3x3x3', '1', '89', 'Mc Phy', 'Manager', '2022-09-25 04:56 am'),
(51, '092545612', 'Kamago(2x2x2)', '1', '50', 'Mc Phy', 'Manager', '2022-09-25 04:56 am'),
(52, '092563602', 'Coco(2x2x2)', '1', '90', 'Mc Phy', 'Manager', '2022-09-25 06:35 am'),
(53, '092573657', 'Bamboo3x3x3', '1', '89', 'Mc Phy', 'Manager', '2022-09-25 13:36 pm'),
(54, '092591744', 'Mahogany(2x2x2)', '1', '120', 'Mc Phy', 'Manager', '2022-09-25 14:58 pm'),
(55, '092591744', 'Coco(2x2x2)', '1', '90', 'Mc Phy', 'Manager', '2022-09-25 14:58 pm');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(10, 1, 'pmk', '4fe81e45ec00b1097764fc4d716b573e6716081e', 2),
(11, 1, 'Spider', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(12, 2, 'Shak', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`INVENTORY_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `INVENTORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `product` (`PRODUCT_ID`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`SUPPLIER_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_details` (`TRANS_D_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
