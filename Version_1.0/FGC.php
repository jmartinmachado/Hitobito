<? 	if( !defined( '_AUTOGAN' ) && !defined( '_VALID_VVM' ) ) die( 'Restricted access' ); ?>
<?
	function Escribir_Post($pagina,$tipo,$id_user){
		$Obtener=Obtener_Nuevos($pagina,$tipo);
		$FGC="";
		if ($Obtener[0]["OK"]==1){
			$i=2;
			while($i < 7){
				$FGC.=Escribir_Post_Generico($Obtener[$i]["id"],$id_user,Caracteres_Esp($Obtener[$i]["titulo"]),$Obtener[$i]["url"],$Obtener[$i]["fecha"],$Obtener[$i]["hora"],$Obtener[$i]["comentarios"],$Obtener[$i]["puntaje"],$Obtener[$i]["votos_positivos"],$Obtener[$i]["votos_negativos"],$Obtener[$i]["tipo"]);
				$i++;
			}
		}
		return array("OK" => $Obtener[0]["OK"], "Data" => $FGC);
	}
	function Escribir_Post_Generico($ID,$id_user,$Titulo,$URL,$Fecha,$Hora,$Comentarios,$Puntaje_Total,$Puntaje_Positivos,$Puntaje_Negativos,$tipo){
		$Puntaje_Post=Obtener_Puntaje_Post($ID,$id_user);
		$FGC_URL=traducir_url("post_".$ID);
		$FGC= '<div class="post" id="post_'.$ID.'">
		<a href="'.$FGC_URL.'" title="" class="post_titulo" target="_blank">'.$Titulo.'</a>';
		
		if ($tipo=="img"){
			//$FGC.='<a href="'.$FGC_URL.'" title="" class="post_indded" target="_blank"><img src="'.$URL.'"  alt="" title=""/></a>';
		}else{
			//$FGC.='<iframe width="560" height="315" class="post_indded" src="'.$URL.'" frameborder="0" allowfullscreen></iframe>';
		}
		if (bandera("social")) {
			$FGC.='<table border="0"  class="post_social">
			<tr>
			<td>
			<div class="g-plusone" data-size="tall" data-annotation="none" data-href="'.$FGC_URL.'"></div>
			</td>
			<td align="center"  class="central">
			<div class="facebook_share_size_Small" onclick="fbWindow(\'Facebook Share\', \'http://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhitobito.com.ar%2Fpost_'.$ID.'\', \'Facebook-Share\', \'ListClicked\', \''.$FGC_URL.'\');">
			<span class="FacebookConnectButton FacebookConnectButton_Small">
			<span class="FacebookConnectButton_Text">Compartir en Facebook</span>
			</span> 
			</div>
			</td>
			<td class="central">
			<div class="b2-widget" onclick="twttrWindow(\'Twitter Share\', \'https://twitter.com/intent/tweet?original_referer=http%3A%2F%2F9gag.com%2Fgag%2F4324080&source=tweetbutton&text=I%20probably%20will%20go%20to%20hell%20because%20of%20this&url=http%3A%2F%2F9gag.com%2Fgag%2F4324080&via=9GAG\', \'Twitter-Share\', \'ListClicked\', \'http://9gag.com/gag/4324080\');">
			<div class="b2-widget-btn"> <i></i> <span class="b2-widget-label">Twittear</span> </div>
			</div>
			</td>
			</tr>
			</table>';
		}
		$FGC.='<table border="0"  class="post_datos">
		<tr>
		<td align="center" class="central">
			<span title="'.date("d/m/Y",strtotime($Fecha))." ".$Hora.'" class="post_datos_hace">'.Gen_hace_tiempo(date("Y-m-d",strtotime($Fecha))." ".$Hora).'</span>
		</td>
		<td align="center"  class="central">
			<span title="+'.$Puntaje_Positivos."/-".$Puntaje_Negativos.'" class="post_datos_gusta">'.$Puntaje_Total.'</span>
		</td>
		<td align="center" class="central">
			<a href="'.$FGC_URL.'" title="" class="post_datos_comentario" target="_blank">'.$Comentarios.' Comentarios</a>
		</td>
		</tr>
		</table>
		<div class="post_votar">
		<div class="post_votar_botones">';
		if ($Puntaje_Post["OK"]==0){
			$FGC.='<span onclick="votar('.$ID.',\'Mas3\')" title="" class="post_votar_botones_item Mas3 pointer"></span>
			<span onclick="votar('.$ID.',\'Mas2\')" title="" class="post_votar_botones_item Mas2 pointer"></span>
			<span onclick="votar('.$ID.',\'Mas1\')" title="" class="post_votar_botones_item Mas1 pointer"></span>
			<span onclick="votar('.$ID.',\'Mhe\')" title="" class="post_votar_botones_item Mhe pointer"></span>
			<span onclick="votar('.$ID.',\'Menos1\')" title="" class="post_votar_botones_item Menos1 pointer"></span>
			<span onclick="votar('.$ID.',\'Menos2\')" title="" class="post_votar_botones_item Menos2 pointer"></span>
			<span onclick="votar('.$ID.',\'Menos3\')" title="" class="post_votar_botones_item Menos3 pointer"></span>';
		}else{
			$FGC.='<span title="" class="post_votar_botones_item Mas3 '.(($Puntaje_Post["puntaje"]!='Mas3') ? 'fade' : '').' "></span>
			<span title="" class="post_votar_botones_item Mas2 '.(($Puntaje_Post["puntaje"]!='Mas2') ? 'fade' : '').'"></span>
			<span title="" class="post_votar_botones_item Mas1 '.(($Puntaje_Post["puntaje"]!='Mas1') ? 'fade' : '').'"></span>
			<span title="" class="post_votar_botones_item Mhe '.(($Puntaje_Post["puntaje"]!='Mhe') ? 'fade' : '').'"></span>
			<span title="" class="post_votar_botones_item Menos1 '.(($Puntaje_Post["puntaje"]!='Menos1') ? 'fade' : '').'"></span>
			<span title="" class="post_votar_botones_item Menos2 '.(($Puntaje_Post["puntaje"]!='Menos2') ? 'fade' : '').'"></span>
			<span title="" class="post_votar_botones_item Menos3 '.(($Puntaje_Post["puntaje"]!='Menos3') ? 'fade' : '').'"></span>';
		}
		$FGC.='</div><div class="post_votar_barra">';
		$FGC.='<div class="'.(($Puntaje_Positivos==0 && $Puntaje_Negativos==0) ? 'empty' : '').'" style="left:'.Calcular_Porcentaje($Puntaje_Negativos,$Puntaje_Positivos).'%"></div>';
		$FGC.='</div>
		</div>
		</div>
		<div class="separador clear"></div>';
		return $FGC;
	}
	function Gen_hace_tiempo($valor){
		$formato_defecto="Y-n-j H:i:s";
		if(stristr($valor,'-') || stristr($valor,':') || stristr($valor,'.') || stristr($valor,',')){
		if(stristr($valor,'[')){
		$explotar_valor=explode('[',$valor);
		$valor=trim($explotar_valor[0]);
		$formato=str_replace(']','',$explotar_valor[1]);
		}else{
		$formato=$formato_defecto;
		}
		$valor = str_replace("-"," ",$valor);
		$valor = str_replace(":"," ",$valor);
		$valor = str_replace("."," ",$valor);
		$valor = str_replace(","," ",$valor);
		$numero = explode(" ",$valor);
		$formato = str_replace("-"," ",$formato);
		$formato = str_replace(":"," ",$formato);
		$formato = str_replace("."," ",$formato);
		$formato = str_replace(","," ",$formato);
		$formato = str_replace("d","j",$formato);
		$formato = str_replace("m","n",$formato);
		$formato = str_replace("G","H",$formato);
		$letra = explode(" ",$formato);
		$relacion[$letra[0]]=$numero[0];
		$relacion[$letra[1]]=$numero[1];
		$relacion[$letra[2]]=$numero[2];
		$relacion[$letra[3]]=$numero[3];
		$relacion[$letra[4]]=$numero[4];
		$relacion[$letra[5]]=$numero[5];
		$valor = mktime($relacion['H'],$relacion['i'],$relacion['s'],$relacion['n'],$relacion['j'],$relacion['Y']);
		}
		$ht = time()-$valor;
		if($ht>=2116800){
		$dia = date('d',$valor);
		$mes = date('n',$valor);
		$año = date('Y',$valor);
		$hora = date('H',$valor);
		$minuto = date('i',$valor);
		$mesarray = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		if ($dia==31 ||  $año==1969){
			$fecha = "El Principio de los Tiempos";
		}else{
			$fecha = "el $dia de $mesarray[$mes] del $año";
		}

		}
		if($ht<30242054.045){$hc=round($ht/2629743.83);if($hc>1){$s="es";}$fecha="hace $hc mes".$s;}
		if($ht<2116800){$hc=round($ht/604800);if($hc>1){$s="s";}$fecha="hace $hc semana".$s;}
		if($ht<561600){$hc=round($ht/86400);if($hc==1){$fecha="ayer";}if($hc==2){$fecha="antes de ayer";}if($hc>2)$fecha="hace $hc d&iacute;as";}
		if($ht<84600){$hc=round($ht/3600);if($hc>1){$s="s";}$fecha="hace $hc hora".$s;if($ht>4200 && $ht<5400){$fecha="hace m&aacute;s de una hora";}}
		if($ht<3570){$hc=round($ht/60);if($hc>1){$s="s";}$fecha="hace $hc minuto".$s;}
		if($ht<60){$fecha="hace $ht segundos";}
		if($ht<=3){$fecha="ahora";}
		return $fecha;
	}
	function May_Men($FGC){
		$FGC=str_replace("<","&lt;",$FGC);
		$FGC=str_replace(">","&gt;",$FGC);
		return $FGC;
	}
	function Caracteres_Esp($FGC){
		$FGC = str_replace("¿","&iquest;",$FGC);
		$FGC = str_replace("á","&aacute;",$FGC);
		$FGC = str_replace("é","&eacute;",$FGC);
		$FGC = str_replace("í","&iacute;",$FGC);
		$FGC = str_replace("ó","&oacute;",$FGC);
		$FGC = str_replace("ú","&uacute;",$FGC);
		$FGC = str_replace("ñ","&ntilde;",$FGC);
		return $FGC;
	}
	function Caracteres_Especiales_INV($FGC){
		$FGC = str_replace("&iquest;","¿",$FGC);
		$FGC = str_replace("&aacute;","á",$FGC);
		$FGC = str_replace("&eacute;","é",$FGC);
		$FGC = str_replace("&iacute;","í",$FGC);
		$FGC = str_replace("&oacute;","ó",$FGC);
		$FGC = str_replace("&uacute;","ú",$FGC);
		$FGC = str_replace("&ntilde;","ñ",$FGC);
		return $FGC;
	}
?>
