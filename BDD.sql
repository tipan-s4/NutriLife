-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2021 a las 19:35:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` int(11) NOT NULL,
  `idEjercicio` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `minutos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `idEjercicio`, `idUser`, `fecha`, `minutos`) VALUES
(6, 2, 1, '2021-05-13', 7),
(7, 2, 1, '2021-05-13', 5),
(8, 2, 2, '2021-05-03', 5),
(13, 2, 1, '2021-05-13', 5),
(14, 2, 2, '2021-05-13', 2),
(18, 2, 2, '2021-05-16', 5),
(20, 2, 1, '2021-05-16', 5),
(21, 2, 1, '2021-05-16', 5),
(22, 2, 2, '2021-05-16', 1),
(23, 2, 1, '2021-05-16', 4),
(24, 3, 1, '2021-05-16', 5),
(25, 3, 1, '2021-05-16', 5),
(26, 3, 1, '2021-05-16', 5),
(28, 1, 2, '2021-05-16', 5),
(31, 1, 3, '2021-05-17', 4),
(33, 1, 2, '2021-05-17', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idalimentos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `calorias` int(11) NOT NULL,
  `hidratos` int(11) NOT NULL,
  `proteinas` int(11) NOT NULL,
  `grasas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`idalimentos`, `nombre`, `calorias`, `hidratos`, `proteinas`, `grasas`) VALUES
(1, 'Aceitunas', 115, 4, 1, 15),
(2, 'Aceite de Oliva', 234, 1, 2, 32),
(3, 'Donuts', 200, 21, 3, 12),
(4, 'Chocapic', 393, 5, 76, 9),
(5, 'Croissant', 455, 31, 39, 8),
(6, 'Galletas Maria', 450, 79, 8, 12),
(7, 'Spaguettis', 366, 74, 12, 2),
(8, 'Carne Picada', 182, 1, 17, 12),
(9, 'Leche', 34, 5, 3, 1),
(10, 'Filete de Pollo', 113, 0, 23, 3),
(11, 'Filete de Ternera', 229, 0, 30, 12),
(12, 'Pizza Barbacoa', 250, 30, 12, 9),
(13, 'Pizza 4 Quesos', 200, 35, 12, 10),
(14, 'Huevo', 74, 1, 7, 5),
(15, 'Costillas', 279, 0, 17, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cena`
--

CREATE TABLE `cena` (
  `idCena` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cena`
--

INSERT INTO `cena` (`idCena`, `idAlimento`, `idUser`, `fecha`, `cantidad`) VALUES
(1, 1, 2, '2021-05-17', 5),
(2, 2, 2, '2021-05-17', 434),
(3, 1, 2, '2021-05-17', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `idComida` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desayuno`
--

CREATE TABLE `desayuno` (
  `idDesayuno` int(11) NOT NULL,
  `idAlimento` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desayuno`
--

INSERT INTO `desayuno` (`idDesayuno`, `idAlimento`, `idUser`, `fecha`, `cantidad`) VALUES
(1, 1, 2, '2021-05-13', 100),
(2, 1, 2, '2021-05-12', 100),
(3, 4, 2, '2021-05-13', 100),
(4, 1, 2, '2021-05-16', 100),
(7, 1, 2, '2021-05-17', 100),
(9, 1, 2, '2021-05-17', 200),
(10, 1, 3, '2021-05-17', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `calorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`idEjercicios`, `nombre`, `calorias`) VALUES
(1, 'Maquina Eliptica', 11),
(2, 'Caminar', 4),
(3, 'Correr(trote)', 15),
(4, 'Correr(footing)', 20),
(5, 'Baloncesto', 10),
(6, 'Futbol', 8),
(7, 'Tenis', 9),
(8, 'Nadar', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useraux`
--

CREATE TABLE `useraux` (
  `edad` int(11) NOT NULL,
  `altura` double NOT NULL,
  `peso` int(11) NOT NULL,
  `pesoIdeal` int(11) NOT NULL,
  `genero` set('H','M') NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `useraux`
--

INSERT INTO `useraux` (`edad`, `altura`, `peso`, `pesoIdeal`, `genero`, `idUser`) VALUES
(34, 125, 45, 56, '', 2),
(34, 143, 54, 65, 'H', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `nombreUser` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `userPswd` varchar(128) NOT NULL,
  `auxForm` set('S','N') NOT NULL DEFAULT 'N',
  `admin` set('S','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `nombre`, `apellidos`, `nombreUser`, `email`, `userPswd`, `auxForm`, `admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '12345678', 'S', 'S'),
(2, 'Carlos', 'Tipan fdfdf', 'prueba', 'carlos@gmail.com', '$2y$10$dFVEbYcuz83DwvOBjSb.lOyrtFJZlJIOL.N7EztjsZYAdpanGJ7J2', 'S', 'N'),
(3, 'Carlos', 'dsad dasassad', 'prueba2', 'carlos.tipan.rodr@gmail.com', '$2y$10$1cuf5sThMqXgUWznnbQ6Pums2lVAMmSWQM//Ts45ZD2yd.V1mjVHa', 'S', 'N');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `idEjercicio` (`idEjercicio`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idalimentos`);

--
-- Indices de la tabla `cena`
--
ALTER TABLE `cena`
  ADD PRIMARY KEY (`idCena`),
  ADD KEY `alimento_idx` (`idAlimento`),
  ADD KEY `userCn_idx` (`idUser`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`idComida`),
  ADD KEY `alimentos_idx` (`idAlimento`),
  ADD KEY `user_idx` (`idUser`);

--
-- Indices de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD PRIMARY KEY (`idDesayuno`),
  ADD KEY `alimentoDe_idx` (`idAlimento`),
  ADD KEY `userDe_idx` (`idUser`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`idEjercicios`),
  ADD UNIQUE KEY `idejercicios_UNIQUE` (`idEjercicios`);

--
-- Indices de la tabla `useraux`
--
ALTER TABLE `useraux`
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cena`
--
ALTER TABLE `cena`
  MODIFY `idCena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `idComida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  MODIFY `idDesayuno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `idEjercicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicios` (`idEjercicios`) ON DELETE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cena`
--
ALTER TABLE `cena`
  ADD CONSTRAINT `alimentoCn` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE CASCADE,
  ADD CONSTRAINT `userCn` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comida`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `aliemntoC` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE CASCADE,
  ADD CONSTRAINT `userC` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD CONSTRAINT `alimentoDe` FOREIGN KEY (`idAlimento`) REFERENCES `alimentos` (`idalimentos`) ON DELETE CASCADE,
  ADD CONSTRAINT `userDe` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `useraux`
--
ALTER TABLE `useraux`
  ADD CONSTRAINT `useraux_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
