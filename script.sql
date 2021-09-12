CREATE DATABASE ProyectoDB;
use ProyectoDB;
DROP TABLE Marca;
DROP TABLE Permiso;
drop table Falta;
DROP TABLE Empleado;
drop table Departamento;
drop table Jornada;

USE ProyectoDB;


create table Departamento(
codigo int(10) NOT NULL AUTO_INCREMENT,
nombre CHARACTER(100) NOT NULL,
PRIMARY KEY (codigo));


create table Jornada(
codigo int(10) NOT NULL AUTO_INCREMENT,
nombre CHARACTER(100) NOT NULL,
hora_entrada time NOT NULL,
hora_salida time NOT NULL,
PRIMARY KEY (codigo)
    );
    
create TABLE Falta(
codigo int(10) NOT NULL AUTO_INCREMENT,
nombre CHARACTER(100) NOT NULL,
PRIMARY KEY (codigo)
);


create table Empleado (
codigo int(10) NOT NULL AUTO_INCREMENT,
nombre CHARACTER(100) NOT NULL,
cod_jornada int(10) NOT NULL,
cod_departamento int(10) NOT NULL,
PRIMARY KEY (codigo),
FOREIGN KEY (cod_jornada) REFERENCES Jornada(codigo)
);

CREATE TABLE Permiso(
codigo int(11) AUTO_INCREMENT not null,
fecha date not null,
cod_falta int(10) not null,
PRIMARY KEY (codigo),
FOREIGN KEY (cod_falta) REFERENCES Falta(codigo)
);


CREATE TABLE Marca(
  codigo int(11) NOT NULL AUTO_INCREMENT ,
  cod_empleado int(10) NOT NULL,
  tipo_marca CHARACTER(20) NOT NULL,
  fecha date NOT NULL,
  hora time NOT NULL,
  PRIMARY KEY (codigo),
  FOREIGN KEY (cod_empleado) REFERENCES Empleado(codigo)
);

