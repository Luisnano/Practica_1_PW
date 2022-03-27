CREATE TABLE Asig_Prof (
    id_asignatura int(5), 
    id_profesor int(5),
    PRIMARY KEY (id_asignatura, id_profesor),
    FOREIGN KEY id_asignatura REFERENCES Asignatura (id_asignatura),
    FOREIGN KEY id_profesor REFERENCES Profesor (id_profesor)
);
INSERT INTO  Asig_Prof VALUES(
    2,
    1
);
INSERT INTO Asig_Prof VALUES(
    1,
    2
);