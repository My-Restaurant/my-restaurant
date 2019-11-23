CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ordersItems_store`(
	IN pQtd INT,
    IN pTotalPrice FLOAT,
    IN pObs VARCHAR(255),
    IN pOrder INT,
    IN pProduct INT
)
BEGIN
	
	INSERT INTO tb_orderItems(quantity, totalPrice, observation, idOrder, idProduct)
    VALUES(pQtd, pTotalPrice, pObs, pOrder, pProduct);
    
    SELECT * FROM tb_orderItems WHERE idOrderItem = LAST_INSERT_ID();
    
END