DELIMITER //
DROP PROCEDURE IF EXISTS sp_waiter_store //
CREATE PROCEDURE `sp_waiter_store` (
	IN pUsername VARCHAR(40),
    IN pCpf VARCHAR(11),
    IN pEmail VARCHAR(150),
    IN pPasswd VARCHAR(255),
    IN pCommission INT(2))
BEGIN
	INSERT INTO tb_users(username, cpf, usertype, email, passwd)
    VALUES (pUsername, pCpf, "W", pEmail, pPasswd);
    
    DECLARE idU INT;
    SET idU = (SELECT idUser FROM tb_users WHERE idUser = LAST_INSERT_ID());
    
    INSERT INTO tb_waiters(commission, idUser) VALUES(pCommission, idU);
    
END
    
//
DELIMITER ;
