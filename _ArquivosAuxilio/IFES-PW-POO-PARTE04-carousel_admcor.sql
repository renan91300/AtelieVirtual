-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2019 às 00:02
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetobase_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_cor`
--

CREATE TABLE `adm_cor` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cor` varchar(40) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm_cor`
--

INSERT INTO `adm_cor` (`id`, `nome`, `cor`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Azul', 'primary', '2019-05-15 00:00:00', NULL),
(2, 'Cinza', 'secundary', '2019-05-09 00:00:00', NULL),
(3, 'Verde', 'success', '2019-05-09 00:00:00', NULL),
(4, 'Vermelho', 'danger', '2019-05-09 00:00:00', NULL),
(5, 'Amarelo', 'warning', '2019-05-09 00:00:00', NULL),
(6, 'Azul claro', 'info', '2019-05-09 00:00:00', NULL),
(7, 'Claro', 'light', '2019-05-09 00:00:00', NULL),
(8, 'Cinza escuro', 'dark', '2019-05-09 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `posicao_text` varchar(40) DEFAULT NULL,
  `titulo_botao` varchar(40) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `adm_cor_id` int(11) DEFAULT NULL,
  `adm_situacao_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carousel`
--

INSERT INTO `carousel` (`id`, `nome`, `imagem`, `titulo`, `descricao`, `posicao_text`, `titulo_botao`, `link`, `ordem`, `adm_cor_id`, `adm_situacao_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Banner 01', 'banner01.jpg', 'Exemplo testando o banner 01', 'Mussum Ipsum, cacilds vidis litro abertis. Quem manda na minha terra sou euzis! Viva Forevis aptent taciti sociosqu ad litora torquent. Não sou faixa preta cumpadi.', 'text-left', 'Clique aqui', 'http://www.ifes.edu.br', 1, 1, 1, '2019-05-08 08:31:15', NULL),
(2, 'Banner 02', 'banner02.jpg', 'Exemplo testando o banner 02', 'Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Suco de cevadiss deixa as pessoas mais interessantis. Vehicula non. Ut sed ex eros.', 'text-center', 'Comprar agora', 'http://www.ci.ifes.edu.br', 2, 5, 1, '2019-05-08 09:08:25', NULL),
(3, 'Banner 03', 'banner03.jpg', 'Exemplo testando o banner 03', 'Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! Praesent malesuada urna nisi, quis volutpat erat hendrerit non.', 'text-right', 'Inscreva-se', 'http://www.google.com.br', 3, 4, 1, '2019-05-08 09:19:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `senha` char(32) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `foto`, `data_criacao`, `status`) VALUES
(9, 'Suellen Lopes123', 'suellen@gmail.com123', 'a01610228fe998f515a72dd730294d87', NULL, '2019-03-27 21:18:27', '0'),
(12, 'Flavio Izo', 'flavio@flavioizo.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2019-04-03 16:51:32', '1'),
(13, 'Marias', 'marias@gmail.com', '1c104b9c0accfca52ef21728eaf01453', NULL, '2019-04-24 19:15:46', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_cor`
--
ALTER TABLE `adm_cor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_cor`
--
ALTER TABLE `adm_cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
