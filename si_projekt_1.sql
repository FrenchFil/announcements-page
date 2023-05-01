-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2023, 15:59
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `si_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ads`
--

CREATE TABLE `ads` (
  `Id` int(255) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Category` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Descr` text COLLATE utf8mb4_polish_ci NOT NULL,
  `City` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Price` double NOT NULL,
  `IdOfUser` int(255) NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ads`
--

INSERT INTO `ads` (`Id`, `Name`, `Category`, `Descr`, `City`, `Price`, `IdOfUser`, `isApproved`) VALUES
(4, 'Akordeon', '1', 'To jest scam', 'Glajwic', 1000, 1, 1),
(15, 'Medalik dziadka z lat 60 !!!', '6', 'Dziadek sprzedaje ja tu tylko wysatwiam', 'Kraków', 2000, 23, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `Id` int(255) NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Muzyka'),
(2, 'IT'),
(3, 'Inne'),
(4, 'Motoryzacja'),
(5, 'Meble'),
(6, 'Starocie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sub_category`
--

CREATE TABLE `sub_category` (
  `Id` int(255) NOT NULL,
  `IdCategory` int(255) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `sub_category`
--

INSERT INTO `sub_category` (`Id`, `IdCategory`, `Name`) VALUES
(1, 1, 'Gitary'),
(2, 1, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `Id` int(255) NOT NULL,
  `Login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `LastName` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Mail` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Phone` text COLLATE utf8mb4_polish_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`Id`, `Login`, `Password`, `Name`, `LastName`, `Mail`, `Phone`, `isApproved`) VALUES
(1, 'admin', '$2y$10$ARDZPpIRHwUGJeDexyZVeO.0A/Q0hTZV5mAD4KLuFW4j5JT78Qqd6', 'Bartek', 'Całus', 'bartcal@onet.pl', '121239865', 1),
(29, 'nn', '$2y$10$ZfnG.EBxmYbZw9NMgRriJ.9pY.Xu.3FllfESb7ZAt6lcMYkxKMVjq', 'bartek', 'n', 'n@n.pl', '', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ads`
--
ALTER TABLE `ads`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
