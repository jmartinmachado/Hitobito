<?
function Bandera($archivo){
	if(file_exists("bandera/".$archivo)==true){
		$FDE=true;
	}else{
		$FDE=false;
	}
	return $FDE;
}
function traducir_url($url){
	if(Bandera("cortar")){
		if($url=="inicio"){
			return "http://www.Hitobito.com.ar/";
		}else{
			return "http://www.Hitobito.com.ar/".$url;
		}
	}else{
		return $url;
	}
}
function Obtener_Fecha(){
	$nombre_mes=array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre");
	$nombre_dia=array ("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
	$dia_semana=intval(strftime("%w"));
	$dia_numero=intval(strftime("%d"));
	$mes=intval(strftime("%m"));
	$año=strftime("%Y");
	$hora=strftime("%H:%M:%S");
	return "A las ".$hora." el ".$nombre_dia[$dia_semana].", ".$dia_numero." de ".$nombre_mes[$mes-1]." de ".$año;
}
function hora(){
	$hora = getdate(time());
	return ( $hora["hours"] . ":" . $hora["minutes"]); 
}
function Añadir($Nbre_Archivo,$Contenido){
	$fp=fopen($Nbre_Archivo,"a");
	fwrite($fp, $Contenido);
	fclose($fp);
}
function sitemap($url){
	Añadir("sitemap.txt","http://hitobito.com.ar/".$url."\n");
}
?>