-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2021 at 03:40 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentes-notaveis`
--

CREATE DATABASE mentes-notaveis;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `uf`, `created_at`, `updated_at`) VALUES
(1, 'Acre', 'AC', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(2, 'Alagoas', 'AL', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(3, 'Amapá', 'AP', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(4, 'Amazonas', 'AM', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(5, 'Bahia', 'BA', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(6, 'Ceará', 'CE', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(7, 'Distrito Federal', 'DF', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(8, 'Espírito Santo', 'ES', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(9, 'Goiás', 'GO', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(10, 'Maranhão', 'MA', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(11, 'Mato Grosso', 'MT', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(12, 'Mato Grosso do Sul', 'MS', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(13, 'Minas Gerais', 'MG', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(14, 'Pará', 'PA', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(15, 'Paraíba', 'PB', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(16, 'Paraná', 'PR', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(17, 'Pernambuco', 'PE', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(18, 'Piauí', 'PI', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(19, 'Rio de Janeiro', 'RJ', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(20, 'Rio Grande do Norte', 'RN', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(21, 'Rio Grande do Sul', 'RS', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(22, 'Rondônia', 'RO', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(23, 'Roraima', 'RR', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(24, 'Santa Catarina', 'SC', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(25, 'São Paulo', 'SP', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(26, 'Sergipe', 'SE', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(27, 'Tocantins', 'TO', '2021-05-17 06:24:36', '2021-05-17 06:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_state_id_foreign` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 25, 'São Paulo', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(2, 25, 'Salto', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(3, 25, 'Itu', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(4, 19, 'Rio de Janeiro', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(5, 13, 'Belo Horizonte', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(6, 13, 'Montes Claros', '2021-05-17 06:24:36', '2021-05-17 06:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `cep` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_state_id_foreign` (`state_id`),
  KEY `address_city_id_foreign` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `state_id`, `city_id`, `street`, `number`, `cep`, `created_at`, `updated_at`) VALUES
(1, 19, 4, 'Maracana', 1000, '14547-258', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(2, 25, 2, 'Rua das nações unidas', 600, '13329-350', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(3, 25, 3, 'Estrada Itu', 6002, '12345-487', '2021-05-17 06:24:36', '2021-05-17 06:24:36'),
(4, 25, 2, 'Rua estado de alagoas', 546, '13324-472', '2021-05-17 06:24:36', '2021-05-17 06:24:36');

-- --------------------------------------------------------


--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_14_003852_create_states_table', 1),
(2, '2021_05_14_004139_create_cities_table', 1),
(3, '2021_05_14_185020_create_address_table', 1),
(4, '2021_05_14_185320_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_address_id_foreign` (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
