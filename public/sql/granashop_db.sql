-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2026 a las 19:25:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `granashop_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `nombre`, `foto`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'ADIDAS', 'img/brands/adidas.jpg', 'Adidas AG ​ es una compañía multinacional alemana fundada en 1949 dedicada a la fabricación de equipamiento deportivo y productos de moda. La empresa también es patrocinadora de eventos y figuras deportivas a nivel mundial. Es el primer mayor fabricante del rubro en el mundo.', NULL, NULL),
(2, 'NIKE', 'img/brands/nike.jpg', 'Nike, Inc.​ es una empresa multinacional estadounidense dedicada al diseño, desarrollo, fabricación y comercialización de equipamiento deportivo: balones, calzado, ropa, equipo, accesorios y otros artículos deportivos.', NULL, NULL),
(3, 'VANS', 'img/brands/vans.png', 'Vans es una compañía dedicada principalmente a la producción de calzados, también fabrica ropa, como sudaderas y camisetas fundada por Paul Van Doren en 1966 en California. Su principal mercado está en el skateboarding, además de otros deportes urbanos y también extremos.', NULL, NULL),
(4, 'ADIDAS', 'img/brands/adidas.jpg', 'Adidas AG ​ es una compañía multinacional alemana fundada en 1949 dedicada a la fabricación de equipamiento deportivo y productos de moda. La empresa también es patrocinadora de eventos y figuras deportivas a nivel mundial. Es el primer mayor fabricante del rubro en el mundo.', NULL, NULL),
(5, 'NIKE', 'img/brands/nike.jpg', 'Nike, Inc.​ es una empresa multinacional estadounidense dedicada al diseño, desarrollo, fabricación y comercialización de equipamiento deportivo: balones, calzado, ropa, equipo, accesorios y otros artículos deportivos.', NULL, NULL),
(6, 'VANS', 'img/brands/vans.png', 'Vans es una compañía dedicada principalmente a la producción de calzados, también fabrica ropa, como sudaderas y camisetas fundada por Paul Van Doren en 1966 en California. Su principal mercado está en el skateboarding, además de otros deportes urbanos y también extremos.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Camisetas', NULL, NULL),
(2, 'Pantalones', NULL, NULL),
(3, 'Calzado', NULL, NULL),
(4, 'Complementos', NULL, NULL),
(5, 'Camisetas', NULL, NULL),
(6, 'Pantalones', NULL, NULL),
(7, 'Calzado', NULL, NULL),
(8, 'Complementos', NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_11_21_123632_create_roles_table', 1),
(5, '2021_11_21_164256_create_categories_table', 1),
(6, '2021_11_22_123632_create_brands_table', 1),
(7, '2021_12_08_121315_create_user_table', 1),
(8, '2021_12_1_164425_create_products_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `marca` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `precio`, `foto`, `categoria`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Retro Tee', 27.50, 'img/products/camiseta.png', 1, 1, NULL, NULL),
(2, 'T-Shirt', 40.00, 'img/products/camiseta.png', 1, 2, NULL, NULL),
(3, 'Flato Heavy', 60.00, 'img/products/camiseta.png', 1, 2, NULL, NULL),
(4, 'Basic Alpha', 49.00, 'img/products/camiseta.png', 1, 3, NULL, NULL),
(5, 'Patchwork', 17.00, 'img/products/camiseta.png', 1, 1, NULL, NULL),
(6, 'Graphics', 10.00, 'img/products/camiseta.png', 1, 2, NULL, NULL),
(7, 'Singgang', 20.00, 'img/products/camiseta.png', 1, 3, NULL, NULL),
(8, 'Club Fleece', 62.00, 'img/products/pantalon.jpg', 2, 1, NULL, NULL),
(9, 'Jogging Club', 52.00, 'img/products/pantalon.jpg', 2, 1, NULL, NULL),
(10, 'Repeat Fleece', 12.00, 'img/products/pantalon.jpg', 2, 2, NULL, NULL),
(11, 'ESSNTL PANT', 92.00, 'img/products/pantalon.jpg', 2, 3, NULL, NULL),
(12, 'Essentials', 24.00, 'img/products/pantalon.jpg', 2, 1, NULL, NULL),
(13, 'Cargo Pants', 30.00, 'img/products/pantalon.jpg', 2, 2, NULL, NULL),
(14, 'Jumpman Fleece', 10.00, 'img/products/pantalon.jpg', 2, 3, NULL, NULL),
(15, 'Blazer Mid 77', 190.00, 'img/products/calzado.jpg', 3, 1, NULL, NULL),
(16, 'Air Force 1', 89.00, 'img/products/calzado.jpg', 3, 1, NULL, NULL),
(17, 'Olds Skool', 99.00, 'img/products/calzado.jpg', 3, 2, NULL, NULL),
(18, 'Air Force 1', 129.00, 'img/products/calzado.jpg', 3, 3, NULL, NULL),
(19, 'Air Presto', 47.00, 'img/products/calzado.jpg', 3, 1, NULL, NULL),
(20, 'Continental 80', 38.00, 'img/products/calzado.jpg', 3, 2, NULL, NULL),
(21, 'OZELIA', 19.00, 'img/products/calzado.jpg', 3, 3, NULL, NULL),
(22, 'MLB New', 22.99, 'img/products/gorra.jpg', 4, 1, NULL, NULL),
(23, 'Space Jam', 20.00, 'img/products/gorra.jpg', 4, 1, NULL, NULL),
(24, 'Trucker Foam', 12.00, 'img/products/gorra.jpg', 4, 2, NULL, NULL),
(25, 'Bucket Hat', 27.00, 'img/products/gorra.jpg', 4, 3, NULL, NULL),
(26, 'Trucker Corduroy', 14.00, 'img/products/gorra.jpg', 4, 1, NULL, NULL),
(27, 'SportWear Heritage', 5.00, 'img/products/gorra.jpg', 4, 2, NULL, NULL),
(28, '940 A-Frame', 10.00, 'img/products/gorra.jpg', 4, 3, NULL, NULL),
(30, 'camiseta 12', 199.00, 'products/I6exDGeQ0FWYMNZXUbW6xw0iOR7ajVkKM51cehgl.png', 1, 3, '2026-04-26 15:19:53', '2026-04-26 15:19:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'usuario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipoUsuario` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellidos`, `mail`, `pass`, `tipoUsuario`, `created_at`, `updated_at`) VALUES
(1, 'Antonio', 'Fernandez', 'correo@gmail.com', '$2y$10$y9sEzOlsV/EQ9QcxcQrn8.LQcKTSzDJNua1KgwpZXv5HIULM5BLLO', 2, NULL, NULL),
(2, 'admin', 'administrador', 'admin@gmail.com', '$2y$10$1a0h16Gut8S2beO6t8gCmuFPoSxn.xzw1NmY5gOBrsFyZb0OwEfNG', 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categoria_foreign` (`categoria`),
  ADD KEY `products_marca_foreign` (`marca`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nombre_unique` (`nombre`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_tipousuario_foreign` (`tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_marca_foreign` FOREIGN KEY (`marca`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_tipousuario_foreign` FOREIGN KEY (`tipoUsuario`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
