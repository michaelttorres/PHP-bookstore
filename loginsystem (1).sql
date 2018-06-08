-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 02:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`categoryId`, `category`, `userId`) VALUES
(1, 'Realistic Fiction', 'jacksepticeye'),
(18, 'Science Fiction', 'jgn'),
(19, 'LGBT', 'penpen'),
(23, 'Horror', 'penpen'),
(24, 'New Adult Fiction', 'chester'),
(25, 'Young Adult Fiction', 'chester');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(75) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qtyInstock` int(3) NOT NULL,
  `imageType` int(5) NOT NULL,
  `publisherId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booksubcategory`
--

CREATE TABLE `booksubcategory` (
  `subCategoryId` int(11) NOT NULL,
  `subCategory` varchar(50) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booksubcategory`
--

INSERT INTO `booksubcategory` (`subCategoryId`, `subCategory`, `userId`) VALUES
(6, 'General Cross-Genre', 'jacksepticeye'),
(8, 'Juvenile Fantasy', 'jacksepticeye'),
(10, 'Matron Literature', 'jacksepticeye'),
(12, 'Experimental fiction', 'jacksepticeye'),
(13, 'Graphic Novel', 'jacksepticeye'),
(17, 'True Crime', 'jacksepticeye');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userId` varchar(50) NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customercc`
--

CREATE TABLE `customercc` (
  `ccType` varchar(25) NOT NULL,
  `ccFirstName` varchar(50) NOT NULL,
  `ccLastName` varchar(50) NOT NULL,
  `ccNumber` int(16) NOT NULL,
  `ccSec` int(11) NOT NULL,
  `ccExpDate` int(11) NOT NULL,
  `ccId` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `userId` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `unitPrice` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `totalPrice` decimal(10,0) NOT NULL,
  `orderDate` date NOT NULL,
  `userId` int(11) NOT NULL,
  `isbn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherId` int(11) NOT NULL,
  `pubName` varchar(50) NOT NULL,
  `pubAddress` varchar(50) NOT NULL,
  `pubCity` varchar(50) NOT NULL,
  `pubState` varchar(2) NOT NULL,
  `pubZip` int(5) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherId`, `pubName`, `pubAddress`, `pubCity`, `pubState`, `pubZip`, `userId`) VALUES
(5, 'Penguin Random House', '1019 IN-47', 'Crawfordsville', 'IN', 47933, 'chester'),
(6, 'Simon & Schuster', '1230 6th Ave', 'New York City', 'NY', 10020, 'chester'),
(7, 'Hachette Book Group Inc', '121 S Enterprise Blvd', 'Lebanon', 'IN', 46052, 'chester'),
(8, 'Macmillan Publishing', '75 Varick St', 'New York City', 'NY', 10013, 'chester'),
(9, 'Pearson Education', '800 E 96th ST #300', 'Indianapolis', 'IN', 46240, 'chester'),
(10, 'Oxford University Press Inc', '198 Madison Ave #8', 'New York City', 'NY', 10016, 'chester');

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE `usercontact` (
  `userId` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercontact`
--

INSERT INTO `usercontact` (`userId`, `subject`, `message`) VALUES
('chester', 'I\'m doing stuff, Lori', 'Things'),
('chester', 'I\'m doing stuff, Lori', 'Things'),
('chester', 'Watch', 'Get Out'),
('chester', 'Watch', 'Get Out'),
('chester', 'Watch', 'Get Out');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`) VALUES
(18, 'Chester', 'Bennington', 'chester', 'chester@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'Jack', 'Septic', 'jacksepticeye', 'eye@gmail.com', 'f19bd0844e53369373385609e28dbf84'),
(15, 'Jogn', 'Doe', 'jgn', 'joendoe@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'Mickey', 'Mouse', 'mickeymouse', 'godislove195877@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(14, 'Penpen', 'Pen', 'pen', 'pen@gmail.com', '03f00e8e9d0d0847bb10a3a22334274a'),
(12, 'Penny', 'Lane', 'penpen', 'penpen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'Chunky', 'Cheese', 'wemustfeedhim', 'chuckycheese@gmail.com', '99025de55865298f06092e2716fbc834');

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE `usersinfo` (
  `address` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `phone` int(11) NOT NULL,
  `shipAddress` varchar(50) NOT NULL,
  `shipCity` varchar(50) NOT NULL,
  `shipState` varchar(2) NOT NULL,
  `shipZip` int(5) NOT NULL,
  `shipCountry` varchar(20) NOT NULL,
  `userId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`address`, `city`, `state`, `zip`, `phone`, `shipAddress`, `shipCity`, `shipState`, `shipZip`, `shipCountry`, `userId`) VALUES
('123 Septic ', 'Eye', 'SE', 12345, 1111111111, '123 Eye', 'Eye', 'SE', 12345, 'Ireland', 'jacksepticeye'),
('100 Main ST', 'ANYTOWN', 'KY', 12345, 1111111111, '123 Penguin Rd', 'Penguin', 'PG', 12345, 'USA', 'jgn'),
('123 Club House', 'Mouse', 'MO', 12345, 1111111111, '123 Mouse House', 'Mouse', 'MO', 12345, 'Mouse', 'mickeymouse'),
('123 Penguin Rd', 'Penguin', 'PG', 12345, 1111111111, '123 Penguin Rd', 'Penguin', 'PG', 12345, 'USA', 'pen'),
('123 Wilky May', 'City', 'KY', 12345, 1111111111, '123 Address', 'City', 'KY', 12345, 'USA', 'penpen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `foreignkeyuserId` (`userId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `subCategoryId` (`subCategoryId`),
  ADD KEY `publisherId` (`publisherId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `title` (`title`),
  ADD KEY `author` (`author`),
  ADD KEY `image` (`image`),
  ADD KEY `price` (`price`),
  ADD KEY `qtyInstock` (`qtyInstock`),
  ADD KEY `imageType` (`imageType`);

--
-- Indexes for table `booksubcategory`
--
ALTER TABLE `booksubcategory`
  ADD PRIMARY KEY (`subCategoryId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `customercc`
--
ALTER TABLE `customercc`
  ADD PRIMARY KEY (`ccId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `orderId` (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherId`),
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- Indexes for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `username` (`username`);

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD UNIQUE KEY `userId_2` (`userId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booksubcategory`
--
ALTER TABLE `booksubcategory`
  MODIFY `subCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customercc`
--
ALTER TABLE `customercc`
  MODIFY `ccId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD CONSTRAINT `foreignkeyuserId` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);

--
-- Constraints for table `booksubcategory`
--
ALTER TABLE `booksubcategory`
  ADD CONSTRAINT `booksubcategory_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);

--
-- Constraints for table `customercc`
--
ALTER TABLE `customercc`
  ADD CONSTRAINT `customercc_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `orderdetails_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD CONSTRAINT `usercontact_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
