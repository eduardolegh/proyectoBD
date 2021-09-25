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
FOREIGN KEY (cod_jornada) REFERENCES Jornada(codigo),
FOREIGN KEY (cod_departamento) REFERENCES Departamento(codigo)
);

CREATE TABLE Permiso(
codigo int(11) AUTO_INCREMENT not null,
cod_empleado int(10) NOT  NULL,
fecha date not null,
cod_falta int(10) not null,
PRIMARY KEY (codigo),
FOREIGN KEY (cod_falta) REFERENCES Falta(codigo),
FOREIGN KEY (cod_empleado) REFERENCES Empleado(codigo)
);

create table TipoMarca(
codigo int(10) NOT NULL AUTO_INCREMENT,
nombre CHARACTER(100) NOT NULL,
PRIMARY KEY (codigo));

CREATE TABLE Marca(
  cod_empleado int(10) NOT NULL,
  tipo_marca int(10) NOT NULL,
  fecha date NOT NULL,
  hora time NOT NULL,
  PRIMARY KEY (cod_empleado,tipo_marca,fecha),
  FOREIGN KEY (cod_empleado) REFERENCES Empleado(codigo),
  FOREIGN KEY (tipo_marca) REFERENCES TipoMarca(codigo)
);

INSERT INTO TipoMarca (codigo, nombre) VALUES (NULL, 'Entrada'), (NULL, 'Salida');


