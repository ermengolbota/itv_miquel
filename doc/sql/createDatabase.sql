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
	id CHAR(17) UNIQUE,
	matricula CHAR(7),
	dia DATE,
	hora TIME,
	num_carril INT(1),
	id_centre INT(3),
	tipus_vehicle VARCHAR(10),
	nom VARCHAR(20),
	cognom VARCHAR(50),
	tlf CHAR(9),
	mail VARCHAR(50),
	FOREIGN KEY(num_carril) REFERENCES Carril(num),
	FOREIGN KEY(id_centre) REFERENCES Carril(id_centre),
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
