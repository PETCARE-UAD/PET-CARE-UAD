-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 05:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliable_for`
--

CREATE TABLE `avaliable_for` (
  `id_avaliable` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_species` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `id_case` int(11) NOT NULL,
  `id_facility` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` varchar(250) NOT NULL,
  `notes` int(11) NOT NULL,
  `closed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `current_status`
--

CREATE TABLE `current_status` (
  `id_current_status` int(11) NOT NULL,
  `id_case` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `notes` text NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facilities_services`
--

CREATE TABLE `facilities_services` (
  `id_facilities` int(11) NOT NULL,
  `species_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id_facility` int(11) NOT NULL,
  `facility_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact_person` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `invoice_code` varchar(250) NOT NULL,
  `id_case` int(11) NOT NULL,
  `time_generate` int(11) NOT NULL,
  `invoice_amount` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `time_charged` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount_charged` varchar(250) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `note_text` text NOT NULL,
  `id_case` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `id_species` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `id_pet_owner` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provides`
--

CREATE TABLE `provides` (
  `id_provides` int(11) NOT NULL,
  `id_facility` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `service_limit` int(11) NOT NULL,
  `currently_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `has_limit` tinyint(1) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `cost_per_unit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_planned`
--

CREATE TABLE `service_planned` (
  `id_service_planned` int(11) NOT NULL,
  `id_case` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `planned_start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `planned_end_time` varchar(250) NOT NULL,
  `planned_units` int(11) NOT NULL,
  `cost_per_unit` varchar(250) NOT NULL,
  `price_charged` varchar(250) NOT NULL,
  `notes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_provided`
--

CREATE TABLE `service_provided` (
  `id_service_provided` int(11) NOT NULL,
  `id_case` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` varchar(250) NOT NULL,
  `units` int(11) NOT NULL,
  `cost_per_unit` varchar(250) NOT NULL,
  `price_charged` varchar(250) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id_species` int(11) NOT NULL,
  `species_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(250) NOT NULL,
  `status_category` int(11) NOT NULL,
  `is_closing_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_category`
--

CREATE TABLE `status_category` (
  `id_status_categoty` int(11) NOT NULL,
  `status_category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `unit_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliable_for`
--
ALTER TABLE `avaliable_for`
  ADD PRIMARY KEY (`id_avaliable`),
  ADD KEY `id_service` (`id_service`,`id_species`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id_case`),
  ADD KEY `id_facility` (`id_facility`,`id_pet`);

--
-- Indexes for table `current_status`
--
ALTER TABLE `current_status`
  ADD PRIMARY KEY (`id_current_status`),
  ADD KEY `id_case` (`id_case`,`id_status`);

--
-- Indexes for table `facilities_services`
--
ALTER TABLE `facilities_services`
  ADD PRIMARY KEY (`id_facilities`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id_facility`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_case` (`id_case`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_case` (`id_case`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_species` (`id_species`);

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`id_pet_owner`),
  ADD KEY `id_pet` (`id_pet`,`id_owner`);

--
-- Indexes for table `provides`
--
ALTER TABLE `provides`
  ADD PRIMARY KEY (`id_provides`),
  ADD KEY `id_facility` (`id_facility`,`id_service`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `service_planned`
--
ALTER TABLE `service_planned`
  ADD PRIMARY KEY (`id_service_planned`),
  ADD KEY `id_case` (`id_case`),
  ADD KEY `id_service` (`id_service`);

--
-- Indexes for table `service_provided`
--
ALTER TABLE `service_provided`
  ADD PRIMARY KEY (`id_service_provided`),
  ADD KEY `id_case` (`id_case`,`id_service`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id_species`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status_category` (`status_category`);

--
-- Indexes for table `status_category`
--
ALTER TABLE `status_category`
  ADD PRIMARY KEY (`id_status_categoty`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliable_for`
--
ALTER TABLE `avaliable_for`
  MODIFY `id_avaliable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `current_status`
--
ALTER TABLE `current_status`
  MODIFY `id_current_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities_services`
--
ALTER TABLE `facilities_services`
  MODIFY `id_facilities` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id_facility` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_owner`
--
ALTER TABLE `pet_owner`
  MODIFY `id_pet_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provides`
--
ALTER TABLE `provides`
  MODIFY `id_provides` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_planned`
--
ALTER TABLE `service_planned`
  MODIFY `id_service_planned` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_provided`
--
ALTER TABLE `service_provided`
  MODIFY `id_service_provided` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id_species` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_category`
--
ALTER TABLE `status_category`
  MODIFY `id_status_categoty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
