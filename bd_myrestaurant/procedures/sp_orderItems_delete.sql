DELIMITER //
DROP PROCEDURE IF EXISTS `sp_orderItems_delete` //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orderItems_delete`(
	IN pId INT,
    IN pQtd INT,
    IN pOrder INT
)
BEGIN
	
	IF((SELECT quantity FROM tb_orderItems WHERE idOrderItem = pId) = pQtd)
		THEN DELETE FROM tb_orderItems WHERE idOrderItem = pId;
		ELSE 
			UPDATE tb_orderItems 
            SET totalPrice = totalPrice - (totalPrice/quantity) * pQtd,
            quantity = quantity - pQtd
            WHERE idOrderItem = pId;
    END IF;
    
    UPDATE tb_orders SET totalPrice = 
    (SELECT SUM(totalPrice) FROM tb_orderItems WHERE idOrder = pOrder)
    WHERE idOrder = pOrder;
    
END
//
DELIMITER ;