CREATE TABLE Matricula (
    id_asignatura int(5) unsigned NOT NULL, 
    id_estudiante int(5) unsigned NOT NULL,
    nota_final float(5) unsigned NOT NULL,
    PRIMARY KEY (id_asignatura, id_estudiante),
    FOREIGN KEY (id_asignatura) REFERENCES Asignatura (id_asignatura),
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante (id_estudiante)
);
INSERT INTO  Matricula VALUES(
    2,
    1, 
    4.98
);
INSERT INTO Matricula VALUES(
    1,
    1,
    10
);









