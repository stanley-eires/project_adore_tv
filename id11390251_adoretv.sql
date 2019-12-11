-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2019 at 12:18 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11390251_adoretv`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `name`) VALUES
(1, 'Desmond Elliot'),
(2, 'Nwanchukwu Uti'),
(3, 'Majid Michael'),
(4, 'John Dumelo'),
(5, 'Yvonne Nelson'),
(6, 'Richard Mofe Damijo'),
(7, 'Okey Uzoeshi'),
(8, 'Eyinna Nwigwe'),
(9, 'Ramson Noah'),
(10, 'Omotola Jolade '),
(11, 'Van Vicker'),
(12, 'Mercy Johnson'),
(13, 'Dakoree Akande'),
(14, 'Tosin Sido'),
(15, 'Katherine Obiang'),
(16, 'Nse Ekpe Etim'),
(17, 'Tonto Dikeh'),
(18, 'Mercy Aigbe'),
(19, 'Rita Dominic'),
(20, 'Adunni Ade'),
(21, 'Banky Wellington'),
(22, 'Jemima Osunde'),
(26, 'Funke Akindele'),
(27, 'Joseph Benjamin'),
(28, 'Tina Mba'),
(29, 'Rita Edwards'),
(30, 'Damilola Adegbite'),
(31, 'Bolanle Olukanni'),
(32, 'Omoni Oboli'),
(33, 'Mike Godson'),
(34, 'Chelsea Eze'),
(35, 'Wole Ojo'),
(36, 'Mary Lazarus'),
(37, 'Neye Balogun'),
(38, 'Genevive Nnaji'),
(39, 'Clem Ohameze'),
(40, 'Kenneth Okonkwo'),
(41, 'Kanayo O Kanayo'),
(42, 'Nancy Isime'),
(43, 'Bob Manuel'),
(44, 'Alexx Ekubo'),
(45, 'Obasanjo'),
(46, 'Babangida'),
(47, 'Buhari'),
(48, 'Joke Silva'),
(49, 'Chika Okpala'),
(50, 'Oma Nnadi'),
(51, 'Ken Erics'),
(52, 'Yvonne Jegede'),
(53, 'Padita Agu'),
(54, 'Jim Iyke'),
(55, 'Carolyne Hutchings'),
(56, 'Emem Inwang'),
(57, 'Stella Damasus'),
(58, 'Ik Ogbonna'),
(59, 'Tamara Eteimo'),
(60, 'Paul Sambo'),
(61, 'Charity Onah'),
(62, 'Adesua Etomi'),
(63, 'Oc Ukeje'),
(64, 'Ini Edo');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `paypal_supported` int(11) DEFAULT NULL,
  `stripe_supported` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `symbol`, `paypal_supported`, `stripe_supported`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0, 1),
(2, 'Dollars', 'USD', '$', 1, 1),
(3, 'Afghanis', 'AFN', '؋', 0, 1),
(4, 'Pesos', 'ARS', '$', 0, 1),
(5, 'Guilders', 'AWG', 'ƒ', 0, 1),
(6, 'Dollars', 'AUD', '$', 1, 1),
(7, 'New Manats', 'AZN', 'ман', 0, 1),
(8, 'Dollars', 'BSD', '$', 0, 1),
(9, 'Dollars', 'BBD', '$', 0, 1),
(10, 'Rubles', 'BYR', 'p.', 0, 0),
(11, 'Euro', 'EUR', '€', 1, 1),
(12, 'Dollars', 'BZD', 'BZ$', 0, 1),
(13, 'Dollars', 'BMD', '$', 0, 1),
(14, 'Bolivianos', 'BOB', '$b', 0, 1),
(15, 'Convertible Marka', 'BAM', 'KM', 0, 1),
(16, 'Pula', 'BWP', 'P', 0, 1),
(17, 'Leva', 'BGN', 'лв', 0, 1),
(18, 'Reais', 'BRL', 'R$', 1, 1),
(19, 'Pounds', 'GBP', '£', 1, 1),
(20, 'Dollars', 'BND', '$', 0, 1),
(21, 'Riels', 'KHR', '៛', 0, 1),
(22, 'Dollars', 'CAD', '$', 1, 1),
(23, 'Dollars', 'KYD', '$', 0, 1),
(24, 'Pesos', 'CLP', '$', 0, 1),
(25, 'Yuan Renminbi', 'CNY', '¥', 0, 1),
(26, 'Pesos', 'COP', '$', 0, 1),
(27, 'Colón', 'CRC', '₡', 0, 1),
(28, 'Kuna', 'HRK', 'kn', 0, 1),
(29, 'Pesos', 'CUP', '₱', 0, 0),
(30, 'Koruny', 'CZK', 'Kč', 1, 1),
(31, 'Kroner', 'DKK', 'kr', 1, 1),
(32, 'Pesos', 'DOP ', 'RD$', 0, 1),
(33, 'Dollars', 'XCD', '$', 0, 1),
(34, 'Pounds', 'EGP', '£', 0, 1),
(35, 'Colones', 'SVC', '$', 0, 0),
(36, 'Pounds', 'FKP', '£', 0, 1),
(37, 'Dollars', 'FJD', '$', 0, 1),
(38, 'Cedis', 'GHC', '¢', 0, 0),
(39, 'Pounds', 'GIP', '£', 0, 1),
(40, 'Quetzales', 'GTQ', 'Q', 0, 1),
(41, 'Pounds', 'GGP', '£', 0, 0),
(42, 'Dollars', 'GYD', '$', 0, 1),
(43, 'Lempiras', 'HNL', 'L', 0, 1),
(44, 'Dollars', 'HKD', '$', 1, 1),
(45, 'Forint', 'HUF', 'Ft', 1, 1),
(46, 'Kronur', 'ISK', 'kr', 0, 1),
(47, 'Rupees', 'INR', 'Rp', 0, 1),
(48, 'Rupiahs', 'IDR', 'Rp', 0, 1),
(49, 'Rials', 'IRR', '﷼', 0, 0),
(50, 'Pounds', 'IMP', '£', 0, 0),
(51, 'New Shekels', 'ILS', '₪', 1, 1),
(52, 'Dollars', 'JMD', 'J$', 0, 1),
(53, 'Yen', 'JPY', '¥', 1, 1),
(54, 'Pounds', 'JEP', '£', 0, 0),
(55, 'Tenge', 'KZT', 'лв', 0, 1),
(56, 'Won', 'KPW', '₩', 0, 0),
(57, 'Won', 'KRW', '₩', 0, 1),
(58, 'Soms', 'KGS', 'лв', 0, 1),
(59, 'Kips', 'LAK', '₭', 0, 1),
(60, 'Lati', 'LVL', 'Ls', 0, 0),
(61, 'Pounds', 'LBP', '£', 0, 1),
(62, 'Dollars', 'LRD', '$', 0, 1),
(63, 'Switzerland Francs', 'CHF', 'CHF', 1, 1),
(64, 'Litai', 'LTL', 'Lt', 0, 0),
(65, 'Denars', 'MKD', 'ден', 0, 1),
(66, 'Ringgits', 'MYR', 'RM', 1, 1),
(67, 'Rupees', 'MUR', '₨', 0, 1),
(68, 'Pesos', 'MXN', '$', 1, 1),
(69, 'Tugriks', 'MNT', '₮', 0, 1),
(70, 'Meticais', 'MZN', 'MT', 0, 1),
(71, 'Dollars', 'NAD', '$', 0, 1),
(72, 'Rupees', 'NPR', '₨', 0, 1),
(73, 'Guilders', 'ANG', 'ƒ', 0, 1),
(74, 'Dollars', 'NZD', '$', 1, 1),
(75, 'Cordobas', 'NIO', 'C$', 0, 1),
(76, 'Nairas', 'NGN', '₦', 0, 1),
(77, 'Krone', 'NOK', 'kr', 1, 1),
(78, 'Rials', 'OMR', '﷼', 0, 0),
(79, 'Rupees', 'PKR', '₨', 0, 1),
(80, 'Balboa', 'PAB', 'B/.', 0, 1),
(81, 'Guarani', 'PYG', 'Gs', 0, 1),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0, 1),
(83, 'Pesos', 'PHP', 'Php', 1, 1),
(84, 'Zlotych', 'PLN', 'zł', 1, 1),
(85, 'Rials', 'QAR', '﷼', 0, 1),
(86, 'New Lei', 'RON', 'lei', 0, 1),
(87, 'Rubles', 'RUB', 'руб', 0, 1),
(88, 'Pounds', 'SHP', '£', 0, 1),
(89, 'Riyals', 'SAR', '﷼', 0, 1),
(90, 'Dinars', 'RSD', 'Дин.', 0, 1),
(91, 'Rupees', 'SCR', '₨', 0, 1),
(92, 'Dollars', 'SGD', '$', 1, 1),
(93, 'Dollars', 'SBD', '$', 0, 1),
(94, 'Shillings', 'SOS', 'S', 0, 1),
(95, 'Rand', 'ZAR', 'R', 0, 1),
(96, 'Rupees', 'LKR', '₨', 0, 1),
(97, 'Kronor', 'SEK', 'kr', 1, 1),
(98, 'Dollars', 'SRD', '$', 0, 1),
(99, 'Pounds', 'SYP', '£', 0, 0),
(100, 'New Dollars', 'TWD', 'NT$', 1, 1),
(101, 'Baht', 'THB', '฿', 1, 1),
(102, 'Dollars', 'TTD', 'TT$', 0, 1),
(103, 'Lira', 'TRY', 'TL', 0, 1),
(104, 'Liras', 'TRL', '£', 0, 0),
(105, 'Dollars', 'TVD', '$', 0, 0),
(106, 'Hryvnia', 'UAH', '₴', 0, 1),
(107, 'Pesos', 'UYU', '$U', 0, 1),
(108, 'Sums', 'UZS', 'лв', 0, 1),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0, 0),
(110, 'Dong', 'VND', '₫', 0, 1),
(111, 'Rials', 'YER', '﷼', 0, 1),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `name`) VALUES
(1, 'Kunle Afolayan'),
(2, 'Jay Franklyn Jituboh'),
(3, 'Eires Stanley'),
(4, 'Kemi Adetiba'),
(5, 'Desmond Elliot'),
(9, 'Jade Osiberu'),
(10, 'Omoni Oboli'),
(11, 'Emem Isong'),
(12, 'Esther Abah'),
(13, 'Chineze Anyaene'),
(14, 'Ramsey Nouah'),
(15, 'Robert Peter'),
(16, 'Shittu Taiwo'),
(17, 'Okey Zubelu Okoh'),
(18, 'Moses Inwang'),
(19, 'Onuora Onianwa'),
(20, 'Iyke Odife');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `episode_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` longtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'What is AdoreTV', 'AdoreTv is a streaming service that offers a wide variety of award-winning TV shows, movies, anime, documentaries, and more on thousands of internet-connected devices.\r\n\r\nYou can watch as much as you want, whenever you want without a single commercial – all for one low monthly price. There\'s always something new to discover and new TV shows and movies are added every week!'),
(2, 'What are the packages?', 'There are 3 package \r\n<ol>\r\n<li>Monthly : 1 user screen for ₦365 per month</li>\r\n<li>Bi-Annual : 2 user screen for ₦1200 6 month</li>\r\n<li>Annual: 4 user screen for ₦2000 One year</li>\r\n</ol>'),
(3, 'How many devices can i use?', 'According to your purchased package, you can access upto 1,2 or 4 devices at once from same account.'),
(4, 'Can i pause my subscription', 'No you cant at the moment'),
(5, 'Do you show foreign (HOLLYWOOD) movies?', 'No! AdoreTv is home for nollywood contents. Since nollywood and ghana movie industry are related, we might be putting up ghana movie contents too');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`) VALUES
(3, 'Comedy'),
(2, 'Drama'),
(4, 'Epic'),
(1, 'Family'),
(6, 'Historical'),
(5, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `director` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL,
  `kids_restriction` int(11) NOT NULL DEFAULT 0,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `trailer_url` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description_short`, `description_long`, `year`, `rating`, `genre_id`, `director`, `actors`, `featured`, `kids_restriction`, `url`, `trailer_url`) VALUES
(2, 'Finding Mercy   ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, maiores mollitia.', '', 2016, 2, 1, 3, '[\"1\",\"2\",\"14\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(3, 'The Game     ', 'WHO WINS? HE WHO PLAYS TO WIN OR THE ONE WHO PLAYS TO DEFEAT', '', 2017, 5, 2, 3, '[\"3\",\"4\",\"5\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(4, 'Dinner  ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, maiores mollitia. ', '', 2019, 5, 2, 2, '[\"8\",\"7\",\"6\"]', 0, 0, 'https://adoretv.000webhostapp.com/video/video1.mp4', ''),
(5, 'Guilty Pleasures   ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, maiores mollitia. Harum dolorem enim delectus laudantium esse, veritatis vitae fuga laboriosam, ', '', 2016, 3, 2, 3, '[\"9\",\"5\",\"3\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(6, 'Amina  ', 'A woman\'s journey to self discovery', '', 2012, 4, 4, 3, '[\"12\",\"11\",\"10\"]', 1, 0, 'https://www.example.com/video/video1.mp4', ''),
(7, 'Journey to Self  ', 'An intense story of friendship,sacrifice,empowerment and self respect', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, maiores mollitia. Harum dolorem enim delectus laudantium esse, veritatis vitae fuga laboriosam, nemo saepe illo consequatur, aspernatur voluptatem rerum distinctio. Fugit, quis. Quam adipisci fuga atque soluta accusantium, illum esse ratione molestias, perspiciatis deserunt ipsam vel. Commodi aliquam expedita accusantium sequi iure rem ad quas provident odit repellendus odio, quos tenetur illo in voluptas esse facere maxime, nam laborum illum. Necessitatibus illo ipsum excepturi, fuga odio vel eos sed inventore quasi eveniet quaerat quibusdam in, labore nemo nesciunt minima quam exercitationem iste est nobis laboriosam? Voluptate iusto perspiciatis ipsum ipsa eaque.', 2019, 3, 2, 3, '[\"16\",\"15\",\"14\",\"13\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(8, 'October 1  ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, maiores mollitia. Harum dolorem enim delectus laudantium esse, veritatis vitae fuga laboriosam, nemo saepe illo consequatur, aspernatur voluptatem rerum distinctio. ', '', 2017, 3, 4, 1, '[\"2\",\"1\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(10, 'Ijele The Warrior   ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo reiciendis quia esse quis, est sint nobis, fuga corrupti vitae cupiditate provident quod quibusdam harum. Eveniet quis praesentium, ex ratione sit eos? ', '', 2019, 5, 4, 3, '[\"11\",\"9\",\"4\",\"2\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(12, 'Unjustified ', 'Show me a husband that is promiscuous and i will show you a wife that remain faithful and caring all the way. Fedrick choose the path to always cheat on his wife but the end result is unexpected. Enjoy this thrilling movie \"UNJUSTIFIED', 'Show me a husband that is promiscuous and i will show you a wife that remain faithful and caring all the way. Fedrick choose the path to always cheat on his wife but the end result is unexpected. Enjoy this thrilling movie \"UNJUSTIFIED', 2019, 4, 5, 4, '[\"4\",\"3\",\"2\"]', 0, 0, 'https://youtu.be/7-H7vAyECQ8', ''),
(13, 'Forgetting June   ', 'From The Movie: Forgetting June\"\r\nMost beautiful and admirable couple in town which everyone refers to as inseparable ends up in an unforeseen dilemma, the groom is meant to believe that his dear wife died in an auto crash. Majid Michel, Mbong Amata, Beverly Naya (2013)\r\n\r\niROKOtv is the home of the latest and greatest Nigerian Nollywood movies, Nigerian TV Shows and Ghanaian Ghallywood movies . Visit http://irokotv.com?utm_source=youtube... to watch and download thousands of hot Nigerian movies featuring amazing Nollywood actors such as Mercy Johnson, Mama Gee, Ivie Okujaye, Majid Michel, Genevieve Nnaji, Ramsey Noah, Jim Iyke, the hilarious Mr Ibu and many more. With new Nollywood movies released on Irokotv.com every week, we work extremely hard to maximize your viewing pleasure. Subscribe to http://irokotv.com?utm_source=youtube... today and get your fill of the latest 2015 Nigerian & African movies, Yoruba movies, Ibo Movies all available to you online.\r\n\r\nWatch loads of Nigerian movie trailers, Nigerian movie clips & teasers featuring your favorite Nollywood actors', 'From The Movie: Forgetting June\"\r\nMost beautiful and admirable couple in town which everyone refers to as inseparable ends up in an unforeseen dilemma, the groom is meant to believe that his dear wife died in an auto crash. Majid Michel, Mbong Amata, Beverly Naya (2013)\r\n\r\niROKOtv is the home of the latest and greatest Nigerian Nollywood movies, Nigerian TV Shows and Ghanaian Ghallywood movies . Visit http://irokotv.com?utm_source=youtube... to watch and download thousands of hot Nigerian movies featuring amazing Nollywood actors such as Mercy Johnson, Mama Gee, Ivie Okujaye, Majid Michel, Genevieve Nnaji, Ramsey Noah, Jim Iyke, the hilarious Mr Ibu and many more. With new Nollywood movies released on Irokotv.com every week, we work extremely hard to maximize your viewing pleasure. Subscribe to http://irokotv.com?utm_source=youtube... today and get your fill of the latest 2015 Nigerian & African movies, Yoruba movies, Ibo Movies all available to you online.\r\n\r\nWatch loads of Nigerian movie trailers, Nigerian movie clips & teasers featuring your favorite Nollywood actors', 2019, 5, 5, 1, '[\"5\",\"3\"]', 0, 0, 'https://youtu.be/XaiGf6snCDs', 'https://youtu.be/XaiGf6snCDs'),
(14, 'Guy Next-Door   ', 'Nollywoodstars Latest NIGERIAN COMEDY 2018/2019 \r\n\r\nNollywoodstars Latest Nigerian Village movies |NIGERIAN MOVIES 2018/2019,NIGERIAN FUMNY COMEDY\r\n\r\nWe ensure you have the best of video,Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018 | AFRICAN MOVIES 2018/2019 | NOLLYWOOD MOVIES 2018/2019\r\n\r\nfree on the YouTube, our movies would keep you glued to your screen, we have several movies that can be watched and enjoyed with your family members, \r\n\r\nAfrica cinema movies is the largest point of collection for Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018/2019 | AFRICAN MOVIES 2018 | NOLLYWOOD MOVIES 2018 , NIGERIAN FUNNY COMEDY .\r\n\r\nStay Tune to our new release Latest Movies. giving you an experience that is worth every moment you stay online. when you think classic movies,\r\n\r\nNollywoodstars Latest Nigerian Village movies ,NIGERIAN FUNNY COMEDY Subscribe to our channel today and get your fill of the Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018 | AFRICAN MOVIES 2018/2019 | NOLLYWOOD MOVIES 2018/2019\r\n\r\nAlso please feel free to leave your comments and suggestions below regarding this movie and other movies you want to watch.Free Nollywood Movies Online 2018/2019 Latest Nigerian Movies', 'Nollywoodstars Latest NIGERIAN COMEDY 2018/2019 \r\n\r\nNollywoodstars Latest Nigerian Village movies |NIGERIAN MOVIES 2018/2019,NIGERIAN FUMNY COMEDY\r\n\r\nWe ensure you have the best of video,Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018 | AFRICAN MOVIES 2018/2019 | NOLLYWOOD MOVIES 2018/2019\r\n\r\nfree on the YouTube, our movies would keep you glued to your screen, we have several movies that can be watched and enjoyed with your family members, \r\n\r\nAfrica cinema movies is the largest point of collection for Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018/2019 | AFRICAN MOVIES 2018 | NOLLYWOOD MOVIES 2018 , NIGERIAN FUNNY COMEDY .\r\n\r\nStay Tune to our new release Latest Movies. giving you an experience that is worth every moment you stay online. when you think classic movies,\r\n\r\nNollywoodstars Latest Nigerian Village movies ,NIGERIAN FUNNY COMEDY Subscribe to our channel today and get your fill of the Nollywoodstars Latest Nigerian Village movies | NIGERIAN MOVIES 2018 | AFRICAN MOVIES 2018/2019 | NOLLYWOOD MOVIES 2018/2019\r\n\r\nAlso please feel free to leave your comments and suggestions below regarding this movie and other movies you want to watch.Free Nollywood Movies Online 2018/2019 Latest Nigerian Movies', 2019, 5, 5, 3, '[\"34\",\"33\",\"12\",\"7\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(15, 'Isoken   ', 'isoken', 'isoken', 2018, 4, 5, 4, '[\"31\",\"30\",\"29\",\"28\",\"27\",\"26\",\"13\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(16, 'Moms Wars   ', '#2019nigerianmovie #latestmovie #latestnigerianmovies #nigerianmovie #moviesat7 #trendingmovies #BLACKAMERICANlatestNigerianmovies #2019BLACKAMERICAN #BLACKAMERICANlatestNigerianmovies2019 #BLACKAMERICANAFRICANSMOVIES #LatestNigerianmovies #LATESTHAPPENINGMOVIES #LATESTHAPPENINGVIDEOS #2019nigerianmovies #24hrsNigerianMovies #YouTubeTrending\r\nYou can also leave share and like this interestingLatest #Nollywood Movies 2019 #NigeriaFullMovie2019 #nigerianmovies2019 #2019africannollywoodmovies\r\n#africanmoviesnigerianmovies #recommendedmovies #Nigerianmovies #Nollywoodmovies #LatestNigerianMovies #nigerianmovies #africanmovies\r\n\r\n\r\n\r\n\r\nWATCH OUT FOR NEW RELEASES ON THIS CHANNEL EVERYDAY AT 7PM.\r\n\r\n\r\nThis Channel is owned by BTA Investment Ltd.\r\nFor further information or feedback please send us an email at:\r\nblessing@btainvestment.com or tunde@btainvestment.com\r\nWe will be right there to attend to you as soon as possible.', '#2019nigerianmovie #latestmovie #latestnigerianmovies #nigerianmovie #moviesat7 #trendingmovies #BLACKAMERICANlatestNigerianmovies #2019BLACKAMERICAN #BLACKAMERICANlatestNigerianmovies2019 #BLACKAMERICANAFRICANSMOVIES #LatestNigerianmovies #LATESTHAPPENINGMOVIES #LATESTHAPPENINGVIDEOS #2019nigerianmovies #24hrsNigerianMovies #YouTubeTrending\r\nYou can also leave share and like this interestingLatest #Nollywood Movies 2019 #NigeriaFullMovie2019 #nigerianmovies2019 #2019africannollywoodmovies\r\n#africanmoviesnigerianmovies #recommendedmovies #Nigerianmovies #Nollywoodmovies #LatestNigerianMovies #nigerianmovies #africanmovies\r\n\r\n\r\n\r\n\r\nWATCH OUT FOR NEW RELEASES ON THIS CHANNEL EVERYDAY AT 7PM.\r\n\r\n\r\nThis Channel is owned by BTA Investment Ltd.\r\nFor further information or feedback please send us an email at:\r\nblessing@btainvestment.com or tunde@btainvestment.com\r\nWe will be right there to attend to you as soon as possible.', 2019, 5, 3, 10, '[\"32\",\"26\",\"4\"]', 0, 0, 'https://www.youtube.com/watch?v=w4eUvGLuTPk&feature=youtu.be', ''),
(17, 'My Wife   ', 'NIGERIAN MOVIES 2019 Starring:.\r\n\r\nYou can also leave share and like this interesting NIGERIAN MOVIES 2019 \r\nBOSS LADY.mp4\r\nPlease remember to subscribe to our channel 24 HOURS MOVIES NIGERIAN MOVIES 2019\r\n\r\nAlso please feel free to leave your comments and suggestions below regarding this movie and other movies you want to watch.\r\n\r\n#NIGERIAN MOVIES 2019 Below are list of | #NOLLYWOOD MOVIES 2019 Playlist you will enjoy Free Nollywood Movies Online 2018 Latest Nigerian Movies ', 'NIGERIAN MOVIES 2019 Starring:.\r\n\r\nYou can also leave share and like this interesting NIGERIAN MOVIES 2019 \r\nBOSS LADY.mp4\r\nPlease remember to subscribe to our channel 24 HOURS MOVIES NIGERIAN MOVIES 2019\r\n\r\nAlso please feel free to leave your comments and suggestions below regarding this movie and other movies you want to watch.\r\n\r\n#NIGERIAN MOVIES 2019 Below are list of | #NOLLYWOOD MOVIES 2019 Playlist you will enjoy Free Nollywood Movies Online 2018 Latest Nigerian Movies ', 2017, 4, 5, 2, '[\"32\",\"9\"]', 0, 0, 'https://player.vimeo.com/video/370747767', ''),
(20, 'Wild Fire', 'Wild Fire', 'Wild Fire', 2019, 4, 2, 12, '[\"37\",\"36\",\"35\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(21, 'Ije ( The Journey )', 'Ije ( The Journey )', 'Ije ( The Journey )', 2019, 4, 4, 13, '[\"39\",\"38\",\"10\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(22, 'Living In Bondage', 'Living In Bondage', 'Living In Bondage', 2019, 4, 4, 14, '[\"43\",\"42\",\"41\",\"40\",\"9\"]', 0, 0, 'https://www.example.com/video/video1.mp4', ''),
(23, 'Zero Hour', 'Zero Hour', 'Zero Hour', 2019, 3, 3, 15, '[\"44\",\"6\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(24, 'The Expandables 3  ', 'The Expandables 3', 'The Expandables 3', 2019, 5, 3, 3, '[\"47\",\"46\",\"45\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(25, 'Phone Swap', 'Phone Swap', 'Phone Swap', 2019, 0, 3, 1, '[\"49\",\"48\",\"35\",\"16\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(26, 'The Good Samaritan', 'The Good Samaritan', 'The Good Samaritan', 2019, 0, 3, 16, '[\"35\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(27, 'Being Annabel', 'Being Annabel', 'Being Annabel', 2019, 0, 1, 17, '[\"53\",\"52\",\"51\",\"50\",\"1\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(28, 'Stalker', 'Stalker', 'Stalker', 2019, 0, 1, 18, '[\"56\",\"55\",\"54\",\"16\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(29, 'The Red December', 'The Red December', 'The Red December', 2019, 5, 1, 19, '[\"57\",\"48\",\"19\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(30, 'Blinded', 'Blinded', 'Blinded', 2019, 0, 1, 20, '[\"61\",\"60\",\"59\",\"58\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(31, 'The Arbitration', 'The Arbitration', 'The Arbitration', 2019, 5, 5, 10, '[\"63\",\"62\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4'),
(32, 'I\'ll Take My Chances ', 'I\'ll Take My Chances', 'I\'ll Take My Chances', 2019, 5, 2, 5, '[\"64\",\"56\"]', 0, 0, 'https://www.example.com/video/video1.mp4', 'https://www.example.com/video/video1.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 inactive 1 active',
  `popup` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 no 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `status`, `popup`) VALUES
(1, 'Privacy Policies', '<p>Effective date: November 02, 2019</p>\r\n\r\n\r\n<p>Adoretv (\"us\", \"we\", or \"our\") operates the http://adoretv.com website (the \"Service\").</p>\r\n\r\n<p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. Our Privacy Policy  for Adoretv is managed through <a href=\"https://www.freeprivacypolicy.com/free-privacy-policy-generator.php\">Free Privacy Policy</a>.</p>\r\n\r\n<p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from http://adoretv.com</p>\r\n\r\n\r\n<h2 class=\"black_text\">Information Collection And Use</h2>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<h3 class=\"black_text\">Types of Data Collected</h3>\r\n\r\n<h4 class=\"black_text\">Personal Data</h4>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (\"Personal Data\"). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<ul>\r\n<li>Email address</li><li>First name and last name</li><li>Cookies and Usage Data</li>\r\n</ul>\r\n\r\n<h4 class=\"black_text\">Usage Data</h4>\r\n\r\n<p>We may also collect information how the Service is accessed and used (\"Usage Data\"). This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<h4 class=\"black_text\">Tracking & Cookies Data</h4>\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>\r\n<p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n<p>Examples of Cookies we use:</p>\r\n<ul>\r\n    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>\r\n    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>\r\n    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Use of Data</h2>\r\n    \r\n<p>Netflex uses the collected data for various purposes:</p>    \r\n<ul>\r\n    <li>To provide and maintain the Service</li>\r\n    <li>To notify you about changes to our Service</li>\r\n    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>\r\n    <li>To provide customer care and support</li>\r\n    <li>To provide analysis or valuable information so that we can improve the Service</li>\r\n    <li>To monitor the usage of the Service</li>\r\n    <li>To detect, prevent and address technical issues</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Transfer Of Data</h2>\r\n<p>Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>\r\n<p>If you are located outside Australia and choose to provide information to us, please note that we transfer the data, including Personal Data, to Australia and process it there.</p>\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n<p>Adoretv will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<h2 class=\"black_text\">Disclosure Of Data</h2>\r\n\r\n<h3 class=\"black_text\">Legal Requirements</h3>\r\n<p>Adoretv may disclose your Personal Data in the good faith belief that such action is necessary to:</p>\r\n<ul>\r\n    <li>To comply with a legal obligation</li>\r\n    <li>To protect and defend the rights or property of Adoretv</li>\r\n    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>\r\n    <li>To protect the personal safety of users of the Service or the public</li>\r\n    <li>To protect against legal liability</li>\r\n</ul>\r\n\r\n<h2 class=\"black_text\">Security Of Data</h2>\r\n<p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<h2 class=\"black_text\">Service Providers</h2>\r\n<p>We may employ third party companies and individuals to facilitate our Service (\"Service Providers\"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Links To Other Sites</h2>\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party\'s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Children\'s Privacy</h2>\r\n<p>Our Service does not address anyone under the age of 18 (\"Children\").</p>\r\n<p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Changes To This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the \"effective date\" at the top of this Privacy Policy.</p>\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n\r\n<h2 class=\"black_text\">Contact Us</h2>\r\n<p>If you have any questions about this Privacy Policy, please contact us:</p>\r\n<ul>\r\n        <li>By email: support@adoretv.com</li>\r\n          \r\n        </ul>', 1, 0),
(2, 'Refund Policy', '<p>Thank you for subscribing to Adoretv.</p>\r\n\r\n<p>Please read this policy carefully. This is the Return and Refund Policy of Adoretv. This Return and Refund Policy  for Adoretv is managed by <a href=\"https://termsfeed.com/return-refund-policy/generator/\">the Return Refund Policy Generator</a>.</p>\r\n\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Digital products</h2>\r\n\r\n<p>We do not issue refunds for digital products once the order is confirmed and the product is sent.</p>\r\n\r\n<p>We recommend contacting us for assistance if you experience any issues receiving or downloading our products.</p>\r\n\r\n\r\n\r\n<h2 class=\"black_text\">Contact us</h2>\r\n\r\n<p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>\r\n\r\n<ul>\r\n<li>\r\n    <p>By email: support@adoretv.com</p>\r\n</li>\r\n</ul>\r\n\r\n', 1, 0),
(3, 'Terms Of Use', '', 1, 0),
(4, 'Black Friday Sales', '<div class=\"card\">\r\n     <img class=\"card-img-top\" src=\"assets/img/Black-Friday.jpg\" alt=\"\">\r\n				<div class=\"card-body py-0\">\r\n					<div class=\"row\" style=\'background:-webkit-linear-gradient(left,rgba(255,0,0,1),rgba(255,0,0,0))\'>\r\n						<div class=\"col-9\">\r\n							<h6 class=\'text-white font-weight-lighter text-justify mt-3\'>Starting from the 13th, All new users would get a free 30 days access to all our products. </h6>\r\n						</div>\r\n						<div class=\"col-3 \">\r\n							<a href=\"./home/signup\" class=\"btn btn-success animated flash infinite slower\"><i class=\"fa fa-gift \" aria-hidden=\"true\"></i> GET STARTED</a>\r\n						</div>\r\n				\r\n					</div>\r\n				</div>\r\n			</div>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `screens` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 active, 0 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `name`, `screens`, `price`, `status`) VALUES
(1, 'monthly', '1', '365', 1),
(2, 'BI-ANNUAL', '2', '1200', 1),
(3, 'ANNUAL', '4', '2000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `season_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `trailer_url` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` int(11) NOT NULL,
  `director` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'comma separated actor_id',
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `kids_restriction` tinyint(4) NOT NULL DEFAULT 0,
  `episodes` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'site_name', 'AdoreTv - Home of Exclusive Nollywood Movies'),
(2, 'site_email', 'noreply@adoretv.com'),
(3, 'invoice_address', 'Road 2, suit C212, Ikota complex. VGC. Lagos'),
(6, 'currency_position', 'left-space'),
(7, 'trial_period', 'off'),
(8, 'trial_period_days', '30'),
(10, 'system_currency', 'NGN'),
(11, 'paystack', '[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_public_key\":\"pk_test_a509cf0b75f217f6e0adf29ab8cf622d86a70544\",\"sandbox_private_key\":\"sk_test_1c22c679496097ff2a4eaffc8cd24c95ff27bab1\",\"production_private_key\":\"\",\"production_public_key\":\"\"}]'),
(12, 'interswitch', '[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_a509cf0b75f217f6e0adf29ab8cf622d86a70544\",\"secret_key\":\"sk_test_1c22c679496097ff2a4eaffc8cd24c95ff27bab1\",\"public_live_key\":\"\",\"secret_live_key\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_amount` int(11) NOT NULL,
  `paid_amount` float NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NGN',
  `timestamp_from` int(11) NOT NULL,
  `timestamp_to` int(11) NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 active, 0 cancelled',
  `payment_reference` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `plan_id`, `user_id`, `price_amount`, `paid_amount`, `currency`, `timestamp_from`, `timestamp_to`, `payment_method`, `payment_details`, `payment_timestamp`, `status`, `payment_reference`) VALUES
(1, 3, 1213944173, 2000, 2000, 'NGN', 1575391703, 1577983703, 'card / paystack', '{\n  \"status\": true,\n  \"message\": \"Verification successful\",\n  \"data\": {\n    \"id\": 367789735,\n    \"domain\": \"test\",\n    \"status\": \"success\",\n    \"reference\": \"T284516107960969\",\n    \"amount\": 200000,\n    \"message\": \"test-3ds\",\n    \"gateway_response\": \"[Test] Approved\",\n    \"paid_at\": \"2019-12-03T16:48:17.000Z\",\n    \"created_at\": \"2019-12-03T16:47:56.000Z\",\n    \"channel\": \"card\",\n    \"currency\": \"NGN\",\n    \"ip_address\": \"197.210.29.227\",\n    \"metadata\": {\n      \"referrer\": \"https://adoretv.000webhostapp.com/browse/purchaseplan\"\n    },\n    \"log\": {\n      \"start_time\": 1575391708,\n      \"time_spent\": 21,\n      \"attempts\": 1,\n      \"authentication\": \"3DS\",\n      \"errors\": 0,\n      \"success\": true,\n      \"mobile\": false,\n      \"input\": [],\n      \"history\": [\n        {\n          \"type\": \"action\",\n          \"message\": \"Set payment method to: card\",\n          \"time\": 4\n        },\n        {\n          \"type\": \"action\",\n          \"message\": \"Attempted to pay with card\",\n          \"time\": 15\n        },\n        {\n          \"type\": \"auth\",\n          \"message\": \"Authentication Required: 3DS\",\n          \"time\": 15\n        },\n        {\n          \"type\": \"action\",\n          \"message\": \"Third-party authentication window opened\",\n          \"time\": 19\n        },\n        {\n          \"type\": \"success\",\n          \"message\": \"Successfully paid with card\",\n          \"time\": 21\n        }\n      ]\n    },\n    \"fees\": 3000,\n    \"fees_split\": null,\n    \"authorization\": {\n      \"authorization_code\": \"AUTH_b9ruxu8p5q\",\n      \"bin\": \"408408\",\n      \"last4\": \"0409\",\n      \"exp_month\": \"12\",\n      \"exp_year\": \"2020\",\n      \"channel\": \"card\",\n      \"card_type\": \"visa DEBIT\",\n      \"bank\": \"Test Bank\",\n      \"country_code\": \"NG\",\n      \"brand\": \"visa\",\n      \"reusable\": true,\n      \"signature\": \"SIG_Mu9X4zGFmcVRRNYxnXTB\"\n    },\n    \"customer\": {\n      \"id\": 15002313,\n      \"first_name\": \"\",\n      \"last_name\": \"\",\n      \"email\": \"stanley.eires@gmail.com\",\n      \"customer_code\": \"CUS_11hv7pvbzrqmi63\",\n      \"phone\": \"\",\n      \"metadata\": null,\n      \"risk_action\": \"default\"\n    },\n    \"plan\": null,\n    \"order_id\": null,\n    \"paidAt\": \"2019-12-03T16:48:17.000Z\",\n    \"createdAt\": \"2019-12-03T16:47:56.000Z\",\n    \"transaction_date\": \"2019-12-03T16:47:56.000Z\",\n    \"plan_object\": {},\n    \"subaccount\": {}\n  }\n}', 1575391697, 1, 'T284516107960969'),
(2, 1, 1486314462, 365, 365, 'NGN', 1575987885, 1578579885, 'card / paystack', '{\n  \"status\": true,\n  \"message\": \"Verification successful\",\n  \"data\": {\n    \"id\": 379497115,\n    \"domain\": \"test\",\n    \"status\": \"success\",\n    \"reference\": \"T682817412259244\",\n    \"amount\": 36500,\n    \"message\": null,\n    \"gateway_response\": \"Successful\",\n    \"paid_at\": \"2019-12-10T14:24:43.000Z\",\n    \"created_at\": \"2019-12-10T14:24:25.000Z\",\n    \"channel\": \"card\",\n    \"currency\": \"NGN\",\n    \"ip_address\": \"197.255.10.121\",\n    \"metadata\": {\n      \"referrer\": \"https://adoretv.000webhostapp.com/browse/purchaseplan\"\n    },\n    \"log\": {\n      \"start_time\": 1575987866,\n      \"time_spent\": 18,\n      \"attempts\": 1,\n      \"errors\": 0,\n      \"success\": true,\n      \"mobile\": true,\n      \"input\": [],\n      \"history\": [\n        {\n          \"type\": \"action\",\n          \"message\": \"Set payment method to: card\",\n          \"time\": 5\n        },\n        {\n          \"type\": \"action\",\n          \"message\": \"Attempted to pay with card\",\n          \"time\": 17\n        },\n        {\n          \"type\": \"success\",\n          \"message\": \"Successfully paid with card\",\n          \"time\": 18\n        }\n      ]\n    },\n    \"fees\": 548,\n    \"fees_split\": null,\n    \"authorization\": {\n      \"authorization_code\": \"AUTH_8ezoen5ym3\",\n      \"bin\": \"408408\",\n      \"last4\": \"4081\",\n      \"exp_month\": \"12\",\n      \"exp_year\": \"2020\",\n      \"channel\": \"card\",\n      \"card_type\": \"visa DEBIT\",\n      \"bank\": \"Test Bank\",\n      \"country_code\": \"NG\",\n      \"brand\": \"visa\",\n      \"reusable\": true,\n      \"signature\": \"SIG_yVHBLVvwbauhXRBvlDej\"\n    },\n    \"customer\": {\n      \"id\": 17399645,\n      \"first_name\": \"\",\n      \"last_name\": \"\",\n      \"email\": \"iudobong@gmail.com\",\n      \"customer_code\": \"CUS_msw0bjc406cdcoo\",\n      \"phone\": \"\",\n      \"metadata\": null,\n      \"risk_action\": \"default\"\n    },\n    \"plan\": null,\n    \"order_id\": null,\n    \"paidAt\": \"2019-12-10T14:24:43.000Z\",\n    \"createdAt\": \"2019-12-10T14:24:25.000Z\",\n    \"transaction_date\": \"2019-12-10T14:24:25.000Z\",\n    \"plan_object\": {},\n    \"subaccount\": {}\n  }\n}', 1575987883, 1, 'T682817412259244');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 admin, 0 customer',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 1',
  `user2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 2',
  `user3` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 3',
  `user4` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 4',
  `user1_session` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user2_session` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user3_session` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user4_session` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user1_movielist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user2_movielist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user3_movielist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user4_movielist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user1_serieslist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user2_serieslist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user3_serieslist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user4_serieslist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_id` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 banned',
  `verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 verified 0 not verified',
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `type`, `name`, `email`, `password`, `user1`, `user2`, `user3`, `user4`, `user1_session`, `user2_session`, `user3_session`, `user4_session`, `user1_movielist`, `user2_movielist`, `user3_movielist`, `user4_movielist`, `user1_serieslist`, `user2_serieslist`, `user3_serieslist`, `user4_serieslist`, `plan_id`, `status`, `verified`, `token`) VALUES
(1, 642537497, 1, 'Admin Main', 'admin@adoretv.com', '34bf8f4bfd5096dfe4ad7b1fc397ee225004242e', 'user 1', 'user 2', 'user 3', 'user 4', '1576023028', NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL),
(3, 1213944173, 0, 'Eires Stanley', 'stanley.eires@gmail.com', '34bf8f4bfd5096dfe4ad7b1fc397ee225004242e', 'user 1', 'user 2', 'user 3', 'user 4', '1575391848', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, ''),
(4, 1278262003, 0, 'Hammed Shittu', 'aminukhalhpha@gmail.com ', '2d058193354ce758671e84e9fcfe5cd658d8e7c1', 'user 1', 'user 2', 'user 3', 'user 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '7659482fa44dbe924b10edaee496965465c79641'),
(5, 1483505946, 0, 'Hammed Shittu', 'aminuolakunle@protonmail.com ', '21eff1473d9972e5a3f20a3602cf34b37069f96b', 'user 1', 'user 2', 'user 3', 'user 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '70b14048d732f7a624131c008b4a26942f5989d6'),
(6, 1881488379, 0, 'John Billet', 'aminuk.halhph.a@gmail.com', '2d058193354ce758671e84e9fcfe5cd658d8e7c1', 'user 1', 'user 2', 'user 3', 'user 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'eee0c6a46f01c9d6ab3eea4489ae2e8354af2b4d'),
(7, 1486314462, 0, 'Imo Udobong', 'iudobong@gmail.com', '7e2a781991099ab16a768550aa36dc8536d828e6', 'user 1', 'user 2', 'user 3', 'user 4', '1575987911', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`episode_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
