-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 11. Jun 2020 um 22:19
-- Server-Version: 5.7.26
-- PHP-Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `mvc`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`) VALUES
(1, 2, 'Hohenstaufengasse 6\r\n1010 Wien\r\nÖsterreich'),
(2, 2, 'Hohenstaufengasse 8\r\n1010 Wien\r\nÖsterreich'),
(3, 2, 'Hohenstaufengasse 10\r\n1010 Wien\r\nÖsterreich'),
(31, 1, 'Am Testweg 1'),
(39, 15, 'Scheidlstraße 33\r\n1180 Wien'),
(40, 15, 'Scheidlstraße 40\r\n1180 Wien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `crdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'creation date',
  `user_id` int(11) NOT NULL,
  `products` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Serialization or ordered products',
  `delivery_address_id` int(11) NOT NULL,
  `invoice_address_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` enum('open','in progress','in delivery','storno','delivered') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `crdate`, `user_id`, `products`, `delivery_address_id`, `invoice_address_id`, `payment_id`, `status`) VALUES
(26, '2020-06-11 22:10:41', 15, '[{\"id\":6,\"name\":\"Supersonic Rocket Bike\",\"description\":\"Description for the Supersonic Rocket Bike of Fly High\",\"price\":2999,\"stock\":20,\"images\":[\"uploads\\/supersonic_black_blue_red_.jpg\",\"uploads\\/supersonic_black_black_black_.jpg\",\"uploads\\/supersonic_red_black_black_.jpg\",\"uploads\\/supersonic_red_black_pink_.jpg\",\"uploads\\/supersonic_black_black_pink_.jpg\",\"uploads\\/supersonic_black_black_red_.jpg\",\"uploads\\/supersonic_red_black_red_.jpg\",\"uploads\\/supersonic_red_pink_black_.jpg\",\"uploads\\/supersonic_black_pink_black_.jpg\",\"uploads\\/supersonic_black_pink_pink_.jpg\",\"uploads\\/supersonic_red_pink_pink_.jpg\",\"uploads\\/supersonic_red_pink_red_.jpg\",\"uploads\\/supersonic_black_pink_red_.jpg\",\"uploads\\/supersonic_black_green_red_.jpg\",\"uploads\\/supersonic_red_green_red_.jpg\",\"uploads\\/supersonic_red_green_black_.jpg\",\"uploads\\/supersonic_black_green_black_.jpg\",\"uploads\\/supersonic_black_green_pink_.jpg\",\"uploads\\/supersonic_red_green_pink_.jpg\",\"uploads\\/supersonic_red_blue_pink_.jpg\",\"uploads\\/supersonic_red_blue_red_.jpg\",\"uploads\\/supersonic_red_blue_black_.jpg\",\"uploads\\/supersonic_black_blue_black_.jpg\",\"uploads\\/bike_black-blue-pink.jpg\"],\"create_date\":20200101,\"quantity\":1,\"config\":{\"tire\":\"black\",\"frame\":\"pink\",\"saddle\":\"black\"}}]', 39, 39, 22, 'in progress'),
(27, '2020-06-11 22:15:46', 15, '[{\"id\":7,\"name\":\"Thunderbolt  TX\",\"description\":\"Description of Thunderbolt TX. Behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.\",\"price\":499,\"stock\":5,\"images\":[\"uploads\\/thunderbolt.png\"],\"create_date\":20200101,\"quantity\":1,\"config\":{\"tire\":null,\"frame\":null,\"saddle\":null}}]', 40, 40, 22, 'open');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `expires` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ccv` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='keine realistische Payments Tabelle!!';

--
-- Daten für Tabelle `payments`
--

INSERT INTO `payments` (`id`, `name`, `number`, `expires`, `ccv`, `user_id`) VALUES
(10, 'test', 5646546, '1212', 121, 1),
(22, 'John Does Payment', 123456789, '022020', 121, 15);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `images`, `create_date`) VALUES
(1, 'Factory Sniper', 'The Factory Build Sniper XC is the pinnacle of our build specs. We’ve carefully selected and tested each component to provide the highest possible ride experience.\r\n- Travel (Front/Rear): 100mm/100mm\r\n- Wheel size: 29“\r\n- Frame weight: 4.05lbs (Medium)\r\n-HT angle: 67.5 ̊\r\n- Reach: 16.6” (Small), 17.5“ (Medium), 18.4” (Large), 19.3” (XL)', 1200, 5, 'uploads/FactorySniper.png', 20200517),
(2, 'Primer Pro', 'Description of Primer Pro Bike. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. ', 999, 10, 'uploads/PrimerPro.png', 20200514),
(3, 'Primer Pro Up', 'Description of Primer Pro Bike Level Up.  It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so.', 1299, 7, 'uploads/primerprolevelup2.png', 20200514),
(4, 'City Bike Classy', 'Description of City Bike Classy.  It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so.', 599, 5, 'uploads/citybikeclassic.png', 20200517),
(5, 'City Bike Classy 2', 'Description of City Bike Classy 2.  It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so.', 399, 3, 'uploads/citybikeclassic2.png', 20200504),
(6, 'Supersonic Rocket Bike', 'Description for the Supersonic Rocket Bike of Fly High. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', 2999, 20, 'uploads/supersonic_black_blue_red_.jpg;uploads/supersonic_black_black_black_.jpg;uploads/supersonic_red_black_black_.jpg;uploads/supersonic_red_black_pink_.jpg;uploads/supersonic_black_black_pink_.jpg;uploads/supersonic_black_black_red_.jpg;uploads/supersonic_red_black_red_.jpg;uploads/supersonic_red_pink_black_.jpg;uploads/supersonic_black_pink_black_.jpg;uploads/supersonic_black_pink_pink_.jpg;uploads/supersonic_red_pink_pink_.jpg;uploads/supersonic_red_pink_red_.jpg;uploads/supersonic_black_pink_red_.jpg;uploads/supersonic_black_green_red_.jpg;uploads/supersonic_red_green_red_.jpg;uploads/supersonic_red_green_black_.jpg;uploads/supersonic_black_green_black_.jpg;uploads/supersonic_black_green_pink_.jpg;uploads/supersonic_red_green_pink_.jpg;uploads/supersonic_red_blue_pink_.jpg;uploads/supersonic_red_blue_red_.jpg;uploads/supersonic_red_blue_black_.jpg;uploads/supersonic_black_blue_black_.jpg;uploads/bike_black-blue-pink.jpg', 20200101),
(7, 'Thunderbolt  TX', 'Description of Thunderbolt TX. Behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.', 499, 5, 'uploads/thunderbolt.png', 20200101),
(8, 'Mount Hurricane', 'Description of Mount Hurricane. Behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.', 399, 2, 'uploads/mounthurricane.png', 20200101),
(9, 'Speedo XD', 'Description of Speedo XD. Behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.', 799, 3, 'uploads/speedo.png', 20200101),
(10, 'Star Bike', 'Description of Star Bike. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so.', 199, 2, 'uploads/starbike.png', 20200101),
(11, 'Mount Blazin', 'Description of Mount Blazin. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so.', 179, 3, 'uploads/mountblazin.png', 20200101),
(12, 'Aprilia RS90', 'Description of Aprilia RS90. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 199, 2, 'uploads/aprilia.png', 20200101),
(13, 'Ducati Panigale', 'Description of Ducati Panigale XT. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 299, 2, 'uploads/ducati.png', 20200101),
(14, 'Santa Cruz MX', 'Description of Santa Cruz MX. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove', 499, 3, 'uploads/santacruz.png', 20200101),
(15, 'Cannondale', 'Description of Cannondale. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 159, 2, 'uploads/Cannondale.png', 20200101),
(16, 'Ribble', 'Description of Ribble. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 259, 3, 'uploads/ribble.png', 20200101),
(17, 'Travel Buddy', 'Description of Travel Buddy. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 259, 2, 'uploads/travelbuddy.png', 20200101),
(18, 'Mount Hazel', 'Description of Mount Hazel. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 199, 6, 'uploads/mounthazel.png', 20200101),
(19, 'Racing Trek', 'Description of Racing Trek. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 299, 4, 'uploads/racingtrek.png', 20200101),
(20, 'Lady Shy', 'Description of Lady Shy. Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove.', 159, 7, 'uploads/ladyshy.png', 20200101),
(28, 'Hot Racer', 'Description of Hot Racer. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.', 199, 2, 'uploads/racingtrek.png', 20200601);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '= username',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password Hash',
  `is_admin` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `is_deleted`) VALUES
(1, 'Testkunde', 'Admin', 'testkunde.admin@test.com', '$2y$10$PpovSKomHPzASv.s6QbtaO6Jgh7Rnzvzdqt1efLWbdPREU43dYiYa', 1, NULL),
(7, 'Kerstin', 'Wukoschitz', 'kewu@gmx.at', '$2y$10$x0YEfwzeYo3o3CMrPUsFseapVjwWN7eRLQZohwTXrZ0qc1.LwyGqm', 0, NULL),
(10, 'Kerstin', 'Wukoschitz', 'kerstin.wukoschitz@gmx.net', '$2y$10$RvWgzf467Bhcdcf9/is1Je/N9h2mQB9.pHrkpqUq3FFzdvbG5KiOC', 1, NULL),
(15, 'John', 'Doe', 'testkunde@test.at', '$2y$10$ig6905VDFadJpCb85r5U0.EHmW/K7i/iRV69ack3ht/tCb29QNZWS', 0, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
