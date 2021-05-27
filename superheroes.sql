-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 15:15:22
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `superheroes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alignments`
--

CREATE TABLE `alignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alignments`
--

INSERT INTO `alignments` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2021-05-14 08:44:09', '2021-05-15 19:51:03', 'Neutral', 'Neutralisimo'),
(2, '2021-05-14 08:56:18', '2021-05-14 08:56:18', 'Malvado', 'Malvado'),
(3, '2021-05-14 08:56:27', '2021-05-26 12:58:53', 'Bueno', 'Un cacho de pan'),
(5, '2021-05-14 08:56:38', '2021-05-14 08:56:38', 'Caótico', 'Caótico'),
(10, '2021-05-26 12:59:11', '2021-05-26 12:59:11', 'Caotico neutral', 'No sabe lo que quiere');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heroe_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vital_points` int(11) DEFAULT NULL,
  `combat_vital_points` int(11) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `heroes`
--

INSERT INTO `heroes` (`id`, `created_at`, `updated_at`, `real_name`, `heroe_name`, `alignment_id`, `image_name`, `vital_points`, `combat_vital_points`, `strength`) VALUES
(29, '2021-05-26 18:08:10', '2021-05-26 20:02:10', 'Diana Prince', 'Wonder Woman', 3, '29.jpg', 90, NULL, 10),
(30, '2021-05-26 18:11:39', '2021-05-26 20:02:30', 'Carol Danvers', 'Capitana Marvel', 1, '30.jpg', 10, NULL, 10),
(31, '2021-05-26 18:36:41', '2021-05-26 18:44:56', 'Jessica Jones', 'Jessica Jones', 5, '31.jpg', 20, NULL, 10),
(32, '2021-05-26 18:37:36', '2021-05-26 18:45:08', 'Ororo Iqadi Munroe', 'Tormenta', 3, '32.jpg', 15, NULL, 5),
(33, '2021-05-26 18:39:38', '2021-05-26 18:47:49', 'Gamora', 'Gamora', 10, '33.jpg', 30, NULL, 10),
(34, '2021-05-26 18:40:40', '2021-05-26 18:47:27', 'Natasha Romanov', 'Viuda Negra', 3, '34.jpg', 20, NULL, 8),
(35, '2021-05-26 18:42:41', '2021-05-26 18:45:22', 'Wanda Maximoff', 'Bruja Escarlata', 5, '35.jpg', 20, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heroe_organization`
--

CREATE TABLE `heroe_organization` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `heroe_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `heroe_organization`
--

INSERT INTO `heroe_organization` (`id`, `created_at`, `updated_at`, `heroe_id`, `organization_id`) VALUES
(30, NULL, NULL, 29, 7),
(31, NULL, NULL, 30, 9),
(36, NULL, NULL, 30, 10),
(37, NULL, NULL, 32, 10),
(38, NULL, NULL, 32, 11),
(39, NULL, NULL, 32, 7),
(40, NULL, NULL, 32, 9),
(41, NULL, NULL, 33, 7),
(42, NULL, NULL, 33, 9),
(43, NULL, NULL, 33, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heroe_power`
--

CREATE TABLE `heroe_power` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `heroe_id` bigint(20) UNSIGNED NOT NULL,
  `power_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `heroe_power`
--

INSERT INTO `heroe_power` (`id`, `created_at`, `updated_at`, `heroe_id`, `power_id`) VALUES
(70, NULL, NULL, 30, 19),
(71, NULL, NULL, 29, 23),
(74, NULL, NULL, 30, 23),
(75, NULL, NULL, 30, 24),
(77, NULL, NULL, 31, 24),
(78, NULL, NULL, 32, 18),
(79, NULL, NULL, 33, 29),
(80, NULL, NULL, 34, 29),
(81, NULL, NULL, 29, 18),
(82, NULL, NULL, 29, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_14_081234_create_sessions_table', 1),
(7, '2021_05_14_083929_create_organization', 2),
(8, '2021_05_14_084001_create_power', 2),
(9, '2021_05_14_084037_create_alignment', 2),
(10, '2021_05_14_084050_create_heroe', 2),
(11, '2021_05_14_085842_create_heroe_power', 2),
(12, '2021_05_14_090159_create_heroe_organizations', 2),
(13, '2021_05_14_093950_add_foreign_keys_policy', 3),
(14, '2021_05_21_091556_add_image_superheroe', 4),
(15, '2021_05_21_095221_add_vital_points_superheroe', 5),
(16, '2021_05_21_095248_add_damage_points_power', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `organizations`
--

INSERT INTO `organizations` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(7, '2021-05-15 15:33:04', '2021-05-26 08:41:13', 'La Liga de la justicia', 'Liga de la justicia Ilimitadaaa'),
(9, '2021-05-15 16:45:22', '2021-05-15 16:45:22', 'Shield', 'El escudo de la tierra'),
(10, '2021-05-15 16:45:39', '2021-05-15 16:45:39', 'M.I.B', 'Men in Black'),
(11, '2021-05-15 16:45:59', '2021-05-15 16:45:59', 'Blade', 'El filo de la tierra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `powers`
--

CREATE TABLE `powers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `powers`
--

INSERT INTO `powers` (`id`, `created_at`, `updated_at`, `name`, `description`, `damage_points`) VALUES
(15, '2021-05-15 16:46:19', '2021-05-23 19:29:01', 'Rayo laser', 'Rayos láser por lo ojos', 20),
(16, '2021-05-15 16:46:35', '2021-05-23 19:29:55', 'Dominación', 'Control mental', 2),
(17, '2021-05-15 16:47:10', '2021-05-23 19:30:04', 'Telequinésis', 'Mover objetos con la mente', 6),
(18, '2021-05-15 16:47:27', '2021-05-15 16:47:27', 'Volar', 'Volar sin ayuda mecánica ni mágica', NULL),
(19, '2021-05-23 19:30:28', '2021-05-23 19:30:28', 'Super velocidad', 'Velocidad más rápida que la luz', 20),
(23, '2021-05-26 18:14:20', '2021-05-26 18:14:20', 'Super fuerza', 'Super fuerza', 20),
(24, '2021-05-26 18:14:33', '2021-05-26 18:14:33', 'Super resistencia', 'Super resistencia', 2),
(25, '2021-05-26 18:15:01', '2021-05-26 18:15:01', 'Lazo de la verdad', 'Lazo mágico que atenaza', 10),
(26, '2021-05-26 18:15:17', '2021-05-26 18:15:17', 'Puños de fuego', 'Puños llameantes', 5),
(27, '2021-05-26 18:37:56', '2021-05-26 18:37:56', 'Rayos eléctricos', 'Rayos eléctricos', 10),
(28, '2021-05-26 18:38:58', '2021-05-26 18:38:58', 'Super Asesina', 'Asesina entrenada', 10),
(29, '2021-05-26 18:39:07', '2021-05-26 18:39:07', 'Super agilidad', 'Super agilidad', 2),
(30, '2021-05-26 18:42:56', '2021-05-26 18:42:56', 'Mágia', 'Alteración de la realidad', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MkNKjMmH4Vrql1y4P5kbhZFkoaraafbdkD2iMAfT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmNXYVdjZ1hTcGRmdlVKVEVLRGtneHZ4SFE1YUF0eEhxd2lzeUEzeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oZXJvZS5pbWFnZS11cGxvYWQvMzEiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkalZIZGp4UURHLnEwanRTeWlhSUpCdTR5dXhkOC9KbkNaZHJJeEEuYlQub3VQa3o5NnpIZ3kiO30=', 1622120876);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Esther', 'arikhel@gmail.com', NULL, '$2y$10$jVHdjxQDG.q0jtSyiaIJBu4yuxd8/JnCZdrIxA.bT.ouPkz96zHgy', NULL, NULL, NULL, NULL, NULL, '2021-05-14 06:19:08', '2021-05-14 06:19:08'),
(2, 'Usuario', 'Usuario@gmail.com', NULL, '$2y$10$QAnJAmJRMdtRX7n9qVY5X.6oas8Mv10zclnkpizvn4cyJSCJaT6mC', NULL, NULL, NULL, NULL, NULL, '2021-05-25 07:22:02', '2021-05-25 07:22:02'),
(3, 'usuario2', 'usuario@gmail.com2', NULL, '$2y$10$n411hP3pTjefP70jUYMMYeFa4qSWGJyhS9QMCGc5RP0WQwxZTxb1.', NULL, NULL, NULL, NULL, NULL, '2021-05-25 09:22:59', '2021-05-25 09:22:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alignments`
--
ALTER TABLE `alignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alignments_name_unique` (`name`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `heroes_heroe_name_unique` (`heroe_name`),
  ADD KEY `heroes_alignment_id_foreign` (`alignment_id`);

--
-- Indices de la tabla `heroe_organization`
--
ALTER TABLE `heroe_organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroe_organizations_heroe_id_foreign` (`heroe_id`),
  ADD KEY `heroe_organizations_organization_id_foreign` (`organization_id`);

--
-- Indices de la tabla `heroe_power`
--
ALTER TABLE `heroe_power`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heroe_powers_heroe_id_foreign` (`heroe_id`),
  ADD KEY `heroe_powers_power_id_foreign` (`power_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `powers`
--
ALTER TABLE `powers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `powers_name_unique` (`name`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alignments`
--
ALTER TABLE `alignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `heroe_organization`
--
ALTER TABLE `heroe_organization`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `heroe_power`
--
ALTER TABLE `heroe_power`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `powers`
--
ALTER TABLE `powers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `heroes`
--
ALTER TABLE `heroes`
  ADD CONSTRAINT `heroes_alignment_id_foreign` FOREIGN KEY (`alignment_id`) REFERENCES `alignments` (`id`);

--
-- Filtros para la tabla `heroe_organization`
--
ALTER TABLE `heroe_organization`
  ADD CONSTRAINT `heroe_organizations_heroe_id_foreign` FOREIGN KEY (`heroe_id`) REFERENCES `heroes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heroe_organizations_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `heroe_power`
--
ALTER TABLE `heroe_power`
  ADD CONSTRAINT `heroe_powers_heroe_id_foreign` FOREIGN KEY (`heroe_id`) REFERENCES `heroes` (`id`),
  ADD CONSTRAINT `heroe_powers_power_id_foreign` FOREIGN KEY (`power_id`) REFERENCES `powers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
