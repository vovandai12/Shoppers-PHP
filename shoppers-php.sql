-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2021 lúc 06:17 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppers-php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `decentralization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `pass`, `decentralization`) VALUES
(1, 'Admin', 'vodai109@gmail.com', 'admin', 'Quản trị'),
(2, 'Admin1', 'vodai106@gmail.com', 'admin1', 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(225) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idCart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `nation`, `firstname`, `lastname`, `companyname`, `address`, `country`, `zip`, `email`, `phone`, `note`, `status`, `date`, `idCart`) VALUES
(10, 'ALGERIA', 'Alfreds', 'Alfreds', 'Office', 'HoaKy / 15 Hoa ky', 'Nitown', 'M456', 'Berlin7@gmail.com', 23456789, 'Thank you', 'Being transported', '2021-12-13 03:37:58', '07b9fbd33f777b9f2e9c10d95464222e0'),
(11, 'LAND ISLANDS', 'kkkk', 'Ana', 'kkkk', 'kkk / kkkkk', 'kkk', 'kkkk', 'DF1@gmail.com', 123, 'kkkkk', 'Being transported', '2021-12-13 21:13:03', 'fa7f08233358e9b466effa13281685273');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idcart` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `image`, `product`, `price`, `quantity`, `total`, `date`, `idcart`) VALUES
(28, 'cloth_3.jpg shoe_1.jpg ', 'T-Shirt Mockup / T-Shirt Mockup / ', '50.00 / 50.00 / ', '1 / 1 / ', '50 / 50 / ', '2021-12-13 03:02:29', 'Berlin7@gmail.com'),
(31, 'cloth_3.jpg|cloth_2.jpg|', 'T-Shirt Mockup / T-Shirt Mockup / ', '50.00 / 50.00 / ', '3 / 4 / ', '150 / 200 / ', '2021-12-13 21:12:40', 'DF1@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `subject`, `message`, `date`) VALUES
(11, 'Alfreds', 'Alfreds', 'Berlin7@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(12, 'Ana', 'Ana', 'DF1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(13, 'Antonio', 'Antonio', 'London1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(14, 'Around', 'Around', 'Moreno1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(15, 'Berglunds', 'Berglunds', 'Strasbourg1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(16, 'Blauer', 'Blauer', 'snab8@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(17, 'Blondel', 'Blondel', 'Comidas1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(18, 'Blido', 'Blido', 'Dollar1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00'),
(19, 'Bon', 'Bon', 'Comidas1@gmail.com', 'Message', 'Thank you store. Excellent product', '2021-12-10 09:40:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nation`
--

CREATE TABLE `nation` (
  `id` int(255) NOT NULL,
  `nation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nation`
--

INSERT INTO `nation` (`id`, `nation`) VALUES
(1, 'AFGHANISTAN'),
(2, 'LAND ISLANDS'),
(3, 'ALBANIA'),
(4, 'ALGERIA'),
(5, 'AMERICAN SAMOA'),
(6, 'ANDORRA'),
(7, 'ANGOLA'),
(8, 'ANGUILLA'),
(9, 'ANTARCTICA'),
(10, 'ANTIGUA AND BARBUDA'),
(11, 'ARGENTINA'),
(12, 'ARMENIA'),
(13, 'ARUBA'),
(14, 'AUSTRALIA'),
(15, 'AUSTRIA'),
(16, 'AZERBAIJAN'),
(17, 'BAHAMAS'),
(18, 'BAHRAIN'),
(19, 'BANGLADES'),
(20, 'BARBADOS'),
(21, 'BELARUS'),
(22, 'BELGIUM'),
(23, 'BELIZE'),
(24, 'BENIN'),
(25, 'BERMUDA'),
(26, 'BHUTAN'),
(27, 'BOLIVIA'),
(28, 'BOSNIA AND HERZEGOVINA'),
(29, 'BOTSWANA'),
(30, 'BOUVET ISLAND'),
(31, 'BRAZIL'),
(32, 'BRITISH INDIAN OCEAN TERRITORY'),
(33, 'BRUNEI DARUSSALAM'),
(34, 'BULGARIA'),
(35, 'BURKINA FASO'),
(36, 'BURUNDI'),
(37, 'CAMBODIA'),
(38, 'CAMEROON'),
(39, 'CANADA'),
(40, 'CAPE VERDE'),
(41, 'CAYMAN ISLANDS'),
(42, 'CENTRAL AFRICAN REPUBLIC'),
(43, 'CHAD'),
(44, 'CHILE'),
(45, 'CHINA'),
(46, 'CHRISTMAS ISLAND'),
(47, 'COCOS (KEELING) ISLANDS'),
(48, 'COLOMBIA'),
(49, 'COMOROS'),
(50, 'CONGO'),
(51, 'CONGO'),
(52, 'COOK ISLANDS'),
(53, 'COSTA RICA'),
(54, 'CÔTE DIVOIRE'),
(55, 'CROATIA'),
(56, 'CUBA'),
(57, 'CYPRUS'),
(58, 'CZECH REPUBLIC'),
(59, 'DENMARK'),
(60, 'DJIBOUTI'),
(61, 'DOMINICA'),
(62, 'DOMINICAN REPUBLIC'),
(63, 'ECUADOR'),
(64, 'EGYPT'),
(65, 'EL SALVADOR'),
(66, 'EQUATORIAL GUINEA'),
(67, 'ERITREA'),
(68, 'ESTONIA'),
(69, 'ETHIOPIA'),
(70, 'FALKLAND ISLANDS'),
(71, 'FAROE ISLANDS'),
(72, 'FIJI'),
(73, 'FINLAND'),
(74, 'FRANCE'),
(75, 'FRENCH GUIANA'),
(76, 'FRENCH POLYNESIA'),
(77, 'FRENCH SOUTHERN TERRITORIES'),
(78, 'GABON'),
(79, 'GAMBIA'),
(80, 'GEORGIA'),
(81, 'GERMANY'),
(82, 'GHANA'),
(83, 'GIBRALTAR'),
(84, 'GREECE'),
(85, 'GREENLAND'),
(86, 'GRENADA'),
(87, 'GUADELOUPE'),
(88, 'GUAM'),
(89, 'GUATEMALA'),
(90, 'GUINEA'),
(91, 'GUINEA-BISSAU'),
(92, 'GUYANA'),
(93, 'HAITI'),
(94, 'HEARD ISLAND AND MCDONALD ISLANDS'),
(95, 'HOLY SEE'),
(96, 'HONDURAS'),
(97, 'HONG KONG'),
(98, 'HUNGARY'),
(99, 'ICELAND'),
(100, 'INDIA'),
(101, 'INDONESIA'),
(102, 'IRAN'),
(103, 'IRAQ'),
(104, 'IRELAND'),
(105, 'ISRAEL'),
(106, 'ITALY'),
(107, 'JAMAICA'),
(108, 'JAPAN'),
(109, 'JORDAN'),
(110, 'KAZAKHSTAN'),
(111, 'KENYA'),
(112, 'KIRIBATI'),
(113, 'KOREA'),
(114, 'KUWAIT'),
(115, 'KYRGYZSTAN'),
(116, 'LAO'),
(117, 'LATVIA'),
(118, 'LEBANON'),
(119, 'LESOTHO'),
(120, 'LIBERIA'),
(121, 'LIBYAN ARAB JAMAHIRIYA'),
(122, 'LIECHTENSTEIN'),
(123, 'LITHUANIA'),
(124, 'LUXEMBOURG'),
(125, 'MACAO'),
(126, 'MACEDONIA'),
(127, 'MADAGASCAR'),
(128, 'MALAWI'),
(129, 'MALAYSIA'),
(130, 'MALDIVES'),
(131, 'MALI'),
(132, 'MALTA'),
(133, 'MARSHALL ISLANDS'),
(134, 'MARTINIQUE'),
(135, 'MAURITANIA'),
(136, 'MAURITIUS'),
(137, 'MAYOTTE'),
(138, 'MEXICO'),
(139, 'MICRONESIA'),
(140, 'MOLDOVA'),
(141, 'MONACO'),
(142, 'MONGOLIA'),
(143, 'MONTSERRAT'),
(144, 'MOROCCO'),
(145, 'MOZAMBIQUE'),
(146, 'MYANMAR'),
(147, 'NAMIBIA'),
(148, 'NAURU'),
(149, 'NEPAL'),
(150, 'NETHERLANDS'),
(151, 'NETHERLANDS ANTILLES'),
(152, 'NEW CALEDONIA'),
(153, 'NEW ZEALAND'),
(154, 'NICARAGUA'),
(155, 'NIGER'),
(156, 'NIGERIA'),
(157, 'NIUE'),
(158, 'NORFOLK ISLAND'),
(159, 'NORTHERN MARIANA ISLAND'),
(160, 'NORWAY'),
(161, 'OMAN'),
(162, 'PAKISTAN'),
(163, 'PALAU'),
(164, 'PALESTINIA'),
(165, 'PANAMA'),
(166, 'PAPUA NEW GUINEA'),
(167, 'PARAGUAY'),
(168, 'PERU'),
(169, 'PHILIPPINES'),
(170, 'PITCAIRN'),
(171, 'POLAND'),
(172, 'PORTUGAL'),
(173, 'PUERTO RICO'),
(174, 'QATAR'),
(175, 'RUNION'),
(176, 'ROMANIA'),
(177, 'RUSSIAN FEDERATION'),
(178, 'RWANDA'),
(179, 'SAINT HELENA'),
(180, 'SAMOA'),
(181, 'SAN MARIN'),
(182, 'SAO TOME AND PRINCIPE'),
(183, 'SAUDI ARABIA'),
(184, 'SENEGAL'),
(185, 'SERBIA AND MONTENEGRO'),
(186, 'SEYCHELLES'),
(187, 'SIERRA LEONE'),
(188, 'SINGAPORE'),
(189, 'SLOVAKIA'),
(190, 'SLOVENIA'),
(191, 'SOLOMON ISLANDS'),
(192, 'SOMALIA'),
(193, 'SOUTH'),
(194, 'SPAIN'),
(195, 'SURINAME'),
(196, 'SVALBARD AND JAN MAYEN'),
(197, 'SWAZILAND'),
(198, 'SWEDEN'),
(199, 'SWITZERLAND'),
(200, 'SYRIAN ARAB REPUBLIC'),
(201, 'TAIWA'),
(202, 'TAJIKISTAN'),
(203, 'TANZANIA, UNITED REPUBLIC'),
(204, 'THAILAND'),
(205, 'TIMOR-LESTE'),
(206, 'TOGO'),
(207, 'TOKELAU'),
(208, 'TONGA'),
(209, 'TRINIDAD AND TOBAGO'),
(210, 'TUNISIA'),
(211, 'TURKEY'),
(212, 'TURKMENISTAN'),
(213, 'TURKS AND CAICOS ISLANDS'),
(214, 'TUVALU'),
(215, 'UGANDA'),
(216, 'UKRAINE'),
(217, 'UNITED'),
(218, 'URUGUAY'),
(219, 'UZBEKISTA'),
(220, 'VANUATU'),
(221, 'Vatican'),
(222, 'VENEZUELA'),
(223, 'VIET NAM'),
(224, 'VIRGIN'),
(225, 'WALLIS AND FUTUNA'),
(226, 'WESTERN SAHAR'),
(227, 'YEMEN'),
(228, 'ZAMBIA'),
(229, 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `sale` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `view` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `categories`, `size`, `color`, `title`, `sale`, `created_at`, `update_at`, `view`) VALUES
(3, 'T-Shirt Mockup', 50.00, 'cloth_3.jpg', 'Children', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', '2021-12-09 07:24:35', 0),
(4, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Children', 'Small', 'Blue', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(5, 'T-Shirt Mockup', 50.00, 'cloth_2.jpg', 'Women', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(6, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Children', 'Small', 'Green', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(7, 'T-Shirt Mockup', 50.00, 'cloth_2.jpg', 'Children', 'Small', 'Blue', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(8, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Children', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(9, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Men', 'Small', 'Purple', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(10, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Women', 'Small', 'Blue', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(11, 'T-Shirt Mockup', 50.00, 'cloth_2.jpg', 'Men', 'Small', 'Purple', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(12, 'T-Shirt Mockup', 50.00, 'cloth_3.jpg', 'Children', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(13, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Men', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(14, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Children', 'Small', 'Purple', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(15, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Women', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(16, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Children', 'Small', 'Green', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(17, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Men', 'Small', 'Purple', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(18, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Children', 'Small', 'Green', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(19, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Women', 'Small', 'Red', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(20, 'T-Shirt Mockup', 50.00, 'shoe_1.jpg', 'Women', 'Small', 'Green', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(21, 'T-Shirt Mockup', 50.00, 'cloth_1.jpg', 'Men', 'Small', 'Purple', 'Finding perfect products', 20, '2021-12-09 05:00:00', NULL, 0),
(22, 'T-Shirt Mockup', 60.00, 'cloth_3.jpg', 'Men', 'Medium', 'Purple', 'Finding perfect products', 15, '2021-12-09 05:00:00', '2021-12-09 07:25:36', 0),
(23, 'Tank Top', 12.00, 'cloth_2.jpg', 'Women', 'Large', 'Blue', 'Finding perfect t-shirt', 12, '2021-12-09 07:34:06', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(2, 'Ana', 'DF1@gmail.com', 'usertest'),
(3, 'Antonio', 'Moreno1@gmail.com', 'usertest'),
(4, 'Around', 'London1@gmail.com', 'usertest'),
(5, 'Berglunds', 'snab8@gmail.com', 'usertest'),
(6, 'Blauer', 'See1@gmail.com', 'usertest'),
(7, 'Blondel', 'Strasbourg1@gmail.com', 'usertest'),
(8, 'Blido', 'Comidas1@gmail.com', 'usertest'),
(9, 'Bon', 'Marseille1@gmail.com', 'usertest'),
(10, 'Bottom', 'Dollar1@gmail.com', 'usertest'),
(11, 'Beverages', 'London1@gmail.com', 'usertest'),
(12, 'Cactus', 'Comidas1@gmail.com', 'usertest'),
(13, 'Centro', 'comercial1@gmail.com', 'usertest'),
(14, 'Chop', 'suey1@gmail.com', 'usertest'),
(15, 'Mineiro', 'Paulo1@gmail.com', 'usertest'),
(16, 'Consolidated', 'Holdings1@gmail.com', 'usertest'),
(17, 'Drachenblut', 'Delikatessend1@gmail.com', 'usertest'),
(18, 'Dua', 'monde1@gmail.com', 'usertest'),
(19, 'Eastern', 'Connection1@gmail.com', 'usertest'),
(20, 'Ernst', 'Handel1@gmail.com', 'usertest'),
(21, 'Familia', 'Arquibaldo1@gmail.com', 'usertest'),
(22, 'Fabrica', 'Inter1@gmail.com', 'usertest'),
(23, 'Folies', 'gourmandes1@gmail.com', 'usertest'),
(24, 'Folk', 'och1@gmail.com', 'usertest'),
(25, 'Frankenversand', 'Mnchen1@gmail.com', 'usertest'),
(26, 'France', 'restauration1@gmail.com', 'usertest'),
(27, 'Franchi', 'Torino1@gmail.com', 'usertest'),
(28, 'Furia', 'Bacalhau1@gmail.com', 'usertest'),
(29, 'Barcelona', '1@gmail.com', 'usertest'),
(30, 'Godos', 'Cocina1@gmail.com', 'usertest'),
(31, 'Gourmet', 'Lanchonetes1@gmail.com', 'usertest'),
(32, 'Great', 'Lakes1@gmail.com', 'usertest'),
(33, 'GROSELLA-Restaurante', 'Caracas1@gmail.com', 'usertest'),
(34, 'Hanari', 'Carnes1@gmail.com', 'usertest'),
(35, 'Abastos', 'San1@gmail.com', 'usertest'),
(36, 'Hungry', 'Coyote1@gmail.com', 'usertest'),
(37, 'Hungry', 'Owl1@gmail.com', 'usertest'),
(38, 'Island', 'Trading1@gmail.com', 'usertest');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
