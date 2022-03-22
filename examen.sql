CREATE TABLE Examen (
    id_examen int(5) unsigned NOT NULL auto_increment,
    id_alumno int(5), 
    id_pregunta varchar(200) NOT NULL, `ES MULTIEVALUADO ASI QUE REFERENCIA A LAS PREGUNTAS QUE LLEVE`
    nota_examen int(5),
    PRIMARY KEY (id_examen),
    FOREIGN KEY (id_alumno) REFERENCES Grado (id_alumno)

);