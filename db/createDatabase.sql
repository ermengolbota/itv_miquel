CREATE DATABASE IAMotors;
USE IAMotors;

CREATE TABLE Centre (
	id INT(3) PRIMARY KEY,
	nom VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Carril (
	num INT(1),
	id_centre INT(3),
	FOREIGN KEY (id_centre) REFERENCES Centre(id),
	PRIMARY KEY (num, id_centre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Reserva (
	dia DATE,
	hora TIME,
	num_carril INT(1),
	id_centre INT(3),
	matricula CHAR(7),
	tipus_vehicle VARCHAR(10),
	mail VARCHAR(50),
	FOREIGN KEY(num_carril) REFERENCES Carril(num),
	FOREIGN KEY(id_centre) REFERENCES Carril(id_centre),
	PRIMARY KEY (dia, hora, num_carril, id_centre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
