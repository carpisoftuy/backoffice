-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.122.1:3306
-- Generation Time: Jul 19, 2023 at 10:46 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpifast`
--
CREATE DATABASE IF NOT EXISTS `carpifast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `carpifast`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `nombre_usuario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almaceneros`
--

CREATE TABLE `almaceneros` (
  `nombre_usuario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almacenes`
--

CREATE TABLE `almacenes` (
  `id_almacen` int UNSIGNED NOT NULL,
  `espacio` int UNSIGNED NOT NULL COMMENT 'en L',
  `espacio_ocupado` int UNSIGNED NOT NULL COMMENT 'en L',
  `codigo_postal` varchar(10) NOT NULL,
  `calle` varchar(32) NOT NULL,
  `nro_puerta` varchar(8) NOT NULL,
  `observaciones_direccion` varchar(255) NOT NULL,
  `latitud` decimal(8,6) NOT NULL,
  `longitud` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almacen_contiene_bulto`
--

CREATE TABLE `almacen_contiene_bulto` (
  `id_bulto` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `id_almacen` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almacen_contiene_bulto_fin`
--

CREATE TABLE `almacen_contiene_bulto_fin` (
  `id_bulto` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almacen_contiene_paquete`
--

CREATE TABLE `almacen_contiene_paquete` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `id_almacen` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `almacen_contiene_paquete_fin`
--

CREATE TABLE `almacen_contiene_paquete_fin` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bultos`
--

CREATE TABLE `bultos` (
  `id_bulto` int UNSIGNED NOT NULL,
  `fecha_armado` timestamp NOT NULL,
  `volumen` int UNSIGNED NOT NULL COMMENT 'en L',
  `peso` int UNSIGNED NOT NULL COMMENT 'en Kg',
  `destino` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bultos_desarmados`
--

CREATE TABLE `bultos_desarmados` (
  `id_bulto` int UNSIGNED NOT NULL,
  `fecha_desarmado` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulto_contiene`
--

CREATE TABLE `bulto_contiene` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `id_bulto` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulto_contiene_fin`
--

CREATE TABLE `bulto_contiene_fin` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `camiones`
--

CREATE TABLE `camiones` (
  `id_camion` int UNSIGNED NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `codigo_pais` char(2) NOT NULL,
  `capacidad_volumen` int NOT NULL,
  `capacidad_peso` int NOT NULL,
  `peso_ocupado` int NOT NULL,
  `volumen_ocupado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carga_bulto`
--

CREATE TABLE `carga_bulto` (
  `id_bulto` int UNSIGNED NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carga_bulto_fin`
--

CREATE TABLE `carga_bulto_fin` (
  `id_bulto` int UNSIGNED NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carga_paquete`
--

CREATE TABLE `carga_paquete` (
  `id_paquete` int UNSIGNED NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carga_paquete_fin`
--

CREATE TABLE `carga_paquete_fin` (
  `id_paquete` int UNSIGNED NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choferes`
--

CREATE TABLE `choferes` (
  `nombre_usuario` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrega_bulto`
--

CREATE TABLE `entrega_bulto` (
  `id_bulto` int UNSIGNED NOT NULL,
  `fecha_entrega` timestamp NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrega_paquete`
--

CREATE TABLE `entrega_paquete` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_entrega` timestamp NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gestiona`
--

CREATE TABLE `gestiona` (
  `nombre_usuario` varchar(32) NOT NULL,
  `id_almacen` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gestiona_fin`
--

CREATE TABLE `gestiona_fin` (
  `nombre_usuario` varchar(32) NOT NULL,
  `id_almacen` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maneja`
--

CREATE TABLE `maneja` (
  `nombre_usuario` varchar(32) NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maneja_fin`
--

CREATE TABLE `maneja_fin` (
  `nombre_usuario` varchar(32) NOT NULL,
  `id_camion` int UNSIGNED NOT NULL,
  `fecha_inicio` timestamp NOT NULL,
  `fecha_fin` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int UNSIGNED NOT NULL,
  `peso` int UNSIGNED NOT NULL,
  `volumen` int UNSIGNED NOT NULL,
  `fecha_despacho` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paquete_para_entregar`
--

CREATE TABLE `paquete_para_entregar` (
  `id_paquete` int UNSIGNED NOT NULL,
  `codigo_ṕostal` varchar(8) NOT NULL,
  `calle` varchar(32) NOT NULL,
  `nro_puerta` varchar(8) NOT NULL,
  `observaciones_direccion` varchar(256) NOT NULL,
  `latitud` decimal(8,6) NOT NULL,
  `longitud` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paquete_para_recoger`
--

CREATE TABLE `paquete_para_recoger` (
  `id_paquete` int UNSIGNED NOT NULL,
  `id_almacen` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paquete_recogido`
--

CREATE TABLE `paquete_recogido` (
  `id_paquete` int UNSIGNED NOT NULL,
  `fecha_recogido` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(32) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idioma_favorito` char(2) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `calle` varchar(32) NOT NULL,
  `nro_puerta` varchar(8) NOT NULL,
  `observaciones_direccion` varchar(256) NOT NULL,
  `latitud` decimal(8,6) NOT NULL,
  `longitud` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_telefono`
--

CREATE TABLE `usuario_telefono` (
  `nombre_usuario` varchar(32) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- Indexes for table `almaceneros`
--
ALTER TABLE `almaceneros`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- Indexes for table `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indexes for table `almacen_contiene_bulto`
--
ALTER TABLE `almacen_contiene_bulto`
  ADD PRIMARY KEY (`id_bulto`,`fecha_inicio`),
  ADD KEY `ALMACEN_CONTIENE_BULTO FK ALMACENES` (`id_almacen`);

--
-- Indexes for table `almacen_contiene_bulto_fin`
--
ALTER TABLE `almacen_contiene_bulto_fin`
  ADD KEY `ALMACEN_CONTIENE_BULTO_FIN FK ALMACEN_CONTIENE_BULTO` (`id_bulto`,`fecha_inicio`);

--
-- Indexes for table `almacen_contiene_paquete`
--
ALTER TABLE `almacen_contiene_paquete`
  ADD PRIMARY KEY (`id_paquete`,`fecha_inicio`),
  ADD KEY `ALMACEN_CONTIENE_PAQUETE FK ALMACENES` (`id_almacen`);

--
-- Indexes for table `almacen_contiene_paquete_fin`
--
ALTER TABLE `almacen_contiene_paquete_fin`
  ADD PRIMARY KEY (`id_paquete`,`fecha_inicio`);

--
-- Indexes for table `bultos`
--
ALTER TABLE `bultos`
  ADD PRIMARY KEY (`id_bulto`),
  ADD KEY `BULTOS FK ALMACENES` (`destino`);

--
-- Indexes for table `bultos_desarmados`
--
ALTER TABLE `bultos_desarmados`
  ADD PRIMARY KEY (`id_bulto`);

--
-- Indexes for table `bulto_contiene`
--
ALTER TABLE `bulto_contiene`
  ADD PRIMARY KEY (`id_paquete`,`fecha_inicio`) USING BTREE,
  ADD KEY `BULTO_CONTIENE FK BULTOS` (`id_bulto`);

--
-- Indexes for table `bulto_contiene_fin`
--
ALTER TABLE `bulto_contiene_fin`
  ADD PRIMARY KEY (`id_paquete`,`fecha_inicio`);

--
-- Indexes for table `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`id_camion`);

--
-- Indexes for table `carga_bulto`
--
ALTER TABLE `carga_bulto`
  ADD PRIMARY KEY (`id_bulto`,`id_camion`,`fecha_inicio`),
  ADD KEY `CARGA_BULTO FK CAMIONES` (`id_camion`);

--
-- Indexes for table `carga_bulto_fin`
--
ALTER TABLE `carga_bulto_fin`
  ADD PRIMARY KEY (`id_bulto`,`id_camion`,`fecha_inicio`);

--
-- Indexes for table `carga_paquete`
--
ALTER TABLE `carga_paquete`
  ADD PRIMARY KEY (`id_paquete`,`id_camion`,`fecha_inicio`),
  ADD KEY `CARGA_PAQUETE FK CAMIONES` (`id_camion`);

--
-- Indexes for table `carga_paquete_fin`
--
ALTER TABLE `carga_paquete_fin`
  ADD PRIMARY KEY (`id_paquete`,`id_camion`,`fecha_inicio`);

--
-- Indexes for table `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- Indexes for table `entrega_bulto`
--
ALTER TABLE `entrega_bulto`
  ADD PRIMARY KEY (`id_bulto`),
  ADD KEY `ENTREGA_BULTO FK MANEJA` (`nombre_usuario`,`id_camion`,`fecha_inicio`);

--
-- Indexes for table `entrega_paquete`
--
ALTER TABLE `entrega_paquete`
  ADD PRIMARY KEY (`id_paquete`),
  ADD KEY `ENTREGA_PAQUETE FK MANEJA` (`nombre_usuario`,`id_camion`,`fecha_inicio`);

--
-- Indexes for table `gestiona`
--
ALTER TABLE `gestiona`
  ADD PRIMARY KEY (`nombre_usuario`,`id_almacen`,`fecha_inicio`),
  ADD KEY `GESTIONA FK ALMACENES` (`id_almacen`);

--
-- Indexes for table `gestiona_fin`
--
ALTER TABLE `gestiona_fin`
  ADD KEY `GESTIONA_FIN FK GESTIONA` (`nombre_usuario`,`id_almacen`,`fecha_inicio`);

--
-- Indexes for table `maneja`
--
ALTER TABLE `maneja`
  ADD PRIMARY KEY (`nombre_usuario`,`id_camion`,`fecha_inicio`),
  ADD KEY `MANEJA FK CAMION` (`id_camion`);

--
-- Indexes for table `maneja_fin`
--
ALTER TABLE `maneja_fin`
  ADD PRIMARY KEY (`nombre_usuario`,`id_camion`,`fecha_inicio`);

--
-- Indexes for table `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indexes for table `paquete_para_entregar`
--
ALTER TABLE `paquete_para_entregar`
  ADD KEY `PAQUETE_PARA_ENTREGAR FK PAQUETES` (`id_paquete`);

--
-- Indexes for table `paquete_para_recoger`
--
ALTER TABLE `paquete_para_recoger`
  ADD PRIMARY KEY (`id_paquete`),
  ADD KEY `PAQUETE_PARA_RECOGER FK ALMACENES` (`id_almacen`);

--
-- Indexes for table `paquete_recogido`
--
ALTER TABLE `paquete_recogido`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- Indexes for table `usuario_telefono`
--
ALTER TABLE `usuario_telefono`
  ADD PRIMARY KEY (`nombre_usuario`,`telefono`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id_almacen` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bultos`
--
ALTER TABLE `bultos`
  MODIFY `id_bulto` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `camiones`
--
ALTER TABLE `camiones`
  MODIFY `id_camion` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `ADMINS FK USUARIOS` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `almaceneros`
--
ALTER TABLE `almaceneros`
  ADD CONSTRAINT `ALMACENEROS FK USUARIOS` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `almacen_contiene_bulto`
--
ALTER TABLE `almacen_contiene_bulto`
  ADD CONSTRAINT `ALMACEN_CONTIENE_BULTO FK ALMACENES` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ALMACEN_CONTIENE_BULTO FK BULTOS` FOREIGN KEY (`id_bulto`) REFERENCES `bultos` (`id_bulto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `almacen_contiene_bulto_fin`
--
ALTER TABLE `almacen_contiene_bulto_fin`
  ADD CONSTRAINT `ALMACEN_CONTIENE_BULTO_FIN FK ALMACEN_CONTIENE_BULTO` FOREIGN KEY (`id_bulto`,`fecha_inicio`) REFERENCES `almacen_contiene_bulto` (`id_bulto`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `almacen_contiene_paquete`
--
ALTER TABLE `almacen_contiene_paquete`
  ADD CONSTRAINT `ALMACEN_CONTIENE_PAQUETE FK ALMACENES` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ALMACEN_CONTIENE_PAQUETE FK PAQUETES` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `almacen_contiene_paquete_fin`
--
ALTER TABLE `almacen_contiene_paquete_fin`
  ADD CONSTRAINT `ALMACEN_CONTIENE_PAQUETE_FIN FK ALMACEN_CONTIENE_PAQUETE` FOREIGN KEY (`id_paquete`,`fecha_inicio`) REFERENCES `almacen_contiene_paquete` (`id_paquete`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bultos`
--
ALTER TABLE `bultos`
  ADD CONSTRAINT `BULTOS FK ALMACENES` FOREIGN KEY (`destino`) REFERENCES `almacenes` (`id_almacen`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bultos_desarmados`
--
ALTER TABLE `bultos_desarmados`
  ADD CONSTRAINT `BULTOS_DESARMADOS FK  BULTOS` FOREIGN KEY (`id_bulto`) REFERENCES `bultos` (`id_bulto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bulto_contiene`
--
ALTER TABLE `bulto_contiene`
  ADD CONSTRAINT `BULTO_CONTIENE FK BULTOS` FOREIGN KEY (`id_bulto`) REFERENCES `bultos` (`id_bulto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `BULTO_CONTIENE FK PAQUETES` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bulto_contiene_fin`
--
ALTER TABLE `bulto_contiene_fin`
  ADD CONSTRAINT `BULTO_CONTIENE_FIN FK BULTO_CONTIENE` FOREIGN KEY (`id_paquete`,`fecha_inicio`) REFERENCES `bulto_contiene` (`id_paquete`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carga_bulto`
--
ALTER TABLE `carga_bulto`
  ADD CONSTRAINT `CARGA_BULTO FK BULTOS` FOREIGN KEY (`id_bulto`) REFERENCES `bultos` (`id_bulto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `CARGA_BULTO FK CAMIONES` FOREIGN KEY (`id_camion`) REFERENCES `camiones` (`id_camion`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carga_bulto_fin`
--
ALTER TABLE `carga_bulto_fin`
  ADD CONSTRAINT `CARGA_BULTO_FIN FK CARGA_BULTO` FOREIGN KEY (`id_bulto`,`id_camion`,`fecha_inicio`) REFERENCES `carga_bulto` (`id_bulto`, `id_camion`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carga_paquete`
--
ALTER TABLE `carga_paquete`
  ADD CONSTRAINT `CARGA_PAQUETE FK CAMIONES` FOREIGN KEY (`id_camion`) REFERENCES `camiones` (`id_camion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `CARGA_PAQUETE FK PAQUETES` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carga_paquete_fin`
--
ALTER TABLE `carga_paquete_fin`
  ADD CONSTRAINT `CARGA_PAQUETE_FIN FK CARGA_PAQUETE` FOREIGN KEY (`id_paquete`,`id_camion`,`fecha_inicio`) REFERENCES `carga_paquete` (`id_paquete`, `id_camion`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `choferes`
--
ALTER TABLE `choferes`
  ADD CONSTRAINT `CHOFERES FK USUARIOS` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `entrega_bulto`
--
ALTER TABLE `entrega_bulto`
  ADD CONSTRAINT `ENTREGA_BULTO FK BULTOS` FOREIGN KEY (`id_bulto`) REFERENCES `bultos` (`id_bulto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ENTREGA_BULTO FK MANEJA` FOREIGN KEY (`nombre_usuario`,`id_camion`,`fecha_inicio`) REFERENCES `maneja` (`nombre_usuario`, `id_camion`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `entrega_paquete`
--
ALTER TABLE `entrega_paquete`
  ADD CONSTRAINT `ENTREGA_PAQUETE FK MANEJA` FOREIGN KEY (`nombre_usuario`,`id_camion`,`fecha_inicio`) REFERENCES `maneja` (`nombre_usuario`, `id_camion`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ENTREGA_PAQUETE FK PAQUETE` FOREIGN KEY (`id_paquete`) REFERENCES `paquete_para_entregar` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gestiona`
--
ALTER TABLE `gestiona`
  ADD CONSTRAINT `GESTIONA FK ALMACENEROS` FOREIGN KEY (`nombre_usuario`) REFERENCES `almaceneros` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `GESTIONA FK ALMACENES` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gestiona_fin`
--
ALTER TABLE `gestiona_fin`
  ADD CONSTRAINT `GESTIONA_FIN FK GESTIONA` FOREIGN KEY (`nombre_usuario`,`id_almacen`,`fecha_inicio`) REFERENCES `gestiona` (`nombre_usuario`, `id_almacen`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `maneja`
--
ALTER TABLE `maneja`
  ADD CONSTRAINT `MANEJA FK CAMION` FOREIGN KEY (`id_camion`) REFERENCES `camiones` (`id_camion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `MANEJA FK CHOFERES` FOREIGN KEY (`nombre_usuario`) REFERENCES `choferes` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `maneja_fin`
--
ALTER TABLE `maneja_fin`
  ADD CONSTRAINT `MANEJA_FIN FK MANEJA` FOREIGN KEY (`nombre_usuario`,`id_camion`,`fecha_inicio`) REFERENCES `maneja` (`nombre_usuario`, `id_camion`, `fecha_inicio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `paquete_para_entregar`
--
ALTER TABLE `paquete_para_entregar`
  ADD CONSTRAINT `PAQUETE_PARA_ENTREGAR FK PAQUETES` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `paquete_para_recoger`
--
ALTER TABLE `paquete_para_recoger`
  ADD CONSTRAINT `PAQUETE_PARA_RECOGER FK ALMACENES` FOREIGN KEY (`id_almacen`) REFERENCES `almacenes` (`id_almacen`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `PAQUETE_PARA_RECOGER FK PAQUETES` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `paquete_recogido`
--
ALTER TABLE `paquete_recogido`
  ADD CONSTRAINT `PAQUETE_RECOGIDO FK PAQUETE_PARA_RECOGER` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `usuario_telefono`
--
ALTER TABLE `usuario_telefono`
  ADD CONSTRAINT `USUARIO_TELEFONO FK USUARIOS` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
