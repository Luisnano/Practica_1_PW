CREATE TABLE Grado (
    id_grado int(5) unsigned NOT NULL auto_increment,
    id_centro int(5), 
    nombre_grado varchar(50) NOT NULL,
    PRIMARY KEY (id_centro),
    FOREIGN KEY (id_centro) REFERENCES Centro (id_centro)
);
INSERT INTO Grado VALUES(
    1,
    1, 
    'Grado de Ingeniería Informática'
);
INSERT INTO Grado VALUES(
    2,
    1, 
    'Grado en Mecánica'
);
INSERT INTO Grado VALUES(
    3, 
    2,
    'Grado en Administracion y Direccion de Empresas'
);
INSERT INTO Grado VALUES(
    4, 
    2, 
    'Grado en Derecho'
);
INSERT INTO Grado VALUES(
    5, 
    3,
    'Grado en Medicina'
);
INSERT INTO Grado VALUES(
    6, 
    4,
    'Grado en Paro'
);
INSERT INTO Grado VALUES(
    7, 
    5,
    'Grado en Ciencias Medioambientales'
);

