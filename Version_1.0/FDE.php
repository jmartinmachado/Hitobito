<?
	if( !defined( '_AUTOGAN' ) && !defined( '_VALID_VVM' ) ) die( 'Restricted access' );
	function Bandera($archivo){
		if(file_exists("bandera/".$archivo)==true){
			$FDE=true;
		}else{
			$FDE=false;
		}
		return $FDE;
	}
	function traducir_url($url){
		global $GLOB_Pagina;
		global $GLOB_Pagina_non_protocol;
		if(Bandera("cortar")){
			if($url=="inicio"){
				return $GLOB_Pagina;
			}else{
				if (Extencion($url)=="css" || Extencion($url)=="jpg"  || Extencion($url)=="js" || Extencion($url)=="ico"){
					return $GLOB_Pagina_non_protocol.$url;
				}else{
					return $GLOB_Pagina.$url;
				}
			}
		}else{
			return $url;
		}
	}
	function HoraStr(){
		$hora = getdate(time());
		return ( $hora["hours"] . ":" . $hora["minutes"] . ":" . $hora["seconds"] ); 
	}
	function FechaStr(){
		return date("Y-m-d");
	}
	function Extencion($path) {
		return substr(strrchr($path, "."),1);
	}
	function Calcular_Porcentaje($Votos_Positivos,$Votos_Negativos){
		$Porcentaje_T=$Votos_Positivos+$Votos_Negativos;
		if ($Porcentaje_T != 0){
			$Porcentaje_V=$Votos_Positivos / $Porcentaje_T;
			$Porcentaje_V=100-round($Porcentaje_V*100);
		}else{
			$Porcentaje_V=0;
		}
		return $Porcentaje_V;
	}
?>