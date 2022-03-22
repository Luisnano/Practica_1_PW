CREATE TABLE Profesor (
    id_asignatura int(5), 
    id_profesor int(5),
    PRIMARY KEY (id_asignatura, id_profesor)
);
INSERT INTO Profesor VALUES(
    2,
    1
);
INSERT INTO Profesor VALUES(
    1,
    2
);