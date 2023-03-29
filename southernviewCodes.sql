CREATE DATABASE southernview;
CREATE TABLE southernviewcodes(
    id int(10) NOT NULL AUTO_INCREMENT,
    HouseNumber varchar(10) NOT NULL UNIQUE,
    Password varchar (255) NOT NULL UNIQUE,
    email varchar(255) NOT NULL,
    code int(10) NOT NULL,
    PRIMARY KEY(id)
)