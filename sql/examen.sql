CREATE TABLE Examen (
    id_examen int(5) unsigned NOT NULL auto_increment,
    id_alumno int(5) unsigned NOT NULL, 
    id_asignatura int(5) unsigned NOT NULL,
    id_preguntas varchar(200) NOT NULL, 
    nota_examen int(5),
    PRIMARY KEY (id_examen),
    FOREIGN KEY (id_alumno) REFERENCES estudiante (id_estudiante),
    FOREIGN KEY (id_asignatura) REFERENCES Asignatura (id_asignatura)
);

INSERT INTO Examen VALUES (
    1,
    1,
    (1, 2),
    5
);