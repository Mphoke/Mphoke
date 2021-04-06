-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 07:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(5, 'Sports', '2021-04-02 15:15:35', '2021-04-02 15:15:35'),
(6, 'Music', '2021-04-02 15:15:45', '2021-04-02 15:15:45'),
(7, 'Programming', '2021-04-02 21:02:41', '2021-04-02 21:02:41'),
(8, 'Adventure', '2021-04-03 09:25:54', '2021-04-03 09:25:54'),
(9, 'Movies', '2021-04-03 09:26:07', '2021-04-03 09:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'This language is a beast!!', '2021-04-03 13:34:01', '2021-04-03 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id`, `user_id`, `post_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'mphoke91@gmail.com', '2021-04-03 13:04:19', '2021-04-03 13:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'mphoke91@gmail.com', '2021-04-03 11:24:38', '2021-04-03 11:24:38'),
(2, 1, 3, 'mphoke91@gmail.com', '2021-04-03 14:35:31', '2021-04-03 14:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2015_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_02_150254_create_posts_table--create-posts', 2),
(4, '2021_04_02_150446_create_profile_table--create-profiles', 2),
(5, '2021_04_02_150550_create_categories_table--create-categories', 2),
(6, '2021_04_02_152732_create_likes_table--create-likes', 2),
(7, '2021_04_02_153708_create_dislike_table--create-dislike', 2),
(8, '2021_04_02_154415_create_comments_table--create-comments', 2),
(15, '2021_04_03_144500_create_dislike', 3),
(16, '2021_04_03_144622_create_dislike_table', 3),
(17, '2021_04_03_145450_create_dislikes_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_title`, `category_id`, `post_body`, `post_image`, `created_at`, `updated_at`) VALUES
(3, 1, 'Java Programming', 7, 'Java Programming is a programming language that runs a billion of devices.', 'http://127.0.0.1:8000/posts/java.png', '2021-04-03 09:29:26', '2021-04-03 09:29:26'),
(4, 1, 'Music', 6, 'Music is a gift of art that brings emotions and sort of communication instrumentally, I love listen to music because its my sanity.', 'http://127.0.0.1:8000/posts/music.jfif', '2021-04-03 09:37:17', '2021-04-03 09:37:17'),
(5, 1, 'Php Laravel framework', 7, 'Php Laravel framework is an awesome tool for building web based applications that can be deployed easily and managed.', 'http://127.0.0.1:8000/posts/php.jfif', '2021-04-03 09:38:54', '2021-04-03 09:38:54'),
(6, 1, 'Adventure', 8, 'Going for Adventure is awesome you get to fresh your mind and have a great sense of nature out there. Meeting new people and exploring its awesome.', 'http://127.0.0.1:8000/posts/adventure.jfif', '2021-04-03 09:40:57', '2021-04-03 09:40:57'),
(7, 1, 'Movies', 9, 'I really love movies, entertainment is cool', 'http://127.0.0.1:8000/posts/movies.png', '2021-04-03 09:41:43', '2021-04-03 09:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `designation`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 1, 'Worrington', 'Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-02 17:02:59', '2021-04-02 17:02:59'),
(2, 1, 'Worrington', 'Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-02 17:04:17', '2021-04-02 17:04:17'),
(3, 1, 'Worrington', 'Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-02 17:05:32', '2021-04-02 17:05:32'),
(4, 1, 'Worrington', 'Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-02 18:01:45', '2021-04-02 18:01:45'),
(5, 1, 'Worrington', 'Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-02 18:27:13', '2021-04-02 18:27:13'),
(6, 1, 'Tshegofatso Blessing', 'Web Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-03 14:41:38', '2021-04-03 14:41:38'),
(7, 1, 'Tshegofatso Blessing', 'Web Developer', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-03 14:42:03', '2021-04-03 14:42:03'),
(8, 2, 'Hellow Tester', 'Tester', 'http://127.0.0.1:8000/uploads/me.jfif', '2021-04-03 15:22:05', '2021-04-03 15:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tshegofatso Blessing', 'mphoke91@gmail.com', '$2y$10$IOQqRPgAqjTmo0l.277lgOq4Nl8idAl6StamGZ9JttpwmDziD8VDa', 'n2Td9VklnX5DW3zPea7E1VeQPLTwpwBvkxO1fSJCj7AbqVTdpF5AMwsJbfIJ', '2021-04-02 12:16:58', '2021-04-02 12:16:58'),
(2, 'Tester', 'anonimous@gmail.com', '$2y$10$urEJfCuPg9/EUO2uEd14vuU87Xzf3FdtIkG29U4SV.eHdtdOAysh.', NULL, '2021-04-03 14:48:24', '2021-04-03 14:48:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
