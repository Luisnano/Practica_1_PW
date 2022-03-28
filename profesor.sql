<<<<<<< HEAD
CREATE TABLE Profesor (
    id_profesor int(5) unsigned NOT NULL auto_increment,
    id_asignatura int(5) unsigned NOT NULL, 
    es_coordinador bit NOT NULL,
    nombre_profesor varchar(50) NOT NULL,
    PRIMARY KEY (id_profesor),
);
INSERT INTO Profesor VALUES(
    1,
    2, 
    1,
    'Jose Alonso de La Huerta'
);
INSERT INTO Profesor VALUES(
    2,
    1, 
    1,
    'Eneas Sanchez DonPerignon'
);
=======
CREATE TABLE Profesor (
    id_profesor int(5) unsigned NOT NULL auto_increment,
    id_asignatura int(5), 
    es_coordinador bit NOT NULL,
    nombre_profesor varchar(50) NOT NULL,
    PRIMARY KEY (id_profesor),
);
INSERT INTO Profesor VALUES(
    1,
    2, 
    1,
    'Jose Alonso de La Huerta'
);
INSERT INTO Profesor VALUES(
    2,
    1, 
    1,
    'Eneas Sanchez DonPerignon'
);
>>>>>>> main
