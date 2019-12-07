/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.34-MariaDB : Database - db_myrestaurant
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_myrestaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_myrestaurant`;

/*Table structure for table `tb_categories` */

DROP TABLE IF EXISTS `tb_categories`;

CREATE TABLE `tb_categories` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `descriptive` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_categories` */

insert  into `tb_categories`(`idCategory`,`descriptive`) values (1,'Massas'),(2,'Bebidas'),(3,'Doces'),(4,'Lanches'),(5,'Pratos '),(6,'Porções');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_products` */

insert  into `tb_products`(`idProduct`,`descriptive`,`price`,`idCategory`) values (1,'Macarrão','11.00',1),(2,'Coca-Cola 2L','10.00',2),(3,'Chopp 350ml','5.00',2),(4,'Torta de Limão','8.00',3),(5,'X-Bacon','13.00',4),(6,'Filé a Parmeggiana','19.00',5),(7,'Batata Fritas 500g','12.00',6);

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

insert  into `tb_users`(`idUser`,`username`,`cpf`,`usertype`,`email`,`passwd`) values (1,'Pedro Lucas Bezerra','49368111812','W','pedro@gmail.com','$2y$12$NTReDhCdrbbhkS7eP8ZN4uyQwUqyTblvVXUJ1KWcmbXXUnq8vmQRW'),(2,'Vinícius Bueno','47495145862','A','vini@gmail.com','$2y$12$tbtOAayasA2FNcDIquexcuWl.vjnRyAiaCjBBqI6dFbuWubBNhdp2');

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

insert  into `tb_waiters`(`idWaiter`,`commission`,`idUser`) values (1,10,1);

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
		/*Produto nÃ£o encontrado dentro do pedido*/
        THEN INSERT INTO tb_orderItems(quantity, totalPrice, idOrder, idProduct)
		VALUES(pQtd, pQtd*_total, pOrder, pProduct);
		/*Produto encontrado dentro do pedido*/
        ELSE UPDATE tb_orderItems AS i1 #dando nome pra tabela
		JOIN(SELECT i2.idOrderItem AS id FROM tb_orderItems i2 WHERE i2.idOrder = pOrder AND i2.idProduct = pProduct) 
		AS sub ON i1.idOrderItem = sub.id
		SET i1.quantity = i1.quantity + pQtd, i1.totalPrice = i1.totalPrice + pQtd*_total;
    END IF;
    
    SELECT * FROM tb_orderItems WHERE idOrderItem = LAST_INSERT_ID();
    
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_orders_store` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_orders_store` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orders_store`(
	IN pTotalPrice FLOAT,
    IN pDesk INT,
    IN pStatus INT,
    IN pWaiter INT
)
BEGIN
	
	INSERT INTO tb_orders(totalPrice, idDesk, idStatus, idWaiter)
	VALUES(pTotalPrice, pDesk, pStatus, pWaiter);
    
    SELECT * FROM tb_orders WHERE idOrder = LAST_INSERT_ID();
    
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
