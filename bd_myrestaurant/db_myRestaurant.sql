CREATE OR REPLACE DATABASE db_myRestaurant;

USE db_myRestaurant;

CREATE TABLE tb_users(
	idUser INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(40) NOT NULL,
    cpf CHAR(11) NOT NULL,
    usertype ENUM("A", "W") DEFAULT "W",
    email VARCHAR(150) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    PRIMARY KEY (idUser)
);

CREATE TABLE tb_status(
	idStatus INT NOT NULL AUTO_INCREMENT,
    descriptive VARCHAR(25) NOT NULL,
    PRIMARY KEY (idStatus)
);

CREATE TABLE tb_desk(
	idDesk INT NOT NULL AUTO_INCREMENT,
    descriptive VARCHAR(10) NOT NULL,
    PRIMARY KEY (idDesk)
);

CREATE TABLE tb_categories(
	idCategory INT NOT NULL AUTO_INCREMENT,
    descriptive VARCHAR(30) NOT NULL,
    PRIMARY KEY (idCategory)
);

CREATE TABLE tb_waiters(
	idWaiter INT NOT NULL AUTO_INCREMENT,
    commission INT(2) NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idWaiter),
    FOREIGN KEY (idUser) REFERENCES tb_users(idUser)
);

CREATE TABLE tb_products(
	idProduct INT NOT NULL AUTO_INCREMENT,
    descriptive VARCHAR(30) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    idCategory INT NOT NULL,
    PRIMARY KEY (idProduct),
    FOREIGN KEY (idCategory) REFERENCES tb_categories (idCategory) 
);

CREATE TABLE tb_orders(
	idOrder INT NOT NULL AUTO_INCREMENT,
    totalPrice DECIMAL(8,2) NOT NULL,
    idDesk INT NOT NULL,
    idStatus INT NOT NULL,
    idWaiter INT NOT NULL,
    dt_register TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    orderName VARCHAR(45) NOT NULL,
    PRIMARY KEY (idOrder),
    FOREIGN KEY (idDesk) REFERENCES tb_desk (idDesk),
    FOREIGN KEY (idStatus) REFERENCES tb_status (idStatus),
    FOREIGN KEY (idWaiter) REFERENCES tb_waiters (idWaiter) 
);

CREATE TABLE tb_orderItems(
	idOrderItem INT NOT NULL AUTO_INCREMENT,
    quantity INT(2) NOT NULL,
    totalPrice DECIMAL(8,2) NOT NULL,
    idProduct INT NOT NULL,
    idOrder INT NOT NULL,
    PRIMARY KEY (idOrderItem),
    FOREIGN KEY (idOrder) REFERENCES tb_orders (idOrder),
    FOREIGN KEY (idProduct) REFERENCES tb_products (idProduct) 
);

