CREATE TABLE conta (
 	id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) NOT NULL UNIQUE,
    senha varchar(50) NOT NULL,
    nome varchar(50) NOT NULL,
    usuario varchar(50) NOT NULL,
    total int DEFAULT 0,
    unico int DEFAULT 0,
    badge1 varchar(50),
    badge2 varchar(50),
    badge3 varchar(50),
    badge4 varchar(50),
    badge5 varchar(50),
    badge6 varchar(50),
    badge7 varchar(50),
    badge8 varchar(50),
    badge9 varchar(50),
    badge10 varchar(50)
);

CREATE TABLE cervejaria (
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    cidade varchar(50) NOT NULL,
    estado varchar(50) NOT NULL,
    pais varchar(50) NOT NULL,
    avaliacao double DEFAULT 0,
    tipo ENUM ('macro', 'micro', 'artesanal')
);

CREATE TABLE cerveja (
	id int PRIMARY KEY AUTO_INCREMENT,
    idCervejaria int,
    nome varchar(50) NOT NULL,
    teor double NOT NULL,
    tipo ENUM ('pilsen', 'lager', 'stout'),
    avaliacao double DEFAULT 0,
    FOREIGN KEY (idCervejaria) REFERENCES cervejaria(id) ON DELETE CASCADE
);

CREATE TABLE amizade (
	id1 int,
    id2 int,
    FOREIGN KEY (id1) REFERENCES conta(id) ON DELETE CASCADE,
    FOREIGN KEY (id2) REFERENCES conta(id) ON DELETE CASCADE,
    PRIMARY KEY (id1, id2)
);

CREATE TABLE checkin (
	id int AUTO_INCREMENT,
    idCerveja int NOT NULL,
    idConta int,
    nomeCerveja varchar(50),
    nomeCervejaria varchar(50),
    nomeUsuario varchar(50),
    avaliacao int DEFAULT 0,
    FOREIGN KEY (idCerveja) REFERENCES cerveja(id) ON DELETE CASCADE,
    FOREIGN KEY (idConta) REFERENCES conta(id) ON DELETE CASCADE,
    PRIMARY KEY (id, idConta)
);

CREATE TABLE comentario (
	id int AUTO_INCREMENT,
    idCheckin int,
    idConta int,
    texto varchar(100),
    FOREIGN KEY (idCheckin, idConta) REFERENCES checkin(id, idConta) ON DELETE CASCADE,
    PRIMARY KEY (id, idCheckin, idConta)
);
