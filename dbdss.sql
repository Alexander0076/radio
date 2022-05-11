-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 01:05:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbdss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `Id_artista` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nombreartista` varchar(60) NOT NULL,
  `descripcion` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`Id_artista`, `img`, `nombreartista`, `descripcion`) VALUES
(1, 'michale_jackson.jpg', 'Michael Jackson', 'Nacido el 29 de agosto de 1958 en Gary, Indiana (Estados Unidos), Michael Joseph Jackson era el séptimo de los nueve hijos de Joseph y Katherine Jackson. Comenzó su carrera siendo sólo un niño de 11 años junto a sus hermanos en los Jackson Five, con quienes lanzó temas de éxito como I Want You Back o ABC.\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Id_comentario` int(11) NOT NULL,
  `comentario` varchar(50) NOT NULL,
  `Fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Id_usuario` int(11) NOT NULL,
  `Id_musica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `Id_eventos` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `fecha_evento` date NOT NULL,
  `Fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`Id_eventos`, `img`, `titulo`, `descripcion`, `Id_usuario`, `fecha_evento`, `Fecha_publicacion`) VALUES
(1, 'yxy.jpg', 'Pollo loco', 'Venta de panes con pollo en el Salvador del mundo', 2, '2022-04-27', '2022-05-09 08:56:00'),
(2, 'mercury.jpg', 'Maratón de Fredy', 'nulyllo', 2, '2022-05-10', '2022-05-10 18:41:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id_genero` int(11) NOT NULL,
  `genero` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id_genero`, `genero`) VALUES
(1, 'Pop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `Id_musica` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `cancion` varchar(255) NOT NULL,
  `duracion` varchar(20) NOT NULL,
  `Id_genero` int(11) NOT NULL,
  `Id_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`Id_musica`, `img`, `Nombre`, `cancion`, `duracion`, `Id_genero`, `Id_artista`) VALUES
(1, 'michale_jackson.jpg', 'Billie Jean', 'm1.pm3', '4:54', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `Id_tipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`Id_tipoUsuario`, `tipoUsuario`) VALUES
(1, 'Usuario'),
(2, 'Staff'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `Id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Nombre`, `Foto`, `usuario`, `contrasena`, `Id_tipousuario`) VALUES
(1, 'alex', NULL, 'alex.e', '123', 1),
(2, 'elias', 'will.jpg', 'elias.v', '123', 2),
(3, 'Alexander Ulises', NULL, 'usu1', '1234', 1),
(4, 'Alexander Ulises', NULL, 'usu1', '1234', 1),
(5, 'Alexander Elias', NULL, 'usuario2', '1234', 1),
(6, 'Alexander Elias', NULL, 'usuario2', '1234', 1),
(7, 'Cuarto tanque', NULL, 'asas', '123', 1),
(8, 'presta', NULL, 'usuario3', '123', 1),
(9, 'presta', NULL, 'usuario3', '123', 1),
(10, 'sfsdfsf', NULL, 'Santos1', '123', 1),
(11, 'Jason Sosa', NULL, 'santos2', '123', 1),
(12, 'Jason Sosa', NULL, 'santos2', '123', 1),
(13, 'Pepe Zarroza ', NULL, 'usu12', '1234', 1),
(14, 'ssa', NULL, 'prestashopdgc@mail.com', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`Id_artista`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Id_comentario`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_musica` (`Id_musica`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`Id_eventos`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id_genero`);

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`Id_musica`),
  ADD KEY `Id_genero` (`Id_genero`),
  ADD KEY `Id_artista` (`Id_artista`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`Id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_tipousuario` (`Id_tipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `Id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Id_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `Id_eventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `Id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `Id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Id_musica`) REFERENCES `musica` (`Id_musica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`Id_genero`) REFERENCES `genero` (`Id_genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `musica_ibfk_2` FOREIGN KEY (`Id_artista`) REFERENCES `artista` (`Id_artista`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipousuario`) REFERENCES `tipousuario` (`Id_tipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
