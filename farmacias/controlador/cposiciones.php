<?php 
	include("../modelo/clase.php");
	include("../modelo/confi.php");
	$miconexion = new clase_mysql;
    $miconexion->conectar($db_name,$db_host, $db_user,$db_pasword);
    $sql="select Id, Nombre, (6371 * ACOS( 
                                SIN(RADIANS(Latitud)) * SIN(RADIANS(4.6665578)) 
                                + COS(RADIANS(Longitud - -74.0524521)) * COS(RADIANS(Latitud)) 
                                * COS(RADIANS(4.6665578))
                                )
                   ) AS distancia
		FROM farmacia
		HAVING distancia < 1 /* 1 KM  a la redonda */
		ORDER BY distancia ASC";
    $miconexion->consulta($sql);
    //http://www.michael-pratt.com/blog/7/Encontrar-Lugares-cercanos-con-MySQL-y-PHP/
?>