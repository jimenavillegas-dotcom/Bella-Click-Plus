-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2025 a las 03:18:07
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
-- Base de datos: `mercado_libre1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin1`
--

CREATE TABLE `admin1` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin1`
--

INSERT INTO `admin1` (`id_admin`, `nombre_admin`, `email_admin`, `password_admin`) VALUES
(2, 'Admin Principal', 'admin1@example.com', '$2y$10$8JeYncwKw27pbPgYZ/vN9eVKltMHIqm8Ewb/OiXGOeQwdQQCTr69O'),
(9, 'Admin Principal', 'admin0@gmail.com', '$2y$10$gW1K5/crm6VfFIi9ZhRMTOpxdHsO0XvUlu8wvD1waIhus.Fca2ocm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre_1` varchar(100) NOT NULL,
  `email_1` varchar(100) NOT NULL,
  `password_1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre_1`, `email_1`, `password_1`) VALUES
(1, 'admin', 'admin9@gmail.com', '$2y$10$oI4l8K7w2E7SG6STZLCNe.8KvF1dQ9VGjgxEgejCy1mldWw6Q2rxe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos_motos_y_otros`
--

CREATE TABLE `autos_motos_y_otros` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos_motos_y_otros`
--

INSERT INTO `autos_motos_y_otros` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(10, 'gloss', 'k', 600.00, 10, 1, '1757567624_glss1.jpeg'),
(21, 'gjkhu', 'h', 22.00, 2, 1, '1758518698_2.3.png'),
(22, 'Brillo Encantado de Fresa', 'Gloss hidratante con aroma a fresa y acabado brillante natural.', 65.00, 49, 1, '1762445565_descarga (1).jfif'),
(23, 'Labial Mágico Arcoíris', 'Cambia de color según el pH de tus labios, tono personalizado', 90.00, 190, 1, '1762445653_descarga (2).jfif'),
(24, 'Gloss Holográfico de Sirena', 'Brillo tornasolado con reflejos azulados y rosados, efecto 3D.', 110.00, 100, 1, '1762445710_descarga (3).jfif'),
(25, 'Brillo Miel Dorada', 'Hidratante con miel natural y brillo dorado suave.', 75.00, 127, 1, '1762445774_descarga (4).jfif'),
(26, 'Bálsamo Estelar Rosa Cosmos', 'Bálsamo con destellos plateados, ideal para labios secos.', 80.00, 799, 1, '1762445823_descarga (5).jfif'),
(27, 'Labial Líquido Encanto de Rubí', 'Rojo intenso con acabado satinado de larga duración.', 120.00, 120, 1, '1762445881_descarga (1).png'),
(28, 'Gloss Cristal de Luna', 'Transparente con partículas brillantes, resalta el color natural.', 85.00, 128, 1, '1762445938_descarga (6).jfif'),
(29, 'Brillo Dulce Unicornio', 'Gloss rosado con aroma a algodón de azúcar, efecto luminoso.', 95.00, 128, 1, '1762446004_descarga (7).jfif'),
(30, 'Labial Hidratante Beso de Cereza', 'Color cereza vibrante, enriquecido con vitamina E.', 89.00, 109, 1, '1762446081_descarga (8).jfif'),
(31, 'Brillo Frutal Melocotón Mágico', 'Brillo anaranjado con aroma frutal y efecto volumen.', 79.00, 128, 1, '1762446137_descarga (9).jfif'),
(32, 'Labial Místico Lavanda', 'Tonos lilas con acabado metálico, textura cremosa.', 115.00, 128, 1, '1762446186_descarga (10).jfif'),
(33, 'Gloss Solar Naranja Cálido', 'Efecto radiante, ideal para días soleados.', 70.00, 128, 1, '1762446252_descarga (11).jfif'),
(34, 'Brillo Encantado de Frambuesa', 'Gloss hidratante con pigmento rosado natural.', 68.00, 128, 1, '1762446301_descarga (12).jfif'),
(35, 'Labial Tornasol Aurora', 'Cambia de tono con la luz, de rosado a dorado.', 125.00, 218, 1, '1762446348_descarga (13).jfif'),
(36, 'Bálsamo Mágico con Glitter', 'Nutre los labios y deja un brillo con pequeñas chispas.', 85.00, 2134, 1, '1762446399_descarga (14).jfif'),
(37, 'Brillo Estrella de Mar Azul', 'Gloss con reflejos azul cielo y aroma tropical.', 99.00, 199, 1, '1762446463_descarga (15).jfif'),
(38, 'Labial Coral Encantado', 'Tono coral con acabado brillante y textura ligera.', 92.00, 198, 1, '1762446511_descarga (16).jfif'),
(39, 'Brillo Rosa Encantadora', 'Brillo clásico rosado con efecto espejo.', 70.00, 180, 1, '1762446579_descarga (17).jfif'),
(40, 'Blush Cremoso Durazno Suave', 'Rubor en crema de textura ligera, fácil de difuminar.', 110.00, 123, 1, '1762446860_descarga (19).jfif'),
(41, 'Tinte Natural Beso de Sol', 'Tinte líquido color melocotón con efecto luminoso.', 120.00, 123, 1, '1762446919_descarga (20).jfif'),
(42, 'Rubor Polvo Luz de Luna', 'Rosa perlado con partículas finas de brillo, acabado satinado.', 100.00, 123, 1, '1762446970_descarga (21).jfif'),
(43, 'Blush Tonalidad Coral Suave', 'Tono coral con acabado aterciopelado, resalta el rubor natural.', 115.00, 123, 1, '1762447023_descarga (22).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `usuario`, `id_producto`, `cantidad`) VALUES
(12, 'azteca', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Autos, Motos y otros'),
(2, 'Celulares y Telefonía'),
(3, 'Electrodomésticos'),
(4, 'Herramientas'),
(5, 'Ropa, bolsas y calzado'),
(6, 'Deportes y Fitness'),
(7, 'Computación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celulares_y_telefonia`
--

CREATE TABLE `celulares_y_telefonia` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `celulares_y_telefonia`
--

INSERT INTO `celulares_y_telefonia` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(11, 'prueba de tonos', 'hola', 1.00, 3, 2, '1758513954_HD-wallpaper-earth-north-america-south-america-continents-universe-earth-from-space-planet.jpg'),
(12, 'Rubor Rosa Pastel Encantado', 'Polvo suave con tono rosado claro, ideal para un acabado natural.', 90.00, 129, 2, '1762446756_descarga (18).jfif'),
(13, 'Rubor Cremoso Rosa Natural', 'Aporta un tono rosado cálido, enriquecido con manteca de karité.', 98.00, 123, 2, '1762447098_descarga (23).jfif'),
(14, 'Tinte Líquido Flor de Cerezo', 'Tinte con acabado translúcido, perfecto para mejillas sonrojadas.', 98.00, 123, 2, '1762447293_descarga (24).jfif'),
(15, 'Blush Hush - Rubores - Colección Completa', '¡Rubor! ¡No es ningún secreto! Tus rubores en polvo favoritos ahora tienen una fórmula nueva y mejorada 🌸 ¡Este set de rubores en polvo incluye tonos para tu glamour diario y algunos nuevos tonos especiales!', 1099.00, 123, 2, '1762447663_descarga (25).jfif'),
(16, 'Tokidoki X Beauty Creations- Trio De Rubores - Peach Blossom', 'Libera tu brillo interior con el Trío de Mejillas Peach Blossom, una encantadora colección que aporta un toque de magia tokidoki a tu rutina de maquillaje.', 324.00, 123, 2, '1762448099_descarga (26).jfif'),
(17, 'Rubor Líquido & Tinted Luxe Aceite De Labios - Caja PR Colección Completa', 'Consigue un rubor radiante con nuestro Rubor Líquido, que incluye 8 hermosos tonos de nuestro rubor líquido multiusos, recientemente mejorado. Diseñada para complementar cualquier tono de piel, esta colección completa es perfecta para amantes de la belleza, maquilladores o creadores de contenido que buscan explorar toda la gama de colores y resultados.', 2299.00, 123, 2, '1762448176_descarga (27).jfif'),
(18, 'Blush en Polvo Beso de Ángel', 'Tonalidad rosa bebé con textura sedosa.', 100.00, 123, 2, '1762448298_descarga (28).jfif'),
(19, 'Rubor en Barra Bruma de Melocotón', 'Barra cremosa de color melocotón pálido, práctica y duradera.', 115.00, 123, 2, '1762448352_descarga (29).jfif'),
(20, 'Tinte Rosado Delicado', 'Deja un rubor ligero, efecto segunda piel.', 89.00, 123, 2, '1762448392_descarga (30).jfif'),
(21, 'Blush Radiante Amanecer', 'Tono durazno con ligeros destellos dorados.', 110.00, 123, 2, '1762448431_descarga (31).jfif'),
(22, 'Rubor Polvo Rosa Champagne', 'Polvo fino de tono rosado con reflejos suaves.', 105.00, 121, 2, '1762448492_descarga (32).jfif'),
(23, 'Tinte Coral Delicado', 'Aporta color suave y uniforme con efecto de rubor natural.', 120.00, 123, 2, '1762449899_descarga (33).jfif'),
(24, 'Blush Suave Flor de Rosa', 'Aporta color suave y uniforme con efecto de rubor natural.', 120.00, 123, 2, '1762449913_descarga (33).jfif'),
(25, 'Blush Suave Flor de Rosa', 'Polvo compacto con pigmento natural, ideal para uso diario.', 99.00, 122, 2, '1762449954_descarga (35).jfif'),
(26, 'Rubor Crema Brillo de Aurora', 'Rubor luminoso con reflejos nacarados, acabado fresco.', 130.00, 122, 2, '1762450005_descarga (36).jfif'),
(27, 'Tinte Suave Amanecer Rosado', 'Tinte líquido con color rosa claro, aspecto juvenil.', 188.00, 123, 2, '1762450068_descarga (37).jfif'),
(28, 'Rubor Polvo Encanto Natural', 'Polvo liviano con pigmentos minerales, acabado mate.', 90.00, 123, 2, '1762450100_descarga (38).jfif'),
(29, 'Blush Luminoso Caricia de Sol', 'Rubor dorado-rosado con efecto iluminador.', 140.00, 123, 2, '1762450141_descarga (39).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot_conversaciones`
--

CREATE TABLE `chatbot_conversaciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `mensaje_usuario` text DEFAULT NULL,
  `respuesta_bot` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chatbot_conversaciones`
--

INSERT INTO `chatbot_conversaciones` (`id`, `usuario`, `mensaje_usuario`, `respuesta_bot`, `fecha`) VALUES
(1, 'Invitado', 'carrito', 'Tu carrito está vacío 🛍️. ¡Agrega algunos productos!', '2025-11-03 03:01:27'),
(2, 'Invitado', 'buscar gloss', '¿Qué producto quieres buscar? 🧐 Ejemplo: *buscar gloss* o *ver celular*.', '2025-11-03 03:02:11'),
(3, 'Invitado', 'gloss', '¿Podrías repetirlo? Estoy en modo aprendizaje 🧠.', '2025-11-03 03:02:21'),
(4, 'Invitado', 'ayuda', 'Puedo ayudarte con:<br>🟢 Buscar productos con imágenes.<br>🟢 Consultar precios.<br>🟢 Mostrar tu carrito.<br>🟢 Ver categorías.<br><br>¿Qué te gustaría hacer?', '2025-11-03 03:02:50'),
(5, 'Invitado', 'ver categorias', 'Estas son nuestras categorías disponibles 🛍️:<br><ul><li>📦 Autos, Motos y otros</li><li>📦 Celulares y Telefonía</li><li>📦 Electrodomésticos</li><li>📦 Herramientas</li><li>📦 Ropa, bolsas y calzado</li><li>📦 Deportes y Fitness</li><li>📦 Computación</li></ul><br>¿Quieres que te muestre productos de alguna?', '2025-11-03 03:03:02'),
(6, 'Invitado', 'si', 'Mmm... 🤔 no entendí eso. Puedes decir *buscar gloss*, *ver carrito* o *precio de celular*.', '2025-11-03 03:03:13'),
(7, 'Invitado', 'computacion', '¿Podrías repetirlo? Estoy en modo aprendizaje 🧠.', '2025-11-03 03:03:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computacion`
--

CREATE TABLE `computacion` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `computacion`
--

INSERT INTO `computacion` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(4, 'prueba suaves', '1', 1.00, 2, 7, '1758517642_vestuario.jpg'),
(5, 'Crema Hidratante Suavidad Natural', 'Crema ligera con extracto de avena y almendra dulce para piel sensible.', 120.00, 123, 7, '1762760648_descarga (80).jfif'),
(6, 'Loción Corporal Flor de Cerezo', 'Hidrata y deja un aroma floral delicado, textura no grasosa.', 130.00, 123, 7, '1762760690_descarga (81).jfif'),
(7, 'Gel Facial Refrescante de Aloe Vera', 'Calma e hidrata la piel, ideal para después del sol.', 110.00, 122, 7, '1762760739_descarga (82).jfif'),
(8, 'Mousse Limpiador Suave', 'Espuma facial con extracto de manzanilla, limpia sin resecar.', 140.00, 122, 7, '1762760779_descarga (83).jfif'),
(9, 'Crema Nutritiva de Miel y Avena', 'Suaviza y repara la piel seca, con ingredientes naturales.', 130.00, 122, 7, '1762760812_descarga (84).jfif'),
(10, 'Agua Micelar Pure Glow', 'Limpia y desmaquilla sin irritar, apta para todo tipo de piel.', 130.00, 122, 7, '1762760864_descarga (85).jfif'),
(11, 'Tónico Suave de Rosas', 'Refresca, tonifica y deja la piel con un brillo natural.', 129.00, 122, 7, '1762760926_descarga (86).jfif'),
(12, 'Mascarilla Hidratante de Pepino', 'Refresca y revitaliza la piel cansada, efecto calmante.', 90.00, 122, 7, '1762760957_descarga (87).jfif'),
(13, 'Crema Corporal Nube de Algodón', 'Fórmula ligera con aroma dulce, suaviza e hidrata.', 180.00, 122, 7, '1762760990_descarga (88).jfif'),
(14, 'Exfoliante Facial Suave de Azúcar y Miel', 'Limpia y elimina impurezas sin irritar la piel.', 130.00, 122, 7, '1762761037_descarga (89).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes_y_fitness`
--

CREATE TABLE `deportes_y_fitness` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deportes_y_fitness`
--

INSERT INTO `deportes_y_fitness` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(4, 'prueba de brochas', '1111', 111.00, 4, 6, '1758516200_simple-background-simple-space-astronaut-wallpaper-preview.jpg'),
(5, 'Sombras negras', 'hola giapo', 300.00, 8, 6, '1762444605_descarga.jfif'),
(6, 'Set de Brochas Princesa Glam', '10 brochas con mangos rosados y cerdas suaves tipo seda.', 210.00, 123, 6, '1762760049_descarga (69).jfif'),
(7, 'Kit de Brochas Unicornio', '8 piezas con diseño de cuerno tornasolado y mango en espiral.', 220.00, 123, 6, '1762760087_descarga (70).jfif'),
(8, 'Brochas Mágicas Rosé Gold', 'Set profesional de 12 brochas en acabado metálico rosado.', 220.00, 123, 6, '1762760144_descarga (71).jfif'),
(9, 'Set Mini Brillo de Hada', 'Brochas pequeñas para retoques, ideales para bolso', 130.00, 123, 6, '1762760239_descarga (72).jfif'),
(10, 'Kit de Brochas Aurora', '15 piezas con estuche transparente y diseño pastel.', 300.00, 123, 6, '1762760278_descarga (73).jfif'),
(11, 'Espejo Princesa de Corazón', 'Espejo de mano con forma de corazón y borde brillante.', 120.00, 123, 6, '1762760335_descarga (74).jfif'),
(12, 'Espejo Mágico de Bolsillo', 'Compacto con luz LED, ideal para retoques rápidos.', 140.00, 123, 6, '1762760411_descarga (75).jfif'),
(13, 'Espejo Doble con Aumento Real', 'Doble vista: normal y aumento 2x, marco metálico.', 140.00, 123, 6, '1762760447_descarga (76).jfif'),
(14, 'Espejo Iluminado Glam Light', 'Luz regulable con sensor táctil, recargable por USB.', 340.00, 123, 6, '1762760485_descarga (77).jfif'),
(15, 'Espejo Plegable Estilo Flor', 'Diseño en forma de flor, con cubierta decorada.', 100.00, 123, 6, '1762760527_descarga (78).jfif'),
(16, 'Espejo de Mesa Brillo de Estrella', 'Base dorada y marco brillante, ideal para tocador.', 280.00, 123, 6, '1762760563_descarga (79).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `usuario`, `calle`, `numero`, `ciudad`, `codigo_postal`) VALUES
(1, 'gregorio', 'AV JOSE MARIA MORELOS', 'S/N', 'CHALCO', '56640'),
(2, 'azteca', 'AV JOSE MARIA MORELOS', 'S/N', 'CHALCO', '56640'),
(3, 'beboteeeeeee', 'RIO LA COMPAÑIA', '2', 'LOS HÉROES CHALCO [CONJUNTO URBANO]', '56644'),
(4, 'CARLOS TORRES', 'RIO LA COMPAÑIA', '2', 'LOS HÉROES CHALCO [CONJUNTO URBANO]', '56644');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electrodomesticos`
--

CREATE TABLE `electrodomesticos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `electrodomesticos`
--

INSERT INTO `electrodomesticos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(5, 'prueba de delineadores', '1', 1.00, 1, 3, '1758517374_vestuario 1.1.jpg'),
(6, 'paleta encanto de hadas', 'Sombras en tonos rosados y lilas con acabado perlado.', 230.00, 123, 3, '1762450702_paleta1.jfif'),
(7, 'Paleta Sueño de Estrellas', '12 tonos brillantes inspirados en el cielo nocturno.', 290.00, 123, 3, '1762450879_paleta2ç.jfif'),
(8, 'Paleta Aurora Boreal', 'Gama fría con verdes, azules y lilas metálicos.', 310.00, 123, 3, '1762451002_OIP.jfif'),
(9, 'Paleta Jardín Encantado', 'Colores naturales y pasteles para looks románticos.', 270.00, 123, 3, '1762451096_OIP (1).jfif'),
(10, 'Paleta Nube de Colores', 'Sombras suaves con acabado satinado, textura sedosa.', 290.00, 123, 3, '1762451318_OIP (2).jfif'),
(11, 'Paleta Fantasía Tropical', 'Mezcla vibrante de verdes, rosas y naranjas.', 299.00, 123, 3, '1762451391_OIP (3).jfif'),
(12, 'Paleta Brillo de Luna', 'Sombras con efecto metálico plateado y gris perlado.', 280.00, 123, 3, '1762451471_OIP (4).jfif'),
(13, 'Paleta Ensueño de Rosas', '16 tonos rosados, malvas y neutros.', 320.00, 123, 3, '1762451600_OIP (5).jfif'),
(14, 'Paleta Dulce Amanecer', 'Gama cálida con tonos durazno y crema.', 243.00, 123, 3, '1762451680_OIP (6).jfif'),
(15, 'Paleta Misterio Cósmico', 'Sombras tornasoladas con reflejos galácticos.', 330.00, 123, 3, '1762451776_OIP (7).jfif'),
(16, 'Paleta Luz de Unicornio', 'Brillos pastel con reflejos iridiscentes.', 310.00, 123, 3, '1762451943_OIP (9).jfif'),
(17, 'Paleta Bosque de Ensueño', 'Tonos verdes y tierra con toques dorados.', 290.00, 123, 3, '1762452016_OIP (10).jfif'),
(18, 'Paleta Fantasía Rosa Dorada', 'Combinación de rosas metálicos y champaña.', 270.00, 123, 3, '1762452092_OIP (11).jfif'),
(19, 'Paleta Cielo Encantado', 'Tonos azules y violetas con shimmer delicado.', 270.00, 123, 3, '1762452182_OIP (12).jfif'),
(20, 'Paleta Días de Magia', '24 tonos variados con pigmento intenso y alta duración.', 340.00, 123, 3, '1762452266_OIP (13).jfif'),
(21, 'Paleta Suave Encanto', 'Colores neutros con acabado mate y satinado.', 340.00, 123, 3, '1762452344_OIP (14).jfif'),
(22, 'Paleta Encanto Solar', 'Tonos cálidos con brillos dorados para piel bronceada.', 280.00, 121, 3, '1762452418_OIP (15).jfif'),
(23, 'Paleta de Ensueño Boreal', 'Gama completa de tonos brillantes y mates combinables.', 330.00, 123, 3, '1762452486_OIP (16).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(7, 'prueba de colores', 'w', 1.00, 1, 4, '1758516728_3.1.jpg'),
(8, 'Esmalte Rojo Pasión Intensa', 'Rojo brillante clásico, secado rápido y acabado duradero.', 85.00, 123, 4, '1762758299_descarga (40).jfif'),
(9, 'Esmalte Azul Eléctrico', 'Azul vibrante con brillo metálico, cobertura total en una capa.', 90.00, 123, 4, '1762758355_descarga (41).jfif'),
(10, 'Esmalte Rosa Neón Fiesta', 'Rosa fuerte con acabado luminoso, ideal para verano.', 88.00, 123, 4, '1762758403_descarga (42).jfif'),
(11, 'Esmalte Amarillo Sol Radiante', 'Tono amarillo intenso, resistente y alegre.', 80.00, 123, 4, '1762758446_descarga (43).jfif'),
(12, 'Esmalte Verde Esmeralda Brillante', 'Verde profundo con reflejos perlados.', 95.00, 123, 4, '1762758544_descarga (44).jfif'),
(13, 'Esmalte Fucsia Encantadora', 'Fucsia vibrante con brillo de larga duración.', 89.00, 123, 4, '1762758585_descarga (45).jfif'),
(14, 'Esmalte Naranja Tropical', 'Naranja cálido y energizante, secado rápido.', 100.00, 123, 4, '1762758623_descarga (46).jfif'),
(15, 'Esmalte Violeta Galáctico', 'Violeta intenso con efecto metálico.', 93.00, 123, 4, '1762758668_descarga (47).jfif'),
(16, 'Esmalte Turquesa Vibrante', 'Tono turquesa de alto impacto, acabado brillante.', 93.00, 123, 4, '1762758704_descarga (48).jfif'),
(17, 'Esmalte Coral de Ensueño', 'Mezcla entre rosa y naranja, tono ideal para piel cálida.', 90.00, 123, 4, '1762758748_descarga (49).jfif'),
(18, 'Esmalte Rosa Chicle Pop', 'Rosa neón con acabado liso y moderno.', 90.00, 123, 4, '1762758785_descarga (50).jfif'),
(19, 'Esmalte Verde Lima Energía', 'Verde ácido con efecto brillante, súper llamativo.', 88.00, 123, 4, '1762758855_descarga (51).jfif'),
(20, 'Esmalte Azul Marino Estrella', 'Azul oscuro elegante con ligero shimmer.', 99.00, 123, 4, '1762758893_descarga (52).jfif'),
(21, 'Esmalte Magenta Encantado', 'Tono intermedio entre rosa y morado, muy femenino.', 99.00, 123, 4, '1762758932_descarga (53).jfif'),
(22, 'Esmalte Dorado Solar', 'Dorado metálico con reflejos intensos, elegante y festivo.', 99.00, 121, 4, '1762758967_descarga (54).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa_bolsas_calzado`
--

CREATE TABLE `ropa_bolsas_calzado` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ropa_bolsas_calzado`
--

INSERT INTO `ropa_bolsas_calzado` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `categoria_id`, `imagen`) VALUES
(3, 'prueba de kits', '1', 1.00, 2, 5, '1758517539_2.5.2.png'),
(4, 'Kit Princesa Encantada', 'Incluye brillo labial, mini sombra rosada y rubor suave con estuche en forma de corona.', 190.00, 123, 5, '1762759132_descarga (55).jfif'),
(5, 'Set Mágico de Hadas', 'Contiene gloss, sombra tornasol, esmalte rosa y brocha de fantasía.', 230.00, 123, 5, '1762759173_descarga (56).jfif'),
(6, 'Kit Brillos Reales', 'Brillos de labios con glitter, espejo y mini peine en estuche rosa.', 180.00, 123, 5, '1762759208_descarga (57).jfif'),
(7, 'Set Princesa del Sol', 'Paleta de sombras cálidas, rubor coral y labial dorado.', 290.00, 123, 5, '1762759260_descarga (58).jfif'),
(8, 'Kit Dulce Encanto', 'Gloss sabor fresa, esmalte rosado y stickers decorativos.', 140.00, 123, 5, '1762759304_descarga (59).jfif'),
(9, 'Set Magia de Colores', 'Sombras multicolor, rubor, delineador y brocha con forma de estrella.', 320.00, 123, 5, '1762759356_descarga (60).jfif'),
(10, 'Kit Princesa de Ensueño', 'Contiene labial, esmalte, tiara brillante y espejo de corazón.', 340.00, 123, 5, '1762759390_descarga (61).jfif'),
(11, 'Set Mini Glamour Real', 'Incluye mini paleta de sombras, bálsamo labial y brocha compacta.', 390.00, 123, 5, '1762759446_descarga (62).jfif'),
(12, 'Kit Estrella de Fantasía', 'Brillo labial, esmalte con glitter y adornos para uñas.', 430.00, 123, 5, '1762759497_descarga (63).jfif'),
(13, 'Set Princesa Rosa Mágica', 'Sombras, gloss y rubor en tonos rosados con empaque de flores.', 230.00, 123, 5, '1762759559_descarga (64).jfif'),
(14, 'Kit Caramelo de Ensueño', 'Incluye gloss, esmalte pastel y brocha suave con diseño dulce.', 180.00, 123, 5, '1762759619_descarga (65).jfif'),
(15, 'Set Reina del Castillo', 'Contiene mini paleta de sombras brillantes, labial rojo y espejo decorado.', 280.00, 123, 5, '1762759710_descarga (66).jfif'),
(16, 'Kit Encanto del Bosque', 'Contiene mini paleta de sombras brillantes, labial rojo y espejo decorado.', 280.00, 123, 5, '1762759725_descarga (66).jfif'),
(17, 'Kit Encanto del Bosque', 'Sombras verdes y marrones suaves, labial nude y rubor natural.', 298.00, 123, 5, '1762759813_descarga (67).jfif'),
(18, 'Set Princesa de Cristal', 'Gloss transparente, iluminador y esmalte plateado.', 298.00, 123, 5, '1762759862_descarga (68).jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjeta` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `numero` varchar(16) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `vencimiento` varchar(5) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id_tarjeta`, `usuario`, `numero`, `nombre`, `vencimiento`, `cvv`) VALUES
(1, 'gregorio', '114', 'azteca', '12/22', '666'),
(2, 'beboteeeeeee', '111', '999898790gf80hn08f', '11111', '111'),
(3, 'CARLOS TORRES', '1231231231', 'carlos torres', '12/12', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'yordi uriel', 'yordiuriel9@gmail.com', '$2y$10$oI4l8K7w2E7SG6STZLCNe.8KvF1dQ9VGjgxEgejCy1mldWw6Q2rxe'),
(2, 'made', 'made@gmail.com', '$2y$10$dOjBEv/FP5tcK9rgMeBkBemYc8KSrRQrR.6voMQN7mJYC6roTlHB6'),
(4, 'geradine', 'gera@gmail.com', '$2y$10$SVdVwEwTTHc.b8yf9PNxwevvcYtmC4FF8kRIh8zpfbWt32GgP0TgO'),
(5, 'administrador', 'admin@gmail.com', '$2y$10$6oOxgB.Wwp5S9evKjYOI2eXbnAiUPPvgDeHY2pkVnEgRZCMF1BSd2'),
(8, 'gregorio', 'gregoriofloress5498@gmail.com', '$2y$10$iGYcNSehc6wE4Nv7QIDr..oDND4DnXvRs84lyDgTG9TJEV.AlmT7O'),
(9, 'Jimenita', 'jvillegas@gmail.com', '$2y$10$Upbw/6i/G.zxPof4sLDiTuLYR6GMOHRwfbxtOYp0V7f442Y5GH5LO'),
(10, 'gregorio', 'gregoriofloress@gmail.com', '$2y$10$iG8WKApewipI8LrF.UJ3bOAvbSDzu8WxFvZxy.ThgSaANPaVvn/ba'),
(11, 'ALE', 'ALE@GMAIL.COM', '$2y$10$iPu6q6BgLenRgvtTXk9Ngeb3KuVBdHyUI6h.9PhZM/DakKIMM9cSO'),
(13, 'gregorio', 'gregoriofloress123@gmail.com', '$2y$10$T1GpfwQIF0ignEF06IsqROgnXjaZwXkPWIUbU9JiZK0AWqRayCeZa'),
(14, 'azteca', 'gregoriofloress321@gmail.com', '$2y$10$3nG08Jz.kFXXlSdTnoukFuiihZoMrxDOQxYosXrK7EeF2.FS1VKTu'),
(15, 'beboteeeeeee', 'bebote23@gmail.com', '$2y$10$GsQCTBmVFYA11BOAnX.rUOB6.FVLzgqpIiYNblZO6eIZyHA99eJfi'),
(16, 'CARLOS TORRES', 'ctorresc@gmail.com', '$2y$10$IYB7a6B7CTUz7UDIWiT//ej6pi5aOLW9PLsaoyNF7314FYkRTdtT.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- Indices de la tabla `autos_motos_y_otros`
--
ALTER TABLE `autos_motos_y_otros`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `celulares_y_telefonia`
--
ALTER TABLE `celulares_y_telefonia`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `chatbot_conversaciones`
--
ALTER TABLE `chatbot_conversaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `computacion`
--
ALTER TABLE `computacion`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `deportes_y_fitness`
--
ALTER TABLE `deportes_y_fitness`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `electrodomesticos`
--
ALTER TABLE `electrodomesticos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `ropa_bolsas_calzado`
--
ALTER TABLE `ropa_bolsas_calzado`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjeta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `autos_motos_y_otros`
--
ALTER TABLE `autos_motos_y_otros`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `celulares_y_telefonia`
--
ALTER TABLE `celulares_y_telefonia`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `chatbot_conversaciones`
--
ALTER TABLE `chatbot_conversaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `computacion`
--
ALTER TABLE `computacion`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `deportes_y_fitness`
--
ALTER TABLE `deportes_y_fitness`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `electrodomesticos`
--
ALTER TABLE `electrodomesticos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ropa_bolsas_calzado`
--
ALTER TABLE `ropa_bolsas_calzado`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos_motos_y_otros`
--
ALTER TABLE `autos_motos_y_otros`
  ADD CONSTRAINT `autos_motos_y_otros_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `celulares_y_telefonia`
--
ALTER TABLE `celulares_y_telefonia`
  ADD CONSTRAINT `celulares_y_telefonia_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `computacion`
--
ALTER TABLE `computacion`
  ADD CONSTRAINT `computacion_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `deportes_y_fitness`
--
ALTER TABLE `deportes_y_fitness`
  ADD CONSTRAINT `deportes_y_fitness_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `electrodomesticos`
--
ALTER TABLE `electrodomesticos`
  ADD CONSTRAINT `electrodomesticos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `ropa_bolsas_calzado`
--
ALTER TABLE `ropa_bolsas_calzado`
  ADD CONSTRAINT `ropa_bolsas_calzado_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
