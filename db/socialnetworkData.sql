-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 07, 2024 alle 19:49
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `follows`
--

CREATE TABLE `follows` (
  `ID_follows` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `k_user` int(11) NOT NULL,
  `k_following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `follows`
--

INSERT INTO `follows` (`ID_follows`, `date_time`, `k_user`, `k_following`) VALUES
(1, '2024-07-07 17:21:06', 2, 3),
(2, '2024-07-07 17:47:33', 2, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifications`
--

CREATE TABLE `notifications` (
  `ID_notif` int(11) NOT NULL,
  `k_action` int(11) NOT NULL,
  `k_target` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `type` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notifications`
--

INSERT INTO `notifications` (`ID_notif`, `k_action`, `k_target`, `isRead`, `type`, `datetime`) VALUES
(1, 2, 3, 1, 'follow', '2024-07-07 19:21:06'),
(2, 2, 4, 0, 'follow', '2024-07-07 19:47:33');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `ID_post` int(11) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `datetime` datetime NOT NULL,
  `k_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`ID_post`, `description`, `datetime`, `k_user`) VALUES
(17, 'We were something, don\'t you think so?\nRosé flowing with your chosen family\nAnd it would\'ve been sweet\nIf it could\'ve been me\nIn my defense, I have none\nFor digging up the grave another time\nBut it would\'ve been fun\nIf you would\'ve been the one', '2024-07-01 19:27:13', 3),
(18, 'They say she was seen on occasion\r\nPacing the rocks, staring out at the midnight sea\r\nAnd in a feud with her neighbor\r\nShe stole his dog and dyed it key lime green\r\nFifty years is a long time\r\nHoliday House sat quietly on that beach\r\nFree of women with madness, their men and bad habits\r\nAnd then it was bought by me\r\n\r\nWho knows, if I never showed up, what could\'ve been\r\nThere goes the loudest woman this town has ever seen\r\nI had a marvelous time ruining everything\r\n\r\nI had a marvelous time ruining everything\r\nA marvelous time ruining everything\r\nA marvelous time\r\nI had a marvelous time', '2024-07-03 00:00:00', 3),
(19, 'We gather stones, never knowing what they\'ll mean\r\nSome to throw, some to make a diamond ring\r\nYou know I didn\'t want to have to haunt you\r\nBut what a ghostly scene\r\nYou wear the same jewels that I gave you\r\nAs you bury me\r\n\r\nI didn\'t have it in myself to go with grace\r\n\'Cause when I\'d fight, you used to tell me I was brave\r\nAnd if I\'m dead to you, why are you at the wake?\r\nCursing my name, wishing I stayed\r\nLook at how my tears ricochet\r\n\r\nAnd I can go anywhere I want\r\nAnywhere I want, just not home\r\nAnd you can aim for my heart, go for blood\r\nBut you would still miss me in your bones\r\nAnd I still talk to you (When I\'m screaming at the sky)\r\nAnd when you can\'t sleep at night (You hear my stolen lullabies)', '2024-07-05 17:36:01', 3),
(20, 'I\'ve been having a hard time adjusting\r\nI had the shiniest wheels, now they\'re rusting\r\nI didn\'t know if you\'d care if I came back\r\nI have a lot of regrets about that\r\nPulled the car off the road to the lookout\r\nCould\'ve followed my fears all the way down\r\nAnd maybe I don\'t quite know what to say\r\nBut I\'m here in your doorway\r\n\r\nI just wanted you to know that this is me trying\r\nI just wanted you to know that this is me trying\r\n\r\nThey told me all of my cages were mental\r\nSo I got wasted like all my potential\r\nAnd my words shoot to kill when I\'m mad\r\nI have a lot of regrets about that\r\nI was so ahead of the curve, the curve became a sphere\r\nFell behind all my classmates and I ended up here\r\nPouring out my heart to a stranger\r\nBut I didn\'t pour the whiskey\r\n\r\nI just wanted you to know that this is me trying\r\nI just wanted you to know that this is me trying\r\n[Post-Chorus]\r\nAt least I\'m trying\r\n\r\nAnd it\'s hard to be at a party when I feel like an open wound\r\nIt\'s hard to be anywhere these days when all I want is you\r\nYou\'re a flashback in a film reel on the one screen in my town\r\n\r\nAnd I just wanted you to know that this is me trying\r\n(And maybe I don\'t quite know what to say)\r\nI just wanted you to know that this is me trying\r\n\r\nAt least I\'m trying', '2024-07-07 10:40:23', 3),
(21, 'Your Midas touch on the Chevy door\r\nNovember flush and your flannel cure\r\n\"This dorm was once a madhouse\"\r\nI made a joke, \"Well, it\'s made for me\"\r\nHow evergreen, our group of friends\r\nDon\'t think we\'ll say that word again\r\nAnd soon they\'ll have the nerve to deck the halls\r\nThat we once walked through\r\nOne for the money, two for the show\r\nI never was ready so I watch you go\r\nSometimes you just don\'t know the answer\r\n\'Til someone\'s on their knees and asks you\r\n\"She would\'ve made such a lovely bride\r\nWhat a shame she\'s fucked in the head,\" they said\r\nBut you\'ll find the real thing instead\r\nShe\'ll patch up your tapestry that I shred', '2024-07-02 08:25:08', 4),
(22, 'Good thing my daddy made me get a boating license when I was fifteen\r\nAnd I\'ve cleaned enough houses to know how to cover up a scene\r\nGood thing Este\'s sister\'s gonna swear she was with me (She was with me, dude)\r\nGood thing his mistress took out a big life insurance policy\r\n\r\nThey think she did it, but they just can\'t prove it\r\nShe thinks I did it, but she just can\'t prove it\r\n\r\nNo, no body, no crime\r\nI wasn\'t lettin\' up until the day he died', '2024-07-07 19:46:51', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID_user`, `username`, `password`, `email`) VALUES
(2, 'MarcoChardonnay', '$2y$10$kGtVEHcbNYkCcz9SHgXdAu1B4WHMGrbj0LsfEFFwLCemtmNuPezRK', 'marco.cardone2001@gmail.com'),
(3, 'Folklore', '$2y$10$W7OvFH8hH9npSsFulHiHeO.CG3DuqtDMRYERGdm5M/Y0oQagWcmhO', 'folk.lore@gmail.com'),
(4, 'Evermore', '$2y$10$GAtmvJVpVg04cj7iT.TXeujuazCSv/eABt0yKUgQeI9tIg92.T4B.', 'evermore@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`ID_follows`),
  ADD KEY `k_user` (`k_user`),
  ADD KEY `k_following` (`k_following`);

--
-- Indici per le tabelle `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID_notif`),
  ADD KEY `fk_user` (`k_action`),
  ADD KEY `fktarget` (`k_target`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID_post`),
  ADD KEY `k_user` (`k_user`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `follows`
--
ALTER TABLE `follows`
  MODIFY `ID_follows` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `ID_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`k_user`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`k_following`) REFERENCES `users` (`ID_user`);

--
-- Limiti per la tabella `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notif_action` FOREIGN KEY (`k_action`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`k_target`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`k_user`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
