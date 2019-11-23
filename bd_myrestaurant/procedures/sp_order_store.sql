CREATE PROCEDURE `sp_orders_save` (
	IN pTotalPrice FLOAT,
    IN pDesk INT,
    IN pStatus INT,
    IN pWaiter INT
)
BEGIN
	
	INSERT INTO tb_orders(totalPrice, idDesk, idStatus, idWaiter)
	VALUES(pTotalPrice, pDesk, pStatus, pWaiter);
    
    SELECT * FROM tb_orders WHERE idOrder = LAST_INSERT_ID();
    
END
