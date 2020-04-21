-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2017 às 00:54
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_dev_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.clientes`
--

CREATE TABLE `tb_admin.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.empreendimentos`
--

CREATE TABLE `tb_admin.empreendimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque`
--

CREATE TABLE `tb_admin.estoque` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `largura` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `comprimento` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.estoque_imagens`
--

CREATE TABLE `tb_admin.estoque_imagens` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.financeiro`
--

CREATE TABLE `tb_admin.financeiro` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.imagens_imoveis`
--

CREATE TABLE `tb_admin.imagens_imoveis` (
  `id` int(11) NOT NULL,
  `imovel_id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.imoveis`
--

CREATE TABLE `tb_admin.imoveis` (
  `id` int(11) NOT NULL,
  `empreend_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `area` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(13, '::1', '2017-09-17 19:37:35', '59bef92f28bdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'admin', 'admin', '599ef130dcb41.jpg', 'Guilherme C. Grillo', 2),
(2, 'guigui768', '123456', 'danki_bg.jpg', 'Guilherme C. Grillo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2017-09-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(1, 'Esportes', 'esportes', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Projeto editado', 'Guilherme Grillo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo consequat finibus. Integer luctus, lacus vitae pretium venenatis, nisl ante fermentum lorem, non volutpat neque ex quis erat. Sed nec turpis et mauris condimentum vestibulum ut sed dui. Morbi eget orci quam. Cras vel augue nec diam tempus efficitur. Aliquam et posuere libero. Integer malesuada justo sit amet ullamcorper pretium. Phasellus pellentesque tincidunt congue. Aliquam dictum ipsum aliquam, elementum massa quis, viverra nibh.\r\n\r\nDuis in hendrerit felis. Aliquam consequat augue quis urna aliquam, id tempor arcu lacinia. Donec egestas leo porttitor lacus laoreet varius. Nam ut pellentesque sapien. Pellentesque placerat dignissim rutrum. Praesent ex mauris, fringilla in tempor id, pharetra nec nibh. Curabitur a ligula sapien. Maecenas condimentum pellentesque fermentum. Fusce blandit lobortis erat, eu mattis metus convallis eleifend. Integer tincidunt ac arcu ut feugiat. Aliquam ac est interdum massa gravida tincidunt a ac leo. Maecenas elit magna, tempus ut eleifend a, sollicitudin et arcu. Aliquam sed tempor velit, at pulvinar tortor. Vestibulum eu lorem sit amet risus porta fringilla ut in nisl.', 'fa fa-css3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo consequat finibus. Integer luctus, lacus vitae pretium venenatis, nisl ante fermentum lorem, non volutpat neque ex quis erat. Sed nec turpis et mauris condimentum vestibulum ut sed dui. Morbi eget orci quam.', 'fa fa-html5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo consequat finibus. Integer luctus, lacus vitae pretium venenatis, nisl ante fermentum lorem, non volutpat neque ex quis erat. Sed nec turpis et mauris condimentum vestibulum ut sed dui. Morbi ege', 'fa fa-gg-circle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur commodo consequat finibus. Integer luctus, lacus vitae pretium venenatis, nisl ante fermentum lorem, non volutpat neque ex quis erat. Sed nec turpis et mauris condimentum vestibulum ut sed dui. Morbi eget orci quam. ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(1, 1, '2017-09-08', 'Futebol', '<h2><strong>Ano do mes</strong></h2>\r\n<p>Ol&aacute; mundo</p>', '59b31c00ed5d0.jpg', 'futebol', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.empreendimentos`
--
ALTER TABLE `tb_admin.empreendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.estoque`
--
ALTER TABLE `tb_admin.estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.estoque_imagens`
--
ALTER TABLE `tb_admin.estoque_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.imagens_imoveis`
--
ALTER TABLE `tb_admin.imagens_imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.imoveis`
--
ALTER TABLE `tb_admin.imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_admin.empreendimentos`
--
ALTER TABLE `tb_admin.empreendimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_admin.estoque`
--
ALTER TABLE `tb_admin.estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_admin.estoque_imagens`
--
ALTER TABLE `tb_admin.estoque_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_admin.imagens_imoveis`
--
ALTER TABLE `tb_admin.imagens_imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_admin.imoveis`
--
ALTER TABLE `tb_admin.imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
