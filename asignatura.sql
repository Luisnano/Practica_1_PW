CREATE TABLE Asignatura (
    id_asignatura int(5) unsigned NOT NULL auto_increment,
    id_grado int(5), 
    nombre varchar(50) NOT NULL,
    alumnos_matriculados int(5),
    PRIMARY KEY (id_asignatura),
    FOREIGN KEY (id_grado) REFERENCES Grado (id_grado)
);
INSERT INTO Asignatura VALUES(
    1,
    1, 
    'Ingles para Ingenieros',
    10
);
INSERT INTO Asignatura VALUES(
    2,
    1, 
    'Estructura de Datos No Lineales',
    457
);
INSERT INTO Asignatura VALUES(
    3, 
    2,
    'Como Cobrar el Paro',
    200
);
INSERT INTO Asignatura VALUES(
    4, 
    2, 
    'Tuercas y Tornillos II',
    3682
);
