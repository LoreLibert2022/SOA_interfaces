CREATE TABLE documentacion (
id_documentacion int AUTO_INCREMENT,
descripcion VARCHAR(50),
PRIMARY KEY (id_documentacion)
);
INSERT INTO documentacion (descripcion) VALUES("DNI");
INSERT INTO documentacion (descripcion) VALUES("Compromiso");
INSERT INTO documentacion (descripcion) VALUES("Certificado vacunación");
INSERT INTO documentacion (descripcion) VALUES("Certificado delitos sexuales");
INSERT INTO documentacion (descripcion) VALUES("Autorización imagen");
INSERT INTO documentacion (descripcion) VALUES("Autorización menor");
INSERT INTO documentacion (descripcion) VALUES("Otros documentos");
INSERT INTO documentacion (descripcion) VALUES("Autorización Certificado delitos sexuales menor");
INSERT INTO documentacion (descripcion) VALUES("Foto libro de familia");
INSERT INTO documentacion (descripcion) VALUES("DNI padre");

CREATE TABLE documentacion_por_voluntario (
id_voluntario INT,
id_documentacion INT,
PRIMARY KEY (id_voluntario, id_documentacion),
CONSTRAINT FK_doc_vol_voluntario FOREIGN KEY(id_voluntario) REFERENCES voluntarios(id_voluntario),
CONSTRAINT FK_doc_vol_documentacion FOREIGN KEY  (id_documentacion) REFERENCES documentacion(id_documentacion)
);

INSERT INTO documentacion_por_voluntario  VALUES(1,1);
INSERT INTO documentacion_por_voluntario  VALUES(1,2);
INSERT INTO documentacion_por_voluntario  VALUES(2,1);
INSERT INTO documentacion_por_voluntario  VALUES(2,2);

