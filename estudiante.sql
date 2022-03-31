CREATE TABLE Estudiante (
    id_estudiante int(5) unsigned NOT NULL auto_increment, 
    user_alum varchar(50) NOT NULL,
    nombre_estudiante varchar(50) ,
    apellido_estudiante varchar(50),
    contraseña_estudiante varchar(255) NOT NULL,
    PRIMARY KEY (id_estudiante)
);
INSERT INTO Estudiante VALUES(
    1,
    'raularcos',
    'Raul', 
    'Arcos Herrera',
    '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'
);
INSERT INTO Estudiante VALUES(
    2,
    'antonioroldan',
    'Antonio', 
    'Roldan Andrade',
    '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'
);