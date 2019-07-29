-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2019 a las 08:17:21
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `idFormularios` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin NOT NULL,
  `numeroPregunta` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `formularios`
--

INSERT INTO `formularios` (`idFormularios`, `nombre`, `descripcion`, `numeroPregunta`, `voto`, `usuario`) VALUES
(2, 'formulario registro4', 'formulario de pruebas1', 5, 0, 1),
(3, 'formulario futbolero', 'Este formulario es para preguntas asociadas al deporte', 0, 0, 5),
(4, 'Productividad', 'Formulario destinado a los productos agricolas', 4, 0, 6),
(5, 'Ambiental', 'Formulario con respecto a la situacion ambiental actual', 4, 0, 6),
(7, 'formulario-pruebas', 'Formulario de tipo prueba', 2, 0, 1),
(8, 'formulario-l7', 'descripcion parse', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `idOpcion` int(11) NOT NULL,
  `texto` varchar(30) COLLATE utf8_bin NOT NULL,
  `pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`idOpcion`, `texto`, `pregunta`) VALUES
(5, '1,50', 16),
(6, '1,60', 16),
(7, 'mas de 1,70', 16),
(8, 'loc1', 18),
(9, 'loc2', 18),
(10, 'operacion1', 22),
(11, 'operacion2', 22),
(12, 'operacion3', 22),
(13, 'ingles', 23),
(14, 'frances', 23),
(15, 'aleman', 23),
(17, 'Yuca', 35),
(18, 'Platano', 35),
(19, 'Cafe', 35),
(20, 'Caña', 35),
(21, 'Canela', 38),
(22, 'Yuca', 38),
(23, 'Cacao', 38),
(24, 'Si', 39),
(25, 'peg2', 39),
(26, 'peg3', 40),
(27, 'peg4', 40),
(28, 'Tal vez', 40),
(29, 'Si', 42),
(30, 'No', 42),
(31, 'Poco', 44),
(32, 'Mucho', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPreguntas` int(11) NOT NULL,
  `textoPregunta` varchar(100) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(30) COLLATE utf8_bin NOT NULL,
  `requerido` varchar(30) COLLATE utf8_bin NOT NULL,
  `formulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPreguntas`, `textoPregunta`, `tipo`, `requerido`, `formulario`) VALUES
(16, 'que tan alto eres', 'seleccion', 'requerido', 2),
(18, 'localizacion', 'verificar', 'no requerido', 2),
(19, 'pregunta rapida', 'abierta', 'requerido', 2),
(22, 'pregunta9', 'seleccion', 'no requerido', 2),
(23, 'que lenguajes conoce', 'verificar', 'requerido', 2),
(35, 'Que bienes naturales comunes ', 'verificar', 'requerido', 4),
(36, 'Cuales son las principales fuentes de ingresos', 'abierta', 'requerido', 4),
(37, 'Cuando no hay actividad agropecuaria, a que se dedica', 'abierta', 'no requerido', 4),
(38, 'Que productos se comercializan en su propia region', 'verificar', 'no requerido', 4),
(39, 'nom', 'seleccion', 'requerido', 5),
(40, 'nom', 'seleccion', 'no requerido', 5),
(41, 'nom', 'abierta', 'requerido', 5),
(42, 'nom', 'seleccion', 'requerido', 5),
(43, 'que tan listo eres', 'abierta', 'requerido', 7),
(44, 'que tanto juegas fornite?', 'seleccion', 'requerido', 7),
(45, 'desarrollo', 'abierta', 'requerido', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(11) NOT NULL,
  `argumento` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuarioi` int(11) NOT NULL,
  `preguntai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idRespuesta`, `argumento`, `usuarioi`, `preguntai`) VALUES
(10, 'ahi maso', 1, 43),
(11, 'Mucho', 1, 44),
(12, 'un poco listo', 4, 43),
(13, 'Poco', 4, 44),
(14, '1,60', 4, 16),
(15, 'loc1', 4, 18),
(16, 'hola que tal1', 4, 19),
(18, 'Yuca', 4, 35),
(19, 'Platano', 4, 35),
(20, 'caña de azucar', 4, 36),
(21, 'comercio', 4, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(30) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `celular` bigint(11) NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(12) COLLATE utf8_bin NOT NULL,
  `contraAdmin` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `nombre`, `apellido`, `correo`, `celular`, `contraseña`, `fecha`, `sexo`, `contraAdmin`) VALUES
(1, 'Cris12', 'Cristiano', 'checa', 'felychk203@hotmail.com', 220556, 'supersoldado', '2019-07-08', 'Masculino', 'admin12'),
(2, 'dani24', 'daniel', 'cortes', 'danielseguridad1232@gmail.com', 220455, 'locos', '1997-02-12', 'Masculino', ''),
(3, 'luis34', 'luis', 'aragones', 'des23@hotmail.com', 8453203, 'famili', '2019-07-22', 'Masculino', ''),
(4, 'roger23', 'roger', 'martinez', 'martinez522@gmail.com', 3122636553, 'dinner', '2019-07-31', 'Masculino', ''),
(5, 'Beni', 'benji', 'marquez', 'benji566@hotmail.com', 0, 'construccion12', '2019-07-31', 'Masculino', ''),
(6, 'luce10', 'lucero', 'mosquera', 'lucero433@hotmail.com', 3188554679, 'combi8', '2019-07-09', 'Femenino', ''),
(7, 'james28', 'james', 'tovar', 'james_6@gmail.com', 3218964332, 'iglesias', '2018-07-25', 'Masculino', ''),
(8, 'J29', 'jesus', 'tumbala', 'jesus291@gmail.com', 3145566876, 'ventana21', '2018-04-27', 'Masculino', ''),
(9, 'SulCam', 'sulema2', 'camayo', 'sulema66@gmail.com', 3112986710, 'sulema234', '2019-07-04', 'Femenino', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`idFormularios`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`idOpcion`),
  ADD KEY `pregunta` (`pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPreguntas`),
  ADD KEY `formulario` (`formulario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `preguntai` (`preguntai`),
  ADD KEY `usuarioi` (`usuarioi`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `idFormularios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `idOpcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPreguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`idPreguntas`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`formulario`) REFERENCES `formularios` (`idFormularios`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`preguntai`) REFERENCES `preguntas` (`idPreguntas`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`usuarioi`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
