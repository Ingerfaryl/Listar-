use superhero;
CREATE procedure spu_resumen_publisher(in _idpublisher INT)
BEGIN
    SELECT
    SUP.superhero_name,
    SUP.full_name,
    GEN.gender,
    RAC.race,
    PUB.id
    FROM superhero SUP
    INNER JOIN publisher PUB ON PUB.id=SUP.publisher_id
    INNER JOIN gender GEN ON GEN.id=SUP.gender_id
    INNER JOIN race RAC ON RAC.id=SUP.race_id 
    WHERE SUP.publisher_id = _idpublisher;
END;
call spu_resumen_publisher(4);
