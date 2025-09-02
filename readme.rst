API DE USUARIOS FEITA COM CODEIGNITER3

rotas:
	POST /usuario/incluir

	GET /usuario/listar

	GET /usuario/1

	PUT /usuario/editar/1

	DELETE /usuario/excluir/1


MySQL:

	DROP TABLE IF EXISTS `usuarios`;

	CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
