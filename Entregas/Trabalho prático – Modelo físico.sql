/* Modelo físico - BLOG */

CREATE TABLE usuarios (
    IdUsuario INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Usuario varchar(255),
    Email varchar(255),
    Senha varchar(255)
);

CREATE TABLE posts (
    IdPost INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IdUsuario INTEGER(11),
    IdCategoria INTEGER(11),
    Titulo varchar(255),
    Conteudo varchar(255)
);

CREATE TABLE categoria (
    IdCategoria INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nome varchar(255)
);

CREATE TABLE palavrachave (
    IdChave INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Chave varchar(255)
);

CREATE TABLE visualizacoes (
    IdPost INTEGER(11),
    Quantidade INTEGER(11)
);

CREATE TABLE comentario (
    IdComentario INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IdUsuario INTEGER(11),
    Comentario varchar(255)
);

CREATE TABLE palavraschaveporpost (
    IdChave INTEGER(11),
    IdPost INTEGER(11)
);

CREATE TABLE comentariosporpost (
    IdPost INTEGER(11),
    IdComentario INTEGER(11)
);
 
ALTER TABLE posts ADD CONSTRAINT FK_Posts_1
    FOREIGN KEY (IdUsuario)
    REFERENCES usuarios (IdUsuario)
    ON DELETE RESTRICT;
 
 ALTER TABLE posts ADD CONSTRAINT FK_Posts_2
    FOREIGN KEY (IdCategoria)
    REFERENCES categoria (IdCategoria)
    ON DELETE RESTRICT;
	
ALTER TABLE visualizacoes ADD CONSTRAINT FK_Visualizacoes_1
    FOREIGN KEY (IdPost)
    REFERENCES posts (IdPost)
    ON DELETE RESTRICT;
	
ALTER TABLE comentario ADD CONSTRAINT FK_Comentario_1
    FOREIGN KEY (IdUsuario)
    REFERENCES usuarios (IdUsuario)
    ON DELETE RESTRICT;
 
ALTER TABLE palavraschaveporpost ADD CONSTRAINT FK_PalavrasChavePorPost_1
    FOREIGN KEY (IdChave)
    REFERENCES palavrachave (IdChave)
    ON DELETE RESTRICT;
 
ALTER TABLE palavraschaveporpost ADD CONSTRAINT FK_PalavrasChavePorPost_2
    FOREIGN KEY (IdPost)
    REFERENCES posts (IdPost)
    ON DELETE RESTRICT;
 
ALTER TABLE comentariosporpost ADD CONSTRAINT FK_ComentariosPorPost_1
    FOREIGN KEY (IdPost)
    REFERENCES posts (IdPost)
    ON DELETE RESTRICT;
 
ALTER TABLE comentariosporpost ADD CONSTRAINT FK_ComentariosPorPost_2
    FOREIGN KEY (IdComentario)
    REFERENCES comentario (IdComentario)
    ON DELETE SET NULL;