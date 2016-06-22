CREATE TABLE tbl_rol (
  id_rol INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre_rol VARCHAR(30) NOT NULL,
  PRIMARY KEY(id_rol)
)
TYPE=InnoDB;

CREATE TABLE tbl_user (
  id_user INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_rol INTEGER UNSIGNED NOT NULL,
  name VARCHAR(60) NOT NULL,
  email VARCHAR(60) NOT NULL,
  password_2 VARCHAR(80) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  reading INT NOT NULL DEFAULT 1,
  estado INT NULL DEFAULT 0,
  PRIMARY KEY(id_user),
  INDEX tbl_user_FKIndex1(id_rol),
  FOREIGN KEY(id_rol)
    REFERENCES tbl_rol(id_rol)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
)
TYPE=InnoDB;

