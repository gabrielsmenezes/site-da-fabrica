-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2019 às 02:10
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sitefabrica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagenseditais`
--

CREATE TABLE `tb_postagenseditais` (
  `id_post` int(6) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `caminho_arquivo` varchar(80) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagenseditais`
--

INSERT INTO `tb_postagenseditais` (`id_post`, `nome`, `descricao`, `caminho_arquivo`, `id_user`) VALUES
(4, 'Abertura de edital para proposta de projetos 2', 'Edital vÃ¡lido atÃ© 01/06/2019', 'local_de_prova.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagenspessoas`
--

CREATE TABLE `tb_postagenspessoas` (
  `id_post` int(6) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(140) NOT NULL,
  `categoria` int(1) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagenspessoas`
--

INSERT INTO `tb_postagenspessoas` (`id_post`, `imagem`, `nome`, `descricao`, `categoria`, `id_user`) VALUES
(6, 'capitamarvel.jpg', 'Maria', 'Professora', 0, 1),
(7, 'bebras.jpg', 'JoÃ£o', 'Coordenador', 0, 1),
(8, 'batman.jpg', 'Mario', 'Professor', 0, 1),
(9, 'greenlantern.jpg', 'Pedro', 'Aluno', 1, 1),
(10, 'capitamarvel.jpg', 'Flavia', 'Aluna', 1, 1),
(11, 'ironman.jpg', 'JosÃ©', 'ES', 2, 1),
(12, 'greenlantern.jpg', 'Bruno', 'ES', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagensprojetos`
--

CREATE TABLE `tb_postagensprojetos` (
  `id_post` int(6) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(340) NOT NULL,
  `categoria` int(1) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagensprojetos`
--

INSERT INTO `tb_postagensprojetos` (`id_post`, `imagem`, `nome`, `descricao`, `categoria`, `id_user`) VALUES
(3, 'bebras.jpg', 'Bebras', 'projeto de ensino de computaÃ§Ã£o', 1, 1),
(4, 'noticia.png', 'Facom em Foco', 'Projeto facom em foco foi proposto com a finalidade de divulgar as notÃ­cias da facom - ufms via aplicativo mobile', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `lembrete` varchar(60) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nome`, `email`, `senha`, `lembrete`, `foto`, `nivel`) VALUES
(1, 'JosÃ© Augusto', 'jose@gmail.com', '1234', 'numeros', 'ironman.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_postagenseditais`
--
ALTER TABLE `tb_postagenseditais`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_postagenspessoas`
--
ALTER TABLE `tb_postagenspessoas`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_postagensprojetos`
--
ALTER TABLE `tb_postagensprojetos`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_postagenseditais`
--
ALTER TABLE `tb_postagenseditais`
  MODIFY `id_post` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_postagenspessoas`
--
ALTER TABLE `tb_postagenspessoas`
  MODIFY `id_post` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_postagensprojetos`
--
ALTER TABLE `tb_postagensprojetos`
  MODIFY `id_post` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_postagenseditais`
--
ALTER TABLE `tb_postagenseditais`
  ADD CONSTRAINT `tb_postagenseditais_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Limitadores para a tabela `tb_postagenspessoas`
--
ALTER TABLE `tb_postagenspessoas`
  ADD CONSTRAINT `tb_postagenspessoas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Limitadores para a tabela `tb_postagensprojetos`
--
ALTER TABLE `tb_postagensprojetos`
  ADD CONSTRAINT `tb_postagensprojetos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
