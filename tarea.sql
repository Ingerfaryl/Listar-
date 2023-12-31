use superhero;
create procedure spu_publisher_search(in _publisher_id INT)
BEGIN
    SELECT
    SUP.id,
    PUB.publisher_name,
    SUP.superhero_name,
    SUP.full_name,
    GEN.gender,
    RAC.race
    FROM superhero SUP
    INNER JOIN gender GEN ON GEN.id = SUP.gender_id
    INNER JOIN race RAC ON RAC.id = SUP.race_id 
    INNER JOIN publisher PUB ON PUB.id= SUP.publisher_id 
    WHERE SUP.publisher_id = _publisher_id
    order by SUP.publisher_id;
END;
call spu_publisher_search (4);
create PROCEDURE spu_publisher_listar()
BEGIN
    SELECT
        id,
        publisher_name
    FROM publisher;
end;
call spu_publisher_listar();


CREATE PROCEDURE spu_resumen_alignment()
BEGIN
	SELECT
	AL.alignment,
	COUNT(SH.id) AS 'total'
	FROM superhero SH
	LEFT JOIN alignment AL ON AL.id = SH.alignment_id
	GROUP BY AL.id, AL.alignment
	ORDER BY SH.alignment_id ASC;		
END
CALL spu_resumen_alignment;

CREATE PROCEDURE spu_resumen_alienacion_productor(IN PUBLISHER_ID INT) 
BEGIN
  SELECT
	    ALG.alignment AS Alienacion,
	    COUNT(*) AS Heroes
	FROM superhero SUP
	    LEFT JOIN alignment ALG ON ALG.id = SUP.alignment_id
	WHERE SUP.publisher_id = PUBLISHER_ID
	GROUP BY
	    ALG.alignment;
	END;
call spu_resumen_alienacion_productor(2);
