-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 17:08:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rposystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'Usuario Admin', 'admin@mail.com', '903b21879b4a60fc9103c3334e4f6f62cf6c3a2d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_clientes`
--

CREATE TABLE `rpos_clientes` (
  `cliente_id` varchar(200) NOT NULL,
  `cliente_nombre` varchar(200) NOT NULL,
  `cliente_numero` varchar(200) NOT NULL,
  `cliente_email` varchar(200) NOT NULL,
  `cliente_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_clientes`
--

INSERT INTO `rpos_clientes` (`cliente_id`, `cliente_nombre`, `cliente_numero`, `cliente_email`, `cliente_password`, `created_at`) VALUES
('06549ea58afd', 'Ana J. Browne', '4589698780', 'anaj@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:48.523820'),
('2541dba91915', 'ori ani', '234342', 'ori@h.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2023-06-08 15:02:03.687155'),
('29c759d624f9', 'Trina L. Crowder', '5896321002', 'trina@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 13:16:18.927595'),
('35135b319ce3', 'Christine Moore', '7412569698', 'christine@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-04 16:29:45.133297'),
('3859d26cd9a5', 'Louise R. Holloman', '7856321000', 'holloman@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:12.149280'),
('7c8f2100d552', 'Melody E. Hance', '3210145550', 'melody@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:23.996068'),
('96b50844242f', 'Compartida', '78564445', 'cuentacompartida700@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', '2023-04-01 22:47:14.296527'),
('9a030bf80299', 'Orivaldo', '78564445', 'orivaldo@gmail.com', 'e1009603edd48eee0e3cbd22a0095b8a164b3599', '2023-04-01 08:24:41.189516'),
('9c7fcc067bda', 'Delbert G. Campbell', '7850001256', 'delbert@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:56.944364'),
('9f6378b79283', 'William C. Gallup', '7145665870', 'william@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:26.507932'),
('b8761964a422', 'Daniel z', '34546', 'daniel@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2023-06-08 15:02:18.374481'),
('fe6bb69bdd29', 'Brian S. Boucher', '1020302055', 'brians@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:29.591980');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_pagos`
--

CREATE TABLE `rpos_pagos` (
  `pago_id` varchar(200) NOT NULL,
  `pago_code` varchar(200) NOT NULL,
  `pedido_code` varchar(200) NOT NULL,
  `cliente_id` varchar(200) NOT NULL,
  `pago_monto` varchar(200) NOT NULL,
  `pago_metodo` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_pagos`
--

INSERT INTO `rpos_pagos` (`pago_id`, `pago_code`, `pedido_code`, `cliente_id`, `pago_monto`, `pago_metodo`, `created_at`) VALUES
('04c837', 'RZDUWVGHCA', 'SYFT-1702', '9c7fcc067bda', '10', 'Dinero', '2023-06-08 12:34:32.524655'),
('0bf592', '9UMWLG4BF8', 'EJKA-4501', '35135b319ce3', '8', 'Dinero', '2023-04-01 09:08:49.419200'),
('17d2cf', 'A613KYM92D', 'MLQK-6489', '7c8f2100d552', '15', 'Dinero', '2023-04-01 09:09:36.885850'),
('250467', 'A9F8M6K2T4', 'QEJV-4125', '35135b319ce3', '8', 'Dinero', '2023-04-01 08:09:46.808574'),
('2cd6c8', 'ABGJWQHSID', 'RACW-5908', '27e4a5bc74c2', '7', 'Dinero', '2023-04-01 09:08:49.439635'),
('2f2d9e', 'GSGGFSTRWG', 'UTWB-8742', '9a030bf80299', '20', 'Dinero', '2023-04-02 01:31:23.198918'),
('325d1e', 'QWEASDZXCT', 'NASI-4592', 'b8761964a422', '10', 'Dinero', '2023-04-02 01:39:18.968498'),
('352b45', 'AELFI18QU4', 'UKJA-6302', '29c759d624f9', '8', 'Dinero', '2023-04-01 09:08:49.460529'),
('4423d7', 'QWERT0YUZ1', 'JFMB-0731', '35135b319ce3', '11', 'Dinero', '2023-04-01 09:08:49.479292'),
('442865', '146XLFSC9V', 'INHG-0875', '9c7fcc067bda', '10', 'Dinero', '2023-04-01 09:08:49.434592'),
('60193f', 'JATMX1YCL2', 'PGAS-9485', 'e711dcc579d9', '6', 'Dinero', '2023-04-01 09:08:49.450731'),
('65891b', 'MF2TVJA1PY', 'ZPXD-6951', 'e711dcc579d9', '16', 'Dinero', '2023-04-01 09:08:49.413907'),
('74afe3', 'ZB79X5UQ2J', 'YXTZ-5987', '2541dba91915', '25', 'Dinero', '2023-06-08 15:03:12.111492'),
('75ae21', '1QIKVO69SA', 'IUSP-9453', 'fe6bb69bdd29', '10', 'Dinero', '2023-04-01 09:08:49.395163'),
('793490', 'VCGDBTHJ91', 'GHUI-7389', '9a030bf80299', '6', 'Dinero', '2023-04-01 09:08:49.474885'),
('7b195f', 'IBU4F3CM5D', 'YGQJ-8391', '29c759d624f9', '10', 'Dinero', '2023-04-01 09:08:49.470004'),
('7dd904', 'NZF1HS37TM', 'PTHY-7841', '06549ea58afd', '7', 'Dinero', '2023-04-01 09:08:49.407622'),
('7ddc2e', 'I9DGL3HU8X', 'VFBO-8152', '2541dba91915', '10', 'Dinero', '2023-06-08 12:04:06.779411'),
('7e1989', 'KLTF3YZHJP', 'QOEH-8613', '29c759d624f9', '9', 'Dinero', '2023-04-01 09:08:49.424370'),
('8f44de', '5SQ4VLKRM7', 'MBXY-2845', '06549ea58afd', '7', 'Dinero', '2023-04-01 07:42:08.946526'),
('968488', '5E31DQ2NCG', 'COXP-6018', '7c8f2100d552', '22', 'Dinero', '2023-04-01 09:08:49.455921'),
('984539', 'LSBNK1WRFU', 'FNAB-9142', '35135b319ce3', '18', 'Paypal', '2022-09-04 16:32:14.852482'),
('9fcee7', 'AZSUNOKEI7', 'OTEV-8532', '3859d26cd9a5', '15', 'Dinero', '2023-04-01 09:08:49.374389'),
('b801db', 'ASDFGTREWQ', 'MEJH-5894', '9a030bf80299', '10', 'Dinero', '2023-04-02 00:50:48.782199'),
('bc5c5b', 'ZUCGH3HFJD', 'DVXI-2941', '9a030bf80299', '20', 'Dinero', '2023-04-01 09:08:49.401929'),
('c0ce3c', '38BZ5GUWK1', 'ITBW-1576', '3859d26cd9a5', '20', 'Dinero', '2023-04-01 09:08:49.465678'),
('c60a12', 'UEL54VWB9F', 'AMKP-4189', '2541dba91915', '25', 'Paypal', '2023-06-08 12:35:39.998551'),
('c81d2e', 'WERGFCXZSR', 'AEHM-0653', '06549ea58afd', '8', 'Dinero', '2023-04-01 09:08:49.429553'),
('df587c', 'NVI2JYLF3K', 'GQJN-9081', 'e711dcc579d9', '11', 'Dinero', '2023-04-01 07:51:53.293863'),
('df7875', 'LCTZPJWQ9Y', 'WIPY-8419', '35135b319ce3', '7', 'Dinero', '2023-04-02 01:00:27.240897'),
('e46e29', 'QMCGSNER3T', 'ONSY-2465', '57b7541814ed', '12', 'Dinero', '2023-04-01 09:08:49.388699'),
('f13b78', 'SA3G4TDGHS', 'YTOR-1736', '9a030bf80299', '11', 'Dinero', '2023-04-02 00:51:45.892530'),
('fec369', 'ILC54VE93T', 'QNBZ-8392', '3859d26cd9a5', '7', 'Dinero', '2023-04-01 09:08:49.483946'),
('ffdf3f', 'U6FSTI13ZH', 'GUFC-9526', 'fe6bb69bdd29', '10', 'Dinero', '2023-04-01 09:08:49.444885');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_pass_resets`
--

CREATE TABLE `rpos_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_pedidos`
--

CREATE TABLE `rpos_pedidos` (
  `pedido_id` varchar(200) NOT NULL,
  `pedido_code` varchar(200) NOT NULL,
  `cliente_id` varchar(200) NOT NULL,
  `cliente_nombre` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_nombre` varchar(200) NOT NULL,
  `prod_precio` varchar(200) NOT NULL,
  `prod_cant` varchar(200) NOT NULL,
  `pedido_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_pedidos`
--

INSERT INTO `rpos_pedidos` (`pedido_id`, `pedido_code`, `cliente_id`, `cliente_nombre`, `prod_id`, `prod_nombre`, `prod_precio`, `prod_cant`, `pedido_status`, `created_at`) VALUES
('019661e097', 'AEHM-0653', '06549ea58afd', 'Ana J. Browne', 'bd200ef837', 'Turkish Coffee', '8', '1', 'Pagado', '2023-04-01 05:41:11.397528'),
('06016e811d', 'MEJH-5894', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-02 00:50:48.835221'),
('0c2824564e', 'KIZE-7568', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', '', '2023-04-01 08:32:09.870642'),
('3d69a6a6ca', 'AMKP-4189', '2541dba91915', 'ori ani ani', '2b976e49a0', 'Cheeseburger xxz', '5', '5', 'PAGADO', '2023-06-08 12:35:40.024038'),
('49b5b020ab', 'GHUI-7389', '9a030bf80299', 'Orivaldo', 'e769e274a3', 'Frappuccino', '3', '2', 'PAGADO', '2023-04-01 08:28:43.548292'),
('49c1bd8086', 'IUSP-9453', 'fe6bb69bdd29', 'Brian S. Boucher', 'd57cd89073', 'Country Fried Steak', '10', '1', 'Pagado', '2023-04-01 05:41:11.405635'),
('5ad28fe4ea', 'UKJA-6302', '29c759d624f9', 'Trina L. Crowder', 'bd200ef837', 'Turkish Coffee', '8', '1', 'PAGADO', '2023-04-01 08:17:12.053002'),
('6466fd5ee5', 'COXP-6018', '7c8f2100d552', 'Melody E. Hance', '31dfcc94cf', 'Buffalo Wings', '11', '2', 'Pagado', '2023-04-01 05:41:11.356060'),
('68e92bd074', 'SYFT-1702', '9c7fcc067bda', 'Delbert G. Campbell', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-06-08 12:34:32.566698'),
('69c84a3a77', 'UTWB-8742', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-02 01:31:23.290395'),
('80ab270866', 'JFMB-0731', '35135b319ce3', 'Christine Moore', '97972e8d63', 'Irish Coffee', '11', '1', 'Pagado', '2023-04-01 05:41:11.319361'),
('8243601584', 'YTOR-1736', '9a030bf80299', 'Orivaldo', '97972e8d63', 'Irish Coffee', '11', '1', 'PAGADO', '2023-04-02 00:46:11.864854'),
('83a2493f07', 'ITBW-1576', '3859d26cd9a5', 'Louise R. Holloman', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-01 08:18:53.332388'),
('8815e7edfc', 'QOEH-8613', '29c759d624f9', 'Trina L. Crowder', '2b976e49a0', 'Cheeseburger', '3', '3', 'Pagado', '2023-04-01 05:41:11.334211'),
('af52d0022d', 'FNAB-9142', '35135b319ce3', 'Christine Moore', '2fdec9bdfb', 'Jambalaya', '9', '2', 'Pagado', '2023-04-01 05:41:11.389650'),
('c7e3262ad1', 'GUFC-9526', 'fe6bb69bdd29', 'Brian S. Boucher', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-01 08:15:47.626996'),
('cd461e888f', 'YGQJ-8391', '29c759d624f9', 'Trina L. Crowder', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-01 08:13:27.044680'),
('e615a65f86', 'YXTZ-5987', '2541dba91915', 'ori ani', '2b976e49a0', 'Cheeseburger xxz', '5', '5', 'PAGADO', '2023-06-08 15:03:12.188956'),
('ebe4cecdaa', 'DVXI-2941', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-01 08:29:55.631932'),
('f961eedc5e', 'NASI-4592', 'b8761964a422', 'Daniel', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-02 01:39:19.017594'),
('fc79a55455', 'INHG-0875', '9c7fcc067bda', 'Delbert G. Campbell', '3adfdee116', 'Enchiladas', '10', '1', 'Pagado', '2023-04-01 05:41:11.364681'),
('ff47b6fd42', 'VFBO-8152', '2541dba91915', 'ori ani ani', '2b976e49a0', 'Cheeseburger xxz', '5', '2', 'PAGADO', '2023-06-08 12:04:06.834545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_personal`
--

CREATE TABLE `rpos_personal` (
  `personal_id` int(20) NOT NULL,
  `personal_nombre` varchar(200) NOT NULL,
  `personal_num` varchar(200) NOT NULL,
  `personal_email` varchar(200) NOT NULL,
  `personal_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_personal`
--

INSERT INTO `rpos_personal` (`personal_id`, `personal_nombre`, `personal_num`, `personal_email`, `personal_password`, `created_at`) VALUES
(3, 'Cajero Zeballo', 'VDKO-8237', 'zeballos6@gmail.com', '3ad7c50b93459e46c2494a7fb957e63380326270', '2023-04-02 01:36:49.033726');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_productos`
--

CREATE TABLE `rpos_productos` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_nombre` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_precio` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_productos`
--

INSERT INTO `rpos_productos` (`prod_id`, `prod_code`, `prod_nombre`, `prod_img`, `prod_desc`, `prod_precio`, `created_at`) VALUES
('2b976e49a0', 'CEWV-9438', 'Cheeseburger xxz', '', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', '5', '2023-05-31 02:31:56.054246'),
('2fdec9bdfb', 'UJAK-9614', 'Jambalaya', 'Jambalaya.jpg', 'Jambalaya is an American Creole and Cajun rice dish of French, African, and Spanish influence, consisting mainly of meat and vegetables mixed with rice.', '9', '2022-09-03 10:48:49.593618'),
('31dfcc94cf', 'SYQP-3710', 'Buffalo Wings', 'buffalo_wings.jpg', 'A Buffalo wing in American cuisine is an unbreaded chicken wing section that is generally deep-fried and then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', '11', '2022-09-03 10:51:09.829079'),
('3adfdee116', 'HIPF-5346', 'Enchiladas', 'enchiladas.jpg', 'An enchilada is a corn tortilla rolled around a filling and covered with a savory sauce. Originally from Mexican cuisine, enchiladas can be filled with various ingredients, including meats, cheese, beans, potatoes, vegetables, or combinations', '10', '2022-09-03 12:52:26.427554'),
('5d66c79953', 'GOEW-9248', 'Cheese Curd', 'cheesecurd.jpg', 'Cheese curds are moist pieces of curdled milk, eaten either alone or as a snack, or used in prepared dishes. These are chiefly found in Quebec, in the dish poutine, throughout Canada, and in the northeastern, midwestern, mountain, and Pacific Northwestern United States, especially in Wisconsin and Minnesota.', '6', '2022-09-03 11:22:25.639690'),
('826e6f687f', 'AYFW-2683', 'Margherita Pizza', 'margherita-pizza0.jpg', 'Pizza margherita, as the Italians call it, is a simple pizza hailing from Naples. When done right, margherita pizza features a bubbly crust, crushed San Marzano tomato sauce, fresh mozzarella and basil, a drizzle of olive oil, and a sprinkle of salt.', '12', '2022-09-03 08:02:57.213354'),
('8dd1968370', 'MJAZ-1306', 'Sajta', 'imagen_2023-03-31_233205300.png', 'Sajta de pollo', '10', '2023-04-01 03:32:30.521709'),
('97972e8d63', 'CVWJ-6492', 'Irish Coffee', 'irishcoffee.jpg', 'Irish coffee is a caffeinated alcoholic drink consisting of Irish whiskey, hot coffee, and sugar, stirred, and topped with cream The coffee is drunk through the cream', '11', '2022-09-03 13:08:19.157649'),
('a419f2ef1c', 'EPNX-3728', 'Chicken Nugget', 'chicnuggets.jpeg', 'A chicken nugget is a food product consisting of a small piece of deboned chicken meat that is breaded or battered, then deep-fried or baked. Invented in the 1950s, chicken nuggets have become a very popular fast food restaurant item, as well as widely sold frozen for home use', '5', '2022-09-03 12:44:07.749371'),
('a5931158fe', 'ELQN-5204', 'Pulled Pork', 'pulledprk.jpeg', 'Pulled pork is an American barbecue dish, more specifically a dish of the Southern U.S., based on shredded barbecued pork shoulder. It is typically slow-smoked over wood; indoor variations use a slow cooker. The meat is then shredded manually and mixed with a sauce', '8', '2022-09-03 13:04:12.191403'),
('b2f9c250fd', 'XNWR-2768', 'Strawberry Rhubarb Pie', 'rhuharbpie.jpg', 'Rhubarb pie is a pie with a rhubarb filling. Popular in the UK, where rhubarb has been cultivated since the 1600s, and the leaf stalks eaten since the 1700s. Besides diced rhubarb, it almost always contains a large amount of sugar to balance the intense tartness of the plant', '7', '2022-09-03 13:06:28.235333'),
('bd200ef837', 'HEIY-6034', 'Turkish Coffee', 'turkshcoffee.jpg', 'Turkish coffee is a style of coffee prepared in a cezve using very finely ground coffee beans without filtering.', '8', '2022-09-03 13:09:50.234898'),
('d57cd89073', 'ZGQW-9480', 'Country Fried Steak', 'country_fried_stk.jpg', 'Chicken-fried steak, also known as country-fried steak or CFS, is an American breaded cutlet dish consisting of a piece of beefsteak coated with seasoned flour and either deep-fried or pan-fried. It is sometimes associated with the Southern cuisine of the United States.', '10', '2022-09-03 11:00:05.523519'),
('d9aed17627', 'FIKD-9703', 'Crab Cake', 'crabcakes.jpg', 'A crab cake is a variety of fishcake that is popular in the United States. It is composed of crab meat and various other ingredients, such as bread crumbs, mayonnaise, mustard, eggs, and seasonings. The cake is then sautÃ©ed, baked, grilled, deep fried, or broiled.', '16', '2022-09-03 12:54:52.120847'),
('e2195f8190', 'HKCR-2178', 'Carbonara', 'carbonaraimgre.jpg', 'Carbonara is an Italian pasta dish from Rome made with eggs, hard cheese, cured pork, and black pepper. The dish arrived at its modern form, with its current name, in the middle of the 20th century. The cheese is usually Pecorino Romano, Parmigiano-Reggiano, or a combination of the two.', '16', '2022-09-03 10:23:06.266420'),
('e2af35d095', 'IDLC-7819', 'Pepperoni Pizza', 'peperopizza.jpg', 'Pepperoni is an American variety of spicy salami made from cured pork and beef seasoned with paprika or other chili pepper. Prior to cooking, pepperoni is characteristically soft, slightly smoky, and bright red. Thinly sliced pepperoni is one of the most popular pizza toppings in American pizzerias.', '7', '2022-09-03 12:49:01.017677'),
('e769e274a3', 'AHRW-3894', 'Frappuccino', 'frappuccino.jpg', 'Frappuccino is a line of blended iced coffee drinks sold by Starbucks. It consists of coffee or crÃ¨me base, blended with ice and ingredients such as flavored syrups and usually topped with whipped cream and or spices.', '3', '2022-09-03 13:11:30.109467'),
('f4ce3927bf', 'EAHD-1980', 'Hot Dog', 'hotdog0.jpg', 'A hot dog is a food consisting of a grilled or steamed sausage served in the slit of a partially sliced bun. The term hot dog can also refer to the sausage itself. The sausage used is a wiener or a frankfurter. The names of these sausages also commonly refer to their assembled dish.', '4', '2022-09-03 10:53:04.965223');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `rpos_clientes`
--
ALTER TABLE `rpos_clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `rpos_pagos`
--
ALTER TABLE `rpos_pagos`
  ADD PRIMARY KEY (`pago_id`),
  ADD KEY `order` (`pedido_code`);

--
-- Indices de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indices de la tabla `rpos_pedidos`
--
ALTER TABLE `rpos_pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `CustomerOrder` (`cliente_id`),
  ADD KEY `ProductOrder` (`prod_id`);

--
-- Indices de la tabla `rpos_personal`
--
ALTER TABLE `rpos_personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indices de la tabla `rpos_productos`
--
ALTER TABLE `rpos_productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rpos_personal`
--
ALTER TABLE `rpos_personal`
  MODIFY `personal_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rpos_pedidos`
--
ALTER TABLE `rpos_pedidos`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`cliente_id`) REFERENCES `rpos_clientes` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_productos` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
