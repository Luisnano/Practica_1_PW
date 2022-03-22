CREATE TABLE Grado (
    id_grado int(5) unsigned NOT NULL auto_increment,
    id_centro int(5), 
    nombre_grado varchar(50) NOT NULL,
    PRIMARY KEY (id_centro)
    FOREIGN KEY (id_centro) REFERENCES Centro (id_centro)

);

