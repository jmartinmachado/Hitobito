<?
function Conectar(){
	if (Bandera("online")){
		$servidor="192.168.0.192";
		$usuario="martin_machado";
		$password="NXJR9BA3kv";
		$base_datos="hitobito";
	}else{
		if (Bandera("offline-online")){
			$servidor="190.228.29.67";
			$usuario="martin_machado";
			$password="NXJR9BA3kv";
			$base_datos="hitobito";
		}else{
			$servidor="localhost";
			$usuario="root";
			$password="";
			$base_datos="hitobito";
		}
	}
	if (!($link=mysql_connect($servidor,$usuario,$password))){
		$link = false;
	}
	if($link<>false && !(mysql_select_db($base_datos,$link))){
		$link=false;
	}
	return $link;
}
function Obtener_Nuevos($pagina,$tipo){
	$FBD_CON=Conectar();
	$pagina=$pagina*6;
	$FBD=array();
	if ($FBD_CON<>false){
		switch(trim($tipo)){
			case 't':
				$Sql_Prev="WHERE  `tipo` NOT LIKE  'STICKY'";
			break;
			case 'p':
				$Sql_Prev="WHERE  `tipo` LIKE  'img' AND `tipo` NOT LIKE  'STICKY'";
			break;
			case 'v':
				$Sql_Prev="WHERE  `tipo` LIKE  'video' AND  `tipo` NOT LIKE  'STICKY'";
			break;
			case 'STICKY':
			$Sql_Prev="WHERE  `tipo` LIKE  'STICKY'";
			break;
		}
		$sql = mysql_query("SELECT * FROM  `post` $Sql_Prev ORDER BY  `id` DESC LIMIT $pagina , 6",$FBD_CON);
		if(mysql_affected_rows()>0) {
			array_push($FBD,array("OK" => 1));
			while($row=mysql_fetch_array($sql) ){
				array_push($FBD,array( "id" => $row["id"],"titulo" => $row["titulo"],"url" => $row["url"],"tipo" => $row["tipo"],"tags" => $row["tags"],"comentarios" => $row["comentarios"],"puntaje" => $row["puntaje"], "votos_positivos" => $row["votos_positivos"], "votos_negativos" => $row["votos_negativos"],"fecha" => $row["fecha"],"hora" => $row["hora"]));
			}
			mysql_close($FBD_CON);
		}else{
			array_push($FBD,array("OK" => 2));
		}
	}else{
		array_push($FBD,array("OK" => 0));
	}
	return $FBD;
}
function Obtener_Post($id){
	$FBD_CON=Conectar();
	$FBD=array();
	if($FBD_CON<>false){
		$sql=mysql_query("SELECT * FROM  `post` WHERE  `id` =$id LIMIT 0 , 30",$FBD_CON);
		if(mysql_affected_rows()>0) {
			array_push($FBD,array("OK" => 1));
			while($row=mysql_fetch_array($sql)){
				array_push($FBD,array( "id" => $row["id"],"titulo" => $row["titulo"],"url" => $row["url"],"tipo" => $row["tipo"],"tags" => $row["tags"],"fuente" => $row["fuente"],"comentarios" => $row["comentarios"],"puntaje" => $row["puntaje"], "votos_positivos" => $row["votos_positivos"], "votos_negativos" => $row["votos_negativos"],"fecha" => $row["fecha"],"hora" => $row["hora"]));
				break;
			}
		}else{
			array_push($FBD,array("OK" => 0));
		}
		mysql_close($FBD_CON);
	}else{
		array_push($FBD,array("OK" => 0));
	}
	return $FBD;
}
function Obtener_Puntaje_Post($id_post,$id_user){
	$FBD_CON=Conectar();
	$FBD=array();
	if($FBD_CON<>false){
		$sql=mysql_query("SELECT puntaje FROM  `votos` WHERE  `id_post` =$id_post AND  `id_usuario` =$id_user LIMIT 0 , 30",$FBD_CON);
		
		
		if(mysql_affected_rows()>0) {
			$FBD["OK"]=1;
			while($row=mysql_fetch_array($sql)){
				$FBD["puntaje"]=$row["puntaje"];
				break;
			}
		}else{
			$FBD["OK"]=0;
		}
		mysql_close($FBD_CON);
	}
	return $FBD;
}
/***/
function Votar($id_post,$id_user,$puntaje_in){
	$FBD_CON=Conectar();
	$sql=mysql_query("SELECT puntaje, votos_positivos, votos_negativos FROM  post WHERE id LIKE '$id_post'",$FBD_CON);
	if(mysql_affected_rows()>0) {
		while($fila = mysql_fetch_array($sql) ){
			$Puntaje=$fila ["puntaje"];
			$Votos_Positivos=$fila ["votos_positivos"];
			$Votos_Negativos=$fila ["votos_negativos"];
			break;
		}
		switch($puntaje_in){
		case "Mas3":
			$Puntaje=$Puntaje+3;
			$Votos_Positivos=$Votos_Positivos+3;
		break;
		case "Mas2":
			$Puntaje=$Puntaje+2;
			$Votos_Positivos=$Votos_Positivos+2;
		break;
		case "Mas1":
			$Puntaje=$Puntaje+1;
			$Votos_Positivos=$Votos_Positivos+1;
		break;
		case "Mhe":
			if ($Puntaje<0){
				$Puntaje=$Puntaje+1;
				$Votos_Positivos=$Votos_Positivos+1;
			}else{
				$Puntaje=$Puntaje-1;
				$Votos_Negativos=$Votos_Negativos+1;
			}
		break;
		case "Menos1":
			$Puntaje=$Puntaje-1;
			$Votos_Negativos=$Votos_Negativos+1;
		break;
		case "Menos2":
			$Puntaje=$Puntaje-2;
			$Votos_Negativos=$Votos_Negativos+1;
		break;
		case "Menos3":
			$Puntaje=$Puntaje-3;
			$Votos_Negativos=$Votos_Negativos+3;
		break;
	}
	$sql=mysql_query("UPDATE post SET  `puntaje` = '$Puntaje', `votos_positivos` = '$Votos_Positivos',  `votos_negativos` = '$Votos_Negativos' WHERE  id = $id_post LIMIT 1",$FBD_CON);
	$sql=mysql_query("INSERT INTO  votos (`id` ,`id_post` ,`id_usuario` ,`puntaje`) VALUES (NULL ,  '$id_post',  '$id_user',  '$puntaje_in');",$FBD_CON);

	}
	mysql_close($FBD_CON);
	return array("OK" => 1,"prcj" => Calcular_Porcentaje($Votos_Negativos,$Votos_Positivos)."%","v_p" => $Votos_Positivos,"v_n" => $Votos_Negativos,"tt" => $Puntaje);
}
function Actualizar_Comentarios($id_post,$Cant_Com){
	if (!empty($Cant_Com)){
		$FBD_CON=Conectar();
		$sql=mysql_query("UPDATE post SET  `comentarios` = '$Cant_Com' WHERE  id = $id_post LIMIT 1",$FBD_CON);
		mysql_close($FBD_CON);
		return "OK - ".$id_post." - ".$Cant_Com;
	}else{
		return "NOP";
	}
}
/***/
function Agregar($titulo,$valor,$tipo,$tags,$fuente){
	/*
	$FBD_CON=Conectar();
	if($FBD_CON<>false){
		$sql=mysql_query("INSERT INTO  `eclipseink`.`post_hitobito` (`id` ,`titulo` ,`valor` ,`tipo` ,`tags`,`fuente`) VALUES (NULL ,  '$titulo',  '$valor',  '$tipo',  '$tags',  '$fuente');",$FBD_CON);
		if(mysql_affected_rows()>0){
			$numm=mysql_insert_id();
			
		}else{
			return 0;
		}
		mysql_close($FBD_CON);
	}
	return $numm;*/
}
?>