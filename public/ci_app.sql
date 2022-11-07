-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: database
-- Tiempo de generación: 03-11-2022 a las 18:18:48
-- Versión del servidor: 5.7.40
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ci_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alternatives`
--

CREATE TABLE `Alternatives` (
  `idalternative` int(50) NOT NULL,
  `Alternative` varchar(250) NOT NULL,
  `Correct` int(20) NOT NULL,
  `Question_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Alternatives`
--

INSERT INTO `Alternatives` (`idalternative`, `Alternative`, `Correct`, `Question_id`) VALUES
(1, 'Reunión de seguimiento, planning , retrospectiva , status de proyecto', 0, 1),
(2, 'Sprint,Planning,Daily,Review,Retrospectiva', 1, 1),
(3, 'Reunión de seguimiento, Daily , Planning, Reposición', 0, 1),
(4, 'Ninguna de las anteriores', 0, 1),
(5, 'Habilitar los pilares vitales de transparencia e inspección. Crear regularidad y minimizar la necesidad de reuniones no definidas en Scrum. Todos son bloques de tiempo (Time-box)', 0, 2),
(6, 'Habilitar los pilares vitales de transparencia e inspección. No crear regularidad y minimizar la necesidad de reuniones no definidas en Scrum. Todos son bloques de tiempo (Time-box)', 0, 2),
(7, 'Habilitar los pilares vitales de transparencia e inspección. Crear regularidad y minimizar la necesidad de reuniones no definidas en Scrum. Algunos son bloques de tiempo (Time-box)', 0, 2),
(8, 'No habilitar los pilares vitales de transparencia e inspección. Crear regularidad y minimizar la necesidad de reuniones no definidas en Scrum. Algunos son bloques de tiempo (Time-box)', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Answers`
--

CREATE TABLE `Answers` (
  `idanswers` int(250) NOT NULL,
  `exam_id` int(200) NOT NULL,
  `question_id` int(200) NOT NULL,
  `alternative_id` int(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Exam`
--

CREATE TABLE `Exam` (
  `idexam` int(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `descript` varchar(250) NOT NULL,
  `string_exam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Exam`
--

INSERT INTO `Exam` (`idexam`, `name`, `descript`, `string_exam`) VALUES
(1, 'Curso Scrum Master', 'Examen para certificación Scrum Foundation Certiprof', 'scrum'),
(2, 'Curso Product Owner', 'Test para Candidatos a Product Owners', 'po'),
(3, 'Certificacion OKR', 'Test para Certificacion de OKR', 'okr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Intents`
--

CREATE TABLE `Intents` (
  `idintent` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_intent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Questions`
--

CREATE TABLE `Questions` (
  `idquestion` int(11) NOT NULL,
  `Question` varchar(250) NOT NULL,
  `id_exam` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Questions`
--

INSERT INTO `Questions` (`idquestion`, `Question`, `id_exam`) VALUES
(1, 'En Scrum ¿Cuales son los Eventos que se proponen en el marco de trabajo ágil? ', 1),
(2, 'Identifique el enunciado correcto en relación a los eventos de Scrum', 1),
(3, 'En un equipo Scrum (Scrum Team) se encuentran los siguientes roles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `idUser` int(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alternatives`
--
ALTER TABLE `Alternatives`
  ADD PRIMARY KEY (`idalternative`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Indices de la tabla `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`idanswers`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `alternative_id` (`alternative_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `Exam`
--
ALTER TABLE `Exam`
  ADD PRIMARY KEY (`idexam`);

--
-- Indices de la tabla `Intents`
--
ALTER TABLE `Intents`
  ADD PRIMARY KEY (`idintent`);

--
-- Indices de la tabla `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`idquestion`),
  ADD KEY `id_exam` (`id_exam`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Alternatives`
--
ALTER TABLE `Alternatives`
  MODIFY `idalternative` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Answers`
--
ALTER TABLE `Answers`
  MODIFY `idanswers` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Exam`
--
ALTER TABLE `Exam`
  MODIFY `idexam` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Intents`
--
ALTER TABLE `Intents`
  MODIFY `idintent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Questions`
--
ALTER TABLE `Questions`
  MODIFY `idquestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int(250) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alternatives`
--
ALTER TABLE `Alternatives`
  ADD CONSTRAINT `Alternatives_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `Questions` (`idquestion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `Answers_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `Exam` (`idexam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `Questions` (`idquestion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Answers_ibfk_3` FOREIGN KEY (`alternative_id`) REFERENCES `Alternatives` (`idalternative`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Answers_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `Users` (`idUser`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `Questions_ibfk_1` FOREIGN KEY (`id_exam`) REFERENCES `Exam` (`idexam`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
