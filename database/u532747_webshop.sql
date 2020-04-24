-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 24 apr 2020 om 19:05
-- Serverversie: 5.5.14
-- PHP-versie: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u532747_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'jarmo123', 'cc03e747a6afbbcbf8be7668acfebee5'),
(11, 'jarmokanon', '28591c581f830b8e6ad7a98fafc8a664'),
(12, 'ja', 'a78c5bf69b40d464b954ef76815c6fa0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`) VALUES
(1, 'smartphones', 'De beste smartphones.', 1),
(2, 'huishouden', 'Alles voor het huishouden.', 1),
(3, 'geluid', 'De beste audio.', 1),
(4, 'gaming', 'Games, consoles, etc.', 1),
(5, 'verzorging', 'Alles voor een goed uiterlijk.', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `gender` int(1) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `street` varchar(100) NOT NULL,
  `housenumber` int(2) NOT NULL,
  `housenumber_addon` varchar(1) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `city` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `e-mailadres` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter_subscription` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`id`, `gender`, `firstname`, `middlename`, `lastname`, `street`, `housenumber`, `housenumber_addon`, `zipcode`, `city`, `phone`, `e-mailadres`, `password`, `newsletter_subscription`) VALUES
(1, 0, 'Jake', '', 'Posthouwer', 'Magnoliastraat', 6, '', '3531GS', 'Utrecht', '06 18585761', '533301@student.glu.nl', '8572aae71f38b186bebfd018f953464e', 1),
(2, 1, 'jarmo', '-', 'kanon', 'julianaweg', 13, '-', '3433EA', 'nieuwegein', '0622079110', '532747@student.glu.nl', 'ja123', 1),
(8, 1, 'luca', '', 'ciappa', 'utrechtseweg', 36, '', '1234AB', 'utrecht', '0634987765', 'luca@ciappa.nl', 'ff377aff39a9345a9cca803fb5c5c081', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'iphone xs', 'In 2017 kwam Apple dan eindelijk weer eens met een veranderd design met de iPhone X. In 2018 zetten ze het succes van dit design door met de iPhone XS 64GB Black. Van de buitenkant lijkt hij misschien identiek aan de iPhone X, maar onder de motorkap zit een wereld van verschil.\r\n\r\nHet toestel heeft dus nog steeds het bekende 5,8-inchscherm met OLED-display, die bijna de hele voorkant beslaat. De chip is echter wel verbeterd, waardoor het toestel nÃ³g sneller werkt. Daarnaast is de camera ook flink verbeterd!', 1, '699.00', 'black', 177, 1),
(2, 'iphone xr', 'In 2013 presenteerde Apple voor het eerst een meer budget-gericht toestel, de iPhone 5C. Vijf jaar later kiest Apple er wederom voor om een goedkopere iPhone naast hun gebruikelijke vlaggenschepen te presenteren. Met de iPhone XR krijg je dan ook voor minder geld een zeer goede iPhone, je levert alleen in op wat extra\'s.\r\n\r\nZoals je mag verwachten heeft deze iPhone een modern ontwerp met een randloos scherm en een degelijke behuizing. Aan de achterzijde is een enkele camera waarmee je mooie foto\'s schiet. En met de Apple A12 chipset kom je ook zeker geen rekenkracht tekort.', 1, '646.00', 'white', 194, 1),
(3, 'iphone 11', 'De iPhone 11 is gepresenteerd tijdens een event in september wat door Apple werd gehouden in Amerika. Het toestel is gepresenteerd in de kleuren zwart, wit, geel, rood en de nieuwe kleuren lavendel en groen. Daarbij heb je ook weer keuze uit modellen met 64GB, 128GB of 256GB opslag.\r\n\r\nHet scherm is een 6.1-inchvariant met aan de bovenkant een inkeping voor verschillende sensoren. De snelle A13-processor van Apple is aanwezig en op de achterkant zijn twee cameras te vinden. Opladen kan met een kabel of draadloos en het toestel draait op iOS 13 met onder andere een donkere modus.', 1, '779.00', 'black', 194, 1),
(4, 'PHILIPS Azur Advanced GC4937/20', '7 dagen per week thuisbezorgdAfhalen en betalen in 50 winkelsGratis retourneren binnen 100 dagenAchteraf betalenBinnen 2 uur af te halen in de winkel\r\nHomeHuishoudenStrijkijzersStoomstrijkijzers\r\nPHILIPS Azur Advanced GC4937/20\r\nPHILIPS\r\nâ˜†â˜†â˜†â˜†â˜†\r\nâ˜†â˜†â˜†â˜†â˜†4.6 van de 5 sterren. Beoordelingen lezen van Azur Advanced GC4937/20 \r\n4.6 45 BeoordelingenMet deze actie navigeer je naar beoordelingen.\r\n27 van de 28 (96 %) beoordelaars bevelen dit product aan\r\nAlle productspecificaties\r\nPHILIPS Azur Advanced GC4937/20\r\nBEKIJK PRODUCTVIDEO\r\nGrotere afbeeldingen\r\nType apparaat: Stoomstrijkijzer\r\nVermogen: 3000 W\r\nInhoud waterreservoir: 330 ml\r\nVerticale stoom: Ja\r\nZoolmateriaal: SteamGlide Advanced\r\nKrachtig & snelMet de Philips SteamGlide Advanced strijk je krachtig en snel alle kreuken uit je kleding. Dankzij de OptimalTEMP-technologie gebruik je automatisch de juiste temperatuur- en stoominstellingen. Je hoeft alleen de stekker in het stopcontact te stoppen en je strijkt al je kleding moeiteloos glad. Daarnaast loop je geen risico dat het strijkijzer aan je kleding plakt of dat er brand- of schroeiplekken ontstaan.\r\nExtra krachtige stoomDe Philips SteamGlide Advanced produceert tijdens het strijken voldoende stoom om de meeste kreuken glad te strijken. Voor de echt hardnekkige kreukels gebruik je de stoomstoot van 240 gram per minuut. Ze verdwijnen als sneeuw voor de zon.\r\nLangdurige prestatiesDe Philips SteamGlide Advanced heeft een speciale zoolplaat die ervoor zorgt dat je soepel over je kleding glijdt. Daarnaast is hij zo krasbestendig dat hij lang mee gaat. Daarnaast is het strijkijzer voorzien van Calc Clean. Deze techniek zorgt ervoor dat het strijkijzer het zelf aangeeft als het tijd is om te ontkalken. Het strijkijzer reinigt zichzelf, het enige wat jij hoeft te doen is het vuile water weggooien. Nog een voordeel: je kunt het strijkijzer veilig met kraanwater vullen.', 2, '71.00', 'blue / whi', 500, 1),
(5, 'BOSCH SMS46AI07E', 'Soort apparaat: Standaard (60 cm breed)\r\nAantal couverts: 12\r\nGeluidsniveau: 48 dB\r\nAantal programma\'s: 6\r\nDroogsysteem: Conventioneel\r\nDe Bosch SMS46AI07E vaatwasser uit serie 4 heeft 6 vaatwasprogramma\'s waarmee jij de vuile vaat goed schoon kunt krijgen. Gebruik het Glas 40Â°C-programma zodat jouw mooie, kwetsbare glazen zorgvuldig schoon worden gewassen. Deze vaatwasser heeft 3 aanvullende functies op de vaatwasprogramma\'s. De HygiÃ«nePlus-functie zorgt ervoor dat het servies van jouw kinderen goed schoon wordt dankzij een hoge temperatuur van 70Â°C. Jouw gekozen vaatwasprogramma wast 2 keer zo snel jouw vuile vaat schoon met de VarioSpeed-functie. De Extra Droog-functie zorgt ervoor dat het droogproces wordt verlengd zodat jouw vaat nog beter droog wordt. Stel jouw gewenste vaatwasprogramma in via het groot LED-display. De Bosch SMS46AI07E beschikt over Vario-korven en een AquaStop-waterbeveiligingssysteem.Dit zit in de verpakking:\r\nVaatwasser, aanvoerslang, afvoerslang, aansluitsnoer en een gebruikershandleiding.', 2, '429.00', 'silver', 10, 1),
(6, 'airpods 2', 'Deze AirPods 2019 zijn van de tweede generatie en zijn nog geavanceerder dan de eerste variant. De kenmerkende witte oordopjes van Apple kun je draadloos koppelen via Bluetooth aan je iPhone of iPad. Zo kun je urenlang muziek luisteren, gesprekken voeren of bijvoorbeeld de digitale assistent Siri gebruiken!\r\n\r\nEr is bij deze nieuwere variant gekozen voor een compleet nieuwe Apple H1-koptelefoonchip. Zo is geluid nog beter en worden verschillende sensoren gebruikt om te detecteren hoe je de dopjes draagt. Geluid wordt automatisch naar Ã©Ã©n of twee oortjes gestuurd, dat betekent altijd volop genieten.', 3, '140.00', 'white', 11, 1),
(7, 'airpods pro', 'De AirPods Pro zijn bluetoothoordoppen met noise cancelling waarmee je je afsluit van omgevingsgeluiden. De oortjes worden geleverd in een draadloze oplaadcase. Wanneer je de AirPods in de case opbergt, worden ze direct opgeladen. Handig voor onderweg dus!\r\n\r\nTen opzichte van de vorige AirPods, is het design van de Pro iets anders. Dit zijn weer echte in-ear oordopjes, waarbij drie maten siliconen dopjes worden meegeleverd. Verder is de steel voorzien van een druksensor waarmee je verschillende acties kunt uitvoeren.', 3, '279.00', 'white', 11, 1),
(8, 'playstation 4 pro 1tb', 'De PlayStation 4 Pro is er voor serieuze gamers die elke dag de beste graphics en prestaties verwachten. De Pro is namelijk 2x krachtiger dan een PS4 Slim. Hierdoor speel je games in 4K of kies je voor nog vloeiender beeld. Ook ziet het beeld er op de PSVR er een stuk beter uit. Heb je een luxe gaming headset of surround sound geluidssyteem, dan sluit je deze direct aan op de optische audio poort. Als een 4K tv nog op je verlanglijstje staat, dan zorgt de Pro ook bij 1080p tv\'s en monitoren voor vloeiender beeld met meer zichtbare details.\r\n\r\nLet op! De PS4 Pro is ongeveer 2 keer zo krachtig als een reguliere PS4. Zoveel rekenkracht wekt bij intensief gebruik warmte op. Het is dus verstandig om de PS4 Pro bij gebruik niet in een klein of afgesloten kastje te laten staan. Het model betreft CUH-7216B, het stillere model.', 4, '399.00', 'black', 3, 1),
(9, 'Philips Series 5000 S5530/06 + Philips SH50/50', 'Productomschrijving\r\nMet de Philips Series 5000 S5530/06 + Philips SH50/50 scheer jij je de aankomende 4 jaar glad, zonder dat je nieuwe scheerringen hoeft te kopen. De scheerringen zijn na 2 jaar toe aan vervanging en bij dit scheerapparaat krijg je een set nieuwe scheerringen. Handig, want zo heb je genoeg voor 4 jaar scheer plezier. Om de zware baardgroei af te scheren beschikt dit scheerapparaat over een Turbo+ modus. In deze stand genereert het scheerapparaat 20 procent extra scheervermogen, zodat je zelfs de dikste baardharen moeiteloos afscheert. Met het meegeleverde precisietrimmer opzetstuk werk je ook je bakkebaarden netjes bij.', 5, '124.00', 'black / bl', 300, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `active`) VALUES
(5, 1, 'img/iphonexs1.png', 1),
(6, 2, 'img/iphonexr1.png', 1),
(7, 3, 'img/iphone11_1.png', 1),
(8, 4, 'img/strijk1.png', 1),
(9, 5, 'img/vaatwas1.png', 1),
(10, 6, 'img/airpods1.png', 1),
(11, 7, 'img/airpodspro1.png', 1),
(12, 8, 'img/ps4pro1.png', 1),
(13, 9, 'img/scheer1.png', 1),
(14, 0, 'img/telefoon.jpg', 1),
(15, 10, 'img/telefoon.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `street` varchar(70) NOT NULL,
  `houseNumber` int(4) NOT NULL,
  `houseNumber_addon` varchar(4) NOT NULL,
  `zipCode` varchar(8) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `delivery` enum('ophalen','bezorgen_thuis','bezorgen_anders','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `date`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `country`, `paid`, `delivery`) VALUES
(1, 2, '2020-03-30 20:08:00', 'ander afleveradres straatnaam', 123, 'bis', '1234AB', 'utrecht', 'nederland', 1, 'bezorgen_anders'),
(2, 1, '2020-04-23 12:28:47', 'julianaweg ', 13, 'a', '4321AB', 'nieuwegein', 'nederland', 1, 'ophalen'),
(3, 3, '2020-04-29 12:28:47', 'dorpsstraat', 10, 'c', '5678CD', 'utrecht', 'nederland', 0, 'bezorgen_anders'),
(4, 1, '2020-04-23 12:28:47', 'julianaweg ', 13, 'a', '4321AB', 'nieuwegein', 'nederland', 1, 'ophalen'),
(5, 3, '2020-04-29 12:28:47', 'dorpsstraat', 10, 'c', '5678CD', 'utrecht', 'nederland', 0, 'bezorgen_anders');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(50) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(1, 1, 5, 3),
(2, 1, 1, 1),
(3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `mail`, `password`) VALUES
(1, 'jarmo', '', 'kanon', '2002-07-27', '532747@student.glu.nl', '7e28943a52aa7981d51c135432ab8937'),
(4, 'jarmo', '', 'kanon', '2002-07-27', 'jarmokanon@hotmail.com', '1e0b051fbb8ed074c44ee4691fce347f'),
(25, 'luca', '', 'ciappa', '0000-00-00', 'luca@ciappa.nl', 'ff377aff39a9345a9cca803fb5c5c081');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e-mailadres` (`e-mailadres`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e-mailadres` (`mail`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
