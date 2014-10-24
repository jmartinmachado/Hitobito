<?
	function Escribir_Nuevos($pagina,$tipos="todo"){
		$obtener=Obtener_Nuevos($pagina,$tipos);
		$obtener_STICKY=Obtener_Nuevos($pagina,"STICKY");
		
		$contador=count($obtener);
		$hay_mas=($contador)>(5*6);
		$FGC="";
		$Const_Video='<object width="480" height="390"><param name="movie" value="<<<>>>>?version=3&amp;hl=es_MX&amp;rel=0"></param>
		<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
		<embed src="<<<>>>>?version=3&amp;hl=es_MX&amp;rel=0" type="application/x-shockwave-flash" width="480" height="390" allowscriptaccess="always" allowfullscreen="true">
		</embed></object>';

		/** STICKY *
		$i=1;
		if ($pagina==0 && file_exists($obtener_STICKY[$i+2]) && $tipos=="todo"){
			$FGC.="<div class='post'><div class='TituloMiniPost_STICKY'></div><div class='TituloMiniPostTxt  TituloMiniPostTxt_STICKY'><img class='valign' />";
			$FGC.="<a href='".traducir_url("post_".$obtener_STICKY[$i]).".html' class='MiniTituloPost_STICKY'  title='' >".$obtener_STICKY[$i+1]."</a>";
			$FGC.="</div><div class=' TituloMiniPost_STICKY TituloMiniPostD '></div><div class='RestoMiniPost'>";
			list($ancho, $altura, $tipo, $atr) = getimagesize($obtener_STICKY[$i+2]);
			$FGC.="<a href='".traducir_url("post_".$obtener_STICKY[$i].".html")."'><img src=\"".$obtener_STICKY[$i+2]."\" $atr alt='' title='' class='imgminipost' border=0/></a>";
			$FGC.="</div><div class='RestoMiniPost RestoMiniPostSocial'><table border='0' cellpadding='0' cellspacing='0' width='500' >";
			$FGC.="<tr><td colspan=3><a href='".traducir_url("post_".$obtener_STICKY[$i].".html")."' class='TextoComentarios'  title='' >Comentarios</a></td></tr>";
			$FGC.="<tr><td align='center'>";
			$FGC.="<div class='social_por_post botones_Sociales'><ul><li>";
			$FGC.="<a href='http://twitter.com/share' class='twitter-share-button' data-text='".$obtener_STICKY[$i+1]."' data-url='".traducir_url("post_".$obtener_STICKY[$i]).".html' data-count='horizontal' data-via='HitoBitos'> &nbsp; </a>";
			$FGC.="</li><li>";
			$FGC.="<div class='fb-like RestoMiniPostSocial' data-href='".traducir_url("post_".$obtener_STICKY[$i].".html")."' data-send='false' data-layout='button_count' data-width='90' data-show-faces='false'></div>";
			$FGC.="</li><li>";
			$FGC.="<g:plusone size='medium' href='".traducir_url("post_".$obtener_STICKY[$i].".html")."'></g:plusone>";
			$FGC.="</li></ul></div>";
			$FGC.="</td>";
			$FGC.="</td></tr>";
			$FGC.="</table></div></div>";
		}
		/** ------ **/

		for ($i=1;$i<(5*6) && $i < $contador ;$i=$i+5){
			if (trim($obtener[$i+3])=="img" && file_exists($obtener[$i+2]) || trim($obtener[$i+3])=="video"){
				$FGC.="<div class='post'><div class='TituloMiniPost'></div><div class='TituloMiniPostTxt'><img class='valign' />";
				$FGC.="<a href='".traducir_url("post_".$obtener[$i]).".html' class='MiniTituloPost'  title='' >".$obtener[$i+1]."</a>";
				$FGC.="</div><div class='TituloMiniPost TituloMiniPostD'></div><div class='RestoMiniPost'>";
				if (trim($obtener[$i+3])=="video"){
					$FGC.= str_replace("<<<>>>>",$obtener[$i+2],$Const_Video);
					/*$FGC.=$Const_Video;*/
				}else{
					list($ancho, $altura, $tipo, $atr) = getimagesize($obtener[$i+2]);
					$FGC.="<a href='".traducir_url("post_".$obtener[$i].".html")."'><img src=\"".$obtener[$i+2]."\" $atr alt='' title='' class='imgminipost' border=0/></a>";
				}
				$FGC.="</div><div class='RestoMiniPost RestoMiniPostSocial'><table border='0' cellpadding='0' cellspacing='0' width='500' >";
				$FGC.="<tr><td colspan=3><a href='".traducir_url("post_".$obtener[$i].".html")."' class='TextoComentarios'  title='' >Comentarios</a></td></tr>";
				$FGC.="<tr><td align='center'>";
				$FGC.="<div class='social_por_post botones_Sociales'><ul><li>";
				$FGC.="<a href='http://twitter.com/share' class='twitter-share-button' data-text='".$obtener[$i+1]."' data-url='".traducir_url("post_".$obtener[$i]).".html' data-count='horizontal' data-via='HitoBitos'> &nbsp; </a>";
				$FGC.="</li><li>";
				$FGC.="<div class='fb-like RestoMiniPostSocial' data-href='".traducir_url("post_".$obtener[$i].".html")."' data-send='false' data-layout='button_count' data-width='90' data-show-faces='false'></div>";
				$FGC.="</li><li>";
				$FGC.="<g:plusone size='medium' href='".traducir_url("post_".$obtener[$i].".html")."'></g:plusone>";
				$FGC.="</li></ul></div>";
				$FGC.="</td>";
				$FGC.="</td></tr>";
				$FGC.="</table></div></div>";
			}
		}
		if($pagina>0 || $hay_mas){
			switch($tipos){
				case "todo":
					$TT1=traducir_url("inicio");
					$TT2=traducir_url("pagina".($pagina-1));
					$TT3=traducir_url("pagina".($pagina+1));
				break;
				case "img":
					$TT1=traducir_url("imagen");
					$TT2=traducir_url("imagen.pagina".($pagina-1));
					$TT3=traducir_url("imagen.pagina".($pagina+1));
				break;
				case "video":
					$TT1=traducir_url("video");
					$TT2=traducir_url("video.pagina".($pagina-1));
					$TT3=traducir_url("video.pagina".($pagina+1));
				break;
			}
			$FGC.="<div class='paginacion'><img class='valign' />";
			if ($pagina>0){
				if (($pagina-1)==0){
					$FGC.="<a href='".$TT1."' class='TextoPaginacion' title=''>« Anterior</a>";
				}else{
					$FGC.="<a href='".$TT2."' class='TextoPaginacion' title=''>« Anterior</a>";
				}
			}
			if ($hay_mas&&$pagina>0){
				$FGC.="&nbsp&nbsp|&nbsp&nbsp";
			}
			if ($hay_mas){
				$FGC.="<a href='".$TT3."' class='TextoPaginacion' title=''>Siguiente »</a>";
			}
			$FGC.="</div>";
		}
		echo $FGC;
	}

?>