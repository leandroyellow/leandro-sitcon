-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Mar-2022 às 04:09
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test-sitcon`
--
CREATE DATABASE IF NOT EXISTS `test-sitcon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test-sitcon`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `dataNasc` date NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `dataNasc`, `CPF`, `status`) VALUES
(1, 'Augusto Fernandes', '2000-08-10', '210.298.293-09', 'ativo'),
(2, 'Maria Silva Oliveira', '1999-03-21', '210.298.293-09', 'ativo'),
(3, 'Alfonse Smikchuz', '2002-10-02', '210.298.293-09', 'ativo'),
(4, 'Nagela Perreira', '1997-05-16', '210.298.293-09', 'ativo'),
(5, 'Gustavo Hernanes', '2001-07-10', '210.298.293-09', 'ativo'),
(6, 'João Paulo Ferreira', '1995-06-26', '210.298.293-09', 'inativo'),
(7, 'Julio Costa Martins', '1980-11-23', '210.298.293-09', 'ativo'),
(8, 'Helena Marques', '2000-01-11', '210.298.293-09', 'ativo'),
(9, 'Zira Silva', '2003-02-14', '210.298.293-09', 'ativo'),
(10, 'João Bicalho', '1993-03-12', '210.298.293-09', 'inativo'),
(11, 'Paulina Araujo', '2002-08-10', '210.298.293-09', 'ativo'),
(12, 'Carolina Rosa Silva', '2001-12-24', '210.298.293-09', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos`
--

CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `procedimentos`
--

INSERT INTO `procedimentos` (`id`, `descricao`, `tipo_id`, `status`) VALUES
(1, 'Consulta Pediátrica ', 1, 'ativo'),
(2, 'Consulta Clínico Geral', 1, 'ativo'),
(3, 'Hemograma', 2, 'ativo'),
(4, 'Glicemia', 2, 'ativo'),
(5, 'Colesterol', 2, 'ativo'),
(6, 'Triglicerídeos', 2, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `nome`, `status`) VALUES
(1, 'Orlando Nobrega', 'ativo'),
(2, 'Rafaela Tenorio', 'ativo'),
(3, 'João Paulo Nobrega', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposolicitacao`
--

CREATE TABLE `tiposolicitacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tiposolicitacao`
--

INSERT INTO `tiposolicitacao` (`id`, `descricao`, `status`) VALUES
(1, 'Consulta', 'ativo'),
(2, 'Exames Laboratoriais', 'ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `procedimentos`
--
ALTER TABLE `procedimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tiposolicitacao`
--
ALTER TABLE `tiposolicitacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `procedimentos`
--
ALTER TABLE `procedimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tiposolicitacao`
--
ALTER TABLE `tiposolicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `procedimentos`
--
ALTER TABLE `procedimentos`
  ADD CONSTRAINT `procedimentos_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tiposolicitacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
