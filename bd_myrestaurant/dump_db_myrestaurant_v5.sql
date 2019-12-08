/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.37-MariaDB : Database - db_myrestaurant
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_myrestaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_myrestaurant`;

/*Table structure for table `tb_categories` */

DROP TABLE IF EXISTS `tb_categories`;

CREATE TABLE `tb_categories` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `descriptive` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_categories` */

insert  into `tb_categories`(`idCategory`,`descriptive`) values (1,'Massas'),(2,'Lanches'),(3,'Bebidas'),(4,'Doces'),(5,'Porções');

/*Table structure for table `tb_desk` */

DROP TABLE IF EXISTS `tb_desk`;

CREATE TABLE `tb_desk` (
  `idDesk` int(11) NOT NULL AUTO_INCREMENT,
  `descriptive` varchar(10) NOT NULL,
  PRIMARY KEY (`idDesk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_desk` */

insert  into `tb_desk`(`idDesk`,`descriptive`) values (1,'Mesa 01'),(2,'Mesa 02'),(3,'Mesa 03'),(4,'Mesa 04'),(5,'Mesa 05');

/*Table structure for table `tb_orderitems` */

DROP TABLE IF EXISTS `tb_orderitems`;

CREATE TABLE `tb_orderitems` (
  `idOrderItem` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(2) NOT NULL,
  `totalPrice` decimal(8,2) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  PRIMARY KEY (`idOrderItem`),
  KEY `idOrder` (`idOrder`),
  KEY `idProduct` (`idProduct`),
  CONSTRAINT `tb_orderitems_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `tb_orders` (`idOrder`),
  CONSTRAINT `tb_orderitems_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `tb_products` (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_orderitems` */

/*Table structure for table `tb_orders` */

DROP TABLE IF EXISTS `tb_orders`;

CREATE TABLE `tb_orders` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `totalPrice` decimal(8,2) NOT NULL,
  `idDesk` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idWaiter` int(11) NOT NULL,
  `dt_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderName` varchar(45) NOT NULL,
  PRIMARY KEY (`idOrder`),
  KEY `idDesk` (`idDesk`),
  KEY `idStatus` (`idStatus`),
  KEY `idWaiter` (`idWaiter`),
  CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`idDesk`) REFERENCES `tb_desk` (`idDesk`),
  CONSTRAINT `tb_orders_ibfk_2` FOREIGN KEY (`idStatus`) REFERENCES `tb_status` (`idStatus`),
  CONSTRAINT `tb_orders_ibfk_3` FOREIGN KEY (`idWaiter`) REFERENCES `tb_waiters` (`idWaiter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_orders` */

/*Table structure for table `tb_products` */

DROP TABLE IF EXISTS `tb_products`;

CREATE TABLE `tb_products` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `descriptive` varchar(30) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `idCategory` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `idCategory` (`idCategory`),
  CONSTRAINT `tb_products_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `tb_categories` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_products` */

insert  into `tb_products`(`idProduct`,`descriptive`,`price`,`idCategory`) values (1,'Macarrão à Bolonhesa',17.00,1),(2,'Pizza de Calabresa',25.00,1),(3,'X-Bacon',13.00,2),(4,'X-Tudo',20.00,2),(5,'Coca-Cola 2L',11.00,3),(6,'Coca-Cola 1L',7.00,3),(7,'Chopp 350ml',5.00,3),(8,'Torre de Chopp 2L',20.00,3),(9,'Carolina Gourmet ',2.00,4),(10,'Torta de Limão ',5.00,4),(11,'Batatas Fritas c/Bacon 500g',15.00,5),(12,'Frango a Passarinho 500g',16.00,5);

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `descriptive` varchar(25) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

insert  into `tb_status`(`idStatus`,`descriptive`) values (1,'Aberto'),(2,'Finalizado');

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `usertype` enum('A','W') DEFAULT 'W',
  `email` varchar(150) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_users` */

insert  into `tb_users`(`idUser`,`username`,`cpf`,`usertype`,`email`,`passwd`) values (1,'Pedro Lucas Bezerra','49368111812','A','pedro@gmail.com','$2y$12$sU4UaulY1ufHVDGECq.f5OteQQxHTa8OqWY0cvmV3q8VecFSmrRWS'),(2,'Gabriel José','48767007880','W','gabriel@gmail.com','$2y$12$1hbau9eyYpOTRDyQGcux/OumQhnXPfqnQpoGoz/WCFjGFpR8CkH/i');

/*Table structure for table `tb_waiters` */

DROP TABLE IF EXISTS `tb_waiters`;

CREATE TABLE `tb_waiters` (
  `idWaiter` int(11) NOT NULL AUTO_INCREMENT,
  `commission` int(2) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idWaiter`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `tb_waiters_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tb_users` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_waiters` */

insert  into `tb_waiters`(`idWaiter`,`commission`,`idUser`) values (1,10,2);

/* Trigger structure for table `tb_orders` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trg_order_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trg_order_delete` BEFORE DELETE ON `tb_orders` FOR EACH ROW BEGIN 
	DELETE FROM tb_orderItems WHERE idOrder = old.idOrder;
END */$$


DELIMITER ;

/* Procedure structure for procedure `sp_ordersItems_store` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_ordersItems_store` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ordersItems_store`(
	IN pQtd INT,
    IN pOrder INT,
    IN pProduct INT)
BEGIN
	DECLARE _total FLOAT;
	SELECT price INTO _total FROM tb_products WHERE idProduct = pProduct;  
    IF((SELECT idOrderItem FROM tb_orderItems WHERE idOrder = pOrder AND idProduct = pProduct) IS NULL)
		/*Produto não encontrado dentro do pedido*/
        THEN INSERT INTO tb_orderItems(quantity, totalPrice, idOrder, idProduct)
		VALUES(pQtd, pQtd*_total, pOrder, pProduct);
		/*Produto encontrado dentro do pedido*/
        ELSE UPDATE tb_orderItems AS i1 #dando nome pra tabela
		JOIN(SELECT i2.idOrderItem AS id FROM tb_orderItems i2 WHERE i2.idOrder = pOrder AND i2.idProduct = pProduct) 
		AS sub ON i1.idOrderItem = sub.id
		SET i1.quantity = i1.quantity + pQtd, i1.totalPrice = i1.totalPrice + pQtd*_total;
    END IF;
    
    UPDATE tb_orders SET totalPrice = totalPrice + pQtd * _total WHERE idOrder = pOrder;
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_orders_store` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_orders_store` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_store`(
	IN pTotalPrice FLOAT,
    IN pDesk INT,
    IN pStatus INT,
    IN pWaiter INT,
    IN pOrderName VARCHAR(45)
)
BEGIN
	
	INSERT INTO tb_orders(totalPrice, idDesk, idStatus, idWaiter, orderName)
	VALUES(pTotalPrice, pDesk, pStatus, pWaiter, pOrderName);
    
    SELECT * FROM tb_orders WHERE idOrder = LAST_INSERT_ID();
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_waiter_store` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_waiter_store` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_waiter_store`(
	IN pUsername VARCHAR(40),
    IN pCpf VARCHAR(11),
    IN pEmail VARCHAR(150),
    IN pPasswd VARCHAR(255),
    IN pCommission INT(2))
BEGIN
	INSERT INTO tb_users(username, cpf, usertype, email, passwd)
    VALUES (pUsername, pCpf, "W", pEmail, pPasswd);
	
	INSERT INTO tb_waiters(commission, idUser)
    VALUES (pCommission, (SELECT idUser FROM tb_users WHERE idUser = LAST_INSERT_ID()));
    
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
