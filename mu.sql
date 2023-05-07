-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2023 às 15:15
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bloco`
--

CREATE TABLE `bloco` (
  `Nome` text DEFAULT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `Nome_categoria` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `Nome` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `Imagem` text DEFAULT NULL,
  `fk_Bloco_Numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `Nome` text DEFAULT NULL,
  `Preco` double DEFAULT NULL,
  `fk_Estabelecimento_id` int(11) DEFAULT NULL,
  `fk_Categoria_id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `Texto` text DEFAULT NULL,
  `fk_Usuario_E_mail` varchar(200) DEFAULT NULL,
  `fk_Estabelecimento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id` int(11) NOT NULL,
  `Nome_tipo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id`, `Nome_tipo`) VALUES
(1, 'Usuário'),
(2, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Nome` text DEFAULT NULL,
  `E_mail` varchar(200) NOT NULL,
  `Senha` text DEFAULT NULL,
  `CNPJ` text DEFAULT NULL,
  `fk_Tipo_de_Usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Nome`, `E_mail`, `Senha`, `CNPJ`, `fk_Tipo_de_Usuario_id`) VALUES
('Gustavo', 'gustavo.farignoli@gmail.com', 'Gu@@20', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bloco`
--
ALTER TABLE `bloco`
  ADD PRIMARY KEY (`Numero`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Estabelecimento_2` (`fk_Bloco_Numero`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Produto_2` (`fk_Estabelecimento_id`),
  ADD KEY `FK_Produto_3` (`fk_Categoria_id_categoria`);

--
-- Índices para tabela `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Review_3` (`fk_Estabelecimento_id`),
  ADD KEY `FK_Review_2` (`fk_Usuario_E_mail`);

--
-- Índices para tabela `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`E_mail`),
  ADD KEY `FK_Usuario_2` (`fk_Tipo_de_Usuario_id`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD CONSTRAINT `FK_Estabelecimento_2` FOREIGN KEY (`fk_Bloco_Numero`) REFERENCES `bloco` (`Numero`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_Produto_2` FOREIGN KEY (`fk_Estabelecimento_id`) REFERENCES `estabelecimento` (`id`),
  ADD CONSTRAINT `FK_Produto_3` FOREIGN KEY (`fk_Categoria_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_Review_2` FOREIGN KEY (`fk_Usuario_E_mail`) REFERENCES `usuario` (`E_mail`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Review_3` FOREIGN KEY (`fk_Estabelecimento_id`) REFERENCES `estabelecimento` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Usuario_2` FOREIGN KEY (`fk_Tipo_de_Usuario_id`) REFERENCES `tipo_de_usuario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
