<?
function Conectar(){
	if (Bandera("online")){
		$servidor="192.168.0.192";
		$usuario="martin_machado";
		$password="NXJR9BA3kv";
		$base_datos="eclipseink";
	}else{
		if (Bandera("offline-online")){
			$servidor="190.228.29.67";
			$usuario="martin_machado";
			$password="NXJR9BA3kv";
			$base_datos="eclipseink";
		}else{
			$servidor="localhost";
			$usuario="root";
			$password="";
			$base_datos="eclipseink";
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
	if ($FBD_CON<>false){
		switch(trim($tipo)){
			case 'todo':
				$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `tipo` NOT LIKE  'STICKY' ORDER BY `id` DESC LIMIT $pagina, 6",$FBD_CON);
			break;
			case 'img':
				$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `tipo` LIKE  'img' ORDER BY `id` DESC LIMIT $pagina, 6",$FBD_CON);
			break;
			case 'video':
				$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `tipo` LIKE  'video' ORDER BY `id` DESC LIMIT $pagina, 6",$FBD_CON);
			break;
			case 'STICKY':
				$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `tipo` LIKE  'STICKY' ORDER BY `id` DESC LIMIT 0 , 1",$FBD_CON);
			break;
		}
		$FBD=array("");
		while($row=mysql_fetch_array($sql) ){
			$idx=$row["id"];
			$titulo=$row["titulo"];
			$valor=$row["valor"];
			$tipo=$row["tipo"];
			$tags=$row["tags"];
			array_push($FBD,$idx,$titulo,$valor,$tipo,$tags);
		}
		mysql_close($FBD_CON);
	}else{
		$FBD="";
	}
	return $FBD;
}
function Obtener_Post($id){
	$FBD_CON=Conectar();
	if($FBD_CON<>false){
		$sql=mysql_query("SELECT * FROM `post_hitobito` WHERE  `id` =$id LIMIT 0 , 2",$FBD_CON);
		if(mysql_affected_rows()>0) {
			while($fila=mysql_fetch_array($sql)){
				$idx=$fila["id"];
				$titulo=$fila["titulo"];
				$valor=$fila["valor"];
				$tipo=$fila["tipo"];
				$tags=$fila["tags"];
				$fuente=$fila["fuente"];
				$FBD=Array("titulo" => $titulo,"valor" => $valor,"tipo" => $tipo,"tags" => $tags,"fuente" => $fuente);
				break;
			}
		}else{
			$FBD=Array("titulo" => "","valor" => "","tipo" => "","tags" => "");
		}
		mysql_close($FBD_CON);
	}else{
		$FBD=Array("titulo" => "","valor" => "","tipo" => "","tags" => "");
	}
	return $FBD;
}
/***/
function Art_Art_Siguiente($id){
	$FBD_CON=Conectar();
	if ($FBD_CON<>false){
		$sql=mysql_query("SELECT  `id`  FROM  `post_hitobito`  WHERE  `id` > $id LIMIT 0 , 1",$FBD_CON);
		while($row=mysql_fetch_array($sql)){
			$idz=$row["id"];
		}
	}
	if(!isset($idz)){
		$idz=0;
	}

	return $idz;
}
function Art_Art_Anterior($id){
	$FBD_CON=Conectar();
	if ($FBD_CON<>false){
		$sql=mysql_query("SELECT  `id` FROM  `post_hitobito` WHERE  `id` < $id ORDER BY  `id` DESC LIMIT 0 , 1",$FBD_CON);
		while($row=mysql_fetch_array($sql)){
			$idz=$row["id"];
		}
	}
	if(!isset($idz)){
		$idz=0;
	}
	return $idz;
}
function Agregar($titulo,$valor,$tipo,$tags,$fuente){
	$FBD_CON=Conectar();
	if($FBD_CON<>false){
		$sql=mysql_query("INSERT INTO  `eclipseink`.`post_hitobito` (`id` ,`titulo` ,`valor` ,`tipo` ,`tags`,`fuente`) VALUES (NULL ,  '$titulo',  '$valor',  '$tipo',  '$tags',  '$fuente');",$FBD_CON);
		if(mysql_affected_rows()>0){
			$numm=mysql_insert_id();
			/*sitemap("post_".$numm.".html");*/
		}else{
			return 0;
		}
		mysql_close($FBD_CON);
	}
	return $numm;
}
?>