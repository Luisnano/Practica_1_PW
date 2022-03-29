CREATE TABLE Estudiante (
    id_estudiante int(5) unsigned NOT NULL auto_increment, 
    nombre_estudiante varchar(50) ,
    apellido_estudiante varchar(50),
    contraseña_estudiante varchar(50) NOT NULL,
    PRIMARY KEY (id_estudiante)
);
INSERT INTO Estudiante VALUES(
    1,
    'Raul', 
    'Arcos Herrera'
);
INSERT INTO Estudiante VALUES(
    2,
    'Antonio', 
    'Roldan Andrade'
);