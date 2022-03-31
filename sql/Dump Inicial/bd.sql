
/*PRIMERO CREAMOS TODAS LAS TABLAS*/

CREATE TABLE Asig_Prof (
    id_asignatura int(5) unsigned NOT NULL, 
    id_profesor int(5) unsigned NOT NULL,
    PRIMARY KEY (id_asignatura, id_profesor),
    FOREIGN KEY id_asignatura REFERENCES Asignatura (id_asignatura),
    FOREIGN KEY id_profesor REFERENCES Profesor (id_profesor)
);
CREATE TABLE Asignatura (
    id_asignatura int(5) unsigned NOT NULL auto_increment,
    id_grado int(5) unsigned NOT NULL, 
    nombre varchar(50) NOT NULL,
    alumnos_matriculados int(5),
    PRIMARY KEY (id_asignatura),
    FOREIGN KEY (id_grado) REFERENCES Grado (id_grado)
);
CREATE TABLE Centro (
    id_centro int(5) unsigned NOT NULL auto_increment,
    nombre_centro varchar(50) NOT NULL,
    localidad varchar(50) NOT NULL,
    PRIMARY KEY (id_centro)
);
CREATE TABLE Estudiante (
    id_estudiante int(5) unsigned NOT NULL auto_increment, 
    user_alum varchar(50) NOT NULL,
    nombre_estudiante varchar(50) ,
    apellido_estudiante varchar(50),
    contraseña_estudiante varchar(255) NOT NULL,
    PRIMARY KEY (id_estudiante)
);
CREATE TABLE Examen (
    id_examen int(5) unsigned NOT NULL auto_increment,
    id_alumno int(5) unsigned NOT NULL, 
    id_pregunta varchar(200) NOT NULL, 
    nota_examen int(5),
    PRIMARY KEY (id_examen),
    FOREIGN KEY (id_alumno) REFERENCES Grado (id_alumno)
);
CREATE TABLE Grado (
    id_grado int(5) unsigned NOT NULL auto_increment,
    id_centro int(5) unsigned NOT NULL, 
    nombre_grado varchar(50) NOT NULL,
    PRIMARY KEY (id_grado),
    FOREIGN KEY (id_centro) REFERENCES Centro (id_centro)
);
CREATE TABLE Matricula (
    id_asignatura int(5) unsigned NOT NULL, 
    id_estudiante int(5) unsigned NOT NULL,
    nota_final float(5) unsigned NOT NULL,
    PRIMARY KEY (id_asignatura, id_estudiante),
    FOREIGN KEY id_asignatura REFERENCES Asignatura (id_asignatura),
    FOREIGN KEY id_estudiante REFERENCES Estudiante (id_estudiante)
);
CREATE TABLE Pregunta (
    id_pregunta int(5) unsigned NOT NULL auto_increment, 
    id_asignatura int(5) unsigned NOT NULL,
    texto_pregunta varchar(200) NOT NULL,
    r1 varchar(200) NOT NULL,
    r2 varchar(200) NOT NULL,
    r3 varchar(200) NOT NULL,
    r4 varchar(200) NOT NULL,
    correcta varchar(5) NOT NULL,
    tema varchar(50) NOT NULL,
    PRIMARY KEY (id_pregunta),
    FOREIGN KEY id_asignatura REFERENCES Asignatura (id_asignatura)
);
CREATE TABLE Profesor (
    id_profesor int(5) unsigned NOT NULL auto_increment,
    user_prof varchar(50) NOT NULL,
    id_asignatura int(5) unsigned NOT NULL, 
    es_coordinador bit NOT NULL,
    nombre_profesor varchar(50) NOT NULL,
    contraseña_profesor varchar(250) NOT NULL,
    PRIMARY KEY (id_profesor)
);

/*AHORA METEMOS TODOS LOS VALORES QUE QUEREMOS EN ELLAS*/

INSERT INTO  Asig_Prof VALUES(
    2,
    1
);
INSERT INTO Asig_Prof VALUES(
    1,
    2
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

INSERT INTO Centro VALUES(
    1, 
    'Escuela Superior de Ingeniería',
    'Puerto Real'
);
INSERT INTO Centro VALUES(
    2, 
    'Facultad de Derecho',
    'Jerez de la Frontera'
);
INSERT INTO Centro VALUES(
    3, 
    'Facultad de Medicina',
    'Cádiz'
);
INSERT INTO Centro VALUES(
    4, 
    'Escuela de Arte',
    'Jerez de La Frontera'
);
INSERT INTO Centro VALUES(
    5, 
    'CASEM',
    'Puerto Real'
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

INSERT INTO Examen VALUES (
    1,
    1,
    (1, 2),
    5
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

INSERT INTO Pregunta VALUES(
    1,
    2, 
    '¿Cuantos nodos tiene un arbol binario?',
    '1',
    '2',
    '3',
    '4',
    '2',
    'Arboles'
);
INSERT INTO Pregunta VALUES(
    2,
    2, 
    '¿Cuantos nodos tiene un arbol general?',
    '1',
    '2',
    'Unos cuantos xDDDDDD',
    '4',
    'Unos cuantos xDDDDDD',
    'Arboles'
);
INSERT INTO Pregunta VALUES(
    3,
    1, 
    '¿Is this a computer?',
    'yes',
    'no',
    'maybe',
    'lol',
    'yes',
    'Computer'
);
INSERT INTO Pregunta VALUES(
    4,
    1, 
    '¿How is a computer?',
    'fine',
    'what?',
    '4',
    'bababoye',
    '4',
    'Computer'
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

