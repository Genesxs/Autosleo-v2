-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2021 a las 15:43:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autosleo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `porcent` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `spare_part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `position`, `url_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adelaida Suárez', 'Auditora financiera y contable', 'storage/img//01.jpg', '2021-11-16 18:30:04', '2021-11-16 18:30:04', NULL),
(3, 'Alex Quintero', 'Técnico automotriz e iyección electrónica', 'storage/img//02.jpg', '2021-11-16 18:35:49', '2021-11-16 18:35:49', NULL),
(4, 'Cristian Lora', 'Tecnico automotriz y car audio', 'storage/img//12.jpg', '2021-11-16 20:03:31', '2021-11-16 20:03:31', NULL),
(5, 'Sebastian Giraldo', 'Lavador automotriz', 'storage/img//08.jpg', '2021-11-16 20:04:18', '2021-11-16 20:04:18', NULL);

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
(6, '2021_10_04_143308_create_sessions_table', 1),
(7, '2021_10_04_153107_create_permission_tables', 1),
(8, '2021_10_19_173408_create_clientes_table', 1),
(9, '2021_10_22_194303_add_direccion_to_users', 1),
(10, '2021_10_22_194911_add_celular_to_users', 1),
(11, '2021_10_22_194932_add_telefono_to_users', 1),
(12, '2021_10_22_212828_add_nombres_to_users', 1),
(13, '2021_10_22_212845_add_apellidos_to_users', 1),
(15, '2021_11_04_152250_create_trademarks_table', 2),
(16, '2021_11_04_163515_create_type_vehicles_table', 3),
(18, '2021_11_04_165023_create_type_services_table', 4),
(19, '2021_11_04_195031_create_providers_table', 5),
(20, '2021_11_05_195757_create_discounts_table', 6),
(22, '2021_11_09_224337_create_provider_spare_parts_table', 7),
(23, '2021_11_16_122427_create_employees_table', 8),
(24, '2021_11_22_213725_create_type_spare_parts_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.home', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33'),
(2, 'admin.users.index', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33'),
(3, 'admin.users.edit', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33'),
(4, 'admin.users.update', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33'),
(5, 'welcome', 'web', '2021-11-18 14:53:00', '2021-11-18 14:53:00'),
(6, 'dashboard', 'web', '2021-11-18 14:53:00', '2021-11-18 14:53:00'),
(7, 'contactenos.index', 'web', '2021-11-18 14:53:05', '2021-11-18 14:53:05'),
(8, 'contactenos.store', 'web', '2021-11-18 14:53:10', '2021-11-18 14:53:10'),
(9, 'quienesSomos', 'web', '2021-11-18 14:53:15', '2021-11-18 14:53:15'),
(10, 'proveedores', 'web', '2021-11-18 14:53:20', '2021-11-18 14:53:20'),
(11, 'repuestos', 'web', '2021-11-18 14:53:25', '2021-11-18 14:53:25');

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
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `description`, `cellphone`, `email`, `logo`, `page`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Estopas Medellín', 'Estopas para brillo', '1234567891', 'estopas@gmail.com', 'storage/img/Estopas Medellín/20210512172109Delfin.jpg', 'estopas.com', NULL, '2021-11-05 00:56:50', '2021-11-24 19:57:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_spare_parts`
--

CREATE TABLE `provider_spare_parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `spare_part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provider_spare_parts`
--

INSERT INTO `provider_spare_parts` (`id`, `provider_id`, `spare_part_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 3, '2021-11-26 21:26:56', '2021-11-26 21:26:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33'),
(2, 'Cliente', 'web', '2021-10-23 02:42:33', '2021-10-23 02:42:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `type_service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `description`, `value`, `type_service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Enderezar guardabarros', 200000, 1, '2021-11-05 00:25:52', '2021-11-05 00:29:49', '2021-11-05 00:29:49'),
(2, 'Despinchar', 12000, 4, '2021-11-05 00:26:35', '2021-11-05 00:26:35', NULL),
(3, 'Cambio de aceite', 90000, 4, '2021-11-05 00:27:07', '2021-11-05 00:27:07', NULL),
(4, 'Cambio de pastas', 20000, 7, '2021-11-05 00:27:25', '2021-11-05 00:27:25', NULL),
(5, 'Polichada', 60000, 2, '2021-11-05 00:27:47', '2021-11-19 20:29:18', '2021-11-19 20:29:18'),
(6, 'Alineación de luces', 15000, 3, '2021-11-05 00:28:07', '2021-11-05 00:28:07', NULL);

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
('DSE4EAVq0PV55XPwE4PhZqzcd4QWrNi2xtRtK7Tq', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZm9OVGZGMWdIU0lrTGxpcmhxY3MxOWlpOUhuVzAzSU1YVWhKOGpRZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9hdXRvc2xlby5sb2NhbCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQwQ2xkN21LODFWYjdYd1cyWGpBNVJPUUJGamcudGUzNEEuWURCQ1JaV2tCUmNZUURNRXNzVyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMENsZDdtSzgxVmI3WHdXMlhqQTVST1FCRmpnLnRlMzRBLllEQkNSWldrQlJjWVFETUVzc1ciO30=', 1639406567);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_spare_part_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `unit_value` bigint(20) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `spare_parts`
--

INSERT INTO `spare_parts` (`id`, `type_spare_part_id`, `name`, `description`, `unit_value`, `image`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'Vidrios', 'vidrios', 50000, 'storage/img/Vidrios/20210521215907Herramientas01.jpg', 35, '2021-11-22 18:30:20', '2021-11-24 19:57:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trademarks`
--

CREATE TABLE `trademarks` (
  `id` int(11) NOT NULL,
  `trademark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trademarks`
--

INSERT INTO `trademarks` (`id`, `trademark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Renault logan', '2021-11-04 21:31:17', '2021-11-04 21:32:02', '2021-11-04 21:32:02'),
(2, 'Renault', '2021-11-04 22:00:07', '2021-11-04 22:00:07', NULL),
(3, 'Chevrolet', '2021-11-04 22:00:17', '2021-11-04 22:00:17', NULL),
(4, 'BMW', '2021-11-04 22:00:26', '2021-11-04 22:00:26', NULL),
(5, 'Hyundai', '2021-11-04 22:00:35', '2021-11-04 22:00:35', NULL),
(6, 'Kia', '2021-11-04 22:00:44', '2021-11-04 22:00:44', NULL),
(7, 'Mercedes benz', '2021-11-04 22:01:08', '2021-11-04 22:01:08', NULL),
(8, 'Volvo', '2021-11-04 22:01:24', '2021-11-04 22:01:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_services`
--

CREATE TABLE `type_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_services`
--

INSERT INTO `type_services` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Latonería', '2021-11-04 21:54:17', '2021-11-04 21:54:17', NULL),
(2, 'Pintura', '2021-11-04 21:54:28', '2021-11-04 21:54:28', NULL),
(3, 'Electricidad', '2021-11-04 21:54:38', '2021-11-04 21:54:38', NULL),
(4, 'Mecanica', '2021-11-04 21:54:52', '2021-11-04 21:54:52', NULL),
(5, 'Suspensión', '2021-11-04 21:55:04', '2021-11-04 21:55:04', NULL),
(6, 'Alineación', '2021-11-04 21:55:17', '2021-11-04 21:55:17', NULL),
(7, 'Balanceo', '2021-11-04 21:55:36', '2021-11-04 21:55:36', NULL),
(9, 'Montallantas', '2021-11-04 22:31:14', '2021-11-04 22:31:44', '2021-11-04 22:31:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_spare_parts`
--

CREATE TABLE `type_spare_parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_spare_parts`
--

INSERT INTO `type_spare_parts` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Repuesto', '2021-11-23 02:48:58', '2021-11-23 02:48:58', NULL),
(2, 'Insumo', '2021-11-23 02:49:04', '2021-11-23 02:49:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_vehicles`
--

CREATE TABLE `type_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_vehicle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_vehicles`
--

INSERT INTO `type_vehicles` (`id`, `type_vehicle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vehiculo', '2021-11-04 21:37:26', '2021-11-04 21:37:59', '2021-11-04 21:37:59');

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
  `estado` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `estado`, `remember_token`, `created_at`, `updated_at`, `direccion`, `celular`, `telefono`, `nombres`, `apellidos`) VALUES
(1, 'Carolina', 'autosleo.car@hotmail.com', NULL, '$2y$10$SKCLO7EB.jNbK9NTyhpD6OBSWVHuwcxxAuQlDJzNSH9un5oJ1bsci', NULL, NULL, 1, NULL, '2021-10-23 02:42:33', '2021-10-23 02:42:33', 'cr 22 #34-32', '1234567854', '1234567', 'Carolina', 'Rendon'),
(2, 'Génesis', 'genesxstc@gmail.com', NULL, '$2y$10$0Cld7mK81Vb7XwW2XjA5ROQBFjg.te34A.YDBCRZWkBRcYQDMEssW', NULL, NULL, 1, NULL, '2021-10-23 02:44:32', '2021-10-26 18:41:31', 'Vereda bonilla', '3193196965', '', 'Heidy Emanuela', 'Torres Cardona'),
(3, 'Nuevo', 'nuevo@nuevo.com', NULL, '$2y$10$3aWzgBT1nx1gYDuP07w2F.bxyHYhltFyA3ZhcT7H3yZOsmFn3JEVm', NULL, NULL, 1, NULL, '2021-10-23 02:49:22', '2021-10-23 02:53:44', 'babyshower', '9857463218', NULL, 'Nuevecito', 'Reciente'),
(4, 'Pepito', 'pepe@gmail.com', NULL, '$2y$10$9E/uu2OsHA7/Z/Yu3E.gCeEVXuaIKLKzStiRV5iZ/WK/VFtaO6N/S', NULL, NULL, 1, NULL, '2021-10-29 00:07:13', '2021-10-29 00:33:01', 'papa rayada', '2345435678', '1234567', 'Pepito ', 'Peralta'),
(5, 'Wendy', 'wendy@gmail.com', NULL, '$2y$10$1svsifYk7wvUYLUEk6.dNuw/0efD.P7apEudWpF0fnN7H4Jn9rRua', NULL, NULL, 1, NULL, '2021-10-30 03:22:20', '2021-10-30 03:22:56', 'Vereda bonilla', '3193196965', '1231324', 'Wendy ', 'Torres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_userid_unique` (`userId`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
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
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provider_spare_parts`
--
ALTER TABLE `provider_spare_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_spare_parts_provider_id_foreign` (`provider_id`),
  ADD KEY `provider_spare_parts_spare_part_id_foreign` (`spare_part_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_services_type_services` (`type_service_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_spare_part_id` (`type_spare_part_id`);

--
-- Indices de la tabla `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_services`
--
ALTER TABLE `type_services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_spare_parts`
--
ALTER TABLE `type_spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_vehicles`
--
ALTER TABLE `type_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provider_spare_parts`
--
ALTER TABLE `provider_spare_parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `type_services`
--
ALTER TABLE `type_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `type_spare_parts`
--
ALTER TABLE `type_spare_parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_vehicles`
--
ALTER TABLE `type_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provider_spare_parts`
--
ALTER TABLE `provider_spare_parts`
  ADD CONSTRAINT `provider_spare_parts_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `provider_spare_parts_spare_part_id_foreign` FOREIGN KEY (`spare_part_id`) REFERENCES `spare_parts` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_type_services` FOREIGN KEY (`type_service_id`) REFERENCES `type_services` (`id`);

--
-- Filtros para la tabla `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD CONSTRAINT `spare_parts_ibfk_1` FOREIGN KEY (`type_spare_part_id`) REFERENCES `type_spare_parts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
