-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2025 a las 06:24:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zapateria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `zapato_id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `zapato_id`, `precio`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 499.00, '2025-05-26 13:00:09', '2025-05-26 13:00:09'),
(2, 1, 8, 899.00, '2025-05-26 13:00:09', '2025-05-26 13:00:09'),
(3, 1, 13, 399.00, '2025-05-26 13:09:33', '2025-05-26 13:09:33'),
(4, 1, 5, 500.00, '2025-05-26 13:57:24', '2025-05-26 13:57:24'),
(5, 1, 6, 899.00, '2025-05-26 19:07:39', '2025-05-26 19:07:39'),
(6, 1, 10, 699.00, '2025-05-26 19:07:39', '2025-05-26 19:07:39'),
(7, 1, 13, 399.00, '2025-05-26 19:07:39', '2025-05-26 19:07:39'),
(8, 5, 5, 500.00, '2025-05-27 01:08:55', '2025-05-27 01:08:55'),
(9, 5, 8, 899.00, '2025-05-27 01:08:55', '2025-05-27 01:08:55'),
(10, 5, 10, 699.00, '2025-05-27 01:08:55', '2025-05-27 01:08:55'),
(11, 6, 5, 500.00, '2025-05-27 02:08:39', '2025-05-27 02:08:39'),
(12, 1, 6, 899.00, '2025-05-27 04:15:28', '2025-05-27 04:15:28'),
(13, 8, 13, 399.00, '2025-05-28 06:25:46', '2025-05-28 06:25:46'),
(14, 8, 15, 999.00, '2025-05-28 06:25:46', '2025-05-28 06:25:46'),
(15, 8, 12, 799.00, '2025-05-28 07:12:34', '2025-05-28 07:12:34'),
(16, 8, 17, 399.00, '2025-05-28 07:12:34', '2025-05-28 07:12:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
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
-- Estructura de tabla para la tabla `job_batches`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_12_051922_create_zapatos_table', 2),
(5, '2025_05_12_081635_add_destacado_to_zapatos_table', 3),
(7, '2025_05_16_171048_create_usuarios_table', 4),
(8, '2025_05_17_062325_create_compras_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PNNjuLOjvgwTKgNVX2hIvoWE6zJJjRRBuKJ1llLP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3plb1gxcGxodm1QRzhlTWppc2dkdmtENDY3a29FTU9ZNEpoZVhiYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748399655);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terminos` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `telefono`, `ciudad`, `pais`, `password`, `terminos`, `created_at`, `updated_at`) VALUES
(1, 'JARED ALFREDO', 'PADRON', 'ZALETA', 'jared_sifuentes@hotmail.com', '8687969805', 'HEROICA MATAMOROS', 'México', '$2y$12$lEsAXmTuDs/9hliG3XK7au1/bnRfnmAYaE0Nt3ChATHiB4gAxlPCK', 1, '2025-05-17 00:41:46', '2025-05-26 12:07:28'),
(2, 'Jose Arturo', 'Perez', 'Cruz', 'correo3@gmail.com', '111111', 'Monterrey', 'México', '$2y$12$sBoHTyX0OwMfjF.ZygVDiurwXesNNic/AV0gb0Gd7cwTiaqlwAaoi', 1, '2025-05-17 02:31:18', '2025-05-17 02:31:18'),
(3, 'Oscar', 'Vazquez', 'Trujillo', 'CorreoOscar@gmail.com', '122212121', 'Heroica', 'Mexico', '$2y$12$nM69Uc/IAnjZJ6S5IHLO0evEjqh8oRYUF012TC0HVJM53qEJt8tli', 1, '2025-05-26 10:05:42', '2025-05-26 10:05:42'),
(4, 'luis', 'Torres', 'Valdez', 'diegos@io.com', '1111111111', 'Matamoros, Tamaulipas', 'México', '$2y$12$3SZXkfTa8goqujzbtc09d.a7w0y2sbymiY260roNC1EtTp1xnCM5q', 1, '2025-05-26 12:03:09', '2025-05-26 12:03:09'),
(5, 'isaac', 'segovia', 'cazares', 'isaacsego@outlook.com', '8681708752', 'Matamoros', 'México', '$2y$12$UIkSifBOQ4RAgb4jRq4YnOkVPbq.3RpQ8OnwIz4CbLLBSWbnRTI62', 1, '2025-05-27 01:07:23', '2025-05-27 01:07:23'),
(6, 'isaac', 'segovia', 'cazaresj', 'isaacsegouu@outlook.com', '8681708752', 'Matamoros', 'México', '$2y$12$/uS0JQqj1pzCNTsHUpYlKeT8BTQG9CoE.xrfKKkgK7LsQCUjSUsaa', 1, '2025-05-27 02:07:10', '2025-05-27 02:07:10'),
(7, 'Obet Yahir', 'Caudillo', 'Luna', 'yahir@tecnm.mx', '9999999999', 'Matamoros', 'México', '$2y$12$qVL1o2pJXRuSuT0txkdi8ey8cN/PH1mCIlgOOPaQ/pXvkwGQtKaQ.', 1, '2025-05-28 04:52:39', '2025-05-28 04:52:39'),
(8, 'Joel', 'Sanchez', 'Gutierrez', 'Joel@tecnm.mx', '8681138202', 'Matamoros', 'Mexico', '$2y$12$7NjKInG8752nQIQpEWJbe.lcYF0XIuqA.4NpKsT37fsWfP.rxwaJ2', 1, '2025-05-28 06:21:22', '2025-05-28 06:21:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatos`
--

CREATE TABLE `zapatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `talla` varchar(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zapatos`
--

INSERT INTO `zapatos` (`id`, `nombre`, `descripcion`, `talla`, `color`, `precio`, `cantidad`, `imagen`, `categoria`, `created_at`, `updated_at`, `destacado`) VALUES
(5, 'Nike', 'Tenis Nike Nuevos', '7,5', 'Blanco con rojo', 500.00, 7, 'imagenes/6DDKGwQlGQbl2mttQrOwTg7iBOww9RDE6mwXeLij.jpg', 'Casual', '2025-05-12 12:17:09', '2025-05-27 02:08:39', 0),
(6, 'Adidas', 'Tenis Adidas', '7,5', 'Blanco', 899.00, 8, 'imagenes/X3oTTQ513rbTsIupS1ewR6163ZE4BJbk74qWgXTE.jpg', 'Deportes', '2025-05-12 13:02:02', '2025-05-27 04:15:28', 0),
(7, 'Puma', 'Tenis Puma Mujer', '7,5', 'Blanco con rosa', 499.00, 9, 'imagenes/ohuPgjNUJfOBcTDvbuHnRJZDPL4lenz2JJ1qKuJZ.jpg', 'Casual', '2025-05-12 13:03:49', '2025-05-26 18:51:58', 0),
(8, 'Tenis Jordan', 'Tenis Deportivos Jordan', '7,5', 'Blanco', 899.00, 8, 'imagenes/stEiXiorCracRTKa8FPsf1hJ7MuU6vEFxcasUwW9.jpg', 'Deportes', '2025-05-12 13:04:57', '2025-05-27 01:08:55', 0),
(9, 'Vans', 'Tenis Vans', '7,5', 'Negro', 899.00, 10, 'imagenes/hleogzUz5jwjxO6QcO8kNaMd39YMNwN59LGtE9M6.jpg', 'Casual', '2025-05-17 09:29:27', '2025-05-26 18:40:14', 0),
(10, 'Converse', 'Converse', '7,5', 'Negro', 699.00, 8, 'imagenes/o3tkkwLDp7ZLl98GMv5h116qB7x5jasg5FaDibdY.jpg', 'Casual', '2025-05-17 09:30:13', '2025-05-27 01:08:55', 0),
(11, 'Zapato', 'Zapato de Vestir', '7,5', 'Cafe', 699.00, 10, 'imagenes/4u3NRvGwMn2qo81pAbHs66sG6HQkKzZnpH99a66u.jpg', 'Formal', '2025-05-26 10:22:53', '2025-05-26 18:40:49', 0),
(12, 'Botas', 'Botas de Mezclilla', '8,5', 'Azul', 799.00, 4, 'imagenes/H6yrsqMPCRn78a0PdVZNjkBTp9J4dnYETgkd7OpW.jpg', 'Casual', '2025-05-26 10:26:27', '2025-05-28 07:12:34', 0),
(13, 'Sandalias', 'Sandalias para Dama', '8,5', 'Cafe', 399.00, 7, 'imagenes/eews4MgR8w9YuCcCyCV91WIW440E7HmLcfUb20eV.jpg', 'Casual', '2025-05-26 10:27:08', '2025-05-28 06:25:46', 0),
(14, 'Zapatos', 'Zapatos de Vestir Adulto', '7,5', 'Naranja', 499.00, 10, 'imagenes/tZXQyxgE5KyViXBf2e4XVdRf2TbIEJAA0ragpqdS.jpg', 'Formal', '2025-05-26 10:28:00', '2025-05-26 18:41:31', 0),
(15, 'Nike Air Jordan', 'Tenis Nike Air Jordan Edicion Limitada', '7,5', 'Blanco con rojo', 999.00, 3, 'imagenes/5phVmtdxwo9w4Sq6OxH3mSEvbALbFfjtX9EBfzQ9.jpg', 'Casual', '2025-05-26 10:30:35', '2025-05-28 06:25:46', 0),
(16, 'Botas', 'Botas para Dama', '7,5', 'Negro', 350.00, 10, 'imagenes/T8UaODGaplIouu8DcwNEBLFYYX4BmkKbNS99BMb8.jpg', 'Casual', '2025-05-26 10:31:16', '2025-05-26 18:42:05', 0),
(17, 'Nike', 'Nuevos', '8,5', 'Verde', 399.00, 9, 'imagenes/05m1TM4k1RYXJvWxncELw78xglCnHaj2Atg3o9vU.png', 'Casual', '2025-05-26 18:21:34', '2025-05-28 07:12:34', 0),
(18, 'Vans', 'Adulto', '8,5', 'Verde', 399.00, 10, 'imagenes/RKvoxC2JGDFXS3fIE832QqUJW3jECy1XQRehGl5k.jpg', 'Casual', '2025-05-28 07:15:36', '2025-05-28 07:15:36', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_usuario_id_foreign` (`usuario_id`),
  ADD KEY `compras_zapato_id_foreign` (`zapato_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- Indices de la tabla `zapatos`
--
ALTER TABLE `zapatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `zapatos`
--
ALTER TABLE `zapatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_zapato_id_foreign` FOREIGN KEY (`zapato_id`) REFERENCES `zapatos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
