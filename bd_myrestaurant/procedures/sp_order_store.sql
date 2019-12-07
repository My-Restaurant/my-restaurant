DELIMITER //
DROP PROCEDURE IF EXISTS sp_orders_store //
CREATE PROCEDURE `sp_orders_store` (
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
    
END
//
DELIMITER ;
