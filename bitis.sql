-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2021 at 06:39 AM
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
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` bit(2) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_list`
--

INSERT INTO `adm_list` (`id`, `name`, `phone`, `address`, `gender`, `birthday`, `email`, `photo`, `password`, `access`) VALUES
(1, 'Nhat', '09771168123', 'Điện Biên Phủ, Quận 1', b'01', '1997-09-23', 'red@gmail.com', 'https://static.wikia.nocookie.net/heroes-and-villians/images/8/83/Winnie_the_Pooh.png/revision/latest/scale-to-width-down/1000?cb=20191229203055', 'abc', b'01'),
(3, 'Huy', '0982224466', 'Hải Phòng', b'01', '1998-07-23', 'blue@gmail.com', '//upload.wikimedia.org/wikipedia/vi/thumb/1/1a/Mickey-Mouse.jpg/220px-Mickey-Mouse.jpg', 'abc', b'00');

-- --------------------------------------------------------

--
-- Table structure for table `cli_list`
--

CREATE TABLE `cli_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` bit(2) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
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
(5, 'Lokiss', b'00', 'no', '2@2', '12', 'no', '', '2021-12-10', '695bcb9f1897e98235f64704a06753b31640178666'),
(14, '1', b'01', '', 'dokhaihung2003@gmail.com', '1', '', '$2y$10$DvjscuNyVQYCd/B3D6wnVu1NuF.CVOVyuRSBHSmsbKJozMBrVv43C', NULL, '2ee7906b28075db68ad1a02e2f4641a61640932025'),
(15, '2', b'01', '', 'dokhaihung2003@gmail.com2', '2', '', '$2y$10$04FOKbl86y9Vg.qOIv1YGuFxbt7h4PqrRmwYtzhZTYL6RPLCl8kZy', NULL, NULL);

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
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `description`, `phone`, `photo`, `address`) VALUES
(1, 'CONVERSE', '', '123', '', 'here'),
(3, 'Bitis', '', '', '', ''),
(4, 'Nike', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `out_list`
--

CREATE TABLE `out_list` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone` varchar(15) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `note` enum('hủy','mới','duyệt') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_list`
--

INSERT INTO `out_list` (`id`, `client_id`, `order_time`, `receiver_name`, `receiver_phone`, `receiver_address`, `note`) VALUES
(1, 5, '2021-12-24 10:33:32', 'Danh', '0922113344', 'Đà Nẵng', 'mới'),
(2, 5, '2021-12-24 10:33:32', 'Danh', '0922113344', 'Đà Nẵng', 'mới');

-- --------------------------------------------------------

--
-- Table structure for table `out_product`
--

CREATE TABLE `out_product` (
  `out_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `category`) VALUES
(1, 'Giày Sandal'),
(2, 'Giày Tây'),
(3, 'Giày Thể Thao');

-- --------------------------------------------------------

--
-- Table structure for table `products_gender`
--

CREATE TABLE `products_gender` (
  `id` tinyint(4) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_gender`
--

INSERT INTO `products_gender` (`id`, `gender`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Nam, Nữ'),
(4, 'Trẻ em');

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gender_id` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `manufacturers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `name`, `price`, `quantity`, `gender_id`, `category_id`, `description`, `photo`, `manufacturers_id`) VALUES
(2, 'Run Star Hike Create Next Purpose: Sustainability Hi-Top\r\n', 2500000, 1000, 3, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/171575/171575Cstandard.jpg', 1),
(5, 'Chuck Taylor All Star Lift Surface Fusion', 1500000, 1000, 3, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/571670c/571670Cstandard.jpg', 1),
(6, 'Chuck Taylor All Star Crater Knit High Top', 1500000, 1000, 4, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/170869c/170869Cshot2.jpg', 1),
(7, 'Giày sandal nữ Aokang 682831037', 150000, 20, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013660_L.jpg?width=550&height=550', 4),
(8, 'Giày sandal nữ Senta SE107SH08YOHVN', 1500000, 1000, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/SENTA/1986228_L.jpg?width=550&height=550', 3),
(9, 'Giày sandal nữ Aokang 682831080', 100000, 200, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013639_L.jpg?width=550&height=550', 1),
(10, 'Giày sandal Adidas Adilete F35417', 1500000, 10009, 1, 1, '', 'https://img.yes24.vn/Upload/ProductImage/GmarketSport/2030428_L.jpg?width=550&height=550', 4),
(11, 'Giày Sandal Nam Aokang 182831014', 170000, 202, 1, 1, '', 'https://shop-cdn.coccoc.com/images/product/Hg/Cf/HgCfycRike.jpg', 4),
(12, 'Giày Sandal Doctor Nam BIGGBEN Da Bò Thật SD70', 200000, 999, 1, 1, '', 'https://salt.tikicdn.com/cache/400x400/ts/product/74/a2/d3/f02e8c1714cf99b458cba8269bb6d232.jpg.webp', 1),
(13, 'Sandal Eva Phun Nam Biti\'s Hunter DEMH00201XAM (Xám)', 1500000, 1000, 1, 1, '', 'https://salt.tikicdn.com/cache/400x400/ts/product/d5/1f/b6/5fb3c22b35097a46a7f46f436bbbc2e3.jpg.webp', 3),
(14, 'Giày Thể Thao Cao Cấp Nữ Biti\'s Hunter Layered Upper DSWH02800HOG (Hồng)', 15000009, 999, 2, 3, '', 'https://product.hstatic.net/1000230642/product/02800hog__2__dd6e1a064a294e108c2c90e7a728470d_1024x1024.jpg', 3),
(15, 'Giày Tây Nam Biti\'s DVM283770NAD (Nâu)', 150000, 999, 1, 2, '', 'https://product.hstatic.net/1000230642/product/dvm283770nad_dd6947c86c3049a99227e2854ddc1ef0_1024x1024.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_history`
--

CREATE TABLE `receipt_history` (
  `out_id` int(11) NOT NULL,
  `adm_id` int(11) NOT NULL,
  `receipt_stat` tinyint(4) NOT NULL,
  `work_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_list`
--
ALTER TABLE `adm_list`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `FK_out_manufacturers_id` (`client_id`);

--
-- Indexes for table `out_product`
--
ALTER TABLE `out_product`
  ADD PRIMARY KEY (`out_id`,`product_id`),
  ADD KEY `FK_product_id` (`product_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_gender`
--
ALTER TABLE `products_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_list`
--
ALTER TABLE `products_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_manufacturers_id` (`manufacturers_id`),
  ADD KEY `FK_products_gender` (`gender_id`) USING BTREE,
  ADD KEY `FK_products_category` (`category_id`) USING BTREE;

--
-- Indexes for table `receipt_history`
--
ALTER TABLE `receipt_history`
  ADD PRIMARY KEY (`out_id`,`adm_id`),
  ADD KEY `FK_admin_id` (`adm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_list`
--
ALTER TABLE `adm_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cli_list`
--
ALTER TABLE `cli_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `out_list`
--
ALTER TABLE `out_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_gender`
--
ALTER TABLE `products_gender`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FK_out_client_id` FOREIGN KEY (`client_id`) REFERENCES `cli_list` (`id`);

--
-- Constraints for table `out_product`
--
ALTER TABLE `out_product`
  ADD CONSTRAINT `FK_product_id` FOREIGN KEY (`product_id`) REFERENCES `products_list` (`id`),
  ADD CONSTRAINT `FK_product_receipt_id` FOREIGN KEY (`out_id`) REFERENCES `out_list` (`id`);

--
-- Constraints for table `products_list`
--
ALTER TABLE `products_list`
  ADD CONSTRAINT `FK_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`id`),
  ADD CONSTRAINT `FK_products_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `products_gender` (`id`),
  ADD CONSTRAINT `FK_products_manufacturers_id` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufactures` (`id`);

--
-- Constraints for table `receipt_history`
--
ALTER TABLE `receipt_history`
  ADD CONSTRAINT `FK_admin_id` FOREIGN KEY (`adm_id`) REFERENCES `adm_list` (`id`),
  ADD CONSTRAINT `FK_out_history_id` FOREIGN KEY (`out_id`) REFERENCES `out_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
