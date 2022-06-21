-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2022 às 22:52
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
(47, 'Felipe', 'Pardinho', '12999999999', '44422211232', '2004-12-11'),
(52, 'nicolas', 'pedro', '23232323232', '44444444444', '2005-02-05');

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
  `descricao` varchar(2048) NOT NULL,
  `imagem` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hqs`
--

INSERT INTO `hqs` (`id`, `id_vendedor`, `nome`, `valor`, `quantidade`, `descricao`, `imagem`) VALUES
(27, 48, 'jumanji', '80.00', 15, 'um bom hq', 'https://1.bp.blogspot.com/-qx5Os_pDCTQ/X_vNZu9ELoI/AAAAAAAAjKo/l-NelJ_cxQQK3kx0rJpxKPpN6ClKqB1tQCLcBGAsYHQ/s900/4%2BMundo%2B7.jpg'),
(28, 46, 'vingadores', '45.00', 8, 'um bom hq asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdsdasdasdasdadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadaaaaaaaasddsssssssssssssssssssssssssssssssdddddddddddddd', 'https://jovemnerd.com.br/wp-content/uploads/2016/09/champions4.jpg');

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
(46, 'nicolas@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(47, 'felipe@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente'),
(48, 'luis@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(49, 'joao@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(50, 'felipinhodamassa@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(51, 'douto@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'vendedor'),
(52, 'nicolas12343@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'cliente');

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
(72, 46, '9e8bfde09945bac431f8004552b83e2c', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-21 16:53:49'),
(73, 46, 'aaf8a4ef17cd2fe35526d2707e66ea61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-21 17:51:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_login` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `rg` varchar(200) NOT NULL,
  `nascimento` date NOT NULL,
  `cep` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_login`, `nome`, `sobrenome`, `telefone`, `cpf`, `rg`, `nascimento`, `cep`) VALUES
(49, 'joao', 'pedro', '12399999999', '12312312312', '232323232', '2005-02-05', '12312312'),
(50, 'pac man', 'henrique', '12997654122', '12312312312', '312312312', '2200-02-04', '00000000'),
(51, 'doutor ', 'estranho', '12222222222', '22666666666', '666666666', '2003-05-06', '101023'),
(48, 'luis', 'henrique', '66666666666', '44422211231', '123123123', '2003-04-18', '101023'),
(46, 'Nicolas', 'Sousa', '12996731528', '44433322256', '444291090', '2005-02-05', '11669010');

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
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD UNIQUE KEY `cpf` (`cpf`,`rg`),
  ADD KEY `fk_login_id_vendedor` (`id_login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `hqs`
--
ALTER TABLE `hqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  ADD CONSTRAINT `fk_hqs_vendedor_id` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_login_id_vendedor` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
