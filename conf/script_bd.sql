CREATE SCHEMA `estudio` ;

CREATE TABLE `estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `dataFundacao` date DEFAULT NULL,
  `faturamentoAnual` BIGINT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `ator` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(45) DEFAULT NULL,
    `sexo` varchar(45) DEFAULT NULL,
    `nacionalidade` varchar(45) DEFAULT NULL,
    `nomeartistico` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE `endereco` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `pais` varchar(45) DEFAULT NULL,
    `estado` varchar(45) DEFAULT NULL,
    `cidade` varchar(45) DEFAULT NULL,
    `id_estudio` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    foreign key (`id_estudio`) references estudio(`id`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE `filme` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(45) DEFAULT NULL,
    `datalancamento` date DEFAULT NULL,
    `custototal` BIGINT DEFAULT NULL,
    `tempodeproducao` varchar(45) DEFAULT NULL,
    `id_estudio` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    foreign key (`id`) references estudio(`id`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

CREATE TABLE `filmeator` (
    `funcao` varchar(45) DEFAULT NULL,
    `cache` int(11) DEFAULT NULL,
    `nomepersonagem` varchar(45) DEFAULT NULL,
    `id_filme` int(11) NOT NULL,
    `id_ator` int(11) NOT NULL,
    foreign key (`id_filme`) references filme(`id`),
	foreign key (`id_ator`) references ator(`id`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;

INSERT INTO `estudio`.`estudio` (`id`, `nome`, `dataFundacao`, `faturametoAnual`) VALUES ('1', 'Marvel Studios', '1993-12-07', '16000000000');
INSERT INTO `estudio`.`estudio` (`id`, `nome`, `dataFundacao`, `faturametoAnual`) VALUES ('2', 'Walt Disney Studios', '1923-10-16', '55140000000');
INSERT INTO `estudio`.`estudio` (`id`, `nome`, `dataFundacao`, `faturametoAnual`) VALUES ('3', 'Warner Bros Pictures', '1923-04-04', '57910000000');

INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('1', 'Thomas Stanley Holland', 'Masculino', 'Britânico', 'Tom Holland');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('2', 'Zendaya Maree Stoermer Coleman', 'Feminino', 'Norte-americana', 'Zendaya');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('3', 'Christopher Hemsworth', 'Masculino', 'Australiano', 'Chris Hemsworth');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('4', 'Scarlett Ingrid Johansson', 'Feminino', 'Norte-americana', 'Scarlett Johansson');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('5', 'Elizabeth Chase Olsen', 'Feminino', 'Norte-americana', 'Elizabeth Olsen');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('6', 'Chadwick Aaron Boseman', 'Masculino', 'Norte-americano', 'Chadwick Boseman');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('7', 'Keanu Charles Reeves', 'Masculino', 'Canadense', 'Keanu Reeves');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('8', 'John Christopher Depp II', 'Masculino', 'Norte-americano', 'Johnny Depp');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('9', 'Robert Douglas Thomas Pattinson', 'Masculino', 'Britânico', 'Robert Pattinson');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('10', 'Gal Gadot-Varsano', 'Feminino', 'Israelense', 'Gal Gadot');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('11', 'Stephanie Beatriz', 'Feminino', 'Argentina-americana', 'Stephanie Beatriz');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('12', 'John Alberto Leguizamo', 'Masculino', 'Colombiano', 'John Leguizamo');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('13', 'Kristen Anne Bell', 'Feminino', 'Norte-americana', 'Kristen Bell');
INSERT INTO `estudio`.`ator` (`id`, `nome`, `sexo`, `nacionalidade`, `nomeartistico`) VALUES ('14', 'Idina Kim Mentzel', 'Feminino', 'Norte-americana', 'Idina Menzel');

INSERT INTO `estudio`.`endereco` (`id`, `pais`, `estado`, `cidade`, `id_estudio`) VALUES ('1', 'Estados Unidos', 'Califórnia', 'Burbank', '1');
INSERT INTO `estudio`.`endereco` (`id`, `pais`, `estado`, `cidade`, `id_estudio`) VALUES ('2', 'Estados Unidos', 'Califórnia', 'Burbank', '2');
INSERT INTO `estudio`.`endereco` (`id`, `pais`, `estado`, `cidade`, `id_estudio`) VALUES ('3', 'Estados Unidos', 'Califórnia', 'Burbank', '3');

INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('6', '1', 'Ator Principal', '8000000', 'Peter Parker');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('6', '2', 'Ator Principal', '8000000', 'Michelle Jones');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('1', '10', 'Ator Principal', '10000000', 'Diana Prince');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('2', '7', 'Ator Principal', '14000000', 'Neo');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('5', '3', 'Ator Principal', '76000000', 'Thor');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('5', '4', 'Ator Principal', '56000000', 'Viúva Negra');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('5', '5', 'Ator Principal', '3000000', 'Wanda Maximoff');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('5', '6', 'Ator Principal', '50000000', 'Pantera Negra');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('5', '1', 'Ator Principal', '10000000', 'Peter Parker');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('3', '8', 'Ator Coadjuvante', '10000000', 'Gellert Grindelwald');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('4', '9', 'Ator Principal', '3000000', 'Batman');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('7', '11', 'Ator Principal', '8000000', 'Mirabel Madrigal');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('7', '12', 'Ator Principal', '7500000', 'Bruno Madrigal');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('8', '13', 'Ator Principal', '10000000', 'Anna');
INSERT INTO `estudio`.`filmeator` (`filme_id`, `ator_id`, `funcao`, `cache`, `nomepersonagem`) VALUES ('8', '14', 'Ator Principal', '10000000', 'Elsa');
