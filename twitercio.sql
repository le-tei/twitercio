-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Ago-2018 às 20:56
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitercio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `tweet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `seguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `mensagem` varchar(140) NOT NULL,
  `removido` tinyint(1) NOT NULL DEFAULT '0',
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nomeDeUsuario` varchar(255) NOT NULL,
  `dataCriacao` date NOT NULL,
  `removido` tinyint(1) NOT NULL DEFAULT '0',
  `dataNascimento` date NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `privado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nomeDeUsuario`, `dataCriacao`, `removido`, `dataNascimento`, `sexo`, `cidade`, `site`, `foto`, `privado`) VALUES
(1, 'Tércio', 'tercio@gmail.com', 'tercio', 'tercio', '2018-08-20', 0, '1996-02-13', 'feminino', 'Bandeirantes', 'www.tercio.com.br', 'tercio.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario`),
  ADD KEY `tweet_id` (`tweet`);

--
-- Indexes for table `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario`),
  ADD KEY `seguido_id` (`seguido`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD CONSTRAINT `curtidas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `curtidas_ibfk_2` FOREIGN KEY (`tweet`) REFERENCES `tweets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`seguido`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
