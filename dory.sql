-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 04:07
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dory`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_reservatorio`
--

CREATE TABLE `cadastro_reservatorio` (
  `id_reservatorio` int(11) NOT NULL,
  `numero_acude` int(11) NOT NULL,
  `nome_acude` varchar(40) NOT NULL,
  `data_coleta` date NOT NULL,
  `especies` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tamanho_medio` int(11) NOT NULL,
  `observacoes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_usuario`
--

CREATE TABLE `cadastro_usuario` (
  `id_cadastro` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `nome_empresa` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`id_cadastro`, `nome`, `email`, `cpf`, `nome_empresa`, `cnpj`, `senha`, `id`) VALUES
(39, 'Gabriel', '$2y$10$51j/Ykj39NzbbTP9/ANleutvk/3FrP/NCHgpdVzhUgMwHdcGosIha', '$2y$10$SvWq1T4.P4NqEphWGfgBdugzbC26gCiV3w9boazXTrwp0MVci1AYi', NULL, NULL, '$2y$10$GKND9CWnZFILBHNuJcMjFu9NpcwDtA1wI0RmPifZn0.JBdO2sDxY.', 1),
(40, 'André', '$2y$10$bYKjXkxoeq/DzDY32PvUoeJbqLqKlcBLHPsKnXWDmxSvdE8Qcl8zW', NULL, '$2y$10$CJOa2sCVxBdRm5NAY9Narem1DPjtXqFmp9QQrfpHIzNXGmacQtXWS', '$2y$10$Lk5WEkGHHxmrSVAhaD8KB.3z.RRJRhH47lNsVcH0Rxg8WYXu07/4O', '$2y$10$bX.6F1ywze4.Ofiv/wz31eUF.h4TOMugImZOt4wVQ45QB4gYxbk3.', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `calibragem`
--

CREATE TABLE `calibragem` (
  `id_cadastro` int(11) NOT NULL,
  `numero_acude` int(11) NOT NULL,
  `nome_acude` varchar(140) NOT NULL,
  `data_coleta` date NOT NULL,
  `leitura1_01` float NOT NULL,
  `leitura2_01` float NOT NULL,
  `leitura3_01` float NOT NULL,
  `leitura1_025` float NOT NULL,
  `leitura2_025` float NOT NULL,
  `leitura3_025` float NOT NULL,
  `leitura1_05` float NOT NULL,
  `leitura2_05` float NOT NULL,
  `leitura3_05` float NOT NULL,
  `leitura1_1` float NOT NULL,
  `leitura2_1` float NOT NULL,
  `leitura3_1` float NOT NULL,
  `leitura1_2` float NOT NULL,
  `leitura2_2` float NOT NULL,
  `leitura3_2` float NOT NULL,
  `leitura1_35` float NOT NULL,
  `leitura2_35` float NOT NULL,
  `leitura3_35` float NOT NULL,
  `leitura1_65` float NOT NULL,
  `leitura2_65` float NOT NULL,
  `leitura3_65` float NOT NULL,
  `leitura1_10` float NOT NULL,
  `leitura2_10` float NOT NULL,
  `leitura3_10` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `calibragem`
--

INSERT INTO `calibragem` (`id_cadastro`, `numero_acude`, `nome_acude`, `data_coleta`, `leitura1_01`, `leitura2_01`, `leitura3_01`, `leitura1_025`, `leitura2_025`, `leitura3_025`, `leitura1_05`, `leitura2_05`, `leitura3_05`, `leitura1_1`, `leitura2_1`, `leitura3_1`, `leitura1_2`, `leitura2_2`, `leitura3_2`, `leitura1_35`, `leitura2_35`, `leitura3_35`, `leitura1_65`, `leitura2_65`, `leitura3_65`, `leitura1_10`, `leitura2_10`, `leitura3_10`) VALUES
(0, 0, '', '0000-00-00', 123312, 0, 12123, 1312120, 132123, 123123, 123312, 123123, 123123, 123123, 123123, 123123, 123123, 123123, 123, 312213000, 213123, 213, 123231, 312123, 123123, 123, 123123, 123123);

-- --------------------------------------------------------

--
-- Estrutura para tabela `examinar`
--

CREATE TABLE `examinar` (
  `id_cadastro` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `complemento` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_reservatorio`
--
ALTER TABLE `cadastro_reservatorio`
  ADD PRIMARY KEY (`id_reservatorio`);

--
-- Índices de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices de tabela `calibragem`
--
ALTER TABLE `calibragem`
  ADD PRIMARY KEY (`data_coleta`);

--
-- Índices de tabela `examinar`
--
ALTER TABLE `examinar`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_reservatorio`
--
ALTER TABLE `cadastro_reservatorio`
  MODIFY `id_reservatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `examinar`
--
ALTER TABLE `examinar`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
