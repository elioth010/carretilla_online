CREATE  TABLE users (
  username VARCHAR(45) NOT NULL ,
  password VARCHAR(32) NOT NULL ,
  email VARCHAR(60) NOT NULL,
  name VARCHAR(250) NOT NULL,
  age INT(3) NOT NULL,
  enabled TINYINT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (username));

CREATE TABLE role(
  id INT(3) NOT NULL AUTO_INCREMENT,
  role_description VARCHAR(45) NOT NULL,
  PRIMARY KEY(id));
  
CREATE TABLE user_roles (
  user_role_id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NOT NULL,
  role INT(3) NOT NULL,
  PRIMARY KEY (user_role_id),
  UNIQUE KEY uni_username_role (role,username),
  KEY fk_username_idx (username),
  CONSTRAINT fk_user_role_username FOREIGN KEY (username) REFERENCES users (username),
  CONSTRAINT fk_user_role_role FOREIGN KEY (role) REFERENCES role (id));
