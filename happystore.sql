-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 02:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `admin_level` varchar(200) NOT NULL,
  `file` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `admin_level`, `file`, `last_login`, `date_joined`) VALUES
(1, '55503043c90617d54f33dc4c16683012', 'Damilola', 'Ayeni', 'test@gmail.com', '$2y$10$YRJv/5CNCgRuCMJcoK5SwuRAgjfIj78023SF.mZ1CP8ShNAWPGQZm', '9030448824', 'No 6', 'super_admin', ' includes/uploads/89136.jpg', '2019-03-23 01:48:59', '2019-03-07 17:21:57'),
(2, '3c74a7d7f2f2ec0080351e95006a061a', 'Kemi ', 'Adeosun', 'kemi@gmail.com', '$2y$10$k9.tkQDAnptLglxrV8qMo.znO6jipbc86Ym.HATz4fO6wqmzwoGa2', '11111111111111', 'No 6 ajegunle', 'admin', ' includes/uploads/89183.jpg', '2019-03-13 11:39:37', '2019-03-07 17:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `cat_id`, `category_name`, `date_created`) VALUES
(1, 0, 'Phones & Phone ', '2019-03-13 10:09:55'),
(2, 0, 'Laptops and Laptop Accessories', '2019-03-13 10:10:15'),
(3, 0, 'Wears', '2019-03-13 10:10:29'),
(4, 3, 'Women', '2019-03-13 10:10:41'),
(5, 3, 'Men', '2019-03-13 10:10:55'),
(6, 1, 'iphones', '2019-03-13 10:11:06'),
(7, 1, 'infinix', '2019-03-13 10:11:30'),
(8, 2, 'Hp laptops', '2019-03-13 10:11:47'),
(9, 2, 'Dell laptops', '2019-03-13 10:12:00'),
(10, 3, 'Kids', '2019-03-13 10:12:15'),
(11, 4, 'women bag', '2019-03-13 16:40:35'),
(12, 4, 'Women Shoe', '2019-03-13 16:40:35'),
(13, 5, 'Men Shirts', '2019-03-13 16:40:35'),
(14, 5, 'Men Shoes', '2019-03-13 16:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_brand` varchar(300) NOT NULL,
  `product_color` varchar(233) NOT NULL,
  `product_description` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `delete_product` varchar(11) NOT NULL,
  `product_image` varchar(222) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_id`, `category_id`, `product_name`, `product_price`, `product_brand`, `product_color`, `product_description`, `featured`, `delete_product`, `product_image`, `date_created`) VALUES
(3, 1922723100, 6, 'iphone 7', '235000', 'Apple', 'Gold', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia asperiores sed optio amet culpa blanditiis, atque, iusto similique fuga molestias iure nostrum ratione quas accusamus quasi quae, ex animi eum!', 1, '0', 'includes/productImages/iphone.jpg', '2019-03-19 10:22:40'),
(4, 229201719, 4, 'Gucci bag', '83000', 'Gucci', 'Gold', 'hdhfjgjgfjnvjntrdjvtrnjvjvdf', 1, '0', 'includes/productImages/women bag4.jpg', '2019-03-20 09:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_attributes`
--

CREATE TABLE `tbl_product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(333) NOT NULL,
  `price` varchar(222) NOT NULL,
  `stock` varchar(333) NOT NULL,
  `size` varchar(233) NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_attributes`
--

INSERT INTO `tbl_product_attributes` (`id`, `product_id`, `sku`, `price`, `stock`, `size`, `date_updated`, `date_created`) VALUES
(1, 229201719, '1', '1', '1', '1', '0000-00-00 00:00:00', '2019-03-21 18:44:01'),
(2, 229201719, '3', '3', '3', '3', '0000-00-00 00:00:00', '2019-03-21 18:44:48'),
(3, 229201719, '4', '4', '4', '4', '0000-00-00 00:00:00', '2019-03-21 18:44:48'),
(4, 229201719, '5', '5', '5', '5', '0000-00-00 00:00:00', '2019-03-21 18:44:48'),
(5, 1922723100, 'zzzz', '3', '3', 'zzzzq3', '0000-00-00 00:00:00', '2019-03-21 18:52:01'),
(6, 1922723100, '2', '22', '2', '2', '0000-00-00 00:00:00', '2019-03-21 18:52:01'),
(7, 1922723100, '4', '4', '24', '4', '0000-00-00 00:00:00', '2019-03-21 18:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_images`
--

CREATE TABLE `tbl_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `files` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_images`
--

INSERT INTO `tbl_product_images` (`id`, `product_id`, `files`, `date_created`) VALUES
(1, 229201719, 'includes/addImages/images (1).jpg', '2019-03-23 02:43:46'),
(2, 229201719, 'includes/addImages/images.jpg', '2019-03-23 02:43:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_attributes`
--
ALTER TABLE `tbl_product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product_attributes`
--
ALTER TABLE `tbl_product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_images`
--
ALTER TABLE `tbl_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
