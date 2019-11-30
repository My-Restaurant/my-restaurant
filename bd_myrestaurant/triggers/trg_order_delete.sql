DELIMITER $$
DROP TRIGGER IF EXISTS trg_order_delete$$
CREATE TRIGGER trg_order_delete 
BEFORE DELETE ON tb_orders 
FOR EACH ROW  
BEGIN 
	DELETE FROM tb_orderItems WHERE idOrder = old.idOrder;
END; 
$$ DELIMITER ;
