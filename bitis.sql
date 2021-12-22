-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2021 at 03:54 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitis`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_list`
--

CREATE TABLE `adm_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `access` tinyint(5) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cli_list`
--

CREATE TABLE `cli_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` bit(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `birthday` date DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cli_list`
--

INSERT INTO `cli_list` (`id`, `name`, `gender`, `address`, `email`, `phone`, `photo`, `password`, `birthday`, `token`) VALUES
(1, 'hung', b'01', '12', '12', '12', NULL, '', NULL, NULL),
(2, 'hung', b'01', '12', '12', '12', NULL, '', NULL, NULL),
(3, '1', b'00', 'no', 'dokhaihung2003@gmail.com', '1', 'no', '$2y$10$39P/ctVOL53o4KOVxcUWu.pWBhsrrWpxgI.RrNKl0IWRkBA1U11.C', NULL, '1dee192b07f289b6ec2837cf691c17fe1639971388'),
(4, '12', b'01', 'no', 'dokhaihung2003@gmail.com2222', '1', 'no', '$2y$10$15PoIrYmtFjoD/9rAOVmJeb7b2DpNW4rU81LrcJOYQs58JqbcKVju', '2021-12-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `receiving_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `description`, `phone`, `photo`, `delivery_address`, `receiving_address`) VALUES
(1, 'CONVERSE', '', '123', '', 'here', 'there'),
(3, 'Bitis', '', '', '', '', ''),
(4, 'Nike', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `out_list`
--

CREATE TABLE `out_list` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `descrpition` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `manufacturers_id` int(11) NOT NULL,
  `gender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `name`, `price`, `quantity`, `category`, `descrpition`, `photo`, `manufacturers_id`, `gender`) VALUES
(2, 'Run Star Hike Create Next Purpose: Sustainability Hi-Top\r\n', 2500000, 1000, 'Giày thể thao', '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/171575/171575Cstandard.jpg', 1, 1),
(5, 'Chuck Taylor All Star Lift Surface Fusion', 1500000, 1000, 'Giày thể thao', '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/571670c/571670Cstandard.jpg', 1, 0),
(6, 'Chuck Taylor All Star Crater Knit High Top', 1500000, 1000, 'Giày thể thao', '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/170869c/170869Cshot2.jpg', 1, 3),
(7, 'Giày sandal nữ Aokang 682831037', 150000, 20, 'Giày Sandal', '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013660_L.jpg?width=550&height=550', 4, 0),
(8, 'Giày sandal nữ Senta SE107SH08YOHVN', 1500000, 1000, 'Giày Sandal', '', 'https://img.yes24.vn/Upload/ProductImage/SENTA/1986228_L.jpg?width=550&height=550', 3, 0),
(9, 'Giày sandal nữ Aokang 682831080', 100000, 200, 'Giày Sandal', '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013639_L.jpg?width=550&height=550', 1, 0),
(10, 'Giày sandal Adidas Adilete F35417', 1500000, 10009, 'Giày Sandal', '', 'https://img.yes24.vn/Upload/ProductImage/GmarketSport/2030428_L.jpg?width=550&height=550', 4, 1),
(11, 'Giày Sandal Nam Aokang 182831014', 170000, 202, 'Giày Sandal', '', 'https://shop-cdn.coccoc.com/images/product/Hg/Cf/HgCfycRike.jpg', 4, 1),
(12, 'Giày Sandal Doctor Nam BIGGBEN Da Bò Thật SD70', 200000, 999, 'Giày Sandal', '', 'https://salt.tikicdn.com/cache/400x400/ts/product/74/a2/d3/f02e8c1714cf99b458cba8269bb6d232.jpg.webp', 1, 1),
(13, 'Sandal Eva Phun Nam Biti\'s Hunter DEMH00201XAM (Xám)', 1500000, 1000, 'Giày Sandal', '', 'https://salt.tikicdn.com/cache/400x400/ts/product/d5/1f/b6/5fb3c22b35097a46a7f46f436bbbc2e3.jpg.webp', 3, 1),
(14, 'Giày Thể Thao Cao Cấp Nữ Biti\'s Hunter Layered Upper DSWH02800HOG (Hồng)', 15000009, 999, 'Giày thể thao', '', 'https://product.hstatic.net/1000230642/product/02800hog__2__dd6e1a064a294e108c2c90e7a728470d_1024x1024.jpg', 3, 0),
(15, 'Giày Tây Nam Biti\'s DVM283770NAD (Nâu)', 150000, 999, 'Giày Tây', '', 'https://product.hstatic.net/1000230642/product/dvm283770nad_dd6947c86c3049a99227e2854ddc1ef0_1024x1024.jpg', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cli_list`
--
ALTER TABLE `cli_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_list`
--
ALTER TABLE `out_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_out_manufacturers_id` (`client_id`),
  ADD KEY `FK_out_products_id` (`products_id`);

--
-- Indexes for table `products_list`
--
ALTER TABLE `products_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_manufacturers_id` (`manufacturers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cli_list`
--
ALTER TABLE `cli_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `out_list`
--
ALTER TABLE `out_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_list`
--
ALTER TABLE `products_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `out_list`
--
ALTER TABLE `out_list`
  ADD CONSTRAINT `FK_out_client_id` FOREIGN KEY (`client_id`) REFERENCES `cli_list` (`id`),
  ADD CONSTRAINT `FK_out_products_id` FOREIGN KEY (`products_id`) REFERENCES `products_list` (`manufacturers_id`);

--
-- Constraints for table `products_list`
--
ALTER TABLE `products_list`
  ADD CONSTRAINT `FK_products_manufacturers_id` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufactures` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
