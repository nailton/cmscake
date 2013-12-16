

DROP TABLE IF EXISTS `cmscake`.`usuarios`;
DROP TABLE IF EXISTS `cmscake`.`paginas`;
DROP TABLE IF EXISTS `cmscake`.`seos`;
DROP TABLE IF EXISTS `cmscake`.`sliders`;


CREATE TABLE `cmscake`.`usuarios` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(250),
	`username` varchar(50),
	`email` varchar(500),
	`password` varchar(60),
	`titulo` text,
	`acessos` int(11),
	`created` datetime,
	`modified` datetime,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cmscake`.`paginas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`menu` varchar(512),
	`corpo` text,
	`title` varchar(512),
	`descricao` text,
	`tags` varchar(512),
	`url` varchar(512),
	`parent_id` int(11),
	`lft` int(11),
	`rght` int(11),
	`created` datetime,
	`modified` datetime,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cmscake`.`seos` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`robots` text,
	`sitemap` text,
	`google_confirm` text,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cmscake`.`sliders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`imagem` varchar(250),
	`titulo` varchar(250),
	`descricao` text,
	`parent_id` int(11),
	`lft` int(11),
	`rght` int(11),
	`pagina_id` int(11),	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=MyISAM;

