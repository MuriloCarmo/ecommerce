CREATE PROCEDURE sp_usersupdate_save(IN piduser      INT, IN pdesperson VARCHAR(64), IN pdeslogin VARCHAR(64),
                                     IN pdespassword VARCHAR(256), IN pdesemail VARCHAR(128), IN pnrphone BIGINT,
                                     IN pinadmin     TINYINT)
  BEGIN

    DECLARE vidperson INT;

    SELECT idperson
    INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;

    UPDATE tb_persons
    SET
      desperson = pdesperson,
      desemail  = pdesemail,
      nrphone   = pnrphone
    WHERE idperson = vidperson;

    UPDATE tb_users
    SET
      deslogin    = pdeslogin,
      despassword = pdespassword,
      inadmin     = pinadmin
    WHERE iduser = piduser;

    SELECT *
    FROM tb_users a INNER JOIN tb_persons b USING (idperson)
    WHERE a.iduser = piduser;

  END;
