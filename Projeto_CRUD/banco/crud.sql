-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03/03/2021 às 07:57
-- Versão do servidor: 8.0.23-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int NOT NULL,
  `nome` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ddd` varchar(2) DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `atv` int DEFAULT '1',
  `tel2` int DEFAULT NULL,
  `nasc` varchar(10) DEFAULT NULL,
  `usuario_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `cpf`, `rg`, `email`, `ddd`, `tel`, `atv`, `tel2`, `nasc`, `usuario_id`) VALUES
(1, 'Gabriel', '77777777777', '99999999', 'gabriel@email.com', '19', 44444444, 0, 22222222, '2020-10-13', 1),
(2, 'Hiago', '40000000004', '666666666', 'aa@gmail.com', '33', 54444445, 1, 22222222, '2020-10-07', 1),
(3, 'ffff', '11111111111', '444444444', 'jj@gmail.com', '77', 44444444, 0, 22222222, '2020-10-06', 2),
(17, 'qewqe', '66666666666', '544444445', 'qweq@email.com', '66', 11111111, 1, 88888888, '2020-10-07', 3),
(19, 'abc', '40000000004', '544444445', 'aa@gmail.com', '33', 44444444, 0, 22222222, '2020-10-07', 3),
(65, 'Bruna', '50000000005', '555555555', 'aa@gmail.com', '19', 44444444, 1, 11111111, '2020-11-25', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int NOT NULL,
  `cep` varchar(250) NOT NULL,
  `rua` varchar(250) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `numero` int NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `principal` tinyint(1) DEFAULT '0',
  `cliente_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `cep`, `rua`, `bairro`, `numero`, `cidade`, `estado`, `principal`, `cliente_id`) VALUES
(2, '13480013', 'Rua Carlos Gomes', 'Centro', 1321, 'Limeira', 'SP', 0, 2),
(15, '13485346', 'Av Carlos Kuntz Busch', 'Parque Egisto Ragazzo', 800, 'Cosmoplolis', 'SP', 1, 1),
(26, '13482902', 'Rod Dep Laercio Corte', 'Jardim Res Graminha III', 4500, 'Limeira', 'SP', 0, 1),
(28, '13480013', 'Rod Dep Laercio Corte', 'Jardim Res Graminha III', 4500, 'Limeira', 'SP', 1, 17),
(29, '13480013', 'Rua Carlos Gomes', 'Centro', 800, 'Cosmoplolis', 'MA', 0, 17),
(36, '13482902', 'Rod Dep Laercio Corte', 'Jardim Res Graminha III', 800, 'Campinas', 'AP', 0, 2),
(78, '13480013', 'Rua Carlos Gomess', 'Centro', 1321, 'Limeira', 'SP', 0, 65),
(79, '13485346', 'Av Carlos Kuntz Busch', 'Centro', 800, 'Cosmoplolis', 'SP', 1, 65);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario_login` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nivel` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `usuario_login`, `senha`, `nivel`) VALUES
(1, 'Eric', 'eric@gmail', 'eric.bueno1', '$2y$10$eeiu05XPgDsuE9woUaoPguAxtBDaGCra/S0kGt1ctEtriEtUHDaJ2', 1),
(2, 'jj', 'jj@gmail.com', 'jj', '$2y$10$UEP/mUE7coUgrCoTO8ysp.VXIvM99aJAFJdw7z25A5EINTlckLzGG', 0),
(3, 'Hiago', 'vwxyz@hotmail.com', 'hiago1', '$2y$10$6e2u49FFj1FcP5u4Sv67Lu9fcHUN0xv0qFsqeQDa.auIer2UzpE/.', 0),
(4, 'Giovana', 'Gi@gmail.com', 'Gi.01', '$2y$10$A0P.Wp2btuQNi6ws4JDZlO/7HD0WF.KJQrATdboxKazRhjxMYvN5C', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`usuario_id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cadastro`
--
ALTER TABLE `cadastro`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cadastro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
