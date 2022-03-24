CREATE TABLE Examen (
    id_examen int(5) unsigned NOT NULL auto_increment,
    id_alumno int(5), 
    id_pregunta varchar(200) NOT NULL, 
    nota_examen int(5),
    PRIMARY KEY (id_examen),
    FOREIGN KEY (id_alumno) REFERENCES Grado (id_alumno)
);

INSERT INTO Examen VALUES (
    1,
    1,
    (1, 2),
    5
);