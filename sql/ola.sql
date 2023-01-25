

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 May 2022, 18:24:58
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ola`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `Text` text DEFAULT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`ID`, `id_student`, `id_course`, `Text`, `Point`) VALUES
(1, 4, 7, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 5),
(2, 3, 7, 'Nice Learning. Getting into learning of c# is become easier. Thanks', 3),
(3, 1, 7, 'The instructor covers a lot of C # features for a basic course. But, slightly difficult to understand.', 2),
(4, 2, 7, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 4),
(5, 4, 6, 'he is moving too fast ,for a beginner it is hard to understand', 2),
(6, 3, 6, 'Nice Learning. Getting into learning of c# is become easier. Thanks', 3),
(7, 1, 6, 'The instructor covers a lot of C # features for a basic course. But, slightly difficult to understand.', 3),
(8, 2, 6, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 1),
(9, 4, 5, 'he is moving too fast ,for a beginner it is hard to understand', 2),
(10, 3, 5, 'It gives a lot of information, but it seems to be thrown at me in such large doses. Its hard to digest so much in such a short time.', 3),
(11, 1, 5, 'No real room to follow up or try the things yourself, but other than that if you are knowledgeable or just want to learn a new thing or two and then research it yourself - a great way to get the first explanation in!', 3),
(12, 2, 5, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 1),
(13, 3, 4, 'Nice Learning. Getting into learning of c# is become easier. Thanks', 3),
(14, 1, 4, 'The instructor covers a lot of C # features for a basic course. But, slightly difficult to understand.', 3),
(15, 2, 4, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 1),
(16, 3, 3, 'It gives a lot of information, but it seems to be thrown at me in such large doses. Its hard to digest so much in such a short time.', 3),
(17, 1, 3, 'The instructor covers a lot of C # features for a basic course. But, slightly difficult to understand.', 3),
(18, 2, 2, 'It was really very helpful for me inorder to learn C# at the beginner level. Thanks for this!!', 1),
(19, 3, 1, 'No real room to follow up or try the things yourself, but other than that if you are knowledgeable or just want to learn a new thing or two and then research it yourself - a great way to get the first explanation in!', 3),
(20, 1, 1, 'The instructor covers a lot of C # features for a basic course. But, slightly difficult to understand.', 3),
(21, 2, 1, 'the explanation with practical demo makes understand of language easy', 1),
(33, 1, 2, 'Very very nice lesson to take!', 5),
(34, 1, 2, 'Very very nice lesson to take!', 5),
(35, 1, 2, 'Very very nice lesson to take!', 5),
(36, 1, 7, 'No way, It was a hard lesson..', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `ECTS` int(11) NOT NULL,
  `Teacher` varchar(255) NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `course`
--

INSERT INTO `course` (`ID`, `Name`, `Description`, `ECTS`, `Teacher`, `Point`) VALUES
(1, 'Software Design and Modeling', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 6, 'Sylwia Kopczyńska', 5),
(2, 'Technologies of Software Development', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 6, 'Sylwia Kopczyńska', 5),
(3, 'Machine learning', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 2, 'Sylwia Kopczyńska', 4),
(4, 'Computer Graphics and Visualization', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 6, 'Sylwia Kopczyńska', 2),
(5, 'Software Development Studio 1', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 3, 'Sylwia Kopczyńska', 3),
(6, 'Ethics and Resarch', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 5, 'Sylwia Kopczyńska', 5),
(7, 'Communication in English / Polish', 'Introduction to .NET Framework. Queries in LINQ. Object relational model in Entity Framework.\r\nGraphical user interfaces using Windows Presentation Foundation. Functional programming with F#.\r\nDynamic programming with Ruby.', 1, 'Sylwia Kopczyńska', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mycourse`
--

CREATE TABLE `mycourse` (
  `ID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mycourse`
--

INSERT INTO `mycourse` (`ID`, `courseID`, `studentID`) VALUES
(27, 1, 3),
(28, 3, 3),
(29, 2, 2),
(30, 2, 4),
(33, 4, 1),
(34, 3, 1),
(38, 1, 1),
(42, 6, 2),
(43, 7, 2),
(44, 1, 2),
(45, 7, 1),
(46, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Erasmus_number` varchar(25) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`ID`, `Erasmus_number`, `First_name`, `Last_name`, `Email`, `Password`) VALUES
(1, 'ER1216', 'Hilal', 'Oruc', 'hiilaloruc@gmail.com', '123456'),
(2, 'ER1217', 'Nihal', 'Kesler', 'nihalkesler@gmail.com', '123456'),
(3, 'ER1214', 'Awa', 'Hollaway', 'awahollaway@gmail.com', '123456'),
(4, 'ER1219', 'Bella', 'Swan', 'bellaswan@gmail.com', '123456'),
(5, 'ER345', 'Jon', 'Snow', 'jonsnow@google.com', '123456'),
(6, 'ER43534', 'Ali', 'Aksu', 'alidsf@google.com', '123456'),
(7, 'ER32423423', 'asdjbghjas', 'asdmnbasg', 'hfsdghgs@google.com', '123456'),
(8, 'ER435345', 'hello', 'world', 'helloq@google.com', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_course` (`id_course`);

--
-- Tablo için indeksler `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `mycourse`
--
ALTER TABLE `mycourse`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `studentID` (`studentID`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `mycourse`
--
ALTER TABLE `mycourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`ID`);

--
-- Tablo kısıtlamaları `mycourse`
--
ALTER TABLE `mycourse`
  ADD CONSTRAINT `mycourse_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`),
  ADD CONSTRAINT `mycourse_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
