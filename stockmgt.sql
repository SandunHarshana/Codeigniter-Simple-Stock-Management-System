-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2019 at 04:08 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `salesman` varchar(255) NOT NULL,
  `good` varchar(255) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `monthly_amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `added_by` int(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `bill_no`, `reg_no`, `customer_name`, `adress`, `contact`, `nic`, `salesman`, `good`, `quantity`, `amount`, `monthly_amount`, `payment_date`, `added_by`, `status`) VALUES
(1, '1', 'wwq212', 'askajsj', 'AJSDAJS', '091991876', '129982938v', '2', '1', '1.00', '1200.00', '200.00', '2018-01-25 00:00:00', 2, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payments`
--

CREATE TABLE `monthly_payments` (
  `id` int(255) NOT NULL,
  `invoice_id` int(255) NOT NULL,
  `date_to_be_paid` datetime NOT NULL,
  `month_amount` decimal(10,2) NOT NULL,
  `paid_date` datetime NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `remaining_amount` decimal(10,2) NOT NULL,
  `added_by` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesmans`
--

CREATE TABLE `salesmans` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesmans`
--

INSERT INTO `salesmans` (`id`, `name`, `date`) VALUES
(1, 'anil', '0000-00-00 00:00:00'),
(2, 'harshana', '2018-01-19 04:58:09'),
(3, 'taranga', '2018-01-19 04:58:15'),
(4, 'lasanka', '2018-05-18 07:29:42'),
(5, 'danaro', '2018-05-18 07:30:23'),
(6, 'nandana', '2018-05-18 07:30:25'),
(7, 'siva', '2018-05-18 07:30:34'),
(8, 'amila', '2018-05-18 07:32:58'),
(9, 'pasan', '2018-05-18 07:33:30'),
(10, 'lasitha', '2018-05-18 07:34:00'),
(11, 'sampath', '2018-05-18 07:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(255) NOT NULL,
  `stock_name` varchar(50) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `stock_name`, `quantity`, `unit_price`, `sell_price`) VALUES
(1, 'ala', '9.00', '950.00', '1200.00'),
(2, 'bathala', '10.00', '100.00', '1000.00'),
(3, 'Limax sanwich maker ', '3.00', '1250.00', '2500.00'),
(4, 'Limax wallfan', '1.00', '3500.00', '6500.00'),
(5, 'LIMAX Ricecooker 2kg', '8.00', '2650.00', '5600.00'),
(6, 'LIMAX Ricecooker 1kg', '10.00', '2250.00', '4350.00'),
(7, 'LIMAX dry iron', '2.00', '837.00', '2000.00'),
(8, 'LIMAX heetar jug silvar', '16.00', '1050.00', '2500.00'),
(9, 'LIMAX  radio ', '2.00', '2430.00', '5500.00'),
(10, 'LIMAX 2in1 subwopar', '1.00', '4436.00', '10000.00'),
(11, 'LIMAX 3in1 subwopar', '1.00', '6890.00', '15000.00'),
(12, 'LIMAX 4in1 subwopar', '0.00', '9213.00', '20000.00'),
(13, 'LEXCO table fan', '3.00', '3050.00', '6100.00'),
(14, 'LEXCO sanwich maker', '1.00', '1415.00', '2500.00'),
(15, 'LEXCO stand fan', '2.00', '3390.00', '7500.00'),
(16, 'LEXCO rice cooker 1 KG', '1.00', '2290.00', '4350.00'),
(17, 'LEXCO heavy iron', '2.00', '1250.00', '3000.00'),
(18, 'LEXCO antenna', '6.00', '1425.00', '2500.00'),
(19, 'LEXCO large radio', '3.00', '2486.00', '5500.00'),
(20, 'LEXCO small radio', '6.00', '1490.00', '3000.00'),
(21, 'LEXCO home theater system', '1.00', '16750.00', '32500.00'),
(22, 'LEXCO 5 in 1 sub', '1.00', '10340.00', '21500.00'),
(23, 'LEXCO half tower', '1.00', '16750.00', '32500.00'),
(24, 'RANGE obit fan', '1.00', '3870.00', '7500.00'),
(25, 'RANGE air ventilating fan 8\'\'', '1.00', '2245.00', '4500.00'),
(26, 'RANGE air ventilating fan 10\'\'', '1.00', '2500.00', '5250.00'),
(27, 'RANGE dish rack', '4.00', '1823.00', '4000.00'),
(28, 'RANGE stand fan ', '1.00', '3482.00', '7500.00'),
(29, 'RANGE thermos pot', '4.00', '3196.00', '7500.00'),
(30, 'RANGE blender ', '26.00', '4666.00', '9500.00'),
(31, 'RANGE e.oven 2KG', '1.00', '8200.00', '16500.00'),
(32, 'RANGE glass top (Vietnamese)', '6.00', '3984.00', '8000.00'),
(33, 'RANGE glass top no.1', '0.00', '4384.00', '9000.00'),
(34, 'RANGE normal gas slip b 2', '1.00', '2410.00', '6000.00'),
(35, 'RANGE vacuum flasks 1.8 L', '3.00', '820.00', '1500.00'),
(36, 'RANGE siviling fan', '9.00', '4106.00', '8000.00'),
(37, 'RANGE single gas slip', '0.00', '1525.00', '3500.00'),
(38, 'RICH aluminium pressare cooker 5L', '1.00', '3110.00', '6500.00'),
(39, 'RICH aluminium pressure cooker 7.5L', '2.00', '3680.00', '7500.00'),
(40, 'RICH aluminium pressure cooker 10L', '2.00', '4140.00', '8500.00'),
(41, 'RICH hot pot alluminum', '3.00', '2360.00', '4500.00'),
(42, 'RICH filter 16L', '2.00', '2475.00', '4750.00'),
(43, 'RICH filter 20L', '2.00', '2760.00', '5800.00'),
(44, 'RICH remote stand fan', '1.00', '4600.00', '9000.00'),
(45, 'RICH e. pressure cooker 8L', '1.00', '7130.00', '14500.00'),
(46, 'RICH rice cooker 1 KG', '1.00', '2700.00', '4350.00'),
(47, 'RICH hand bitter small', '1.00', '1610.00', '3000.00'),
(48, 'RICH hand bitter  with bold ', '1.00', '2645.00', '5000.00'),
(49, 'RICH d.v.d.player ', '4.00', '4225.00', '8000.00'),
(50, 'RICH large clock ', '2.00', '780.00', '1600.00'),
(51, 'RICH small clock', '2.00', '660.00', '1500.00'),
(52, 'RICH nonstick cook wear 7pcs', '2.00', '4255.00', '8500.00'),
(53, 'RICH nonstick cook wear 5pcs', '2.00', '2875.00', '5750.00'),
(54, 'RICH normal gas slip b 2', '2.00', '2875.00', '6000.00'),
(55, 'RICH vacuum flasks 1.8L', '4.00', '835.00', '1500.00'),
(56, 'RICH air pot 3L', '1.00', '1850.00', '3000.00'),
(57, 'ARPICO water pump 1/2\'\' (0.5 hp)', '1.00', '8300.00', '17500.00'),
(58, 'ARPICO water pump 1\'\' (1 hp)', '0.00', '1.00', '26000.00'),
(59, 'ARPICO hybrid water tanks 500L', '0.00', '4890.00', '8000.00'),
(60, 'ARPICO mattress ssnq 7260', '1.00', '5751.00', '12000.00'),
(61, 'ARPICO mattress ssnq 7248', '1.00', '4652.00', '8500.00'),
(62, 'ARPICO flexifoam 7236', '4.00', '2793.00', '7300.00'),
(63, 'ARPICO flexifoam 7248', '2.00', '3649.00', '8500.00'),
(64, 'ARPICO flexifoam 7260', '0.00', '4514.00', '12000.00'),
(65, 'NIPPON plastic  kama  putu set', '1.00', '4422.00', '8000.00'),
(66, 'NIPPON plastic  kama  putu set', '1.00', '4422.00', '8000.00'),
(67, 'NIPPON plastic  kama  putu set', '1.00', '4422.00', '8000.00'),
(68, 'NIPPON plastic  sala  putu set', '0.00', '3918.00', '8000.00'),
(69, 'NIPPON plastic  varanda vision chair set', '2.00', '6192.00', '10950.00'),
(70, 'NIPPON plastic  varanda pasipic chair set', '0.00', '6846.00', '13500.00'),
(71, 'NIPPON plastic  hansi putu ', '0.00', '1091.00', '1900.00'),
(72, 'NIPPON plastic  table 6*4', '1.00', '5967.00', '10500.00'),
(73, 'NIPPON plastic  table 4*2 ', '1.00', '3496.00', '7000.00'),
(74, 'NIPPON plastic  stool', '8.00', '400.00', '650.00'),
(75, 'PHILIPS LED 4W', '12.00', '224.00', '440.00'),
(76, 'PHILIPS LED 7W', '70.00', '288.00', '525.00'),
(77, 'PHILIPS LED 9W', '35.00', '352.00', '640.00'),
(78, 'PHILIPS LED 40W', '3.00', '1280.00', '2650.00'),
(79, 'PHILIPS LED 12w', '20.00', '464.00', '930.00'),
(80, 'PHILIPS LED 13w', '12.00', '520.00', '1040.00'),
(81, 'QUEEN STAR OC Cupboard (6*3) A.B.', '0.00', '8500.00', '17500.00'),
(82, 'QUEEN STAR Iron rack', '0.00', '1700.00', '4000.00'),
(83, 'QUEEN STAR LED LAMP (S)', '0.00', '1400.00', '2850.00'),
(84, 'QUEEN STAR cup only  set (L)', '0.00', '525.00', '800.00'),
(85, 'QUEEN STAR AR Water tank HYBRID 500L', '0.00', '4960.00', '8000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'danarodistribution@gmail.com', 'asela123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesmans`
--
ALTER TABLE `salesmans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesmans`
--
ALTER TABLE `salesmans`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
