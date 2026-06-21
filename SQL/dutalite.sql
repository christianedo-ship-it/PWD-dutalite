-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2026 at 04:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dutalite`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id_benefits` int NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id_benefits`, `description`) VALUES
(1, 'Kualitas yang tidak diragukan'),
(2, 'Pelayanan pembelian cepat'),
(3, 'Harga terjangkau');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id_profile` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_profile`, `description`) VALUES
(1, 'Kami menjalin kerja sama dengan Dutamix sebagai pelopor beton pertama di Kalimantan Barat. Dengan pengalaman lebih dari 25 tahun dalam bidang produksi beton ready mix dan produk precast, Dutamix memiliki kompetensi dan standar kualitas yang tinggi. Melalui kerja sama ini, kami berkomitmen untuk mendukung kebutuhan proyek Anda dengan menyediakan produk dan layanan terbaik secara profesional dan terpercaya.');

-- --------------------------------------------------------

--
-- Table structure for table `head_office`
--

CREATE TABLE `head_office` (
  `id_headoffice` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `head_office`
--

INSERT INTO `head_office` (`id_headoffice`, `name`, `location`, `country`) VALUES
(1, 'Graha Kalindo', 'Jl. Sisingamangaraja No. 88 A-B\r\nPontianak, Kalimantan Barat', 'INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `description`) VALUES
(1, 'Dapat melayani di area Pontianak, Mempawah, Sui Duri, Singkawang, dan Pemangkat. Untuk lokasi kantornya yang di Pontianak berada di Jl. Arteri Supadio, Raya River, Pontianak, Kubu Raya Regency, West Kalimantan 78391. Kemudian untuk di Singkawang berada di depan Pasir Panjang, Jl. Raya Sedau, Sedau, Kec. Singkawang Sel., Kota Singkawang, Kalimantan Barat.');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `id_mission` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id_mission`, `description`) VALUES
(1, 'Menyediakan produk berkualitas tinggi.'),
(2, 'Mengutamakan kepuasan pelanggan.'),
(3, 'Mendukung pembangunan berkelanjutan.'),
(4, 'Memberikan solusi konstruksi yang efisien.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_quantity` int NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `order_quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `status` enum('pending','diproses','selesai','dibatalkan') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `size`, `product_quantity`, `customer_name`, `company_name`, `email`, `order_quantity`, `created_at`, `user_id`, `status`, `updated_by`) VALUES
(2, 4, '12,5 x 60 x 20 cm', 50000, 'Tester', 'PT Tester International', 'tes@mail.com', 200000, '2026-06-10 13:11:52', NULL, 'dibatalkan', 'Vincent');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_size`, `price`, `description`, `image`, `created_at`) VALUES
(1, '7.5cm', '7,5 x 60 x 20 cm', 0.00, '0,009 m³', '1.jpeg', '2026-06-02 09:54:20'),
(2, '10cm', '10 x 60 x 20 cm', 0.00, '0,012 m³', '2.jpeg', '2026-06-02 09:54:20'),
(3, '12.5cm', '12,5 x 60 x 20 cm', 0.00, '0,015 m³', '3.jpeg', '2026-06-02 09:54:20'),
(4, '15cm', '15 x 60 x 20 cm', 0.00, '0,018 m³', '4.jpeg', '2026-06-02 09:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_info`
--

CREATE TABLE `purchase_info` (
  `id_purchaseinfo` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_info`
--

INSERT INTO `purchase_info` (`id_purchaseinfo`, `description`) VALUES
(1, 'Layanan pengantaran hanya berlaku untuk pemesanan minimal 5 kubik. Apabila pemesanan kurang dari 5 kubik, pelanggan dapat melakukan pengambilan langsung di lokasi perusahaan yang telah ditentukan.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Vincent', '482c811da5d5b4bc6d497ffa98491e38'),
(2, 'Edo', '482c811da5d5b4bc6d497ffa98491e38'),
(3, 'Mike', '482c811da5d5b4bc6d497ffa98491e38');

-- --------------------------------------------------------

--
-- Table structure for table `vision`
--

CREATE TABLE `vision` (
  `id_vision` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vision`
--

INSERT INTO `vision` (`id_vision`, `description`) VALUES
(1, 'Menjadi penyedia bata ringan terpercaya dengan kualitas terbaik dan pelayanan profesional.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id_benefits`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `head_office`
--
ALTER TABLE `head_office`
  ADD PRIMARY KEY (`id_headoffice`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id_mission`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_info`
--
ALTER TABLE `purchase_info`
  ADD PRIMARY KEY (`id_purchaseinfo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id_vision`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id_benefits` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id_profile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_office`
--
ALTER TABLE `head_office`
  MODIFY `id_headoffice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `id_mission` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_info`
--
ALTER TABLE `purchase_info`
  MODIFY `id_purchaseinfo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vision`
--
ALTER TABLE `vision`
  MODIFY `id_vision` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
