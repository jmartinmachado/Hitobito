<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'var_glob.php'        ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?
	if (!isset($tipo))$tipo="t";
	switch ($tipo) {
		case "t":
			$Obtener=Escribir_Post(0,"todo",$DDU['Id']);
			$meta_canonical="";
			$meta_Title="";
		break;
		case "p":
			$Obtener=Escribir_Post(0,"p",$DDU['Id']);
			$meta_canonical="pics";
			$meta_Title=" - Pics";
		break;
		case "v":
			$Obtener=Escribir_Post(0,"v",$DDU['Id']);
			$meta_canonical="videos";
			$meta_Title=" - Videos";
		break;
	}
	$meta_Keywords="Hitobito, Imagenes, Humor, Videos ".$meta_Keywords;
	$meta_revisit="1 day";
	$Facebook_Pic=="";
?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'parte_arriba.php'    ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
			<div id="cuerpo_parte_izq">
				<div class="cuerpo_item cuerpo_parte_izq_arriba"></div>
				<div class="cuerpo_item cuerpo_parte_izq_medio">
					<? echo $Obtener["Data"]; ?> 
				</div>
				<div class="cuerpo_item cuerpo_parte_izq_abajo cuerpo_parte_izq_abajo_normal" ><img class="valign" alt="" src=""/><a href="javascript:cargar_mas();" class="cargar_mas" title="">Cargar m&aacute;s post</a></div>
			</div>
			<div id="cuerpo_parte_der">
				
				<? if (bandera("social")) {?>
				
				<div class="social"><div class="fb-like" data-href="https://www.facebook.com/Hitobitos" data-send="false" data-width="250" data-show-faces="true" data-font="trebuchet ms"></div></div>
				<div class="separador clear"></div>
				<div class="social"><a href="https://twitter.com/Hitobitos" class="twitter-follow-button" data-show-count="true" data-lang="es" >Seguir a @Hitobitos</a></div>
				<div class="separador clear"></div>
				<div class="social"><a href="http://pinterest.com/Hitobito/"><img src="http://passets-cdn.pinterest.com/images/about/buttons/follow-me-on-pinterest-button.png" width="169" height="28" alt="Follow Me on Pinterest" /></a></div>
				<div class="separador clear"></div>
				<div class="social"><g:plusone annotation="inline" width="250" href="http://hitobito.com.ar/"></g:plusone></div>
				
				<? } ?>
				
				<div class="separador clear"></div>
				<div class="social documentacion"><a href="" title="" target="_blank">Legal</a> &middot; <a href="" title="" target="_blank">Licencia</a> &middot; <a href="" title="" target="_blank">Version 1.0</a></div>
				<div class="clear"></div>
			</div>
		<script type='text/javascript'>
			var D_G={p:1,};
			function cargar_mas(){
				$("#cuerpo_parte_izq .cuerpo_parte_izq_abajo").html("").addClass("cargando");
				var L_D = 'ajx='+ encodeURIComponent("mp") +'&p=' + encodeURIComponent(D_G.p) + '&tp=' + encodeURIComponent("<? echo $tipo ?>"); 
				$.ajax({
					type: 'POST',
					url: "ajx.php",
					cache: false,
					data:L_D,
					success: function(data) {
						var obj = jQuery.parseJSON(data);
						switch (obj.OK) {
							case 0:
								Mensaje ("Intentalo de nuevo");
								break;
							case 1:
								$("#cuerpo_parte_izq .cuerpo_parte_izq_medio").append(obj.Data);
								Mensaje ("Cargar Más Post");
								D_G.p=D_G.p+1;
								gapi.plusone.go();
							break;
							case 2:
								Mensaje("No hay m&aacute;s post para mostrar");
							break;
						}
					},
					error: function() {Mensaje ("Intentalo de nuevo");}
				});
				function Mensaje (msj) {
					$("#cuerpo_parte_izq .cuerpo_parte_izq_abajo").html('<img class="valign" alt="" src=""/><a href="javascript:cargar_mas();" class="cargar_mas" title="">'+msj+'</a>').removeClass("cargando");
				}
			}
			//$(window).scroll(function () {if ($(window).scrollTop() >= $(document).height() - $(window).height()) {cargar_mas();}});
		</script>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>
<?    require_once 'parte_abajo.php'     ?>
<? /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ ?>