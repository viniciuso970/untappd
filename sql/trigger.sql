DELIMITER $$
CREATE TRIGGER numero_checkin AFTER INSERT ON checkin 
FOR EACH ROW 
BEGIN
	DECLARE x INT;
    DECLARE qtdeAvaliacoes INT;
    DECLARE soma INT;
	SELECT COUNT(idCerveja) INTO x from checkin where idConta = new.idConta AND idCerveja = new.idCerveja;
    IF(x > 1) THEN
    	UPDATE conta set total = total + 1 where id = new.idConta;
    END IF;
    IF(x = 1) THEN
    	UPDATE conta set total = total + 1, unico = unico + 1 where id = new.idConta;
    END IF;
	SELECT COUNT(idCerveja), SUM(avaliacao) INTO qtdeAvaliacoes, soma from checkin where idCerveja = new.idCerveja;
    UPDATE cerveja set avaliacao = soma/qtdeAvaliacoes where id = new.idCerveja;
    SELECT COUNT(idCerveja), SUM(cerveja.avaliacao) INTO qtdeAvaliacoes, soma 
    from checkin, cerveja, cervejaria 
    where cerveja.id = checkin.idCerveja AND cervejaria.id = cerveja.idCervejaria;
    SELECT idCervejaria INTO x FROM cerveja WHERE id = new.idCerveja;
    UPDATE cervejaria set avaliacao = soma/qtdeAvaliacoes where id = x;
END