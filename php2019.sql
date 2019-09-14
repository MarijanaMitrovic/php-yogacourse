-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 12:20 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `odgovor` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `brojac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `odgovor`, `brojac`) VALUES
(1, 'Yes', 1),
(2, 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(10) NOT NULL,
  `ime` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `bio` text COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `ime`, `photo`, `bio`) VALUES
(1, 'Marijana Mitrovic', 'images/author2.jpg', 'My name is Marijana Mitrovic. I was born on 12. 07. 1996.\r\nAt the moment, I\'m student of ICT College in Belgrade. This site was made for PHP1.');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `putanja` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `href` varchar(200) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id`, `putanja`, `alt`, `href`) VALUES
(1, 'images/img_1.jpg', 'First', 'images/img_1.jpg'),
(2, 'images/img_2.jpg', 'Second', 'images/img_2.jpg'),
(3, 'images/img_3.jpg', 'Third', 'images/img_3.jpg'),
(4, 'images/img_4.jpg', 'Fourth', 'images/img_4.jpg'),
(5, 'images/img_5.jpg', 'Fifth', 'images/img_5.jpg'),
(6, 'images/img_6.jpg', 'Sixth', 'images/img_6.jpg'),
(7, 'images/img_7.jpg', 'Seventh', 'images/img_7.jpg'),
(8, 'images/img_1.jpg', 'Eighth', 'images/img_1.jpg'),
(9, 'images/img_2.jpg', 'Nineth', 'images/img_2.jpg'),
(10, 'images/img_3.jpg', 'Tenth', 'images/img_3.jpg'),
(11, 'images/img_4.jpg', 'Eleventh', 'images/img_4.jpg'),
(12, 'images/img_5.jpg', 'Twelveth', 'images/img_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `lozinka` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `datum_registracije` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktivan` bit(1) NOT NULL,
  `uloga_id` int(11) NOT NULL,
  `slika` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `korisnik_glas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `prezime`, `email`, `lozinka`, `datum_registracije`, `aktivan`, `uloga_id`, `slika`, `korisnik_glas`) VALUES
(1, 'Admin', 'Admin', 'marijana@gmail.com', 'd09a9e4c201b555a3818027cb4400785', '2019-03-10 17:08:20', b'1', 1, 'images/author.jpg', 0),
(2, 'Some', 'User', 'user@gmail.com', '84f652ab4e1bf5c79fce7bcb8e7f1f78', '2019-03-18 13:54:34', b'1', 2, 'images/person_1.jpg', 0),
(3, 'Sara', 'Clark', 'sara@gmail.com', '9470413f240b79ff4c7ca275fd3d0029', '2019-03-18 13:54:51', b'1', 1, 'images/person_2.jpg', 0),
(9, 'Laza', 'Lazic', 'laza@gmail.com', '0038d351df1c66c4c3d5587b73e38c3a', '2019-03-20 11:16:46', b'1', 2, 'images/unknown.png', 1),
(10, 'Dovla', 'Brat', 'dovla@gmail.com', 'c35e1a8d4d9acc2fbbcb92ad5840137f', '2019-03-19 22:00:36', b'1', 2, 'images/1553032836nova slika.jpg', 0),
(11, 'Dovla', 'Brat', 'dovla@gmail.com', 'c35e1a8d4d9acc2fbbcb92ad5840137f', '2019-03-19 22:00:43', b'1', 2, 'images/1553032843nova slika.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kursevi`
--

CREATE TABLE `kursevi` (
  `id_kurs` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `vrsta` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `trener_id` int(11) NOT NULL,
  `trajanje` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `tezina` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `opis` text COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `kursevi`
--

INSERT INTO `kursevi` (`id_kurs`, `naziv`, `vrsta`, `trener_id`, `trajanje`, `tezina`, `foto`, `opis`) VALUES
(1, 'Embrace Your Edge', 'Healthy yoga', 1, '20 min', 'Begginer', 'images/img_1.jpg', 'Developed by American yogi John Friend in 1997, Anusara yoga is a relative newcomer to the yoga world. Based on the belief that we’re all filled with an intrinsic goodness, Anusara seeks to use the physical practice of yoga to help students open their hearts, experience grace, and let their inner goodness shine through. Classes, which are specifically sequenced by the teacher to explore one of Friend\'s Universal Principles of Alignment, are rigorous for the body and the mind.\r\n'),
(2, 'Yoga to Build Resilience', 'Healthy Yoga', 2, '20 min', 'Advanced', 'images/img_2.jpg', 'Ashtanga is based on ancient yoga teachings, but it was popularized and brought to the West by K. Pattabhi Jois (pronounced \"pah-tah-bee joyce\") in the 1970s. It\'s a rigorous style of yoga that follows a specific sequence of postures and is similar to vinyasa yoga, as each style links every movement to a breath. The difference is that Ashtanga always performs the exact same poses in the exact same order. This is a sweaty, physically demanding practice, so make sure to bring your trusty yoga mat towel.'),
(3, 'Rise & Shine', 'Power yoga', 3, '20 min ', 'Intermediate', 'images/img_3.jpg', 'About 30 years ago, Bikram Choudhury developed this school of yoga where classes are held in artificially heated rooms. In a Bikram class, you will sweat like never before as you work your way through a series of 26 poses. Like Ashtanga, a Bikram class always follows the same sequence, although a Bikram sequence is different from an ashtanga sequence. Bikram is somewhat controversial, as Choudhury trademarked his sequence and has sued studios who call themselves Bikram, but don\'t teach the poses exactly the way he says they should. It’s also wildly popular, making it one of the easiest classes to find. Due to the heated conditions of the studio, don\'t forget to bring a water bottle!'),
(4, 'Bend & Stretch', 'Meditation Yoga ', 4, '30 min ', 'Begginer', 'images/img_4.jpg', 'Hatha yoga is a generic term that refers to any type of yoga that teaches physical postures. Nearly every type of yoga class taught in the West is Hatha yoga. When a class is marketed as Hatha, it generally means that you will get a gentle introduction to the most basic yoga postures. You probably won\'t work up a sweat in a hatha yoga class, but you should end up leaving class feeling longer, looser, and more relaxed.'),
(5, 'Vinyasa Yoga', 'Meditation yoga', 5, '30 min', 'Advanced', 'images/img_5.jpg', 'Vinyasa (pronounced \"vin-yah-sah\") is a Sanskrit word for a phrase that roughly translates as \"to place in a special way,\" referring—in hatha yoga—to a sequence of poses. Vinyasa classes are known for their fluid, movement-intensive practices. Vinyasa teachers sequence their classes to smoothly transition from pose to pose, with the intention of linking breath to movement, and often play music to keep things lively. The intensity of the practice is similar to Ashtanga, but no two vinyasa classes are the same. If you hate routine and love to test your physical limits, vinyasa may be just your ticket.'),
(6, 'Barre Workout', 'Healthy yoga', 6, '20 min', 'Intermediate', 'images/img_6.jpg', 'Restorative yoga is a delicious way to relax and soothe frayed nerves. Also described as yin yoga, restorative classes use bolsters, blankets, and blocks to prop students into passive poses so the body can experience the benefits of a pose without having to exert any effort. A good restorative class is more rejuvenating than a nap. Studios and gyms often offer them on Friday nights, when just about everyone could use some profound rest.');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `putanja` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `naslov` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `putanja`, `naslov`) VALUES
(1, 'index.php?page=home', 'Home'),
(2, 'index.php?page=about', 'About & Contact'),
(3, 'index.php?page=author', 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `fotografija` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `naslov` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sadrzaj` text COLLATE utf16_unicode_ci NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `fotografija`, `naslov`, `datum`, `sadrzaj`, `korisnik_id`) VALUES
(1, 'images/img_2.jpg', 'Hatha yoga', '2019-03-07 18:24:48', 'The physical-based yoga is the most popular and has numerous styles. Hatha yoga classes are best for beginners since they are usually paced slower than other yoga styles. Hatha classes today are a classic approach to breathing and exercises. If you are brand-new to yoga, hatha yoga is a great entry point to the practice.', 1),
(2, 'images/img_3.jpg', 'Kundalini yoga', '2019-03-07 18:24:48', 'Kundalini yoga practice is equal parts spiritual and physical. This style is all about releasing the kundalini energy in your body said to be trapped, or coiled, in the lower spine. These classes really work your core and breathing with fast-moving, invigorating postures and breath exercises. These classes are pretty intense and can involve chanting, mantra, and meditation.', 2),
(3, 'images/img_4.jpg', 'Ashtanga yoga', '2019-03-07 18:26:01', 'Ashtanga yoga involves a very physically demanding sequence of postures, so this style of yoga is definitely not for the beginner. It takes an experienced yogi to really love it. Ashtanga starts with five sun salutation A\'s and five sun salutation B\'s and then moves into a series of standing and floor postures.', 3),
(4, 'images/img_5.jpg', 'Iyengar yoga', '2019-03-07 18:27:14', 'Iyengar yoga was founded by B.K.S. Iyengar and focuses on alignment as well as detailed and precise movements. In an Iyengar class, students perform a variety of postures while controlling the breath. Generally, poses are held for a long time while adjusting the minutiae of the pose. Iyengar relies heavily on props to help students perfect their form and go deeper into poses in a safe manner. ', 1),
(5, 'images/img_6.jpg', 'Restorative yoga', '2019-03-07 18:28:37', 'Restorative yoga focuses on winding down after a long day and relaxing your mind. At its core, this style focuses on body relaxation. You spend more time in fewer postures throughout the class. Many of the poses are modified to be easier and more relaxing. Restorative yoga also helps to cleanse and free your mind.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `id` int(11) NOT NULL,
  `slika` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `opis1` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `opis2` varchar(100) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`id`, `slika`, `opis1`, `opis2`) VALUES
(1, 'images/hero_1.jpg', 'Yoga for everybody', 'Welcome to Yogalife'),
(2, 'images/hero_2.jpg', 'Enjoy with us', 'Yoga & Meditation');

-- --------------------------------------------------------

--
-- Table structure for table `treneri`
--

CREATE TABLE `treneri` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `slika` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `oblast` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `tekst` text COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `treneri`
--

INSERT INTO `treneri` (`id`, `ime`, `slika`, `kurs_id`, `oblast`, `tekst`) VALUES
(1, 'Vicky Johnson', 'images/person_1.jpg', 1, 'Instructor of Health yoga', 'I will help you to relax, put your health on 1st place etc.'),
(2, 'Kit Rich', 'images/person_3.jpg', 2, 'Building resilience', 'I am yoga instructor for 10 years. I will do with you health yoga.'),
(3, 'Sara Clark', 'images/person_2.jpg', 3, 'Power yoga', 'Hi, I am Sara. I am professional yoga instructor and I will do with you harder exercises.'),
(4, 'David Scott', 'images/person_4.jpg', 4, 'Meditation yoga', 'Our most popular course - meditation. I will help you with thing that almost all begginers adore.'),
(5, 'Alex Williams', 'images/person_5.jpg', 5, 'Meditation yoga', 'Hello, I am Alex, your new meditation yoga instructor.'),
(6, 'John Smith', 'images/person_6.jpg', 6, 'Health yoga', 'Health is the most important thing in our lives. Because of that, I am here and you must start enjoy life now.');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`);

--
-- Indexes for table `kursevi`
--
ALTER TABLE `kursevi`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treneri`
--
ALTER TABLE `treneri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kursevi`
--
ALTER TABLE `kursevi`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `treneri`
--
ALTER TABLE `treneri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
