CREATE DATABASE mercadona DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE mercadona;

CREATE TABLE users(
    idUser INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT null,
    picture VARCHAR(255) NOT NULL,
    salt varchar(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    nif VARCHAR(9) NOT NULL,
    apellido1 VARCHAR(255) NOT NULL,
    apellido2 VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(12) NOT NULL,
    provincia VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    gasto DECIMAL NOT NULL,
    role VARCHAR(255) NOT NULL
);

create table productos (
    idProducto int AUTO_INCREMENT NOT NULL primary key,
    nombreProducto VARCHAR(255) not null,
    stock INT not null,
    descripcion varchar(255) not null,
    foto VARCHAR(255) not null,
    fecha_caducidad DATE not null,
    precio decimal not null,
    rating int not null,
    oferta int not null,
    categoria varchar(255) not null
);

create table ventas (
    idVenta INT NOT NULL AUTO_INCREMENT,
    numCarrito INT NOT NULL,
    idProducto INT NOT NULL,
    idUser INT not null,
    fechaCompra DATE not null,
    cantidad int not null,
    primary key(idVenta)
);

create table carrito (
    idCarrito INT NOT NULL AUTO_INCREMENT,
    idUser INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad INT not null,
    primary key (idCarrito)
);