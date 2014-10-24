<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'var_glob.php'        ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	$Obtener=Obtener_Post($id);
	$meta_Keywords="Hitobito, Imagenes, Humor, Videos ".$Obtener[1]["tag"];
	$meta_canonical="post_".$Obtener[1]["id"];
	$meta_Title=" -".Caracteres_Esp($Obtener[1]["titulo"]);
	$meta_revisit="1 day";
	$Facebook_Pic=="";
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'parte_arriba.php'    ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
	<div id="cuerpo_parte_izq" class="a_cuerpo_completo">
		<div class="cuerpo_item cuerpo_parte_izq_medio">
			<? echo Escribir_Post_Generico($Obtener[1]["id"],$DDU['Id'],Caracteres_Esp($Obtener[1]["titulo"]),$Obtener[1]["url"],$Obtener[1]["fecha"],$Obtener[1]["hora"],$Obtener[1]["comentarios"],$Obtener[1]["puntaje"],$Obtener[1]["votos_positivos"],$Obtener[1]["votos_negativos"],$Obtener[1]["tipo"]) ?>
			<div id="Post_FB_Comentarios">
				 <fb:comments href="http://hitobito.com.ar/post_2963.html" num_posts="10" width="900px"></fb:comments>
			</div>
			<fb:comments-count href=http://example.com/ class="none"></fb:comments-count>
		</div>
	</div>
	<script type='text/javascript'>
		$(document).ready (function(){
			setTimeout(function(){
				var L_D = 'ajx='+ encodeURIComponent("acm") + '&v=' + encodeURIComponent($(".fb_comments_count").text()) + '&' + 'id_p=' + encodeURIComponent(<? echo $id ?>); 
				$.ajax({
					type: 'POST',
					url: "ajx.php",
					cache: false,
					data:L_D,
					<? /*success: function(data) {alert(data);},*/ ?>
				});
			},14000);
		});
	</script>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'parte_abajo.php'     ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>