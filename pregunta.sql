CREATE TABLE Pregunta (
    id_pregunta int(5) unsigned NOT NULL auto_increment, 
    id_asignatura int(5),
    texto_pregunta varchar(200) NOT NULL,
    r1 varchar(200) NOT NULL,
    r2 varchar(200) NOT NULL,
    r3 varchar(200) NOT NULL,
    r4 varchar(200) NOT NULL,
    correcta int(1),
    tema varchar(50),
    PRIMARY KEY (id_pregunta),
    FOREIGN KEY id_asignatura REFERENCES Asignatura (id_asignatura)
);
INSERT INTO Pregunta VALUES(
    1,
    2, 
    '¿Cuantos nodos tiene un arbol binario?',
    '1',
    '2',
    '3',
    '4',
    2,
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
    3,
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
    1,
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
    3,
    'Computer'
);
