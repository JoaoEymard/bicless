-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql427.umbler.com
-- Generation Time: 20-Ago-2017 às 16:59
-- Versão do servidor: 5.6.34-log
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_cheype`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `fone1` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `fone2` varchar(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `endereco` varchar(250) COLLATE utf8_swedish_ci DEFAULT NULL,
  `referencia` varchar(250) COLLATE utf8_swedish_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `fone1`, `fone2`, `email`, `endereco`, `referencia`, `bairro`, `cidade`) VALUES
(1, 'Unicardio Cariri', '(88) 9 9625-8033', '(88) 3511-7100', 'unicardio.cariri@gmail.com', 'Rua Santa Rosa, 251', '', 'Socorro', 'Juazeiro do Norte'),
(2, 'Lindicacia', '(88) 9 9619-3366', '', '', 'Rua Padre Miranda, S/N', '', 'Nossa Sra. de Fátima', 'Barbalha'),
(3, 'RT Imobiliária', '(88) 3571-3870', '', '', 'Rua Edward Mclai, 440 - Sala 1002', 'Edificio Medical Center', 'Triângulo', 'Juazeiro do Norte'),
(4, 'Antonio Diego', '(88) 9 9908-7716', '', '', 'Rua Neroly Filgueira, 315', 'Do lado do Instituto José Bernadinho - IJB', 'Centro', 'Barbalha'),
(5, 'Paulo Filho', '(88) 9 9913-3925', '', '', 'Rua Nações Unidas, 227', '', 'Centro', 'Barbalha'),
(6, 'Cícera Guerride', '(88) 9 9952-6049', '', '', 'Rua Padre Correia, 204', 'Na rua do bar do pico', 'Bairro do Rosário', 'Barbalha'),
(7, 'Sandra Galindo', '(88) 9 9964-0114', '', '', 'rua', '', 'Bulândeira', 'Barbalha'),
(8, 'Pedro Arthur', '(88) 9 9624-8997', '', '', 'Sitio Arajara', '', 'Arajara', 'Barbalha'),
(9, 'Renato Noqueira', '(88) 3532-0642', '(88) 9 9672-3408', '', 'Rua Totonho Filgueira', '', 'Centro', 'Barbalha'),
(10, 'Rodrigo Torres', '(88) 9 9619-0569', '', '', 'Rua Cel. João da Cruz', '', 'Centro', 'Barbalha'),
(11, 'Madeireira N. Sra. de Fátima', '(88) 3532-2924', '', '', 'Rua Pero Coelho, 196', '', 'Centro', 'Barbalha'),
(12, 'FM Auto Peças', '(88) 9 9919-3794', '', '', 'Rua LÍdio de Freitas, 511', '', 'Conjunto N. S. de Fátima', 'Barbalha'),
(13, 'Ricardo Granjeiro Sampaio', '(88) 9 9997 6767', '', '', 'Condominio Terra dos Kariris', '', 'Sitio Venha ver', 'Barbalha'),
(14, 'Ines Tania Callou', '(88) 9 9963-8863', '', '', 'Rua Totonho Filgueira, 253', '', 'Centro', 'Barbalha'),
(15, 'Socorro Santos', '(88) 9 8241-8055', '', '', 'Rua L2, 153', '', 'Cirolândia', 'Barbalha'),
(16, 'Ana Luiza', '(88) 9 9766-9999', '', '', 'Rua Coronel João Coelho, 240', 'na Mix Shake, em frente a Opção', 'Centro', 'Barbalha'),
(17, 'Afonso Celsio Duarte', '(88) 3532-1338', '', '', 'Rua Major Sampaio, 705', 'Ao lado da Faculdade de Medicina', 'Centro', 'Barbalha'),
(18, 'Joacy Cordeiro', '(88) 9 9792-9004', '', '', 'Vivenda Verdejá', '', 'Sitio Barro Branco', 'Barbalha'),
(19, 'Paulo Sá', '(88) 9 9692-1501', '', '', 'não informado', '', 'Centro', 'Barbalha'),
(20, 'Angélica Freitas', '(88) 9 8135-3427', '', '', 'Sítio Taquari', '', 'Arajara', 'Barbalha'),
(21, 'Rodrigo Sampaio de Menezes', '(88) 9 8815-4318', '', '', 'Rua José Bezerra Mariano, 668', '', 'Bairro Nossa Senhora de Fátima', 'Barbalha'),
(22, 'Sirecon - Sindicato dos representantes comerciais do estado do Ceará', '(88) 9 8817- 8888', '(88) 3512-3523', '', 'Rua da Conceição, 536. Sala: 2010', '', 'Centro', 'Juazeiro do Norte'),
(23, 'Morgana de Sá Barreto', '(88) 9 9641-2921', '(88) 9 9949-8238', '', 'Av. Coronel João Coelho, 426b', 'Próx. a caixa econômica', 'Centro', 'Barbalha'),
(24, 'Karine', '(85) 9 9605-2417', '', '', 'Rua Nezinho de Sá', '', 'Centro', 'Barbalha'),
(25, 'Eliana Sales', '(88) 9 8126-8404', '', '', 'Sítio Cabeceiras', '', 'Vila Mulato', 'Barbalha'),
(26, 'Jardel', '(88) 9 9607-2610', '', '', 'Rua', '', 'Centro', 'Juazeiro do Norte'),
(27, 'Anália', '(88) 9 9915-6180', '', '', 'Rua Jundiaí, 579', '', 'Alto da alegria', 'Barbalha'),
(28, 'Macos Galvão', '(88) 9 8119-9926', '', '', 'S-n', '', 'Aeroporto', 'Juazeiro do norte'),
(29, 'Lélio', '(88) 9 9737-4636', '', '', 'Rua Zuca Sampaio, 164', '', 'Rosário', 'Barbalha'),
(30, 'Cícero de Rex', '(88) 9 9996-6666', '', '', 'Rua Divino Salvador', '', 'Rosário', 'Barbalha'),
(31, 'Domiciliano Furtado Freitas', '(88) 9 9926-9627', '', '', 'Rua R1, 46', '', 'Cirolândia', 'Barbalha'),
(32, 'Jorge Luiz', '(88) 9 9814-3800', '', '', 'Rua Joaquim da Rocha, 996 ', 'Próx. Lanchonete Leblon', 'João Cabral', 'Juazeiro do Norte'),
(33, 'Lucas Costa', '(88) 9 9475-7453', '', 'lucascostamartins@live.com', 'Rua Doutor Diniz, 907', '', 'Centro', 'Juazeiro do Norte'),
(34, 'Rebecca Castro', '(88) 9 9327-6970', '', '', 'Rua projetada a, 337', '', 'Bulandeira', 'Barbalha'),
(35, 'Isahc', '(88) 9 9918-9208', '(88) 9 9985-1492', '', 'S/N', '', 'Bulandeira', 'Barbalha'),
(36, 'Paulo Henrique', '(88) 9 9692-1501', '', '', 'Av. Paulo Marques, 365', '', 'Bulandeira', 'Barbalha'),
(37, 'Rafaela', '(88) 9 9620-1418', '', '', '.', '', '.', 'Araripe'),
(38, 'Edson Bezerra', '(88) 9 9233-8480', '', '', 'Av. Costa Cavalcante, 169', '', 'Centro', 'Barbalha'),
(39, 'Cartório P. Cicero', '(88) 3512-5236', '', '', 'Rua do Cruzeiro, 432', '', 'Centro', 'Juazeiro do Norte'),
(40, 'Charles', '(88) 9 9911-4867', '', '', '.', '', 'Centro', 'Barbalha'),
(41, 'Lúcia Maria da Silva', '(88) 9 9645-1409', '', '', 'Rua Juca Sampaio, 1398', '', 'Bela Vista', 'Barbalha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `text_problema` text COLLATE utf8_swedish_ci,
  `text_suporte` text COLLATE utf8_swedish_ci,
  `valor` double NOT NULL,
  `valor_view` text COLLATE utf8_swedish_ci NOT NULL,
  `data` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `id_cliente`, `text_problema`, `text_suporte`, `valor`, `valor_view`, `data`, `status`) VALUES
(1, 1, 'Sem impressão na impressora principal.', 'Troca de uns cabos e algumas portas no switch.\r\nSuspeita-se que o switch esteja com problemas. ', 30, 'R$ 30,00', '2016-12-06', 0),
(2, 2, 'Dispositivo sem ligar e apresentando sinais de queda.', 'O dispositivo foi encaminhado há terceiros para solucionar o problema. (Data da OS não está correta)\r\n\r\nCusto do serviço (Saniel): 80,00\r\nPago: 100,00', 120, 'R$ 120,00', '2016-12-11', 0),
(3, 3, 'Computador (Desktop) sem ligar.', 'Sem nenhum problema, provavelmente não estava sendo colocado corretamente!\r\nApresenta poucos sinais de sujeira.', 45, 'R$ 45,00', '2016-12-12', 0),
(4, 4, 'Impressora HP 3050, mal instalada no notebook acer e só está funcionando a digitalização.', 'Realizado a conexão da impressora na rede, e instalado o drive de reconhecimento da impressora', 20, 'R$ 20,00', '2016-12-13', 0),
(5, 5, 'Placa mãe e processador queimados.', 'Venda de uma placa mãe socket 1155 e formatação win 10.\r\nManutenção de um estabilizador.\r\n\r\nPeças no cliente: Fonte real (preta);', 250, 'R$ 250,00', '2016-12-14', 2),
(6, 1, 'Computador da marcação fazendo barulho estranho ao conectar na tomada. Provavelmente está com problemas na fonte.', '', 30, 'R$ 30,00', '2016-12-14', 0),
(7, 6, 'Computador deu um pipoco, e configuração do roteador.\r\nMais limpeza fisica.\r\nComputador levado para eletronica.\r\nFoi diagnosticado que o chipset está com solda fria. Saniel cobrou 80,00 reais', 'Compra de outra fonte - 60,00 (Já está pago)', 40, 'R$ 40,00', '2016-12-15', 0),
(8, 7, 'Computador não liga devido a umas instabilidades na energia.', 'Limpeza física + Reparação do cooler', 70, 'R$ 70,00', '2016-12-15', 0),
(9, 1, 'Manutenção preventiva dos computadores.', 'Atividades realizadas: Limpeza lógica (analise do antivírus, limpeza de disco, desfragmentação do disco), limpeza física.\r\n\r\nComputador		Servico	valor\r\nServidor			LF		40\r\nAdministração	2 L		60\r\nRecepção 1		2 L		60\r\nRecepção 2		2 L		60\r\nMarcação 2		2 L		60\r\nEco 1			2 L		60\r\nEco 2			2 L		60\r\nErgo			2 L		60\r\nEsteira (N)		LL	\r\nEletro			2 L		60\r\nCons. 1		\r\nCons. 2 (N)		LL	\r\nCons. 3			LL		20\r\nCons. 4 (N)		\r\nCons. 5 (N)		LL	\r\n		\r\nTotal					540\r\n', 540, 'R$ 540,00', '2016-12-17', 0),
(11, 9, 'Travamentos e mensagem de erro na inicialização do dispositivo.', 'Dispositivo entregue, desistência do cliente.', 0, 'R$ 0,00', '2016-12-23', 0),
(12, 10, 'Notebook reiniciou e apagou todos os arquivos', 'Windows tava criando User TEMP quando inciava, nao tava reconhecendo usuário dele. Foi feito a restauração do SO', 30, 'R$ 30,00', '2016-12-23', 2),
(13, 11, 'Notebook travando', 'Realizacao de testes', 40, 'R$ 40,00', '2016-12-23', 2),
(14, 12, 'Instalar roteador', 'instalação normal, comprado 1 cabo de internet para o cliente no valor de 4,00.\r\n\r\nServiço paco com uma divida de pai.', 70, 'R$ 70,00', '2016-12-24', 0),
(15, 1, 'Necessitando de um pc novo para o mapa!', 'Venda de um core i3.', 650, 'R$ 650,00', '2016-12-27', 0),
(16, 13, 'Computador muito lento, fazer teste de hd.\r\nComputador devolvido.', '', 60, 'R$ 60,00', '2016-12-30', 0),
(17, 1, 'Formatar e configurar os computadores novos.\r\nFormatar e configurar os computadores substituídos pelos novos.', '4 formatações = 240,00\r\n3 visitas = 90,00', 330, 'R$ 330,00', '2017-01-05', 0),
(18, 14, 'Não estava recebendo ligações e sem whats.', 'O celular foi restaurado.\r\n\r\nComo figurações da cliente\r\n--- Google\r\nlogin: inestaniacallou@gmail.com\r\nsenha: 954953dezembro\r\n\r\n--- Facebook\r\nlogin: taniacallou@bol.com.br\r\nsenha: dezembro', 20, 'R$ 20,00', '2017-01-09', 0),
(19, 14, 'Computador lento e com problemas para ligar', 'Constatamos que o HD se encontra em péssimo estado. Necessitando e uma nova peça.', 200, 'R$ 200,00', '2017-01-11', 0),
(20, 8, 'Problemas em algumas teclas (Letras + setas).\r\nNotebook preto + carregador', 'Retirada de teclado e limpeza do mesmo.', 50, 'R$ 50,00', '2017-01-16', 0),
(21, 1, 'Computadores travando em algum momentos.', 'Nada constatado, configurado as opções de energia para melhor desempenho.', 0, 'R$ 0,00', '2017-01-18', 0),
(57, 8, 'Defeito na placa mãe\r\nDispositivo Dell da Iknet', 'Entregue para Saniel.', 0, 'R$ ', '2017-06-19', 1),
(23, 1, 'Colocar os computadores da recepção diretamente no cabo.', 'Detalhes do serviço\r\nUm switch: R$ 60,00\r\n8 m de cabo: R$ 8,00\r\nVisita: R$ 30,00', 100, 'R$ 100,00', '2017-01-30', 0),
(24, 20, 'Caiu água com shampoo em cima do teclado do note ocasionando toda a paralisação do mesmo.\r\n\r\nDona do aparelho: Jessica Freitas (irmã)', 'Limpeza de todos os componentes internos e troca da pasta térmica.\r\nSugerido a troca do teclado, o dispositivo foi devolvido ao cliente enquanto aguarda a nova peça chegar.', 150, 'R$ 150,00', '2017-02-16', 0),
(25, 18, '', 'Pagamento trimestral referente a manutenção do site. (Meses Dez, Jan, Fev)\r\n\r\nInformações:\r\nPainel:\r\nURL - http://abecedaeducacaoambiental.com.br/painel/login.php\r\nLogin - abecedaeducacaoambiental                        \r\nSenha - w1b&KM!5\r\n\r\nEmail:\r\nURL - https://webmail.umbler.com/\r\nLogin - ong.aea@abecedaeducacaoambiental.com.br\r\nSenha - 1234@Mudar', 0, 'R$ 90,00', '2017-02-27', 0),
(26, 18, 'Notebook com problemas para ligar.', 'Identificado que o problema se encontrava na memória e no HD, o cliente adquiriu as peças e foi feita a devida troca.', 70, 'R$ 70,00', '2017-02-27', 0),
(27, 1, 'Computadores lentos', 'Computador do consultório da esteira foi levado ao laboratório.', 0, 'R$ 0,00', '2017-03-06', 0),
(28, 21, 'Mouse Bluetooth sem funcionar', '', 0, 'R$ 0,00', '2017-03-07', 0),
(29, 21, 'Computador da procuradoria, localizado na prefeitura de Barbalha. Está pedindo para ativar o word', '', 0, 'R$ 0,00', '2017-03-07', 0),
(30, 22, 'Visita para amanha as 13:00 ou 14:00\r\n\r\nCompra de um computador novo, terá que instalar programas, conectar impressora, entre outros.\r\n\r\nValor a ser acertado com Carlos Porto (Iknet)', 'Backup do antigo computador, instalação dos programas principais.\r\n\r\nTeam Viewer: 728 051 211\r\nOutro computador: 886 840 281\r\nSenha: 192168@team', 60, 'R$ 60,00', '2017-03-07', 0),
(31, 24, 'Amplificar o sinal da internet', 'Serviço não realizado', 0, 'R$ 0,00', '2017-03-10', 0),
(32, 25, 'Sem ligar e eventualmente piando.', 'Limpeza física.', 50, 'R$ 50,00', '2017-03-11', 0),
(33, 26, 'Venda do pc i7, 8gb, 1tb, fonte real', '026630 - sata DVD, cabo da fonte;\r\n026631 - fonte;\r\n026629 - gabinete\r\n026627 - \r\n\r\nPago - 1000,00', 0, 'R$ 1.500,00', '2017-03-11', 0),
(34, 1, 'Computador do cliente lento!', 'Venda do nosso computador Celeron Dual core - 2gb', 400, 'R$ 400,00', '2017-03-18', 0),
(35, 27, 'Lento', 'Problemas no HD, foi feito:\r\n- Uma análise no HD;\r\n- Uma formatação geral no disco;\r\n- A instalação do Windows 10 com os programas;\r\n- E uma atualização do SO pelo windows update.', 60, 'R$ 60,00', '2017-03-20', 0),
(61, 41, 'Perda da senha do Facebook', 'Login: luciamaria.silva964514@gmail.com\r\nSenha: 8146Lucia7777', 0, 'R$ 0,00', '2017-07-05', 0),
(48, 8, 'Três notebooks com problema ainda desconhecidos. Só foi entregue dois carregadores.', 'Dell e Acer, consertados.\r\nPositivo não tem mais conserto.', 200, 'R$ 200,00', '2017-05-25', 0),
(39, 23, 'Configuração de rede no dois computadores', '', 25, 'R$ 25,00', '2017-03-30', 0),
(40, 1, 'Problemas no CentralX', 'Atualização do Windows, reinstalação do conector MySQL e do programa do CentralX', 0, 'R$ 0,00', '2017-04-05', 0),
(41, 30, '', 'Limpeza lógica.', 0, 'R$ 0,00', '2017-04-05', 0),
(42, 31, 'Computador extremamente lento, testa o HD.', 'HD comprometido, necessitando da sua troca.\r\nServiço finalizado e entregue. Backup será colocado no novo computador.', 0, 'R$ 100,00', '2017-04-12', 0),
(43, 32, '', 'Troca da tela do Galaxy Win 2', 0, 'R$ 200,00', '2017-04-01', 0),
(44, 22, '', 'Instalação e configuração de um novo computador.', 0, 'R$ 60,00', '2017-04-18', 0),
(45, 5, 'Problemas ao ligar', 'Instalação de um HD SSD.\r\n\r\nPago: 35,00', 0, 'R$ 50,00', '2017-05-03', 2),
(46, 33, 'Esqueceu a senha principal do Windows', '', 10, 'R$ 10,00', '2017-05-09', 0),
(47, 34, '', 'Venda de um Notebook Lenovo g400s\r\n3 meses de garantia', 0, 'R$ 1.000,00', '2017-05-18', 0),
(55, 31, 'Perda dos arquivos', '1 ano de manutenção gratuita', 0, 'R$ 0,00', '2017-06-11', 0),
(56, 18, 'Manutenção no desktop e encontrar possíveis problemas.', '', 0, 'R$ ', '2017-06-16', 1),
(50, 35, 'Computador lento', 'Troca de HD, limpeza interna e externa, formatação.\r\nPode apresentar problemas no WiFi futuramente.', 200, 'R$ 200,00', '2017-05-25', 0),
(51, 36, '', '', 60, 'R$ 60,00', '2017-06-05', 0),
(52, 10, 'Sem os programas', 'Instalação do pacote base, mais o mozilla e o nF-e.', 40, 'R$ 40,00', '2017-06-05', 2),
(53, 37, 'Problemas na placa mãe.\r\nReparo feito em Samuel', 'Windows Starter\r\nSerial: PVK8B-RYKPH-P8F8R-7BWHV-H8JYD', 90, 'R$ 90,00', '2017-06-06', 0),
(54, 38, 'Tecla "A" quebrada.', 'Windows 7 Home Basic\r\nSerial: 8XWX7-B4BKY-T79TJ-86T88-V34FP', 0, 'R$ 60,00', '2017-06-06', 0),
(58, 18, '', 'Pagamento trimestral referente a manutenção do site. (Meses Mar, Abr, Mai)', 90, 'R$ 90,00', '2017-06-20', 0),
(59, 39, '', '', 70, 'R$ 70,00', '2017-06-20', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_servico`
--

CREATE TABLE IF NOT EXISTS `os_servico` (
  `id_os` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `os_servico`
--

INSERT INTO `os_servico` (`id_os`, `id_servico`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(5, 8),
(6, 4),
(7, 4),
(8, 4),
(9, 2),
(9, 4),
(11, 2),
(11, 4),
(12, 5),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 1),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(23, 4),
(23, 10),
(24, 4),
(24, 5),
(25, 11),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 10),
(32, 2),
(33, 8),
(34, 8),
(35, 1),
(39, 10),
(40, 4),
(41, 2),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 10),
(48, 4),
(50, 1),
(50, 2),
(50, 4),
(51, 1),
(52, 4),
(53, 4),
(54, 1),
(55, 4),
(56, 4),
(57, 4),
(58, 11),
(59, 1),
(59, 3),
(61, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`) VALUES
(1, 'Formatação'),
(2, 'Limpeza'),
(3, 'Backup'),
(4, 'Manutenção'),
(5, 'Restauração'),
(9, 'Compra'),
(8, 'Venda'),
(10, 'Rede'),
(11, 'Site');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `login`, `senha`) VALUES
(1, 'joaoeymard', 'e53663e39a609cd04ce622041cad23c0'),
(2, 'charles019', '3a84db0c69b741c2eb0116fd0ddbab05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os_servico`
--
ALTER TABLE `os_servico`
  ADD PRIMARY KEY (`id_os`,`id_servico`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
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
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
