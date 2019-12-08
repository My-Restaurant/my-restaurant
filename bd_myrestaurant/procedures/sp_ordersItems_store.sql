DELIMITER //
DROP PROCEDURE IF EXISTS sp_ordersItems_store //
CREATE PROCEDURE sp_ordersItems_store(
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
    
END
//
DELIMITER ;