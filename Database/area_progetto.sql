-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 06, 2023 alle 10:25
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `area_progetto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `opera`
--

CREATE TABLE `opera` (
  `id_opera` int(11) NOT NULL,
  `titolo` text DEFAULT NULL,
  `autore` text DEFAULT NULL,
  `data_pub` varchar(4) DEFAULT NULL,
  `immagine` varchar(200) DEFAULT NULL,
  `dimensioni` text DEFAULT NULL,
  `descrizione_it` text DEFAULT NULL,
  `descrizione_eng` text DEFAULT NULL,
  `audio_it` varchar(200) DEFAULT NULL,
  `audio_eng` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `opera`
--

INSERT INTO `opera` (`id_opera`, `titolo`, `autore`, `data_pub`, `immagine`, `dimensioni`, `descrizione_it`, `descrizione_eng`, `audio_it`, `audio_eng`) VALUES
(1, 'Angelo caduto', 'Alexandre Cabanel', '1847', 'L\'angelo caduto di cabanel.jpg', 'circa 121 x 189.7 cm', '', '', 'angelo_caduto.mp3', 'AngeloCaduto.m4a'),
(2, 'IL BACIO DI HAYEZ', 'Francesco Hayez', '1971', 'IlBacioDiHeyez.png', '112 x 88 cm', '', '', 'il_bacio.mp3', 'IlBacio.m4a'),
(3, 'Campo di grano con volo di corvi', 'Van Gogh', '1890', 'campo-di-grano-con-volo-di-corvi.png', '50, x 103 cm', '', '', 'campo_di_grano.mp3', 'CampoDiGrano.m4a'),
(4, 'Annunciazione', 'Leonardo Da Vinci', '1472', 'Annunciation_(Leonardo).png', ' 98 cm x 2,17 m', '', '', 'annunciazione.mp3', 'Annunciazione.m4a'),
(5, 'Il ponte giapponese', 'Claude Monet', '1899', 'Il-ponte-giapponese.png', '89,5 \nx 115,3 cm', '', '', 'Ponte_giapponese.mp3', 'IlPonteGiapponese.m4a'),
(6, 'Guernica', 'Pablo Picasso', '1937', 'guernica.png', '351 x 782 cm', '', '', 'guernica.mp3', 'Guernica.m4a'),
(7, 'La grande onda di Kanagawa', 'Katsushika  Hokusai', '1831', 'La grande onda di kawagawa.jpg', '26 x 38 cm ', '', '', 'la_grande_onda_di_kanagawa.mp3', 'LaGrandeOnda.m4a'),
(8, 'La persistenza della memoria', 'Salvador Dalì', '1931', 'Persistenza-della-memoria-di-Salvador-Dali.png', '24 x 33 cm', '', '', 'la _persistenza_della_memoria.mp3', 'LaPertinenzaDellaMemoria.m4a'),
(9, 'Il Viandante sul mare di nebbia', 'Caspar David Friedrich', '1818', 'Viandante_sul_mare_di_nebbia.png', '97 x 75 cm', '', '', 'viandante_sul_mare_di_nebbia.mp3', 'ViandanteSulMare.m4a'),
(10, 'NOTTE STELLATA', 'Vincent van Gogh', '1889', 'Notte-stellata-di-Vincent-Van-Gogh.png', '73,7 x 92,1 cm', '', '', 'notte_stellata.mp3', 'NotteStellata.m4a'),
(11, 'La liberta che guida il popolo', 'Eugène Delacroix', '1830', 'la_liberta_che_guida_il_popolo.png', '260 x 325 cm', '', '', 'la_liberta_che_guida_il_popolo.mp3', 'LaLibertaCheGuidaIlPopolo.m4a');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(16) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` text DEFAULT NULL,
  `cognome` text DEFAULT NULL,
  `data_n` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `passwd`, `email`, `nome`, `cognome`, `data_n`) VALUES
('username', 'password', 'email@gmail.com', 'Nome', 'Congome', '2023-05-25'),
('utente', 'password', 'utente@mail.it', 'Utente', 'CognomeUtente', '2023-06-01'),
('utente1', 'password', 'email1@gmail.com', 'Nome', 'Congome', '2023-05-25');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `opera`
--
ALTER TABLE `opera`
  ADD PRIMARY KEY (`id_opera`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `opera`
--
ALTER TABLE `opera`
  MODIFY `id_opera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
