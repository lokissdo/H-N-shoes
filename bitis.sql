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


DROP TABLE IF EXISTS `adm_list`;
CREATE TABLE IF NOT EXISTS `adm_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` bit(2) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` bit(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cli_list`
--


DROP TABLE IF EXISTS `cli_list`;
CREATE TABLE IF NOT EXISTS `cli_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `name` varchar(50) NOT NULL,
  `gender` bit(2) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,

  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `token` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cli_list`
--

INSERT INTO `cli_list` (`id`, `name`, `gender`, `address`, `email`, `phone`, `photo`, `password`, `birthday`, `token`) VALUES
(4, '12', b'01', 'no', 'dokhaihung2003@gmail.com2222', '1', 'no', '$2y$10$15PoIrYmtFjoD/9rAOVmJeb7b2DpNW4rU81LrcJOYQs58JqbcKVju', '2021-12-25', NULL),
(5, 'Lokiss', b'00', 'no', '2@2', '12', 'no', '$2y$10$ktGfaSY4oxpCqfSr3Q7qa.MT9WgGq2gl47z80jzAPVJ.kwSGzznZS', '2021-12-10', '695bcb9f1897e98235f64704a06753b31640178666'),
(9, '2', b'00', '', '2@34', '2', '', '$2y$10$I9Ttuye/k3EYydgDY425rO0ZXSbe0OcLA63gSdhrzrloNGBRfE/P2', '2021-12-25', NULL),
(10, '22', b'00', '', 'dokhaihung2003@gmail.com11', '2', '', '$2y$10$vT8fLQ1.0KM/6dTFwN6SwOAc9UaMH3Y694Ob0luSs0rrEGPEEIs2.', NULL, NULL),
(11, '23', b'00', '', '1@111', '2', '', '$2y$10$LHVNhnIAwRcbtr3rI4YzWO41w80BoRJX6dGJqb.ScB1AR1Ig/Qg2W', NULL, NULL),
(12, '2', b'01', '', '22@3', '2', '', '$2y$10$luJ2l6oUgNjRUxPsP8597u0omxHR5hlph1E521LU9m1DlZ1t4jMcK', '2021-12-21', NULL),
(13, '1', b'01', '', 'dokhaihung2003@gmail.com', '1', '', '$2y$10$jM8Mi22bdRg4XLdJaomTBuXOgvX9mOOkTjUMQGQe4pDoy3BwKWBna', NULL, 'd5d44c5c39f71300c70b9b8649c347121640254101');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--


DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `description`, `phone`, `photo`, `address`) VALUES
(1, 'CONVERSE', '', '123', '', 'here'),
(3, 'Bitis', '', '', '', ''),
(4, 'Nike', '', '', '', '');

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

DROP TABLE IF EXISTS `out_list`;
CREATE TABLE IF NOT EXISTS `out_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `client_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone` varchar(15) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_out_manufacturers_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `out_product`
--

DROP TABLE IF EXISTS `out_product`;
CREATE TABLE IF NOT EXISTS `out_product` (
  `out_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`out_id`,`product_id`),
  KEY `FK_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `products_category`

--

DROP TABLE IF EXISTS `products_category`;
CREATE TABLE IF NOT EXISTS `products_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `products_gender`;
CREATE TABLE IF NOT EXISTS `products_gender` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `products_list`;
CREATE TABLE IF NOT EXISTS `products_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gender_id` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `descrpition` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `manufacturers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_manufacturers_id` (`manufacturers_id`),
  KEY `FK_products_gender` (`gender_id`) USING BTREE,
  KEY `FK_products_category` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `name`, `price`, `quantity`, `gender_id`, `category_id`, `descrpition`, `photo`, `manufacturers_id`) VALUES
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

DROP TABLE IF EXISTS `receipt_history`;
CREATE TABLE IF NOT EXISTS `receipt_history` (
  `out_id` int(11) NOT NULL,
  `adm_id` int(11) NOT NULL,
  `receipt_stat` tinyint(4) NOT NULL,
  `work_time` timestamp NOT NULL,
  PRIMARY KEY (`out_id`,`adm_id`),
  KEY `FK_admin_id` (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
