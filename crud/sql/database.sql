USE nefli;

CREATE TABLE  peliculas (
    id int(11) NOT NULL auto_increment,
    titulo varchar(100) NOT NULL,
    director VARCHAR(100) NOT NULL,
    fecha INT(4) NOT NULL,
    duracion VARCHAR(20) NOT NULL,
    poster VARCHAR(255) NOT NULL,
    PRIMARY KEY  (id)
);