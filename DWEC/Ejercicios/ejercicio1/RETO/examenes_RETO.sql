CREATE USER IF NOT EXISTS  'dwec_reto'@'localhost' IDENTIFIED BY 'dwec_reto';

GRANT USAGE ON * . * TO 'dwec_reto'@'localhost' IDENTIFIED BY 'dwec_reto' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS `dwec_examenes_reto` ;

GRANT ALL PRIVILEGES ON `dwec_examenes_reto` . * TO 'dwec_reto'@'localhost';

use  `dwec_examenes_reto`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dwec_ord2_t4ampliacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `nombre`) VALUES
('daw', 'Despliegue de Aplicaciones Web'),
('diw', 'Desarrollo de Interfaces Web'),
('dwec', 'Desarrollo Web en Entorno Cliente'),
('dwes', 'Desarrollo Web en Entorno Servidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `examen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sugerencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `examen`, `pregunta`,`sugerencia`) VALUES
(1, 'dwec', 'La estandarización de JavaScript es realizada por','Consulta los apuntes de estandarización, página 4'),
(2, 'dwec', 'En JavaScript, para finalizar un bucle de tipo \"for\" se recomienda usar','Consulta los apuntes de bucles'),
(3, 'dwec', 'En JavaScript, ¿cómo se escribe una sentencia condicional para comprobar que la variable \"i\" es distinta de 5?','Consulta los apuntes de condicionales, página 4'),
(4, 'dwec', 'En JavaScript, ¿cómo se escribe una sentencia condicional para comprobar que la variable \"i\" es igual a 5?','Consulta los apuntes de condicionales, página 4'),
(5, 'dwec', '¿Dónde se puede insertar código JavaScript en un documento HTML?','Consulta los apuntes de introducción, página 4'),
(6, 'dwec', 'En JavaScript, el operador para concatenar cadenas es','Consulta los apuntes de cadenas, página 4'),
(7, 'dwec', 'En JavaScript, ¿qué función se emplea para dividir una cadena en función de un separador?','Consulta los apuntes de cadenas, página 4'),
(8, 'dwec', 'En JavaScript, respecto a la declaración de variables','Consulta los apuntes de variables, página 4'),
(9, 'dwec', 'En JavaScript, ¿cuál es la forma correcta de crear un array?','Consulta los apuntes de arrays, página 4'),
(10, 'dwec', 'En JavaScript, ¿cómo se define una función llamada \"miFuncion\"?','Consulta los apuntes de funciones, página 4'),
(11, 'dwes', 'En PHP, para obtener el tamaño de un fichero se emplea la función','Consulta los apuntes de ficheros, página 4'),
(12, 'dwes', 'En PHP, ¿qué función se emplea para convertir una cadena a minúsculas?','Consulta los apuntes de cadenas, página 4'),
(13, 'dwes', 'En PHP, cuando se incluye un fichero con include o require','Consulta los apuntes de ficheros, página 4'),
(14, 'dwes', 'En PHP, al subir un fichero, ¿qué propiedad de $_FILES almacena el tamaño del fichero subido?','Consulta los apuntes de ficheros, página 4'),
(15, 'dwes', 'En PHP, ¿un objeto de una clase puede acceder a la parte privada de otro objeto de la misma clase?','Consulta los apuntes de objetos, página 4'),
(16, 'dwes', 'Un constructor es un tipo especial de','Consulta los apuntes de objetos, página 4'),
(17, 'dwes', 'En PHP, ¿cómo se obtiene la información de un formulario que ha sido enviado mediante el método \"get\"?','Consulta los apuntes de formularios, página 4'),
(18, 'dwes', 'En PHP, ¿qué función se emplea para realizar una redirección?','Consulta los apuntes de PHP, página 4'),
(19, 'dwes', 'En PHP, ¿cómo se genera un número aleatorio?','Consulta los apuntes de funciones, página 4'),
(20, 'dwes', 'Cuando un cliente web envía la información de un formulario al servidor','Consulta los apuntes de formularios, página 4'),
(21, 'diw', 'Indica cuál es el código CSS que define un borde de un elemento de 2 píxeles de ancho, de color negro y punteado','Consulta los apuntes de CSS, página 4'),
(22, 'diw', 'Indica cuál es el código CSS que define un texto en rojo, con el tipo de letra Arial y el tamaño 14 pixels','Consulta los apuntes de CSS, página 4'),
(23, 'diw', '¿Cuál es el lugar correcto en un documento HTML para hacer referencia a una hoja de estilo externa?','Consulta los apuntes de HTML, página 4'),
(24, 'diw', '¿Cómo se define un color de fondo para todas las etiquetas <h1> en CSS?','Consulta los apuntes de CSS, página 4'),
(25, 'diw', 'En CSS3, ¿con qué propiedad se define la transparencia de un elemento?','Consulta los apuntes de CSS, página 4'),
(26, 'diw', '¿Cómo se inserta un comentario en CSS?','Consulta los apuntes de CSS, página 4'),
(27, 'diw', 'En CSS, ¿qué pseudo clase se emplea para definir una propiedad cuando el cursor del ratón se sitúa sobre un elemento?','Consulta los apuntes de CSS, página 4'),
(28, 'diw', '¿Cómo se hace en CSS para que el símbolo de los elementos de una lista sea un cuadrado?','Consulta los apuntes de CSS, página 4'),
(29, 'diw', 'En CSS, ¿cómo se escribe un selector para que una regla se aplique a todos los párrafos que sean descendientes directos (hijos) de un elemento artículo (article)?','Consulta los apuntes de CSS, página 4'),
(30, 'diw', '¿Cómo se hace en CSS para que un enlace se muestre sin el subrayado?','Consulta los apuntes de CSS, página 4'),
(31, 'daw', 'El servidor de páginas web Apache es un claro ejemplo de una aplicación cliente-servidor, donde el equipo servidor contará con éste programa (Apache), mientras que los equipos clientes deben contar con:','Consulta los apuntes de cadenas, página 4'),
(32, 'daw', 'HTTP es un protocolo “sin estado”, esto quiere decir que','Consulta los apuntes de HTTP, página 4'),
(33, 'daw', ' El protocolo HTTP trabaja sobre el puerto 80, pero Apache2 dispone de la opción de utilizar las librerías SSL para aumentar la seguridad obteniendo el protocolo HTTPS, que trabaja en el puerto','Consulta los apuntes de HTTP, página 4'),
(34, 'daw', 'Si queremos que nuestro servidor Apache2 reconozca los documentos con la extensión “.shtml” con más prioridad que los que poseen la extensión “.php” o “.html”, tendremos que modificar el archivo:','Consulta los apuntes de Apache, página 4'),
(35, 'daw', ' El \"Hosting virtual basado en direcciones IP\" consiste en identificar el dominio virtual a utilizar según','Consulta los apuntes de Apache, página 4'),
(36, 'daw', '6- El directorio en el que se alojarán los archivos de configuración correspondientes a los distintos dominios virtuales activos es','Consulta los apuntes de Apache, página 4'),
(37, 'daw', 'Que diferencia existe entre un certificado autofirmado y un certificado emitido por la FNMT (Fábrica Nacional de Moneda y Timbre).','Consulta los apuntes de Apache, página 4'),
(38, 'daw', 'El servidor Apache y el servidor de Microsoft (IIS) son los preferidos en los equipos existentes en la red, pero ¿Cual es el tercer servidor de páginas web más utilizado?','Consulta los apuntes de Apache, página 4'),
(39, 'daw', 'El alojamiento dedicado tiene...','Consulta los apuntes de Apache, página 4'),
(40, 'daw', 'Cuál de estos programas permite la gestión de la transferencia de ficheros con el alojamiento web','Consulta los apuntes de cadenas, página 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `texto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correcta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta`, `texto`, `correcta`) VALUES
(41, 11, 'file()', 0),
(42, 11, 'filesize()', 1),
(43, 11, 'fsize()', 0),
(44, 11, 'f_size()', 0),
(45, 12, 'lower()', 0),
(46, 12, 'tolower()', 0),
(47, 12, 'strtolower()', 1),
(48, 12, 'str2lower()', 0),
(49, 13, 'El fichero incluido debe tener la extensión \".inc\" ', 0),
(50, 13, 'El fichero incluido debe tener únicamente código PHP ', 0),
(51, 13, 'El fichero incluido debe estar situado en el mismo directorio que el fichero desde donde se incluye ', 0),
(52, 13, 'Todas las respuestas son falsas', 1),
(53, 14, 'size', 1),
(54, 14, 'value', 0),
(55, 14, 'file', 0),
(56, 14, 'length', 0),
(57, 15, 'Sí, siempre', 1),
(58, 15, 'Sí, si los dos objetos se han declarado en el mismo contexto', 0),
(59, 15, 'No, sólo puede acceder a la parte protegida', 0),
(60, 15, 'No, no puede acceder ni a la parte protegida ni a la privada ', 0),
(61, 16, 'Clase', 0),
(62, 16, 'Método', 1),
(63, 16, 'Objeto', 0),
(64, 16, 'Variable', 0),
(65, 17, '$_URL[]', 0),
(66, 17, '$_GET[]', 1),
(67, 17, '$_FORM[]', 0),
(68, 17, 'Todas las respuestas son falsas', 0),
(69, 18, 'header()', 1),
(70, 18, 'redirect()', 0),
(71, 18, 'send()', 0),
(72, 18, 'Todas las respuestas son falsas', 0),
(73, 19, 'rnd()', 0),
(74, 19, 'round()', 0),
(75, 19, 'rand()', 1),
(76, 19, 'Todas las respuestas son falsas', 0),
(77, 20, 'Las distintas parejas campo=valor se separan por espacios en blanco', 0),
(78, 20, 'Las distintas parejas campo=valor se separan por \"&\" ', 0),
(79, 20, 'Las distintas parejas campo=valor se separan por \"+\"', 0),
(80, 20, 'Las distintas parejas campo=valor se separan por \"?\" ', 0),
(81, 21, 'border: 2px double #000000; ', 0),
(82, 21, 'border: 2px dashed #000000; ', 0),
(83, 21, 'border: 2px solid #000000; ', 0),
(84, 21, 'border: 2px dotted #000000; ', 1),
(85, 22, 'font-family: Arial; size: 14px; color: #FF0000; ', 0),
(86, 22, 'font-family: Arial; font-size: 14px; color: #FF0000;', 1),
(87, 22, ' text-family: Arial; font-size: 14px; color: #FF0000;', 0),
(88, 22, 'font-family: Arial; font-size: 14px; text-color: #00FF00;', 0),
(89, 23, 'Al principio del documento ', 0),
(90, 23, 'En la sección <head> ', 1),
(91, 23, 'En la sección <body> ', 0),
(92, 23, 'Al final del documento', 0),
(93, 24, 'h1.all {background-color:#FFFFFF} ', 0),
(94, 24, 'all.h1 {background-color:#FFFFFF} ', 0),
(95, 24, 'h1 {background-color:#FFFFFF}', 1),
(96, 24, 'h1.* {background-color:#FFFFFF}', 0),
(97, 25, 'opacity ', 1),
(98, 25, 'transparency ', 0),
(99, 25, 'visibility ', 0),
(100, 25, 'Todas las respuestas son falsas', 0),
(101, 26, ' # esto es un comentario ', 0),
(102, 26, ' // esto es un comentario ', 0),
(103, 26, '/* esto es un comentario */ ', 1),
(104, 26, 'Todas las respuestas son falsas', 0),
(105, 27, ':active', 0),
(106, 27, ':hover', 1),
(107, 27, ':over', 0),
(108, 27, ':on', 0),
(109, 28, 'type: square', 0),
(110, 28, 'list-type: square', 0),
(111, 28, 'style-list: square', 0),
(112, 28, 'list-style-type: square', 1),
(113, 29, 'article p', 0),
(114, 29, 'article,p', 0),
(115, 29, 'article>p ', 1),
(116, 29, 'article+p', 0),
(117, 30, 'a {text-decoration:none} ', 1),
(118, 30, 'a {underline:no-underline} ', 0),
(119, 30, 'a {underline:none}  ', 0),
(120, 30, 'a {text-decoration:no-underline}', 0),
(121, 1, 'ECMA', 1),
(122, 1, 'Mozilla', 0),
(123, 1, 'The Script Consortium', 0),
(124, 1, 'W3C', 0),
(125, 2, 'No se puede', 0),
(126, 2, 'Exit for', 0),
(127, 2, 'break', 0),
(128, 2, 'Todas las respuestas son falsas', 1),
(129, 3, 'if(i <> 5)', 0),
(130, 3, ' if(i != 5)', 1),
(131, 3, ' if i <> 5 ', 0),
(132, 3, 'if i != 5', 0),
(133, 4, 'if i=5 then', 0),
(134, 4, ' if(i=5)', 0),
(135, 4, ' if i==5 then', 0),
(136, 4, 'if (i==5)', 1),
(137, 5, 'Solo en la cabecera', 0),
(138, 5, 'Solo en el body', 0),
(139, 5, 'Tanto en la cabecera como en el body', 1),
(140, 5, 'Si el código está en un fichero aparte, solo en el body', 0),
(141, 6, '&', 0),
(142, 6, '+', 1),
(143, 6, '.', 0),
(144, 6, 'Todas son falsas', 0),
(145, 7, 'match()', 0),
(146, 7, 'replace()', 1),
(147, 7, 'splice()', 0),
(148, 7, 'split()', 0),
(149, 8, 'Siempre hay que declarar las variables ', 0),
(150, 8, 'Se puede forzar la declaración con Option Implicit ', 0),
(151, 8, 'Se declaran con la palabra reservada Dim ', 0),
(152, 8, 'Todas las respuestas son falsas', 1),
(153, 9, 'var txt = new Array:1=(\"tim\"),2=(\"kim\"),3=(\"jim\")', 0),
(154, 9, 'var txt = new Array(1=\"tim\",2=\"kim\",3=\"jim\") ', 0),
(155, 9, 'var txt = new Array(\"tim\",\"kim\",\"jim\") ', 1),
(156, 9, 'var txt = new Array(1:\"tim\",2:\"kim\",3:\"jim\")', 0),
(157, 10, 'function:miFuncion(){...}', 0),
(158, 10, ' function->miFuncion(){...} ', 0),
(159, 10, ' function miFuncion(){...}', 1),
(160, 10, 'Todas las respuestas son falsas', 0),
(161, 31, 'Sistema operativo multiusuario', 0),
(162, 31, 'Módulo de PHP', 0),
(163, 31, 'Navegador Web', 1),
(164, 31, 'Todas las respuestas son falsas', 0),
(165, 32, 'Que mantiene el mismo estado aunque se reinicie la comunicación', 0),
(166, 32, 'Que no guarda información sobre conexiones anteriores', 1),
(167, 32, 'Que no almacena información de registro', 0),
(168, 32, 'Todas las respuestas son falsas', 0),
(169, 33, '443', 1),
(170, 33, '445', 0),
(171, 33, '465', 0),
(172, 33, '654', 0),
(173, 34, 'dir.conf', 1),
(174, 34, 'apache2.conf', 0),
(175, 34, 'auth.conf', 0),
(176, 34, 'Todas las respuestas son falsas', 0),
(177, 35, 'La dirección IP de la conexión.', 1),
(178, 35, 'El nombre de dominio de la conexión.', 0),
(179, 35, 'El puerto utilizado para la conexión.', 0),
(180, 35, 'Todas las respuestas son falsas', 0),
(181, 36, 'sites-enabled', 1),
(182, 36, 'sites-active', 0),
(183, 36, 'sites-available', 0),
(184, 36, 'Todas las respuestas son falsas', 0),
(185, 37, 'Ninguna, ambos son idénticos.', 0),
(186, 37, 'El coste del certificado y la autenticación en los navegadores. ', 1),
(187, 37, 'El coste del certificado', 0),
(188, 37, 'Todas las respuestas son falsas', 0),
(189, 38, 'Sun', 0),
(190, 38, 'NCSA', 0),
(191, 38, 'Nginx', 1),
(192, 38, 'Todas las respuestas son falsas', 0),
(193, 39, 'Muchos clientes a la vez y proporciona una IP fija', 0),
(194, 39, 'Precios más bajos', 0),
(195, 39, 'Un servidor para cada cliente ', 1),
(196, 39, 'Todas las respuestas son falsas', 0),
(197, 40, 'Filezilla', 1),
(198, 40, 'Google Chrome', 0),
(199, 40, 'Audacity', 0),
(200, 40, 'Transfer', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen_2` (`examen`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta_2` (`pregunta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`examen`) REFERENCES `examenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
