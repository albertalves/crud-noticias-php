-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2020 às 12:42
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_noticias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Hardware'),
(2, 'Periféricos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `categoria_id`, `titulo`, `conteudo`) VALUES
(1, 1, 'Processador AMD Ryzen 5', 'Com esse processador inovador e incrível você eleva ao máximo o verdadeiro potencial do seu computador.'),
(2, 2, 'Mouse Gamer Logitech G403 Hero', 'O G403 HERO é projetado para jogos com um formato que é fácil de manusear e controlar, usando materiais de alta qualidade.'),
(5, 1, 'SSD Kingston A400', 'Performance não será problema com o SSD A400 da Kingston!'),
(6, 1, 'Memória HyperX Fury', 'Módulo de memória RAM da HyperX apresenta velocidade de frequência de 2666MHz, compatível com as mais novas e recentes placas mãe Intel e AMD. Essa linha que oferece overclock automático com a tecnologia plug and play para fácil instalação e aproveitament'),
(7, 1, 'Placa de Vídeo Asus NVIDIA', 'De cima a baixo, a ROG Strix GeForce RTX 3070 foi radicalmente aprimorada para acomodar os impressionantes novos chips Ampere da NVIDIA e para fornecer a próxima onda de inovação em desempenho gaming para o mercado. Um novo design mais reforçado envolve um grupo de ventoinhas Axial-tech.'),
(22, 1, 'Processador Intel Core i7-10700', 'Uma nova arquitetura de gráficos oferece suporte a experiências visuais ultravívidas, como vídeo em HDR 4K e jogos a 1080p. Os processadores Intel Core da 10a geração com gráficos Intel Iris Plus permitem experiências de entretenimento nunca vistas.'),
(23, 1, 'Cooler para Processador Cooler Master', 'O lendário Hyper air cooler está de volta e melhor do que antes. O Hyper 212 RGB Black Edition oferece melhor instalação e ótimo desempenho, facilmente uma das melhores soluções de resfriamento a ar. A tampa superior em alumínio e as aletas pretas niquelado conferem ao Hyper 212 O RGB Black Edition é um apelo estético de alta qualidade O elegante jato preto não apenas faz com que ele pareça ótimo, mas também aumenta o desempenho de resfriamento. O Hyper 212 RGB Black Edition mantém a mesma eficiência de resfriamento que o Hyper 212 EVO. A Tecnologia de Contato Direto, aletas empilhadas e 4 heatpipes, reduz a resistência do fluxo de ar, reduz os pontos de calor e aumenta o fluxo de ar para os dissipadores de calor. A nova ventoinha quadrada de 120 mm quadrados Hyper 212 RGB Black Edition foi projetada para produzir um ótimo fluxo de ar e tranquilidade. Compatível com todas as motherboards com certificação RGB.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_noticia` (`categoria_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_categoria_noticia` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
