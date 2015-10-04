CREATE TABLE IF NOT EXISTS `sesion` (
  `sesion_id` varchar(40) NOT NULL DEFAULT '0',
  `sesion_ip` varchar(16) NOT NULL DEFAULT '0',
  `sesion_so` varchar(50) NOT NULL,
  `sesion_ultima_entrada` int(10) unsigned NOT NULL DEFAULT '0',
  `sesion_usuario_id` int(11) NOT NULL,
  `sesion_alias` varchar(255) NOT NULL,
  `sesion_nivel` int(11) NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`sesion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `proyectos` (
	`id` int(255) unsigned NOT NULL AUTO_INCREMENT,
	`nombre` varchar(255) NOT NULL,
	`alias` varchar(255) NOT NULL,
	`publicado` int(1) NOT NULL DEFAULT '0',
	`fecha` varchar(22) NOT NULL DEFAULT '0',
	`autor` tinyint(1) NOT NULL,
	`tags` mediumtext NOT NULL,
	`archivos` varchar(255) NOT NULL DEFAULT '0',
	`texto` mediumtext NOT NULL,
	  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `proyectos` (`id`, `nombre`, `alias`, `publicado`, `fecha`, `autor`, `tags`, `archivos`, `texto`) VALUES
('1', 'Foto Amsterdam', 'foto-amsterdam', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-amsterdam.jpg', 'Foto Amsterdam'),
('2', 'Foto Barceloneta', 'foto-barceloneta', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-barceloneta.jpg', 'Foto Barceloneta'),
('3', 'Foto Bilbao', 'foto-bilbao', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-bilbao-01.jpg,foto-bilbao-02.jpg', 'Foto Bilbao'),
('4', 'Foto Tetera', 'foto-tetera', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-tetera.jpg', 'Foto Tetera'),
('5', 'Foto Caixa', 'foto-caixa', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-caixa.jpg', 'Foto Caixa'),
('6', 'Foto Candau', 'foto-candau', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-candau.jpg', 'Foto Candau'),
('7', 'Foto Chups', 'foto-chups', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-chups.jpg', 'Foto Chups'),
('8', 'Foto Cotxe', 'foto-cotxe', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-cotxe.jpg', 'Foto Cotxe'),
('9', 'Foto Fulla', 'foto-fulla', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-fulla.jpg', 'Foto Fulla'),
('10', 'Foto Mar', 'foto-mar', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-mar.jpg', 'Foto Mar'),
('11', 'Foto Mate', 'foto-mate', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-mate.jpg', 'Foto Mate'),
('12', 'Foto Metro', 'foto-metro', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-metro.jpg', 'Foto Metro'),
('13', 'Foto Nanufar', 'foto-nanufar', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-nanufar.jpg', 'Foto Nanufar'),
('14', 'Foto Narbonne', 'foto-narbonne', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-narbonne.jpg', 'Foto Narbonne'),
('15', 'Foto Oficina', 'foto-oficina', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-oficina.jpg', 'Foto Oficina'),
('16', 'Foto Planta', 'foto-planta', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-planta.jpg', 'Foto Planta'),
('17', 'Foto Poblenou', 'foto-poblenou', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-poblenou.jpg', 'Foto Poblenou'),
('18', 'Foto Port', 'foto-port', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-port.jpg', 'Foto Port'),
('19', 'Foto Praha', 'foto-praha', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-praha.jpg', 'Foto Praha'),
('20', 'Foto Reial', 'foto-reial', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-reial.jpg', 'Foto Reial'),
('21', 'Foto Roma 01', 'foto-roma-01', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-roma-01.jpg', 'Foto Roma 01'),
('22', 'Foto Roma', 'foto-roma', '1', '01/08/2013 00:00:00', '1', 'fotografia', 'foto-roma.jpg,foto-roma-02.jpg', 'Foto Roma'),
('23', 'Packaging Actimel', 'actimel-01', '1', '01/08/2013 00:00:00', '1', 'productos,blister-pack,packaging', 'actimel-01.jpg,actimel-02.jpg,actimel-03.jpg', 'Packaging para Dannone Actimel'),   	
('24', 'Etiqueta Alohanatura', 'alohanatura-01', '1', '01/08/2013 00:00:00', '1', 'productos,packaging,etiqueta', 'alohanatura-01.jpg', 'Packaging y etiqueta para Alohanatura'),
('25', 'Expositor Alohanatura', 'alohanatura-02', '1', '01/08/2013 00:00:00', '1', 'productos,expositor,etiqueta', 'alohanatura-02.jpg', 'Expositor y etiquetado de Alohanatura'),    	
('26', 'Bacardi gorra', 'bacardi-01', '1', '01/08/2013 00:00:00', '1', 'productos,merchandising,gorra', 'bacardi-01.jpg', 'Diseño de gorra para Bacardi'),
('27', 'Bacardi reloj', 'bacardi-02', '1', '01/08/2013 00:00:00', '1', 'productos,merchandising,reloj', 'bacardi-02.jpg', 'Diseño de reloj para Bacardi');