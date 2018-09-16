-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2018 a las 08:46:20
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(11, 'proyecto1'),
(12, 'proyecto2'),
(16, 'proyecto3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(17, 1534315129, 'ayudas', 'user', 17, 'asyudas@gmail.com', '2mdksmdklm', 'unknown-picture.png', 'hola buen aporte amigo', 'pending'),
(18, 1534315241, 'ayudas', 'user', 17, 'asyudas@gmail.com', '2mdksmdklm', 'unknown-picture.png', 'hola buen aporte amigo', 'pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `image`) VALUES
(27, 'Facebook-Page-Cover-photo.png'),
(28, 'sohail card.jpg'),
(29, 'usman visiting cards.jpg'),
(30, 'visiting Card of nadeem.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`, `views`, `status`) VALUES
(11, 1454400657, 'otras', 'babar786', 'slider-img2.jpg', 'IMG_7939-min.JPG', 'proyecto2', 'jadslfjadlj', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>babar Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"media/visiting Card of nadeem.jpg\" alt=\"visiting Card of nadeem.jpg\" width=\"518\" height=\"296\" /></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', 7, 'publish'),
(15, 15082018, 'ciencia', 'babar786', 'slider-img2.jpg', 'DSC02127-min.JPG', 'proyecto3', 'ciencias', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>Muhammad BAbar</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.yorokobu.es/wp-content/uploads/ciencia-1.jpg\" alt=\"\" width=\"589\" height=\"331\" /></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSf2pU1JU_qcyDrKKmS8NZJf7w-qK213rxe3aliAcAb9RIC-MKY\" alt=\"\" width=\"238\" height=\"211\" /></p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.lifeder.com/wp-content/uploads/2017/04/aportes-fisica-ciencia-y-sociedad.jpg\" alt=\"\" width=\"754\" height=\"377\" /></p>\r\n</body>\r\n</html>', 6, 'publish'),
(16, 1534314602, 'informatica', 'david', 'IMG_20180429_103946.jpg', 'descarga.jpg', 'proyecto2', 'informatica', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://posgrado.fceia.unr.edu.ar/images/fotos/carreras/doctorados/Doctorado-en-Informatica-2.jpg\" alt=\"\" width=\"764\" height=\"349\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>La&nbsp;<strong>inform&aacute;tica</strong>, tambi&eacute;n llamada&nbsp;<strong>computaci&oacute;n</strong>,<sup id=\"cite_ref-1\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-1\">1</a></sup>â€‹ es una&nbsp;<a title=\"Ciencia\" href=\"https://es.wikipedia.org/wiki/Ciencia\">ciencia</a>&nbsp;que estudia m&eacute;todos, t&eacute;cnicas, procesos, con el fin de almacenar, procesar y transmitir&nbsp;<a title=\"Informaci&oacute;n\" href=\"https://es.wikipedia.org/wiki/Informaci%C3%B3n\">informaci&oacute;n</a>&nbsp;y&nbsp;<a title=\"Dato\" href=\"https://es.wikipedia.org/wiki/Dato\">datos</a>&nbsp;en formato&nbsp;<a title=\"Electr&oacute;nica digital\" href=\"https://es.wikipedia.org/wiki/Electr%C3%B3nica_digital\">digital</a>.</p>\r\n<p>No existe una definici&oacute;n consensuada sobre el t&eacute;rmino, lo cual puede comprenderse a trav&eacute;s de las Discusiones que acompa&ntilde;an esta p&aacute;gina. Sin embargo, la Asociaci&oacute;n de Docentes de Inform&aacute;tica y Computaci&oacute;n de la Rep&uacute;blica Argentina (<a class=\"external text\" href=\"http://adicra.com.ar/\" rel=\"nofollow\">ADICRA</a>) han tomado una posici&oacute;n, defini&eacute;ndola de la siguiente manera:</p>\r\n<blockquote>\r\n<p>\"La Inform&aacute;tica es la disciplina o campo de estudio que abarca el conjunto de conocimientos, m&eacute;todos y t&eacute;cnicas referentes al tratamiento autom&aacute;tico de la informaci&oacute;n, junto con sus teor&iacute;as y aplicaciones pr&aacute;cticas, con el fin de almacenar, procesar y transmitir datos e informaci&oacute;n en formato digital utilizando sistemas computacionales. Los datos son la materia prima para que, mediante su proceso, se obtenga como resultado informaci&oacute;n. &nbsp;Para ello, la inform&aacute;tica crea y/o emplea sistemas de procesamiento de datos, que incluyen medios f&iacute;sicos (hardware) en interacci&oacute;n con medios l&oacute;gicos (software) y las personas que los programan y/o los usan (humanware).<sup id=\"cite_ref-2\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-2\">2</a></sup>â€‹\"</p>\r\n</blockquote>\r\n<p>La inform&aacute;tica, que se ha desarrollado r&aacute;pidamente a partir de la segunda mitad del siglo XX con la aparici&oacute;n de tecnolog&iacute;as como el&nbsp;<a title=\"Circuito integrado\" href=\"https://es.wikipedia.org/wiki/Circuito_integrado\">circuito integrado</a>, el&nbsp;<a title=\"Internet\" href=\"https://es.wikipedia.org/wiki/Internet\">Internet</a>&nbsp;y el&nbsp;<a title=\"Telefon&iacute;a m&oacute;vil\" href=\"https://es.wikipedia.org/wiki/Telefon%C3%ADa_m%C3%B3vil\">tel&eacute;fono m&oacute;vil</a>,<sup id=\"cite_ref-3\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-3\">3</a></sup>â€‹ es la rama de la tecnolog&iacute;a que estudia el tratamiento autom&aacute;tico de la informaci&oacute;n.<sup id=\"cite_ref-4\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-4\">4</a></sup>â€‹<sup id=\"cite_ref-5\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-5\">5</a></sup>â€‹</p>\r\n<p>En 1957,&nbsp;<a title=\"Karl Steinbuch\" href=\"https://es.wikipedia.org/wiki/Karl_Steinbuch\">Karl Steinbuch</a>&nbsp;a&ntilde;adi&oacute; la palabra alemana&nbsp;<em>Informatik</em>&nbsp;en la publicaci&oacute;n de un documento denominado&nbsp;<em>Informatik: Automatische Informationsverarbeitung</em>&nbsp;(Inform&aacute;tica: procesamiento autom&aacute;tico de informaci&oacute;n).<sup id=\"cite_ref-patricio_6-0\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-patricio-6\">6</a></sup>â€‹ El sovi&eacute;tico&nbsp;<a class=\"mw-redirect\" title=\"Alexander Mikhailov\" href=\"https://es.wikipedia.org/wiki/Alexander_Mikhailov\">Alexander Ivanovich Mikhailov</a>&nbsp;fue el primero en utilizar&nbsp;<em>Informatik</em>&nbsp;con el significado de &laquo;estudio, organizaci&oacute;n, y diseminaci&oacute;n de la informaci&oacute;n cient&iacute;fica&raquo;, que sigue siendo su significado en dicha lengua.<sup id=\"cite_ref-patricio_6-1\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-patricio-6\">6</a></sup>â€‹ En ingl&eacute;s, la palabra&nbsp;<em>informatics</em>&nbsp;fue acu&ntilde;ada independiente y casi simult&aacute;neamente por Walter F. Bauer, en 1962, cuando Bauer cofund&oacute; la empresa Informatics General, Inc.<sup id=\"cite_ref-patricio_6-2\" class=\"reference separada\"><a href=\"https://es.wikipedia.org/wiki/Inform%C3%A1tica#cite_note-patricio-6\">6</a></sup>â€‹</p>\r\n</body>\r\n</html>', 1, 'publish'),
(17, 1534314922, 'musica actual', 'david2', 'descarga.jpg', 'hqdefault.jpg', 'proyecto2', 'en boga', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><iframe src=\"//www.youtube.com/embed/7qix3jy5QdA\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>&nbsp;</p>\r\n<p>No quiero que m&aacute;s nadie me hable de amor<br />Ya me canse, to\' esos trucos ya me los se<br />Esos dolores los pase, yeh yeh yeaah</p>\r\n<p>No quiero que m&aacute;s nadie me hable de amor<br />Ya me canse, to\' esos trucos ya me los se<br />Esos dolores los pase</p>\r\n<p>Hoy te odio no es secreto ante todo lo confieso<br />Si pudiera te pidiera que devuelvas to\' los besos que te di</p>\r\n<div class=\"player_teads\">&nbsp;</div>\r\n<p>Las palabras y todo el tiempo que perd&iacute;<br />Me arrepiento una\' mil vece\' de haber confiado en ti</p>\r\n</body>\r\n</html>', 3, 'publish');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$quickbrownfoxjumpsover'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`, `details`, `salt`) VALUES
(5, 1453895906, 'Luis', 'Guanolema', 'babar786', 'babar786@gmail.com', 'IMG_20171225_211554.jpg', '$2y$10$quickbrownfoxjumpsoveetLsQv.qJGuz1bGA2CJJWoaJSmf2nd9u', 'admin', 'hola soy el admin', '$2y$10$quickbrownfoxjumpsover'),
(11, 1454447938, 'xxxxxx', 'yyyyyyy', 'david2', 'jdalfdaj@gmail.com', 'descarga.jpg', '$2y$10$quickbrownfoxjumpsoveetLsQv.qJGuz1bGA2CJJWoaJSmf2nd9u', 'author', 'hola soy cliente', '$2y$10$quickbrownfoxjumpsover'),
(13, 1534314421, 'jose', 'j', 'david', 'da@gmail.com', 'IMG_20180429_103946.jpg', '$2y$10$quickbrownfoxjumpsoveetLsQv.qJGuz1bGA2CJJWoaJSmf2nd9u', 'author', '', '$2y$10$quickbrownfoxjumpsover');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
