-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 01:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_final_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_16_072346_create_resumes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `objectives` text NOT NULL,
  `birthday` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `applications` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `image`, `name`, `objectives`, `birthday`, `contact`, `email`, `address`, `education`, `skills`, `applications`, `created_at`, `updated_at`) VALUES
(61, '1732776726.jpg', 'Arjay R. Dael', 'Pursuing opportunity which will allow me to grow professionally, while effectively utilizing my versatile skill set to help promote your corporate mission and exceed team goals.', '2002-10-31', '09364270259', 'arjaylead@gmail.com', '0439 Caingin San Rafael Bulacan', '{\"elementary\":[{\"name\":\"Caingin Elementary School\",\"location\":\"Caingin San Rafael, Bulacan\",\"date_graduated\":\"2012-2015\"}],\"highschool\":[{\"name\":\"San Rafael National Trade School\",\"location\":\"Caingin San Rafael, Bulacan\",\"date_graduated\":\"2015-2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Information Communication and Technology\",\"location\":\"Baliwag City, Bulacan\",\"date_graduated\":\"2019-2021\"}],\"college\":[{\"name\":\"Dalubhasaang Politekniko ng Lungsod ng Baliwag\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Baliwag City, Bulacan\",\"date_graduated\":\"2021-Present\"}]}', '[\"Cybersecurity\",\"Communication\"]', '[{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"hired\",\"date\":\"2024-10-31\"},{\"company_name\":\"Jobstreet\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s\",\"status\":\"other\",\"date\":\"2024-11-27\"}]', '2024-11-26 12:46:17', '2024-11-29 01:32:42'),
(62, '1732786843.png', 'Nathaniel B. Berres', 'Aspiring Full-Stack Web Developer eager to expand my technical expertise and collaborate with cross-functional teams to deliver high-quality web applications.', '2003-09-03', '09284168455', 'berresn050@gmail.com', 'Barangca, Baliwag, Bulacan', '{\"elementary\":[{\"name\":\"Dr. Guillermo Dela Merced Memorial School\",\"location\":\"Barangca, Baliwag, Bulacan\",\"date_graduated\":\"2015\"}],\"highschool\":[{\"name\":\"Sto. Ni\\u00f1o High School\",\"location\":\"Sto. Nino, Baliwag, Bulacan\",\"date_graduated\":\"2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Science, Technology, Engineering and Mathematics\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2025\"}]}', '[\"Computer Technology Literate\",\"Computer Software\",\"Computer Hardware\",\"Web Development\"]', '[{\"company_name\":\"Accenture\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcSKlsfyOooFV_pU4aWCwDobp5QksJZHWBNb1A&s\",\"status\":\"hired\",\"date\":\"2024-11-26\"}]', '2024-11-26 12:55:55', '2024-11-28 09:40:43'),
(64, '1732703741.jpg', 'Alexis Nathaniel G. Cabral', 'Seeking a challenging role in software development to apply my knowledge of programming languages and problem-solving skills gained during my Information Technology degree', '2003-03-26', '09636863112', 'cabralalexis725@gmail.com', 'Hinukay, Baliwag, Bulacan', '{\"elementary\":[{\"name\":\"Hinukay Elementary School\",\"location\":\"Hinukay, Baliwag, Bulacan\",\"date_graduated\":\"2008 - 2015\"}],\"highschool\":[{\"name\":\"Sto. Ni\\u00f1o High School\",\"location\":\"Sto. Ni\\u00f1o, Baliwag, Bulacan\",\"date_graduated\":\"2015 - 2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"TVL-ICT\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2019 - 2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021 - Present\"}]}', '[\"Programming\",\"Problem-Solving\",\"Time Management\"]', '[{\"company_name\":\"Jobstreet\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s\",\"status\":\"hired\",\"date\":\"2024-11-27\"}]', '2024-11-27 10:35:41', '2024-11-27 10:49:46'),
(65, '1732802016.jpg', 'Christopher B. Santiago jr.', 'To contribute my experience in network administration and troubleshooting to ensure reliable IT operations.', '2001-08-23', '09758923193', 'tophersantiago86@gmail.com', '0014 Prk.6 Sto. Niño, Baliwag Bulacan', '{\"elementary\":[{\"name\":\"Dr. Guillermo Dela Merced Memorial School\",\"location\":\"Barangca, Baliwag, Bulacan\",\"date_graduated\":\"2008-2015\"}],\"highschool\":[{\"name\":\"Sto. Ni\\u00f1o high school\",\"location\":\"Sto.Ni\\u00f1o, Baliwag, Bulacan\",\"date_graduated\":\"2015-2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic college\",\"course\":\"TVL-IA\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2019-2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic college\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021 - Present\"}]}', '[\"Programming\"]', '[{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"interview\",\"date\":\"2024-11-28\"}]', '2024-11-27 11:33:02', '2024-11-28 13:53:36'),
(66, '1732717769.png', 'Tivoli Jaerold S. Belen', 'Gaining knowledge for troubleshooting, programming and learn for new skills to achieve the goal.', '2002-04-18', '09353250132', 'tivolibelen19@gmail.com', '307 Zone 4 Sto. Nino Baliuag, Bulacan', '{\"elementary\":[{\"name\":\"Immanuel Grace Christian Academy Of Baliwag\",\"location\":\"Tangos Baliwag, Bulacan\",\"date_graduated\":\"2012-2015\"},{\"name\":\"Dr. G Dela Merced Memorial School\",\"location\":\"Barangca, Baliwag, Bulacan\",\"date_graduated\":\"2010-2012\"}],\"highschool\":[{\"name\":\"Sto. Nino High School\",\"location\":\"Sto Nino Baliwag, Bulacan\",\"date_graduated\":\"2015 - 2019\"}],\"senior\":[{\"name\":\"Sto. Nino High School\",\"course\":\"GAS\",\"location\":\"Sto Nino Baliwag, Bulacan\",\"date_graduated\":\"2019 - 2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021 - Present\"}]}', '[\"Troubleshooting\",\"Time Management\",\"Blender 3D Modeling\"]', '[{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"hired\",\"date\":\"2024-11-28\"}]', '2024-11-27 14:29:29', '2024-11-28 09:45:08'),
(67, '1732721301.png', 'Nicko Palomo', 'Dedicated and detail-oriented programmer with a passion for developing efficient, scalable solutions and creating user-friendly applications. Eager to apply technical expertise to solve complex problems and contribute to innovative projects.', '2002-05-07', '09154872213', 'palomo.nicko@gmail.com', 'Sta. Barbara, Baliuag, Bulacan', '{\"elementary\":[{\"name\":\"Concepcion Elementary School\",\"location\":\"Concepcion, Baliuag, Bulacan\",\"date_graduated\":\"2008 - 2015\"}],\"highschool\":[{\"name\":\"Virgen Delas Flores High School\",\"location\":\"Virgen Delas Flores, Baliuag, Bulacan\",\"date_graduated\":\"2015 - 2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Information and Communication Technology\",\"location\":\"Poblacion, Baliuag, Bulacan\",\"date_graduated\":\"2019 - 2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliuag, Bulacan\",\"date_graduated\":\"2021 - Present\"}]}', '[\"Programming\",\"Game Developer\"]', '[{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"hired\",\"date\":\"2024-11-27\"}]', '2024-11-27 15:28:21', '2024-11-27 15:29:02'),
(68, '1732775799.jpg', 'Ravinal Dela Rosa', 'Hardworking, self-motivated person seeking a position in an organization where I will be able to use and grow my communication, marketing and leadership skill to achieve the company’s set goals.', '2002-11-18', '09477323559', 'rabrab1829@gmail.com', 'Concepcion, Baliwag, Bulacan', '{\"elementary\":[{\"name\":\"Concepcion Elementary School\",\"location\":\"R E Chico Street, Baliwag, Bulacan\",\"date_graduated\":\"2008 \\u2013 2015\"}],\"highschool\":[{\"name\":\"Mariano Ponce National High School\",\"location\":\"B S Aquino Avenue, Baliwag, Bulacan\",\"date_graduated\":\"2015 - 2019\"}],\"senior\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Information and Communication Technology (ICT)\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2019- 2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021- Present\"}]}', '[\"Video Editing\",\"Time Management\",\"Communication\",\"Image Editing\"]', '[{\"company_name\":\"Jobstreet\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s\",\"status\":\"applied\",\"date\":\"2024-11-28\"}]', '2024-11-28 06:35:54', '2024-11-29 00:31:32'),
(69, '1732776968.jpg', 'Rhema Santos', 'Pursuing opportunity which will allow me to improve my knowledge professionally, while using skill set effectively to grow and be successful along the company.', '2003-10-25', '0910223785', 'rhemasantos102503@gmail.com', 'Pinag-aksan, Caingin, Sanrafael, Bulacan', '{\"elementary\":[{\"name\":\"Caingin Elementary School\",\"location\":\"Caingin, San Rafael, Bulacan\",\"date_graduated\":\"2008 \\u2013 2015\"}],\"highschool\":[{\"name\":\"San Rafael National Trade School Technical Drawing\",\"location\":\"Caingin, San Rafael, Bulacan\",\"date_graduated\":\"2015 - 2019\"}],\"senior\":[{\"name\":\"San Rafael National Trade School\",\"course\":\"Science, Technology, Engineering and Mathematics (STEM)\",\"location\":\"Caingin, San Rafael, Bulacan\",\"date_graduated\":\"2019- 2021\"}],\"college\":[{\"name\":\"Baliwag Polytechnic College\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag, Bulacan\",\"date_graduated\":\"2021- Present\"}]}', '[\"Team Management\",\"Time Management\",\"Digital Art\",\"Traditional Art\",\"Computer Literate\",\"Communication\",\"Organization\"]', '[{\"company_name\":\"Jobstreet\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s\",\"status\":\"applied\",\"date\":\"2024-11-28\"}]', '2024-11-28 06:56:08', '2024-11-28 09:44:42'),
(70, '1732798977.jpg', 'Tristan Mark G. Garcia', 'Dedicated information technology student aiming to advance my career through innovative solutions and strategic thinking.', '2003-09-20', '09458572723', 'gtristanmark@gmail.com', 'Zone 6 Barangca, Baliwag, Bulacan', '{\"elementary\":[{\"name\":\"Dr. Guillermo Dela Merced Memorial School\",\"location\":\"Barangca, Baliwag, Bulacan\",\"date_graduated\":\"2009-2015\"}],\"highschool\":[{\"name\":\"Sto. Ni\\u00f1o Highschool\",\"location\":\"Sto. Ni\\u00f1o, Baliwag , Bulacan\",\"date_graduated\":\"2015-2019\"}],\"senior\":[{\"name\":\"Integrated College of Business and Technology\",\"course\":\"Information Communication and Technology - CSS\",\"location\":\"Tibag, Baliwag, Bulacan\",\"date_graduated\":\"2019-2021\"}],\"college\":[{\"name\":\"Dalubhasaang Politekniko ng Lungsod ng Baliwag\",\"course\":\"Bachelor of Science in Information Technology\",\"location\":\"Poblacion, Baliwag , Bulacan\",\"date_graduated\":\"2021-2025\"}]}', '[\"Time Management\",\"Researching\",\"Hardware and Software Literate\",\"Communication\"]', '[{\"company_name\":\"Jobstreet\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQyFaYhPIvmCaPQMMabk0mlaHyAGnofey1JAQ&s\",\"status\":\"interview\",\"date\":\"2024-11-28\"},{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"applied\",\"date\":\"2024-11-29\"},{\"company_name\":\"LinkedIn\",\"company_image\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRokEYt0yyh6uNDKL8uksVLlhZ35laKNQgZ9g&s\",\"status\":\"interview\",\"date\":\"2024-11-29\"}]', '2024-11-28 13:02:57', '2024-11-29 01:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('exEAQrwl0c9Yo8pcEjuT3nFYzuf1dot82E0ZzBuE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUTh6UU9UQnlNc3h5Rk91bDdYS3hNNmw1bGZadnVUMEhnSTgxWUtOTCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1732927087),
('mn3slEjwuSVallmH1sPcC3T0eWvFggXPLKgDHYhc', NULL, '139.135.192.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYUlRVUlTVjFUbnhGVlVRSlE5aUw4SXAyZThFYTZnblRCeFNGZDd0TCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cHM6Ly9yZXN1bWUuY29tbXVuaXRlZW5zLm9ubGluZSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL3Jlc3VtZS5jb21tdW5pdGVlbnMub25saW5lL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732923351),
('qSfLA0YS0fNgPRZ6PewXAZylfbij86DUOJ2nn14V', 1, '2405:8d40:4002:adc8:c1fd:9241:d7f4:5c7d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZDUzNzd2QVhSTFNyMkdkRXEwRTdjY1ZvZFlUN1NMZjhzZGUwZm1XOCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwczovL3Jlc3VtZS5jb21tdW5pdGVlbnMub25saW5lL2FkZF9yZXN1bWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732925660),
('wTsfbpcEqQ7fQZee28ZwojS1diT9KYatqPlwxMcK', 1, '136.158.63.191', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYldPUGpCc0pvMWRRc0wzaVpoZXZwTjd4RkEzcTJEY0U4cnhSSERLRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwczovL3Jlc3VtZS5jb21tdW5pdGVlbnMub25saW5lL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1732925661);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'SuperAdmin@gmail.com', NULL, '$2y$12$qu.KCc6t7C6R8W1KpHHDv.8qm4lF/vGGh2RYz19vXynqXkRxmcM9q', NULL, NULL, '2024-11-15 23:39:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
