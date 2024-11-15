-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 04:32:26
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
-- Base de datos: `si_consultorio_ginecologico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas_cabecera`
--

CREATE TABLE `historias_clinicas_cabecera` (
  `id_hcc` int(11) NOT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `id_pac` int(11) DEFAULT NULL,
  `fec_con_hcc` datetime NOT NULL,
  `edad_hcc` int(11) DEFAULT NULL,
  `act_hcc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas_detalle`
--

CREATE TABLE `historias_clinicas_detalle` (
  `id_hcd` int(11) NOT NULL,
  `id_hcc` int(11) DEFAULT NULL,
  `fur_hcd` date DEFAULT NULL,
  `pap_hcd` int(11) DEFAULT NULL,
  `mac_hcd` varchar(100) DEFAULT NULL,
  `nps_hcd` int(11) DEFAULT NULL,
  `t_hcd` float DEFAULT NULL,
  `pa_hcd` varchar(50) DEFAULT NULL,
  `fc_hcd` varchar(50) DEFAULT NULL,
  `fr_hcd` varchar(50) DEFAULT NULL,
  `peso_hcd` float DEFAULT NULL,
  `talla_hcd` float DEFAULT NULL,
  `spo2_hcd` int(11) DEFAULT NULL,
  `te_hcd` varchar(50) DEFAULT NULL,
  `fi_hcd` varchar(50) DEFAULT NULL,
  `c_hcd` varchar(50) DEFAULT NULL,
  `mot_con_hcd` text DEFAULT NULL,
  `exa_fis_hcd` text DEFAULT NULL,
  `diag_hcd` text DEFAULT NULL,
  `trat_hcd` text DEFAULT NULL,
  `act_hcd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_pac` int(11) NOT NULL,
  `dni_pac` char(8) NOT NULL,
  `ape_pac` varchar(100) NOT NULL,
  `nom_pac` varchar(100) NOT NULL,
  `fec_nac_pac` date NOT NULL,
  `sexo_pac` varchar(10) NOT NULL,
  `est_civ_pac` varchar(15) DEFAULT NULL,
  `ocu_pac` varchar(50) DEFAULT NULL,
  `dom_pac` varchar(150) DEFAULT NULL,
  `tel_pac` char(9) DEFAULT NULL,
  `email_pac` varchar(100) DEFAULT NULL,
  `acom_pac` varchar(100) DEFAULT NULL,
  `ant_per_pac` text DEFAULT NULL,
  `ant_fam_pac` text DEFAULT NULL,
  `ant_qui_pac` text DEFAULT NULL,
  `ant_obs_ges_pac` int(11) DEFAULT NULL,
  `ant_obs_nat_pac` int(11) DEFAULT NULL,
  `ant_obs_np_pac` int(11) DEFAULT NULL,
  `ant_obs_a_pac` int(11) DEFAULT NULL,
  `ant_obs_hv_pac` int(11) DEFAULT NULL,
  `ant_obs_men_pac` int(11) DEFAULT NULL,
  `ant_obs_irs_pac` int(11) DEFAULT NULL,
  `gru_san_pac` varchar(5) DEFAULT NULL,
  `act_pac` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nom_rol` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `dni_usu` char(8) NOT NULL,
  `ape_usu` varchar(100) NOT NULL,
  `nom_usu` varchar(100) NOT NULL,
  `user_usu` varchar(50) NOT NULL,
  `pass_usu` varchar(255) NOT NULL,
  `act_usu` tinyint(1) NOT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historias_clinicas_cabecera`
--
ALTER TABLE `historias_clinicas_cabecera`
  ADD PRIMARY KEY (`id_hcc`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_pac` (`id_pac`);

--
-- Indices de la tabla `historias_clinicas_detalle`
--
ALTER TABLE `historias_clinicas_detalle`
  ADD PRIMARY KEY (`id_hcd`),
  ADD KEY `id_hcc` (`id_hcc`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_pac`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historias_clinicas_cabecera`
--
ALTER TABLE `historias_clinicas_cabecera`
  MODIFY `id_hcc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historias_clinicas_detalle`
--
ALTER TABLE `historias_clinicas_detalle`
  MODIFY `id_hcd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_pac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historias_clinicas_cabecera`
--
ALTER TABLE `historias_clinicas_cabecera`
  ADD CONSTRAINT `historias_clinicas_cabecera_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `historias_clinicas_cabecera_ibfk_2` FOREIGN KEY (`id_pac`) REFERENCES `pacientes` (`id_pac`);

--
-- Filtros para la tabla `historias_clinicas_detalle`
--
ALTER TABLE `historias_clinicas_detalle`
  ADD CONSTRAINT `historias_clinicas_detalle_ibfk_1` FOREIGN KEY (`id_hcc`) REFERENCES `historias_clinicas_cabecera` (`id_hcc`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
