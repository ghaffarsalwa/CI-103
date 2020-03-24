-- create and select the database

USE mariomart;  -- MySQL command

-- create the tables
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  id       INT(11)        NOT NULL   AUTO_INCREMENT,
  first_name     VARCHAR(255)   NOT NULL,
  last_name      VARCHAR(255)   NOT NULL,
  email_address  VARCHAR(255)   NOT NULL,
  user_name      VARCHAR(255)   NOT NULL,
  password       VARCHAR(255)   NOT NULL,
  avatar         VARCHAR(255)   NOT NULL,
  PRIMARY KEY (id)
);

-- insert data into the database
--INSERT INTO user VALUES
--(1, 'shamme', 'alam', 'alam@gmail.com','shamme','1342'),
--(2, 'alf', 'pero', 'pero@gmail.com','alf','1876'),
--(3, 'brandon', 'alex', 'brandon@gmail.com','alex','1364');


CREATE TABLE images (
  imageID          int(11)        NOT NULL  AUTO_INCREMENT,
  productID        INT(11)        NOT NULL,
  imageName        varchar(200)   NOT NULL,
  image longtext                  NOT NULL,
  PRIMARY KEY (imageID)
);



-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON mariomart.*
TO root@localhost
IDENTIFIED BY '';

GRANT SELECT
ON books
TO root@localhost
IDENTIFIED BY '';
