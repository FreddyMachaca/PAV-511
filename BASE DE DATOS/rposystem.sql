-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2023 a las 00:09:16
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
-- Estructura de tabla para la tabla `rpos_customers`
--

CREATE TABLE `rpos_customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_customers`
--

INSERT INTO `rpos_customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`) VALUES
('06549ea58afd', 'Ana J. Browne', '4589698780', 'anaj@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:48.523820'),
('27e4a5bc74c2', 'Tammy R. Polley', '4589654780', 'tammy@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:37:47.049438'),
('29c759d624f9', 'Trina L. Crowder', '5896321002', 'trina@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 13:16:18.927595'),
('35135b319ce3', 'Christine Moore', '7412569698', 'christine@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-04 16:29:45.133297'),
('3859d26cd9a5', 'Louise R. Holloman', '7856321000', 'holloman@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:12.149280'),
('7c8f2100d552', 'Melody E. Hance', '3210145550', 'melody@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:23.996068'),
('96b50844242f', 'Compartida', '78564445', 'cuentacompartida700@gmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', '2023-04-01 22:47:14.296527'),
('9a030bf80299', 'Orivaldo', '78564445', 'orivaldo@gmail.com', 'e1009603edd48eee0e3cbd22a0095b8a164b3599', '2023-04-01 08:24:41.189516'),
('9c7fcc067bda', 'Delbert G. Campbell', '7850001256', 'delbert@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:56.944364'),
('9f6378b79283', 'William C. Gallup', '7145665870', 'william@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:39:26.507932'),
('b8761964a422', 'Daniel', '34546634654', 'daniel@gmail.com', 'd3232aa5222d3f0ac68819cddd15c4218a611d18', '2023-04-02 01:38:40.263807'),
('d0ba61555aee', 'Jamie R. Barnes', '4125556587', 'jamie@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:36:59.643216'),
('d7c2db8f6cbf', 'Victor A. Pierson', '1458887896', 'victor@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:37:21.568155'),
('e711dcc579d9', 'Julie R. Martin', '3245557896', 'julie@mail.com', '55c3b5386c486feb662a0785f340938f518d547f', '2022-09-03 12:38:33.397498'),
('fe6bb69bdd29', 'Brian S. Boucher', '1020302055', 'brians@mail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', '2022-09-03 13:16:29.591980');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('019661e097', 'AEHM-0653', '06549ea58afd', 'Ana J. Browne', 'bd200ef837', 'Turkish Coffee', '8', '1', 'Pagado', '2023-04-01 05:41:11.397528'),
('06016e811d', 'MEJH-5894', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-02 00:50:48.835221'),
('0c2824564e', 'KIZE-7568', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', '', '2023-04-01 08:32:09.870642'),
('19455d28c7', 'QNBZ-8392', '3859d26cd9a5', 'Louise R. Holloman', '06dc36c1be', 'Philly Cheesesteak', '7', '1', 'PAGADO', '2023-04-01 05:48:19.872393'),
('3a3571a3b8', 'RACW-5908', '27e4a5bc74c2', 'Tammy R. Polley', '06dc36c1be', 'Philly Cheesesteak', '7', '1', 'PAGADO', '2023-04-01 05:46:24.129380'),
('49b5b020ab', 'GHUI-7389', '9a030bf80299', 'Orivaldo', 'e769e274a3', 'Frappuccino', '3', '2', 'PAGADO', '2023-04-01 08:28:43.548292'),
('49c1bd8086', 'IUSP-9453', 'fe6bb69bdd29', 'Brian S. Boucher', 'd57cd89073', 'Country Fried Steak', '10', '1', 'Pagado', '2023-04-01 05:41:11.405635'),
('4a363c3942', 'PGAS-9485', 'e711dcc579d9', 'Julie R. Martin', 'e769e274a3', 'Frappuccino', '3', '2', 'PAGADO', '2023-04-01 08:16:22.571349'),
('514ada5047', 'OTEV-8532', '3859d26cd9a5', 'Louise R. Holloman', '0c4b5c0604', 'Spaghetti Bolognese', '15', '1', 'Pagado', '2023-04-01 05:41:11.380992'),
('5ad28fe4ea', 'UKJA-6302', '29c759d624f9', 'Trina L. Crowder', 'bd200ef837', 'Turkish Coffee', '8', '1', 'PAGADO', '2023-04-01 08:17:12.053002'),
('6466fd5ee5', 'COXP-6018', '7c8f2100d552', 'Melody E. Hance', '31dfcc94cf', 'Buffalo Wings', '11', '2', 'Pagado', '2023-04-01 05:41:11.356060'),
('68e92bd074', 'SYFT-1702', '9c7fcc067bda', 'Delbert G. Campbell', '8dd1968370', 'Sajta', '10', '1', '', '2023-04-01 23:17:59.949526'),
('69c84a3a77', 'UTWB-8742', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-02 01:31:23.290395'),
('80ab270866', 'JFMB-0731', '35135b319ce3', 'Christine Moore', '97972e8d63', 'Irish Coffee', '11', '1', 'Pagado', '2023-04-01 05:41:11.319361'),
('8243601584', 'YTOR-1736', '9a030bf80299', 'Orivaldo', '97972e8d63', 'Irish Coffee', '11', '1', 'PAGADO', '2023-04-02 00:46:11.864854'),
('83a2493f07', 'ITBW-1576', '3859d26cd9a5', 'Louise R. Holloman', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-01 08:18:53.332388'),
('8815e7edfc', 'QOEH-8613', '29c759d624f9', 'Trina L. Crowder', '2b976e49a0', 'Cheeseburger', '3', '3', 'Pagado', '2023-04-01 05:41:11.334211'),
('8c4dd24c83', 'PTHY-7841', '06549ea58afd', 'Ana J. Browne', '06dc36c1be', 'Philly Cheesesteak', '7', '1', 'Pagado', '2023-04-01 05:47:24.485367'),
('a27f1d87be', 'EJKA-4501', '35135b319ce3', 'Christine Moore', 'ec18c5a4f0', 'Corn Dogs', '4', '2', 'Pagado', '2023-04-01 05:40:01.492585'),
('a74337db7e', 'ZPXD-6951', 'e711dcc579d9', 'Julie R. Martin', 'a5931158fe', 'Pulled Pork', '8', '2', 'Pagado', '2023-04-01 05:41:11.372707'),
('af52d0022d', 'FNAB-9142', '35135b319ce3', 'Christine Moore', '2fdec9bdfb', 'Jambalaya', '9', '2', 'Pagado', '2023-04-01 05:41:11.389650'),
('b72abb10bf', 'MLQK-6489', '7c8f2100d552', 'Melody E. Hance', '0c4b5c0604', 'Spaghetti Bolognese', '15', '1', 'PAGADO', '2023-04-01 09:09:36.933870'),
('bf5673eef9', 'MBXY-2845', '06549ea58afd', 'Ana J. Browne', '06dc36c1be', 'Philly Cheesesteak', '7', '1', 'PAGADO', '2023-04-01 07:42:08.980942'),
('c41578906d', 'WIPY-8419', '35135b319ce3', 'Christine Moore', '06dc36c1be', 'Philly Cheesesteak', '7', '1', 'PAGADO', '2023-04-02 01:00:27.288948'),
('c66648d0a0', 'QEJV-4125', '35135b319ce3', 'Christine Moore', '14c7b6370e', 'Reuben Sandwich', '8', '1', 'PAGADO', '2023-04-01 08:09:46.853210'),
('c7e3262ad1', 'GUFC-9526', 'fe6bb69bdd29', 'Brian S. Boucher', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-01 08:15:47.626996'),
('cd461e888f', 'YGQJ-8391', '29c759d624f9', 'Trina L. Crowder', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-01 08:13:27.044680'),
('d869a160b5', 'GQJN-9081', 'e711dcc579d9', 'Julie R. Martin', '31dfcc94cf', 'Buffalo Wings', '11', '1', 'PAGADO', '2023-04-01 07:51:53.335502'),
('ebe4cecdaa', 'DVXI-2941', '9a030bf80299', 'Orivaldo', '8dd1968370', 'Sajta', '10', '2', 'PAGADO', '2023-04-01 08:29:55.631932'),
('f961eedc5e', 'NASI-4592', 'b8761964a422', 'Daniel', '8dd1968370', 'Sajta', '10', '1', 'PAGADO', '2023-04-02 01:39:19.017594'),
('fc79a55455', 'INHG-0875', '9c7fcc067bda', 'Delbert G. Campbell', '3adfdee116', 'Enchiladas', '10', '1', 'Pagado', '2023-04-01 05:41:11.364681');

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
-- Estructura de tabla para la tabla `rpos_payments`
--

CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
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
('75ae21', '1QIKVO69SA', 'IUSP-9453', 'fe6bb69bdd29', '10', 'Dinero', '2023-04-01 09:08:49.395163'),
('793490', 'VCGDBTHJ91', 'GHUI-7389', '9a030bf80299', '6', 'Dinero', '2023-04-01 09:08:49.474885'),
('7b195f', 'IBU4F3CM5D', 'YGQJ-8391', '29c759d624f9', '10', 'Dinero', '2023-04-01 09:08:49.470004'),
('7dd904', 'NZF1HS37TM', 'PTHY-7841', '06549ea58afd', '7', 'Dinero', '2023-04-01 09:08:49.407622'),
('7e1989', 'KLTF3YZHJP', 'QOEH-8613', '29c759d624f9', '9', 'Dinero', '2023-04-01 09:08:49.424370'),
('8f44de', '5SQ4VLKRM7', 'MBXY-2845', '06549ea58afd', '7', 'Dinero', '2023-04-01 07:42:08.946526'),
('968488', '5E31DQ2NCG', 'COXP-6018', '7c8f2100d552', '22', 'Dinero', '2023-04-01 09:08:49.455921'),
('984539', 'LSBNK1WRFU', 'FNAB-9142', '35135b319ce3', '18', 'Paypal', '2022-09-04 16:32:14.852482'),
('9fcee7', 'AZSUNOKEI7', 'OTEV-8532', '3859d26cd9a5', '15', 'Dinero', '2023-04-01 09:08:49.374389'),
('b801db', 'ASDFGTREWQ', 'MEJH-5894', '9a030bf80299', '10', 'Dinero', '2023-04-02 00:50:48.782199'),
('bc5c5b', 'ZUCGH3HFJD', 'DVXI-2941', '9a030bf80299', '20', 'Dinero', '2023-04-01 09:08:49.401929'),
('c0ce3c', '38BZ5GUWK1', 'ITBW-1576', '3859d26cd9a5', '20', 'Dinero', '2023-04-01 09:08:49.465678'),
('c81d2e', 'WERGFCXZSR', 'AEHM-0653', '06549ea58afd', '8', 'Dinero', '2023-04-01 09:08:49.429553'),
('df587c', 'NVI2JYLF3K', 'GQJN-9081', 'e711dcc579d9', '11', 'Dinero', '2023-04-01 07:51:53.293863'),
('df7875', 'LCTZPJWQ9Y', 'WIPY-8419', '35135b319ce3', '7', 'Dinero', '2023-04-02 01:00:27.240897'),
('e46e29', 'QMCGSNER3T', 'ONSY-2465', '57b7541814ed', '12', 'Dinero', '2023-04-01 09:08:49.388699'),
('f13b78', 'SA3G4TDGHS', 'YTOR-1736', '9a030bf80299', '11', 'Dinero', '2023-04-02 00:51:45.892530'),
('fec369', 'ILC54VE93T', 'QNBZ-8392', '3859d26cd9a5', '7', 'Dinero', '2023-04-01 09:08:49.483946'),
('ffdf3f', 'U6FSTI13ZH', 'GUFC-9526', 'fe6bb69bdd29', '10', 'Dinero', '2023-04-01 09:08:49.444885');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_products`
--

CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('06dc36c1be', 'FCWU-5762', 'Philly Cheesesteak', 'cheesestk.jpg', 'A cheesesteak is a sandwich made from thinly sliced pieces of beefsteak and melted cheese in a long hoagie roll. A popular regional fast food, it has its roots in the U.S. city of Philadelphia, Pennsylvania.', '7', '2022-09-03 11:02:47.738370'),
('0c4b5c0604', 'JRZN-9518', 'Spaghetti Bolognese', 'spaghetti_bolognese.jpg', 'Spaghetti bolognese consists of spaghetti (long strings of pasta) with an Italian ragÃ¹ (meat sauce) made with minced beef, bacon and tomatoes, served with Parmesan cheese. Spaghetti bolognese is one of the most popular pasta dishes eaten outside of Italy.', '15', '2022-09-03 10:43:27.610897'),
('14c7b6370e', 'QZHM-0391', 'Reuben Sandwich', 'reubensandwich.jpg', 'The Reuben sandwich is a North American grilled sandwich composed of corned beef, Swiss cheese, sauerkraut, and Thousand Island dressing or Russian dressing, grilled between slices of rye bread. It is associated with kosher-style delicatessens, but is not kosher because it combines meat and cheese.', '8', '2022-09-03 10:58:04.069144'),
('1e0fa41eee', 'ICFU-1406', 'Submarine Sandwich', 'submarine_sndwh.jpg', 'A submarine sandwich, commonly known as a sub, hoagie, hero, Italian, grinder, wedge, or a spuckie, is a type of American cold or hot sandwich made from a cylindrical bread roll split lengthwise and filled with meats, cheeses, vegetables, and condiments. It has many different names.', '8', '2022-09-03 10:55:23.020144'),
('2b976e49a0', 'CEWV-9438', 'Cheeseburger', 'cheeseburgers.jpg', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. Cheeseburgers can include variations in structure, ingredients and composition.', '3', '2022-09-03 10:45:47.282634'),
('2fdec9bdfb', 'UJAK-9614', 'Jambalaya', 'Jambalaya.jpg', 'Jambalaya is an American Creole and Cajun rice dish of French, African, and Spanish influence, consisting mainly of meat and vegetables mixed with rice.', '9', '2022-09-03 10:48:49.593618'),
('31dfcc94cf', 'SYQP-3710', 'Buffalo Wings', 'buffalo_wings.jpg', 'A Buffalo wing in American cuisine is an unbreaded chicken wing section that is generally deep-fried and then coated or dipped in a sauce consisting of a vinegar-based cayenne pepper hot sauce and melted butter prior to serving.', '11', '2022-09-03 10:51:09.829079'),
('3adfdee116', 'HIPF-5346', 'Enchiladas', 'enchiladas.jpg', 'An enchilada is a corn tortilla rolled around a filling and covered with a savory sauce. Originally from Mexican cuisine, enchiladas can be filled with various ingredients, including meats, cheese, beans, potatoes, vegetables, or combinations', '10', '2022-09-03 12:52:26.427554'),
('3d19e0bf27', 'EMBH-6714', 'Cincinnati Chili', 'cincinnatichili.jpg', 'Cincinnati chili is a Mediterranean-spiced meat sauce used as a topping for spaghetti or hot dogs; both dishes were developed by immigrant restaurateurs in the 1920s. In 2013, Smithsonian named one local chili parlor one of the \"20 Most Iconic Food Destinations in America\".', '9', '2022-09-03 12:57:39.265554'),
('4e68e0dd49', 'QLKW-0914', 'Caramel Macchiato', '', 'Steamed milk, espresso and caramel; what could be more enticing? This blissful flavor is a favorite of coffee lovers due to its deliciously bold taste of creamy caramel and strong coffee flavor. These', '4', '2022-09-03 08:55:51.237667'),
('5d66c79953', 'GOEW-9248', 'Cheese Curd', 'cheesecurd.jpg', 'Cheese curds are moist pieces of curdled milk, eaten either alone or as a snack, or used in prepared dishes. These are chiefly found in Quebec, in the dish poutine, throughout Canada, and in the northeastern, midwestern, mountain, and Pacific Northwestern United States, especially in Wisconsin and Minnesota.', '6', '2022-09-03 11:22:25.639690'),
('826e6f687f', 'AYFW-2683', 'Margherita Pizza', 'margherita-pizza0.jpg', 'Pizza margherita, as the Italians call it, is a simple pizza hailing from Naples. When done right, margherita pizza features a bubbly crust, crushed San Marzano tomato sauce, fresh mozzarella and basil, a drizzle of olive oil, and a sprinkle of salt.', '12', '2022-09-03 08:02:57.213354'),
('8dd1968370', 'MJAZ-1306', 'Sajta', 'imagen_2023-03-31_233205300.png', 'Sajta de pollo', '10', '2023-04-01 03:32:30.521709'),
('97972e8d63', 'CVWJ-6492', 'Irish Coffee', 'irishcoffee.jpg', 'Irish coffee is a caffeinated alcoholic drink consisting of Irish whiskey, hot coffee, and sugar, stirred, and topped with cream The coffee is drunk through the cream', '11', '2022-09-03 13:08:19.157649'),
('a419f2ef1c', 'EPNX-3728', 'Chicken Nugget', 'chicnuggets.jpeg', 'A chicken nugget is a food product consisting of a small piece of deboned chicken meat that is breaded or battered, then deep-fried or baked. Invented in the 1950s, chicken nuggets have become a very popular fast food restaurant item, as well as widely sold frozen for home use', '5', '2022-09-03 12:44:07.749371'),
('a5931158fe', 'ELQN-5204', 'Pulled Pork', 'pulledprk.jpeg', 'Pulled pork is an American barbecue dish, more specifically a dish of the Southern U.S., based on shredded barbecued pork shoulder. It is typically slow-smoked over wood; indoor variations use a slow cooker. The meat is then shredded manually and mixed with a sauce', '8', '2022-09-03 13:04:12.191403'),
('b2f9c250fd', 'XNWR-2768', 'Strawberry Rhubarb Pie', 'rhuharbpie.jpg', 'Rhubarb pie is a pie with a rhubarb filling. Popular in the UK, where rhubarb has been cultivated since the 1600s, and the leaf stalks eaten since the 1700s. Besides diced rhubarb, it almost always contains a large amount of sugar to balance the intense tartness of the plant', '7', '2022-09-03 13:06:28.235333'),
('bd200ef837', 'HEIY-6034', 'Turkish Coffee', 'turkshcoffee.jpg', 'Turkish coffee is a style of coffee prepared in a cezve using very finely ground coffee beans without filtering.', '8', '2022-09-03 13:09:50.234898'),
('cff0cb495a', 'ZOBW-2640', 'Americano', '', 'Many espresso-based drinks use milk, but not the cafÃ© Americano â€“ or simply \'Americano\'. The drink also uses espresso but is infused with hot water instead of milk. The result is a coffee beverage ', '3', '2022-09-03 08:56:18.824990'),
('d57cd89073', 'ZGQW-9480', 'Country Fried Steak', 'country_fried_stk.jpg', 'Chicken-fried steak, also known as country-fried steak or CFS, is an American breaded cutlet dish consisting of a piece of beefsteak coated with seasoned flour and either deep-fried or pan-fried. It is sometimes associated with the Southern cuisine of the United States.', '10', '2022-09-03 11:00:05.523519'),
('d9aed17627', 'FIKD-9703', 'Crab Cake', 'crabcakes.jpg', 'A crab cake is a variety of fishcake that is popular in the United States. It is composed of crab meat and various other ingredients, such as bread crumbs, mayonnaise, mustard, eggs, and seasonings. The cake is then sautÃ©ed, baked, grilled, deep fried, or broiled.', '16', '2022-09-03 12:54:52.120847'),
('e2195f8190', 'HKCR-2178', 'Carbonara', 'carbonaraimgre.jpg', 'Carbonara is an Italian pasta dish from Rome made with eggs, hard cheese, cured pork, and black pepper. The dish arrived at its modern form, with its current name, in the middle of the 20th century. The cheese is usually Pecorino Romano, Parmigiano-Reggiano, or a combination of the two.', '16', '2022-09-03 10:23:06.266420'),
('e2af35d095', 'IDLC-7819', 'Pepperoni Pizza', 'peperopizza.jpg', 'Pepperoni is an American variety of spicy salami made from cured pork and beef seasoned with paprika or other chili pepper. Prior to cooking, pepperoni is characteristically soft, slightly smoky, and bright red. Thinly sliced pepperoni is one of the most popular pizza toppings in American pizzerias.', '7', '2022-09-03 12:49:01.017677'),
('e769e274a3', 'AHRW-3894', 'Frappuccino', 'frappuccino.jpg', 'Frappuccino is a line of blended iced coffee drinks sold by Starbucks. It consists of coffee or crÃ¨me base, blended with ice and ingredients such as flavored syrups and usually topped with whipped cream and or spices.', '3', '2022-09-03 13:11:30.109467'),
('ec18c5a4f0', 'PQFV-7049', 'Corn Dogs', 'corndog.jpg', 'A corn dog is a sausage on a stick that has been coated in a thick layer of cornmeal batter and deep fried. It originated in the United States and is commonly found in American cuisine', '4', '2022-09-03 13:00:32.787354'),
('f4ce3927bf', 'EAHD-1980', 'Hot Dog', 'hotdog0.jpg', 'A hot dog is a food consisting of a grilled or steamed sausage served in the slit of a partially sliced bun. The term hot dog can also refer to the sausage itself. The sausage used is a wiener or a frankfurter. The names of these sausages also commonly refer to their assembled dish.', '4', '2022-09-03 10:53:04.965223'),
('f9c2770a32', 'YXLA-2603', 'Whipped Milk Shake', 'milkshake.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '8', '2022-09-03 08:54:02.727645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_staff`
--

CREATE TABLE `rpos_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rpos_staff`
--

INSERT INTO `rpos_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(3, 'Cajero Zeballo', 'VDKO-8237', 'zeballos6@gmail.com', '3ad7c50b93459e46c2494a7fb957e63380326270', '2023-04-02 01:36:49.033726');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `rpos_customers`
--
ALTER TABLE `rpos_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`);

--
-- Indices de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indices de la tabla `rpos_payments`
--
ALTER TABLE `rpos_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indices de la tabla `rpos_products`
--
ALTER TABLE `rpos_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `rpos_staff`
--
ALTER TABLE `rpos_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
