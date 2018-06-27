-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 06:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `untappd`
--

-- --------------------------------------------------------

--
-- Table structure for table `amizade`
--

CREATE TABLE `amizade` (
  `id1` int(11) NOT NULL,
  `id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `badge`
--

CREATE TABLE `badge` (
  `id` int(11) NOT NULL,
  `nome` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badge`
--

INSERT INTO `badge` (`id`, `nome`) VALUES
(1, 'badge1.jpg'),
(2, 'badge2.jpg'),
(3, 'badge3.jpg'),
(4, 'badge4.jpg'),
(5, 'badge5.jpg'),
(6, 'badge6.jpg'),
(7, 'badge7.jpg'),
(8, 'badge8.jpg'),
(9, 'badge9.jpg'),
(10, 'badge10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cerveja`
--

CREATE TABLE `cerveja` (
  `id` int(11) NOT NULL,
  `idCervejaria` int(11) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `teor` double NOT NULL,
  `tipo` enum('pilsen','lager','stout') DEFAULT NULL,
  `avaliacao` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cerveja`
--

INSERT INTO `cerveja` (`id`, `idCervejaria`, `nome`, `teor`, `tipo`, `avaliacao`) VALUES
(3, 2, 'Brahma', 4.8, 'pilsen', 2.75),
(4, 2, 'Skol', 4.8, 'pilsen', 2),
(5, 2, 'Itaipava', 4.9, 'pilsen', 0),
(6, 3, 'Antarctica', 1.3, 'pilsen', 4),
(10, 11, 'Heineken', 4.8, 'pilsen', 3.25);

-- --------------------------------------------------------

--
-- Table structure for table `cervejaria`
--

CREATE TABLE `cervejaria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `avaliacao` double DEFAULT '0',
  `tipo` enum('macro','micro','artesanal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cervejaria`
--

INSERT INTO `cervejaria` (`id`, `nome`, `cidade`, `estado`, `pais`, `avaliacao`, `tipo`) VALUES
(1, 'Cervejaria Vivi', 'Itajuba', 'MG', 'Brasil', 2, 'artesanal'),
(2, 'Ambev', 'Santana', 'MG', 'Brasil', 2.5, 'macro'),
(3, 'Antarctica', 'Tres Pontas', 'MG', 'Brasil', 2.714285714, 'macro'),
(11, 'Heineken', 'ItajubÃ¡', 'Minas Gerais', 'Brasil', 3.25, 'macro');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `idCerveja` int(11) NOT NULL,
  `idConta` int(11) NOT NULL,
  `nomeCerveja` varchar(50) NOT NULL,
  `nomeCervejaria` varchar(50) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `avaliacao` double DEFAULT NULL,
  `dataHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `idCerveja`, `idConta`, `nomeCerveja`, `nomeCervejaria`, `nomeUsuario`, `avaliacao`, `dataHora`) VALUES
(12, 3, 7, 'Brahma', 'Ambev', 'vinicius', 3.4, '2018-06-26 16:57:17'),
(13, 4, 7, 'Skol', 'Ambev', 'vinicius', 3.6, '2018-06-26 16:57:29'),
(14, 4, 7, 'Skol', 'Ambev', 'vinicius', 0, '2018-06-26 17:11:18'),
(15, 3, 7, 'Brahma', 'Ambev', 'vinicius', 1.4, '2018-06-26 17:55:03'),
(16, 3, 7, 'Brahma', 'Ambev', 'vinicius', 2.5, '2018-06-26 20:02:39'),
(17, 3, 7, 'Brahma', 'Ambev', 'vinicius', 3.3, '2018-06-27 01:18:27'),
(18, 6, 7, 'Antarctica', 'Antarctica', 'vinicius', 3.6, '2018-06-27 16:31:25'),
(22, 10, 7, 'Heineken', 'Heineken', 'vinicius', 5, '2018-06-27 16:50:16'),
(23, 10, 7, 'Heineken', 'Heineken', 'vinicius', 5, '2018-06-27 16:50:28'),
(24, 10, 7, 'Heineken', 'Heineken', 'vinicius', 0, '2018-06-27 16:50:39'),
(25, 10, 7, 'Heineken', 'Heineken', 'vinicius', 3, '2018-06-27 16:50:54');

--
-- Triggers `checkin`
--
DELIMITER $$
CREATE TRIGGER `numero_checkin` AFTER INSERT ON `checkin` FOR EACH ROW BEGIN
	DECLARE BADGE1 INT;
    DECLARE BADGE2 INT;
    DECLARE BADGE3 INT;
    DECLARE BADGE4 INT;
    DECLARE BADGE5 INT;
    DECLARE BADGE6 INT;
    DECLARE BADGE7 INT;
    DECLARE BADGE8 INT;
    DECLARE BADGE9 INT;
    DECLARE BADGE10 INT;
    DECLARE X1 INT;
    DECLARE X4 INT;
    DECLARE X5 INT;
    DECLARE X6 INT;
    DECLARE X7 INT;
    DECLARE X8 INT;
    DECLARE X8Data TIMESTAMP;
    DECLARE X9 INT;
    
    
	DECLARE x INT;
    DECLARE qtdeAvaliacoes INT;
    DECLARE soma INT;
	SELECT COUNT(idCerveja) INTO x from checkin where idConta = new.idConta AND idCerveja = new.idCerveja;
    IF(x > 1) THEN
    	UPDATE conta set total = total + 1 where id = new.idConta;
    END IF;
    IF(x = 1) THEN
    	UPDATE conta set total = total + 1, unico = unico + 1 where id = new.idConta;
    END IF;
	SELECT COUNT(idCerveja), SUM(avaliacao) INTO qtdeAvaliacoes, soma from checkin where idCerveja = new.idCerveja;
    UPDATE cerveja set avaliacao = soma/qtdeAvaliacoes where id = new.idCerveja;
    SELECT idCervejaria INTO x FROM cerveja WHERE id = new.idCerveja;
    SELECT COUNT(idCerveja), SUM(cerveja.avaliacao) INTO qtdeAvaliacoes, soma
    from checkin, cerveja, cervejaria where cerveja.id = checkin.idCerveja AND cerveja.idCervejaria = cervejaria.id AND cervejaria.id = x;
    UPDATE cervejaria set avaliacao = soma/qtdeAvaliacoes where id = x;
    
    -- BADGE
	-- 1) Badge Bem vindo – primeiro check in
    SELECT COUNT(*) INTO X1 FROM checkin WHERE idConta = NEW.idConta;
    SET @BADGE1 = NULL;
    IF (X1 = 1) THEN
    	SET @BADGE1 = 1;
    END IF;
    -- 2) Badge Bebendo no happy hour
    SET @BADGE2 = NULL;
    IF((NEW.dataHora >= TIME('18:00:00')) AND (NEW.dataHora <= TIME('22:00:00'))) THEN
    	SET @BADGE2 = 2;
    END IF;
    -- 3) Badge Ufa, hoje é sexta-feira
    SET @BADGE3 = NULL;
    IF(DAYNAME(NEW.dataHora) = 'Friday') THEN
    	SET @BADGE3 = 3;
    END IF;
    -- 4) Badge 25 cervejas
    SELECT COUNT(*) INTO X4 FROM checkin WHERE idConta = NEW.idConta;
    SET @BADGE4 = NULL;
    IF (X4 = 25) THEN
    	SET @BADGE4 = 4;
    END IF;
    -- 5) Badge 50 cervejas
    SELECT COUNT(*) INTO X5 FROM checkin WHERE idConta = NEW.idConta;
    SET @BADGE5 = NULL;
    IF (X5 = 50) THEN
    	SET @BADGE5 = 5;
    END IF;
    -- 6) Badge 100 cervejas
    SELECT COUNT(*) INTO X6 FROM checkin WHERE idConta = NEW.idConta;
    SET @BADGE6 = NULL;
    IF (X6 = 100) THEN
    	SET @BADGE6 = 6;
    END IF;
    -- 7) Badge Expandindo horizontes – toda vez que se experimentar um
    -- novo tipo de cerveja
    SELECT COUNT(*) INTO X7 FROM checkin WHERE idConta = NEW.idConta AND idCerveja = NEW.idCerveja;
    SET @BADGE7 = NULL;
    IF (X7 = 1) THEN
    	SET @BADGE7 = 7;
    END IF;
    -- 8) Badge Bom de copo – para quem beber mais de 3 cervejas em
    -- menos de 1 hora
    SELECT COUNT(*) INTO X8 FROM checkin WHERE idConta = NEW.idConta ORDER BY dataHora DESC LIMIT 3;
    SET @BADGE8 = NULL;
    IF (X8 = 3) THEN
    	SELECT dataHora INTO X8Data FROM checkin WHERE idConta = NEW.idConta ORDER BY dataHora DESC LIMIT 3, 2;
        IF (TIMEDIFF(NEW.dataHora, x8Data) <= TIME('01:00:00')) THEN
        	SET @BADGE8 = 8;
        END IF;
    END IF;
    -- 9) Badge Cliente fiel – para quem repetir 3 vezes a mesma cerveja
    SELECT COUNT(*) INTO X9 FROM checkin WHERE idConta = NEW.idConta AND idCerveja = NEW.idCerveja;
    SET @BADGE9 = NULL;
    IF (X9 = 3) THEN
    	SET @BADGE9 = 9;
    END IF;
	-- 10) Badge Tem amigo – para quem tiver pelo menos 1 check in
    -- comentado
    SET @BADGE10 = NULL;
    INSERT INTO `contabadgecheckin`(`idConta`, `idCheckIn`, `badge1`, `badge2`, `badge3`, `badge4`, `badge5`, `badge6`, `badge7`, `badge8`, `badge9`, `badge10`) VALUES (NEW.idConta,NEW.id,@BADGE1,@BADGE2,@BADGE3,@BADGE4,@BADGE5,@BADGE6,@BADGE7,@BADGE8,@BADGE9,@BADGE10);
    -- FIM BADGE
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `idCheckIn` int(11) NOT NULL,
  `idConta` int(11) NOT NULL,
  `texto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `idCheckIn`, `idConta`, `texto`) VALUES
(1, 12, 7, 'ola meu bem'),
(2, 12, 7, 'oi denovo meu bem'),
(3, 12, 7, 'oi bb'),
(4, 12, 7, 'toma um comentÃ¡rio ae'),
(5, 12, 7, 'wasd'),
(6, 12, 7, 'asdasd'),
(7, 13, 7, 'oieeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(8, 12, 7, 'qweqweqwe'),
(9, 12, 7, 'qweqwe'),
(10, 12, 7, 'qwe'),
(11, 12, 7, 'qwe'),
(12, 12, 7, 'qwe'),
(13, 12, 7, 'qwe'),
(14, 12, 7, 'qwe'),
(15, 16, 7, 'qwe'),
(16, 15, 7, 'asd'),
(17, 16, 7, 'qweerr'),
(18, 17, 7, 'qweqweqwe');

--
-- Triggers `comentario`
--
DELIMITER $$
CREATE TRIGGER `updateBadge10` AFTER INSERT ON `comentario` FOR EACH ROW BEGIN
	DECLARE idCheckInConta INT;
    SELECT (idConta) INTO idCheckInConta FROM checkin WHERE id = NEW.idCheckin;
	UPDATE contabadgecheckin set badge10 = 10 where idCheckin = NEW.idCheckin AND idConta = idCheckInConta;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `total` int(11) DEFAULT '0',
  `unico` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conta`
--

INSERT INTO `conta` (`id`, `email`, `senha`, `nome`, `usuario`, `total`, `unico`) VALUES
(5, 'cerveja@mail', 'cerveja', 'cerveja', 'cerveja', 0, 0),
(7, 'vinicius@mail.com', 'vinicius', 'vinicius', 'vinicius', 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contabadgecheckin`
--

CREATE TABLE `contabadgecheckin` (
  `idConta` int(11) NOT NULL,
  `idCheckIn` int(11) NOT NULL,
  `badge1` int(11) DEFAULT NULL,
  `badge2` int(11) DEFAULT NULL,
  `badge3` int(11) DEFAULT NULL,
  `badge4` int(11) DEFAULT NULL,
  `badge5` int(11) DEFAULT NULL,
  `badge6` int(11) DEFAULT NULL,
  `badge7` int(11) DEFAULT NULL,
  `badge8` int(11) DEFAULT NULL,
  `badge9` int(11) DEFAULT NULL,
  `badge10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contabadgecheckin`
--

INSERT INTO `contabadgecheckin` (`idConta`, `idCheckIn`, `badge1`, `badge2`, `badge3`, `badge4`, `badge5`, `badge6`, `badge7`, `badge8`, `badge9`, `badge10`) VALUES
(7, 12, 1, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, 10),
(7, 13, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, 10),
(7, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(7, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 10),
(7, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(7, 18, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL),
(7, 22, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL),
(7, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL),
(7, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amizade`
--
ALTER TABLE `amizade`
  ADD PRIMARY KEY (`id1`,`id2`),
  ADD KEY `id2` (`id2`);

--
-- Indexes for table `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cerveja`
--
ALTER TABLE `cerveja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `idCervejaria` (`idCervejaria`);

--
-- Indexes for table `cervejaria`
--
ALTER TABLE `cervejaria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`,`idConta`),
  ADD KEY `idCerveja` (`idCerveja`),
  ADD KEY `idConta` (`idConta`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`,`idCheckIn`,`idConta`),
  ADD KEY `idCheckin` (`idCheckIn`,`idConta`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `contabadgecheckin`
--
ALTER TABLE `contabadgecheckin`
  ADD PRIMARY KEY (`idConta`,`idCheckIn`),
  ADD KEY `idCheckIn` (`idCheckIn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cerveja`
--
ALTER TABLE `cerveja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cervejaria`
--
ALTER TABLE `cervejaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amizade`
--
ALTER TABLE `amizade`
  ADD CONSTRAINT `amizade_ibfk_1` FOREIGN KEY (`id1`) REFERENCES `conta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `amizade_ibfk_2` FOREIGN KEY (`id2`) REFERENCES `conta` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cerveja`
--
ALTER TABLE `cerveja`
  ADD CONSTRAINT `cerveja_ibfk_1` FOREIGN KEY (`idCervejaria`) REFERENCES `cervejaria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`idCerveja`) REFERENCES `cerveja` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`idConta`) REFERENCES `conta` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idCheckin`,`idConta`) REFERENCES `checkin` (`id`, `idConta`) ON DELETE CASCADE;

--
-- Constraints for table `contabadgecheckin`
--
ALTER TABLE `contabadgecheckin`
  ADD CONSTRAINT `contabadgecheckin_ibfk_1` FOREIGN KEY (`idConta`) REFERENCES `conta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contabadgecheckin_ibfk_2` FOREIGN KEY (`idCheckIn`) REFERENCES `checkin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
