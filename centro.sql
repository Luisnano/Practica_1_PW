CREATE TABLE centro (
    id_centro int(5) unsigned NOT NULL auto_increment,
    nombre_centro varchar(50) NOT NULL,
    localidad varchar(50) NOT NULL,
    PRIMARY KEY (id_centro)
);

INSERT INTO centro VALUES(
    1, 
    'Escuela Superior de Ingeniería',
    'Puerto Real'
);
INSERT INTO centro VALUES(
    2, 
    'Facultad de Derecho',
    'Jerez de la Frontera'
);
INSERT INTO centro VALUES(
    3, 
    'Facultad de Medicina',
    'Cádiz'
);
INSERT INTO centro VALUES(
    4, 
    'Escuela de Arte',
    'Jerez de La Frontera'
);
INSERT INTO centro VALUES(
    5, 
    'CASEM',
    'Puerto Real'
);
