-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Maio-2023 às 20:44
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
  `Nome` text NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bloco`
--

INSERT INTO `bloco` (`Nome`, `Numero`) VALUES
('Amarelo', 1),
('Azul', 2),
('Verde', 3),
('Laranja', 4),
('Vermelho', 5),
('Medicina', 6),
('Usina Piloto', 7),
('Elétrica', 8),
('Mecânica', 9),
('TECPUC', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `Nome_categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `Nome_categoria`) VALUES
(1, 'Vegano'),
(2, 'Vegetariano'),
(3, 'Promoção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `Nome` text NOT NULL,
  `Cnpj` text NOT NULL,
  `id` int(11) NOT NULL,
  `Imagem` blob NOT NULL,
  `fk_Bloco_Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`Nome`, `Cnpj`, `id`, `Imagem`, `fk_Bloco_Numero`) VALUES
('Angra', '', 1, '', 2),
('Augusta', '', 2, '', 2),
('ChocoOZ', '', 3, '', 2),
('Pappone', '', 4, '', 2),
('The Honest Burguer', '', 5, '', 2),
('Tropical Banana', '', 6, '', 2),
('Guana Hari', '', 7, '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Preco` double NOT NULL,
  `Descrição` text DEFAULT NULL,
  `fk_Estabelecimento_id` int(11) NOT NULL,
  `fk_Categoria_id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `Nome`, `Preco`, `Descrição`, `fk_Estabelecimento_id`, `fk_Categoria_id_categoria`) VALUES
(1, 'Pão c/ Manteiga', 5.5, NULL, 1, NULL),
(2, 'Queijo Quente', 7.5, NULL, 1, NULL),
(3, 'Misto Quente', 8.5, NULL, 1, NULL),
(4, 'Napolitano', 9.5, NULL, 1, NULL),
(5, 'Misto de Peito de Peru', 9.9, NULL, 1, NULL),
(6, 'Omelete Tradicional', 12.9, NULL, 1, 2),
(7, 'Omelete de Queijo', 13.9, NULL, 1, 2),
(8, 'Omelete de Queijo e Presunto', 15.9, NULL, 1, NULL),
(9, 'Omelete de Peito de Peru', 15.9, NULL, 1, NULL),
(10, 'Omelete Napolitano', 15.9, NULL, 1, NULL),
(11, 'Omelete c/ Bacon', 15.9, NULL, 1, NULL),
(12, 'Ovos Mexidos', 9.9, NULL, 1, 2),
(13, 'Ovos Mexidos c/ Bacon', 11.9, NULL, 1, NULL),
(14, 'Angra Bife', 23.9, NULL, 1, NULL),
(15, 'Angra Frango', 23.9, NULL, 1, NULL),
(16, 'Angra Acebolado', 26.9, NULL, 1, NULL),
(17, 'Angra Bife Light', 19.9, NULL, 1, NULL),
(18, 'Angra Frango Light', 19.9, NULL, 1, NULL),
(19, 'Salada Vegetariana', 18.9, NULL, 1, 2),
(20, 'Água', 4, NULL, 2, NULL),
(21, 'Batata Recheada Tradicional', 20, NULL, 2, NULL),
(22, 'Calzone Tradicional Médio', 20, NULL, 2, NULL),
(23, 'Energético Monster ', 13, NULL, 2, NULL),
(24, 'Fatia Pizza Tradicional', 10, NULL, 2, NULL),
(32, 'Meia Fatia de Pizza Tradicional', 6, NULL, 2, NULL),
(33, 'Cappuccino Especial do Oz', 11.9, NULL, 3, NULL),
(34, 'Latte Caramel', 9, NULL, 3, NULL),
(35, 'Buffet Kilo', 59.9, '', 4, NULL),
(36, 'Fatia mais Refri lata', 15, '', 4, 3),
(37, 'Combo Estudante: X-Frango + Refresco', 7, '', 5, 3),
(38, 'Água', 4.5, '', 5, NULL),
(39, 'Pastel Salgado - 18cm', 8.5, 'Sabores: Frango, Palmito Pizza, Queijo', 7, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `Texto` text NOT NULL,
  `fk_Usuario_E_mail` varchar(200) NOT NULL,
  `fk_Estabelecimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id` int(11) NOT NULL,
  `Nome_tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id`, `Nome_tipo`) VALUES
(1, 'Usuário'),
(2, 'Gerente'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Nome` text NOT NULL,
  `E_mail` varchar(200) NOT NULL,
  `Senha` text NOT NULL,
  `CNPJ` text DEFAULT NULL,
  `fk_Tipo_de_Usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Nome`, `E_mail`, `Senha`, `CNPJ`, `fk_Tipo_de_Usuario_id`) VALUES
('Gustavo', 'gustavol.educ@gmail.com', '$2y$10$VHo3TxPGN7OlOO7VwJaJse58ygal/bdY8iUG2kBn8hBH6z1.jI3LS', NULL, 1);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  ADD CONSTRAINT `FK_Produto_2` FOREIGN KEY (`fk_Estabelecimento_id`) REFERENCES `estabelecimento` (`id`) ON DELETE CASCADE,
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
