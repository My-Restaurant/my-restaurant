CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ordersItems_store`(
	IN pQtd INT,
    IN pObs VARCHAR(255),
    IN pOrder INT,
    IN pProduct INT
)
BEGIN

	DECLARE _total FLOAT;
	SELECT price INTO _total FROM tb_products WHERE idProduct = pProduct;
    
    IF((SELECT idOrderItem FROM tb_orderItems WHERE idOrder = pOrder AND idProduct = pProduct) IS NULL)
		/*Produto não encontrado dentro do pedido*/
        THEN INSERT INTO tb_orderItems(quantity, totalPrice, observation, idOrder, idProduct)
		VALUES(pQtd, pQtd*_total, pObs, pOrder, pProduct);
		/*Produto encontrado dentro do pedido*/
        ELSE UPDATE tb_orderItems as i1 
		JOIN(SELECT i2.idOrderItem as id FROM tb_orderItems i2 WHERE i2.idOrder = pOrder AND i2.idProduct = pProduct) 
		as sub ON i1.idOrderItem = sub.id
		SET i1.quantity = i1.quantity + pQtd, i1.totalPrice = i1.totalPrice + pQtd*_total;
    END IF;
    
    SELECT * FROM tb_orderItems WHERE idOrderItem = LAST_INSERT_ID();
    
END