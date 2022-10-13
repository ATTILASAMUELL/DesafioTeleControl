-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Out-2022 às 02:56
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema-telecontrol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_clientee` int(11) NOT NULL,
  `fk_produtoo` int(11) NOT NULL,
  `dat` date NOT NULL,
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientee` (`fk_clientee`),
  KEY `fk_produtoo` (`fk_produtoo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `cpf` varchar(150) NOT NULL,
  `cep` varchar(150) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` varchar(150) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `datanascimento` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `senha`, `cpf`, `cep`, `logradouro`, `numero`, `bairro`, `complemento`, `datanascimento`, `email`) VALUES
(1, 'Paulo Lin', '$2y$10$hsNrc8tD4j.qXYyPRgZDzuB1kMJVZHizqHTaSbet3kC.6CV1mgz5W', '01833975090', '72318507', 'Distrito Federal', '804', 'samambaia norte', 'samambaia ', '1997-08-14', 'paulo.telecontrol@gmail.com'),
(2, 'attila samuell nunes tabory', '$2y$10$hsNrc8tD4j.qXYyPRgZDzuB1kMJVZHizqHTaSbet3kC.6CV1mgz5W', '83494331230', '7318508', 'QN 402 Conjunto G Comércio', '987', 'samambaia', 'proximo ao superbom', '1997-08-14', 'atila.tabory@gmail.com'),
(7, 'Tele Control', '$2y$10$SPvZ502DDiKHxikUsdC6AuR8MGX3lH.j/K3UUOxOHKvYSNXfpqGlm', '758.940.376-78', '72318-506', 'QN 402 Conjunto F ComÃ©rcio', '758', 'Samambaia Norte (Samambaia)', 'Samambaia', '14/08/1975', 'tele.control@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_venda`
--

DROP TABLE IF EXISTS `pedido_venda`;
CREATE TABLE IF NOT EXISTS `pedido_venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cliente` int(11) NOT NULL,
  `itens_pedido` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `total` float NOT NULL,
  `dataPedido` datetime NOT NULL,
  `statu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`fk_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `valor` float NOT NULL,
  `nome_arquivo` varchar(150) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `foto`, `valor`, `nome_arquivo`, `descricao`) VALUES
(6, 'Tênis Adidas Zue', '../arquivoUpload/61edfcd951f6c.jpg', 299.23, '1929950198.jpg', 'Ótimo amortecimento'),
(7, 'Tênis Nike Zo', '../arquivoUpload/61ee3dd24b87b.jpg', 198.89, 'nike.jpg', 'Design que te ajuda. '),
(8, 'Tênis Adidas Air', '../arquivoUpload/61edfcd951f6c.jpg', 756.87, 'tenis-nike-air-vapormax-evo-masculino-CT2868-001-1.jpg', 'Feito para você.'),
(10, 'Tênis Adidas Pre', '../arquivoUpload/61eea92c16f94.jpg', 182.89, '1929950198.jpg', 'Macio e confortavel'),
(11, 'Tênis Adidas Conf', '../arquivoUpload/61f0105329bf8.jpg', 299.98, '1929950198.jpg', 'Durabilidade Incomparável '),
(12, 'Tênis Adidas Dur', '../arquivoUpload/61f0105329bf8.jpg', 99.54, '1929950198.jpg', 'Conforto e durabilidade');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`fk_clientee`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`fk_produtoo`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `pedido_venda`
--
ALTER TABLE `pedido_venda`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
