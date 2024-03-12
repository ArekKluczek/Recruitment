-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Mar 12, 2024 at 06:53 PM
-- Wersja serwera: 10.4.32-MariaDB-1:10.4.32+maria~ubu2004-log
-- Wersja PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Emily Watson'),
(2, 'Michael Chen'),
(3, 'Alexander Schmidt'),
(4, 'Sofia Martinez'),
(5, 'David Johnson'),
(6, 'Rachel Kim'),
(7, 'Chris Brown'),
(8, 'Naomi Tanaka'),
(9, 'Isabella Johansson');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors_news`
--

CREATE TABLE `authors_news` (
  `authors_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors_news`
--

INSERT INTO `authors_news` (`authors_id`, `news_id`) VALUES
(1, 1),
(1, 8),
(1, 9),
(1, 10),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240310134112', '2024-03-12 18:08:47', 4468),
('DoctrineMigrations\\Version20240310140221', '2024-03-12 18:08:52', 1615),
('DoctrineMigrations\\Version20240310141917', '2024-03-12 18:08:53', 1208),
('DoctrineMigrations\\Version20240310193221', '2024-03-12 18:08:54', 35),
('DoctrineMigrations\\Version20240311093725', '2024-03-12 18:08:55', 63),
('DoctrineMigrations\\Version20240311095349', '2024-03-12 18:08:55', 89),
('DoctrineMigrations\\Version20240311101138', '2024-03-12 18:08:55', 152);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(8192) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `creation_date`) VALUES
(1, 'The Evolution of Ford: Pioneering the Automotive Industry', 'The Ford Motor Company, established by Henry Ford in 1903, has been a pivotal player in the automotive sector. Famous for revolutionizing the manufacturing process with the assembly line method, Ford made cars affordable to the masses, starting with the Model T. Over the years, Ford has continued to innovate, venturing into luxury, performance, and electric vehicles, illustrating adaptability and forward-thinking in an ever-evolving industry.', '2024-03-12'),
(2, 'Toyota: Synonymous with Reliability', 'Toyota Motor Corporation, a Japanese automotive manufacturer, has become synonymous with reliability, durability, and quality. Founded in 1937 by Kiichiro Toyoda, it has grown into one of the largest car manufacturers in the world. Toyota\'s philosophy of continuous improvement (Kaizen) and its pioneering work in hybrid technology with the Prius has cemented its reputation as an industry leader in innovation and sustainability.', '2024-03-12'),
(3, 'The Luxury and Performance of Mercedes-Benz', 'Mercedes-Benz, a division of the German company Daimler AG, is renowned for its luxury vehicles, buses, and trucks. Since its inception in 1926, Mercedes-Benz has set standards in luxury, safety, and performance. It introduced many technological and safety innovations that have become common in modern vehicles. Mercedes-Benz continues to be at the forefront of design and technology, offering a range of vehicles that cater to a variety of preferences and budgets.', '2024-03-12'),
(4, 'BMW: The Ultimate Driving Machine', 'Bayerische Motoren Werke AG, or BMW, is a German multinational company that produces luxury vehicles and motorcycles. Founded in 1916, BMW has established a reputation for performance and innovation, particularly through its M series. BMW’s commitment to quality and driver experience has made it a favorite among car enthusiasts. The company also invests in electric vehicles and sustainability, promising a future where luxury and environmental responsibility go hand in hand.', '2024-03-12'),
(5, 'Tesla: Revolutionizing Electric Vehicles', 'Tesla, Inc., founded in 2003 by Elon Musk and a group of engineers, aims to prove that electric vehicles can be better, quicker, and more fun to drive than gasoline cars. Tesla not only builds all-electric vehicles but also scalable clean energy generation and storage products. The company has significantly accelerated the world\'s transition to sustainable energy with innovations like the Tesla Roadster, Model S, X, 3, and Y, making electric vehicles desirable and accessible to a broader audience.', '2024-03-12'),
(6, 'Audi: Advancing Through Technology', 'Audi AG stands as a prominent figure in the luxury automotive sector, epitomizing German engineering excellence since its inception in 1909. With its slogan \"Vorsprung durch Technik,\" translating to \"Advancement through Technology,\" Audi consistently pushes the boundaries of automotive technology and design. The brand is renowned for its quattro all-wheel-drive system, sophisticated interiors, and cutting-edge infotainment systems. Audi\'s commitment to innovation is also evident in its pursuit of electric mobility, highlighted by the e-tron series, marking a significant step towards a sustainable future.', '2024-03-12'),
(7, 'Chevrolet: An American Icon', 'Chevrolet, also known as Chevy, established in 1911 by William C. Durant and Louis Chevrolet, has grown to symbolize American culture and automotive history. With a diverse lineup that includes fuel-efficient cars, dependable trucks, and performance-oriented vehicles, Chevrolet has something for everyone. The brand\'s most iconic model, the Corvette, has become synonymous with American sports car excellence. Chevrolet continues to innovate while maintaining its commitment to affordability, performance, and reliability.', '2024-03-12'),
(8, 'Honda: The Power of Dreams', 'Honda Motor Co., Ltd. has established itself as a global powerhouse in the automotive and motorcycle markets since its founding in 1948 by Soichiro Honda. Known for its engineering excellence, Honda produces a wide range of high-quality vehicles known for their durability, fuel efficiency, and innovative technology. Honda\'s commitment to the \"Power of Dreams\" philosophy is reflected in its dedication to environmental sustainability, evidenced by its leadership in developing hybrid and hydrogen fuel cell technologies.', '2024-03-12'),
(9, 'Porsche: Synonymous with Sports Car Excellence', 'Porsche AG, founded by Ferdinand Porsche in 1931, has become synonymous with high-performance sports cars, sedans, and SUVs. The brand embodies a blend of luxury, innovation, and racing heritage, making its vehicles highly coveted among enthusiasts. Porsche\'s 911 model, in particular, has stood as a benchmark in sports car design and performance for decades. Porsche also leads in the electrification of sports cars, demonstrated by the Taycan, its first all-electric sports car, showcasing the brand\'s commitment to sustainability without compromising on performance.', '2024-03-12'),
(10, 'Volvo: Safety and Sustainability', 'Volvo Cars, founded in 1927 in Sweden, has long been associated with safety, quality, and sustainability. The brand\'s commitment to these values is evident in its pioneering safety features, such as the three-point seatbelt, and its ambitious plan to become climate neutral by 2040. Volvo\'s vehicle lineup includes not only safe and reliable family cars but also plug-in hybrids and fully electric models, reflecting its vision for a greener future. With a focus on human-centric design, Volvo continues to innovate in safety technology and environmental responsibility.', '2024-03-12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'test@test.pl', '[\"ROLE_ADMIN\"]', '$2y$13$Fx4HfJ7CoyEc8HV0truSDeZsmrnlAcphy99iS0oryL4VHlgaI/7Z2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `authors_news`
--
ALTER TABLE `authors_news`
  ADD PRIMARY KEY (`authors_id`,`news_id`),
  ADD KEY `IDX_26100CCB6DE2013A` (`authors_id`),
  ADD KEY `IDX_26100CCBB5A459A0` (`news_id`);

--
-- Indeksy dla tabeli `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors_news`
--
ALTER TABLE `authors_news`
  ADD CONSTRAINT `FK_26100CCB6DE2013A` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_26100CCBB5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
