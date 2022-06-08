-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2022 às 18:41
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
  `id_login` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_login`, `nome`, `sobrenome`, `telefone`, `cpf`, `nascimento`) VALUES
(35, 'nicolas', 'sousa', '123123123', '12312312312', '2005-03-02'),
(41, 'felipe', 'souza', '12999999999', '12321231231', '2004-01-18'),
(38, 'nicolas', 'sousa', '123123123', '222222222', '2005-03-02'),
(39, 'nicolas', 'sousa', '123123123', '333333333', '2005-03-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hqs`
--

CREATE TABLE `hqs` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `email`, `senha`, `tipo`) VALUES
(35, 'nicolas@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente'),
(36, 'nicolas2@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(38, 'nicolas4@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente'),
(39, 'nicolas5@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente'),
(40, 'nicolas6@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(41, 'felipinhodamassa@gmail.com', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 'cliente'),
(42, 'henquinho4k@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `id_user`, `token`, `description`, `create_at`) VALUES
(30, 41, '6a6dc8cd04ecfe04fe2ffd4db322eade', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36', '2022-06-07 17:52:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id_login` int(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `cep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id_login`, `nome`, `sobrenome`, `telefone`, `cpf`, `rg`, `nascimento`, `cep`) VALUES
(36, 'nicolas', 'sousa', '111111111111', '22222222222222', '333333333333', '2005-03-02', '101023'),
(40, 'nicolas', 'sousa', '66666666666', '66666666666', '66666666666', '2005-03-02', '101023');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_login_id_user` (`id_login`);

--
-- Índices para tabela `hqs`
--
ALTER TABLE `hqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hqs_vendedor_id` (`id_vendedor`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_login_id_vendedor` (`id_login`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `hqs`
--
ALTER TABLE `hqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_login_id_user` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `hqs`
--
ALTER TABLE `hqs`
  ADD CONSTRAINT `fk_hqs_vendedor_id` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `fk_login_id` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
