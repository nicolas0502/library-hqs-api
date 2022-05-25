-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2022 às 19:53
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `library_hqs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `nascimento` date NOT NULL,
  `senha` varchar(100) NOT NULL,
  `regras` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `cpf`, `nascimento`, `senha`, `regras`) VALUES
(1, 'niconico', 'sousa', 'niconico@gmail.com', 12981146061, 22211133355, '0000-00-00', 'aaaqqqwww', ''),
(3, 'nicolas', 'sousa', 'nicolas@gmail.com', 1299765412, 44422211122, '1900-12-01', '123123', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hqs`
--

CREATE TABLE `hqs` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hqs`
--

INSERT INTO `hqs` (`id`, `nome`, `valor`, `quantidade`, `descricao`, `imagem`) VALUES
(1, 'doutor estranho 4', '53', 19, 'um bom hq', 'asdasdas'),
(2, 'vingadores edicao limitada', '50', 10, 'hq incrivel', 'asdasdasdasd'),
(4, 'pac man', '14', 1, 'asdasdasd', 'asdasda'),
(19, 'doutor estranho', '123', 123, '123asdas ', 'asdasdas'),
(20, 'felipe vira wolverine  ', '35', 15, 'um historia de um mlk com o cabelona regua que quer se tornar o wolverine', 'asdasdsaasdasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions_user`
--

CREATE TABLE `sessions_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions_vend`
--

CREATE TABLE `sessions_vend` (
  `id` int(11) NOT NULL,
  `id_vend` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `rg` bigint(20) NOT NULL,
  `nascimento` date NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cep` bigint(20) NOT NULL,
  `regras` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `cpf`, `rg`, `nascimento`, `senha`, `cep`, `regras`) VALUES
(1, 'niconico', 'sousa', 'niconico@gmail.com', 12981146061, 22211133355, 1112223333, '2000-05-02', '123123', 123123123, ''),
(4, 'pac man', 'sousa', 'nicolas@gmail.com', 1299765412, 44422211122, 123123123123, '1900-12-01', 'qweqwe', 101023, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `hqs`
--
ALTER TABLE `hqs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions_user`
--
ALTER TABLE `sessions_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Índices para tabela `sessions_vend`
--
ALTER TABLE `sessions_vend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vend_id` (`id_vend`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `hqs`
--
ALTER TABLE `hqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `sessions_user`
--
ALTER TABLE `sessions_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sessions_vend`
--
ALTER TABLE `sessions_vend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `sessions_user`
--
ALTER TABLE `sessions_user`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sessions_vend`
--
ALTER TABLE `sessions_vend`
  ADD CONSTRAINT `fk_vend_id` FOREIGN KEY (`id_vend`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
