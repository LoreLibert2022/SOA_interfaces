-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2021 a las 12:27:30
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `di21`
--
CREATE DATABASE IF NOT EXISTS `id18268330_di21` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id18268330_di21`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_Producto` int(11) NOT NULL,
  `producto` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(254) COLLATE latin1_spanish_ci NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  `stock` int(7) NOT NULL,
  `precio_Compra` decimal(7,2) NOT NULL,
  `precio_Venta` decimal(7,2) NOT NULL,
  `stock_Vendido` int(7) NOT NULL,
  `stock_Minimo` int(7) NOT NULL,
  `activo` char(1) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_Producto`, `producto`, `descripcion`, `id_Categoria`, `stock`, `precio_Compra`, `precio_Venta`, `stock_Vendido`, `stock_Minimo`, `activo`) VALUES
(1, '1969 Harley Davidson Ultimate Chopper', 'This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.', 5, 7933, '48.81', '95.70', 793, 529, 'S'),
(2, '1952 Alpine Renault 1300', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 7305, '98.58', '214.30', 731, 487, 'S'),
(3, '1996 Moto Guzzi 1100i', 'Official Moto Guzzi logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with c', 5, 6625, '68.99', '118.94', 663, 442, 'S'),
(4, '2003 Harley-Davidson Eagle Drag Bike', 'Model features, official Harley Davidson logos and insignias, detachable rear wheelie bar, heavy diecast metal with resin parts, authentic multi-color tampo-printed graphics, separate engine drive belts, free-turning front fork, rotating tires and rear r', 5, 5582, '91.02', '193.66', 558, 372, 'S'),
(5, '1972 Alfa Romeo GTA', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 3252, '85.68', '136.00', 325, 217, 'S'),
(6, '1962 LanciaA Delta 16V', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 6791, '103.42', '147.74', 679, 453, 'S'),
(7, '1968 Ford Mustang', 'Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color dark green.', 6, 68, '95.34', '194.57', 7, 700, 'S'),
(8, '2001 Ferrari Enzo', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 3619, '95.59', '207.80', 362, 241, 'S'),
(9, '1958 Setra Bus', 'Model features 30 windows, skylights & glare resistant glass, working steering system, original logos', 7, 1579, '77.90', '136.67', 158, 105, 'S'),
(10, '2002 Suzuki XREO', 'Official logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with chrome accen', 5, 9997, '66.27', '150.62', 1000, 666, 'S'),
(11, '1969 Corvair Monza', '1:18 scale die-cast about 10\" long doors open, hood opens, trunk opens and wheels roll', 6, 6906, '89.14', '151.08', 691, 460, 'S'),
(12, '1968 Dodge Charger', '1:12 scale model of a 1968 Dodge Charger. Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color black', 6, 9123, '75.16', '117.44', 912, 608, 'S'),
(13, '1969 Ford Falcon', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 1049, '83.05', '173.02', 105, 70, 'S'),
(14, '1970 Plymouth Hemi Cuda', 'Very detailed 1970 Plymouth Cuda model in 1:12 scale. The Cuda is generally accepted as one of the fastest original muscle cars from the 1970s. This model is a reproduction of one of the orginal 652 cars built in 1970. Red color.', 6, 5663, '31.92', '79.80', 566, 378, 'S'),
(15, '1957 Chevy Pickup', '1:12 scale die-cast about 20\" long Hood opens, Rubber wheels', 7, 6125, '55.70', '118.50', 613, 408, 'S'),
(16, '1969 Dodge Charger', 'Detailed model of the 1969 Dodge Charger. This model includes finely detailed interior and exterior features. Painted in red and white.', 6, 7323, '58.73', '115.16', 732, 488, 'S'),
(17, '1940 Ford Pickup Truck', 'This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood,  removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box', 7, 2613, '58.33', '116.67', 261, 174, 'S'),
(18, '1993 Mazda RX-7', 'This model features, opening hood, opening doors, detailed engine, rear spoiler, opening trunk, working steering, tinted windows, baked enamel finish. Color red.', 6, 3975, '83.51', '141.54', 398, 265, 'S'),
(19, '1937 Lincoln Berline', 'Features opening engine cover, doors, trunk, and fuel filler cap. Color black', 1, 8693, '60.62', '102.74', 869, 580, 'S'),
(20, '1936 Mercedes-Benz 500K Special Roadster', 'This 1:18 scale replica is constructed of heavy die-cast metal and has all the features of the original: working doors and rumble seat, independent spring suspension, detailed interior, working steering system, and a bifold hood that reveals an engine so', 1, 8635, '24.26', '53.91', 864, 576, 'S'),
(21, '1965 Aston Martin DB5', 'Die-cast model of the silver 1965 Aston Martin DB5 in silver. This model includes full wire wheels and doors that open with fully detailed passenger compartment. In 1:18 scale, this model measures approximately 10 inches/20 cm long.', 6, 9042, '65.96', '124.44', 904, 603, 'S'),
(22, '1980s Black Hawk Helicopter', '1:18 scale replica of actual Army\'s UH-60L BLACK HAWK Helicopter. 100% hand-assembled. Features rotating rotor blades, propeller blades and rubber wheels.', 4, 5330, '77.27', '157.69', 533, 355, 'S'),
(23, '1917 Grand Touring Sedan', 'This 1:18 scale replica of the 1917 Grand Touring car has all the features you would expect from museum quality reproductions: all four doors and bi-fold hood opening, detailed engine and instrument panel, chrome-look trim, and tufted upholstery, all top', 1, 2724, '86.70', '170.00', 272, 182, 'S'),
(24, '1948 Porsche 356-A Roadster', 'This precision die-cast replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel ', 6, 8826, '53.90', '77.00', 883, 588, 'S'),
(25, '1995 Honda Civic', 'This model features, opening hood, opening doors, detailed engine, rear spoiler, opening trunk, working steering, tinted windows, baked enamel finish. Color yellow.', 6, 9772, '93.89', '142.25', 977, 651, 'S'),
(26, '1998 Chrysler Plymouth Prowler', 'Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 4724, '101.51', '163.73', 472, 315, 'S'),
(27, '1911 Ford Town Car', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system.', 1, 540, '33.30', '60.54', 54, 700, 'S'),
(28, '1964 Mercedes Tour Bus', 'Exact replica. 100+ parts. working steering system, original logos', 7, 8258, '74.86', '122.73', 826, 551, 'S'),
(29, '1932 Model A Ford J-Coupe', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system, chrome-covered spare, opening doors, detailed and wired engine', 1, 9354, '58.48', '127.13', 935, 624, 'S'),
(30, '1926 Ford Fire Engine', 'Gleaming red handsome appearance. Everything is here the fire hoses, ladder, axes, bells, lanterns, ready to fight any inferno.', 7, 2018, '24.92', '60.77', 202, 135, 'S'),
(31, 'P-51-D Mustang', 'Has retractable wheels and comes with a stand', 4, 992, '49.00', '84.48', 99, 66, 'S'),
(32, '1936 Harley Davidson El Knucklehead', 'Intricately detailed with chrome accents and trim, official die-struck logos and baked enamel finish.', 5, 4357, '24.23', '60.57', 436, 290, 'S'),
(33, '1928 Mercedes-Benz SSK', 'This 1:18 replica features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system, chrome-covered spare, opening doors, detailed and wired engine. Color black.', 1, 548, '72.56', '168.75', 55, 700, 'S'),
(34, '1999 Indy 500 Monte Carlo SS', 'Features include opening and closing doors. Color: Red', 6, 8164, '56.76', '132.00', 816, 544, 'S'),
(35, '1913 Ford Model T Speedster', 'This 250 part reproduction includes moving handbrakes, clutch, throttle and foot pedals, squeezable horn, detailed wired engine, removable water, gas, and oil cans, pivoting monocle windshield, all topped with a baked enamel red finish. Each replica come', 1, 4189, '60.78', '101.31', 419, 279, 'S'),
(36, '1934 Ford V8 Coupe', 'Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System', 1, 5649, '34.35', '62.46', 565, 377, 'S'),
(37, '1999 Yamaha Speed Boat', 'Exact replica. Wood and Metal. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 2, 4259, '51.61', '86.02', 426, 284, 'S'),
(38, '18th Century Vintage Horse Carriage', 'Hand crafted diecast-like metal horse carriage is re-created in about 1:18 scale of antique horse carriage. This antique style metal Stagecoach is all hand-assembled with many different parts.\r\n\r\nThis collectible metal horse carriage is painted in classi', 1, 5992, '60.74', '104.72', 599, 399, 'S'),
(39, '1903 Ford Model A', 'Features opening trunk,  working steering system', 1, 3913, '68.30', '136.59', 391, 261, 'S'),
(40, '1992 Ferrari 360 Spider red', 'his replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 6, 8347, '77.90', '169.34', 835, 556, 'S'),
(41, '1985 Toyota Supra', 'This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood, removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box', 6, 7733, '57.01', '107.57', 773, 516, 'S'),
(42, 'Collectable Wooden Train', 'Hand crafted wooden toy train set is in about 1:18 scale, 25 inches in total length including 2 additional carts, of actual vintage train. This antique style wooden toy train model set is all hand-assembled with 100% wood.', 3, 6450, '67.56', '100.84', 645, 430, 'S'),
(43, '1969 Dodge Super Bee', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 6, 1917, '49.05', '80.41', 192, 128, 'S'),
(44, '1917 Maxwell Touring Car', 'Features Gold Trim, Full Size Spare Tire, Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System', 1, 7913, '57.54', '99.21', 791, 528, 'S'),
(45, '1976 Ford Gran Torino', 'Highly detailed 1976 Ford Gran Torino \"Starsky and Hutch\" diecast model. Very well constructed and painted in red and white patterns.', 6, 9127, '73.49', '146.99', 913, 608, 'S'),
(46, '1948 Porsche Type 356 Roadster', 'This model features working front and rear suspension on accurately replicated and actuating shock absorbers as well as opening engine cover, rear stabilizer flap,  and 4 opening doors.', 6, 8990, '62.16', '141.28', 899, 599, 'S'),
(47, '1957 Vespa GS150', 'Features rotating wheels , working kick stand. Comes with stand.', 5, 7689, '32.95', '62.17', 769, 513, 'S'),
(48, '1941 Chevrolet Special Deluxe Cabriolet', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system, leather upholstery. Color black.', 1, 2378, '64.58', '105.87', 238, 159, 'S'),
(49, '1970 Triumph Spitfire', 'Features include opening and closing doors. Color: White.', 6, 5545, '91.92', '143.62', 555, 370, 'S'),
(50, '1932 Alfa Romeo 8C2300 Spider Sport', 'This 1:18 scale precision die cast replica features the 6 front headlights of the original, plus a detailed version of the 142 horsepower straight 8 engine, dual spares and their famous comprehensive dashboard. Color black.', 1, 6553, '43.26', '92.03', 655, 437, 'S'),
(51, '1904 Buick Runabout', 'Features opening trunk,  working steering system', 1, 8290, '52.66', '87.77', 829, 553, 'S'),
(52, '1940s Ford truck', 'This 1940s Ford Pick-Up truck is re-created in 1:18 scale of original 1940s Ford truck. This antique style metal 1940s Ford Flatbed truck is all hand-assembled. This collectible 1940\'s Pick-Up truck is painted in classic dark green color, and features ro', 7, 3128, '84.76', '121.08', 313, 209, 'S'),
(53, '1939 Cadillac Limousine', 'Features completely detailed interior including Velvet flocked drapes,deluxe wood grain floor, and a wood grain casket with seperate chrome handles', 1, 6645, '23.14', '50.31', 665, 443, 'S'),
(54, '1957 Corvette Convertible', '1957 die cast Corvette Convertible in Roman Red with white sides and whitewall tires. 1:18 scale quality die-cast with detailed engine and underbvody. Now you can own The Classic Corvette.', 6, 1249, '69.93', '148.80', 125, 83, 'S'),
(55, '1957 Ford Thunderbird', 'This 1:18 scale precision die-cast replica, with its optional porthole hardtop and factory baked-enamel Thunderbird Bronze finish, is a 100% accurate rendition of this American classic.', 6, 3209, '34.21', '71.27', 321, 214, 'S'),
(56, '1970 Chevy Chevelle SS 454', 'This model features rotating wheels, working streering system and opening doors. All parts are particularly delicate due to their precise scale and require special care and attention. It should not be picked up by the doors, roof, hood or trunk.', 6, 1005, '49.24', '73.49', 101, 67, 'S'),
(57, '1970 Dodge Coronet', '1:24 scale die-cast about 18\" long doors open, hood opens and rubber wheels', 6, 4074, '32.37', '57.80', 407, 272, 'S'),
(58, '1997 BMW R 1100 S', 'Detailed scale replica with working suspension and constructed from over 70 parts', 5, 7003, '60.86', '112.70', 700, 467, 'S'),
(59, '1966 Shelby Cobra 427 S/C', 'This diecast model of the 1966 Shelby Cobra 427 S/C includes many authentic details and operating parts. The 1:24 scale model of this iconic lighweight sports car from the 1960s comes in silver and it\'s own display case.', 6, 8197, '29.18', '50.31', 820, 546, 'S'),
(60, '1928 British Royal Navy Airplane', 'Official logos and insignias', 4, 3627, '66.74', '109.42', 363, 242, 'S'),
(61, '1939 Chevrolet Deluxe Coupe', 'This 1:24 scale die-cast replica of the 1939 Chevrolet Deluxe Coupe has the same classy look as the original. Features opening trunk, hood and doors and a showroom quality baked enamel finish.', 1, 7332, '22.57', '33.19', 733, 489, 'S'),
(62, '1960 BSA Gold Star DBD34', 'Detailed scale replica with working suspension and constructed from over 70 parts', 5, 15, '37.32', '76.17', 2, 700, 'S'),
(63, '18th century schooner.', 'All wood with canvas sails. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with 4 masts, all square-rigged.', 2, 1898, '82.34', '122.89', 190, 127, 'S'),
(64, '1938 Cadillac V-16 Presidential Limousine', 'This 1:24 scale precision die cast replica of the 1938 Cadillac V-16 Presidential Limousine has all the details of the original, from the flags on the front to an opening back seat compartment complete with telephone and rifle. Features factory baked-ena', 1, 2847, '20.61', '44.80', 285, 190, 'S'),
(65, '1962 Volkswagen Microbus', 'This 1:18 scale die cast replica of the 1962 Microbus is loaded with features: A working steering system, opening front doors and tailgate, and famous two-tone factory baked enamel finish, are all topped of by the sliding, real fabric, sunroof.', 7, 2327, '61.34', '127.79', 233, 155, 'S'),
(66, '1982 Ducati 900 Monster', 'Features two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand', 5, 6840, '47.10', '69.26', 684, 456, 'S'),
(67, '1949 Jaguar XK 120', 'Precision-engineered from original Jaguar specification in perfect scale ratio. Features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent sp', 6, 2350, '47.25', '90.87', 235, 157, 'S'),
(68, '1958 Chevy Corvette Limited Edition', 'The operating parts of this 1958 Chevy Corvette Limited Edition are particularly delicate due to their precise scale and require special care and attention. Features rotating wheels, working streering, opening doors and trunk. Color dark green.', 6, 2542, '15.91', '35.36', 254, 169, 'S'),
(69, '1900s Vintage Bi-Plane', 'Hand crafted diecast-like metal bi-plane is re-created in about 1:24 scale of antique pioneer airplane. All hand-assembled with many different parts. Hand-painted in classic yellow and features correct markings of original airplane.', 4, 5942, '34.25', '68.51', 594, 396, 'S'),
(70, '1952 Citroen-15CV', 'Precision crafted hand-assembled 1:18 scale reproduction of the 1952 15CV, with its independent spring suspension, working steering system, opening doors and hood, detailed engine and instrument panel, all topped of with a factory fresh baked enamel fini', 6, 1452, '72.82', '117.44', 145, 97, 'S'),
(71, '1982 Lamborghini Diablo', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 6, 7723, '16.24', '37.76', 772, 515, 'S'),
(72, '1912 Ford Model T Delivery Wagon', 'This model features chrome trim and grille, opening hood, opening doors, opening trunk, detailed engine, working steering system. Color white.', 1, 9173, '46.91', '88.51', 917, 612, 'S'),
(73, '1969 Chevrolet Camaro Z28', '1969 Z/28 Chevy Camaro 1:24 scale replica. The operating parts of this limited edition 1:24 scale diecast model car 1969 Chevy Camaro Z28- hood, trunk, wheels, streering, suspension and doors- are particularly delicate due to their precise scale and requ', 6, 4695, '50.51', '85.61', 470, 313, 'S'),
(74, '1971 Alpine Renault 1600s', 'This 1971 Alpine Renault 1600s replica Features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked ', 6, 7995, '38.58', '61.23', 800, 533, 'S'),
(75, '1937 Horch 930V Limousine', 'Features opening hood, opening doors, opening trunk, wide white wall tires, front door arm rests, working steering system', 1, 2902, '26.30', '65.75', 290, 193, 'S'),
(76, '2002 Chevy Corvette', 'The operating parts of this limited edition Diecast 2002 Chevy Corvette 50th Anniversary Pace car Limited Edition are particularly delicate due to their precise scale and require special care and attention. Features rotating wheels, poseable streering, o', 6, 9446, '62.11', '107.08', 945, 630, 'S'),
(77, '1940 Ford Delivery Sedan', 'Chrome Trim, Chrome Grille, Opening Hood, Opening Doors, Opening Trunk, Detailed Engine, Working Steering System. Color black.', 1, 6621, '48.64', '83.86', 662, 441, 'S'),
(78, '1956 Porsche 356A Coupe', 'Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.', 6, 6600, '98.30', '140.43', 660, 440, 'S'),
(79, 'Corsair F4U ( Bird Cage)', 'Has retractable wheels and comes with a stand. Official logos and insignias.', 4, 6812, '29.34', '68.24', 681, 454, 'S'),
(80, '1936 Mercedes Benz 500k Roadster', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system and rubber wheels. Color black.', 1, 2081, '21.75', '41.03', 208, 139, 'S'),
(81, '1992 Porsche Cayenne Turbo Silver', 'This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.', 6, 6582, '69.78', '118.28', 658, 439, 'S'),
(82, '1936 Chrysler Airflow', 'Features opening trunk,  working steering system. Color dark green.', 1, 4710, '57.46', '97.39', 471, 314, 'S'),
(83, '1900s Vintage Tri-Plane', 'Hand crafted diecast-like metal Triplane is Re-created in about 1:24 scale of antique pioneer airplane. This antique style metal triplane is all hand-assembled with many different parts.', 4, 2756, '36.23', '72.45', 276, 184, 'S'),
(84, '1961 Chevrolet Impala', 'This 1:18 scale precision die-cast reproduction of the 1961 Chevrolet Impala has all the features-doors, hood and trunk that open; detailed 409 cubic-inch engine; chrome dashboard and stick shift, two-tone interior; working steering system; all topped of', 6, 7869, '32.33', '80.84', 787, 525, 'S'),
(85, '1980?s GM Manhattan Express', 'This 1980?s era new look Manhattan express is still active, running from the Bronx to mid-town Manhattan. Has 35 opeining windows and working lights. Needs a battery.', 7, 5099, '53.93', '96.31', 510, 340, 'S'),
(86, '1997 BMW F650 ST', 'Features official die-struck logos and baked enamel finish. Comes with stand.', 5, 178, '66.92', '99.89', 18, 700, 'S'),
(87, '1982 Ducati 996 R', 'Features rotating wheels , working kick stand. Comes with stand.', 5, 9241, '24.14', '40.23', 924, 616, 'S'),
(88, '1954 Greyhound Scenicruiser', 'Model features bi-level seating, 50 windows, skylights & glare resistant glass, working steering system, original logos', 7, 2874, '25.98', '54.11', 287, 192, 'S'),
(89, '1950\'s Chicago Surface Lines Streetcar', 'This streetcar is a joy to see. It has 80 separate windows, electric wire guides, detailed interiors with seats, poles and drivers controls, rolling and turning wheel assemblies, plus authentic factory baked-enamel finishes (Green Hornet for Chicago and ', 3, 8601, '26.72', '62.14', 860, 573, 'S'),
(90, '1996 Peterbilt 379 Stake Bed with Outrigger', 'This model features, opening doors, detailed engine, working steering, tinted windows, detailed interior, die-struck logos, removable stakes operating outriggers, detachable second trailer, functioning 360-degree self loader, precision molded resin trail', 7, 814, '33.61', '64.64', 81, 54, 'S'),
(91, '1928 Ford Phaeton Deluxe', 'This model features grille-mounted chrome horn, lift-up louvered hood, fold-down rumble seat, working steering system', 1, 136, '33.02', '68.79', 14, 700, 'S'),
(92, '1974 Ducati 350 Mk3 Desmo', 'This model features two-tone paint with chrome accents, superior die-cast detail , rotating wheels , working kick stand', 5, 3341, '56.13', '102.05', 334, 223, 'S'),
(93, '1930 Buick Marquette Phaeton', 'Features opening trunk,  working steering system', 1, 7062, '27.06', '43.64', 706, 471, 'S'),
(94, 'Diamond T620 Semi-Skirted Tanker', 'This limited edition model is licensed and perfectly scaled for Lionel Trains. The Diamond T620 has been produced in solid precision diecast and painted with a fire baked enamel finish. It comes with a removable tanker and is a perfect model to add authe', 7, 1016, '68.29', '115.75', 102, 68, 'S'),
(95, '1962 City of Detroit Streetcar', 'This streetcar is a joy to see. It has 99 separate windows, electric wire guides, detailed interiors with seats, poles and drivers controls, rolling and turning wheel assemblies, plus authentic factory baked-enamel finishes (Green Hornet for Chicago and ', 3, 1645, '37.49', '58.58', 165, 110, 'S'),
(96, '2002 Yamaha YZR M1', 'Features rotating wheels , working kick stand. Comes with stand.', 5, 600, '34.17', '81.36', 60, 700, 'S'),
(97, 'The Schooner Bluenose', 'All wood with canvas sails. Measures 31 1/2 inches in Length, 22 inches High and 4 3/4 inches Wide. Many extras.\r\nThe schooner Bluenose was built in Nova Scotia in 1921 to fish the rough waters off the coast of Newfoundland. Because of the Bluenose racin', 2, 1897, '34.00', '66.67', 190, 126, 'S'),
(98, 'American Airlines: B767-300', 'Exact replia with official logos and insignias and retractable wheels', 4, 5841, '51.15', '91.34', 584, 389, 'S'),
(99, 'The Mayflower', 'Measures 31 1/2 inches Long x 25 1/2 inches High x 10 5/8 inches Wide\r\nAll wood with canvas sail. Extras include long boats, rigging, ladders, railing, anchors, side cannons, hand painted, etc.', 2, 737, '43.30', '86.61', 74, 49, 'S'),
(100, 'HMS Bounty', 'Measures 30 inches Long x 27 1/2 inches High x 4 3/4 inches Wide. \r\nMany extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 2, 3501, '39.83', '90.52', 350, 233, 'S'),
(101, 'America West Airlines B757-200', 'Official logos and insignias. Working steering system. Rotating jet engines', 4, 9653, '68.80', '99.72', 965, 644, 'S'),
(102, 'The USS Constitution Ship', 'All wood with canvas sails. Measures 31 1/2\" Length x 22 3/8\" High x 8 1/4\" Width. Extras include 4 boats on deck, sea sprite on bow, anchors, copper railing, pilot houses, etc.', 2, 7083, '33.97', '72.28', 708, 472, 'S'),
(103, '1982 Camaro Z28', 'Features include opening and closing doors. Color: White. \r\nMeasures approximately 9 1/2\" Long.', 6, 6934, '46.53', '101.15', 693, 462, 'S'),
(104, 'ATA: B757-300', 'Exact replia with official logos and insignias and retractable wheels', 4, 7106, '59.33', '118.65', 711, 474, 'S'),
(105, 'F/A 18 Hornet 1/72', '10\" Wingspan with retractable landing gears.Comes with pilot', 4, 551, '54.40', '80.00', 55, 700, 'S'),
(106, 'The Titanic', 'Completed model measures 19 1/2 inches long, 9 inches high, 3inches wide and is in barn red/black. All wood and metal.', 2, 1956, '51.09', '100.17', 196, 130, 'S'),
(107, 'The Queen Mary', 'Exact replica. Wood and Metal. Many extras including rigging, long boats, pilot house, anchors, etc. Comes with three masts, all square-rigged.', 2, 5088, '53.63', '99.31', 509, 339, 'S'),
(108, 'American Airlines: MD-11S', 'Polished finish. Exact replia with official logos and insignias and retractable wheels', 4, 8820, '36.27', '74.03', 882, 588, 'S'),
(109, 'Boeing X-32A JSF', '10\" Wingspan with retractable landing gears.Comes with pilot', 4, 4857, '32.77', '49.66', 486, 324, 'S'),
(110, 'Pont Yacht', 'Measures 38 inches Long x 33 3/4 inches High. Includes a stand.Many extras including rigging, long boats, pilot house, anchors, etc. Comes with 2 masts, all square-rigged', 7, 414, '33.30', '54.60', 41, 700, 'S'),
(111, 'zzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzzzzz', 5, 0, '102.35', '156.37', 0, 10, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscategorias`
--

CREATE TABLE `productoscategorias` (
  `id_ProductoCategoria` int(11) NOT NULL,
  `productoCategoria` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `activo` char(1) COLLATE latin1_spanish_ci DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productoscategorias`
--

INSERT INTO `productoscategorias` (`id_ProductoCategoria`, `productoCategoria`, `descripcion`, `activo`) VALUES
(1, 'Coches Vintage', 'Nuestros modelos de coches vintage realista retratan automóviles producidos a partir de principios de 1900 hasta la década de 1940. Los materiales utilizados son de baquelita, fundición, plástico y madera. La mayorí­a de las réplicas se encuentran e', 'S'),
(2, 'Barcos', 'El día de fiesta o un regalo perfecto del aniversario para los ejecutivos, clientes, amigos y familiares. Estos modelos de barcos artesanales son, impresionantes obras de arte únicas que será atesorado durante generaciones! Vienen totalmente ensamblados y', 'S'),
(3, 'Trenes', 'Los trenes del modelo son un pasatiempo gratificante para los aficionados de todas las edades. Ya sea que usted está buscando para los trenes de colección de madera, tranvías eléctricos o locomotoras, encontrará un gran número de opciones para cualquier p', 'S'),
(4, 'Aviones', 'Unique, avión miniaturas y reproducciones de helicópteros adecuados para las colecciones, así como el hogar, la oficina o decoraciones aula. Modelos contienen detalles impresionantes como logotipos e insignias oficiales, girar los motores a reacción y hél', 'S'),
(5, 'Motocicletas', 'Las motocicletas son el estado de las réplicas del arte de los clásicos, así como leyendas de motocicletas contemporáneas como Harley Davidson, Ducati y Vespa. Modelos contienen detalles impresionantes como logotipos oficiales, ruedas giratorias, pata de ', 'S'),
(6, 'Coches clásicos', 'Los entusiastas del coche Atención: Haga que sus sueños más salvajes propiedad de automóviles se hagan realidad. Si usted está buscando para los coches clásicos del músculo, sueño coches deportivos o miniaturas película de inspiración, encontrará excelent', 'S'),
(7, 'Camiones y Autobuses', 'Los modelos de camiones y autobuses son réplicas realistas de buses y camiones especializados producidos a partir de la década de 1920 hasta la actualidad. Los modelos varían en tamaño desde 1:12 a escala 1:50 e incluyen numerosos edición limitada y vario', 'S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_Producto`);

--
-- Indices de la tabla `productoscategorias`
--
ALTER TABLE `productoscategorias`
  ADD PRIMARY KEY (`id_ProductoCategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `productoscategorias`
--
ALTER TABLE `productoscategorias`
  MODIFY `id_ProductoCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
