/* Modelo físico - BLOG */

CREATE TABLE Usuarios (
    IdUsuario INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Usuario varchar(255),
    Email varchar(255),
    Senha varchar(255)
);

CREATE TABLE Posts (
    IdPost INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IdUsuario INTEGER(11),
    IdCategoria INTEGER(11),
    Titulo varchar(255),
    Conteudo varchar(255)
);

CREATE TABLE Categoria (
    IdCategoria INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nome varchar(255)
);

CREATE TABLE PalavraChave (
    IdChave INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Chave varchar(255)
);

CREATE TABLE Visualizacoes (
    IdPost INTEGER(11),
    Quantidade INTEGER(11)
);

CREATE TABLE Comentario (
    IdComentario INTEGER(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    IdUsuario INTEGER(11),
    Comentario varchar(255)
);

CREATE TABLE PalavrasChavePorPost (
    IdChave INTEGER(11),
    IdPost INTEGER(11)
);

CREATE TABLE ComentariosPorPost (
    IdPost INTEGER(11),
    IdComentario INTEGER(11)
);
 
ALTER TABLE Posts ADD CONSTRAINT FK_Posts_1
    FOREIGN KEY (IdUsuario)
    REFERENCES Usuarios (IdUsuario)
    ON DELETE RESTRICT;
 
 ALTER TABLE Posts ADD CONSTRAINT FK_Posts_2
    FOREIGN KEY (IdCategoria)
    REFERENCES Categoria (IdCategoria)
    ON DELETE RESTRICT;
	
ALTER TABLE Visualizacoes ADD CONSTRAINT FK_Visualizacoes_1
    FOREIGN KEY (IdPost)
    REFERENCES Posts (IdPost)
    ON DELETE RESTRICT;
	
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_1
    FOREIGN KEY (IdUsuario)
    REFERENCES Usuarios (IdUsuario)
    ON DELETE RESTRICT;
 
ALTER TABLE PalavrasChavePorPost ADD CONSTRAINT FK_PalavrasChavePorPost_1
    FOREIGN KEY (IdChave)
    REFERENCES PalavraChave (IdChave)
    ON DELETE RESTRICT;
 
ALTER TABLE PalavrasChavePorPost ADD CONSTRAINT FK_PalavrasChavePorPost_2
    FOREIGN KEY (IdPost)
    REFERENCES Posts (IdPost)
    ON DELETE RESTRICT;
 
ALTER TABLE ComentariosPorPost ADD CONSTRAINT FK_ComentariosPorPost_1
    FOREIGN KEY (IdPost)
    REFERENCES Posts (IdPost)
    ON DELETE RESTRICT;
 
ALTER TABLE ComentariosPorPost ADD CONSTRAINT FK_ComentariosPorPost_2
    FOREIGN KEY (IdComentario)
    REFERENCES Comentario (IdComentario)
    ON DELETE SET NULL;