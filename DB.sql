CREATE DATABASE NewImage;
-- drop database NewImage;

USE NewImage;

CREATE TABLE Direccion(
	idDireccion  INT AUTO_INCREMENT PRIMARY KEY,
	zona VARCHAR(50) NOT NULL,
	departamento VARCHAR(30) NOT NULL
);

CREATE TABLE Usuario(
	idUsuario INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(60) NOT NULL,
	contrasena VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	telefono VARCHAR(30),
	fechaNacimiento DATE NOT NULL
);

CREATE TABLE Estado(
	idEstado INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	descripcion VARCHAR(100) NOT NULL
);

CREATE TABLE Horario(
	idHorario INT AUTO_INCREMENT PRIMARY KEY,
	horaInicio TIME NOT NULL,
	horaFin TIME NOT NULL,
	fecha DATE NOT NULL
);

CREATE TABLE TipoProducto(
	idTipoProducto INT AUTO_INCREMENT PRIMARY KEY,
	descripcion VARCHAR(100) NOT NULL,
	estado VARCHAR(20) NOT NULL
)

CREATE TABLE Oferta(
	idOferta INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	descuento DECIMAL(10,2) NOT NULL,
	fechaInicio DATETIME NOT NULL,
	fechaFin DATETIME NOT NULL
);

CREATE TABLE Producto(
	idProducto INT AUTO_INCREMENT PRIMARY KEY,
	idTipoProducto INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	descripcion VARCHAR(100),
	codigo VARCHAR(50) NOT NULL,
	precio DECIMAL(10,2) NOT NULL,
	cantidad INT,
	FOREIGN KEY (idTipoProducto) REFERENCES TipoProducto(idTipoProducto)
);

CREATE TABLE Cliente(
	idCliente INT AUTO_INCREMENT PRIMARY KEY,
	idDireccion INT,
	idUsuario INT,
	nit VARCHAR(20),
	dpi VARCHAR(20),
	FOREIGN KEY (idDireccion) REFERENCES Direccion(idDireccion),
	FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Empleado(
	idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
	idUsuario INT,
	FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);

CREATE TABLE Especialidad(
	idEspecialidad INT AUTO_INCREMENT PRIMARY KEY,
	idEmpleado INT NOT NULL, 
	descripcion VARCHAR(100) NOT null,
	FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE Rol(
	idRol INT AUTO_INCREMENT PRIMARY KEY,
	idEspecialidad INT NOT NULL,
	idEmpleado INT NOT NULL,
	FOREIGN KEY (idEspecialidad) REFERENCES Especialidad(idEspecialidad),
	FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado)
);

CREATE TABLE Cita(
	idCita INT AUTO_INCREMENT PRIMARY KEY,
	precio DECIMAL(10,2) NOT NULL,
	idCliente INT NOT NULL,
	idEmpleado INT NOT NULL,
	idHorario INT NOT NULL,
	idEstado INT NOT NULL,
	FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
	FOREIGN KEY (idEmpleado) REFERENCES Empleado(idEmpleado),
	FOREIGN KEY (idHorario) REFERENCES Horario(idHorario),
	FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
);

CREATE TABLE Recordatorio(
	idRecordatorio INT AUTO_INCREMENT PRIMARY KEY,
	idCita INT NOT NULL,
	idEstado INT NOT NULL,
	intento INT NOT NULL,
	FOREIGN KEY (idCita) REFERENCES Cita(idCita),
	FOREIGN KEY (idEstado) REFERENCES Estado(idEstado)
);

CREATE TABLE Servicio(
	idServicio INT AUTO_INCREMENT PRIMARY KEY,
	idCita INT NOT NULL,
	idProducto INT NOT NULL,
	idOferta INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	descripcion VARCHAR(100),
	tiempoEstimado TIME,
	FOREIGN KEY (idCita) REFERENCES Cita(idCita),
	FOREIGN KEY (idProducto) REFERENCES Producto(idProducto),
	FOREIGN KEY (idOferta) REFERENCES Oferta(idOferta)
);

CREATE TABLE Pago(
	idPago INT AUTO_INCREMENT PRIMARY KEY,
	idServicio INT NOT NULL,
	fecha TIMESTAMP NOT NULL,
	montoTotal DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (idServicio) REFERENCES Servicio(idServicio)
);

CREATE TABLE Factura(
	idFactura INT AUTO_INCREMENT PRIMARY KEY,
	idOferta INT NOT NULL,
	idPago INT NOT NULL,
	noSerie VARCHAR(40) NOT NULL,
	fecha DATETIME NOT NULL,
	totalCobrar DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (idPago) REFERENCES Pago(idPago)
);
