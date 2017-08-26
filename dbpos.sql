-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2015 at 05:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(7, 'Walk in Customers', 'na', 'na', 'na'),
(8, 'Paolo Asoy', '09456465465', 'Quezon City', 'na'),
(9, 'Carl Moneda', '09431215641', 'Valenzuela', 'na'),
(10, 'Ian Estabaya', '09644164565', 'Quezon City', 'na'),
(11, 'Jun Magayanes', '09641513561', 'Malabon', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`) VALUES
(21, 'Finger Food', 'Beta max', 100, 3, 4, 'Mangboks betamax'),
(22, 'Finger Food', 'Quek quek', 100, 2, 3, 'Street Quek2x'),
(23, 'Finger Food', 'fish balls', 100, 1, 1, 'Stick Fishing ball'),
(24, 'Finger Food', 'Chicken Ball', 100, 3, 5, 'Stick Fishing ball'),
(25, 'Dessert', 'Puto', 100, 3, 5, 'kakanin atb.');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `customers` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amnt` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `tendered` int(11) NOT NULL,
  `changed` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `suppliername` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(13, 'Mangboks betamax', 'Juli Sanjuan', 'Malabon', '09215454654', 'na'),
(14, 'Siomai tbp.', 'Jezzy Jaime', 'Caloocan', '09646454564', 'na'),
(15, 'Stick Fishing ball', 'Nardo Besoza', 'Valenzuela', '06365465446', 'na'),
(16, 'kakanin atb.', 'Loui Cruz', 'Pasay', '09634654654', 'na'),
(17, 'Street Quek2x', 'Nilo Cruz', 'Pasig', '09765464164', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'salesperson', 'salesperson', 'Salesperson');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`,`category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
