CREATE PROCEDURE sp_users_delete(IN piduser INT)
  BEGIN

    DECLARE vidperson INT;

    SELECT idperson
    INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;

    DELETE FROM tb_users
    WHERE iduser = piduser;
    DELETE FROM tb_persons
    WHERE idperson = vidperson;

  END;
