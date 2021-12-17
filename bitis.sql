SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
/*!40101 SET NAMES utf8mb4 */

--
-- Database: `bitis`
--
CREATE DATABASE IF NOT EXISTS `bitis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bitis`;

-- --------------------------------------------------------

--
-- Table structure for table `adm_list`
--

DROP TABLE IF EXISTS `adm_list`;
CREATE TABLE `adm_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `access` tinyint(5) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cli_list`
--

DROP TABLE IF EXISTS `cli_list`;
CREATE TABLE `cli_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` bit(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) ,
  `password` varchar(200) NOT NULL,
  `birthday` date,
  `token` varchar(200),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Change Structure
-- ALTER TABLE out_list
-- DROP FOREIGN KEY FK_out_client_id;
-- ALTER TABLE `out_list`
-- ADD CONSTRAINT `FK_out_client_id` FOREIGN KEY (`client_id`) REFERENCES `cli_list` (`id`);
-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `receiving_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `out_list`
--

DROP TABLE IF EXISTS `out_list`;
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

DROP TABLE IF EXISTS `products_list`;
CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `descrpition` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `manufacturers_id` int(11) NOT NULL
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
-- AUTO_INCREMENT for table `adm_list`
--
ALTER TABLE `adm_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cli_list`
--
ALTER TABLE `cli_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `out_list`
--
ALTER TABLE `out_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_list`
--
ALTER TABLE `products_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
