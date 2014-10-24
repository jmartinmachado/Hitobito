<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?       require("VariablesGlobales.php")       ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<?
	if (!isset($id)){$id=-1;}
	$Datos_Post=Obtener_Post($id);
	if(!empty($Datos_Post)&&$Datos_Post["titulo"]!=""){
		$meta_Description=$Datos_Post["titulo"];
		$meta_Keywords=$Datos_Post["tags"].",".$Datos_Post["tipo"].",".$Datos_Post["titulo"];
		$meta_Keywords = str_replace("Tags,",$meta_Keywords,"");
		$meta_Subject="http://www.Hitobito.com.ar/post_".$id.".html";
		if (Bandera("Hotsuit")){ 
			$meta_Title=$Datos_Post["titulo"];
		}else{
			$meta_Title="Hitobito - ".$Datos_Post["titulo"];
		}
		$Art_Anterior=Art_Art_Anterior($id);
		$Art_Siguiente=Art_Art_Siguiente($id);
	}else{
		$Datos_Post["titulo"]="LOL 404";
	}
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("partearriba.php")         ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<? 
	if ($Datos_Post["titulo"]!="LOL 404"){
		$Const_Video='<object width="480" height="390"><param name="movie" value="<<<>>>>?version=3&amp;hl=es_MX&amp;rel=0"></param>
		<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
		<embed src="<<<>>>>?version=3&amp;hl=es_MX&amp;rel=0" type="application/x-shockwave-flash" width="480" height="390" allowscriptaccess="always" allowfullscreen="true">
		</embed></object>';
		
		if (trim($Datos_Post["tipo"])=="STICKY"){
			$todo.="<div class='post'><div class='TituloMiniPost_STICKY'></div><div class='TituloMiniPostTxt TituloMiniPostTxt_STICKY'><img class='valign' />";
			$todo.="<a href='".traducir_url("post_".$id).".html' class='MiniTituloPost_STICKY'  title='' >".$Datos_Post["titulo"]."</a>";
			$todo.="</div><div class='TituloMiniPost_STICKY TituloMiniPostD'></div><div class='RestoMiniPost'>";
		
		}else{
			$todo.="<div class='post'><div class='TituloMiniPost'></div><div class='TituloMiniPostTxt'><img class='valign' />";
			$todo.="<a href='".traducir_url("post_".$Art_Siguiente.".html")."' class='Tituloboton ";
		
			if ($Art_Siguiente==0){ $todo.="NON_Visible";}
			$todo.="'></a>";
			$todo.="<a href='".traducir_url("post_".$id).".html' class='MiniTituloPost'  title='' >".$Datos_Post["titulo"]."</a>";
			$todo.="<a href='".traducir_url("post_".$Art_Anterior.".html")."' class='TitulobotonI ";
			
			if ($Art_Anterior==0){ $todo.="NON_Visible";}
			
			$todo.="'></a>";
			$todo.="</div><div class='TituloMiniPost TituloMiniPostD'></div><div class='RestoMiniPost'>";
		
		
		}
		
		
		if (trim($Datos_Post["tipo"])=="video"){
			$Const_Video= str_replace("<<<>>>>",$Datos_Post["valor"],$Const_Video);
			$todo.=$Const_Video;
		}else{
			list($ancho, $altura, $tipo, $atr) = getimagesize($Datos_Post["valor"]);
			$todo.="<img src=\"".$Datos_Post["valor"]."\" $atr alt='' title='' class='imgminipost' border=0/>";
		}
		$todo.="</div><div class='RestoMiniPost'><table border='0' cellpadding='2' cellspacing='1'>";
		if (trim($Datos_Post["fuente"])=="Fuente"){
			$todo.="<tr><td colspan='4'><span class='fuente fuenteD'>Fuente Desconocida</span></td></tr>";
		}else{
			if (trim($Datos_Post["tipo"])=="STICKY"){
				$todo.="<tr><td colspan='4'><span class='celda_STICKY'>".$Datos_Post["fuente"]."</span><br><p></p></td></tr>";
			}	
		
		}		
		$todo.="<td><a href='http://twitter.com/share' class='twitter-share-button' data-url=".traducir_url("post_".$id.".html")." data-text='".$Datos_Post["titulo"]."' data-count='vertical' data-via='HitoBitos' data-lang='es'>Tweet</a></td>";
		$todo.="<td><g:plusone size='tall' callback='".traducir_url("post_".$id.".html")."'></g:plusone></td>";
		
		$todo.="<td><div class='fb-like' data-href='".traducir_url("post_".$id.".html")."' data-send='false' data-layout='box_count' data-width='80' data-show-faces='true'></div>";
		
		$todo.="</tr><tr><td colspan=3>";
		$todo.='<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="http://hitobito.com.ar/post_'.$id.'.html" num_posts="0" width="680"></fb:comments></td></tr>';
		$todo.="</table></div></div>";
		echo $todo;
	}else{
		echo "<script type='text/javascript'>window.location='".traducir_url("404.php")."';</script>";
	}
?> 
<!--script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type='text/javascript' src='https://apis.google.com/js/plusone.js'>{lang: 'es-419'}</script-->

<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?           require("parteabajo.php")          ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
