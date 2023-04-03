CREATE TABLE IF NOT EXISTS `us_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank2012` int(11) NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `state` int(11) NOT NULL,
  `est_2012` int(11) NOT NULL,
  `census_2010` int(11) NOT NULL,
  `change_pr` decimal(11,2) NOT NULL,
  `land_2010_mi` int(11) NOT NULL,
  `land_2010_km` int(11) NOT NULL,
  `popdens_2010_mi` int(11) NOT NULL,
  `popdens_2010_km` int(11) NOT NULL,
  `ansi` int(11) NOT NULL,
  `location` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=290 ;

INSERT INTO `us_city` (`id`, `rank2012`, `city`, `state`, `est_2012`, `census_2010`, `change_pr`, `land_2010_mi`, `land_2010_km`, `popdens_2010_mi`, `popdens_2010_km`, `ansi`, `location`) VALUES
(1, 1, 'New York', 1, 8336697, 8175133, '1.98', 303, 784, 27012, 10430, 2395220, '40.6643°N 73.9385°W'),
(2, 2, 'Los Angeles', 2, 3857799, 3792621, '1.72', 469, 1214, 8092, 3124, 2410877, '34.0194°N 118.4108°W'),
(3, 3, 'Chicago', 3, 2714856, 2695598, '0.71', 228, 590, 11842, 4572, 428803, '41.8376°N 87.6818°W'),
(4, 4, 'Houston', 4, 2160821, 2100263, '2.88', 600, 1553, 3501, 1352, 2410796, '29.7805°N 95.3863°W'),
(5, 5, 'Philadelphia', 5, 1547607, 1526006, '1.42', 134, 347, 11379, 4394, 1215531, '40.0094°N 75.1333°W'),
(6, 6, 'Phoenix', 6, 1488750, 1445632, '2.98', 517, 1338, 2798, 1080, 2411414, '33.5722°N 112.0880°W'),
(7, 7, 'San Antonio', 4, 1382951, 1327407, '4.18', 461, 1194, 2880, 1112, 2411774, '29.4724°N 98.5251°W'),
(8, 8, 'San Diego', 2, 1338348, 1307402, '2.37', 325, 842, 4020, 1552, 2411782, '32.8153°N 117.1350°W'),
(9, 9, 'Dallas', 4, 1241162, 1197816, '3.62', 341, 882, 3518, 1358, 2410288, '32.7757°N 96.7967°W'),
(10, 10, 'San Jose', 2, 982765, 945942, '3.89', 177, 457, 5359, 2069, 2411790, '37.2969°N 121.8193°W'),
(11, 11, 'Austin', 4, 842592, 790390, '6.60', 298, 772, 2653, 1024, 2409761, '30.3072°N 97.7560°W'),
(12, 12, 'Jacksonville', 7, 836507, 821784, '1.79', 747, 1935, 1100, 425, 2404783, '30.3370°N 81.6613°W'),
(13, 13, 'Indianapolis', 8, 834852, 820445, '1.76', 361, 936, 2270, 876, 2395424, '39.7767°N 86.1459°W'),
(14, 14, 'San Francisco', 2, 825863, 805235, '2.56', 47, 121, 17179, 6633, 2411786, '37.7751°N 122.4193°W'),
(15, 15, 'Columbus', 9, 809798, 787033, '2.89', 217, 562, 3624, 1399, 1086101, '39.9848°N 82.9850°W'),
(16, 16, 'Fort Worth', 4, 777992, 741206, '4.96', 340, 880, 2181, 842, 2410531, '32.7795°N 97.3463°W'),
(17, 17, 'Charlotte', 10, 775202, 731424, '5.99', 298, 771, 2457, 949, 2404032, '35.2087°N 80.8307°W'),
(18, 18, 'Detroit', 11, 701475, 713777, '0.00', 139, 359, 5144, 1986, 1626181, '42.3830°N 83.1022°W'),
(19, 19, 'El Paso', 4, 672538, 649121, '3.61', 255, 661, 2543, 982, 2410414, '31.8484°N 106.4270°W'),
(20, 20, 'Memphis', 12, 655155, 646889, '1.28', 315, 816, 2053, 793, 2405068, '35.1035°N 89.9785°W'),
(21, 21, 'Boston', 13, 636479, 617594, '3.06', 48, 125, 12793, 4939, 619463, '42.3320°N 71.0202°W'),
(22, 22, 'Seattle', 14, 634535, 608660, '4.25', 84, 217, 7251, 2800, 2411856, '47.6205°N 122.3509°W'),
(23, 23, 'Denver', 15, 634265, 600158, '5.68', 153, 396, 3923, 1515, 2410324, '39.7618°N 104.8806°W'),
(24, 24, 'Washington', 16, 632323, 601723, '5.09', 61, 158, 9856, 3806, 2390665, '38.9041°N 77.0171°W'),
(25, 25, 'Nashville', 12, 624496, 601222, '3.87', 475, 1231, 1265, 489, 2405092, '36.1718°N 86.7850°W'),
(26, 26, 'Baltimore', 17, 621342, 620961, '0.06', 81, 210, 7672, 2962, 1702381, '39.3002°N 76.6105°W'),
(27, 27, 'Louisville', 18, 605110, 597337, '1.30', 325, 842, 1837, 709, 1967434, '38.1781°N 85.6667°W'),
(28, 28, 'Portland', 19, 603106, 583776, '3.31', 133, 346, 4375, 1689, 2411471, '45.5370°N 122.6500°W'),
(29, 29, 'Oklahoma City', 20, 599199, 579999, '3.31', 606, 1571, 956, 369, 2411311, '35.4671°N 97.5137°W'),
(30, 30, 'Milwaukee', 21, 598916, 594833, '0.69', 96, 249, 6188, 2389, 1583724, '43.0633°N 87.9667°W'),
(31, 31, 'Las Vegas', 22, 596424, 583756, '2.17', 136, 352, 4298, 1660, 2411630, '36.2277°N 115.2640°W'),
(32, 32, 'Albuquerque', 23, 555417, 545852, '1.75', 188, 486, 2908, 1123, 2409678, '35.1056°N 106.6474°W'),
(33, 33, 'Tucson', 6, 524295, 520116, '0.80', 227, 587, 2294, 886, 2412104, '32.1543°N 110.8711°W'),
(34, 34, 'Fresno', 2, 505882, 494665, '2.27', 112, 290, 4418, 1706, 2410546, '36.7827°N 119.7945°W'),
(35, 35, 'Sacramento', 2, 475516, 466488, '1.94', 98, 254, 4764, 1839, 2411751, '38.5666°N 121.4686°W'),
(36, 36, 'Long Beach', 2, 467892, 462257, '1.22', 50, 130, 9191, 3549, 2410866, '33.8091°N 118.1553°W'),
(37, 37, 'Kansas City', 24, 464310, 459787, '0.98', 315, 816, 1460, 564, 2395492, '39.1252°N 94.5511°W'),
(38, 38, 'Mesa', 6, 452084, 439041, '2.97', 136, 353, 3218, 1242, 2411087, '33.4019°N 111.7174°W'),
(39, 39, 'Virginia Beach', 25, 447021, 437994, '2.06', 249, 645, 1759, 679, 1498559, '36.7793°N 76.0240°W'),
(40, 40, 'Atlanta', 26, 443775, 420003, '5.66', 133, 345, 3154, 1218, 2403126, '33.7629°N 84.4227°W'),
(41, 41, 'Colorado Springs', 15, 431834, 416427, '3.70', 195, 504, 2141, 826, 2410198, '38.8673°N 104.7607°W'),
(42, 42, 'Raleigh', 10, 423179, 403892, '4.78', 143, 370, 2826, 1091, 2404590, '35.8302°N 78.6414°W'),
(43, 43, 'Omaha', 27, 421570, 408958, '3.08', 127, 329, 3218, 1242, 2396064, '41.2647°N 96.0419°W'),
(44, 44, 'Miami', 7, 413892, 399457, '3.61', 36, 93, 11136, 4300, 2404247, '25.7752°N 80.2086°W'),
(45, 45, 'Oakland', 2, 400740, 390724, '2.56', 56, 144, 7004, 2704, 2411292, '37.7699°N 122.2256°W'),
(46, 46, 'Tulsa', 20, 393987, 391906, '0.53', 197, 510, 1992, 769, 2412110, '36.1279°N 95.9023°W'),
(47, 47, 'Minneapolis', 28, 392880, 382578, '2.69', 54, 140, 7088, 2737, 2395345, '44.9633°N 93.2683°W'),
(48, 48, 'Cleveland', 9, 390928, 396815, '0.00', 78, 201, 5107, 1972, 1085963, '41.4781°N 81.6795°W'),
(49, 49, 'Wichita', 29, 385577, 382368, '0.84', 159, 413, 2400, 927, 485662, '37.6907°N 97.3427°W'),
(50, 50, 'Arlington', 4, 375600, 365438, '2.78', 96, 248, 3811, 1472, 2409731, '32.7007°N 97.1247°W'),
(51, 51, 'New Orleans', 30, 369250, 343829, '7.39', 169, 439, 2029, 784, 545142, '30.0686°N 89.9390°W'),
(52, 52, 'Bakersfield', 2, 358597, 347483, '3.20', 142, 368, 2444, 944, 2409774, '35.3212°N 119.0183°W'),
(53, 53, 'Tampa', 7, 347645, 335709, '3.56', 113, 294, 2960, 1143, 2405568, '27.9701°N 82.4797°W'),
(54, 54, 'Honolulu', 31, 345610, 337256, '2.48', 61, 157, 5573, 2152, 2630783, '21.3259°N 157.8453°W'),
(55, 55, 'Anaheim', 2, 343248, 336265, '2.08', 50, 129, 6748, 2605, 2409704, '33.8555°N 117.7601°W'),
(56, 56, 'Aurora', 15, 339030, 325078, '4.29', 154, 369, 2110, 881, 2409731, '32.7007°N 97.1247°W'),
(57, 57, 'Santa Ana', 2, 330920, 324528, '1.97', 27, 71, 11901, 4595, 2411814, '33.7365°N 117.8826°W'),
(58, 58, 'St. Louis', 24, 318172, 319294, '0.00', 62, 160, 5157, 1991, 767557, '38.6357°N 90.2446°W'),
(59, 59, 'Riverside', 2, 313673, 303871, '3.23', 81, 210, 3745, 1446, 2410965, '33.9381°N 117.3932°W'),
(60, 60, 'Corpus Christi', 4, 312195, 305215, '2.29', 161, 416, 1900, 734, 2410234, '27.7543°N 97.1734°W'),
(61, 61, 'Pittsburgh', 5, 306211, 305704, '0.17', 55, 143, 5521, 2132, 1214818, '40.4398°N 79.9766°W'),
(62, 62, 'Lexington', 18, 310573, 295803, '4.99', 284, 735, 1043, 403, 2405089, '38.0402°N 84.4584°W'),
(63, 63, 'Anchorage', 32, 298610, 291826, '2.32', 1705, 4415, 171, 66, 2419025, '61.1775°N 149.2744°W'),
(64, 64, 'Stockton', 2, 297984, 291707, '2.15', 62, 160, 4730, 1826, 2411987, '37.9763°N 121.3133°W'),
(65, 65, 'Cincinnati', 9, 296550, 296943, '0.00', 78, 202, 3810, 1471, 1086201, '39.1399°N 84.5064°W'),
(66, 66, 'Saint Paul', 28, 290770, 285068, '2.00', 52, 135, 5484, 2118, 2396511, '44.9489°N 93.1039°W'),
(67, 67, 'Toledo', 9, 284012, 287208, '0.00', 81, 209, 3559, 1374, 1086537, '41.6641°N 83.5819°W'),
(68, 68, 'Newark', 33, 277727, 277140, '0.21', 24, 63, 11458, 4424, 885317, '40.7242°N 74.1726°W'),
(69, 69, 'Greensboro', 10, 277080, 269666, '2.75', 127, 328, 2131, 823, 2403745, '36.0965°N 79.8271°W'),
(70, 70, 'Plano', 4, 272068, 259841, '4.71', 72, 185, 3630, 1402, 2411437, '33.0508°N 96.7479°W'),
(71, 71, 'Henderson', 22, 265679, 257729, '3.08', 108, 279, 2392, 924, 2410741, '36.0122°N 115.0375°W'),
(72, 72, 'Lincoln', 27, 265404, 258379, '2.72', 89, 231, 2899, 1119, 2395713, '40.8090°N 96.6804°W'),
(73, 73, 'Buffalo', 1, 259384, 261310, '0.00', 40, 105, 6471, 2498, 978764, '42.8925°N 78.8597°W'),
(74, 74, 'Fort Wayne', 8, 254555, 253691, '0.34', 111, 287, 2293, 885, 2394798, '41.0882°N 85.1439°W'),
(75, 75, 'Jersey City', 33, 254441, 247597, '2.76', 15, 38, 16737, 6462, 885264, '40.7114°N 74.0648°W'),
(76, 76, 'Chula Vista', 2, 252422, 243916, '3.49', 50, 129, 4915, 1898, 2409461, '32.6277°N 117.0152°W'),
(77, 77, 'Orlando', 7, 249562, 238300, '4.73', 102, 265, 2327, 899, 2404443, '28.4159°N 81.2988°W'),
(78, 78, 'St. Petersburg', 7, 246541, 244769, '0.72', 62, 160, 3964, 1531, 2405401, '27.7620°N 82.6441°W'),
(79, 79, 'Norfolk', 25, 245782, 242803, '1.23', 54, 140, 4486, 1732, 1498557, '36.9230°N 76.2446°W'),
(80, 80, 'Chandler', 6, 245628, 236123, '4.03', 64, 167, 3666, 1415, 2409433, '33.2829°N 111.8549°W'),
(81, 81, 'Laredo', 4, 244731, 236091, '3.66', 89, 230, 2655, 1025, 2411626, '27.5477°N 99.4869°W'),
(82, 82, 'Madison', 21, 240323, 233209, '3.05', 77, 199, 3037, 1173, 1583625, '43.0878°N 89.4301°W'),
(83, 83, 'Durham', 10, 239358, 228330, '4.83', 107, 278, 2127, 821, 2403521, '35.9810°N 78.9056°W'),
(84, 84, 'Lubbock', 4, 236065, 229573, '2.83', 122, 317, 1875, 724, 2410892, '33.5665°N 101.8867°W'),
(85, 85, 'Winston–Salem', 10, 234349, 229617, '2.06', 132, 343, 1734, 669, 2405771, '36.1033°N 80.2606°W'),
(86, 86, 'Garland', 4, 233564, 226876, '2.95', 57, 148, 3974, 1535, 2410572, '32.9098°N 96.6304°W'),
(87, 87, 'Glendale', 6, 232143, 226721, '2.39', 60, 155, 3780, 1460, 2410596, '33.5331°N 112.1899°W'),
(88, 88, 'Hialeah', 7, 231941, 224669, '3.24', 21, 56, 10474, 4044, 2404689, '25.8699°N 80.3029°W'),
(89, 89, 'Reno', 22, 231027, 225221, '2.58', 103, 267, 2186, 844, 2410923, '39.4745°N 119.7765°W'),
(90, 90, 'Baton Rouge', 30, 230058, 229493, '0.25', 77, 199, 2982, 1152, 2403821, '30.4485°N 91.1259°W'),
(91, 91, 'Irvine', 2, 229985, 212375, '8.29', 66, 171, 3213, 1240, 2410116, '33.6784°N 117.7713°W'),
(92, 92, 'Chesapeake', 25, 228417, 222209, '2.79', 341, 883, 652, 252, 1498558, '36.6794°N 76.3018°W'),
(93, 93, 'Irving', 4, 225427, 216290, '4.22', 67, 174, 3227, 1246, 2410117, '32.8577°N 96.9700°W'),
(94, 94, 'Scottsdale', 6, 223514, 217385, '2.82', 184, 476, 1182, 456, 2411845, '33.6687°N 111.8237°W'),
(95, 95, 'North Las Vegas', 22, 223491, 216961, '3.01', 101, 262, 2141, 827, 2411273, '36.2830°N 115.0893°W'),
(96, 96, 'Fremont', 2, 221986, 214089, '3.69', 77, 201, 2764, 1067, 2410545, '37.4944°N 121.9411°W'),
(97, 97, 'Gilbert', 6, 221140, 208453, '6.09', 68, 176, 3067, 1184, 2412682, '33.3102°N 111.7422°W'),
(98, 98, 'San Bernardino', 2, 213295, 209924, '1.61', 59, 153, 3546, 1369, 2411777, '34.1393°N 117.2953°W'),
(99, 99, 'Boise', 34, 212303, 205671, '3.22', 79, 206, 2592, 1001, 2409876, '43.5985°N 116.2311°W'),
(100, 100, 'Birmingham', 35, 212038, 212237, '0.00', 146, 378, 1453, 561, 2403868, '33.5274°N 86.7990°W'),
(101, 101, 'Rochester', 1, 210532, 210565, '0.00', 36, 93, 5885, 2272, 979426, '43.1699°N 77.6169°W'),
(102, 102, 'Richmond', 25, 210309, 204214, '2.98', 60, 155, 3415, 1318, 1789073, '37.5314°N 77.4760°W'),
(103, 103, 'Spokane', 14, 209525, 208916, '0.29', 59, 153, 3526, 1361, 2411956, '47.6736°N 117.4166°W'),
(104, 104, 'Des Moines', 36, 206688, 203433, '1.60', 81, 209, 2516, 971, 2394522, '41.5739°N 93.6167°W'),
(105, 105, 'Montgomery', 35, 205293, 205764, '0.00', 160, 413, 1290, 498, 2404289, '32.3463°N 86.2686°W'),
(106, 106, 'Modesto', 2, 203547, 201165, '1.18', 37, 95, 5456, 2107, 2411130, '37.6609°N 120.9891°W'),
(107, 107, 'Fayetteville', 10, 202103, 200564, '0.77', 146, 378, 1375, 531, 2403604, '35.0851°N 78.9803°W'),
(108, 108, 'Tacoma', 14, 202010, 198397, '1.82', 50, 129, 3990, 1541, 2412025, '47.2522°N 122.4598°W'),
(109, 109, 'Shreveport', 30, 201867, 199311, '1.28', 105, 273, 1891, 730, 2405463, '32.4670°N 93.7927°W'),
(110, 110, 'Fontana', 2, 201812, 196069, '2.93', 42, 110, 4621, 1784, 2410517, '34.1088°N 117.4627°W'),
(111, 111, 'Oxnard', 2, 201555, 197899, '1.85', 27, 70, 7358, 2841, 2411347, '34.2023°N 119.2046°W'),
(112, 112, 'Aurora', 3, 199932, 197899, '1.03', 45, 116, 4404, 1700, 2394031, '41.7635°N 88.2901°W'),
(113, 113, 'Moreno Valley', 2, 199552, 193365, '3.20', 51, 133, 3771, 1456, 2411159, '33.9233°N 117.2057°W'),
(114, 114, 'Akron', 9, 198549, 199110, '0.00', 62, 161, 3210, 1239, 1086993, '41.0805°N 81.5214°W'),
(115, 115, 'Yonkers', 1, 198449, 195976, '1.26', 18, 47, 10880, 4201, 979660, '40.9459°N 73.8674°W'),
(116, 116, 'Columbus', 26, 198413, 189885, '4.49', 216, 560, 878, 339, 2404111, '32.5102°N 84.8749°W'),
(117, 117, 'Augusta', 26, 197872, 195844, '1.04', 302, 783, 647, 250, 2405078, '33.3655°N 82.0734°W'),
(118, 118, 'Little Rock', 37, 196537, 193524, '1.56', 119, 309, 1624, 627, 2404939, '34.7254°N 92.3586°W'),
(119, 119, 'Amarillo', 4, 195250, 190695, '2.39', 99, 258, 1917, 740, 2409694, '35.1978°N 101.8287°W'),
(120, 120, 'Mobile', 35, 194822, 195111, '0.00', 139, 360, 1403, 542, 2404278, '30.6684°N 88.1002°W'),
(121, 121, 'Huntington Beach', 2, 194708, 189992, '2.48', 27, 69, 7103, 2742, 2410811, '33.6906°N 118.0093°W'),
(122, 122, 'Glendale', 2, 194478, 191719, '1.44', 30, 79, 6295, 2431, 2410597, '34.1814°N 118.2458°W'),
(123, 123, 'Grand Rapids', 11, 190411, 188040, '1.26', 44, 115, 4236, 1635, 1626373, '42.9612°N 85.6556°W'),
(124, 124, 'Salt Lake City', 38, 189314, 186440, '1.54', 111, 288, 1678, 648, 2411771, '40.7785°N 111.9314°W'),
(125, 125, 'Tallahassee', 7, 186971, 181376, '3.08', 100, 260, 1809, 699, 2405563, '30.4551°N 84.2534°W'),
(126, 126, 'Huntsville', 35, 183739, 180105, '2.02', 209, 541, 862, 333, 2404746, '34.7843°N 86.5390°W'),
(127, 127, 'Worcester', 13, 182669, 181045, '0.90', 37, 97, 4845, 1870, 619493, '42.2695°N 71.8078°W'),
(128, 128, 'Knoxville', 12, 182200, 178874, '1.86', 99, 255, 1816, 701, 2404842, '35.9709°N 83.9465°W'),
(129, 129, 'Grand Prairie', 4, 181824, 175396, '3.66', 72, 187, 2433, 939, 2410632, '32.6842°N 97.0210°W'),
(130, 130, 'Newport News', 25, 180726, 180719, '0.00', 69, 178, 2630, 1015, 1498555, '37.0760°N 76.5217°W'),
(131, 131, 'Brownsville', 4, 180097, 175023, '2.90', 132, 343, 1323, 511, 2409924, '26.0183°N 97.4538°W'),
(132, 132, 'Santa Clarita', 2, 179013, 176320, '1.53', 53, 137, 3345, 1291, 2411819, '34.4049°N 118.5047°W'),
(133, 133, 'Overland Park', 29, 178919, 173372, '3.20', 75, 194, 2317, 894, 485639, '38.8890°N 94.6906°W'),
(134, 134, 'Providence', 39, 178432, 178042, '0.22', 18, 48, 9676, 3736, 1220076, '41.8231°N 71.4188°W'),
(135, 135, 'Jackson', 40, 175437, 173514, '1.11', 111, 288, 1563, 603, 2404779, '32.3158°N 90.2128°W'),
(136, 136, 'Garden Grove', 2, 174389, 170883, '2.05', 18, 46, 9525, 3677, 2410568, '33.7788°N 117.9605°W'),
(137, 137, 'Oceanside', 2, 171293, 167086, '2.52', 41, 107, 4052, 1565, 2411301, '33.2246°N 117.3062°W'),
(138, 138, 'Chattanooga', 12, 171279, 167674, '2.15', 137, 355, 1223, 472, 2404035, '35.0665°N 85.2471°W'),
(139, 139, 'Fort Lauderdale', 7, 170747, 165521, '3.16', 35, 90, 4761, 1838, 2403640, '26.1413°N 80.1439°W'),
(140, 140, 'Rancho Cucamonga', 2, 170746, 165269, '3.31', 40, 103, 4147, 1601, 2411514, '34.1233°N 117.5642°W'),
(141, 141, 'Santa Rosa', 2, 170685, 167815, '1.71', 41, 107, 4064, 1569, 2411827, '38.4468°N 122.7061°W'),
(142, 142, 'Port St. Lucie', 7, 168716, 164603, '2.50', 114, 295, 1444, 558, 2404558, '27.2810°N 80.3838°W'),
(143, 143, 'Ontario', 2, 167211, 163924, '2.01', 50, 129, 3282, 1267, 2411323, '34.0395°N 117.6088°W'),
(144, 144, 'Tempe', 6, 166842, 161719, '3.17', 40, 103, 4050, 1564, 2412045, '33.3884°N 111.9318°W'),
(145, 145, 'Vancouver', 14, 165489, 161791, '2.29', 46, 120, 3483, 1345, 2412146, '45.6372°N 122.5965°W'),
(146, 146, 'Springfield', 24, 162191, 159498, '1.69', 82, 212, 1952, 754, 2395942, '37.1942°N 93.2913°W'),
(147, 147, 'Cape Coral', 7, 161248, 154305, '4.50', 106, 274, 1460, 564, 2403990, '26.6431°N 81.9973°W'),
(148, 148, 'Pembroke Pines', 7, 160306, 154750, '3.59', 33, 86, 4672, 1804, 2404502, '26.0212°N 80.3404°W'),
(149, 149, 'Sioux Falls', 41, 159908, 153888, '3.91', 73, 189, 2109, 814, 1267566, '43.5383°N 96.7320°W'),
(150, 150, 'Peoria', 6, 159789, 154065, '3.72', 174, 452, 883, 341, 2411401, '33.7877°N 112.3111°W'),
(151, 151, 'Lancaster', 2, 159055, 156633, '1.55', 94, 244, 1661, 641, 2411620, '34.6936°N 118.1753°W'),
(152, 152, 'Elk Grove', 2, 159038, 153015, '3.94', 42, 109, 3627, 1400, 2410425, '38.4144°N 121.3849°W'),
(153, 153, 'Corona', 2, 158391, 152374, '3.95', 39, 101, 3925, 1515, 2410232, '33.8624°N 117.5639°W'),
(154, 154, 'Eugene', 19, 157986, 156185, '1.15', 44, 113, 3572, 1379, 2410460, '44.0567°N 123.1162°W'),
(155, 155, 'Salem', 19, 157429, 154637, '1.81', 48, 124, 3229, 1247, 2411764, '44.9237°N 123.0231°W'),
(156, 156, 'Palmdale', 2, 155650, 152750, '1.90', 106, 274, 1442, 557, 2411359, '34.5913°N 118.1090°W'),
(157, 157, 'Salinas', 2, 154484, 150441, '2.69', 23, 60, 6490, 2506, 2411768, '36.6902°N 121.6337°W'),
(158, 158, 'Springfield', 13, 153552, 153060, '0.32', 32, 83, 4803, 1855, 619388, '42.1155°N 72.5400°W'),
(159, 159, 'Pasadena', 4, 152272, 149043, '2.17', 43, 111, 3485, 1346, 2411380, '29.6583°N 95.1505°W'),
(160, 160, 'Rockford', 3, 150843, 152871, '0.00', 61, 158, 2503, 966, 2396405, '42.2634°N 89.0628°W'),
(161, 161, 'Pomona', 2, 150812, 149058, '1.18', 23, 59, 6494, 2508, 2411454, '34.0586°N 117.7613°W'),
(162, 162, 'Hayward', 2, 149392, 144186, '3.61', 45, 117, 3181, 1228, 2410724, '37.6281°N 122.1063°W'),
(163, 163, 'Fort Collins', 15, 148612, 143986, '3.21', 54, 141, 2653, 1024, 2410526, '40.5482°N 105.0648°W'),
(164, 164, 'Joliet', 3, 148268, 147433, '0.57', 62, 161, 2374, 916, 2395477, '41.5181°N 88.1584°W'),
(165, 165, 'Escondido', 2, 147575, 143911, '2.55', 37, 95, 3909, 1509, 2410455, '33.1336°N 117.0732°W'),
(166, 166, 'Kansas City', 29, 147268, 145786, '1.02', 125, 323, 1168, 451, 485601, '39.1225°N 94.7418°W'),
(167, 167, 'Torrance', 2, 147027, 145438, '1.09', 20, 53, 7102, 2742, 2412087, '33.8350°N 118.3414°W'),
(168, 168, 'Bridgeport', 42, 146425, 144229, '1.52', 16, 41, 9029, 3486, 2378269, '41.1874°N 73.1957°W'),
(169, 169, 'Alexandria', 25, 146294, 139966, '4.52', 15, 39, 9314, 3596, 1498415, '38.8183°N 77.0820°W'),
(170, 170, 'Sunnyvale', 2, 146197, 140081, '4.37', 22, 57, 6371, 2460, 2412009, '37.3858°N 122.0263°W'),
(171, 171, 'Cary', 10, 145693, 135234, '7.73', 54, 141, 2488, 961, 2406229, '35.7821°N 78.8141°W'),
(172, 172, 'Lakewood', 15, 145516, 142980, '1.77', 43, 111, 3334, 1287, 2411614, '39.6989°N 105.1176°W'),
(173, 173, 'Hollywood', 7, 145236, 140768, '3.17', 27, 71, 5144, 1986, 2404719, '26.0311°N 80.1646°W'),
(174, 174, 'Paterson', 33, 145219, 146199, '0.00', 8, 22, 17346, 6697, 885343, '40.9147°N 74.1628°W'),
(175, 175, 'Syracuse', 1, 144170, 145170, '0.00', 25, 65, 5797, 2238, 979539, '43.0410°N 76.1436°W'),
(176, 176, 'Naperville', 3, 143684, 141853, '1.29', 39, 100, 3659, 1413, 2395147, '41.7492°N 88.1620°W'),
(177, 177, 'McKinney', 4, 143223, 131117, '9.23', 62, 161, 2108, 814, 2411064, '33.2012°N 96.6680°W'),
(178, 178, 'Mesquite', 4, 143195, 139824, '2.41', 46, 119, 3038, 1173, 2411090, '32.7639°N 96.5924°W'),
(179, 179, 'Clarksville', 12, 142519, 132929, '7.21', 98, 253, 1362, 526, 2404061, '36.5664°N 87.3452°W'),
(180, 180, 'Savannah', 26, 142022, 136286, '4.21', 103, 267, 1321, 510, 2405429, '32.0025°N 81.1536°W'),
(181, 181, 'Dayton', 9, 141359, 141527, '0.00', 56, 144, 2543, 982, 1086666, '39.7774°N 84.1996°W'),
(182, 182, 'Orange', 2, 139419, 136416, '2.20', 25, 64, 5501, 2124, 2411325, '33.8048°N 117.8249°W'),
(183, 183, 'Fullerton', 2, 138574, 135161, '2.53', 22, 58, 6047, 2335, 2410556, '33.8857°N 117.9280°W'),
(184, 184, 'Pasadena', 2, 138547, 137122, '1.04', 23, 59, 5970, 2305, 2411379, '34.1606°N 118.1396°W'),
(185, 185, 'Hampton', 25, 136836, 137436, '0.00', 51, 133, 2673, 1032, 1498554, '37.0480°N 76.2971°W'),
(186, 186, 'McAllen', 4, 134719, 129877, '3.73', 48, 125, 2687, 1037, 2411057, '26.2185°N 98.2461°W'),
(187, 187, 'Killeen', 4, 134654, 127921, '5.26', 54, 139, 2387, 922, 2411542, '31.0777°N 97.7320°W'),
(188, 188, 'Warren', 11, 134141, 134056, '0.06', 34, 89, 3899, 1505, 1627213, '42.4929°N 83.0250°W'),
(189, 189, 'West Valley City', 38, 132434, 129480, '2.28', 36, 92, 3642, 1406, 2412231, '40.6885°N 112.0118°W'),
(190, 190, 'Columbia', 43, 131686, 129272, '1.87', 132, 342, 978, 378, 2404107, '34.0298°N 80.8966°W'),
(191, 191, 'New Haven', 42, 130741, 129779, '0.74', 19, 48, 6948, 2683, 2378285, '41.3108°N 72.9250°W'),
(192, 192, 'Sterling Heights', 11, 130410, 129699, '0.55', 37, 95, 3553, 1372, 1627126, '42.5812°N 83.0303°W'),
(193, 193, 'Olathe', 29, 130045, 125872, '3.32', 60, 155, 2110, 815, 485633, '38.8843°N 94.8188°W'),
(194, 194, 'Miramar', 7, 128729, 122041, '5.48', 30, 76, 4134, 1596, 2404275, '25.9770°N 80.3358°W'),
(195, 195, 'Thousand Oaks', 2, 128412, 126683, '1.36', 55, 143, 2302, 889, 2412065, '34.1933°N 118.8742°W'),
(196, 196, 'Frisco', 4, 128176, 116989, '9.56', 62, 160, 1893, 731, 2410549, '33.1510°N 96.8193°W'),
(197, 197, 'Cedar Rapids', 36, 128119, 126326, '1.42', 71, 183, 1784, 689, 467567, '41.9670°N 91.6778°W'),
(198, 198, 'Topeka', 29, 127939, 127473, '0.37', 60, 156, 2119, 818, 485655, '39.0362°N 95.6948°W'),
(199, 199, 'Visalia', 2, 127081, 124442, '2.12', 36, 94, 3433, 1326, 2412160, '36.3272°N 119.3234°W'),
(200, 200, 'Waco', 4, 127018, 124805, '1.77', 89, 230, 1403, 542, 2412162, '31.5601°N 97.1860°W'),
(201, 201, 'Elizabeth', 33, 126458, 124969, '1.19', 12, 32, 10144, 3917, 885205, '40.6663°N 74.1935°W'),
(202, 202, 'Bellevue', 14, 126439, 122363, '3.33', 32, 83, 3828, 1478, 2409821, '47.5978°N 122.1565°W'),
(203, 203, 'Gainesville', 7, 126047, 124354, '1.36', 61, 159, 2028, 783, 2403676, '29.6788°N 82.3459°W'),
(204, 204, 'Simi Valley', 2, 125793, 124237, '1.25', 41, 107, 2995, 1156, 2411904, '34.2669°N 118.7485°W'),
(205, 205, 'Charleston', 43, 125583, 120083, '4.58', 109, 282, 1102, 425, 2404030, '32.8179°N 79.9589°W'),
(206, 206, 'Carrollton', 4, 125409, 119097, '5.30', 36, 94, 3281, 1267, 2409992, '32.9884°N 96.8998°W'),
(207, 207, 'Coral Springs', 7, 125287, 121096, '3.46', 24, 62, 5090, 1965, 2404127, '26.2708°N 80.2593°W'),
(208, 208, 'Stamford', 42, 125109, 122643, '2.01', 38, 97, 3258, 1258, 2378291, '41.0799°N 73.5460°W'),
(209, 209, 'Hartford', 42, 124893, 124775, '0.09', 17, 45, 7179, 2772, 2378277, '41.7660°N 72.6833°W'),
(210, 210, 'Concord', 2, 124711, 122067, '2.17', 31, 79, 3996, 1543, 2410214, '37.9722°N 122.0016°W'),
(211, 211, 'Roseville', 2, 124519, 118788, '4.82', 36, 94, 3279, 1266, 2411000, '38.7657°N 121.3032°W'),
(212, 212, 'Thornton', 15, 124140, 118772, '4.52', 35, 90, 3409, 1316, 2412064, '39.9180°N 104.9454°W'),
(213, 213, 'Kent', 14, 122999, 92411, '33.10', 29, 74, 3228, 1246, 2410185, '47.3853°N 122.2169°W'),
(214, 214, 'Lafayette', 30, 122761, 120623, '1.77', 49, 128, 2450, 946, 2404854, '30.2116°N 92.0314°W'),
(215, 215, 'Surprise', 6, 121287, 117517, '3.21', 106, 274, 1111, 429, 2412016, '33.6706°N 112.4527°W'),
(216, 216, 'Denton', 4, 121123, 113383, '6.83', 88, 228, 1289, 498, 2410323, '33.2151°N 97.1417°W'),
(217, 217, 'Victorville', 2, 120336, 115903, '3.82', 73, 190, 1584, 612, 2412156, '34.5277°N 117.3536°W'),
(218, 218, 'Evansville', 8, 120235, 117429, '2.39', 44, 114, 2660, 1027, 2394710, '37.9877°N 87.5347°W'),
(219, 219, 'Midland', 4, 119385, 111147, '7.41', 72, 187, 1542, 595, 2411096, '32.0299°N 102.1097°W'),
(220, 220, 'Santa Clara', 2, 119311, 116468, '2.44', 18, 48, 6327, 2443, 2411816, '37.3646°N 121.9679°W'),
(221, 221, 'Athens', 26, 118999, 115452, '3.07', 116, 301, 992, 383, 2407405, '33.9496°N 83.3701°W'),
(222, 222, 'Allentown', 5, 118974, 118032, '0.80', 18, 45, 6727, 2597, 1215372, '40.5940°N 75.4782°W'),
(223, 223, 'Abilene', 4, 118887, 117063, '1.56', 107, 277, 1096, 423, 2409657, '32.4545°N 99.7381°W'),
(224, 224, 'Beaumont', 4, 118228, 118296, '0.00', 83, 214, 1429, 552, 2409806, '30.0843°N 94.1458°W'),
(225, 225, 'Vallejo', 2, 117796, 115942, '1.60', 31, 79, 3780, 1460, 2412142, '38.1079°N 122.2639°W'),
(226, 226, 'Independence', 24, 117270, 116830, '0.38', 78, 201, 1506, 582, 2395422, '39.0853°N 94.3513°W'),
(227, 227, 'Springfield', 3, 117126, 116250, '0.75', 59, 154, 1954, 755, 2395940, '39.7639°N 89.6708°W'),
(228, 228, 'Ann Arbor', 11, 116121, 113934, '1.92', 28, 72, 4094, 1581, 1625837, '42.2756°N 83.7313°W'),
(229, 229, 'Provo', 38, 115919, 112488, '3.05', 42, 108, 2699, 1042, 2411499, '40.2453°N 111.6448°W'),
(230, 230, 'Peoria', 3, 115687, 115007, '0.59', 48, 124, 2396, 925, 2396178, '40.7523°N 89.6171°W'),
(231, 231, 'Norman', 20, 115562, 110925, '4.18', 179, 463, 621, 240, 2411267, '35.2406°N 97.3453°W'),
(232, 232, 'Berkeley', 2, 115403, 112580, '2.51', 10, 27, 10752, 4152, 2409837, '37.8667°N 122.2991°W'),
(233, 233, 'El Monte', 2, 115111, 113475, '1.44', 10, 25, 11867, 4582, 2410413, '34.0746°N 118.0291°W'),
(234, 234, 'Murfreesboro', 12, 114038, 108755, '4.86', 55, 143, 1965, 759, 2404342, '35.8522°N 86.4161°W'),
(235, 235, 'Lansing', 11, 113996, 114297, '0.00', 36, 93, 3171, 1224, 1626588, '42.7098°N 84.5562°W'),
(236, 236, 'Columbia', 24, 113225, 108500, '4.35', 63, 163, 1720, 664, 2393605, '38.9479°N 92.3261°W'),
(237, 237, 'Downey', 2, 112873, 111772, '0.99', 12, 32, 9008, 3478, 2410352, '33.9382°N 118.1309°W'),
(238, 238, 'Costa Mesa', 2, 111918, 109960, '1.78', 16, 41, 7025, 2712, 2410239, '33.6659°N 117.9123°W'),
(239, 239, 'Inglewood', 2, 111182, 109673, '1.38', 9, 23, 12095, 4670, 2410106, '33.9561°N 118.3443°W'),
(240, 240, 'Miami Gardens', 7, 110754, 107167, '3.35', 18, 47, 5878, 2270, 2404249, '25.9489°N 80.2436°W'),
(241, 241, 'Manchester', 44, 110209, 109565, '0.59', 33, 86, 3310, 1278, 873658, '42.9847°N 71.4439°W'),
(242, 242, 'Elgin', 3, 109927, 108188, '1.61', 37, 96, 2911, 1124, 2394641, '42.0396°N 88.3217°W'),
(243, 243, 'Wilmington', 10, 109922, 106476, '3.24', 51, 133, 2068, 798, 2405754, '34.2092°N 77.8858°W'),
(244, 244, 'Waterbury', 42, 109915, 110366, '0.00', 29, 74, 3870, 1494, 2378294, '41.5585°N 73.0367°W'),
(245, 245, 'Fargo', 45, 109779, 105549, '4.01', 49, 126, 2162, 835, 1036030, '46.8652°N 96.8290°W'),
(246, 246, 'Arvada', 15, 109745, 106433, '3.11', 35, 91, 3029, 1169, 2409737, '39.8097°N 105.1066°W'),
(247, 247, 'Carlsbad', 2, 109318, 105328, '3.79', 38, 98, 2792, 1078, 2409984, '33.1239°N 117.2828°W'),
(248, 248, 'Westminster', 15, 109169, 106114, '2.88', 32, 82, 3363, 1299, 2412237, '39.8822°N 105.0644°W'),
(249, 249, 'Rochester', 28, 108992, 106769, '2.08', 55, 141, 1956, 755, 2396395, '44.0154°N 92.4772°W'),
(250, 250, 'Gresham', 19, 108956, 105594, '3.18', 23, 60, 4551, 1757, 2410663, '45.5023°N 122.4416°W'),
(251, 251, 'Clearwater', 7, 108732, 107685, '0.97', 26, 66, 4213, 1627, 2404067, '27.9795°N 82.7663°W'),
(252, 252, 'Lowell', 13, 108522, 106519, '1.88', 14, 35, 7842, 3028, 618227, '42.6389°N 71.3221°W'),
(253, 253, 'West Jordan', 38, 108383, 103712, '4.50', 32, 84, 3195, 1234, 2412222, '40.6023°N 112.0010°W'),
(254, 254, 'Pueblo', 15, 107772, 106595, '1.10', 54, 139, 1987, 767, 2411501, '38.2731°N 104.6124°W'),
(255, 255, 'San Buenaventura (Ventura)', 2, 107734, 106433, '1.22', 22, 56, 4915, 1898, 2411779, '34.2681°N 119.2550°W'),
(256, 256, 'Fairfield', 2, 107684, 105321, '2.24', 37, 97, 2817, 1088, 2410474, '38.2568°N 122.0397°W'),
(257, 257, 'West Covina', 2, 107440, 106098, '1.26', 16, 42, 6614, 2554, 2412219, '34.0559°N 117.9099°W'),
(258, 258, 'Billings', 46, 106954, 104170, '2.67', 43, 112, 2399, 926, 2409849, '45.7895°N 108.5499°W'),
(259, 259, 'Murrieta', 2, 106810, 103466, '3.23', 34, 87, 3081, 1190, 2411199, '33.5719°N 117.1907°W'),
(260, 260, 'High Point', 10, 106586, 104371, '2.12', 54, 139, 1940, 749, 2404696, '35.9855°N 79.9902°W'),
(261, 261, 'Round Rock', 4, 106573, 99887, '6.69', 34, 88, 2928, 1131, 2411005, '30.5237°N 97.6674°W'),
(262, 262, 'Richmond', 2, 106516, 103701, '2.71', 30, 78, 3449, 1332, 2410939, '37.9530°N 122.3594°W'),
(263, 263, 'Cambridge', 13, 106471, 105162, '1.24', 6, 17, 16469, 6359, 619396, '42.3760°N 71.1183°W'),
(264, 264, 'Norwalk', 2, 106278, 105549, '0.69', 10, 25, 10873, 4198, 2411281, '33.9069°N 118.0834°W'),
(265, 265, 'Odessa', 4, 106102, 99940, '6.17', 42, 109, 2382, 920, 2411303, '31.8804°N 102.3434°W'),
(266, 266, 'Antioch', 2, 105508, 102372, '3.06', 28, 73, 3611, 1394, 2409715, '37.9775°N 121.7976°W'),
(267, 267, 'Temecula', 2, 105208, 100097, '5.11', 30, 78, 3320, 1282, 2412044, '33.5019°N 117.1246°W'),
(268, 268, 'Green Bay', 21, 104868, 104057, '0.78', 45, 118, 2289, 884, 1583309, '44.5207°N 87.9842°W'),
(269, 269, 'Everett', 14, 104655, 103019, '1.59', 33, 87, 3080, 1189, 2410469, '48.0033°N 122.1742°W'),
(270, 270, 'Wichita Falls', 4, 104552, 104553, '0.00', 72, 187, 1449, 560, 2412261, '33.9067°N 98.5259°W'),
(271, 271, 'Burbank', 2, 104391, 103340, '1.02', 17, 45, 5959, 2301, 2409939, '34.1890°N 118.3249°W'),
(272, 272, 'Palm Bay', 7, 104124, 103190, '0.91', 66, 170, 1571, 606, 2404463, '27.9856°N 80.6626°W'),
(273, 273, 'Centennial', 15, 103743, 100377, '3.35', 29, 74, 3495, 1349, 2409422, '39.5906°N 104.8691°W'),
(274, 274, 'Daly City', 2, 103690, 101123, '2.54', 8, 20, 13195, 5095, 2410291, '37.7009°N 122.4650°W'),
(275, 275, 'Richardson', 4, 103297, 99223, '4.11', 29, 74, 3474, 1341, 2410933, '32.9723°N 96.7081°W'),
(276, 276, 'Pompano Beach', 7, 102984, 99845, '3.14', 24, 62, 4160, 1606, 2404547, '26.2426°N 80.1290°W'),
(277, 277, 'Broken Arrow', 20, 102019, 98850, '3.21', 62, 159, 1605, 620, 2409914, '36.0365°N 95.7810°W'),
(278, 278, 'North Charleston', 43, 101989, 97471, '4.64', 0, 0, 0, 0, 0, '32.8853°N 80.0169°W'),
(279, 279, 'West Palm Beach', 7, 101903, 99919, '1.99', 55, 143, 1807, 698, 2405713, '26.7483°N 80.1266°W'),
(280, 280, 'Boulder', 15, 101808, 97385, '4.54', 0, 0, 0, 0, 0, '40.0175°N 105.2797°W'),
(281, 281, 'Rialto', 2, 101740, 99171, '2.59', 22, 58, 4437, 1713, 2410931, '34.1118°N 117.3883°W'),
(282, 282, 'Santa Maria', 2, 101459, 99553, '1.91', 23, 59, 4375, 1689, 2411824, '34.9332°N 120.4438°W'),
(283, 283, 'El Cajon', 2, 101435, 99478, '1.97', 14, 37, 6892, 2661, 2410406, '32.8017°N 116.9605°W'),
(284, 284, 'Davenport', 36, 101363, 99685, '1.68', 63, 163, 1584, 611, 2394467, '41.5541°N 90.6040°W'),
(285, 285, 'Erie', 5, 101047, 101786, '0.00', 19, 49, 5334, 2060, 1215209, '42.1166°N 80.0735°W'),
(286, 286, 'Las Cruces', 23, 101047, 97618, '3.51', 76, 198, 1279, 494, 0, '32.3197°N 106.7653°W'),
(287, 287, 'South Bend', 8, 100800, 101168, '0.00', 41, 107, 2440, 942, 2395913, '41.6769°N 86.2690°W'),
(288, 288, 'Flint', 11, 100515, 102434, '0.00', 33, 87, 3065, 1184, 1626285, '43.0244°N 83.6920°W'),
(289, 289, 'Kenosha', 21, 100150, 99218, '0.94', 0, 0, 0, 0, 0, '42.5822°N 87.8456°W');

CREATE TABLE IF NOT EXISTS `us_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=47 ;

INSERT INTO `us_state` (`id`, `state`) VALUES
(1, 'New York'),
(2, 'California'),
(3, 'Illinois'),
(4, 'Texas'),
(5, 'Pennsylvania'),
(6, 'Arizona'),
(7, 'Florida'),
(8, 'Indiana'),
(9, 'Ohio'),
(10, 'North Carolina'),
(11, 'Michigan'),
(12, 'Tennessee'),
(13, 'Massachusetts'),
(14, 'Washington'),
(15, 'Colorado'),
(16, 'District of Columbia'),
(17, 'Maryland'),
(18, 'Kentucky'),
(19, 'Oregon'),
(20, 'Oklahoma'),
(21, 'Wisconsin'),
(22, 'Nevada'),
(23, 'New Mexico'),
(24, 'Missouri'),
(25, 'Virginia'),
(26, 'Georgia'),
(27, 'Nebraska'),
(28, 'Minnesota'),
(29, 'Kansas'),
(30, 'Louisiana'),
(31, 'Hawai''i'),
(32, 'Alaska'),
(33, 'New Jersey'),
(34, 'Idaho'),
(35, 'Alabama'),
(36, 'Iowa'),
(37, 'Arkansas'),
(38, 'Utah'),
(39, 'Rhode Island'),
(40, 'Mississippi'),
(41, 'South Dakota'),
(42, 'Connecticut'),
(43, 'South Carolina'),
(44, 'New Hampshire'),
(45, 'North Dakota'),
(46, 'Montana');

