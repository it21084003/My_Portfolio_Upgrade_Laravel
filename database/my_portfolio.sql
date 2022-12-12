-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-12-12 07:25:05
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `my_portfolio`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Web', '2022-11-30 03:53:39', '2022-11-30 03:53:39'),
(2, 'Mobile', '2022-11-30 03:53:49', '2022-11-30 04:07:15'),
(3, 'Networking', '2022-11-30 03:53:59', '2022-11-30 03:53:59'),
(5, 'News', '2022-12-07 19:43:08', '2022-12-07 19:43:08'),
(6, 'today', '2022-12-07 20:03:15', '2022-12-07 20:03:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'comment 1', 'show', '2022-12-04 06:30:27', '2022-12-04 07:43:34'),
(2, 2, 1, 'comment 3', 'show', '2022-12-04 06:30:50', '2022-12-07 19:42:09'),
(3, 1, 1, 'comment w4324', 'hide', '2022-12-04 06:31:20', '2022-12-04 07:46:07'),
(4, 2, 5, 'test comment', 'show', '2022-12-07 19:31:29', '2022-12-07 19:31:29'),
(5, 6, 5, 'test', 'show', '2022-12-07 19:40:32', '2022-12-07 19:40:32'),
(6, 7, 6, 'test comment post', 'show', '2022-12-07 19:54:11', '2022-12-07 19:54:11'),
(7, 8, 6, 'like', 'show', '2022-12-07 20:04:28', '2022-12-07 20:04:58'),
(8, 8, 3, 'comment 4', 'show', '2022-12-11 17:34:18', '2022-12-11 17:34:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `likes_dislikes`
--

CREATE TABLE `likes_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `likes_dislikes`
--

INSERT INTO `likes_dislikes` (`id`, `post_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'like', '2022-12-01 10:05:20', '2022-12-04 04:01:16'),
(2, 2, 3, 'dislike', '2022-12-01 10:40:34', '2022-12-01 10:50:11'),
(3, 1, 3, 'dislike', '2022-12-01 10:50:21', '2022-12-02 16:41:59'),
(4, 2, 5, 'dislike', '2022-12-07 19:31:09', '2022-12-07 19:31:14'),
(5, 6, 5, 'like', '2022-12-07 19:40:18', '2022-12-07 19:40:18'),
(6, 7, 5, 'like', '2022-12-07 19:45:07', '2022-12-07 19:45:07'),
(7, 7, 6, 'like', '2022-12-07 19:53:52', '2022-12-07 19:53:54'),
(8, 8, 6, 'like', '2022-12-07 20:04:18', '2022-12-07 20:04:18'),
(9, 8, 3, 'like', '2022-12-11 17:34:03', '2022-12-11 17:34:06');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_25_081325_create_skills_table', 2),
(7, '2022_11_28_174132_create_student_counts_table', 4),
(10, '2022_11_30_120614_create_categories_table', 5),
(11, '2022_11_30_144340_create_posts_table', 6),
(12, '2022_12_01_181622_create_likes_dislikes_table', 7),
(14, '2022_12_04_115454_create_comments_table', 8),
(16, '2022_11_28_082206_create_projects_table', 9),
(17, '2022_12_06_043717_create_messages_table', 10),
(18, '2022_12_07_162721_create_messages_table', 11),
(21, '2022_12_07_174608_create_messages_table', 12);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, '63881a853bb58_sunset.png', 'Man must explore, and this is exploration at its greatest', 'Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman\'s earth, if free men make it, will be truly round: a globe in practice, not in theory.\n\nScience cuts two ways, of course; its products can be used for both good and evil. But there\'s no turning back from science. The early warnings about technological dangers also come from science.\n\nWhat was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.\n\nA Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That\'s how I felt seeing the Earth for the first time. I could not help but love and cherish her.\n\nFor those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.\n\nThe Final Frontier\nThere can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.\n\nThere can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.\n\nThe dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.\nSpaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.', '2022-11-30 16:36:03', '2022-12-01 08:51:27'),
(2, 1, 'fast-food.jpg', 'fast food', 'helo\r\n                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo adipisci iusto error voluptatem, eaque unde perspiciatis perferendis, exercitatione\r\n            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo adipisci iusto error voluptatem, eaque unde perspiciatis perferendis, exercitationem amet expedita hic quis libero consectetur natus est quisquam maxime officia quibusdam.', '2022-11-30 16:37:52', '2022-11-30 18:34:48'),
(3, 1, '638ea450a5618_ountain.jpg', 'fff', 'dd\r\n                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo adipisci iusto error voluptatem, eaque unde perspiciatis perferendis, exercitationem amet expedita hic quis libero consectetur natus est quisquam maxime officia quibusdam.\r\n            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo adipisci iusto error voluptatem, eaque unde perspiciatis perferendis, exercitationem amet expedita hic quis libero consectetur natus est quisquam maxime officia quibusdam.\r\n            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo adipisci iusto error voluptatem, eaque unde perspiciatis perferendis, exercitationem amet expedita hic quis libero consectetur natus est quisquam maxime officia quibusdam.', '2022-11-30 16:39:47', '2022-12-05 17:09:20'),
(6, 2, '63916a98611d6_login.png', 'Test Post', 'Hello', '2022-12-07 19:39:52', '2022-12-07 19:39:52'),
(7, 5, '63916bbe91512_login.png', 'News Post', 'Today News', '2022-12-07 19:44:46', '2022-12-07 19:44:46'),
(8, 6, '6391703d77231_OIP.jpg', 'today title', 'Today Content', '2022-12-07 20:03:57', '2022-12-07 20:03:57'),
(9, 1, '6396943743cf6_login.png', 'tttttt', 'tttttt', '2022-12-11 17:38:47', '2022-12-11 17:38:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `projects`
--

INSERT INTO `projects` (`id`, `name`, `url`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Facebook', 'https://www.facebook.com/', '638ebc6c7a13c_facebook.jpg', '2022-12-05 18:37:21', '2022-12-05 18:52:12'),
(6, 'Feed Our Mind', 'https://github.com/it21084003/FEEDOURMIND_EDIT', '638ebd4a464be_ountain.jpg', '2022-12-05 18:55:54', '2022-12-05 18:55:54'),
(7, 'Twitter', 'https://www.twitter.com', '638ebd80a3e79_twitter.png', '2022-12-05 18:56:48', '2022-12-05 18:56:48'),
(8, 'Wikipedia edit', 'https://www.wikipedia.org/', '63916fd3c22fe_OIP.jpg', '2022-12-05 18:57:22', '2022-12-07 20:02:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `skills`
--

INSERT INTO `skills` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
(9, 'PHP edit', 50, '2022-11-25 07:53:12', '2022-12-11 17:35:34'),
(10, 'Laravel', 75, '2022-11-25 07:53:33', '2022-11-25 07:53:33'),
(11, 'Java', 75, '2022-11-25 07:53:56', '2022-11-25 07:53:56'),
(12, 'Python', 100, '2022-11-25 07:54:10', '2022-11-25 07:54:10'),
(13, 'Flutter', 75, '2022-11-25 07:54:35', '2022-11-25 07:54:35'),
(14, 'C', 100, '2022-11-25 07:54:50', '2022-11-25 07:54:50'),
(15, 'C++', 75, '2022-11-25 07:55:03', '2022-11-25 07:55:03'),
(21, 'JavaScript', 100, '2022-11-27 10:05:17', '2022-11-27 10:05:17'),
(22, 'vue', 10, '2022-12-07 19:35:12', '2022-12-07 19:35:12'),
(23, 'javaScript', 100, '2022-12-07 19:58:03', '2022-12-07 19:58:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `student_counts`
--

CREATE TABLE `student_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `student_counts`
--

INSERT INTO `student_counts` (`id`, `count`, `created_at`, `updated_at`) VALUES
(1, 28, '2022-11-29 06:33:59', '2022-12-07 20:02:48');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ANTT MIN PAING', 'anttmin1@gmail.com', NULL, '$2y$10$AtFnX.xjOKsNhofAW4NKL.OVXGEYRdy6mnBNAYgvS2em0NPOltaFi', 'admin', 'MkHLV2RVHDwi0pj7Lde5zFYHl5ASOQforVzT5WxDb7g3iJDMkDAVX21FCo9E', '2022-11-23 10:47:37', '2022-11-24 22:27:18'),
(3, 'user1', 'user1@gmail.com', NULL, '$2y$10$oVCTtWD5jDUObfuV3AHatOmwxPA1a6hfT59JtAF1LO8z.qVUkwi0m', 'user', NULL, '2022-11-24 11:34:05', '2022-11-24 11:34:05'),
(5, 'user2', 'user2@gmail.com', NULL, '$2y$10$ZRGO1jS0qlZtgG5U/1koUuC.yXbA8lvmKQqp0UyLimMvL3BPXIfU2', 'user', NULL, '2022-12-07 19:29:11', '2022-12-07 19:29:11'),
(6, 'user4 edit', 'user4@gmail.com', NULL, '$2y$10$0MM4HPlCf8PzvU2jOeM1KeyucoJ8nJpv1tuoUTA1um0QNDlO8SZBO', 'user', NULL, '2022-12-07 19:52:34', '2022-12-07 19:59:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- テーブルのインデックス `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `student_counts`
--
ALTER TABLE `student_counts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- テーブルの AUTO_INCREMENT `student_counts`
--
ALTER TABLE `student_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
