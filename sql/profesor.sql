CREATE TABLE Profesor (
    id_profesor int(5) unsigned NOT NULL auto_increment,
    user_prof varchar(50) NOT NULL,
    id_asignatura int(5) unsigned NOT NULL, 
    es_coordinador bit NOT NULL,
    nombre_profesor varchar(50) NOT NULL,
    contraseña_profesor varchar(250) NOT NULL,
    PRIMARY KEY (id_profesor)
);
INSERT INTO Profesor VALUES(
    1,
    'joseantoniodelahuerta',
    2, 
    1,
    'Jose Alonso de La Huerta',
    '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'
);
INSERT INTO Profesor VALUES(
    2,
    'eneas',
    1, 
    1,
    'Eneas Sanchez DonPerignon',
    '$2y$10$mRXRfxSUyzGGcZf30JL0WOE2bvYja1nYR88dux3jM5GDwET8b0spy'
);
